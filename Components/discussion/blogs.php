<?php $blogs = $B->Data_latest_20();?>

<?php if($U->Is_loggedin() || $blogs->num_rows<=0 ): ?>
    <section id="discussion-banner">
        <div id="text-discussion-banner">
            <p id="main-text">Let's discuss</p>
            <p id="secondary-text">Here , you can post about the items that you need.
            </p>
            <p id="typewrite-text">
                <a href="" class="typewrite" data-period="2000"
                    data-type='[ "Only 20 latest discussion will be shown, remaining gets removed." ]'
                    id="span-decision-typewrite-text">
                    <span class="wrap"></span>
                </a>
            </p>
        </div>
        <div>
            <?php if($U->Is_loggedin()): ?>
                <button id="writeBtn">Write Blog</button>
                <!-- The Modal -->
                <div id="postDiscussionItem-myModal" class="postShopItem-modal">
                    <!-- Modal content -->
                    <div id="content-postShopItem-modal">
                        <span class="close-postDiscussionItem-modal">&times;</span>
                        <div class="modal-container-loginRegister">
                            <p id="modal-main-text-loginRegister">Create Blog</p>

                            <form enctype="multipart/form-data" action="<?php echo $_SERVER["PHP_SELF"]?>" method="post" class="modal-div-form-loginRegister">
                                <div class="modal-form-loginRegister">    
                                    <input type="hidden" value="Create" name="Action">

                                    <label for="modal-blog-title">Write a title.</label>
                                    <input type="text" name="Title" id="modal-blog-title" required>

                                    <label for="modal-blog-description">Write a message.</label>
                                    <textarea name="Description" id="modal-blog-description" cols="10" rows="10" required></textarea>

                                    <label for="profilePic">Profile Picture</label>
                                    <input type="file" id="profilePic" accept="image/*" name="Pic">
                                </div>

                                <input type="submit" name="submit" class="btn-loginRegister" value="Create Blog">
                            </form>
                        </div>
                    </div>
                </div>
            <?php endif  ?>
        </div>
        <div id="imgdiv-discussion-banner">
            <img src="images/onlineDiscussion.svg" id="img-discussion-banner">
        </div>
    </section>
<?php endif  ?>



<section id="div-discussion">
    <?php while($blog = $blogs->fetch_assoc()): ?>
        <div class="blog-div-discussion">

            <?php if($blog["Bpic"]!=""||$blog["Bpic"]!=null):  ?>
                <img src="<?php echo $blog["Bpic"] ?>" alt="blogpost image" class="img-blog-div-discussion">
            <?php endif ?>

            <div class="blogpost-blog-div-discussion">
                <h1 class="blog-title-blog-div-discussion"><?php echo $blog["Btitle"] ?></h1>
                <div class="user-info-blog-div-discussion">
                    <img src="<?php echo $blog["Upic"] ?>" alt="blog image" class="user-info-img-blog-div-discussion">
                    <p class="blog-uname-blog-div-discussion"><?php echo $blog["Uname"] ?></p>
                    <?php if(isset($_SESSION["Uemail"])  && $blog["Uemail"] == $_SESSION["Uemail"]): ?>
                        <form action="<?php echo $_SERVER["PHP_SELF"]?>" method="POST">
                            <input type="hidden" value="Delete" name="Action">
                            <input type="hidden" value="<?php echo $blog["Bid"]?>" name="Bid">
                            <button type="submit" name="submit" class="button-input"></button>
                        </form>
                    <?php endif?>
                </div>
                <div class="blog-desc-blog-div-discussion">
                    <p><?php echo $blog["Bdiscription"] ?></p>
                </div>
            </div>
        </div>
    <?php  endwhile ;    ?>
</section>