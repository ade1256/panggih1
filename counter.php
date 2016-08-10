<?php 
$filename = 'counter.txt';
function counter(){
	global $filename;
	if (file_exists($filename)) {
		$value = file_get_contents($filename);
	}else{
		$value = 0;
	}
	file_put_contents($filename, ++$value);
}

 ?>