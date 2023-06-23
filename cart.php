<?php

require("php/Classes.php") 

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
    <?php  $active="cart";require("Components/nav.php") ?>
    <section id="shop-section">
        <?php $items = $U->Cartitems($_SESSION["Uemail"])?>

        <?php if($items->num_rows<=0): ?>
            <div>
                <p id="shop-topic">Request Some items from shop</p>
            </div>
            <article id="empty-cartPage">
                <img src="images/bgEmptyCartPage.svg" id="image-empty-cartPage">
            </article>
        <?php else: ?>
            <article id="shop-items">
                <div>
                    <p id="shop-topic">Requested Items</p>
                </div>
                <div id="cart-shop">
                    <?php while($item = $items->fetch_assoc()):?>
                        <div class="item-cart-shop">
                            <div class="img-item-cart-shop">
                                <img src="<?php echo $item["Ipic"]?>" alt="<?php echo $item["Iname"]?>" class="pic-img-item-cart-shop" />
                            </div>
                            <div class="detail-item-cart-shop">
                                <div class="heading-detail-item-cart-shop">
                                    <h2><?php echo $item["Iname"]?></h2>
                                </div>
                                <div class="img-detail-item-cart-shop">
                                    <div class="name-img-detail-item-cart-shop">
                                        <div>
                                            <img src="<?php echo $item["Upic"]?>" />
                                            <p><?php echo $item["Uname"]?></p>
                                        </div>
                                        <div>
                                            <p><span><?php echo $item["Rcount"]?></span> Pieces</p>
                                        </div>
                                    </div>

                                    <div class="cart-page-detail">
                                        <p>Address:<span><?php echo $item["Ulocation"]?></span></p>
                                        <p>Phone:<span><?php echo $item["Ucontact"]?></span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile ?>
                </div>
            </article>
        <?php endif ?>
    </section>
    <?php require("Components/footer.php")?>
</body>

</html>