<?php
	include "../includes/init.php";
	$pagename = " Orders";
	$orders = select_all_from('orders');
?>

<html>
	<title></title>
	<head>
		<link rel="stylesheet" href="../css/style.css"/>
	</head>
	<body>
	<div class="main">
		<?php include "../includes/header.php";?>
		
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
		<?php show_message(get_session_value('msg'), get_session_value('msg_flag')); unset($_SESSION['msg'])?>
		<div class="contents">
				<?php
				$i = 0;
					if($orders->num_rows == 0){
						show_message('No Order In The Database', 'error');
					}else{
					//$prod = $products->fetch_assoc();
						echo "<table>
							<tr>
								<th>S/N</th>
								<th>Customer Name</th>
								<th>Customer Phone</th>
								<th>Actions</th>
							</tr>
						";
						while($order = $orders->fetch_assoc()){
							$i++;
							//echo $prod['product_name'];
						//	echo "<img src='../img/{$prod['product_image']}'>";
							echo "<tr>";
								
								echo "<td>";
									echo $i;
								echo "</td>";
								
								echo "<td>";
									echo $order['customer_name'];
								echo "</td>";
								
								echo "<td>";
									echo $order['customer_phone_number'];
								echo "</td>";
								
								echo "<td>";
									echo $order['date'];
								echo "</td>";
								
								echo "<td>";
									echo "<a href='delete.php?id={$order['id']}' class='button'>Delete</a>";
									echo "<a href='activate.php?id={$order['id']}' class='button'>Place</a>";
									echo "<a href='view.php?id={$order['id']}' class='button'>View</a>";
								echo "</td>";
								
							echo "</tr>";
						}
						echo "</table>" ;
					}
				?>
			</div>
		
	</div>
	</body>
</html>