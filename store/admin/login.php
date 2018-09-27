<?php
	include "./includes/init.php";
	$pagename = "Login";
?>

<html>
	<title>Esy Store Admin</title>
	<head>
		<link rel="stylesheet" href="./css/style.css">
		<link rel="stylesheet" href="./css/form.css">
	</head>
	<body>
	<?php include "includes/header.php"?>
		
<?php
	if(Auth()){
		redirect("index.php");
	}else
		if(isset($_POST['login'])){
			$email = escape($_POST[email]);
			$pass = escape($_POST['pass']);
			login($email, $pass);
	}else{
		show_message("You are not logged In", "error");
	//	show_message(get_session_value('msg'), 'error');
	}
?>
	<div class="contents">
		<div class="box">
		
			<form action="login.php" method="POST" >
			<?php echo get_session_value('msg')?>
			<caption><h1>Login Here</h1></caption>
				<div class="form-group">
					<input class="input" name="email" type="text" placeholder="E-mail"/>
				</div>
			
				<div class="form-group">
					<input class="input" name="pass" type="password" placeholder="Password"/>
				</div>
		
				<div class="form-group">
					<input class="input button" name="login" value ="Login" type="submit"/>
				</div>
				
			</form>
			
		</div>
	</div>
	
	</body>
</html>