<?php
	include "../includes/init.php";
	
	$products = select_all_from('products');
?>
<html>
	<title>Esy Store Admin</title>
	<head>
		<link rel="stylesheet" href="../css/style.css"/>
	</head>
	
	<body>
	
	<!-- HEADER STARTS -->
		<div class="header">
			<h1>Esy Store | Products</h1>
		</div>
	<!-- HEADER STOPS -->
	
	<!--NAVIGATION STARTS-->
		<div class="nav">
		
			<div class="page_list">
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="products.php">Products</a></li>
				<li><a href="orders.php">Orders</a></li>
				<li><a href="messages.php">Messages</a></li>
			</ul>
			</div>
		</div>
		
		<div class="main">
			<a href="add_products.php">Add Products</a>
			<div class="contents">
				<?php
					if($products->num_rows == 0){
						show_message('No Product In The Database', 'error');
					}else{
					//	echo "<table>";
						while($prod = $products->fetch_assoc()){
							echo $prod->product_name;
						}
					//	echo "</table>" ;
					}
				?>
			</div>
		</div>
		
		<div class="footer">
			
		</div>
	</body>
</html>