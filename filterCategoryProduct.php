<?php
	include 'session.php';
	$cId = $_GET['cId'];
	
	$u = $p->prepare("SELECT * FROM products WHERE c_id = '$cId'");
	$u->execute();

	include '<footer.php>';
?>

<main>
<ul class="products">
				<?php
				foreach ($u as $pr) {?>
				<li>
				
				 <h3><a href="productPage.php?pId=<?php echo $pr['p_id'] ?>"><?php echo  $pr['name'];?></a></h3>
				 <?php include 'includeEditProduct.php';
				 ?>
				<br>
				
				<img class="img" src="images/<?php echo $pr['img'] ?>"><br>
				
				<p><?php echo  $pr['p_details'];?></p>
	
				<div class='price'><?php echo '£';echo $pr['price'];?></div>
				</li>
				<?php } ?>
			</ul>

</main>


