<!doctype html>
<?php include('user_info.php'); ?>
<html>
<head>
<meta charset="utf-8">
<title>Reddit page</title>
	<link href='' rel='stylesheet'>
	<link rel='stylesheet' type='text/css' href='style.css'>
	<script src="https://kit.fontawesome.com/67753fd32b.js" crossorigin="anonymous"></script>
	
</head>

<body>
	 
  <?php include('header.php'); ?>
 			
	  <div class="dodajanje">
	  	<form name="userinfo" action="user_update.php" method="post" enctype="multipart/form-data">
			
			<div class="profilka"><img src="<?php echo($profile) ?>"></div>
			<div class="dodajanj">Upload new profile picture:&nbsp;<input type="file" name="fileToUpload"></div>
		  	<div class="dodajanj">First name:&nbsp;<input type="text" value="<?php echo($name); ?>" name="ime" required> 
		</div>  
		 
			<div class="dodajanj">Lastname: &nbsp;<input type="text" value="<?php echo($lastname); ?>" name="lastname" required> 
		</div>
		    <div class="dodajanj">Username: &nbsp;<input type="text" value="<?php echo($username); ?>" name="username" required> 
		</div>
		  	<div class="dodajanj">Email: &nbsp; <input type="text" value="<?php echo($email); ?>" name="email" required> 
		</div>
		  	
			<div class="dodajanj"><a href="changepassword.php">Change password</a></div>
		  	
			<div class="dodajanj">
			<button type="submit" class="dodaj" name="updateuser">&nbsp;&nbsp;&nbsp;Update&nbsp;&nbsp;&nbsp;</button>
				
			</div>
				</form>
	  </div>
	  
  <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script  src="function.js"></script>
	</body>
</html>