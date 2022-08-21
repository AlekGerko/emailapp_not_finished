<?php 

if(isset($_POST["u_name"]) && isset($_POST["u_email"]) && isset($_POST["u_pass"]) ){
	
	require_once "connect.php";

	$u_name = $_POST['u_name'];
	$u_email = $_POST['u_email'];
	$u_pass = $_POST['u_pass'];

	$sql = "INSERT INTO eapp_users (name, email, password, send_update) VALUES ('$u_name', '$u_email', '$u_pass', 0)";

	if($connection->query($sql)){
		echo "registered!";
		echo "<a href='http://isupply.great-site.net/emailapp/index.php'>continue to Log in</a>";
	} else{
	    echo "Error: " . $connection->error;
	}
	$connection->close();
	
}
else {
	echo '<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>email app</title>
	<meta charset="utf-8">
</head>
<body>
	<header></header>
	<main>
		<section>
			<div>
				<h2>Register</h2>
				<form action="" method="post" enctype="multipart/form-data">
					<p>Name: <input type="text" name="u_name"></p>
					<p>Email: <input type="email" name="u_email"></p>
					<p>Password: <input type="password" name="u_pass"></p>
					<p><input type="submit" name="" value="Register"></p>
				</form>
			</div>
		</section>
	</main>
	<footer></footer>
</body>
</html>
';
}
?>