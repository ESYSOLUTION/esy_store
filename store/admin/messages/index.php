<?php
	include "../includes/init.php";
	$pagename = " Messages";
	$messages = select_all_from('messages');
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
		<?php show_message($_SESSION['msg'], 'done'); unset($_SESSION['msg'])?>
		<div class="contents">
				<?php
				$i = 0;
					if($messages->num_rows == 0){
						show_message('No Message In The Database', 'error');
					}else{
					//$prod = $products->fetch_assoc();
						echo "<table>
							<tr>
								<th>S/N</th>
								<th>Sender Name</th>
								<th>Product Id</th>
								<th>Date Added</th>
								<th>Actions</th>
							</tr>
						";
						while($mess = $messages->fetch_assoc()){
							$i++;
							//echo $prod['product_name'];
						//	echo "<img src='../img/{$prod['product_image']}'>";
							echo "<tr>";
								
								echo "<td>";
									echo $i;
								echo "</td>";
								
								echo "<td>";
									echo $mess['sender'];
								echo "</td>";
								
								echo "<td>";
									echo $mess['message'];
								echo "</td>";
								
								echo "<td>";
									echo $mess['date'];
								echo "</td>";
								
								echo "<td>";
									echo "<a href='delete.php?id={$mess['id']}' class='button'>Delete</a>";
									echo "<a href='mailto:{$mess['email']}' class='button'>Reply</a>";
									echo "<a href='view.php?id={$mess['id']}' class='button'>View</a>";
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