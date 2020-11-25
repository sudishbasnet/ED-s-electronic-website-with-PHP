<?php
    $p = new PDO('mysql:dbname=assessment;host=localhost','root','');
    $pId = $_GET['pId'];
    $totalRating = $p->prepare("SELECT * FROM rating WHERE p_id ='$pId'");
    $totalRating->execute();
    $total =0;
    foreach ($totalRating as $key) {
       $total += $key['rate'];
    }

    $img = "images/star1.gif";
    $img1 = "images/star1.gif";
    $img2 = "images/star1.gif";
    $img3 = "images/star1.gif";
    $img4 = "images/star1.gif";

    if (isset($_SESSION['sId'])) {
        $uId =$_SESSION['sId'];
    if (isset($_POST[1])) {
            unset($_POST[1]);
            $img = "images/star2.gif";
            $s =$p->prepare("INSERT INTO rating(rate,p_id,user_id) VALUES(1,'$pId','$uId')");
            $s->execute();
            
    }
    else if (isset($_POST[2])) {
        $img = "images/star2.gif";
        $img1 = "images/star2.gif";
        $s =$p->prepare("INSERT INTO rating(rate,p_id,user_id) VALUES(2,'$pId','$uId')");
            $s->execute();
    }
    else if (isset($_POST[3])) {
        $img = "images/star2.gif";
        $img1 = "images/star2.gif";
        $img2 = "images/star2.gif";
        $s =$p->prepare("INSERT INTO rating(rate,p_id,user_id) VALUES(3,'$pId','$uId')");
            $s->execute();
    }
    else if (isset($_POST[4])) {
        $img = "images/star2.gif";
        $img1 = "images/star2.gif";
        $img2 = "images/star2.gif";
        $img3 = "images/star2.gif";
        $s =$p->prepare("INSERT INTO rating(rate,p_id,user_id) VALUES(4,'$pId','$uId')");
            $s->execute();

    }
    else if(isset($_POST[5])) {
        $img = "images/star2.gif";
        $img1 = "images/star2.gif";
        $img2 = "images/star2.gif";
        $img3 = "images/star2.gif";
        $img4 = "images/star2.gif";
        $s =$p->prepare("INSERT INTO rating(rate,p_id,user_id) VALUES(5,'$pId','$uId')");
            $s->execute();

    }
}
    else 
    echo " <script> alert('Login first as customer') </script>";
?>

<form name="rating" action=" " method="POST" class="rating">
    <h3>Rate the product :</h3>
    <button type="submit" name="1" value="1" class="button"><img src=<?php echo $img ?> /></button>
    <button type="submit" name="2" value="2" class="button"><img src=<?php echo $img1 ?> /></button>
    <button type="submit" name="3" value="3" class="button"><img src=<?php echo $img2 ?> /></button>
    <button type="submit" name="4" value="4" class="button"><img src=<?php echo $img3 ?> /></button>
    <button type="submit" name="5" value="5" class="button"><img src=<?php echo $img4 ?> /></button>
 </form> 
    <h3>Total ratings : <?php echo $total ?></h3>