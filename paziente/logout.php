<?php
	session_start();
	unset($_SESSION['paziente_email']);
	session_unset();
	setcookie ("paziente_login", "", time() - 3600);
	setcookie("Booking_name", "", time() + (86400 * 0.0416), "/");
	setcookie("Booking_id", "", time() + (86400 * 0.0416), "/");
     unset($_SESSION['book_visits'] );
	header("Location: login.php");	
?>