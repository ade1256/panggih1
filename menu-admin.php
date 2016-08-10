<?php 
	require_once 'db.php';
	$db = new DB();
	if (isset($_POST['kirim'])) {
		$judul = $_POST['judul'];
		$db->exec("INSERT INTO menu (judul) VALUES (?)", [$judul]);
	}

	$data = $db->shows("SELECT * FROM menu");

 ?>
<?php require_once 'header.php' ?>
<div id="banner">
	<div class="banner">
		<h1>MENU ADMIN</h1>
	</div>
</div>
<div id="konten">
	<div class="konten">
		<div class="admin">
		<form method="POST">
			<input type="text" name="judul" placeholder="Judul">
			<input type="submit" name="kirim" value="Kirim" class="btn">
		</form>
		<br>
		<br>
		<br>
		<table width="100%">
			<tr>
				<th>Judul</th>
				<th>Aksi</th>
			</tr>
		<?php foreach ($data as $datas):?>
			<tr>
				<td><?php echo $datas['judul']; ?></th>
				<td><a href="delete.php">Delete</a></th>
			</tr>
		<?php endforeach; ?>
		</table>
		</div>
	</div>
<?php require_once 'footer.php' ?>
