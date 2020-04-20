<?php

include('connect.php');
session_start();

$user_id = $_SESSION['user_id'];
$username = '';
$name = '';
$lastname = '';
$role = '';
$profile = '';
$query = 'SELECT ime, priimek, nickname, email, role, slika FROM users WHERE id = ? LIMIT 1';
$stmt = $db->prepare($query);
$stmt -> bind_param('i', $user_id);
	
$stmt->execute();
$stmt->bind_result($name, $lastname, $username, $email, $role, $profile);
$stmt->store_result();
$stmt -> fetch();
$stmt -> close();
$_SESSION['email'] = $email;
$_SESSION['username'] = $username;
?>