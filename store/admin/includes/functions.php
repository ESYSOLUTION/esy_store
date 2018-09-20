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


?>