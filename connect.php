<?php
	//$conn = mysqli_connect("79.137.84.125", "root", "duqAF8l5PoSE", "mobidoc1");
	$conn = mysqli_connect("localhost", "root", "", "mobidoc1");
	if($conn === false){
		die("ERROR: Could not connect to database.");
	}
	$conn->query('SET NAMES utf8');
?>