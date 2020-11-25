<?php
	include 'session.php';
	$s = $p->prepare("SELECT * FROM products");
	$s->execute();

include 'footer.php';
?>


<?php if (isset($_SESSION['aId'])) { ?>
<main>
<h2>Track list of products</h2><br><br>
<table border="4">
	<tr>
		<th>Admin Id</th>
		<th>Uploaded Product Details</th>
		<th>Date</th>
		<th>Action</th>
	</tr>
	<?php
	
	foreach ($s as $all) {?>
		<tr>
			<td><?php echo  $all['admin_id'] ?></td>
			<td>
				<ul class="review">
				<li>Product name : <?php echo $all['name'];?></li><br>
				<li>Product Details :<?php echo $all['p_details'];?></li><br>
				<li>Price :<?php echo $all['price'];?></li><br>
				</ul>

			</td>
			<td><?php echo $all['date'] ?></td>
		<td><a href="editProduct.php?pId=<?php echo $all['p_id']?>">Edit</a></td>

		</tr>
	<?php }?>
	
</table>
</main>
<?php } ?>