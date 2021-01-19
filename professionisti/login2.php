<?php
	session_start();
	if(isset($_POST['checkbox']))
	{
		setcookie ("member_login",$_POST["email"],time()+ (10 * 365 * 24 * 60 * 60));
	}
	else {
		if(isset($_COOKIE["member_login"])) {
			setcookie ("member_login","");
		}
	}
	
	if(isset($_COOKIE["member_login"])) {
		$email =  $_COOKIE["member_login"];
		include '../connect.php';
		$sql = "select * from doctor_profile where email = '".$email."'";
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
	$sql = "select * from doctor_profile where email = '".$email."'";
		
	$result = mysqli_query($conn, $sql);
	$rows = mysqli_fetch_array($result);
	
	$pwrd_right = password_verify($pwd, $rows['password']);

	if($email===$rows['email'] && $pwrd_right==1)
	{
     if ($rows['active'] == 'Y'){
       $_SESSION['doctor_email']=$_POST['email'];
       header('Location: account.php');
     }else{
       header('Location: login.php?active=0');
     }
	}
	else
	{
		echo "<script>alert('La tua email o password non è corretta!')</script>";
		echo "<script>window.location = 'login.php'</script>";
	}
	mysqli_close($conn);
?>