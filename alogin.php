<?php

include 'session.php';

if (isset($_POST['login'])) {
    $s = $p->prepare('SELECT * FROM admin_login WHERE uName = :uName');  
	$c = [
        'uName' => $_POST['uName']
    ];
    $s->execute($c);
    $r = $s->fetch();
    if (password_verify($_POST['password'], $r['password'])) {
        $_SESSION['aId'] = $r['admin_id'];
        header('location:index.php');
    }
    else 
         echo '<p>Password wrong!! </p>';
 }

include 'footer.php';
?>


<?php if (!empty($_SESSION['aId']) == null) { ?>
<main>

<br><br><br><br>
<h2>Login To Admin Account</h2><br>
<form action="" method="POST">
	<label>Username</label>
	<input type="text" name="uName"><br><br>
	<label>Password</label>
	<input type="password" name="password"><br><br>
	<input type="submit" name="login" value="login">
</form><br><br><br><br><br><br>


</main>

<?php } ?>