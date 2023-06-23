<article id="shop-category">
    <div>
        <p id="shop-topic">Top Categories</p>
    </div>

    <div id="item-shop-category">

        <div id="single-item-shop-category">
            <form action="<?php echo $_SERVER["PHP_SELF"]."#shop-items"?>" method="post">
                <input type="hidden" name="Action" value="Categoryfilter">
                <input type="hidden" name="Category" value="">
                <button type="submit" name="submit">
                    <img src="images/all.png" id="image-single-item-shop-category">
                    <p>All</p>
                </button>
            </form>
        </div>

        <div id="single-item-shop-category">
            <form action="<?php echo $_SERVER["PHP_SELF"]."#shop-items"?>" method="post">
                
                <input type="hidden" name="Category" value="Books">
                <button type="submit" name="submit">
                    <img src="images/books.png" id="image-single-item-shop-category">
                    <p>Books</p>
                </button>
            </form>
        </div>

        <div id="single-item-shop-category">
            <form action="<?php echo $_SERVER["PHP_SELF"]."#shop-items"?>" method="post">
                <input type="hidden" name="Action" value="Categoryfilter">
                <input type="hidden" name="Category" value="Household">
                <button type="submit" name="submit">
                    <img src="images/household.png" id="image-single-item-shop-category">
                    <p>Household</p>
                </button>
            </form>
        </div>

        <div id="single-item-shop-category">
            <form action="<?php echo $_SERVER["PHP_SELF"]."#shop-items"?>" method="post">
                <input type="hidden" name="Action" value="Categoryfilter">
                <input type="hidden" name="Category" value="Electronic">
                <button type="submit" name="submit">
                    <img src="images/electronics.png" id="image-single-item-shop-category">
                    <p>Electronic</p>
                </button>
            </form>
        </div>

        <div id="single-item-shop-category">
            <form action="<?php echo $_SERVER["PHP_SELF"]."#shop-items"?>" method="post">
                <input type="hidden" name="Action" value="Categoryfilter">
                <input type="hidden" name="Category" value="Gardening">
                <button type="submit" name="submit">
                    <img src="images/gardening.png" id="image-single-item-shop-category">
                    <p>Gardening</p>
                </button>
            </form>
        </div>

        <div id="single-item-shop-category">
            <form action="<?php echo $_SERVER["PHP_SELF"]."#shop-items"?>" method="post">
                <input type="hidden" name="Action" value="Categoryfilter">
                <input type="hidden" name="Category" value="Clothes">
                <button type="submit" name="submit">
                    <img src="images/clothes.png" id="image-single-item-shop-category">
                    <p>Clothes</p>
                </button>
            </form>
        </div>

        <div id="single-item-shop-category">
            <form action="<?php echo $_SERVER["PHP_SELF"]."#shop-items"?>" method="post">
                <input type="hidden" name="Action" value="Categoryfilter">
                <input type="hidden" name="Category" value="Extra">
                <button type="submit" name="submit">
                    <img src="images/extra.png" id="image-single-item-shop-category">
                    <p>Extra</p>
                </button>
            </form>
        </div>

    </div>
</article>
