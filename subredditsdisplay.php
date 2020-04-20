<?php
$conn = mysqli_connect('localhost', 'root', '', 'reddit');
$sql = "SELECT k.kategorija, k.id , u.nickname FROM kategorije k INNER JOIN users u ON k.user_id = u.id";
$result = mysqli_query($conn, $sql);
// fetch all posts from database
// return them as an associative array called $posts
$subreddits = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>