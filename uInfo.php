<?php
include 'session.php';

if (isset($_SESSION['sId'])) {
	$id = $_SESSION['sId'];
if (isset($_POST['update'])){

$s = $p->prepare("UPDATE user_login SET fName = :fName, mail = :mail,phone = :phone ,location= :location WHERE user_id = $id");
unset($_POST['update']);
if($s->execute($_POST)){
echo '<p>Information Updated Successfully</p>';
}
}
$u= $p->prepare("SELECT * FROM user_login WHERE user_id = $id");
$u->execute($_GET);
$user = $u->fetch();
}

else{
	$id = !empty($_SESSION['aId']);
	if (isset($_POST['update'])){

	
$s = $p->prepare("UPDATE admin_login SET fName = :fName, mail = :mail,phone = :phone ,location= :location WHERE admin_id = $id");
unset($_POST['update']);
if($s->execute($_POST)){
echo '<p>Information Updated Successfully</p>';
}
}
$u= $p->prepare("SELECT * FROM admin_login WHERE admin_id = $id");
$u->execute($_GET);
$user = $u->fetch();
}
include 'footer.php';
?>



<?php 
	if (!empty($_SESSION['aId']) == !null || !empty($_SESSION['sId'])  == !null) 
	 { ?>
<main>
<form action="" method="POST">
<h3>Update your information</h3><br><br>
<label>Full Name :</label>
<input type="text" name="fName" value ="<?php echo $user['fName']?>"><br><br>
<label>Mail :</label>
<input type="text" name="mail" value ="<?php echo $user['mail']?>"><br><br>
<label>Phone</label>
<input type="int" name="phone" value="<?php echo $user['phone']?>"><br><br>
<label>Location</label>
<input type="text" name="location" value="<?php echo $user['location']?>"><br><br>
<input type="submit" name="update" value="Update"><br><br><br>
</form>
</main>

<?php } ?>