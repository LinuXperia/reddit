<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Reddit page</title>
	<?php include('links.php'); ?>
</head>

<body>
	 
 <?php include('header.php'); ?>
 			
	  <?php include('subredditsdisplay.php'); ?>
	<table class="tabela">
	<tr>
		<th>Subreddit</th>
		<th>Moderator</th>
	</tr>
	  <?php session_start(); foreach ($subreddits as $subreddit): ?>
   	<tr>
		<td><a href="post_display.php?id=<?php echo($subreddit['id']) ?>"><?php echo($subreddit['kategorija']);?></a></td>
		<td><?php echo($subreddit['nickname'])?></td>
		<?php ?>
		<td><form action="subscribe.php" method="post"><input type="hidden" name="katid" value="<?php echo($subreddit['id']);?>">
			
			<?php 
			include('connect.php');
			
			
			$user_id = $_SESSION['user_id'];
			$query = "SELECT subscribed FROM  subscription WHERE kategorija_id= ? AND user_id= ?";
			$stmt=$db->prepare($query);
			$stmt->bind_param('ii', $subreddit['id'], $user_id);
			$stmt->execute();
			$stmt->bind_result($subscribed);
    		$stmt->store_result();
			$stmt->fetch();
			if($subscribed == 'Unsubscribe'){
				$subscrib = 'Unsubscribe';
				$name = 'subscribe';
				
				echo('<button class="submit" name="unsub">'.$subscrib.'</button>');
			
			}else {
				$subscrib = 'Subscribe';
				$name = 'unsub';
				echo('<button class="submit" name="subscribe">'.$subscrib.'</button>');
			}
			
			
			?>
			</form></td>
	</tr>
		 <?php endforeach ?>
	</table>
	</body>
</html>