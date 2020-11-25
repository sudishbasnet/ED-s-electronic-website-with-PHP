<?php
	include 'session.php';
	$u = $p->prepare("SELECT * FROM user_login");
	$u->execute();

	if(isset($_GET['del'])){
		$s = $p->prepare("DELETE FROM user_login WHERE user_id=:del");
		if ($s->execute($_GET)) {
			echo '<p> User deleted refresh the site</p>';
		}
	}

	include 'footer.php';
?>


<?php if (isset($_SESSION['aId'])) { ?>
<main>

<h2>Customers Details</h2>
<p>To check either the users have posted any review click the username</p><br><br>
<table border="4">
	<tr>
		<th>User Id</th>
		<th>User Name</th>
		<th>Full Name</th>
		<th>Email</th>
		<th>Phone</th>
		<th>Location</th>
		<th>Action</th>
	</tr>
	<?php
	
	foreach ($u as $all) {?>
		<tr>
			<td><?php echo  $all['user_id'];?></td>
			<td><a href="checkReview.php?uId=<?php echo $all['user_id'] ?>"><?php echo $all['uName'];?></td>
			<td><?php echo $all['fName'];?></td>
			<td><?php echo $all['mail'];?></td>
			<td><?php echo $all['phone'];?></td>
			<td><?php echo $all['location'];?></td>
			<td><a href="eCustomers.php?edit=<?php echo $all['user_id']?>">EDIT</a>
				<a href="listCustomers.php?del=<?php echo $all['user_id'] ?>">DEL</a>
				</td>

		</tr>
	<?php }?>
	
</table><br><br><br><br><br><br>
</main>
<?php }
else 
	echo " <script> alert('Login first as admin') </script>";
 ?>