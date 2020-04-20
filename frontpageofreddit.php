<?php include('server.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Reddit</title>
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
   	<div class="post">
      <a class="naslov"><?php echo $post['ime']; ?></a>&nbsp;<b class="subredit"><?php echo($post['kategorija']); ?></b>
		<br>
		<?php	echo $post['post'];?>
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
      	
      	&nbsp;&nbsp;<a class="komenti" href="komentarji.php?id=<?php echo($post['id']) ?>">COMMENTS</a>&nbsp;&nbsp;
		  COMMENTS

	    <!-- if user dislikes post, style button differently -->
      	<i 
      	  <?php if (userDisliked($post['id'])): ?>
      		  class="fa fa-thumbs-down dislike-btn"
      	  <?php else: ?>
      		  class="fa fa-thumbs-o-down dislike-btn"
      	  <?php endif ?>
      	  data-id="<?php echo $post['id'] ?>"></i>
      	<span class="dislikes"><?php echo getDislikes($post['id']); ?></span>
		  COMMENTS
      </div>
   	</div>
   <?php endforeach ?>
  </div>
  <script src="scripts.js"></script>
</body>
</html>