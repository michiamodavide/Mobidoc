<?php
	$email = $_GET['email'];
	include '../connect.php';
	$sql = "update doctor_register set remove = 1 where email='".$email."'";
	
	$result = mysqli_query($conn, $sql);
	
	if($result==1)
	{
		/* remove this comment when online
		$to = $email;
		$subject = 'Profile Approved';
		$from = 'ankit2008india@gmail.com';
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers .= 'From: '.$from."\r\n". 'Reply-To: '.$from."\r\n" .   'X-Mailer: PHP/' . phpversion();
		$message = '<html><body>';
		$message .= '<h1 style="color:#f40;">Hi There!</h1>';
		$message .= '<p style="color:#080;font-size:18px;">your profile is approved.</p>';
		$message .= '</body></html>';
		mail($to, $subject, $message, $headers);
		header("Location: index.php");*/
		echo "Notifica Rimossa.";
		header("Location: index.php");
	}
	else
	{
		echo "error";
	}
		
	
	mysqli_close($conn);
?>
<br>
<a href="index.php">back</a>