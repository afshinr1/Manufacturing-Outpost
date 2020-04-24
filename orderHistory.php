<?php 
	require "header.php";
	$uid = $_SESSION["userUid"];
	$connect = mysqli_connect('localhost','root','','loginsystem');


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
			<div class = "content"> 
			<div class = "title">
			<h2>Order History</h2> 
			</div>

			<div class = "description">
		
			</div>
			</div>
		</div>
	</body> 
	      <body>  
           <br />  
			
		  
           <div class="container" style="width:700px;">  
                  <?php
		
				  
                    $qury = "SELECT * FROM history WHERE username = '$uid'";
                    $result = mysqli_query($connect,$qury);
                    if(mysqli_num_rows($result) >0)
                    {
                      while($row = mysqli_fetch_array($result))
                      {

                  ?>
                <div class="col-md-4">  
                     <form method="post" action="catalogue.php?action=add&productID=<?php echo $row["productID"];?>">  
                          <div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;" align="center">  
                             <h4 class="text-info"><?php echo $row['productname'].' ('.$row['quantity'].')';?></h4> 
                               <h4 class="text-danger">$<?php echo $row['price'];?></h4>

						

                          </div>  
                     </form>  
                </div>  
				
                  <?php } } ?>
                <div style="clear:both"></div>  
                <br />  
                <div class="table-responsive">  
                     <table class="table table-bordered">  
                     
                             <?php 
                           if(!empty($_SESSION["shopping_cart"]))
                           {
                            $total = 0;
                            foreach($_SESSION["shopping_cart"] as $key => $value)
                           {

                             ?>
                    
                          <?php $total = $total + ($value["item_quantity"] * $value['item_price']);
                        }
                        ?>
                           
                    
                          <?php } ?> 
                           
                     </table>  
                </div>  
           </div>  
	
           <br />  
		 
      </body> 


</html>