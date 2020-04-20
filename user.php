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
			
			<div class="profilka"><img src="<?php echo($profile) ?>"></div>
		  	<div class="dodajanj">First name:&nbsp; <?php echo($name); ?>
		</div>  
		 
			<div class="dodajanj">Lastname: &nbsp; <?php echo($lastname); ?>
		</div>
		    <div class="dodajanj">Username: &nbsp; <?php echo($username); ?>
		</div>
		  	<div class="dodajanj">Email: &nbsp; <?php echo($email); ?>
		</div>
		  	<div class="dodajanj">Role: &nbsp; <?php echo($role); ?>
		</div>
		  	
			<div class="dodajanj">
				<a href="user_settings.php"><button class="dodaj" >&nbsp;&nbsp;&nbsp;Change settings&nbsp;&nbsp;&nbsp;</button></a>
			</div>
				
	  </div>
	  
  <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script  src="function.js"></script>
	</body>
</html>