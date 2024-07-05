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
		<h1>Contact Us</h1>
	</section>

<!------ contact us ------>

<section class="location">
	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3870.6349831975217!2d120.65162801447528!3d14.039637994341575!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bd96f7781880b9%3A0xeaaa62f93f057902!2sLIAN%20WATER%20DISTRICT!5e0!3m2!1sen!2sph!4v1667196462334!5m2!1sen!2sph" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
	
</section>

<section class="contact-us">
	
	<div class="row">
		<div class="contact-col">
			<div>
				<i class="fa fa-map-marker"></i>
				<span>
					<h5>Address</h5>
					<p>Dona Salome Subdivision,<br>Malaruhatan,Lian,Batangas<br>4216</p>
				</span>
			</div>
			<div>
				<i class="fa fa-phone"></i>
				<span>
					<h5>Phone</h5>
					<p>0927-293-0889</p>
				</span>
			</div>
			<div>
				<i class="fa fa-envelope"></i>
				<span>
					<h5>Email</h5>
					<p>seasmanagement3@gmail.com</p>
				</span>
			</div>
		</div>
		<div class="contact-col">
			<form action="mes_code.php" method="POST">
			<?php include('message.php'); ?>
				<input type="text" name="customer_name" placeholder="Enter your name" required>
				<input type="email" name="customer_email" placeholder="Enter email address" required>
				<input type="text" name="customer_subject" placeholder="Enter your subject" required>
				<textarea rows="8" name="customer_message" placeholder="Message" required></textarea>
				<button type="submit" name="save_message" class="hero-btn red-btn" onclick="msg()">Send Message</button>

				<script>
					function msg(){
						var result = confirm ('Are you sure you want to send this message?');
						if(result==false){
							event.preventDefault();
						}
					}
				</script>
			</form>

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
	    <!-- Bootstrap core JavaScript-->
		<script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>