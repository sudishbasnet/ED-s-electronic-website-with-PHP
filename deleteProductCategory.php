<?php
	include 'session.php';

	$pp = $p->prepare("SELECT * FROM products");
	$pp->execute();
	$cc = $p->prepare("SELECT * FROM category");
	$cc->execute();

	if(isset($_POST['dProduct'])){
		$pId = $_POST['p_id'];
		$s1 =$p->prepare("DELETE FROM products WHERE p_id=$pId ");
		if ($s1->execute($_GET)) 
			echo '<p> Product deleted successfully</p>';
		else
			echo "<p> cannot be deleted, it is used somewhere</p>";
	}

	if(isset($_POST['dCategory'])){
		$cId = $_POST['c_id'];
		$s2 =$p->prepare("DELETE FROM category WHERE c_id='$cId' ");
		if ($s2->execute()) 
			echo '<p> Category deleted successfully</p>';
	}

	

	include 'footer.php';


?>

<?php if (isset($_SESSION['aId'])) { ?>
<main><br><br>
<form action="" method="POST">
	<label>Select the product you want to delete</label><br><br>
	<select name="p_id">
				<?php
				foreach ($pp as $key) { ?>                                    
  				<option value="<?php echo $key['p_id']?>"> 
  					<?php echo $key['p_id']; echo "  "; echo $key['name']; echo "  ";echo "£"; echo $key['price']; ?>
  				</option> <?php } ?>
				</select><br><br><br><br>
				<input type="submit" name="dProduct" value="Delete Product">
</form><br><br><br><br><br>

<form action="" method="POST">
	<label>Select the category you want to delete</label><br><br>
	<select name="c_id">
				<?php
				foreach ($cc as $key) { ?>                                    
  				<option value="<?php echo $key['c_id'];?>">
  					<?php echo $key['c_id']; echo "  "; echo $key['type']; ?>
  				</option> <?php } ?>
				</select><br><br><br><br>
				<input type="submit" name="dCategory" value="Delete Category">
</form>

</main>

<?php } ?>
