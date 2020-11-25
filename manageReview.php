<?php
	include 'session.php';

	if (isset($_GET['allow'])) {
		$a =$p->prepare("INSERT INTO manage_reviews(r_id) VALUES(:allow)");
		$c =[
			'allow' => $_GET['allow']
			];
		if ($a->execute($c)) {
			echo '<p>The review is added</p>';
		}
	} 
	if (isset($_GET['del'])) {
		$a =$p->prepare("DELETE FROM reviews WHERE r_id =:del");
		if ($a->execute($_GET)) {
			echo '<p>The review is deleted</p>';
		}
	}
	
	$u = $p->prepare("SELECT * FROM reviews WHERE r_id NOT IN(SELECT r_id FROM manage_reviews) ");
	$u->execute();
	
	include 'footer.php';
?>



<?php if (isset($_SESSION['aId'])) { ?>
<main>
<h2>Check out the reviews by customers</h2><br><br>
<table border="4">
	<tr>
		<th>Review Id</th>
		<th>Details</th>
		<th>Action</th>
	</tr>
	<?php
	
	foreach ($u as $all) {?>
		<tr>
			<td><?php echo  $all['r_id'] ?></td>
			<td>
				<ul class="review">
				<li>Product id : <?php echo $all['p_id'];?></li><br>
				<li> Customer id :<?php echo $all['user_id'];?></li><br>
				<li>Review :<?php echo $all['review'];?></li><br>
				<li>Date :<?php echo $all['date'];?></li>
				</ul>

			</td>
			<td><a href="manageReview.php?allow=<?php echo $all['r_id']?>">Approve</a>
			<td><a href="manageReview.php?del=<?php echo $all['r_id']?>">Delete</a>
			</td>

		</tr>
	<?php }?>
	
</table><br><br><br><br><br><br>
</main>
<?php } ?>