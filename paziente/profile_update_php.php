<?php 	session_start();
		$_SESSION['paziente_email']=$_POST['email'];
		include '../connect.php';
		$email = $_SESSION['paziente_email'];
		$dob = mysqli_real_escape_string($conn, $_POST['dob']);
		$dob=strtotime($dob);
		$dob = date('Y/m/d', $dob);
		$fiscal = mysqli_real_escape_string($conn, $_POST['fiscal_code']);
		$tel = mysqli_real_escape_string($conn, $_POST['tele']);
		$via = mysqli_real_escape_string($conn, $_POST['Via']);
		$civico = mysqli_real_escape_string($conn, $_POST['civico']);
		$select_comun = mysqli_real_escape_string($conn, $_POST['select_comun']);
		$check = mysqli_real_escape_string($conn, $_POST['privacy_check']);
		$pos = strpos($select_comun, "(");
		$comune = substr($select_comun,0,$pos-1);
		$province = substr($select_comun,$pos+1,2);
		$cap = substr($select_comun,$pos+6,5);

		$b = explode("@",$email);

     $photo = "../images/Group-556.jpg";

     /*
     	$_FILES["upload-image"];
		if($_FILES["upload-image"]["error"] != 0) {
			$photo = $profile_img;
		} else {
			$imageFileType = pathinfo($_FILES["upload-image"]["name"],PATHINFO_EXTENSION);
			$photo = "photo/".$b[0].".".$imageFileType;
		}
     */

		$sql = "update paziente_profile set dob='".$dob."', photo='".$photo."', fiscale='".$fiscal."', phone='".$tel."', via='".$via."', civico='".$civico."', comune='".$comune."', province='".$province."', cap='".$cap."', privacy_consent='".$check."' where email='".$email."' ";
		
		$paziente_name = "select * from paziente_profile where email='".$email."'";
        $paziente_name_result = mysqli_query($conn, $paziente_name);
		$paziente_rows = mysqli_fetch_array($paziente_name_result);
		$first_name = $paziente_rows['first_name'];
		$last_name = $paziente_rows['last_name'];
		$full_name = $first_name.' '.$last_name;


		/*move_uploaded_file($_FILES["upload-image"]["tmp_name"], $photo);*/
	
		$result = mysqli_query($conn, $sql);
		if($result==1){
			echo "Record inserted1";
			
			$to = 'info@mobidoc.it';
            $subject = 'Nuova Candidatura';
            $from = 'mobidoc_update@mobidoc.it';
           $rply_email = 'noreplay@mobidoc.it';

            // To send HTML mail, the Content-type header must be set
            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

            // Create email headers
            $headers .= 'From: '.$from."\r\n". 'Reply-To: '.$rply_email."\r\n" .   'X-Mailer: PHP/' . phpversion();

            // Compose a simple HTML email message
            $message = '<!DOCTYPE html><html data-wf-page="5dcd852d5095d024f8ea51ae" data-wf-site="5dcd852d5095d04927ea51ad"><head><meta charset="utf-8"><meta content="width=device-width, initial-scale=1" name="viewport"><meta content="Webflow" name="generator"><style>.header{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;width:100%;height:180px;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;-webkit-box-align:center;-webkit-align-items:center;-ms-flex-align:center;align-items:center;background-image:url("https://www.mobidoc.it/images/mailer_header.png");background-position:50% 50%, 50% 0%;background-size:100%,cover;background-repeat:no-repeat,repeat}.text_container{width:80%;min-height:150px;margin-top:70px;margin-right:auto;margin-left:auto}.button{margin:20px 20px 20px 0px;padding:16px 34px;border-radius:50px;background-color:#00285c}.text-block{margin-top:10px;font-size:16px}.text-block.italic{margin-top:28px;font-style:italic;font-weight:300}.body{font-family:Poppins,sans-serif;color:#00285c}.heading{margin-bottom:23px}.name{width:auto}a{text-decoration:none;color:#fff}</style> <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script> <script type="text/javascript">WebFont.load({google:{families:["Poppins:300,regular,italic,600"]}});</script> <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script> </head><body class="body"><div class="header"></div><div class="text_container"><h4 class="heading">Nuova Registrazione Paziente</h4><div class="text-block">Congratulazioni, il Paziente '.$full_name.' si è appena registrato al portale mobidoc.</div></div></body></html>';


			mail($to, $subject, $message, $headers);
					  
		}else{
			echo "Unable to insert record1"; 
			mysqli_close($conn);
		}
		
		/*$sql3 = "update doctor_register set tick = 1 where email = '".$email."' ";
		$result = mysqli_query($conn, $sql3);*/

		mysqli_close($conn);

		if(isset($_COOKIE["Booking_name"], $_COOKIE["Booking_id"]) ){	
			$booking_name = $_COOKIE["Booking_name"];		
			$doctor_id = $_COOKIE["Booking_id"];		
			$link = "/checkout.php?book_visit=".$booking_name."&book_doctor=".$doctor_id;
			header('Location: '.$link);
		}else {
			setcookie("Booking_name", "", time() + (86400 * 0.0416), "/");
			setcookie("Booking_id", "", time() + (86400 * 0.0416), "/");
			header("Location: account.php");			
		} 
?>
