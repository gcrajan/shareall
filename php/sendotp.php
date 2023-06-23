<?php
session_start();
if($_SERVER["REQUEST_METHOD"]=="POST")
{  
    function OTP()
    {
        $string = "qwertyuiopa7418520963sdfghjklzxcvbnm";
        $otp="";
        $r = rand(8,35);
        for($i=0;$i<=$r;$i++)
        {
            $otp .= $string[rand(0,strlen($string))];
        }
        return $otp;
    }
    $_SESSION["OTP"]=OTP();
    send_mail($_POST["Email"],"OTP req","Shareall OTP ".date("y-m-d"),"Your otp is: <b>".$_SESSION["OTP"]."</b>","Your otp is: ".$_SESSION["OTP"]);
    // echo $_SESSION["OTP"]=OTP();
}



?>