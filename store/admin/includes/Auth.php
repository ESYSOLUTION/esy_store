<?php
	function Auth(){
		if($_SESSION['admin_online'] == true){
			//$_SESSION['msg'] = "";
			return true;
		}else{
			return false;
		}
	}
	
	function login($email, $pass){
		if(strlen($email) == 0 && strlen($pass) == 0){
			$response = "All field are required";
			alert($response);
		}else
			if($email == "admin@gmail.com" && $pass == "admin"){
				$_SESSION['admin_online'] = true;
				$_SESSION['user'] = "Admin";
				$_SESSION['email'] = $email;
				redirect("index.php");
			}else
				if($email!="admin@gmail.com"){
					alert("Email not correct");
				}else
					if($pass != "admin"){
						alert("Password not correct");
					}else{
				alert("Incorrect credentials");
			}
	}
	
	function logout($url){
		session_start();
		if(session_destroy()){
			set_session_variable('msg', 'You are now logged out');
			redirect($url);
		}
	}
?>