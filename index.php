<?php $aktif = "index" ?>
<?php 
	require_once 'db.php';
	$db = new DB();

	$banyakData = $db->show("SELECT count(id) FROM artikel")[0];
	@$page = ((int)$_GET['page']) > 0 ? $_GET['page'] : 1;
	$limit = 4;
	$mulai_dari = $limit * ($page - 1);
	$hasil = $db->shows("SELECT * FROM artikel ORDER BY id DESC LIMIT $mulai_dari, $limit");

	$header = $db->shows("SELECT * FROM artikel WHERE jenis_posting='header' ORDER BY id DESC LIMIT 3");

	$link = $db->shows("SELECT * FROM link ORDER BY id LIMIT 5");

	if (isset($_POST['voting'])) {
		@$polling = $_POST['polling'];
		$db->exec("INSERT INTO voting (polling) VALUES (?)", [$polling]);
	}

	$datvot = $db->shows("SELECT polling, count(id) jml FROM voting group by polling");

	foreach ($datvot as $datvots) {
		switch ($datvots['polling']) {
			case 'Sangat Bagus':
				$sangat = $datvots['jml'];
				break;

			case 'Bagus':
				$bagus = $datvots['jml'];
				break;
			
			default:
				$kurang = $datvots['jml'];
				break;
		}
	}
?>
<?php require_once 'header.php' ?>
<div id="slides">
<?php foreach ($header as $headers) : ?>
	<div class="slides fade">
		<h2><?php echo $headers['judul']; ?></h2>
		<p><?php echo $headers['isi']; ?></p>
		<a href="artikel.php?id=<?php echo $headers['id']; ?>" class="btn-slides">Selengkapnya</a>
	</div>
<?php endforeach; ?>
</div>
<div id="wrapper">
	<div class="wrapper">
		<div class="kiri">
		<?php foreach ($hasil as $hasils): ?>
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
			<div class="pagination">
				<?php 
					$banyakHalaman = ceil($banyakData/$limit);
					echo "Halaman ";
					for ($i=1; $i<=$banyakHalaman; $i++) { 
						if ($page != $i) {
							echo '[<a href="index.php?page='.$i.'">'.$i.'] ';
						}else{
							echo "[$i]";
						}
					}
				 ?>
			</div>

		</div>
		<div class="kanan">
			<div class="inkanan">
				<form method="GET" action="pencarian.php">
					<input type="search" name="cari" placeholder="Pencarian">
				</form>
				<div class="widget">
					<h2>Anda adalah Pengunjung ke:</h2>
					<div class="hitcounter">
						<?php 
							include 'counter.php';
							counter();
							echo file_get_contents($filename);
						 ?>
					</div>
				</div>
				<div class="widget">
					<h2>Bagaimana menurut anda web ini?</h2>
					<form method="POST">
						<table width="100%">
							<tr>
								<td width="40px" height="30px"><input type="radio" name="polling" value="Sangat Bagus"></td>
								<td width="130px">Sangat Bagus</td>
								<td width="">: <?php echo $sangat; ?></td>
							</tr>
							<tr>
								<td height="30px"><input type="radio" name="polling" value="Bagus"></td>
								<td>Bagus</td>
								<td>: <?php echo $bagus; ?></td>
							</tr>
							<tr>
								<td height="30px"><input type="radio" name="polling" value="Kurang Bagus"></td>
								<td>Kurang Bagus</td>
								<td>: <?php echo $kurang; ?></td>
							</tr>
						</table>
						<input type="submit" name="voting" class="btn-form" onclick="polling()">

					</form>
				</div>
				<div class="widget">
					<h2>Link Terkait:</h2>
					<ul>
						<?php foreach ($link as $links):?>
							<li><a href="<?php echo $links['link']; ?>"><?php echo $links['judul']; ?></a></li>

						<?php endforeach; ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
<?php require_once 'footer.php' ?>
