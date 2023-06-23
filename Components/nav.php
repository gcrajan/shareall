<nav id="navigation">
	<div id="navbar">
		<a href="index.php"><img src="images/logo.png" alt="ShareAll" id="logo"></a>
		<div>
			<a href="index.php" <?php if($active=='index' ){echo 'id="active"' ;}?>>Home</a>
			<a href="shop.php" <?php if($active=='shop' ){echo 'id="active"' ;}?>>Shop</a>
			<a href="discussion.php" <?php if($active=='discussion' ){echo 'id="active"' ;}?>>Discussion</a>
			<?php if($U->Is_loggedin()): ?>
			<a href="cart.php" <?php if($active=='cart' ){echo 'id="activeImg"' ;}?> ><img src="images/buying.png">
				<?php $count= $U->Cart_count($_SESSION["Uemail"]);if($count>0): ?><sub>
					<?php echo $count?>
				</sub>
				<?php endif ?>
			</a>
			<a href="profile.php" id="profilePic"> <img src="<?php echo $_SESSION['Upic']?>" <?php if($active=='profile'
					){echo 'id="activeProfile"' ;}?>></a>
			<?php else: ?>
			<a href="login.php"><button class="btnAll">Login</button></a>
			<?php endif; ?>
		</div>
	</div>
</nav>

