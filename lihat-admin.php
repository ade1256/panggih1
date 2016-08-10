<?php 
	require_once 'db.php';
	$db = new DB();
	$data = $db->shows("SELECT * FROM artikel");

?>
<?php require_once 'header.php' ?>
<div id="banner">
	<div class="banner">
		<h1>DAFTAR BERITA </h1>
	</div>
</div>
<div id="konten">
	<div class="konten">
		<div class="admin">
		<table width="100%">
			<tr>
				<th>Judul</th>
				<th>Jenis Posting</th>
				<th>Tempat</th>
				<th>Aksi</th>
			</tr>
			<?php foreach ($data as $datas):?>
				<tr>
					<td><?php echo $datas['judul']; ?></th>
					<td><?php echo $datas['jenis_posting']; ?></th>
					<td><?php echo $datas['tempat']; ?></th>
					<td><a href="delete.php">Delete</a></th>
				</tr>
			<?php endforeach; ?>
		</table>
		</div>
	</div>
<?php require_once 'footer.php' ?>
