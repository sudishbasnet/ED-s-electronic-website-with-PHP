<?php
	include 'session.php';
	
	$pId = $_GET['pId'];
	$u = $p->prepare("SELECT * FROM products WHERE p_id = '$pId'");
	$u->execute();
	$uu =$u->fetch();

	$cc =$p->prepare("SELECT * FROM category");
	$cc->execute();

	if (isset($_POST['update'])) {
		$u = $p->prepare("UPDATE products SET name =:name, c_id =:c_id, img =:img,p_details =:details, price =:price WHERE p_id = '$pId'");
		$c =[
			'name' =>$_POST['name'],
			'c_id'	=>$_POST['c_id'],
			'img'	=>$_POST['img'],
			'details'	=>$_POST['details'],
			'price'	=>$_POST['price']
			];
		if ($u->execute($c)) {
			header('location:index.php');
		}
	}

	include 'footer.php';
?>


<?php if (isset($_SESSION['aId'])) { ?>
<main>
		<h2>Update information</h2><br><br>
			<form action="" method="POST" > 
				<label>Product Name</label>
				<input type='text' name='name' value="<?php echo $uu['name'] ?>"><br>
				<label>Product Category</label>
				<select name="c_id">
				<?php
				foreach ($cc as $key) { ?>                                    
  				<option value="<?php echo $key['c_id'];?>"> <?php echo $key['type']; ?></option> <?php } ?>
				</select><br><br>
				<label>Product image</label>
				<input type="file" name="img" ><br>
				<label>Product Details</label>
				<textarea name="details"><?php echo $uu['p_details'] ?></textarea><br><br>
				<label>Price</label>
				<input type='int' name='price' value="<?php echo $uu['price'] ?>"><br><br><br>
				<input type='submit' name='update' value='Update'>
			</form><br>
			
</main>
<?php } ?>