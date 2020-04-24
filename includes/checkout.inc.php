<?php
if(isset($_POST['checkout']))
{
	session_start();
	require 'dbh.inc.php';
	
	$uid = $_SESSION["userUid"];

	$cart_contents = $_SESSION["shopping_cart"];
	
	$item_array_id = array_column($cart_contents, "item_id");
	$item_array_quan = array_column($cart_contents, "item_quantity");
	$item_array_name = array_column($cart_contents, "item_name");
	$item_array_price = array_column($cart_contents, "item_price");

	$quan_keys = array_keys($item_array_quan);
	$count = 0;
	foreach($item_array_id as &$prodPurchased)
	{
		$sql = "UPDATE product SET stock = stock-? WHERE productID=?";
		$stmt = mysqli_stmt_init($conn);
		
		if(!mysqli_stmt_prepare($stmt, $sql))
		{
			header("Location: ../signup.php?error=sqlerror");
			exit();
		}
		else
		{
			mysqli_stmt_bind_param($stmt, "ii", $item_array_quan[$count], $prodPurchased);
			mysqli_stmt_execute($stmt);
			
			$sqly = "INSERT INTO history(productID, productname, price, quantity, username) VALUES('$prodPurchased','$item_array_name[$count]','$item_array_price[$count]','$item_array_quan[$count]','$uid')";
			mysqli_query($conn, $sqly);

			unset($_SESSION["shopping_cart"][$count]);
		}
		$count++;
	}
	unset($prodPurchased);
	header("Location: ../catalogue.php?checkout=success");
	exit();
}