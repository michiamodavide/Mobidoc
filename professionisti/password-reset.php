<?php
	
		
	include '../connect.php';
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$sql = "select * from doctor_profile where email = '".$email."'";
		
	$result = mysqli_query($conn, $sql);
	$rows = mysqli_fetch_array($result);


	//generating random reset code 

	function generateRandomString($length = 50) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}
	
	if($email===$rows['email'])
	{

		$sql2 = "select * from password_reset_prof";		
		$result2 = mysqli_query($conn, $sql2);
		$rows2 = mysqli_fetch_array($result2);

		$code = generateRandomString();
		if($code===$rows2['reset_code']){
			$code = $code;
		} else {
			$code = generateRandomString();
		}
		//$sql = "insert into paziente_profile (email, reset_code) values('".$email."', '".$code."')";

		$sql3 = "insert into password_reset_prof (email,reset_code) values('".$email."', '".$code."')";		
		$result3 = mysqli_query($conn, $sql3);

		$reset_link = 'www.mobidoc.it/professionisti/change-password.php?reset_code='.$code;

		$name = $rows['fname'].' '.$rows['lname'];
		

		$to = $email;
        $subject = 'Change Password';
        $from = 'mobidoc_update@mobidoc.it';
                        
        // To send HTML mail, the Content-type header must be set
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                        
        // Create email headers
        $headers .= 'From: '.$from."\r\n". 'Reply-To: '.$from."\r\n" .   'X-Mailer: PHP/' . phpversion();
                        
        // Compose a simple HTML email message
        $message = '<!DOCTYPE html><html data-wf-page="5dcd852d5095d024f8ea51ae" data-wf-site="5dcd852d5095d04927ea51ad"><head><meta charset="utf-8"><meta content="width=device-width, initial-scale=1" name="viewport"><meta content="Webflow" name="generator"><style>.header{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;width:100%;height:180px;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;-webkit-box-align:center;-webkit-align-items:center;-ms-flex-align:center;align-items:center;background-image:url("https://www.mobidoc.it/images/mailer_logo.png"), url("https://www.mobidoc.it/images/mailer_header.png");background-position:50% 50%, 50% 0%;background-size:200px,cover;background-repeat:no-repeat,repeat}.text_container{width:80%;min-height:150px;margin-top:70px;margin-right:auto;margin-left:auto}.button{margin:20px 20px 20px 0px;padding:16px 34px;border-radius:50px;background-color:#00285c}.text-block{margin-top:10px;font-size:16px}.text-block.italic{margin-top:28px;font-style:italic;font-weight:300}.body{font-family:Poppins,sans-serif;color:#00285c}.heading{margin-bottom:23px}.name{width:auto}a{text-decoration:none;color:#fff}</style> <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script> <script type="text/javascript">WebFont.load({google:{families:["Poppins:300,regular,italic,600"]}});</script> <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script> </head><body class="body"><div class="header"></div><div class="text_container"><h4 class="heading">Gentile '.$name.',</h4><div class="text-block">Please change your password using the link below:-</div> <br><br><a href="'.$reset_link.'" class="button" style="margin-top:100px;">Cambia Password</a><br><br><div class="text-block italic">Cordiali Saluti,<br>La Direzione Mobidoc</div></div></body></html>';


		mail($to, $subject, $message, $headers);
		echo "<script>window.location = 'reset_sucessful.php'</script>";


	}
	else
	{
		echo "<script>alert('Email non registrata.')</script>";
		echo "<script>window.location = 'login.php'</script>";
	}
	mysqli_close($conn);
?>
