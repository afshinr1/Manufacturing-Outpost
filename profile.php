<?php 
	//session_start();
	require "header.php";
 ?>

<!DOCTYPE html>
<html>
	<head>
		<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
		<link href='https://fonts.googleapis.com/css?family=Roboto Slab' rel='stylesheet'>
		<link rel="stylesheet" type="text/css" href="profilestyle.css">
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
					echo '
					<div class ="highlight">
					<li><a href="profile.php">Profile</a></li>
					</div>';
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
			<div class = "content"> 
			<div class = "title">
			<!-- Get name of user -->
				<?php 
					require 'includes/dbh.inc.php';
					if (isset($_SESSION['userId'])) {
						$sql = "SELECT nameUsers FROM users WHERE idUsers = ".$_SESSION['userId']. ";";
						$result = mysqli_query($conn, $sql);
						$row = mysqli_fetch_array($result);
						echo "<h2>" . $row['nameUsers'] . "</h2>";
						$conn->close();
					}
				?>
			<img src="img/profile.png"></img>
			<!-- Get business name of user -->
				<?php 
					require 'includes/dbh.inc.php';
					if (isset($_SESSION['userId'])) {
						$sql = "SELECT businessUsers FROM users WHERE idUsers = ".$_SESSION['userId']. ";";
						$result = mysqli_query($conn, $sql);
						$row = mysqli_fetch_array($result);
						echo "<h3>" . $row['businessUsers'] . "</h3>";
						$conn->close();
					}
				?>
			<!-- Get location of business-->
				<?php 
					require 'includes/dbh.inc.php';
					if (isset($_SESSION['userId'])) {
						$sql = "SELECT baddressUsers FROM users WHERE idUsers = ".$_SESSION['userId']. ";";
						$result = mysqli_query($conn, $sql);
						$row = mysqli_fetch_array($result);
						echo "<h3>" . $row['baddressUsers'] . "</h3>";
						$conn->close();
					}
				?>
			</div>
				<a href = orderHistory.php>Orders</a>
			</div>

		</div>
	</body> 

</html>