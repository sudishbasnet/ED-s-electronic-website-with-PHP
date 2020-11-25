<?php
include 'session.php';
if(isset($_POST['add'])){
		if (isset($_SESSION['sId'])) {
		$comment =$p->prepare("INSERT INTO reviews(p_id,user_id,review) VALUES(:pId, :uId ,:comment)");
		$c = [
				'pId' => $_GET['pId'],
				'uId' => $_SESSION['sId'],
				'comment' => $_POST['comment'],
		];
		if($comment->execute($c))
			$pId = $_GET['pId'];
			header("location:productPage.php?pId=$pId");			
	}
			
		else 
			echo "<p> Login first as a customer to add your review</p>";
}
			echo "<script> alert('Your review will be held in admin section for action!!') </script>";

?>


<main>
	
<form action="" method="POST">
			<label>Comment your feedback</label><br><br>
			<textarea name="comment"></textarea><br><br><br>
			<input type="submit" name="add" value="Add comment">
</form>
</main>