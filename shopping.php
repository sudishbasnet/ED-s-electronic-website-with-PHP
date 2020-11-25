<?php
	include 'session.php';
	$sId = $_SESSION['sId'];
	$u = $p->prepare("SELECT * FROM products WHERE p_id IN(SELECT p_id FROM cart WHERE user_id =$sId) ");
	$u->execute();
	$s =$p->prepare("SELECT * FROM cart WHERE user_id=$sId ");
	$s->execute();

	if (isset($_POST['cOut'])) {
		foreach ($s as $key) {
			$pp = $p->prepare("INSERT INTO checkout(p_id,user_id) VALUES(:pId,:sId)");
			$c =[
					'pId' => $key['p_id'],
					'sId' => $key['user_id']
				];
			$pp->execute($c);
		}
		$d =$p->prepare("DELETE FROM cart WHERE user_id = $sId");
		$d->execute();
	}
		$checkout = $p->prepare("SELECT * FROM checkout WHERE user_id = $sId");
		$checkout->execute();
		$check = $checkout->fetch();
		echo "Your shopping list is  "; echo $check['status'];

	include 'footer.php';
?>

	

<?php if (isset($_SESSION['sId'])) { ?>
<main>
	<h2>Shopping Bucket</h2><br><br>
<table border="6">
	<tr>
		<th>Product id</th>
		<th>Product name</th>
		<th>Product price</th>
		<th>Quantity</th>
		<th>Total Amount</th>
	</tr>
	
	<?php
		$amnt = 0;
		
		foreach ($u as $key) {?>
		<tr>
			<td><?php echo $key['p_id'];?></td>
			<td><?php echo $key['name'];?></td>
			<td><?php echo $key['price'];?></td>
			<td><input type="number" name="quantity" value="1"></td>
		<?php	
		$amnt += $key['price'];
	  	}  
	  	?>
			<td>£  <?php echo $amnt ?></td>
		</tr>
	
</table><br><br><br><br>
	<form action="" method="POST">
	<input type="submit" name="cOut" value="Checkout">
	</form><br><br>


	
</main>

 <?php } ?>
