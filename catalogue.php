<?php 
	require "header.php";

	  $connect = mysqli_connect('localhost','root','','loginsystem');

 ?>
 
 <?php

	if(isset($_POST["checkout"])){
			header("Location: ../index.php?successful");

	

	}	
	$qury = "SELECT * FROM product ORDER BY productID ASC";
	$result = mysqli_query($connect,$qury);
	
    if(isset($_POST["add_to_cart"]))
    {
      if(isset($_SESSION["shopping_cart"]))
      {
		if($row = mysqli_fetch_assoc($result))
		{
			if($_GET['productID'] == $row['productID'] && $_POST["quantity"] > $row['stock'])
			{
				echo '<script>alert("Not enough stock ")</script>';
				echo '<script>window.location = "catalogue.php"</script>';
			}
			else
			{
				$item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
				if(!in_array($_GET["productID"], $item_array_id))
				{
				  $count = count($_SESSION["shopping_cart"]);
			//get all item detail
					$item_array = array(
							  'item_id'       =>   $_GET["productID"],
							  'item_name'     =>   $_POST["hidden_name"],
							  'item_price'    =>   $_POST['hidden_price'],
							  'item_quantity' =>   $_POST["quantity"],

					);
					$_SESSION["shopping_cart"][$count] = $item_array;
				}
				else
				{
				  //product added then this block 
				  echo '<script>alert("Item already added ")</script>';
				  echo '<script>window.location = "catalogue.php"</script>';
				}
			}
		}
		        
      }
      else
      {
        //cart is empty excute this block
         $item_array = array(
                      'item_id'       =>   $_GET["productID"],
                      'item_name'     =>   $_POST["hidden_name"],
                      'item_price'    =>   $_POST['hidden_price'],
                      'item_quantity' =>   $_POST["quantity"]

            );
           $_SESSION["shopping_cart"][0] = $item_array;
      }
    }
//Remove item in cart 
    if(isset($_GET["action"]))
    {
      if($_GET["action"] == "delete")
      {
        foreach($_SESSION["shopping_cart"] as $key=>$value)
            {
              if($value["item_id"] == $_GET["productID"])
              {
                unset($_SESSION["shopping_cart"][$key]);
                echo '<script>alert("Item removed")</script>';
                echo '<script>window.location="catalogue.php</script>';
              }
            }
      }
    }



?>

<!DOCTYPE html>
<html>
	<head>
		<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
		<link href='https://fonts.googleapis.com/css?family=Roboto Slab' rel='stylesheet'>
		<link rel="stylesheet" type="text/css" href="cataloguestyle.css">
		<title> Manufacturer's Outpost </title> 
	</head> 
	<body> 
		<div class = logo>
		<a href="profile.php"> MANUFACTURER'S OUTPOST </a>
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
					echo '
					<div class ="highlight">
					<li><a href="catalogue.php">Catalogue</a></li>
					</div>';
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
	</body> 



      <head>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
           

      </head>  
	  
	  
      <body>  
           <br />  
			
		  
           <div class="container" style="width:700px;">  
                <h3 align="center">All Products</h3><br />  
                  <?php
				  	 if (isset($_GET["checkout"])) {
            if ($_GET["checkout"] == "success") {
              echo '<p class="signupsuccess">Checkout successful!</p>';
            }
          }
				  
                    $qury = "SELECT * FROM product ORDER BY productID ASC";
                    $result = mysqli_query($connect,$qury);
                    if(mysqli_num_rows($result) >0)
                    {
                      while($row = mysqli_fetch_array($result))
                      {

                  ?>
                <div class="col-md-4">  
                     <form method="post" action="catalogue.php?action=add&productID=<?php echo $row["productID"];?>">  
                          <div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;" align="center">  
                               <h4 class="text-info"><?php echo $row['name'].' ('.$row['stock'].' Left)';?></h4>
                               <h4 class="text-danger">$<?php echo $row['price'];?></h4>
                               <h4 class="text-info"><?php echo $row['description'];?></h4>
							   
                               <input type="text" name="quantity" class="form-control" value="1" />
							  <input type="hidden" name="hidden-desc" value="<?php echo $row['description'] ?>" />
                            <input type="hidden" name="hidden_name" value="<?php echo $row['name'] ?>" />
                      <!--     <input type="hidden" name="hidden_image" value="<?php echo $row['image'];?>">  -->
                            <input type="hidden" name="hidden_price" value="<?php echo $row['price'];?>">


                               <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" />

                          </div>  
                     </form>  
                </div>  
				
                  <?php } } ?>
                <div style="clear:both"></div>  
                <br />  
                <div class="table-responsive">  
                     <table class="table table-bordered">  
                          <tr> 
                               <th width="40%">Item Name</th>  
                               <th width="10%">Quantity</th>  
                               <th width="20%">Price</th>  
                               <th width="15%">Total</th>  
                               <th width="5%">Action</th>  
                          </tr>  
                             <?php 
                           if(!empty($_SESSION["shopping_cart"]))
                           {
                            $total = 0;
                            foreach($_SESSION["shopping_cart"] as $key => $value)
                           {

                             ?>
                          <tr> 
                             
                               <td><?php echo $value['item_name'];?></td>  
                               <td><?php echo $value['item_quantity']; ?></td>  
                               <td>$<?php echo $value['item_price'];?></td>  
                               <td>$<?php echo number_format($value["item_quantity"] * $value["item_price"],2);?></td>  
                               <td><a href="catalogue.php?action=delete&productID=<?php  echo $value['item_id'];?>"><span class="btn btn-danger">Remove</span></a></td>  
                          </tr>  
                          <?php $total = $total + ($value["item_quantity"] * $value['item_price']);
                        }
                        ?>
                           
                          <tr>  
                               <td colspan="3" align="right">Total</td>  
                               <td align="right">$<?php echo number_format($total);?></td>  
                               <td></td>  
                          </tr> 
                          <?php } ?> 
                           
                     </table>  
                </div>  
           </div>  
		   	<form class="form-signup"  action = "includes/checkout.inc.php" method="post">
				<button type = "checkout" name = "checkout">Checkout</button>
				</form>
           <br />  
		 
      </body>  
</html>