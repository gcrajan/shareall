<?php
$category="";$name="";$offset=0;

require("php/Classes.php");
if( $_SERVER["REQUEST_METHOD"]=="POST" &&  isset($_POST["submit"]))
{

	if(isset($_SESSION["Uemail"]))
	{
		if($_POST["Action"]=="Create")
		{
			if(!$I->Create($_SESSION["Uemail"],$_POST["Name"],$_POST["Quantity"],$_FILES["Pic"],$_POST["Category"]))	{ echo "Error creating item"; }
			else{echo "Item Created";}
		}
		else if($_POST["Action"]=="Request")
		{
			if($I->Request($_POST["Iid"],$_SESSION["Uemail"],$_POST["Quantity"])){echo "Request success";}
		}
		else if($_POST["Action"]=="Search")
		{
			if(isset($_POST["SearchValue"]) && $_POST["SearchValue"]!="" ){	$category=$_POST["SearchValue"];$name=$_POST["SearchValue"];}
			else{$category="";$name="";}
		}
		else if($_POST["Action"]=="Like"){ if(!$U->Likes($_SESSION["Uemail"],$_POST["Iid"])){echo "Error giving like";}	}
		else if($_POST["Action"]=="Categoryfilter"){ $category=$_POST["Category"];$name=$_POST["Category"];	}
	}
	else
	{
		header("Location:login.php");
	}
    unset($_POST);

}


?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="shortcut icon" href="images/icon.png" type="image/x-icon" />
	<title>ShareAll</title>
	<link rel="stylesheet" href="css/style.css" />
</head>

<body>
	
	<?php  $active="shop";require("Components/nav.php") ?>

	<section id="shop-section">
		<article id="shop-banner">
			<div id="shop-banner-text">
				<h3>ShareAll</h3>
				<h4>Share to care.</h4>
				<p>Share, Create, Search and Receive</p>
				<p id="typewrite-text">
					<a href="" class="typewrite" data-period="2000"
						data-type='[ "This is non-profit.", "Share things to spread love.", "Receive what you want.", "Reuse, Share and Discussion." ]'
						id="span-shop-typewrite-text">
						<span class="wrap"></span>
					</a>
				</p>

			</div>
			<div id="shop-banner-image">
				<img src="images/shopBanner1.png" />
				<?php  if($U->Is_loggedin()):  ?>
				<button id="createBtn">Create Items</button>
				<?php endif ?>
			</div>
		</article>

		<?php  if($U->Is_loggedin()):  ?>
			<!-- The Modal -->
			<div id="postShopItem-myModal" class="postShopItem-modal">
				<!-- Modal content -->
				<div id="content-postShopItem-modal">
					<span class="close-postShopItem-modal">&times;</span>
					<div class="modal-container-loginRegister">
						<p id="modal-main-text-loginRegister">Create Item</p>
						<form action="<?php echo $_SERVER["PHP_SELF"]?>" class="modal-div-form-loginRegister" method="post" enctype="multipart/form-data">

							<input type="hidden" name="Action" value="Create">

							<div class="modal-form-loginRegister">

								<label for="productName">Product Name</label>
								<input type="text" name="Name" placeholder="laptop bag" id="productName" required />

								<label for="productQuantity">Product Quantity</label>
								<input type="number" name="Quantity" placeholder="10" id="productQuantity" min="1" required />

								<label for="productCategory">Product Category</label>
								<select name="Category" id="productCategory" required>
									<option value="Extras" selected>Extras</option>
									<option value="Clothes">Clothes</option>
									<option value="Books">Books</option>
									<option value="Electronic">Electronic</option>
									<option value="Gardening">Gardening</option>
									<option value="Household">Household</option>
								</select>

								<label for="profilePic">Product Picture</label>
								<input type="file" id="profilePic" accept="image/*" required name="Pic">
							</div>

							<input type="submit" name="submit" class="btn-loginRegister" value="Create Item">
						</form>
					</div>
				</div>
			</div>
		<?php  endif ?>

		<?php  require("Components/shop/categoryoptions.php") ?>

		<article id="shop-ranked">
			<div>
				<p id="shop-topic">Most Liked</p>
			</div>
			<div id="shop-ranked-items">
				<?php require("Components/shop/mostliked.php")   ?>
			</div>
		</article>

		<article id="shop-items">

			<div id="topic-shop-items">
				<p id="shop-topic">All Items</p>
				<div id="shop-banner-text-search">
					<form method="post" action="<?php echo $_SERVER["PHP_SELF"]?>#shop-items">
						<input type="hidden" name="Action" value="Search">
						<input type="text" name="SearchValue" placeholder="eg. laptop bag" id="shop-banner-text-search-input" />
						<input type="submit" name="submit" value="" id="shop-banner-text-search-button" />
					</form>
				</div>
			</div>

			<div id="cart-shop"><?php require("Components/shop/items.php"); ?></div>
		</article>

	</section>

	<?php require("Components/footer.php")?>

	<script src="js/shopScript.js"></script>
</body>

</html>