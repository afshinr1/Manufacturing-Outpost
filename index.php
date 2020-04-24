<?php 
	//session_start();
	require "header.php";
 ?>

<!DOCTYPE html>
<html>
	<head>
		<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
		<link href='https://fonts.googleapis.com/css?family=Roboto Slab' rel='stylesheet'>
		<link rel="stylesheet" type="text/css" href="style.css">
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
		</div>

		<!-- Login Form -->
		<?php 
		if (isset($_SESSION['userId'])) {

		} else {
			
				if(isset($_GET['error'])){
				if($_GET['error'] == "wrongpassword"){
					echo '<p class = "signuperror" >Wrong password </p>';	
				}
			else  if($_GET['error'] == "nouser"){
				echo '<p class = "signuperror" >Invalid Username </p>';	
				}
				
					else  if($_GET['error'] == "emptyfields"){
				echo '<p class = "signuperror" > Empty fields </p>';	
				}
		
				
			}
			
						
			echo '
				<form action="includes/login.inc.php" method="post">
					<div class="loginbox" id="loginform">
						<h4>Customer Sign In</h4>
						<p>Username</p>
						<input type="text" placeholder="Enter Username" name="uname">
					    <p>Password</p>
					    <input type="password" placeholder="Enter Password" name="psw">
						<input type="submit" name="login-submit" value="Login">
						<div class="button2">
						<input type="submit" name="businessUser" value="Sign In As Business">
						</div>
					</div>
				</form>';
		}
		?>

	</body> 

</html>