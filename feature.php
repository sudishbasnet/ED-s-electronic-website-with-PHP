<?php
	$p = new PDO('mysql:dbname=assessment;host=localhost','root','');
	$s = $p->prepare("SELECT * FROM products p,featureproduct f WHERE p.p_id = f.p_id ");
	$s->execute();
	
if (isset($_SESSION['aId'])) 
	echo "<h1><a href='featureProduct.php'>Featured Product</a></h1>";
else
	echo "<h1>Featured Product</h1>";
?>


		<ul>
				<?php 
				foreach ($s as $pr)  {?>
				<li>
				<h3><a href="productPage.php?pId=<?php echo $pr['p_id']?>"><?php echo  $pr['name'];?></a></h3><br>
				<img class="img" src="images/<?php echo $pr['img'] ?>"><br>
				<p><?php echo  $pr['p_details'];?></p>
				</li>
				<?php } ?>
		</ul>