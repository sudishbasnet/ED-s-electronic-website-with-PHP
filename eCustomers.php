<?php
include 'session.php';

if(!empty($_GET['edit'])) {
	$u = $p->prepare("SELECT * FROM user_login WHERE user_id = :edit");
	$u->execute($_GET);
	$aa =$u->fetch();

	if (isset($_POST['update'])){
	unset($_POST['update']);
	$id = $_GET['edit'];
	$s = $p->prepare("UPDATE user_login SET uName = :uName, fName = :fName, mail = :mail, phone = :phone, location = :location, password =:password WHERE user_id = '$id'");
	
	if($s->execute($_POST)){
	header("location:listCustomers.php");
	}
	}

}

else if (!empty($_GET['e'])) {
	$a = $p->prepare("SELECT * FROM admin_login WHERE admin_id =:e");
	$a->execute($_GET);
	$aa = $a->fetch();

	if (isset($_POST['update'])){
	unset($_POST['update']);
	$id = $_GET['e'];
	$s = $p->prepare("UPDATE admin_login SET uName = :uName, fName = :fName, mail = :mail, phone = :phone, location = :location, password =:password WHERE admin_id = '$id'");
	
	if($s->execute($_POST)){
	header("location:uAdmin.php");
	}
}
}




include 'footer.php';
?>

<?php if (isset($_SESSION['aId'])) { ?>
<main>
<form action="" method="POST">
<h3>Update Customer Information</h3><br><br>
<label>Username:</label>
<input type="text" name="uName" value ="<?php echo $aa['uName']?>"><br>
<label>Full Name :</label>
<input type="text" name="fName" value ="<?php echo $aa['fName']?>"><br>
<label>Mail :</label>
<input type="text" name="mail" value ="<?php echo $aa['mail']?>"><br>
<label>Phone :</label>
<input type="number" name="phone" value ="<?php echo $aa['phone']?>"><br>
<label>Location :</label>
<input type="text" name="location" value ="<?php echo $aa['location']?>"><br>
<label>Password</label><br>
<input type="password" name="password" value="<?php echo $aa['password']?>"><br><br>
<input type="submit" name="update" value="Update">
</form><br>
</main>
<?php } ?>