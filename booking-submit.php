<?PHP
	if(isset($_POST['submit']))
	{
		include 'connect.php';
		$patient_id = mysqli_real_escape_string($conn, $_POST['patient_id']);
		$doctor_id = mysqli_real_escape_string($conn, $_POST['doctor_id']);
		$visit_name = mysqli_real_escape_string($conn, $_POST['visit_name']);
		$price = mysqli_real_escape_string($conn, $_POST['price']);
		$message = mysqli_real_escape_string($conn, $_POST['message']);
		$payment_mode = mysqli_real_escape_string($conn, $_POST['payment_mode']);
		$payment_status = 0;
		$booking_status = mysqli_real_escape_string($conn, $_POST['booking_status']);
		$doctor_booking_status = mysqli_real_escape_string($conn, $_POST['doctor_booking_status']);
		$patient_confirmation = mysqli_real_escape_string($conn, $_POST['patient_confirmation']);
		$pateint_remove_from_list = mysqli_real_escape_string($conn, $_POST['pateint_remove_from_list']);
		
		date_default_timezone_set("Europe/Rome");
		$date_of_booking = date("d/m/Y H:i:s");
		
		if($payment_mode == 'Online'){
			session_start();
			$_SESSION['patient_id'] = $patient_id;
			$_SESSION['doctor_id'] = $doctor_id;
			$_SESSION['visit_name'] = $visit_name;
			$_SESSION['price'] = $price;
			$_SESSION['message'] = $message;
			$_SESSION['payment_mode'] = $payment_mode;
			$_SESSION['booking_status'] = $booking_status;
			$_SESSION['doctor_booking_status'] = $doctor_booking_status;
			$_SESSION['patient_confirmation'] = $patient_confirmation;
			$_SESSION['pateint_remove_from_list'] = $pateint_remove_from_list;
			$_SESSION['payment_status'] = $payment_status;
			header("location: /pay/redirect.php");

		} else {
			$sql = "insert into bookings (patient_id, doctor_id, visit_name, price, message, payment_mode, booking_status, doctor_booking_status, patient_confirmation, pateint_remove_from_list, date_of_booking) values('".$patient_id."', '".$doctor_id."', '".$visit_name."', '".$price."', '".$message."', '".$payment_mode."', '".$booking_status."', '".$doctor_booking_status."', '".$patient_confirmation."', '".$pateint_remove_from_list."', '".$date_of_booking."')";
			
			$result = mysqli_query($conn, $sql);
			

			$sql2 = "select * from paziente_profile where paziente_id='".$patient_id."'";
			$result2 = mysqli_query($conn, $sql2);
			$rows2 = mysqli_fetch_array($result2);   
			$paziente_main_name = $rows2['first_name']." ".$rows2["last_name"];
			$paziente_email = $rows2['email'];

			$sql3 = "select * from doctor_profile where doctor_id='".$doctor_id."'";
			$result3 = mysqli_query($conn, $sql3);
			$rows3 = mysqli_fetch_array($result3);   
			$doctor_main_name = $rows3['fname']." ".$rows3["lname"];
			$doctor_email = $rows3['email'];
			mysqli_close($conn);

			if($result==1)
			{
				
				//email to admin
				$to = 'info@mobidoc.it'; //admin email
				$subject = 'Nuova Prenotazione!';
				$from = 'mobidoc_update@mobidoc.it';
        $rply_email = 'noreplay@mobidoc.it';
								
				// To send HTML mail, the Content-type header must be set
				$headers  = 'MIME-Version: 1.0' . "\r\n";
				$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
								
				// Create email headers
				$headers .= 'From: '.$from."\r\n". 'Reply-To: '.$rply_email."\r\n" .   'X-Mailer: PHP/' . phpversion();
								
				// Compose a simple HTML email message
				$message = '<!DOCTYPE html><html data-wf-page="5dcd852d5095d024f8ea51ae" data-wf-site="5dcd852d5095d04927ea51ad"><head><meta charset="utf-8"><meta content="width=device-width, initial-scale=1" name="viewport"><meta content="Webflow" name="generator"><style>.header{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;width:100%;height:180px;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;-webkit-box-align:center;-webkit-align-items:center;-ms-flex-align:center;align-items:center;background-image:url("https://www.mobidoc.it/images/mailer_header.png");background-position:50% 50%, 50% 0%;background-size:100%,cover;background-repeat:no-repeat,repeat}.text_container{width:80%;min-height:150px;margin-top:70px;margin-right:auto;margin-left:auto}.button{margin:20px 20px 20px 0px;padding:16px 34px;border-radius:50px;background-color:#00285c}.text-block{margin-top:10px;font-size:16px}.text-block.italic{margin-top:28px;font-style:italic;font-weight:300}.body{font-family:Poppins,sans-serif;color:#00285c}.heading{margin-bottom:23px}.name{width:auto}a{text-decoration:none;color:#fff}</style> <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script> <script type="text/javascript">WebFont.load({google:{families:["Poppins:300,regular,italic,600"]}});</script> <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script> </head><body class="body"><div class="header"></div><div class="text_container"><h4 class="heading">Nuova Prenotazione!</h4><div class="text-block">'.$paziente_main_name.' Ha prenotato una visita da '.$doctor_main_name.'. <br><br>Questa email è stata generata da un sistema automatico, si prega di non rispondere.<br><br> Cordiali Saluti,<br> La Direzione Mobidoc</div> <br></div></body></html>';


				mail($to, $subject, $message, $headers);


				//email to doctor
				$to2 = $doctor_email; //doctor email
				$subject2 = 'Mobidoc Prestazione Prenotata';
				$from2 = 'mobidoc_update@mobidoc.it';
								
				// To send HTML mail, the Content-type header must be set
				$headers2  = 'MIME-Version: 1.0' . "\r\n";
				$headers2 .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
								
				// Create email headers
				$headers2 .= 'From: '.$from."\r\n". 'Reply-To: '.$rply_email."\r\n" .   'X-Mailer: PHP/' . phpversion();
								
				// Compose a simple HTML email message
				$message2 = '<!DOCTYPE html><html data-wf-page="5dcd852d5095d024f8ea51ae" data-wf-site="5dcd852d5095d04927ea51ad"><head><meta charset="utf-8"><meta content="width=device-width, initial-scale=1" name="viewport"><meta content="Webflow" name="generator"><style>.header{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;width:100%;height:180px;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;-webkit-box-align:center;-webkit-align-items:center;-ms-flex-align:center;align-items:center;background-image:url("https://www.mobidoc.it/images/mailer_header.png");background-position:50% 50%, 50% 0%;background-size:100%,cover;background-repeat:no-repeat,repeat}.text_container{width:80%;min-height:150px;margin-top:70px;margin-right:auto;margin-left:auto}.button{margin:20px 20px 20px 0px;padding:16px 34px;border-radius:50px;background-color:#00285c}.text-block{margin-top:10px;font-size:16px}.text-block.italic{margin-top:28px;font-style:italic;font-weight:300}.body{font-family:Poppins,sans-serif;color:#00285c}.heading{margin-bottom:23px}.name{width:auto}a{text-decoration:none;color:#fff}</style> <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script> <script type="text/javascript">WebFont.load({google:{families:["Poppins:300,regular,italic,600"]}});</script> <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script> </head><body class="body"><div class="header"></div><div class="text_container"><h4 class="heading">Nuova Prenotazione!</h4><div class="text-block">'.$paziente_main_name.' ha prenotato una visita. Effettua il login al tuo account per vedere ulteriori dettagli sulla prenotazione e per contattare il paziente.<br><br>Questa email è stata generata da un sistema automatico, si prega di non rispondere.<br><br> Cordiali Saluti,<br> La Direzione Mobidoc</div> <br></div></body></html>';


				mail($to2, $subject2, $message2, $headers2);


				//email to patient
				$to3 = $paziente_email; //patient email
				$subject3 = 'Mobidoc Prestazione Prenotata';
				$from3 = 'mobidoc_update@mobidoc.it';
								
				// To send HTML mail, the Content-type header must be set
				$headers3  = 'MIME-Version: 1.0' . "\r\n";
				$headers3 .= 'Content-Type: text/html; charset=utf-8' . "\r\n";
								
				// Create email headers
				$headers3 .= 'From: '.$from."\r\n". 'Reply-To: '.$rply_email."\r\n" .   'X-Mailer: PHP/' . phpversion();
								
				// Compose a simple HTML email message
				$message3 = '<!DOCTYPE html><html data-wf-page="5dcd852d5095d024f8ea51ae" data-wf-site="5dcd852d5095d04927ea51ad"><head><meta charset="utf-8"><meta content="width=device-width, initial-scale=1" name="viewport"><meta content="Webflow" name="generator"><style>.header{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;width:100%;height:180px;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;-webkit-box-align:center;-webkit-align-items:center;-ms-flex-align:center;align-items:center;background-image:url("https://www.mobidoc.it/images/mailer_header_paziente.jpg");background-position:50% 50%, 50% 0%;background-size:100%,cover;background-repeat:no-repeat,repeat}.text_container{width:80%;min-height:150px;margin-top:70px;margin-right:auto;margin-left:auto}.button{margin:20px 20px 20px 0px;padding:16px 34px;border-radius:50px;background-color:#00285c}.text-block{margin-top:10px;font-size:16px}.text-block.italic{margin-top:28px;font-style:italic;font-weight:300}.body{font-family:Poppins,sans-serif;color:#00285c}.heading{margin-bottom:23px}.name{width:auto}a{text-decoration:none;color:#fff}</style> <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script> <script type="text/javascript">WebFont.load({google:{families:["Poppins:300,regular,italic,600"]}});</script> <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script> </head><body class="body"><div class="header"></div><div class="text_container"><h4 class="heading">Grazie per aver scelto Mobidoc!</h4><div class="text-block">La tua visita per '.$visit_name.' con '.$doctor_main_name.' è stata prenotata con successo. Sarai a breve contattato dal tuo Professionista Mobidoc con cui potrai concordare data e orario. <br> <br> Questa email è stata generata da un sistema automatico, si prega di non rispondere.<br><br> Cordiali Saluti,<br> La Direzione Mobidoc</div> <br></div></body></html>';


				mail($to3, $subject3, $message3, $headers3);


            	header("location: /paziente/booking-completed.php");
			}
			else{
            	echo "Unable to insert record";
			}
		}
	
		
		
	} else {
        echo "error happened";
    }
?>
