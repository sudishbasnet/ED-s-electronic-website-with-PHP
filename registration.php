<?php
	include 'header.php';
	$p = new PDO('mysql:dbname=assessment;host=localhost','root','');
	
	if(isset($_POST['create'])) {
			$s = $p->prepare("INSERT INTO user_login(uName,fName,mail,phone,location,password,notice)
				VALUES(:uName,:fName,:mail , :phone,:location, :password, :notice)");

			$c = [
				'uName' => $_POST['uName'],
				'fName' => $_POST['fName'],
				'mail' => $_POST['mail'],
				'phone' => $_POST['phone'],
				'location' => $_POST['location'],
				'password' => password_hash($_POST['password'],PASSWORD_DEFAULT),
				'notice' =>$_POST['notice'],
				];

				if($s->execute($c))
				header('location:login.php');

			}
	
	include 'footer.php';
?>




		<link rel="stylesheet" type="text/css" href="electronics.css">
		<main>
		<h2>Create New Account</h2>
			<form action="registration.php" method="POST"> 
				<label>Username</label>
				<input type="text" name="uName"><br>
				<label>Full Name</label>
				<input type="text" name="fName"><br>
				<label>mail</label>
				<input type="text" name="mail"><br>
				<label>Phone</label>
				<input type="number" name="phone"><br>
				
				<label>Location</label>
				<input type="text" name="location"><br>
				<label>Password</label>
				<input type="password" name="password"><br>
				<div>
				<label>Do you want to signup for the notification using email?</label><br><br>
				<input type="checkbox" name="notice" value="1"><br><br><br>
				<input type="submit" name="create" value="Create">
			</form>
			<div class="v">
				<ul>
				<a href="https://www.facebook.com/"><input type="submit" name="fb" value="Register With Facebook"></a><br><br>
				<a href="https://www.gmail.com/"><input type="submit" name="gmail" value="Register With Gmail"></a>
			</ul>
			</div>
		</main>