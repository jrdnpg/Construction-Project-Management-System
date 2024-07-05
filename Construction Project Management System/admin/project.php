<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>

 <!-- for FF, Chrome, Opera -->
 <link rel="icon" type="image/png" href="img/man.png" sizes="16x16">
    <link rel="icon" type="image/png" href="img/man.png" sizes="32x32">

    <!-- for IE -->
    <link rel="icon" type="image/x-icon" href="img/man.ico" >
    <link rel="shortcut icon" type="image/x-icon" href="man.ico"/>


	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Construction Management System</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;600;700&display=swap" rel="stylesheet">
	<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
</head>
<body>
	<section class="sub-header">
		<nav>
			<div class="logo">
			<p >SEAS</p>
			</div>
			<div class="nav-links" id="navLinks">
				<i class="fa fa-times" onclick="hideMenu()"></i>
				<ul>
					<li><a href="index.html">HOME</a></li>
					<li><a href="about.html">ABOUT</a></li>
					<li><a href="services.html">SERVICES</a></li>
					<li><a href="project.php">PROJECTS</a></li>
					<li><a href="contact.php">CONTACT</a></li>
				</ul>
			</div>
			<i class="fa fa-bars" onclick="showMenu()"></i>
		</nav>
		<h1>Our Construction Projects</h1>
	</section>

<!------ project page content ------>

<section class="blog-content">
	<div class="row">
		<div class="blog-left">
			<img src="images/blogbanner.jpg">
			<h2>We excel in</h2>
			<p>Building incredible custom houses with architectural designs is SEAS Constructions' passion. With our meticulous attention to detail and "we can do that" approach, we ensure that building or renovating a house with us will be memorable for all the right reasons, from the foundations, frame, outside elements, through to luxury finishes on your flooring, cabinetry, and electricity.</p>
			<br>
			<p>We employ tradespeople who excel in their fields. We make sure that no request is too difficult or is answered with the response "that's not what we generally do," whether you want a concrete slab ready for concrete polishing or a minimalist epoxy white floor put.</p>
			<br>
			<p>We will fulfill your wish if it is achievable. If it cannot, we can offer suggestions on other alternatives to help you get the desired style and finish. SEAS Constructions will collaborate with you, your architect, and your interior designer to achieve excellence since we are driven to be known for our flawless work.</p>
			<br>
			<p>Like our clients, we are also remodeling enthusiasts! We work with you to make sure your renovation is everything you expected and more, whether you're thinking about extending, adding a level to your current house, or upgrading a significant portion within your home. We work assiduously to ensure your restoration is completed to the greatest standard and participate in your joy at seeing the difference from the before to after.</p>
			<br>
			<p>If you can dream it, we can build it, is something we truly believe in.</p>

			<div class="comment-box">
				<h3>Leave a comment</h3>
				<form class="comment-form "action="mes_code.php" method="POST">
					<input type="text" name="comment_name" required placeholder="Enter Name">
					<input type="email" name="comment_email" required placeholder="Enter Email">
					<textarea rows="5" name="comment_message" required placeholder="Your Comment">	
					</textarea>
					<button type="submit" name="save_comment" class="hero-btn red-btn" onclick="msg()">Send Comment</button>

					<script>
						function msg(){
							var result = confirm ('Are you sure?');
							if(result==false){
								event.preventDefault();
							}
						}
					</script>

			</form>
				</form>
			</div>

			


		</div>
		<div class="blog-right">
			<h3>Post Categories</h3>
			<div>
				<span>Plumbing Works</span>
				<span>13</span>
			</div>
			<div>
				<span>Engineering Works</span>
				<span>6</span>
			</div>
			<div>
				<span>Architectural Works</span>
				<span>6</span>
			</div>
			<div>
				<span>Sanitary Works</span>
				<span>15</span>
			</div>
			<div>
				<span>Mechanical Works</span>
				<span>18</span>
			</div>
			<div>
				<span>Electrical Works</span>
				<span>21</span>
			</div>
		</div>
	</div>
</section>


<!------ Footer ------>

<section class="footer">
	<p>Copyright © SEAS Construction 2022</p>
</section>

<!----------JavaScript for Toggle Menu---->
	<script>
		var navLinks = document.getElementById('navLinks');

		function showMenu(){
			navLinks.style.right = "0";
		}
		function hideMenu(){
			navLinks.style.right = "-200px";
		}

	</script>
</body>
</html>