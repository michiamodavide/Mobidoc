<?php
	session_start();
	unset($_SESSION['$doctor_email']);
	session_unset();
	setcookie ("member_login","", time() - 3600);
	header("Location: login.php");
?>