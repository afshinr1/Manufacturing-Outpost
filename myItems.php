<?php
//connection to database
require "header.php";
  $connect = mysqli_connect('localhost','root','','loginsystem');
$uid = $_SESSION["userUid"];

	
    $qury = "SELECT * FROM product WHERE Rusername = '$uid' ORDER BY productID ASC";
	$result = mysqli_query($connect,$qury);
	
    if(isset($_POST["remove"]))
    {      
		if($row = mysqli_fetch_assoc($result))
		{
			
			$prodID = 	$_GET["productID"];
		  $qury = "DELETE FROM product WHERE Rusername = '$uid' AND productID = '$prodID'";
			if(mysqli_query($connect,$qury)){
				header("Location: MyItems.php?delete=success");

			}
			else
			header("Location: MyItems.php?delete=fail");

		}
		        
      
 
    }


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
                <h3 align="center">My Products</h3><br />  
				<?php
			 if (isset($_GET["delete"])) {
            if ($_GET["delete"] == "success") {
              echo '<p class="signupsuccess">Removal successful!</p>';
            }
          }
				?>
                  <?php
                    $qury = "SELECT * FROM product WHERE Rusername = '$uid' ORDER BY productID ASC";
                    $result = mysqli_query($connect,$qury);
                    if(mysqli_num_rows($result) >0)
                    {
                      while($row = mysqli_fetch_array($result))
                      {

                  ?>
                <div class="col-md-4">  
                     <form method="post" action="MyItems.php?action=add&productID=<?php echo $row["productID"];?>">  
                          <div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;" align="center">  
                               <h4 class="text-info"><?php echo $row['name'].' ('.$row['stock'].' Left)';?></h4>
                               <h4 class="text-danger">$<?php echo $row['price'];?></h4>
                               <h4 class="text-info"><?php echo $row['description'];?></h4>
								<h4 class="text-info"><?php echo $row['rating'];?></h4>

							  <input type="hidden" name="hidden-desc" value="<?php echo $row['description'] ?>" />
                            <input type="hidden" name="hidden_name" value="<?php echo $row['name'] ?>" />
                            <input type="hidden" name="hidden_price" value="<?php echo $row['price'];?>">
                            <input type="hidden" name="hidden_price" value="<?php echo $row['rating'];?>">

                             <input type="submit" name="remove" style="margin-top:5px;" class="btn btn-success" value="Remove Item" />


                          </div>  
                     </form>  
                </div>  
				
                  <?php } } ?>
                <div style="clear:both"></div>  
                <br />  
   
           </div>  
		
           <br />  
		 
      </body>  
 </html>