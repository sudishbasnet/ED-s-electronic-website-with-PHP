<?php
	include 'session.php';
	$s =$p->prepare("INSERT INTO cart(user_id,p_id) VALUES(:uId, :pId)");
	$c = [
			'uId' => $_SESSION['sId'],
			'pId' => $_GET['pId']
			];
	if ($s->execute($c)) 
		echo '<h3> Product added to cart</h3>';
	else
		echo '<h3>Something occurs wrong try again please!!</h3>';
	
	include 'footer.php';
?>


<?php if (isset($_SESSION['sId'])) { ?>
<main>
	<div class="checkout">
		<ul>
		<li><a href="shopping.php"><h3>Proceed to check out</h3></a></li>
		<li><a href="index.php"><h3>Check other products</h3></a></li>
		</ul>
</div>
	
</main>
<?php } ?>