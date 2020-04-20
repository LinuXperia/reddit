<?php 

session_start();
include('connect.php');
$errors = array();
$user = $_SESSION['username'];
$id = $_SESSION['user_id'];
if(isset($_POST['updateuser'])){
	$email = $_POST['email'];
	$firstname = $_POST['ime'];
	$username = $_POST['username'];
	$lastname = $_POST['lastname'];
	$uploadOk = 0;
	$uploadfila = 0;
	if(!file_exists($_FILES['fileToUpload']['tmp_name']) || !is_uploaded_file($_FILES['fileToUpload']['tmp_name'])) {
		}else{
		$uploadfila = 1;		
		$target_dir = "uploads/";
		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
			if(isset($_POST["submit_image"])) {
				$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    			if($check !== false) {
        			echo "File is an image - " . $check["mime"] . ".";
        			$uploadOk = 1;
		} else {
        	echo "File is not an image.";
        	$uploadOk = 0;
				}
			}
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
if ($_FILES["fileToUpload"]["size"] > 50000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";

	
	
	
	
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
			
			
		
			$preverjanje = "SELECT * FROM users WHERE nickname='$username' LIMIT 1";
  			$rezultat = mysqli_query($db, $preverjanje);
  			$user = mysqli_fetch_assoc($rezultat);
  
		

    		if($_SESSION['email'] === $email){
				
			}else{
    		if ($user['email'] === $email) {
      		array_push($errors, "Email is already in use");
    	}}
			$preverjanje1 = "SELECT * FROM users WHERE email='$email' LIMIT 1";
			$rezultat1 = mysqli_query($db, $preverjanje);
    		$user1 = mysqli_fetch_assoc($rezultat1);
    
  
  		if($_SESSION['username'] === $username){
				
			}else{
      	if ($user['nickname'] === $username) {
        	array_push($errors, "Email is already in use");
      }}
		
		if(count($errors) == 0){
			$query = "UPDATE `users` SET `ime`= ?,`priimek`= ?,`nickname`= ?,`email`= ?,`slika`= ? WHERE id=?";
			$stmt = $db->prepare($query);
		
			$stmt->bind_param('sssssi', $firstname, $lastname, $username, $email, $target_file, $id);
			$stmt->execute();
		}
			
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
	}
	
	if($uploadfila === 1){
		if($uploadOk === 1){
				
		}
	}else{
		echo('hello :D');
			$preverjanje = "SELECT * FROM users WHERE nickname='$username' LIMIT 1";
  			$rezultat = mysqli_query($db, $preverjanje);
  			$user = mysqli_fetch_assoc($rezultat);
  
		
			if($_SESSION['email'] === $email){
				
			}else{
    		if ($user['email'] === $email) {
      		array_push($errors, "Email is already in use");
    	}}
			$preverjanje1 = "SELECT * FROM users WHERE email='$email' LIMIT 1";
			$rezultat1 = mysqli_query($db, $preverjanje);
    		$user1 = mysqli_fetch_assoc($rezultat1);
    
  
  		if($_SESSION['username'] === $username){
				
			}else{
      	if ($user['nickname'] === $username) {
        	array_push($errors, "Email is already in use");
      }}
		
		if(count($errors) == 0){
			$query = "UPDATE `users` SET `ime`= ?,`priimek`= ?,`nickname`= ?,`email`= ? WHERE id=?";
			$stmt = $db->prepare($query);
			$stmt->bind_param('ssssi', $firstname, $lastname, $username, $email, $id);
			$stmt->execute();
		}
	}
	foreach ($errors as $error):
  	  				 echo $error ;
  					endforeach ;
	header( "refresh:0;url=user.php" );
}


?>