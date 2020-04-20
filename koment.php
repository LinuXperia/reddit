<?php include('servercek.php');
		include('dsplaycomments.php');?>
  <div class="posts-wrapper">
   <?php foreach ($posts as $post): ?>
   	<div class="post">
      <a class="naslov"><?php echo $post['ime']; ?></a>&nbsp;<b class="subredit"><?php echo($post['kategorija']); ?></b><br><br>
		<br>
		<?php	echo $post['post'];?><br>
		<img src="<?php 
			 	echo($post['slika']);
			 ?>"><br>
      <div class="post-info">
	    <!-- if user likes post, style button differently -->
      	<i <?php if (userLiked($post['id'])): ?>
      		  class="fa fa-thumbs-up like-btn"
      	  <?php else: ?>
      		  class="fa fa-thumbs-o-up like-btn"
      	  <?php endif ?>
      	  data-id="<?php echo $post['id'] ?>"></i>
      	<span class="likes"><?php echo getLikes($post['id']); ?></span>
      	
      	&nbsp;&nbsp;&nbsp;&nbsp;

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
		 <?php endforeach ?>
	  <?php foreach ($comments as $comment): ?>
	  <div class="comment">
	  	<a class="user"><?php echo $comment['nickname']?></a><br>
		  <a class="naslovc"><?php echo $comment['ime']?></a><br>
		  <a class="commnt"><?php echo $comment['komentar']?></a><br>
		  <a class="date"><?php echo $comment['datum']?></a><br>
	  </div>
	  <?php endforeach ?>
	  
	  <div class="newcomment.php">
		  <form action="addcomment.php" method="post">
		  	<a>New comment: &nbsp; <input type="text" name="ime"</a><br>
		  	<a>Text: &nbsp;<br> <textarea name="komentar" rows="7" maxlength="330" placeholder="Write your comment here..."></textarea></a><br>
				<button type="submit" class="button" name="addcoment">Add</button>
		  </form>
	  	
	  </div>
   	</div>
  
  </div>
