	
<form action="" method="POST"></form>
	<link rel="stylesheet" type="text/css" href="electronics.css">
	<form class="search" method="POST">
 	<input type="text" placeholder="Search.." name="search">
 	<input type='submit' value="GO" name="submit">
</form>

<?php
	if (isset($_POST['submit'])) {
	$word = $_POST['search'];
	header("location:searchProduct.php?ex=$word");
}

?>