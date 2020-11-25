<?php
	include 'session.php';
	
	if (isset($_POST['add'])) {		
			$s = $p->prepare("INSERT INTO products(name,c_id,admin_id,img,p_details,price)
				VALUES(:name,:c_id,:admin_id,:img,:details , :price)");
			$c =[
				'name' => $_POST['name'],
				'c_id' => $_POST['c_id'],
				'admin_id' =>$_SESSION['aId'],
				'img'	=> $_POST['img'],
				'details' => $_POST['details'],
				'price' => $_POST['price']
				];

				if($s->execute($c))
					echo '<h5> Inserted Successfully Proceed Further</h5>';
					/*//SENDING NOTIFICATIONS USING MAIL TO ALL THE USER ABOUT THE NEW PRODUCT
						$m =$p->prepare("SELECT * FROM user_login WHERE notice = 1");
						$m->execute();
						foreach ($m as $key) {
							$t    = $key['mail'];
							$subj = $_POST['name'];
							$msg  = $_POST['details'];
							$from = 'From: edselectronics$mail.com';
							mail($t, $subj, $msg, $from);
					}*/
					echo '<h5>All the customers who have signup are notified of the new product</h5>';
				
			}
	$ss = $p->prepare("SELECT * FROM category");
	$ss->execute();

	include 'footer.php';
?>

		<?php if (isset($_SESSION['aId'])) { ?>
		<main>
		<h2>Add new product</h2><br><br>
			<form action="" method="POST" > 
				<label>Product Name</label>
				<input type='text' name='name'><br>
				<label>Product Category</label>
				<select name="c_id">
				<?php
				foreach ($ss as $key) { ?>                                    
  				<option value="<?php echo $key['c_id'];?>"> <?php echo $key['type']; ?></option> <?php } ?>
				</select><br><br>
				<label>Product image</label>
				<input type="file" name="img"><br>
				<label>Product Details</label>
				<textarea name="details"></textarea><br><br>
				<label>Price</label>
				<input type='int' name='price'><br><br><br>
				<input type='submit' name='add' value='Add'>
			</form><br>
			
		</main>

		<?php } ?>