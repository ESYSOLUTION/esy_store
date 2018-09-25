<?php

/*
*DATABASE FUNCTIONS
*/
function select_all_from($table) {
	global $db;
	$sql = "select * from {$table}";
	$data = $db->query($sql);
	return $data;
}

function delete_this_row($table, $id){
	global $db;
	$sql = "delete from {$table} where id={$id}";
	$delete = $db->query($sql);
	if($delete){
		return $delete;
	}else{
		$err = mysqli_error($db);
		return $err;
	}
}

function select_from_table_where($table, $column, $value){
	global $db;
	$sql = "select * from {$table} where {$column}={$value}";
	$data = $db->query($sql);
	if($data){
		$data = $data->fetch_assoc();
		return $data;
	}else{
		$err = $db->error;
		return $err;
	}
}

/*
*	Normal Functions
*/
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

function alert($text){
	echo "
				<script>
					alert(\"$text\");
				</script>
			";
}

function redirect($url){
	header("location: {$url}");
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

function update_product($pname, $pdetail, $pprice, $pstatus, $pid){
	global $db;
	//echo $pname;
	//echo $pdetail;
	//echo $pprice;
	
	//var_dump($pimage);
		
	$sql = "update products set product_name = \"{$pname}\", product_price = \"{$pprice}\", product_details = \"{$pdetail}\", status = \"{$pstatus}\" where id = \"{$pid}\"";
	$update = $db->query($sql); 
	
	if($update){
		show_message("Product with {$pid} have been Updated", "done");
		return $update;
	}else{
		show_message("Product with {$pid} was not Updated ".mysqli_error($db), "error");
		return mysqli_error($db);
	}
	
}

function escape($string){
	global $db;
	$escaped = $db->real_escape_string($string);
	return $escaped;
}

?>