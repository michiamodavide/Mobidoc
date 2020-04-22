<?php
$conn = mysqli_connect("79.137.84.125", "root", "duqAF8l5PoSE", "mobidoc1");
//	$conn = mysqli_connect("localhost", "mobidoc4_user", "8ag2Ju8I2A2aC8NaL4c7JEF8q8qiHI", "mobidoc1");
//$conn = mysqli_connect("localhost", "root", "", "mobidoc1");
//$conn = mysqli_connect("localhost", "mobidoc4_user", "1IToYIqOxasOlu28faNiXA4ETagEmA", "mobidoc1");
	if($conn === false){
		die("ERROR: Could not connect to database.");
	}
	$conn->query('SET NAMES utf8');
?>
