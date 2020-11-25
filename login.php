<?php

include 'session.php';

if (isset($_POST['login'])) {
    $s = $p->prepare('SELECT * FROM user_login WHERE uName = :uName');  
	$c = [
        'uName' => $_POST['uName']
    ];
    $s->execute($c);
    $r = $s->fetch();
    if (password_verify($_POST['password'], $r['password']) || $_POST['password'] == $r['password']) {
        $_SESSION['sId'] = $r['user_id'];
        header('location:index.php');
        echo '<p>Logged in</p>';
    }
    else 
         echo "<script> alert('wrong password') </script>";
 }

include 'footer.php';
?>

<?php if (!empty($_SESSION['sId']) == null) { ?>
<main>

<br><br><br><br>
<h2>Login To Your User Account</h2><br>
<form action="" method="POST">
	<label>Username</label>
	<input type="text" name="uName"><br><br>
	<label>Password</label>
	<input type="password" name="password"><br><br>
	<input type="submit" name="login" value="login">
</form><br><br><br>
<div class="v">
    <ul>
        <a href="alogin.php"><input type="submit" name="create" value="Login To Admin Account"></a><br><br>
		<a href="https://www.facebook.com/"><input type="submit" name="fb" value="Login Using Facebook"></a><br><br>
		<a href="https://www.gmail.com/"><input type="submit" name="gmail" value="Login Using Gmail"></a><br><br>
		<a href="registration.php"><input type="submit" name="create" value="Create New Account"></a>
        
    </ul>
</div><br><br><br>

</main>
<?php } ?>