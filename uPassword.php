<?php
include 'session.php';

if (isset($_POST['change'])){
if (isset($_SESSION['sId'])) {
	$id = $_SESSION['sId'];
	$u= $p->prepare("SELECT password FROM user_login WHERE user_id = $id");
	$u->execute($_GET);
	$r = $u->fetch();
	if (password_verify($_POST['oPswd'], $r['password']) || $_POST['oPswd'] ==$r['password']  ) {
		if ($_POST['nPswd'] == $_POST['cPswd']) {
			$hPass =password_hash($_POST['nPswd'],PASSWORD_DEFAULT);
			$s = $p->prepare("UPDATE user_login SET password = '$hPass' WHERE user_id = '$id'");
			$s->execute();
			session_destroy();
			header('location:index.php');
			echo '<p>Password Updated Successfully</p>';
		}
		else
			echo '<p>New password not confirmed</p>';
	}	
	else
		echo '<p>Old password not matched</p>';
}


else {
	$aId = $_SESSION['aId'];
	$u= $p->prepare("SELECT password FROM admin_login WHERE admin_id = $aId");
	$u->execute($_GET);
	$r = $u->fetch();
	if (password_verify($_POST['oPswd'], $r['password'])) {
		if ($_POST['nPswd'] == $_POST['cPswd']) {
			$hPass =password_hash($_POST['nPswd'],PASSWORD_DEFAULT);
			$s = $p->prepare("UPDATE admin_login SET password = '$hPass' WHERE admin_id = '$aId'");
			$s->execute();
			session_destroy();
			header('location:index.php');
			echo '<p>Password Updated Successfully</p>';
		}
		else
			echo '<p>New password not confirmed</p>';
	}	
	else
		echo '<p>Old password not matched</p>';
}
}


include 'footer.php';
?>

<?php 
	if (!empty($_SESSION['aId']) == !null || !empty($_SESSION['sId'])  == !null) 
	 { ?>
<main>
<form action="uPassword.php" method="POST" class="uPassword">
<label>Old password :</label>
<input type="text" name="oPswd"><br><br>
<label>New Password :</label>
<input type="password" name="nPswd"><br><br>
<label>Confirm Password :</label>
<input type="password" name="cPswd"><br><br>
<input type="submit" name="change" value="Update">
</form>
</main>
<?php } ?>