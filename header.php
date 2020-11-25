
<link rel="stylesheet" href="electronics.css" />
<header>
			<h1>Ed's Electronics</h1>


			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="#">Products</a>
					
						<?php
							include 'category.php';
							?>
						
				</li>
				<li><?php			
				if (isset($_SESSION['aId'])) {
						echo "Manage System";
						include 'managePage.php';
						}
				else if(isset($_SESSION['sId'])){
						echo '<a href="shopping.php">Shopping cart</a>';
					}
				else{
							echo "Shopping<ul><li>Login First</li></ul>";
					}
				
				?>
				</li>

				<?php
				if (isset($_SESSION['aId'])) {
						echo '<li><a href ="orders.php">Orders</a></li>';
					}				
				?>
				
				<li><?php
						include 'search.php'
						?>
				</li>

				<li><?php
						$p = new PDO('mysql:dbname=assessment;host=localhost','root','');
						if (isset($_SESSION['sId'])) {
							$id = $_SESSION['sId'];
							$u = $p->prepare("SELECT uName FROM user_login WHERE user_id = '$id'");
							$u->execute();
							$s =$u->fetch();
							echo $s['uName'];
						}
						else if (isset($_SESSION['aId'])) {
							$id = $_SESSION['aId'];
							$u = $p->prepare("SELECT uName FROM admin_login WHERE admin_id = '$id'");
							$u->execute();
							$s =$u->fetch();
							echo $s['uName'];
						}
						else 
							echo "Account";
						?>
					<ul>
						<?php
						
						if ($_SESSION == !null){
							echo '<li><a href ="logout.php"> Logout</a></li>';
							echo '<li><a href ="uPassword.php"> Change password</a></li>';
							echo '<li><a href ="uInfo.php"> Update Information</a></li>';
						}
						else
							echo '<li><a href="login.php">Login</a></li>';
						?>	
					</ul>
					</li>

			</ul>

			<address>
				<p>We are open 9-5, 7 days a week. Call us on
					<strong>01604 11111</strong>
				</p>
			</address>



		</header>
