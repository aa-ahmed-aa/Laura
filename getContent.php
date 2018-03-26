<?php
	$url = $_POST['url'];
	$content = file_get_contents($url);
	die($content);
?>