<?php 
	require_once 'db.php';
	require_once 'user.php';
	$db = new DB();
	$user = new User($db);
	if (isset($_POST['login'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];
		if ($user->login($username,$password)) {
			switch ($_SESSION['level']) {
				case 'admin':
						header("location:index-admin.php");
					break;
				
				default:
						header("location:index.php");
					break;
			}
		}else{
			$messages = '<div style="color:red;">Login Gagal, Silahkan Ulangi Lagi!</div>';
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
	<h2>LOGIN</h2>
		<form method="POST">
		<div class="messages"><?php if (isset($messages)) echo $messages;; ?></div>
			<input type="name" name="username" placeholder="Username" required="">
			<input type="password" name="password" placeholder="Password" required="">
			<input type="submit" name="login" value="LOGIN">
		</form>
		<p>Belum Punya Akun? <a href="register.php">Daftar</a></p>
	</div>
</div>
</body>
</html>