<?php
session_start();

if (isset($_SESSION['sId'])) {
unset($_SESSION['sId']);
}
else
	unset($_SESSION['aId']);

header('location:index.php');
echo '<p> You are logged out </p>';
?>
