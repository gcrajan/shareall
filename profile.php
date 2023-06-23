<?php
require("php/Classes.php");
if(isset($_SESSION["Uemail"]) && $_SERVER["REQUEST_METHOD"]=="POST" &&  isset($_POST["submit"]))
{
    if($_POST["Action"]=="Logout"){$U->Logout();}
    else if($_POST["Action"]=="Reject_request")
    {
        $U->Reject_request($_POST["Rid"]);
    }
    else if($_POST["Action"]=="Confirm_request")
    {
        $U->Confirm_request($_POST["Rid"]);
    }
    else if($_POST["Action"]=="Delete_item")
    {
        if($I->Delete($_POST["Iid"])){echo "Item deleted";}
    }
    else if($_POST["Action"]=="Edit_profile")
    {
        $U->Edit($_SESSION["Uemail"],$_POST["Uname"],$_POST["Ulocation"],$_POST["Ulocation2"],$_POST["Ucontact"],$_FILES["Pic"]);
        $U->Update($_SESSION["Uemail"]);
    }

    unset($_POST);
}

if(!$U->Is_loggedin()){header("Location:index.php");}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/icon.png" type="image/x-icon" />
    <title>ShareAll</title>
    <link rel="stylesheet" href="css/style.css">

</head>

<body>
    <?php  $active="profile";require("Components/nav.php") ?>
    <section id="profile-section">

        <div id="div-profile-section">
            <img src="<?php echo $_SESSION['Upic']?>">
            <div id="detail-div-profile-section">
                <div id="editform">
                    <div id="editform1">
                        <p>Name: <span id="detail-info-div-profile-section"><?php echo $_SESSION['Uname']?> </span></p>
                        <p>Contact: <span id="detail-info-div-profile-section"><?php echo $_SESSION['Ucontact']?> </span></p>
                        <p>Permanent Address: <span id="detail-info-div-profile-section"><?php echo $_SESSION['Ulocation']?> </span></p>
                        <p>Temporary Address: <span id="detail-info-div-profile-section"><?php echo $_SESSION['Ulocation2']?> </span></p>
                    </div>
                    <div id="editform2" style="display:none;">
                        <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post" enctype = "multipart/form-data">
                            <input type="hidden" name="Action" value="Edit_profile">
                            <p>Name: <span id="detail-info-div-profile-section"><input type="text" name="Uname" value="<?php echo $_SESSION['Uname']?> " required></span></p>
                            <p>Contact: <span id="detail-info-div-profile-section"><input type="text" name="Ucontact" value="<?php echo $_SESSION['Ucontact']?> " required> </span></p>
                            <p>Permanent Address: <span id="detail-info-div-profile-section"><input type="text" name="Ulocation" value="<?php echo $_SESSION['Ulocation']?> " required> </span></p>
                            <p id="address">Temporary Address: <span id="detail-info-div-profile-section"><input type="text" name="Ulocation2" value="<?php echo $_SESSION['Ulocation2']?> " required> </span></p>
                            <p>Profile Picture: <span id="detail-info-div-profile-section"><input type="file" name="Pic"> </span></p>
                            <div>
                                <button type="submit" name="submit" class="btnAll" id="button-submit-info-div-profile-section">Save Changes</button>
                            </div>

                        </form>
                    </div>
                    
                </div>

                <div id="submitbtn-info-div-profile-section">
                    <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">
                        <input type="hidden" name="Action" value="Logout">
                        <input type="submit" name="submit" value="Logout" class="btnAll" id="button-submit-info-div-profile-section">
                    </form>
                    <div>
                        <button type="button" class="btnAll" id="button-submit-info-div-profile-section" onclick="Show_edit_form()">Edit</button>
                    </div>
                </div>
            </div>
        </div>

        <div id="info-div-profile-section">
            <div id="title-info-div-profile-section">
                <p onclick="showInformation()" id="info-title-info-div-profile-section">Information</p>
                <p onclick="showPost()" id="post-title-info-div-profile-section">My post</p>
            </div>
            <div id="information-info-div-profile-section">
                <?php $requests = $U->Receieved_request($_SESSION["Uemail"]) ?>
                <?php if($requests->num_rows<=0): ?>
                    <!-- ------------- when empty -------- -->
                    <article id="empty-profilePage">
                        <p id="empty-profile-topic">Wait, Someone will request...</p>
                        <div id="movingImg-empty-profilePage">
                            <img src="images/bgInformationFemaleShopEmpty.svg" id="movingimage-empty-profilePage">
                        </div>
                        <div id="img-empty-profilePage">
                            <img src="images/bgInformationEmpty.svg" id="image-empty-profilePage">
                        </div>
                    </article>
                <?php else: ?>
                    <table id="customers">
                        <tr>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Decision</th>
                        </tr>
                        <?php while($request=$requests->fetch_assoc()): ?>
                            <?php $requestor = $U->Data($request["RUemail"]) ?>
                            <tr>
                                <td><?php echo $request["Iname"]?></td>
                                <td><?php echo $request["Rcount"]?></td>
                                <td><?php echo $requestor["Uname"]?></td>
                                <td><?php echo $requestor["Ucontact"]?></td>
                                <td><?php echo $requestor["Ulocation2"]//.",". $requestor["Ulocation"]?></td>
                                <td>
                                    <form action="<?php echo $_SERVER["PHP_SELF"]?>" class="inline" method="post">
                                        <input type="hidden" name="Action" value="Confirm_request">
                                        <input type="hidden" name="Rid" value="<?php echo $request["Rid"]?>">
                                        <input type="submit" name="submit" value="Delivered" class="allProfileBtn">
                                    </form>

                                    <form action="<?php echo $_SERVER["PHP_SELF"]?>" class="inline" method="post">
                                        <input type="hidden" name="Action" value="Reject_request">
                                        <input type="hidden" name="Rid" value="<?php echo $request["Rid"]?>">
                                        <input type="submit" name="submit" value="Rejected" class="allProfileBtn">
                                    </form>
                                </td>
                            </tr>
                        <?php endwhile ?>
                    </table>
                <?php endif ?>
                
            </div>
            <div id="myPost-info-div-profile-section">
                <article id="shop-items">

                    <?php $items=$U->Myitems($_SESSION["Uemail"]) ?>
                    <?php if($items->num_rows<=0):?>
                        <!-- ------------- when empty -------- -->
                        <article id="empty-mypost-profilePage">
                            <p id="shop-topic"><a href="shop.php">Go,create some items...</a></p>
                            <div id="empty-imgdiv-mypost-profilePage">
                                <img src="images/bg-empty-cart.svg" id="empty-img-mypost-profilePage">
                            </div>
                        </article>
                    <?php else: ?>
                        <div id="cart-shop">                        
                            <?php while($item=$items->fetch_assoc()):?>
                                <div class="item-cart-shop">
                                    <div class="img-item-cart-shop">
                                        <img src="<?php echo $item["Ipic"] ?>" alt="<?php echo $item["Iname"] ?>" class="pic-img-item-cart-shop" />
                                    </div>
                                    <div class="detail-item-cart-shop">
                                        <div class="heading-detail-item-cart-shop">
                                            <h2><?php echo $item["Iname"] ?></h2>
                                        </div>
                                        <div class="img-detail-item-cart-shop">
                                            <div class="name-img-detail-item-cart-shop">
                                                <div>
                                                    <img src="<?php echo $_SESSION["Upic"] ?>" />
                                                    <p><?php echo $_SESSION["Uname"] ?></p>
                                                </div>
                                                <div>
                                                    <p><span><?php echo $item["Istock"] ?></span> Pieces</p>
                                                </div>
                                            </div>

                                            <div class="profile-delete-btn">
                                                <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">
                                                    <input type="hidden" name="Action" value="Delete_item">
                                                    <input type="hidden" name="Iid" value="<?php echo $item["Iid"]?>">
                                                    <input type="submit" name="submit" value="Delete" class="allProfileBtn">
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile ?>
                        </div>
                    <?php endif ?>
                    
                </article>
            </div>
        </div>
    </section>
    <?php require("Components/footer.php")?>
    <script>
        function Show_edit_form()
        {
            var f1 = document.getElementById("editform1");
            var f2 = document.getElementById("editform2");

            if(f1.style.display == "block")
            {
                f1.style.display = "none"
                f2.style.display = "block"
            }
            else
            {
                f1.style.display = "block"
                f2.style.display = "none"
            }

        }
    </script>
    <script src="js/script.js"></script>
</body>

</html>