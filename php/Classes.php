<?php
session_start();

$conn = new mysqli("localhost","root","root","Shareall");
if($conn->connect_error){die("Error connecting to db");}

function upload_pic($file_path,$file_name,$pic)
{
    $imageFileType = strtolower(pathinfo($pic["name"],PATHINFO_EXTENSION));
    $target_file = $file_path."/".$file_name.".".$imageFileType;
    if(!is_dir($file_path)){mkdir($file_path);}
    if(file_exists($target_file)){unlink($target_file);}
    if(getimagesize($pic["tmp_name"]) != false) 
    {
        if($imageFileType == "jpg" || $imageFileType == "jpeg" || $imageFileType == "png" || $imageFileType == "gif") 
        {
            move_uploaded_file($pic["tmp_name"], $target_file);
            return $target_file;
        } 
        else { echo "Error pic format not valid;";return false; }
    } 
    else { echo "Error pic format not valid;";return false; }
}

class User
{
    private $conn;   
    
    function __construct($conn){$this->conn = $conn;}

    function Is_loggedin(){ if(isset($_SESSION["Uemail"]) && $_SESSION["Uemail"]!=""){return true;}return false;}

    function Logout(){session_unset(); session_destroy(); session_start(); }

    function Cart_count($uemail){ return $this->conn->query("select count(RUemail) from requests where RUemail='".$uemail."'")->fetch_assoc()["count(RUemail)"];  }

    function Receieved_request($uemail){ return $this->conn->query("Select * from Requests natural join items where Iid in (Select Iid from Items where Uemail='".$uemail."')");}
    
    function Cartitems($uemail){ return $this->conn->query("select * from requests natural join (Items natural join users) where RUemail='".$uemail."'"); }

    function Myitems($uemail){  return $this->conn->query("Select * from Items where Uemail='".$uemail."'"); }

    function Confirm_request($rid) { return $this->conn->query("Delete from Requests where rid = ".$rid); }

    function Likes($uemail,$Iid){ return $this->conn->query("Insert into Likes values('".$uemail."',".$Iid.")"); }

    function Create($uemail,$uname,$upassword,$location,$location1,$contact,$pic)
    {
        
        $target_file = upload_pic("uploads/User/".$uemail,"profile",$pic);
        if(!$target_file){echo "Error uploading pic;";return false;}
        
        try{ return $this->conn->query("Insert into Users values('".htmlentities($uemail)."','".htmlentities($uname)."','".hash("sha256",$upassword)."','".$target_file."','".htmlentities($location)."','".htmlentities($location1)."','".htmlentities($contact)."') ");}
        catch(Exception){echo "Error creating profile maybe user exists;";return false;}
    }

    function Login($uemail,$upassword)
    {
        $result = $this->conn->query("Select * from Users where Uemail = '".htmlentities($uemail)."'");
        if($result->num_rows!=1){echo "User doesnt exist;";return false;}
        $data = $result->fetch_assoc();

        if($data["Upassword"] == hash("sha256",trim($upassword)))
        {
            $_SESSION["Uname"]=$data["Uname"];
            $_SESSION["Uemail"]=$data["Uemail"];
            $_SESSION["Upic"]=$data["Upic"];
            $_SESSION["Ulocation"]=$data["Ulocation"];
            $_SESSION["Ucontact"]=$data["Ucontact"];
            $_SESSION["Ulocation2"] = $data["Ulocation2"];
            return true;
        }
        return false;
    }
    function Update($uemail)
    {
        $result = $this->conn->query("Select * from Users where Uemail = '".htmlentities($uemail)."'");
        if($result->num_rows!=1){echo "User doesnt exist;";return false;}
        $data = $result->fetch_assoc();

        $_SESSION["Uname"]=$data["Uname"];
        $_SESSION["Uemail"]=$data["Uemail"];
        $_SESSION["Upic"]=$data["Upic"];
        $_SESSION["Ulocation"]=$data["Ulocation"];
        $_SESSION["Ucontact"]=$data["Ucontact"];
        $_SESSION["Ulocation2"] = $data["Ulocation2"];

    }
    
    function Data($uemail)
    {
        try{ return $this->conn->query("Select * from Users where uemail = '".$uemail."'")->fetch_assoc();  }
        catch(Exception){return null;}
    }
    
    function Reject_request($rid)
    {
        $data = $this->conn->query("Select * from requests where Rid = ".$rid)->fetch_assoc();
        if($this->conn->query("Update items set Istock = Istock +".$data["Rcount"]." where iid=".$data["Iid"]))
        {
            if(!$this->conn->query("Delete from Requests where rid =".$rid)){ $this->conn->query("Update items set Istock = Istock -".$data["Rcount"]." where iid=".$data["Iid"]); }
            else{return true; }
        }
        return false;
    }
    function Edit($uemail,$uname,$location,$location1,$contact,$pic)
    {
        if($pic["name"] != "")
        {
            $target_file = upload_pic("uploads/User/".$uemail,"profile",$pic);
            if(!$target_file){echo "Error uploading pic;";return false;}
        }
        

        try{ 
            $query = "Update Users 

            set 
            Uname = '".htmlentities($uname)."' , ";

            if($pic["name"]!=""){$query .="Upic = '".$target_file."' ,";}
            

            $query .= "Ulocation = '".htmlentities($location)."',
            Ulocation2 = '".htmlentities($location1)."',
            Ucontact = '".htmlentities($contact)."'

            where 
            Uemail ='".$uemail."'
            
            ";
            return $this->conn->query($query);
        }
        catch(Exception){echo "Error creating profile maybe user exists;";return false;}
    }
}


