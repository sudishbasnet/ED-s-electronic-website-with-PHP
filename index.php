<?php
	session_start();
	include 'header.php'
?>

<section></section>
		<main>
			<h1>Welcome to Ed's Electronics</h1>

			<p>We stock a large variety of electrical goods including phones, tvs, computers and games. Everything comes with at least a one year guarantee and free next day delivery.</p>

			<hr />
			<hr />
			
			<h2>Product list</h2>

			
				<?php
					include 'products.php';
					?>

			<hr />

			</main>	
		<aside>

			<?php
				include 'feature.php';
				?>
		</aside>

	
<?php
include 'footer.php'

?>


