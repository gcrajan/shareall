<?php
require("php/Classes.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="shortcut icon" href="images/favicon.png" type="image/x-icon" />
	<title>ShareAll</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
	<link rel="stylesheet" href="css/style.css" />
</head>

<body>
	<?php  $active="index";require("Components/nav.php") ?>

	<section id="home-section">
		<div id="homepage">
			<div id="text-homepage">
				<h1>Share anything, anywhere and anytime.</h1>
				<h2>
					This site provides the users to share their things to the needy
					users for free.
				</h2>
				<div id="imgHome">
					<img src="images/explore.jpg" alt="explore" />
					<a href="shop.php">
						<p>Explore</p>
					</a>
				</div>
			</div>
			<div id="video-homepage">
				<video src="images/video.mp4" autoplay muted loop></video>
			</div>
		</div>

		<div id="about">
			<div id="text-about">
				<h1>About Us</h1>
				<div>
					<img id="left-text-about" src="images/left.png" alt="" />
					<img id="right-text-about" src="images/right.png" alt="" />
					<p>
						This is non-profit organization trying to help the needy ones.
						Those who have things that are no longer use to them can give them
						to the person who needs it. In others words, share the things
						rather than throwing them.
					</p>
				</div>
			</div>
			<div id="img-about">
				<div class="img-about-container">
					<a href="shop.php">
						<img src="images/reuse.png" class="img-about-container-image" />
					</a>
					<div class="img-about-container-middle">
						<div class="img-about-container-middle-text">Reuse</div>
					</div>
				</div>

				<div class="img-about-container">
					<a href="shop.php">
						<img src="images/share.png" class="img-about-container-image" />
					</a>
					<div class="img-about-container-middle">
						<div class="img-about-container-middle-text">Share</div>
					</div>
				</div>

				<div class="img-about-container">
					<a href="discussion.php">
						<img src="images/discussion.png" class="img-about-container-image" />
					</a>
					<div class="img-about-container-middle">
						<div class="img-about-container-middle-text">Discussion</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<div id="feedback">
		<div>
			<h1>Feedback</h1>
		</div>
	</div>
	<!-- Swiper -->
	<div class="swiper mySwiper">
		<div class="swiper-wrapper">

			<div class="swiper-slide">
				<div class="div-testominal">
					<img src="images/feedback1.jpg" />
					<div class="txt-div-testominal">
						<p>
							I appreciate the ease of use of this sharing website. It's simple. Plus, it feels good to
							reduce waste by
							passing on items to someone who can use them.
						</p>
					</div>
				</div>
			</div>

			<div class="swiper-slide">
				<div class="div-testominal">
					<img src="images/feedback2.jpg" />
					<div class="txt-div-testominal">
						<p>
							The community is friendly and responsive, and I have been able to find some unique items
							that I wouldn't
							have been able to afford otherwise.
						</p>
					</div>
				</div>
			</div>

			<div class="swiper-slide">
				<div class="div-testominal">
					<img src="images/feedback3.jpg" />
					<div class="txt-div-testominal">
						<p>
							It's a great feeling to know that someone else will be able to benefit from something that
							was just taking
							up space in my closet.
						</p>
					</div>
				</div>
			</div>

			<div class="swiper-slide">
				<div class="div-testominal">
					<img src="images/feedback4.jpg" />
					<div class="txt-div-testominal">
						<p>
							I appreciate the spirit of generosity that this sharing website embodies. It's refreshing to
							see people
							come together to help each other out.
						</p>
					</div>
				</div>
			</div>

			<div class="swiper-slide">
				<div class="swiper-slide">
					<div class="div-testominal">
						<img src="images/feedback5.jpg" />
						<div class="txt-div-testominal">
							<p>
								I really like the variety of items available on this sharing website. From household
								goods to clothing
								to books, there's something for everyone.
							</p>
						</div>
					</div>
				</div>
			</div>

			<div class="swiper-slide">
				<div class="swiper-slide">
					<div class="div-testominal">
						<img src="images/feedback6.jpg" />
						<div class="txt-div-testominal">
							<p>
								The search functionality on this sharing website is really helpful. It makes it easy to
								find specific
								items or browse by category, which saves time and effort.
							</p>
						</div>
					</div>
				</div>
			</div>

			<div class="swiper-slide">
				<div class="swiper-slide">
					<div class="div-testominal">
						<img src="images/feedback7.jpg" />
						<div class="txt-div-testominal">
							<p>
								The sharing economy is a powerful way to combat the culture of consumerism. By sharing
								our resources, we
								can reduce waste and live more sustainably.
							</p>
						</div>
					</div>
				</div>
			</div>

			<div class="swiper-slide">
				<div class="swiper-slide">
					<div class="div-testominal">
						<img src="images/feedback8.jpg" />
						<div class="txt-div-testominal">
							<p>
								<!-- I appreciate the positive feedback I've received from other users. It's rewarding to
								know that I've made
								a difference in someone's life, no matter how small. -->

								I feel deeply fulfilled to see the positive feedback from users and witness how the website has made a difference in their lives, as if it was designed specifically for them.
								
							</p>
						</div>
					</div>
				</div>
			</div>

			<div class="swiper-slide">
				<div class="swiper-slide">
					<div class="div-testominal">
						<img src="images/feedback9.jpg" />
						<div class="txt-div-testominal">
							<p>
								I love being able to share items on this website. Instead of adding to the landfill, I'm
								giving someone
								else the opportunity to use something that's still in good condition.
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="swiper-pagination"></div>
	</div>

	<section id="home-section">
		<div id="rules">
			<div id="text-rules">
				<h1>Some Rules</h1>
			</div>
			<div id="rule-rules">
				<p>
					<img src="images/iconPoint.png" /> You can only share legal
					substances.
				</p>
				<p>
					<img src="images/iconPoint.png" /> We are just platform so we are
					not responsible about the goods quality.
				</p>
				<p>
					<img src="images/iconPoint.png" /> You should respect both
					parties.
				</p>
				<p><img src="images/iconPoint.png" /> No trade exercise.</p>
				<?php if($U->Is_loggedin()):?>
					<p>
						<img src="images/iconPoint.png" /> If you have any suggestions. Fill free.
					</p>
				<?php endif?>

			</div>
			<?php if($U->Is_loggedin()):?>
				<div id="form-rules">
					<form action="">
						<div>
							<label for="topic">Topic: <span> <sup>*</sup> must have an account</span></label>
							<input type="text" id="topic" />
						</div>
						<div>
							<label for="description">Description:</label>
							<input type="text" id="description" />
						</div>
						<input type="submit" class="btn" value="Send">
					</form>
				</div>
			<?php endif?>
		</div>

		<div id="contact-home">
			<div id="text-contact-home">
				<h1>Contact Us</h1>
			</div>
			<div class="main-contact-home">
				<div class="main-contact-home-container">
					<div class="main-contact-home-cards">
						<div class="main-contact-home-card">
							<a href="">
								<img src="images/twitter.png" class="img-contact-home">
							</a>
							<h4>Twitter</h4>
							<p>You can visit our twitter page of ilog. Here, we regularly post an update about our
								products.</p>
						</div>
						<div class="main-contact-home-card">
							<a href="">
								<img src="images/Website.png" class="img-contact-home">
							</a>
							<h4>Web Site</h4>
							<p>You can visit our website of ilog. Here, you can learn more about us.</p>
						</div>
						<div class="main-contact-home-card">
							<a href="">
								<img src="images/linkdin.png" class="img-contact-home">
							</a>
							<h4>Linkedin</h4>
							<p>You can visit our linkedin page of ilog. Here, we regularly post about vaccancy and other
								posts.</p>
						</div>
					</div>
				</div>
			</div>
		</div>

	</section>
	<?php require("Components/footer.php")?>
	<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
	<script>
		var swiper = new Swiper(".mySwiper", {
			slidesPerView: 3,
			spaceBetween: 30,
			autoplay: {
				delay: 2000,
			},
			pagination: {
				el: ".swiper-pagination",
				clickable: true,
			},
		});
	</script>
</body>

</html>