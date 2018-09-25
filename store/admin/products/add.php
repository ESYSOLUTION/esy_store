<?php
	include "../includes/init.php";
	$pagename = "Add Products";
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
		<?php include "../includes/nav_bar.php";?>	
	
	
		<div class="main">
			<div class="contents">
					<form method="post" action="add.php" enctype="multipart/form-data">
					<caption><h2>Fill In Product Detail</h2></caption>
<?php
	if(isset($_POST['upload'])){
		$product_name = escape($_POST['p_name']);//product name
		$product_detail = escape($_POST['p_detail']);//product detail
		$product_status = escape($_POST['p_status']);//product status
		$product_image = $_FILES['p_image'];//product image
		$product_price = escape($_POST['p_price']);//product price
		if(move_uploaded_file($_FILES["p_image"]["tmp_name"],"../img/" . $_FILES["p_image"]["name"])){
     		show_message("Image saved", "done");
			upload_product($product_name, $product_detail, $product_price, $_FILES["p_image"]["name"], $product_status);
		}else{
			show_message("Image not uploaded", "error");
		}
	}
?>
						<div class="form-group">
							<input class="input" name="p_name" type="text" placeholder="Product Name"/>
						</div>
						
						<div class="form-group">
							<input class="input" name="p_price" type="number" placeholder="Products Price"/>
						</div>

						<div class="form-group">
							<select class="input" name="p_status">
								<option value="">Choose Product Status</option>
								<option value="available">Available</option>
								<option value="not available">Not Available</option>
								<option value="on the way">On The Way</option>
							</select>
						</div>
						
						<div class="form-group">
							<input class="input" name="p_image" type="file" placeholder="Products Image"/>
						</div>
						
						<div class="form-group">
							<textarea class="input textarea" placeholder="Products Detail" name="p_detail"></textarea>
						</div>
						
						<div class="form-group">
							<input class="button" name="upload" value="Upload" type="submit" />
						</div>
					</form>
			</div>
		</div>
		
		<div class="footer">
			
		</div>
	</body>
</html>