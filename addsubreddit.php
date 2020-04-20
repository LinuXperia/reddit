<?php
session_start();
include_once 'connect.php';

$errors = array(); 

if(isset($_POST['addsub'])){
    $name = $_POST['ime'];
    $opis = $_POST['opis'];
	$uid = $_SESSION['user_id'];
	$pravi = '/'.$opis;
	$query = "INSERT INTO kategorije (kategorija, opis, user_id) VALUES (?, ?, ?)";
    $stmt = $db->prepare($query);
	$stmt -> bind_param('ssi', $name, $opis, $uid);
    $stmt->execute();
    $stmt->close();
	header('Location: new_post.php');
}
?>