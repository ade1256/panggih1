<?php 
	require_once 'db.php';
	require_once 'user.php';
	$db = new DB();
	$user = new User($db);
	if (isset($_POST['register'])) {
		$username = $_POST['username'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$level = "user";
		if ($user->register($username,$email,$password,$level)) {
			$messages = '<div style="color:green;">Registrasi Berhasil, Silahkan Login!</div>';
		}else{
			$messages = '<div style="color:red;">Registrasi Gagal, Silahkan Ulangi Lagi!</div>';
		}
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div id="halaman">
	<div class="halaman">
	<h2>REGISTER</h2>
		<form method="POST">
		<div class="messages"><?php if (isset($messages)) echo $messages ?></div>
			<input type="name" name="username" placeholder="Username" minlength="6" required="">
			<input type="email" name="email" placeholder="Email" minlength="6" required="">
			<input type="password" name="password" placeholder="Password"  minlength="6" required="">
			<input type="submit" name="register" value="REGISTER">
		</form>
		<p>Sudah Punya Akun? <a href="login.php">Login</a></p>
	</div>
</div>
</body>
</html>