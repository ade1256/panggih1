<?php require_once 'header.php' ?>
<?php 
	require_once 'db.php';
	$db = new DB();

		if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$data = $db->show("SELECT * FROM artikel WHERE id=?", [$id]);
		}


		if (isset($_POST['kirim'])) {
			$id_artikel = $_POST['id_artikel'];
			$isi = $_POST['komentar'];
			$id_user = $_SESSION['user_session'];
			$aa = $db->exec("INSERT INTO komentar (id_artikel,isi,id_user) VALUES (?,?,?)", [$id_artikel,$isi,$id_user]);
		}

		$id_artikel = $_GET['id'];
		$komentar = $db->shows("SELECT * FROM komentar,user WHERE komentar.id_user = user.id AND komentar.id_artikel=? ",[$id_artikel]);

		$random = $db->shows("SELECT * FROM artikel ORDER BY rand() LIMIT 5")

 ?>
<div id="banner">
	<div class="banner">
		<h1><?php echo $data['judul']; ?></h1>
	</div>
</div>
<div id="konten">
	<div class="konten">
		<div class="kiri">
		<h2><?php echo $data['judul']; ?></h2>
			<div class="kontenimg" style="background-image:url(artikel/<?php echo $data['image']; ?>)"></div>
			<div class="meta">
				<ul>
					<li>Diposting oleh : Admin</li>
					<li>Tanggal : <?php echo $data['tanggal']; ?></li>
				</ul>
			</div><br><br>
			<div class="isi"><?php echo $data['isi']; ?></div>
			<div class="komentar">
				<h2>Komentar</h2>
				<?php if (isset($_SESSION['user_session'])) { ?>
					<form method="POST">
							<input type="hidden" name="id_artikel" value="<?php echo $id;?>">
							<textarea name="komentar"></textarea>
							<input type="submit" name="kirim" value="Kirim" class="btnkomen">
						</form>
				<?php } ?>
							<?php foreach ($komentar as $komentars):?>

				<ul class="isikomentar">
					<li class="pengkomen"><?php echo $komentars['username']; ?></li>
					<li class="isikomen"><?php echo $komentars['isi']; ?></li>
				</ul>
					<?php endforeach; ?>

			</div>
		</div>
		<div class="kanan">
			<div class="inkanan">
				<form method="GET" action="pencarian.php">
					<input type="search" name="cari" placeholder="Pencarian">
				</form>
				<div class="widget">
					<h2>Random Post</h2>
					<ul>
						<?php foreach ($random as $randoms): ?>
							<li><a href="artikel.php?id=<?php echo $randoms['id']; ?>"><?php echo $randoms['judul']; ?></li>
						<?php endforeach; ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<?php require_once 'footer.php' ?>
