<?php require_once 'header.php' ?>
<div id="banner">
	<div class="banner">
		<h1>GALERI</h1>
	</div>
</div>
<div id="konten">
	<div class="konten">
		<ul class="flex">
			<li class="flex-container"><img onclick="showImg(this)" src="img/banner.png" alt="asfjashf" ></li>
			<li class="flex-container"></li>
			<li class="flex-container"></li>
			<li class="flex-container"></li>
		</ul>
	</div>
	<div id="myModal">
		<span class="close" onclick="closeImg()">X</span>
		<img class="modal-content" id="Img">
		<div id="caption"></div>
	</div>
	<script type="text/javascript">
	var modal = document.getElementById("myModal");
	var modalImg = document.getElementById("Img");
	var caption = document.getElementById("caption");
	function showImg(obj){
		modal.style.display = "block";
		modalImg.src = obj.src;
		modalImg.alt = obj.alt;
		caption.innerHTML = obj.alt;
	}
	function closeImg(){
		modal.style.display = "none";
	}
	</script>
<?php require_once 'footer.php' ?>
