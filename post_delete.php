s<?php include('za_post_delete.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Like and Dislike system</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	 <script type="text/javascript" src="script.js"></script>
	 <script type="text/javascript" src="function.js"></script>
  <link rel="stylesheet" href="main.css">
  <link rel="stylesheet" href="style.css">
</head>
<body>
	<?php  include('header.php');?>
	
  <div class="posts-wrapper">
   <?php foreach ($posts as $post): ?>
	  <form action="deletepost.php" method="post">
   	<div class="post">
      <a class="naslov"><?php echo $post['ime']; ?></a>&nbsp;<b class="subredit"><?php echo($post['kategorija']); ?></b>
		</br></br>
		<?php	echo $post['post'];?> </br></br>
		<img src="<?php 
			 	echo($post['slika']);
			 ?>">
      <div class="post-info">
	    <!-- if user likes post, style button differently -->
      	<i <?php if (userLiked($post['id'])): ?>
      		  class="fa fa-thumbs-up like-btn"
      	  <?php else: ?>
      		  class="fa fa-thumbs-o-up like-btn"
      	  <?php endif ?>
      	  data-id="<?php echo $post['id'] ?>"></i>
      	<span class="likes"><?php echo getLikes($post['id']); ?></span>
      	<input type="hidden" value="<?php echo $post['id'];?>" name="id"> 
      	&nbsp;&nbsp;<button type="submit" class="button" name="deletajpost">DELETE</button>&nbsp;&nbsp;
		  

	    <!-- if user dislikes post, style button differently -->
      	<i 
      	  <?php if (userDisliked($post['id'])): ?>
      		  class="fa fa-thumbs-down dislike-btn"
      	  <?php else: ?>
      		  class="fa fa-thumbs-o-down dislike-btn"
      	  <?php endif ?>
      	  data-id="<?php echo $post['id'] ?>"></i>
      	<span class="dislikes"><?php echo getDislikes($post['id']); ?></span>
		  
      </div>
   	</div>
		  </form>
   <?php endforeach ?>
  </div>
</body>
</html>