<?php 
	if (isset($_POST['signup-submit'])) {
		require 'dbh.inc.php';

		//Take information from form 
		$username = $_POST['uid'];
		$email = $_POST['mail'];
		$name = $_POST['name'];
		$bname = $_POST['business'];
		$baddress = $_POST['address'];
		$password = $_POST['pwd'];
		$passwordConfirm = $_POST['pwd-confirm'];

	//Error check inputs (if empty) 
	if (empty($username) || empty($email) || empty($name) || empty($bname) || empty(baddress) || empty($password) || empty($passwordConfirm)) {
		header("Location: ../signup.php?error=emptyfields&uid=".$username."&mail=".$email);
		exit(); 
	}
	else if(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
		header("Location: ../signup.php?error=invalidmailuid");
		exit(); 
	}
	//Check if email is valid
	else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		header("Location: ../signup.php?error=invalidmail&uid=".$username);
		exit(); 
	}
	//Check if username is valid 
	else if(!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
		header("Location: ../signup.php?error=invaliduid&mail=".$email);
		exit(); 
	}
	//Check if passwords match 
	else if($password !== $passwordConfirm) {
		header("Location: ../signup.php?error=passwordcheck&uid=".$username."&mail=".$email);
		exit(); 
	}
	//Check if username is already taken 
	else {
		$sql = "SELECT uidUsers FROM users WHERE uidUsers=?";
		$stmt = mysqli_stmt_init($conn); 
		if (!mysqli_stmt_prepare($stmt, $sql)) {
			header("Location: ../signup.php?error=sqlerror");
			exit(); 
		}
		else {
			mysqli_stmt_bind_param($stmt, "s", $username); 
			mysqli_stmt_execute($stmt); 
			mysqli_stmt_store_result($stmt); 
			$resultCheck = mysqli_stmt_num_rows($stmt);
			if ($resultCheck > 0) {
				header("Location: ../signup.php?error=userTaken&mail =".$email);
				exit(); 
			}
			else {
				$sql = "INSERT INTO users (uidUsers, emailUsers, pwdUsers, nameUsers, businessUsers, baddressUsers) VALUES (?, ?, ?, ?, ?, ?)";	
				$stmt = mysqli_stmt_init($conn);
				if (!mysqli_stmt_prepare($stmt, $sql)) {
					header("Location: ../signup.php?error=sqlerror");
					exit(); 
				}
				else{
					$encryptPwd = password_hash($password, PASSWORD_DEFAULT);

					mysqli_stmt_bind_param($stmt, "ssssss", $username, $email, $encryptPwd, $name, $bname, $baddress); 
					mysqli_stmt_execute($stmt);  
					header("Location: ../signup.php?signup=success");
					exit(); 
				}				
			} 
		}
	}
	mysqli_stmt_close($stmt);
	mysqli_close($conn);
}
//If user was able to access page without using the signup button
else {
	header("Location: ../signup.php");
	exit(); 
}