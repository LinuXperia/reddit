<?php 
session_start();
include('connect.php');
if(isset($_POST['subscribe'])){
	$katid = $_POST['katid'];
	echo($katid);
	$subscription = 'Unsubscribe';
	$user_id = $_SESSION['user_id'];
	$query = "INSERT INTO subscription(user_id, kategorija_id, subscribed ) VALUES (?,?,?)";
	$stmt = $db->prepare($query);
	$stmt -> bind_param('iis', $user_id, $katid, $subscription);
	$stmt -> execute();
}

if(isset($_POST['unsub'])){
	$katid = $_POST['katid'];
	echo($katid);
	$subscription = 'Unsubscribe';
	$user_id = $_SESSION['user_id'];
	$query = "DELETE FROM `subscription` WHERE kategorija_id = ? AND user_id = ?";
	$stmt = $db->prepare($query);
	$stmt -> bind_param('ii', $katid, $user_id);
	$stmt -> execute();
}
header("location:display_subreddits.php");

?>