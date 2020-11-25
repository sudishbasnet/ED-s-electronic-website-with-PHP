<?php
	$p = new PDO('mysql:dbname=assessment;host=localhost','root','');
	$u = $p->prepare("SELECT * FROM products ORDER BY date DESC");
	$u->execute();
?>


		<ul class="products">
				<?php
				foreach ($u as $pr) {?>
				<li>
				
				<a href="productPage.php?pId=<?php echo $pr['p_id']?> "><h3><?php echo  $pr['name'];?></h3></a>
				<?php include 'includeEditProduct.php';
				 ?>

				<br><br>
				
				<img class="img" src="images/<?php echo $pr['img'] ?>"><br>

				<p><?php echo  $pr['p_details'];?></p>
	
				<div class='price'><?php echo '£';echo $pr['price'];?></div>
				</li>
				<?php } ?>
			</ul>