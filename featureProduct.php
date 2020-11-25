<?php
	include 'session.php';

	if (isset($_POST['add'])) {
		$ss = $p->prepare("INSERT INTO featureproduct(p_id) VALUES (:pId)");
		$c =[
				'pId' => $_POST['pId']
			];
		if($ss->execute($c))
			echo  '<p> Product featured </p>';

	}

	if (isset($_POST['del'])) {
		$pId = $_POST['pId'];
		$ss = $p->prepare("DELETE FROM featureproduct WHERE p_id = '$pId'");
		if($ss->execute())
			echo  '<p> Product removed from featured </p>';
	}
	
	include 'footer.php';
?>

<?php if (isset($_SESSION['aId'])) { ?>
<main>
<form action="featureProduct.php" method="POST">
	<h3>Select the product you want feature or remove from it</h3><br><br>
	<?php 
	$s = $p->prepare("SELECT * FROM products");
	$s->execute();
	foreach ($s as $key) { ?> 
		<label>
			<?php 
				echo $key['p_id'];
				echo "  ";
				echo $key['name'];
				echo "  ";
				echo "£"; 
				echo $key['price']; 
			?>
		</label>
		<input type="radio" name="pId" value="<?php echo $key['p_id'] ?>" ><br>
		
		<?php 
				} 
		?><br><br>

		<input type="submit" name="add" value="Add"><br><br>
		<input type= "submit" name="del" value="Remove">
	 
</form>
</main>
<?php } ?>