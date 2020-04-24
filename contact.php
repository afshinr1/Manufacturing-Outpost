<?php 
	require "header.php";
 ?>

<!DOCTYPE html>
<html>
	<head>
		<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
		<link href='https://fonts.googleapis.com/css?family=Roboto Slab' rel='stylesheet'>
		<link rel="stylesheet" type="text/css" href="contactstyle.css">
		<title> Manufacturer's Outpost </title> 
	</head> 
	<body> 
		<div class = logo>
		<a href="index.php"> MANUFACTURER'S OUTPOST </a>
		</div>
		<div class="nav">
			<ul>
			<?php 
				if (isset($_SESSION['userId'])) {
					echo '<li><a href="profile.php">Profile</a></li>';
				} else {}
			?>
		  	<?php 
				if (isset($_SESSION['userId'])) {
					echo '<li><a href="catalogue.php">Catalogue</a></li>';
				} else {}
			?>
			  <li><a href="about.php">About</a></li>
			<div class ="highlight">
			  <li><a href="contact.php">Contact</a></li>
			</div>
			  	<?php 
				if (isset($_SESSION['userId'])) {
				} else {
					echo '<li><a href="signup.php">Sign Up</a></li>';
				}
				?>
			</ul>
			<?php  
				if (isset($_SESSION['userId'])) {
					echo '
					<div class="logout-container">
							<form action = "includes/logout.inc.php" method="post">
								<button type="submit">Logout</button>
							</form>
					</div>';
				}
			?>
			<div class = "content"> 
			<div class = "title">
			<h2>Contact Us</h2> 
			</div>

			<div class = "description">
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam tincidunt magna et urna lobortis, eu fringilla sapien tristique. Nam eget volutpat odio. 
			</p>
			</div>
			<div class = "contactInfo">
			<p>Calgary, AB</p>
			<p>(587)999-9999</p>
			<p>ManufacturersOutpost@gmail.com</p>
			</div>
			</div>
		</div>
	</body> 

</html>