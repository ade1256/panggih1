<?php 
	require_once 'db.php';
	$db = new DB();
	if (isset($_POST['kirim'])) {
		$tmp = $_FILES['image']['tmp_name'];
		$image = $_FILES['image']['name'];
		move_uploaded_file($tmp, "artikel/".$image);

		$judul = $_POST['judul'];
		$tanggal = $_POST['tanggal'];
		$jenis_posting = $_POST['jenis_posting'];
		$tempat = $_POST['tempat'];
		$isi = $_POST['isi'];
		$db->exec("INSERT INTO artikel (judul,tanggal,image,jenis_posting,tempat,isi) VALUES (?,?,?,?,?,?)", [$judul,$tanggal,$image,$jenis_posting,$tempat,$isi]);
	}


?>
<?php require_once 'header.php' ?>
<div id="banner">
	<div class="banner">
		<h1>TAMBAH BERITA ADMIN</h1>
	</div>
</div>
<div id="konten">
	<div class="konten">
		<div class="admin">
			
		<form method="POST" enctype="multipart/form-data">
			<input type="text" name="judul" placeholder="Judul">
			<input type="hidden" name="tanggal" value="<?php echo date("Y/m/d"); ?>">
			<input type="file" name="image">
			<select name="jenis_posting">
				<option value="">-- Jenis Posting --</option>
				<option value="Header">Header</option>
				<option value="Konten">Konten</option>
			</select>
			<select name="tempat">
				<option value="">-- Pilih Tempat --</option>
			<?php foreach ($tempat as $tempats): ?>
				<option value="<?php echo $tempats['judul']; ?>"><?php echo $tempats['judul']; ?></option>
			<?php endforeach; ?>
			</select>
			<textarea placeholder="Isi" name="isi"></textarea>
			<input type="submit" name="kirim" value="Kirim" class="btn" onclick="polling()">
		</form>
		</div>
	</div>
<?php require_once 'footer.php' ?>
