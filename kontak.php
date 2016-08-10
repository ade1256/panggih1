<?php require_once 'header.php' ?>
<?php 
	require_once 'db.php';
	$db = new DB();
	if (isset($_POST['kirim'])) {
		$nama = $_POST['nama'];
		$email = $_POST['email'];
		$isi = $_POST['isi'];
		$db->exec("INSERT INTO book (nama,email,isi) VALUES (?,?,?)",[$nama,$email,$isi]);
	}

 ?>
<div id="banner">
	<div class="banner">
		<h1>TENTANG KAMI</h1>
	</div>
</div>
<div id="konten">
	<div class="konten">
		<div class="kiri">
		<h2>Guest Book</h2>
			<form method="POST">
				<input type="text" name="nama" placeholder="Nama">
				<input type="email" name="email" placeholder="Email">
				<textarea placeholder="Isi" name="isi"></textarea>
				<input type="submit" name="kirim" value="Kirim" class="btn">
			</form>
		</div>
		<div class="kanan">
			<div class="inkanan">
				<div class="widget">
					<h2>Kontak Kami</h2>
					<ul>
						<li>afsasf</li>
						<li>afsasf</li>
						<li>afsasf</li>
					</ul>
				</div>
				<div class="widget">
					<h2>Social Media</h2>
					<ul>
						<li>afsasf</li>
						<li>afsasf</li>
						<li>afsasf</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<?php require_once 'footer.php' ?>
