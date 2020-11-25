<?php
	include 'session.php';
	$uId = !empty($_GET['uId']); //using !empty to avoid undefined variable 
	$s = $p->prepare("SELECT * FROM reviews WHERE user_id =$uId");
	$s->execute();

	include 'footer.php';
?>


<?php if (isset($_SESSION['aId'])) { ?>
<main>

<h2>Reviews Posted By Customer</h2><br><br>
<table border="4">
	<tr>
		<th>Review Id</th>
		<th>Review Details</th>
		<th>Date Posted</th>
	</tr>
	<?php
	
	foreach ($s as $all) {?>
		<tr>
			<td><?php echo  $all['r_id'];?></td>
			<td>
				<ul class="review">
				<li>Product id : <?php echo $all['p_id'];?></li><br>
				<li> Customer id :<?php echo $all['user_id'];?></li><br>
				<li>Review :<?php echo $all['review'];?></li><br>
				</ul>
			</td>
			<td><?php echo $all['date'];?></td>
		</tr>
	<?php }?>
	
</table><br><br><br><br><br><br>
</main>
<?php } ?>