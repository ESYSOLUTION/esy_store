<?php
	include "../includes/init.php";
	$pagename = "Edit Products";
	if(isset($_GET['id'])){
		$id = escape($_GET['id']);
		$product = select_from_table_where('products', 'id', $id);
	}/*else{
		show_message("Invalid Request", 'error');
	}*/
	
?>
<html>
	<title>Esy Store Admin</title>
	<head>
		<link rel="stylesheet" href="../css/style.css"/>
		<link rel="stylesheet" href="../css/form.css"/>
	</head>
	
	<body>
	
	<!-- HEADER STARTS -->
	
	<!-- HEADER STARTS -->
		<?php include "../includes/header.php";?>
	<!-- HEADER STOPS -->
	
	<!--NAVIGATION STARTS-->
	<div class="nav">	
		<div class="page_list">
			<ul>
				<li><a href="../index.php">Home</a></li>
				<li><a href="../products">Products</a></li>
				<li><a href="../orders">Orders</a></li>
				<li><a href="../messages">Messages</a></li>
				<li><a href="../logout.php">Logout</a></li>
			</ul>
		</div>
	</div>
	
	
		<div class="main">
			<div class="contents">
					<form method="post" action="edit.php" enctype="multipart/form-data">
					<caption><h2>Fill In Product Detail</h2></caption>
<?php
	if(isset($_POST['update'])){
		$product_name = escape($_POST['p_name']);//product name
		$product_detail = escape($_POST['p_detail']);//product detail
		$product_status = escape($_POST['p_status']);//product status
		$id = escape($_POST['id']);
		$product_price = escape($_POST['p_price']);//product price
		$update = update_product($product_name, $product_detail, $product_price, $product_status, $id);
		if($update){
			redirect('../products');
		}else{
			echo $update;
		}
	}
?>
						<div class="form-group">
							<input type="hidden" name="id" value="<?php echo $product['id']?>" />
							<input class="input" value="<?php echo $product['product_name']?>" name="p_name" type="text" placeholder="Product Name"/>
						</div>
						
						<div class="form-group">
							<input class="input" value="<?php echo $product['product_price']?>" name="p_price" type="number" placeholder="Products Price"/>
						</div>

						<div class="form-group">
							<select value="<?php echo $product['status']?>" class="input" name="p_status">
								<option value="">Choose Product Status</option>
								<option value="available">Available</option>
								<option value="not available">Not Available</option>
								<option value="on the way">On The Way</option>
							</select>
						</div>
						<div class="form-group">
							<textarea class="input textarea" placeholder="Products Detail" name="p_detail"><?php echo $product['product_details']?></textarea>
						</div>
						
						<div class="form-group">
							<input class="button" name="update" value="Update" type="submit" />
						</div>
					</form>
			</div>
		</div>
		
		<div class="footer">
			
		</div>
	</body>
</html>