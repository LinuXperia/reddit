<!doctype html>
<?php include('addsubreddit.php') ?>
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
	  	<form name="newsub" action="addsubreddit.php" method="post">
		  	<div class="dodajanj">Sub-reddit name:&nbsp;<input type="text" class="dodajanje_input" name="ime">
			<p>
  		</div>  
			<div class="dodajanj">Description: &nbsp; <input type="text" class="dodajanje_input" name="opis">
		</div>
			<div class="dodajanj">
			<button type="submit" class="dodaj" name="addsub">&nbsp;&nbsp;&nbsp;Add&nbsp;&nbsp;&nbsp;</button>
			</div>
				</form>
	  </div>
	  
  <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script  src="function.js"></script>
	</body>
</html>