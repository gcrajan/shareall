<?php
require("php/Classes.php");
if(isset($_SESSION["Uemail"]) && $_SERVER["REQUEST_METHOD"]=="POST" &&  isset($_POST["submit"]))
{
    if($_POST["Action"]=="Create"){$B->Create($_SESSION["Uemail"],$_POST["Title"],$_POST["Description"],$_FILES["Pic"]);}
    else if($_POST["Action"]=="Delete"){$B->Delete($_POST["Bid"]);}

    unset($_POST);
}

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
    <?php  $active="discussion";require("Components/nav.php") ?>
    
    <?php require("Components/discussion/blogs.php") ?>
    <!-- <section id="div-discussion">
        <div class="blog-div-discussion">
            <img src="images/discussion/discussion1.png" alt="blogpost image" class="img-blog-div-discussion">
            <div class="blogpost-blog-div-discussion">
                <h1 class="blog-title-blog-div-discussion">Lorem ipsum dolor sit amet.</h1>
                <div class="user-info-blog-div-discussion">
                    <img src="images/profile/profile1.jpg" alt="blog image" class="user-info-img-blog-div-discussion">
                    <p class="blog-uname-blog-div-discussion">Ram Thapa</p>

                    <form action="">
                        <input type="submit" value="" class="button-input">
                    </form>
                </div>
                <div class="blog-desc-blog-div-discussion">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum adipisci, dolores officiis
                        incidunt nulla quibusdam porro est enim assumenda aliquam provident eius suscipit ex quod,
                        accusamus nam recusandae officia quo a deserunt, veritatis tempora ab repudiandae dolorum. Odio
                        officiis voluptatibus quae esse at quaerat maxime?</p>
                </div>
            </div>
        </div>
    </section> -->


    <div id="write-post-blog-discussion">
        <button id="postBtn" onclick="scrollToTop()">Back To Top</button>
    </div>
    

    <?php require("Components/footer.php")?>

    <script src="js/script.js"></script>
</body>

</html>