<?php
session_start();
include_once './connect.php';
$errors = array(); 

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['pass'];
    $user_id = 0;
	$role = '';
	$crypted = password_hash($password, PASSWORD_DEFAULT);
	echo $crypted;
	$query = 'SELECT id, nickname, password, role FROM users WHERE nickname = ? LIMIT 1';
    $stmt = $db->prepare($query);
	$stmt -> bind_param('s', $username);
	
    $stmt->execute();
    $stmt->bind_result($user_id, $username, $passwordv, $role);
    $stmt->store_result();
    if($stmt->num_rows == 1)  //To check if the row exists
        {
            if($stmt->fetch()) //fetching the contents of the row
            {
				 if (password_verify($password, $passwordv)) {
        echo 'success'; // password_verify success!
               if ($role == 'admin') {
                   header('Location: home.php');
				   $_SESSION['Logged'] = 1;
                   $_SESSION['user_id'] = $user_id;
                   $_SESSION['username'] = $username;
               } else {
                   $_SESSION['Logged'] = 1;
                   $_SESSION['user_id'] = $user_id;
                   $_SESSION['username'] = $username;
                   header('Location: home.php');
               }
           }else {
				echo("passwords do not match");
			}

    }else {
		echo("doesnt exist");
	}
    $stmt->close();
}
}
?>