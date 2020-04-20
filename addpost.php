<?php

session_start();

include_once('connect.php');

$query = "SELECT kategorija FROM kategorije";

$result1 = mysqli_query($db, $query);
$options = "";
while($row = mysqli_fetch_array($result1))
{
    $options = $options."<option>$row[0]</option>";
}

$filename = "slika";
$user = $_SESSION['user_id'];
$slika_id = 0;
$uploadfila = 0;
$kategorija = 0;
$kategorija_id = '';
if(isset($_POST['submit_post'])){
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
			$query = 'INSERT INTO `slike`(`user_id`, `ime`, `slika`) VALUES (?, ?, ?)';
    		$stmt = $db->prepare($query);
			$stmt -> bind_param('iss', $user, $filename, $target_file);
			$stmt->execute();
			$stmt->close();
			
			$query = 'SELECT id FROM slike WHERE slika = ?';
    		$stmt = $db->prepare($query);
			$stmt -> bind_param('s', $target_file);
			$stmt->execute();
			$stmt->bind_result($slika_id);
			if($stmt->num_rows == 0)  //To check if the row exists
        		{
            		if($stmt->fetch()) //fetching the contents of the row
            		{
						$kategorija = $kategorija_id;
					}else {
					}
				}else {
			}
			$stmt->close();
		
			
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
	}
	
	if($uploadfila === 1){
		if($uploadOk === 1){
				$ime = mysqli_real_escape_string($db, $_POST['ime']);
				$category = $_POST['kategorija'];
				$text = $_POST['opis'];
	
				$query = 'SELECT id FROM kategorije WHERE kategorija = ?';
    			$stmt = $db->prepare($query);
				$stmt -> bind_param('s', $category);
				$stmt->execute();
				$stmt->bind_result($kategorija_id);
				if($stmt->num_rows == 0)  //To check if the row exists
        		{
            		if($stmt->fetch()) //fetching the contents of the row
            		{
						$kategorija = $kategorija_id;
					}else {
					}
				}else {
			}
				$stmt->close();
	
				$query = 'INSERT INTO `posts`(`user_id`, `slika_id`, `ime`, `post`, `kategorija_id`) VALUES (?,?,?,?,?)';
				$stmt = $db->prepare($query);
				$stmt -> bind_param('iissi', $user, $slika_id, $ime, $text, $kategorija_id);
				$stmt->execute();
				$stmt->close();
		}
	}else{
			$ime = $_POST['ime'];
			$category = mysqli_real_escape_string($db,$_POST['kategorija']);
			$text = $_POST['opis'];
	
			$query1 = 'SELECT id FROM `kategorije` WHERE kategorija = ?';
			$stmt1 = $db->prepare($query1);
			$stmt1 -> bind_param('s', $category);
			$stmt1->execute();
			$stmt1->bind_result($kategorija_id);
			if($stmt1->num_rows == 0)  //To check if the row exists
        		{
            		if($stmt1->fetch()) //fetching the contents of the row
            		{
						$kategorija = $kategorija_id;
					}else {
					}
				}else {
			}
			$stmt1->close();
	
			$query2 = 'INSERT INTO posts(user_id, slika_id, ime, post, kategorija_id) VALUES (?,?,?,?,?)';
			$stmt2 = $db->prepare($query2);
			$stmt2 -> bind_param('iissi', $user, $slika_id, $ime, $text, $kategorija_id);
			$stmt2->execute();
			$stmt2->close();

		echo("prslo je do kraja ja");
	}
	header( "refresh:0;url=home.php" );
}
?>
