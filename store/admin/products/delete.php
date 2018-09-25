<link rel="stylesheet" href="../css/style.css"/>
<?php
	include "../includes/init.php";
	//include "../dependency.php";
	
	if(isset($_GET['id'])){
		$id = escape($_GET['id']);
		if(delete_this_row('products', $id)){
			redirect('../products');
			//show_message('Deleted', 'done');
		}
	}else{
		show_message('Invalid Request', 'error');
	}
?>