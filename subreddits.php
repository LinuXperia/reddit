<!doctype html>
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
			<form method="post" action="change_pass.php"><div class="dodajanj">Your current password: &nbsp; <input type="text" name="oldpass" required></div>
			<div class="dodajanj">New password: &nbsp; <input type="text" name="newpass" required></div>
			<div class="dodajanj">Confirm new password: &nbsp; <input type="text" name="newpass2" required></div>
			<div class="dodajanj">
				<button type="submit" class="dodaj" name="changepass">&nbsp;&nbsp;&nbsp;Change password&nbsp;&nbsp;&nbsp;</button>
			</div>
		  </form>
	  </div>
	  
  <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script  src="function.js"></script>
	</body>
</html>