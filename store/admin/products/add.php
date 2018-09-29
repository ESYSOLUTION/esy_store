<?php
	include "../includes/init.php";
	$pagename = "Add Products";
//	var_dump($product_types)
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
					<form method="post" action="add.php" enctype="multipart/form-data">
					
					<caption><h2>Fill In Product Detail</h2></caption>
					<?php show_message(get_session_value('msg'), get_session_value('flag')); unset($_SESSION['msg'])?>
<?php
	if(isset($_POST['upload'])){
		$product_name = escape($_POST['p_name']);//product name
		$product_detail = escape($_POST['p_detail']);//product detail
		$product_status = escape($_POST['p_status']);//product status
		$product_image = $_FILES['p_image'];//product image
		$product_price = escape($_POST['p_price']);//product price
		$product_type = escape($_POST['p_type']);//product type
	if(validate_product_type($product_type)){
		if(move_uploaded_file($_FILES["p_image"]["tmp_name"],"../img/" . $_FILES["p_image"]["name"])){
     		show_message("Image saved", "done");
			upload_product($product_name, $product_detail, $product_price, $_FILES["p_image"]["name"], $product_status, $product_type);
		}else{
			show_message("Image not uploaded", "error");
		}
	}else{
		set_session_variable('msg', 'Unsupported Product Type');
		set_session_variable('flag', 'error');
		redirect('add.php');
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
								<?php
								$i = 0;
									while($i < count($product_status)){
										$val = strtolower($product_status[$i]);
										$value = strtoupper($product_status[$i]);
										echo "<option value=\"{$val}\">$value</option>";
										$i++;
									}
								?>
							</select>
						</div>
						
						<div class="form-group">
							<select class="input" name="p_type">
								<option value="">Choose Product Type</option>
								<?php
								$i = 0;
									while($i < count($product_types)){
										$val = strtolower($product_types[$i]);
										$value = strtoupper($product_types[$i]);
										echo "<option value=\"{$val}\">$value</option>";
										$i++;
									}
								?>
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