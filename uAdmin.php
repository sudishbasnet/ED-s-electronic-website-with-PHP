<?php
	include 'session.php';
	$u = $p->prepare("SELECT * FROM admin_login");
	$u->execute();

	if(isset($_GET['del'])){
		$s = $p->prepare("DELETE FROM admin_login WHERE admin_id=:del");
		if ($s->execute($_GET)) {
			echo '<p>Admin deleted refresh the site</p>';
		}
	}

	include 'footer.php';
?>

<?php if (isset($_SESSION['aId'])) { ?>
<main>

<h2>Admin Details</h2><br><br>

<table border="4">
	<tr>
		<th>Admin Id</th>
		<th>login Username</th>
		<th>Full Name</th>
		<th>Email</th>
		<th>Phone</th>
		<th>Location</th>
		<th>Action</th>
	</tr>
	<?php
	
	foreach ($u as $all) {?>
		<tr>
			<td><?php echo  $all['admin_id']?></td>
			<td><?php echo $all['uName']?></td>
			<td><?php echo $all['fName']?></td>
			<td><?php echo $all['mail']?></td>
			<td><?php echo $all['phone']?></td>
			<td><?php echo $all['location']?></td>
			<td><a href="eCustomers.php?e=<?php echo $all['admin_id']?>">EDIT</a>
				<a href="uAdmin.php?del=<?php echo $all['admin_id'] ?>">DEL</a>
				</td>

		</tr>
	<?php }?>
	
</table><br><br><br><br><br><br>
</main>
<?php } ?>