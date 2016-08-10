	<div class="footer">
		<div class="aaa">
			<div class="infooter">
				<h2>Website Pariwisata Banyumas</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p>
			</div>
			<div class="infooter tengah">
				<h2>Social Media</h2>
				<ul>
					<li><a href="#">asfasf</a></li>
					<li><a href="#">asfasf</a></li>
					<li><a href="#">asfasf</a></li>
				</ul>
			</div>
			<div class="infooter kanan">
				<h2>Kontak Kami</h2>
				<ul>
					<li>asfasf</li>
					<li>asfasf</li>
					<li>asfasf</li>
				</ul>
			</div>
		</div>
		<div class="bawahfooter">
			&copy; Copyright Website Pariwisata Banyumas
			<div class="gotop">
				<a href="#">&#8593;</a>
			</div>
		</div>
	</div>
</div>
</body>
<script type="text/javascript">
	var SlideIndex = 0;
	SlideShow();
	function SlideShow(){
		var i;
		var slides = document.getElementsByClassName("slides");
		for(i=0;i<slides.length;i++){
			slides[i].style.display = "none";
		}
		SlideIndex++;
		if (SlideIndex>slides.length) { SlideIndex = 1}
			slides[SlideIndex-1].style.display = "block";
		setTimeout(SlideShow, 20);
		}
</script>
</html>