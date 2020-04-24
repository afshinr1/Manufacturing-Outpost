<!DOCTYPE html>
<?php 
	require "header.php";

 ?>
<html>
<head>
	<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
	<link rel="stylesheet" type="text/css" href="signupstyle.css">
	<title>Manufacturer's Outpost - Sign up</title>
</head>
<body>
	<div class = logo>
		</div>
		<div class ="signupbox"> 
			<h1> Create an account </h1> 
			<?php
				if(isset($_GET['error'])){
				if($_GET['error'] == "invaliduid"){
					echo '<p class = "signuperror" >Invalid username </p>';	
				}
			else  if($_GET['error'] == "invalidmail"){
				echo '<p class = "signuperror" >Invalid email</p>';	
				}
				
					else  if($_GET['error'] == "emptyfields"){
				echo '<p class = "signuperror" > Empty fields </p>';	
				}
			else  if($_GET['error'] == "passwordcheck"){
				echo '<p class = "signuperror" > Passwords do not match </p>';	
				}
					else  if($_GET['error'] == "userTaken"){
				echo '<p class = "signuperror" > Username Taken </p>';	
				}
			}
			  else if (isset($_GET["signup"])) {
            if ($_GET["signup"] == "success") {
              echo '<p class="signupsuccess">Signup successful!</p>';
            }
          }
			?>
			
			<form action="includes/signup.inc.php" method = "post"> 
				<p> Username </p>
				<input type="text" name="uid" placeholder="Enter Username">
				<p> Email </p>
				<input type="text" name="mail" placeholder="Enter Email">
				<p> Name </p>
				<input type="text" name="name" placeholder="Enter Name">
				<p> Business Name </p>
				<input type="text" name="business" placeholder="Enter Business Name">
				<p> Business Address </p>
				<input type="text" name="address" placeholder="Enter Business Address">
				<p> Password </p> 
				<input type="password" name="pwd" placeholder="Enter Password">
				<p> Confirm Password </p> 
				<input type="password" name="pwd-confirm" placeholder="Enter Password">
				<input type="submit" name="signup-submit" value="Sign Up">
			</form>
		</div>
</body>
</html>