
<?php
	include 'session.php';
	$id = $_SESSION['aId'];

	$a =$p->prepare("SELECT * FROM admin_login WHERE admin_id = $id");
	$a->execute();
	$f =$a->fetch();

	$c =$p->prepare("SELECT * FROM user_login");
	$c->execute();
	
	if (isset($_POST['send'])) {
			/* //Mail sending using mail()
				$t    = $_POST['to'];
				$subj = $_POST['subj'];
				$msg  = $_POST['msg'];
				$from = 'From: edselectronics$mail.com';
				mail($t, $subj, $msg, $from); */
			$u = $p->prepare("INSERT INTO notice(mail,subject,message,admin_id) VALUES(:to,:subj, :msg,:aId");
				$cc =[
					'to'   =>$_POST['to'],
					'subj' =>$_POST['subj'],
					'msg'  =>$_POST['msg'],
					'aId'  =>$_SESSION['aId'],
						
						];
			if ($u->execute($cc))
				echo '<p> Success</p>';
			else
				echo '<p> Failed </p>';
				

}
	

	include 'footer.php';
   
?>

<?php if (isset($_SESSION['aId'])) { ?>
<main>
	<h3>Send messeges or mail regarding product or any other details</h3><br><br>
	<form action="" method="POST">
		<label>To</label><br>
		<SELECT name="to">
			<?php foreach ($c as $key) { ?>
			<option value="<?php echo $key['mail']; ?>"><?php echo $key['mail']; ?></option>
		<?php } ?>
		</SELECT><br><br>
		<label>Subject</label>
		<input type="text" name="subj"><br>
		<label>Message</label>
		<textarea name="msg"></textarea><br><br>
		<label>From</label>
		<input type="text" name="from" value="<?php echo $f['mail'] ?>"><br><br>
		<input type="submit" name="send" value="Send Message"><br><br><br>
	</form>

</main>
<?php } ?>


