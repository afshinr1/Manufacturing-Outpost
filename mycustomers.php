<?php
//connection to database
require "header.php";
  $connect = mysqli_connect('localhost','root','','loginsystem');
$uid = $_SESSION["userUid"];



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
		';
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
			
           <div class="container" style="width:700px;">  
                <h3 align="center">My Customers</h3><br /> 
                     <table class="table table-bordered">  
				
						<tr> 
                               <th width="40%">Item Name</th>  
                               <th width="10%">Customer Name</th>  
                               <th width="20%">Price</th>  
                       
                          </tr>  
		

                  <?php
                    $qury = "SELECT * FROM product AS p, users AS u, history AS h WHERE Rusername = '$uid' AND p.productID = h.productID AND h.username = u.uidUsers";
                    $result = mysqli_query($connect,$qury);
                    if(mysqli_num_rows($result) >0)
                    {
                      while($row = mysqli_fetch_array($result))
                      {

                  ?>
								<tr> 
								<td><?php echo $row['name'];?></td>  
                               <td><?php echo $row['nameUsers']; ?></td>  
                               <td>$<?php echo $row['price'];?></td>  
							   </tr>

				
                  <?php } } ?>
				  
                <br />  
           </div>  
		
           <br />  
		 
      </body>  
 </html>