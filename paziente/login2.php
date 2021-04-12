<?php
	session_start();
	if(isset($_POST['checkbox']))
	{
		setcookie ("paziente_login",$_POST["email"],time()+ (10 * 365 * 24 * 60 * 60));
	}
	else {
		if(isset($_COOKIE["paziente_login"])) {
			setcookie ("paziente_login","");
		}
	}

	if(isset($_COOKIE["paziente_login"])) {
	  $email =  $_COOKIE["paziente_login"];
		include '../connect.php';
		$sql = "select * from contact_profile where email = '".$email."'";
		$result = mysqli_query($conn, $sql);
		$rows = mysqli_fetch_array($result);

		$t1=$email;
		$t2=$rows['password'];
		
		$_SESSION['t1'] = $t1;
		$_SESSION['t2'] = $t2;
		
		header('Location: login.php');
		mysqli_close($conn);
	}
	else {
		echo ' ';

	}

	include '../connect.php';
	$email = $password = mysqli_real_escape_string($conn, $_POST['email']);
	$pwd = $password = mysqli_real_escape_string($conn, $_POST['pwrd']);
	$sql = "select * from contact_profile where email = '".$email."'";
	
	
	$result = mysqli_query($conn, $sql);
	$rows = mysqli_fetch_array($result);


	$pwrd_right = password_verify($pwd, $rows['password']);

	if($email===$rows['email'] && $pwrd_right==1)
	{

		$_SESSION['paziente_email']=$_POST['email'];
		include '../connect.php';
  		$sql3 = "select * from contact_profile where email ='".$_SESSION['paziente_email']."'";
  		$result3 = mysqli_query($conn, $sql3);
  		$rows3 = mysqli_fetch_array($result3); 
		
		if(isset($_COOKIE["Booking_name"], $_COOKIE["Booking_id"], $_COOKIE["article_id"]) ){
			$booking_name = $_COOKIE["Booking_name"];		
			$doctor_id = $_COOKIE["Booking_id"];
      $article_id = $_COOKIE["article_id"];
			$link = "/checkout.php?book_visit=".$booking_name."&book_doctor=".$doctor_id."&article_id=".$article_id;;
			header('Location: '.$link);
		} else {
			header('Location: account.php');
		}

		/*
		else  if($rows3['cap'] == ''){
			header("Location: /paziente/profile-update.php");
		}
		*/

	}
	else
	{
		echo "<script>alert('La tua email o password non è corretta!')</script>";
		echo "<script>window.location = 'login.php'</script>";
	}
	mysqli_close($conn);
?>