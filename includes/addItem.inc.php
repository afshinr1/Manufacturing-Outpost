<?php
require '../header.php';

if(isset($_POST['add-submit'])){
	
require 'dbh.inc.php';
	
$stock = $_POST['stock'];	
$productName = $_POST['productname'];	
$description = $_POST['desc'];	
$price = $_POST['price'];	
$rating = $_POST['rating'];	
$uid = $_SESSION["userUid"];

if(empty($stock)){
	header("Location: ../addItem.php?error=emptystock");
	exit();
}
if(empty($productName)){
	header("Location: ../addItem.php?error=emptyproductname");
	exit();
}
if(empty($description)){
	header("Location: ../addItem.php?error=emptyDescription");
	exit();
}
if(empty($price)){
	header("Location: ../addItem.php?error=emptyprice");
	exit();
}
if(empty($rating)){
	header("Location: ../addItem.php?error=emptyrating");
	exit();
}

else{
	$sql = "INSERT INTO product(stock, name, description, price, rating, Rusername) VALUES('$stock', '$productName', '$description', '$price','$rating', '$uid')";
	if(mysqli_query($conn, $sql)){
	 header("Location: ../addItem.php?addItem=success");
	}
	else 
		 header("Location: ../addItem.php?addItem=failure");

	}

} // end of if statemet

else{
	header("Location: ../index.php");
	exit();
}
