<?php
	include 'session.php';

	$s = $p->prepare("SELECT * FROM user_login WHERE user_id IN(SELECT user_id FROM checkout)");
	$s->execute();

	if (isset($_GET['uId'])) {
		$shipping =$p->prepare("UPDATE checkout SET status ='shipped' WHERE user_id =:uId");
		$shipping->execute($_GET);
	}

	if (isset($_GET['del'])) {
		$shipping =$p->prepare("DELETE FROM checkout WHERE user_id =:del");
		$shipping->execute($_GET);
	}

	include 'footer.php';
?>


<?php if (isset($_SESSION['aId'])) { ?>
<main>

<h2>Order Details</h2><br><br>
<table border="6">
	<tr>
		<th>Customer Details</th>
		<th>Product Details</th>
		<th>Total credit</th>
		<th>Action</th>
	</tr>
	<?php 
	foreach ($s as $all) {?>
		<tr>
			<td><ul class="review">
				<br><li>Customer name : <?php echo $all['fName'] ?> </li><br>
				<li>contact  : <?php echo $all['phone']?></li><br>
				<li>Location   : <?php echo $all['location'];?></li><br>
			</ul>
			</td>
			<td><?php
				$uId = $all['user_id'];
				$check =$p->prepare("SELECT * FROM checkout WHERE user_id =$uId");
				$check->execute(); 
				foreach ($check as $key) { ?>
				<ul class="review">
				<li>Order id  :<?php echo $key['checkout_id'] ?> </li> <br>
				<li>Product id : <?php echo $key['p_id'] ?>  
					Product name  : <?php
					$pId = $key['p_id'];
					$uu = $p->prepare("SELECT * FROM products WHERE p_id= $pId ");
					$uu->execute();
					$f =$uu->fetch();
					echo $f['name'];
					echo "  Price :";
					echo $f['price'];
					?>
					</li><br>
				</ul>
			<?php } ?>
			<td><?php echo $amnt =0; ?></td>
			<td><a href="orders.php?uId=<?php echo $uId?>">
			<?php
			$st =$p->prepare("SELECT * FROM checkout WHERE user_id = $uId");
			$st->execute(); 
			$sta =$st->fetch();
			echo $sta['status'];
			?></a>
			<a href="orders.php?del=<?php echo $uId?>">Delete</a>
			</td>
		</tr>
	<?php }?>
	
</table><br><br><br><br><br><br>
</main>

<?php } ?>