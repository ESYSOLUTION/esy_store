<?php
	include "../includes/init.php";
	$pagename = "Product Detail";
	if(isset($_GET['id'])){
		$id = escape($_GET['id']);
		$product = select_from_table_where('products', 'id', $id);
	}else{
		show_message("Invalid Request");
	}
?>
<html>
	<title>Esy Store Admin</title>
	<head>
		<link rel="stylesheet" href="../css/style.css"/>
	</head>
	
	<body>
	
	<!-- HEADER STARTS -->
		<?php include "../includes/header.php";?>
	<!-- HEADER STOPS -->
	
	<!--NAVIGATION STARTS-->
		<?php include "../includes/nav_bar.php";?>
		
		<div class="main">
			<div class="contents">
				<h1>Detail on <?php echo $product['product_name']?></h1>
					<div>
						<img src='../img/<?php echo $product['product_image']?>'>
					</div>
					<div>
						<a href='delete.php?id=<?php echo $product['id']?>' class='button'>Delete</a>
						/ <a href='update.php?id=<?php echo $prod['id']?>' class='button'>Update</a>
					</div>
					<div>
						<p>Price <b>#<?php echo $product['product_price']?></b></p>
						<p>Detail:</p>
						<p><?php echo $product['product_details']?></p>
					</div>
			</div>
		</div>
		
		<!--FOOYER START-->
		<div class="footer">
			
		</div>
	</body>
</html>