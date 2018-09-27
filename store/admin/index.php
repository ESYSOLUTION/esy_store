<?php
	session_start();
	include "./includes/init.php";
	$pagename = "Home";
	$products = select_all_from('products');
	$orders = select_all_from('orders');
	$messages = select_all_from('messages');
	//var_dump($orders);
	
	if(!Auth()){
		redirect('login.php');
	}
	
?>
<html>
	<title>Esy Store Admin</title>
	<head>
		<link rel="stylesheet" href="./css/style.css"/>
	</head>
	
	<body>
	
	<!-- HEADER STARTS -->
		<?php include "includes/header.php";?>
	<!-- HEADER STOPS -->
	
	<!--NAVIGATION STARTS-->
	<div class="nav">
		<div class="page_list">
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="products">Products</a></li>
				<li><a href="orders">Orders</a></li>
				<li><a href="messages">Messages</a></li>
				<li><a href="logout.php">Logout</a></li>
			</ul>
		</div>
	</div>
		
	<!--	MAIN PAGE	-->
		<div class="main">
			<div class="contents">
			<p>You are logged in as</p>
			<p>Username <?php echo get_session_value('user')?></p>
			<p>Email <?php echo get_session_value('email'); ?></p>
				<div class="box">
					<div class="box-head">Products</div>
					<div class="box-body">
						<p class="box-figure"><?php echo $products->num_rows?></p>
					</div>
					<div class="box-footer"><a class="button" href="products">more</a></div>
				</div>
				
				<div class="box">
					<div class="box-head">Messages</div>
					<div class="box-body">
						<p class="box-figure"><?php echo $messages->num_rows?></p>
					</div>
					<div class="box-footer"><a class="button" href="messages">more</a></div>
				</div>

				<div class="box">
					<div class="box-head">Orders</div>
					<div class="box-body">
						<p class="box-figure"><?php echo $orders->num_rows?></p>
					</div>
					<div class="box-footer"><a class="button" href="orders">more</a></div>
				</div>
			</div>
		</div>
		
		<div class="footer">
			
		</div>
	</body>
</html>