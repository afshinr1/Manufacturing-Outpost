<?php 
	session_start();
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
		<a href="businessprofile.php"> MANUFACTURER'S OUTPOST </a>
		</div>
		<div class="nav">
			<ul>
			<?php 
				if (isset($_SESSION['userId'])) {
					echo '
					<div class ="highlight">
					<li><a href="businessprofile.php">Profile</a></li>
					</div>';
				} else {}
			?>
		  	<?php 
				if (isset($_SESSION['userId'])) {
					echo '<li><a href="myItems.php">My Items</a></li>
					<li><a href="mycustomers.php">My Customers</a></li>';
				} else {}
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
						$sql = "SELECT Fname, Lname FROM adminusers WHERE idUsers = ".$_SESSION['userId']. ";";
						$result = mysqli_query($conn, $sql);
						$row = mysqli_fetch_array($result);
						echo "<h2>" . $row['Fname'] . " " . $row['Lname'] . "</h2>";
				
						$conn->close();
						
					}
				?>
			<img src="img/profile.png"></img>
		
			<br> </br>
			</div>
				<a href = additem.php>Add Item</a>
			</div>

		</div>
	</body> 

</html>