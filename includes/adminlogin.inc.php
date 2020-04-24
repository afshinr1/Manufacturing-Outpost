<?php  

if(isset($_POST['regularUser'])) {
	header("Location: ../index.php");
	exit(); 
}

if (isset($_POST['login-submit'])) {
	require 'dbh.inc.php';

	$mailuid = $_POST['uname'];
	$password = $_POST['psw'];

	if(empty($mailuid) || empty($password)) {
		header("Location: ../admin.php?error=emptyfields");
		exit(); 
	}
	else {
		$sql = "SELECT * FROM adminusers WHERE uidUsers =? OR emailUsers=?;";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
		 	header("Location: ../admin.php?error=sqlerror");
			exit(); 
		}
		else {
			mysqli_stmt_bind_param($stmt, "ss", $mailuid, $mailuid); 
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt); 
			if ($row = mysqli_fetch_assoc($result)) {
				//$pwdCheck = password_verify($password, $row['pwdUsers']); 
				if ($password !== $row['pwdUsers']) {
					header("Location: ../admin.php?error=wrongpassword");
					exit(); 
				}
				else if($password == $row['pwdUsers']) {
					session_start(); 
					$_SESSION['userId'] = $row['idUsers'];
					$_SESSION['userUid'] = $row['uidUsers'];

					header("Location: ../businessprofile.php?login=success");
					exit(); 
				}
				else {
					header("Location: ../admin.php?error=Login Fail");
					exit(); 
				}
			}
			else{
		header("Location: ../admin.php?error=nouser");
		exit();
		}
		} 
	}
}
else {
	header("Location: ../admin.php");
	exit(); 
}