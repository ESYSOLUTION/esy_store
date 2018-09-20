<?php

function select_all_from($table) {
	global $db;
	$sql = "select * from {$table}";
	$data = $db->query($sql);
	return $data;
}

function show_message($message, $type){
	if($type == "error"){
		echo "
			<div class='error'>
				{$message}
			</div>
		";
	}
	
	if($type == "done"){
		echo "
			<div class='done'>
				{$message}
			</div>
		";
	}
}

function upload_product($pname, $pdetail, $pprice, $pimage, $pstatus){
	global $db;
	//echo $pname;
	//echo $pdetail;
	//echo $pprice;
	
	//var_dump($pimage);

	
	$image = $_FILES['pimage']['name'];
		
	$sql = "insert into products (product_name, product_price, product_details, product_image, status)
	values(\"$pname\", \"$pprice\", \"$pdetail\", \"$pimage\", \"$pstatus\")";
	$upload = $db->query($sql); 
	
	if($upload){
		show_message("Product Uploaded", "done");
	}else{
		show_message("Product not Uploaded ".mysqli_error($db), "error");
	}
	
}

function escape($string){
	global $db;
	$escaped = $db->real_escape_string($string);
	return $escaped;
}

?>