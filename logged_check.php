<?php 
session_start();
if(isset($_SESSION['Logged']) == true){
	
}else{
	header('login.php');
}

?>