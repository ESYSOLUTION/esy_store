<?php
	include "../includes/init.php";
	$sql = "select * from products";
	$products = $db->query($sql);
	//$products = select_all_from('products');
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
			<a class='button' href="add.php">Add Products</a>
			<div class="contents">
				<?php
					if($products->num_rows == 0){
						show_message('No Product In The Database', 'error');
					}else{
					//$prod = $products->fetch_assoc();
						echo "<table>
							<tr>
								<th>Product Name</th>
								<th>Product Price</th>
								<th>Product Id</th>
								<th>Date Added</th>
								<th>Actions</th>
							</tr>
						";
						while($prod = $products->fetch_assoc()){
							//echo $prod['product_name'];
							echo "<tr>";
								echo "<td>";
									echo $prod['product_name'];
								echo "</td>";
								
								echo "<td>";
									echo $prod['product_price'];
								echo "</td>";
								
								echo "<td>";
									echo $prod['date'];
								echo "</td>";
								
								echo "<td>";
									echo strtoupper($prod['status']);
								echo "</td>";
								
								echo "<td>";
									echo "<a class='button'>Delete</a>";
									echo "<a class='button'>Update</a>";
									echo "<a class='button'>View</a>";
								echo "</td>";
								
							echo "</tr>";
						}
						echo "</table>" ;
					}
				?>
			</div>
		</div>
		
		<!--FOOYER START-->
		<div class="footer">
			
		</div>
	</body>
</html>