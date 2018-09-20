<?php
	include "./includes/init.php";
	$products = select_all_from('products');
	$orders = select_all_from('orders');
	
	//var_dump($orders);
?>
<html>
	<title>Esy Store Admin</title>
	<head>
		<link rel="stylesheet" href="./css/style.css"/>
	</head>
	
	<body>
	
	<!-- HEADER STARTS -->
		<div class="header">
			<h1>Esy Store | Admin</h1>
		</div>
	<!-- HEADER STOPS -->
	
	<!--NAVIGATION STARTS-->
		<div class="nav">
		
			<div class="page_list">
			<center>
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="products">Products</a></li>
				<li><a href="orders.php">Orders</a></li>
				<li><a href="messages.php">Messages</a></li>
			</ul>
			</center>
			</div>
		</div>
		
		<div class="main">
			<div class="contents">
			
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
						<p class="box-figure"><?php echo $products->num_rows?></p>
					</div>
					<div class="box-footer"><a class="button" href="#">more</a></div>
				</div>

				<div class="box">
					<div class="box-head">Orders</div>
					<div class="box-body">
						<p class="box-figure"><?php echo $orders->num_rows?></p>
					</div>
					<div class="box-footer"><a class="button" href="#">more</a></div>
				</div>
			</div>
		</div>
		
		<div class="footer">
			
		</div>
	</body>
</html>