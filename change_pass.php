<?php 
session_start();
include('connect.php');
$user = $_SESSION['username'];
if(isset($_POST['changepass'])){
	$query = "SELECT password FROM users WHERE nickname = ? ";
	$stmt = $db->prepare($query);
	$stmt -> bind_param('s', $user);
	$stmt-> execute();
	$stmt->bind_result($password);
    $stmt->store_result();
	
		if($stmt-> fetch()){
			$oldpass = $_POST['oldpass'];
		$newpass = $_POST['newpass'];
		$newpass2 = $_POST['newpass2'];
		echo($password);
		 if (password_verify($oldpass, $password)) {
			 if($newpass == $newpass2){
				 $query = "UPDATE users SET password = ? WHERE nickname = ?";
				 $stmt = $db->prepare($query);
				 $crypted = password_hash($newpass, PASSWORD_DEFAULT);
				 $stmt -> bind_param('ss', $crypted, $user);
				 $stmt -> execute();
				
			 }
		 }else{
			 echo ("Passwords do not match!!!");
		 }
			
		}else{
			
		}
			
	
		

	}
	

header( "refresh:0;url=user.php" );
?>