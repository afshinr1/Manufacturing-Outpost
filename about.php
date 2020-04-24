<?php 
	require "header.php";
 ?>

<!DOCTYPE html>
<html>
	<head>
		<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
		<link href='https://fonts.googleapis.com/css?family=Roboto Slab' rel='stylesheet'>
		<link rel="stylesheet" type="text/css" href="aboutstyle.css">
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
			<div class ="highlight">
			  <li><a href="about.php">About</a></li>
			</div>
			  <li><a href="contact.php">Contact</a></li>
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
			<h2>Welcome to the Manufacturer's Outpost</h2> 
			<h3>Buy or sell to the community today!</h3> 
			</div>

			<div class = "description">
			<h4>What do we provide?</h4> 
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam tincidunt magna et urna lobortis, eu fringilla sapien tristique. Nam eget volutpat odio. Duis elementum sodales lectus. Etiam volutpat fringilla venenatis. Cras eu nisl cursus, gravida turpis eu, cursus tortor. Aliquam in lectus bibendum lorem ullamcorper ullamcorper non eget tortor. Sed ante libero, auctor a elementum sit amet, euismod sit amet augue. Fusce vel sapien vehicula, laoreet urna vel, porta mi. Morbi tempus libero eget tempor feugiat.

			Nullam sagittis imperdiet finibus. Curabitur sed est tincidunt, faucibus nunc ut, laoreet arcu. Fusce ornare, ipsum at laoreet facilisis, neque lacus eleifend leo, quis ullamcorper tortor tortor sit amet nulla. Fusce accumsan mauris lobortis sem scelerisque, non dignissim odio pretium. Vestibulum lobortis luctus dolor, et luctus magna fringilla quis. Nunc vel ipsum dignissim, sodales tellus in, venenatis lacus. Cras venenatis semper lacus, vel venenatis sapien volutpat a. Vestibulum sodales suscipit neque, eu pulvinar libero imperdiet quis. Quisque fringilla nibh et metus congue, nec condimentum tellus suscipit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eu ante dapibus, egestas lacus ac, mollis purus.

			Proin sit amet mattis lacus. Nam eget dui eu felis elementum consectetur in at dolor. Donec laoreet vel augue ut semper. Morbi interdum libero in metus molestie, ut rutrum nunc condimentum. Donec eget sapien ac odio laoreet sollicitudin quis sit amet ex. Suspendisse ultricies eros suscipit risus dapibus, in mollis augue elementum. Nulla viverra mi elementum leo malesuada, in congue turpis commodo. Praesent tempor urna vitae lacus blandit feugiat. </p>

			<h4>Why choose us?</h4> 
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam tincidunt magna et urna lobortis, eu fringilla sapien tristique. Nam eget volutpat odio. Duis elementum sodales lectus. Etiam volutpat fringilla venenatis. Cras eu nisl cursus, gravida turpis eu, cursus tortor. Aliquam in lectus bibendum lorem ullamcorper ullamcorper non eget tortor. Sed ante libero, auctor a elementum sit amet, euismod sit amet augue. Fusce vel sapien vehicula, laoreet urna vel, porta mi. Morbi tempus libero eget tempor feugiat.

			Nullam sagittis imperdiet finibus. Curabitur sed est tincidunt, faucibus nunc ut, laoreet arcu. Fusce ornare, ipsum at laoreet facilisis, neque lacus eleifend leo, quis ullamcorper tortor tortor sit amet nulla. Fusce accumsan mauris lobortis sem scelerisque, non dignissim odio pretium. Vestibulum lobortis luctus dolor, et luctus magna fringilla quis. Nunc vel ipsum dignissim, sodales tellus in, venenatis lacus. Cras venenatis semper lacus, vel venenatis sapien volutpat a. Vestibulum sodales suscipit neque, eu pulvinar libero imperdiet quis. Quisque fringilla nibh et metus congue, nec condimentum tellus suscipit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eu ante dapibus, egestas lacus ac, mollis purus.

			Proin sit amet mattis lacus. Nam eget dui eu felis elementum consectetur in at dolor. Donec laoreet vel augue ut semper. Morbi interdum libero in metus molestie, ut rutrum nunc condimentum. Donec eget sapien ac odio laoreet sollicitudin quis sit amet ex. Suspendisse ultricies eros suscipit risus dapibus, in mollis augue elementum. Nulla viverra mi elementum leo malesuada, in congue turpis commodo. Praesent tempor urna vitae lacus blandit feugiat. </p>
			</div>
			</div>

		</div>
	</body> 

</html>