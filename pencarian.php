<?php require_once 'header.php' ?>
<?php 
	require_once 'db.php';
	$db = new DB();

	if (isset($_GET['cari'])) {
		$filter = '%'.$_GET['cari'].'%';
		$data = $db->shows("SELECT * FROM artikel WHERE judul LIKE ? or isi LIKE ?", [$filter,$filter]);
	}

 ?>
<div id="banner">
	<div class="banner">
		<h1>Hasil dari : <?php echo $_GET['cari']; ?></h1>
	</div>
</div>
<div id="konten">
	<div class="konten">
		<div class="kiri">
		<?php foreach ($data as $hasils): ?>
			<div class="post">
				<div class="imagepost" style="background-image: url(artikel/<?php echo $hasils['image']; ?>);"></div>
				<div class="kontenpost">
					<h2><a href="artikel.php?id=<?php echo $hasils['id']; ?>"><?php echo substr($hasils['judul'], 0,30); ?></a></h2>
					<p><?php echo substr($hasils['isi'], 0,150); ?></p>
					<div class="meta">
						<ul>
							<li>Diposting oleh : Admin</li>
							<li>Tanggal : 41224</li>
						</ul>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
		</div>
		<div class="kanan">
			<div class="inkanan">
				<form method="GET" action="pencarian.php">
					<input type="search" name="cari" placeholder="Pencarian">
				</form>
			</div>
		</div>
	</div>
</div>
<?php require_once 'footer.php' ?>
