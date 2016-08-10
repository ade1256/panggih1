<?php 
	session_start();
	require_once 'db.php';
	$db = new DB();
	$nav = $db->shows("SELECT * FROM menu ORDER BY id DESC LIMIT 5");
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Website Pariwisata Banyumas</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div id="nav">
	<div class="nav">
		<ul>
			<li class="logo"><a href="index.php">Banyumas<span>Ku</span></a></li>
			<li <?php if (@$aktif == 'index') echo 'class="active"'; ?>><a href="index.php">Home</a></li>
			<li><a href="tentang.php">Tentang</a></li>
			<li><a href="galeri.php">Galeri</a></li>
			<li><a href="kontak.php">Kontak</a></li>
			<li><a href="index.php">Top Destination</a>
				<ul>
					<?php foreach ($nav as $navs):?>
						<li><a href="dinamis.php?judul=<?php echo $navs['judul']; ?>"><?php echo $navs['judul']; ?></a></li>
					<?php endforeach; ?>
				</ul>
			</li>
		</ul>
		<ul class="login">
			<?php if (isset($_SESSION['user_session'])){ ?>
			<?php if ($_SESSION['level']=='admin') { ?>
			<li><a href="index-admin.php">Dasboard Admin</a></li>
			<?php } ?>
			<li><a href="logout.php">Logout</a></li>
			<?php }else{ ?>
			<li><a href="login.php">Login</a></li>
			<li><a href="register.php">Register</a></li>
			<?php } ?>
		</ul>
	</div>
</div>

