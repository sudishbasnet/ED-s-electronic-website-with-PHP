<?php
	include 'session.php';
	$pId = $_GET['pId'];
	$u = $p->prepare("SELECT * FROM products WHERE p_id = '$pId' ");
	$u->execute();
	$uu = $u->fetch();

	$r = $p->prepare("SELECT * FROM reviews r, manage_reviews m WHERE r.r_id = m.r_id AND p_id = '$pId'");
	$r->execute();

	
	include 'footer.php';
?>



<main>
<h2>Product Page</h2>

			<h3><?php echo $uu['name'] ?></h3>
			
			<?php
			if (isset($_SESSION['sId'])) { ?>
			<div class="cart">
			<a href="sCart.php?pId=<?php echo $pId; ?>"><h3>Add to cart</h3></a>
			</div>
			<?php } ?><br>

			<img class="img" src="images/<?php echo $uu['img'] ?>"><br>
			<h4>Product details</h4>
			<p><?php echo $uu['p_details'] ?></p>

			<h4>Product reviews</h4>
			<ul class="reviews">
				<?php
				foreach ($r as $key) { ?>

				<li>
					<p><?php echo $key['review'] ?></p>
						<div class="details">

						<strong><?php 
									$uId = $key['user_id'];
									$c = $p->prepare("SELECT * FROM user_login WHERE user_id = '$uId'");
									$c->execute();
									$cc=$c->fetch();
									echo $cc['fName'];

						?></strong><br>
						<em><?php echo $key['date'] ?></em> 
					</div>
				
				</li>
			<?php }
	

    $url  = "http://localhost:8012/assignment/productPage.php?pId=$pId";
    
			 ?>

		</ul><br><br>
		

	<a href="comment.php?pId=<?php echo $pId ?>"><input type="submit" name="submit" value="Add comment"></a><br>
	<div id="button_share">
     

	<div class="social_section">
	<?php
	/*REFERECE : onlinecode. (2019). Social Media Sharing Buttons using php - onlinecode. [online] Available at: http://www.onlinecode.org/social-media-sharing-buttons-php/ [Accessed 13 Jan. 2019].*/ ?>

    <a href="http://www.facebook.com/sharer.php?url=<?=$url?>" target="_blank">
       <img src="images/facebook.png">
    </a>
    
    <a href="https://plus.google.com/share?url=<?=$url?>" target="_blank">
       <img src="images/google.jpg">
    </a>
    
    <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?=$url?>" target="_blank">
       <img src="images/linkedin.png">
    </a>
    
    <a href="https://twitter.com/share?url=<?=$url?>" target="_blank">
       <img src="images/twitter.jpg">
    </a>
    <p>Share</p>

    
 
</div>
	
	<?php include 'rating.php'; ?>

</main>











	