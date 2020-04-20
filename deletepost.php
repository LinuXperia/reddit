<?php 
include('connect.php');
if(isset($_POST['deletajpost'])){
	$id=$_POST['id'];
	$query = "DELETE FROM `posts` WHERE id=?";
	$stmt =  $db->prepare($query);
	$stmt -> bind_param('i', $id);
	$stmt -> execute();
	echo("Post was deleted");
}
header( "refresh:6;url=post_delete.php" );
?>