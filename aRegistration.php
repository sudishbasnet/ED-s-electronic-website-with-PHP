<?php
	include 'session.php';
	if (isset($_POST['register'])) {
			$s = $p->prepare("INSERT INTO admin_login(uName,fName,mail,phone,location,password)
				VALUES(:uName,:fName,:mail , :phone,:location, :password)");

			$c = [
				'uName' => $_POST['uName'],
				'fName' => $_POST['fName'],
				'mail' => $_POST['mail'],
				'phone' => $_POST['phone'],
				'location' => $_POST['location'],
				'password' => password_hash($_POST['password'],PASSWORD_DEFAULT),
				];

				if($s->execute($c)){
				echo '<p> New Admin Registered</p>';
			}
				else
					echo '<p>Something missing</p>';
			}


	include 'footer.php';
?>


<?php if (isset($_SESSION['aId'])) { ?>
		<main>
		<h2>Register New Admin</h2>
			<form action="aRegistration.php" method="POST"> 
				<label>Username</label>
				<input type="text" name="uName"><br>
				<label>Admin Name</label>
				<input type="text" name="fName"><br>
				<label>Mail</label>
				<input type="text" name="mail"><br>
				<label>Phone</label>
				<input type="number" name="phone"><br>
				
				<label>Location</label>
				<input type="text" name="location"><br>
				<label>Password</label>
				<input type="password" name="password"><br><br><br>
				<input type="submit" name="register" value="Register"><br>
			</form>
		</main>

		<?php } ?>