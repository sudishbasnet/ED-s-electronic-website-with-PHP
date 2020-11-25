<?php
	include 'session.php';
	if (isset($_POST['add'])) {		
			$s = $p->prepare("INSERT INTO category(type) VALUES(:type)");
			$c = [				
				'type' => $_POST['type'],
				];

				if($s->execute($c))
				echo '<h5> Category added proceed further</h5>';
	}

	
	$ss = $p->prepare("SELECT * FROM category");
	$ss->execute();

	if (isset($_POST['update'])) {		
		$s = $p->prepare("UPDATE category SET type =:type WHERE c_id =:c_id");
		$c =[
				'type' => $_POST['type'],
				'c_id' => $_POST['c_id']
		];
		if ($s->execute($c)){
			echo '<p> Category updated</p>';
		}
	}
	include 'footer.php';
?>

	<?php if (isset($_SESSION['aId'])) { ?>
		<main>
		
		<h2>Add new category</h2><br><br>
			<form action=" " method="POST"> 
				<label>Category Name</label>
				<input type="text" name="type"><br><br>
				<input type="submit" name="add" value="Add"><br><br><br><br>
			</form>

	
				<h2>Edit Category</h2><br><br>
				<form action=" " method="POST" >
					<label>Select Category ::</label>
					<select name="c_id">
					<?php 
                    foreach ($ss as $key) { ?>             
  					<option value="<?php echo $key['c_id'];?>"> 
  					<?php echo $key['c_id']; echo "  "; echo $key['type'] ?>
  					</option> 
  					<?php } ?>
					</select><br><br><br>
					<input type="text" name="type" placeholder="category name"><br><br>
				    <input type="submit" name="update" value="update">
				</form>
		
			
		</main>
	<?php } ?>