<!doctype html>
<?php include('addpost.php') ?>
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
	  	<form name="newsub" action="addpost.php" method="post" enctype="multipart/form-data">
			<div class="dodajanj">Subreddit category:&nbsp;<select name="kategorija"><?php echo $options;?>&nbsp;
        </select>&nbsp;&nbsp;<a href="new_subreddit.php">New?</a></div><br>
		  	<div class="dodajanj">Post name:&nbsp;<input type="text" class="dodajanje_input" name="ime" required>
			<p>
  		</div>  
			<div class="dodajanj">Description: <br>&nbsp; <textarea name="opis" rows="15" maxlength="330">Write stuff here...</textarea>
		</div><br>
			<div class="dodajanj">
				Select image to upload:&nbsp;<input type="file" name="fileToUpload" id="fileToUpload">
			</div><br>
			 <div class="dodajanj"><input type="submit" value="Upload" name="submit_post"></div>
    		
				</form>
	  </div>
	  
	  

	
	
  <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script  src="function.js"></script>
	</body>
</html>