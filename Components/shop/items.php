<?php $items = $I->Search($category,$name,$offset); ?>

<?php while($item=$items->fetch_assoc()): ?>
<?php if(isset($_SESSION["Uemail"])&&$item["Uemail"] == $_SESSION["Uemail"]||$item["Istock"]==0){continue;}?>
<div class="item-cart-shop">
    <div class="img-item-cart-shop">
        <img src="<?php echo $item["Ipic"]?>" alt="Coffee design tshirt" class="pic-img-item-cart-shop" />

        <?php if(!isset($_SESSION["Uemail"])|| !$I->Is_liked($_SESSION["Uemail"],$item["Iid"])):?>
            <form id="div-loveSymbol" method="post" action="<?php $_SERVER["PHP_SELF"] ?>#shop-items">
                <input type="hidden" name="Action" value="Like">
                <input type="hidden" name="Iid" value="<?php echo $item["Iid"]?>">
                <input type="submit" name="submit" value="" id="loveSymbol">
            </form>
        <?php endif ?>

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
                    <p><span><?php echo $item["Istock"]?></span> Pieces</p>
                </div>
            </div>

            <div class="qty-detail-item-cart-shop">
                <form action="<?php $_SERVER["PHP_SELF"] ?>#shop-items" method="post">
                    <div>
                        <input type="hidden" name="Action" value="Request">
                        <input type="hidden" name="Iid" value="<?php echo $item["Iid"]?>">
                        Qty: <input type="number" name="Quantity" min="1" max="<?php echo $item["Istock"]?>" required class="num-qty-detail-item-cart-shop" />
                    </div>
                    <input type="submit" name="submit" value="Receive" class="allShopBtn">
                </form>
            </div>
        </div>
    </div>
</div>
<?php endwhile ?>