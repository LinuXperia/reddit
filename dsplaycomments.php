<?php 
include("connect.php");

$conn = $db;
$postid = $_GET['id'];
$sql = "SELECT u.nickname, k.ime, k.komentar, k.datum FROM komentarji k INNER JOIN users u ON k.user_id = u.id WHERE k.post_id = '$postid'";
$result = mysqli_query($conn, $sql);
// fetch all posts from database
// return them as an associative array called $posts
$comments = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>