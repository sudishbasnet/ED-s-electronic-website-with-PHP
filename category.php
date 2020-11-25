<?php
	$p = new PDO('mysql:dbname=assessment;host=localhost','root','');
	$u = $p->prepare("SELECT c_id,type FROM category");
	$u->execute();
?>


<ul>
	<?php
	foreach ($u as $c) {?>
		<li><a href="filterCategoryProduct.php?cId=<?php echo $c['c_id']?>"> <?php echo  $c['type']?> </a></li>
	
	
<?php }  ?>
		<li><a href="highRatedProduct.php">High rated</a>
		
</ul>

