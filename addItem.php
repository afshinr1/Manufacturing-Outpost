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
      <head>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
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
						<li><a href="mycustomers.php">My Customers</a></li>
'
					;
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
	

		</div>
           <br />  
			
 </html>  


	<main>
		<div class = "wrapper-main">
			<section class="section-default">
			<h1>Add New Item</h1>
			
				<?php
			if(isset($_GET['error'])){
					echo '<p class = "signuperror" >Fill in all fields </p>';	
			}
			
			else if (isset($_GET["addItem"])) {
				if ($_GET['addItem'] == "success") {
					echo '<p class = "signupsuccess" >Add Item Success </p>';		
				}
				elseif ($_GET['addItem'] == "failure"){
					echo '<p class = "signuperror" >Please enter valid values </p>';		
					}
          }

			
		
			
			?>
			
			<form class="form-signup" action="includes/addItem.inc.php" method="post">
				<input type = "text" name="stock" placeholder = "Stock">
				<input type = "text" name="productname" placeholder = "Name of Product">
				<input type = "text" name="desc" placeholder = "Description">
				<input type = "text" name="price" placeholder = "Price">
				<input type = "text" name="rating" placeholder = "Rating (1-10)">

				<button type = "submit" name = "add-submit">Submit</button>
				</form>
			</section>
		</div>
	</main>
	
<?php
	//require "footer.php";
?>