class Item
{
    private $conn;

    function __construct($conn){ $this->conn = $conn; }

    function Data($iid) {return $this->conn->query("Select * from items where Iid = ".$iid)->fetch_assoc(); }

    function Search($category="",$name="",$offset=0)
    {
        return $this->conn->query("Select * from Items natural join Users where Iname like '".htmlentities($name)."%' or Icategory like '".htmlentities($category)."%' and Istock > 0 Limit 100 Offset ".($offset*100)); 
    }

    function Data_category($category){ return $this->conn->query("Select * from items natural join Users where Istock>0 and ICategory like '".htmlentities($category)."%' order by Iid desc "); }

    function Create($uemail,$Iname,$istock,$pic,$category)
    {
        if(!$this->conn->query("Insert into items(uemail,iname,istock,Icategory) values('".$uemail."','".htmlentities($Iname)."',".htmlentities($istock).",'".htmlentities($category)."')")) {return false; }

        $id=$this->conn->insert_id;
        $target_file = upload_pic("uploads/Items/".$id,"Item",$pic);
        if(!$target_file){echo "error uploading pic";$this->conn->query("Delete from items where Iid=".$id);return false;}
        if($this->conn->query("Update Items set Ipic = '".$target_file."' where Iid = ".$id)){ return true; }
        $this->conn->query("Delete from items where Iid=".$id);
        return false; 
    }
    function Delete($iid)
    {
        $this->conn->query("Delete from likes where iid = ".$iid);
        try{return $this->conn->query("Delete from items where iid = ".$iid); }
        catch(Exception $e)
        {
            echo "Error deleting item requests still pending";
            return false;
        }  
    }

    function Request($iid,$uemail,$count)
    {

        if($this->conn->query("Update Items set Istock = Istock -".$count." where Iid=".$iid))
        {
            if($this->conn->query("select * from requests where Iid = ".$iid."  and RUemail = '".$uemail."'")->num_rows>0)
            {
                if($this->conn->query("Update requests set Rcount = Rcount + ".$count." where Iid = ".$iid."  and RUemail = '".$uemail."'")){return true; }
                else{ $this->conn->query("Update items set Istock = Istock +".$count."where iid=".$iid); }
            }
            else
            {
                if($this->conn->query("Insert into Requests(Iid,RUemail,Rcount) values(".$iid.",'".$uemail."',".$count.")")){return true; }
                else{ $this->conn->query("Update items set Istock = Istock +".$count."where iid=".$iid); }
            }
            
        }
        return false;
    }

    function Is_liked($uemail,$Iid)
    {
        if($this->conn->query("select * from likes where Uemail = '".$uemail."' and Iid = ".$Iid)->num_rows>0){return true;}
        return false;
    }

    function Latest_5(){return $this->conn->query("Select * from items natural join users limit 5");}

    function Most_liked(){ return $this->conn->query("Select * from items natural join users where iid in ( Select l.Iid from Likes as l group by l.Iid  Order by count(l.Iid) desc ) limit 5 "); }
 
}

class Blog
{
    private $conn;
    function __construct($conn){ $this->conn = $conn; }

    function Delete($bid){ return $this->conn->query("Delete from Blogs where Bid= ".$bid); }

    function Data($bid){ return $this->conn->query("Select * from Blogs where Bid = ".$bid)->fetch_assoc(); }

    function Data_latest_20(){ return $this->conn->query("Select  * from Blogs Natural join Users order by bid desc Limit 20"); }

    function Create($uemail,$Btitle,$bdiscription,$pic)
    {
        if(!$this->conn->query("Insert into Blogs(Uemail,Btitle,Bdiscription) values('".htmlentities($uemail)."','".htmlentities($Btitle)."','".htmlentities($bdiscription)."')")){ echo "Couldnot create blog"; return false; }

        if($pic["name"]==""){return true;}

        $id=$this->conn->insert_id;
        $target_file = upload_pic("uploads/Blogs/".$id,"Blog",$pic);
        if(!$target_file){echo "error uploading pic";$this->conn->query("Delete from Blogs where Bid=".$id);return false;}
        if($this->conn->query("Update Blogs set Bpic = '".$target_file."' where Bid =".$id)){ return true; }
        $this->conn->query("Delete from Blogs where Bid=".$id);
        return false; 

    }    
}

$U = new User($conn);
$I = new Item($conn);
$B = new Blog($conn);
?>