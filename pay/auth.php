<?php
	use PayPal\Rest\ApiContext;
	use PayPal\Auth\OAuthTokenCredential;

	session_start();
	echo $_GET['approved'];

	if($_GET['approved'] == 'false'){
		header('Location: ../paziente/booking-error.php');
	}

	//$price = $_SESSION['price'];


include '../connect.php';

$patient_id = $_SESSION['patient_id'];
$doctor_id = $_SESSION['doctor_id'];
/*$visit_name = $_SESSION['visit_name'];
$price = $_SESSION['price'];*/
$contact_id = $_SESSION['contact_id'];
$message = $_SESSION['message'];
$payment_mode = $_SESSION['payment_mode'];
$booking_status = $_SESSION['booking_status'];
$doctor_booking_status = $_SESSION['doctor_booking_status'];
$patient_confirmation = $_SESSION['patient_confirmation'];
$pateint_remove_from_list = $_SESSION['pateint_remove_from_list'];
date_default_timezone_set("Europe/Rome");
$date_of_booking = date("d/m/Y H:i:s");
$_SESSION['date_booking'] = $date_of_booking;

$sql4 = "select * from paziente_profile where paziente_id='".$patient_id."'";
$result4 = mysqli_query($conn, $sql4);
$rows4 = mysqli_fetch_array($result4);
$paziente_main_name = $rows4['first_name']." ".$rows4["last_name"];
$paziente_email = $rows4['email'];
$gmap_address = $rows4['gmap_address'];
$latitude = $rows4['latitude'];
$longitude = $rows4['longitude'];

if (isset($_SESSION['book_visits'])){

	$book_visits = $_SESSION['book_visits'];

	$unique_cookie_array = array();
	foreach ($book_visits as $key => $unique_cookie_val){
		if(!in_array($unique_cookie_val, $unique_cookie_array))
			$unique_cookie_array[$key]=$unique_cookie_val;
	}
	foreach($unique_cookie_array as $key => $cookie_book_visit) {
		if (!empty($cookie_book_visit['book_patient_id'])){

			$doctor_id = $cookie_book_visit['book_doctor'];
			$visit_name = $cookie_book_visit['Booking_name'];
			$article_id = $cookie_book_visit['article_id'];

			$sql345 = "SELECT DISTINCT lis.visit_home_price, lis.visit_tele_price, am.home, am.tele
FROM articlesMobidoc am
JOIN listini lis ON am.id=lis.article_mobidoc_id
JOIN articlesMobidoc_specialty ams ON am.id=ams.id
JOIN doctor_specialty ds ON ams.specialtyMobidoc=ds.specialty
JOIN doctor_profile dp ON ds.doctor_id=dp.doctor_id
WHERE am.`descrizione`='$visit_name' AND (am.home='Y' OR am.tele='Y')";

			$result345 = mysqli_query($conn, $sql345);
			$rows345 = mysqli_fetch_array($result345);

			if ($rows345['home'] == 'Y' && $rows345['tele'] == 'Y' || $rows345['home'] == 'Y') {
				$price = $rows345['visit_home_price'];
			} else {
				$price = $rows345['visit_tele_price'];
			}

			$sql = "insert into bookings (patient_id, doctor_id, price, message, payment_mode, booking_status, doctor_booking_status, patient_confirmation, pateint_remove_from_list, date_of_booking, gmap_coordinates, latitude, longitude ) values('".$patient_id."', '".$doctor_id."', '".$price."', '".$message."', '".$payment_mode."', '".$booking_status."', '".$doctor_booking_status."', '".$patient_confirmation."', '".$pateint_remove_from_list."', '".$date_of_booking."', '".$gmap_address."', '".$latitude."', '".$longitude."')";
			$result = mysqli_query($conn, $sql);

			if($result==1) {
				$last_booking_id = mysqli_insert_id($conn);
				$sql_new1 = "insert into booked_service (booking_id, article_id, price) values('".$last_booking_id."', '".$article_id."', '".$price."')";
				$result_new1 = mysqli_query($conn, $sql_new1);

				$sql2 = "insert into payments (date_of_booking, patient_id, authorization_id, payment_status, capture_status) values('".$date_of_booking."', '".$patient_id."', '".$authid."', '1', '0')";
				$result2 = mysqli_query($conn, $sql2);

				if($result_new1==1)
				{

					$sql3 = "select * from doctor_profile where doctor_id='".$doctor_id."'";
					$result3 = mysqli_query($conn, $sql3);
					$rows3 = mysqli_fetch_array($result3);
					$doctor_main_name = $rows3['fname']." ".$rows3["lname"];
					$doctor_email = $rows3['email'];
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
					$message123 = '<!DOCTYPE html><html data-wf-page="5dcd852d5095d024f8ea51ae" data-wf-site="5dcd852d5095d04927ea51ad"><head><meta charset="utf-8"><meta content="width=device-width, initial-scale=1" name="viewport"><meta content="Webflow" name="generator"><style>.header{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;width:100%;height:180px;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;-webkit-box-align:center;-webkit-align-items:center;-ms-flex-align:center;align-items:center;background-image:url("https://www.mobidoc.it/images/mailer_header.png");background-position:50% 50%, 50% 0%;background-size:100%,cover;background-repeat:no-repeat,repeat}.text_container{width:80%;min-height:150px;margin-top:70px;margin-right:auto;margin-left:auto}.button{margin:20px 20px 20px 0px;padding:16px 34px;border-radius:50px;background-color:#00285c}.text-block{margin-top:10px;font-size:16px}.text-block.italic{margin-top:28px;font-style:italic;font-weight:300}.body{font-family:Poppins,sans-serif;color:#00285c}.heading{margin-bottom:23px}.name{width:auto}a{text-decoration:none;color:#fff}</style> <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script> <script type="text/javascript">WebFont.load({google:{families:["Poppins:300,regular,italic,600"]}});</script> <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script> </head><body class="body"><div class="header"></div><div class="text_container"><h4 class="heading">Nuova Prenotazione!</h4><div class="text-block">'.$paziente_main_name.' Ha prenotato una visita da '.$doctor_main_name.'. <br><br> Questa email è stata generata da un sistema automatico, si prega di non rispondere.<br><br> Cordiali Saluti,<br> La Direzione Mobidoc</div> <br></div></body></html>';


					mail($to, $subject, $message123, $headers);


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
					$message2 = '<!DOCTYPE html><html data-wf-page="5dcd852d5095d024f8ea51ae" data-wf-site="5dcd852d5095d04927ea51ad"><head><meta charset="utf-8"><meta content="width=device-width, initial-scale=1" name="viewport"><meta content="Webflow" name="generator"><style>.header{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;width:100%;height:180px;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;-webkit-box-align:center;-webkit-align-items:center;-ms-flex-align:center;align-items:center;background-image:url("https://www.mobidoc.it/images/mailer_header.png");background-position:50% 50%, 50% 0%;background-size:100%,cover;background-repeat:no-repeat,repeat}.text_container{width:80%;min-height:150px;margin-top:70px;margin-right:auto;margin-left:auto}.button{margin:20px 20px 20px 0px;padding:16px 34px;border-radius:50px;background-color:#00285c}.text-block{margin-top:10px;font-size:16px}.text-block.italic{margin-top:28px;font-style:italic;font-weight:300}.body{font-family:Poppins,sans-serif;color:#00285c}.heading{margin-bottom:23px}.name{width:auto}a{text-decoration:none;color:#fff}</style> <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script> <script type="text/javascript">WebFont.load({google:{families:["Poppins:300,regular,italic,600"]}});</script> <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script> </head><body class="body"><div class="header"></div><div class="text_container"><h4 class="heading">Nuova Prenotazione!</h4><div class="text-block">'.$paziente_main_name.' ha prenotato una visita. Effettua il login al tuo account per vedere ulteriori dettagli sulla prenotazione e per contattare il paziente.<br><br> Questa email è stata generata da un sistema automatico, si prega di non rispondere. <br><br> Cordiali Saluti,<br> La Direzione Mobidoc</div> <br></div></body></html>';


					mail($to2, $subject2, $message2, $headers2);


//email to patient
					$to3 = $paziente_email; //patient email
					$subject3 = 'Mobidoc Prestazione Prenotata';
					$from3 = 'mobidoc_update@mobidoc.it';

// To send HTML mail, the Content-type header must be set
					$headers3  = 'MIME-Version: 1.0' . "\r\n";
					$headers3 .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Create email headers
					$headers3 .= 'From: '.$from."\r\n". 'Reply-To: '.$rply_email."\r\n" .   'X-Mailer: PHP/' . phpversion();

// Compose a simple HTML email message
					$message3 = '<!DOCTYPE html><html data-wf-page="5dcd852d5095d024f8ea51ae" data-wf-site="5dcd852d5095d04927ea51ad"><head><meta charset="utf-8"><meta content="width=device-width, initial-scale=1" name="viewport"><meta content="Webflow" name="generator"><style>.header{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;width:100%;height:180px;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;-webkit-box-align:center;-webkit-align-items:center;-ms-flex-align:center;align-items:center;background-image:url("https://www.mobidoc.it/images/mailer_header_paziente.jpg");background-position:50% 50%, 50% 0%;background-size:100%,cover;background-repeat:no-repeat,repeat}.text_container{width:80%;min-height:150px;margin-top:70px;margin-right:auto;margin-left:auto}.button{margin:20px 20px 20px 0px;padding:16px 34px;border-radius:50px;background-color:#00285c}.text-block{margin-top:10px;font-size:16px}.text-block.italic{margin-top:28px;font-style:italic;font-weight:300}.body{font-family:Poppins,sans-serif;color:#00285c}.heading{margin-bottom:23px}.name{width:auto}a{text-decoration:none;color:#fff}</style> <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script> <script type="text/javascript">WebFont.load({google:{families:["Poppins:300,regular,italic,600"]}});</script> <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script> </head><body class="body"><div class="header"></div><div class="text_container"><h4 class="heading">Grazie per aver scelto Mobidoc!</h4><div class="text-block">La tua visita per '.$visit_name.' con '.$doctor_main_name.' è stata prenotata con successo. Sarai a breve contattato dal tuo Professionista Mobidoc con cui potrai concordare data e orario. <br> <br><strong>Data e Ora: da confermare.</strong><br> <br> Questa email è stata generata da un sistema automatico, si prega di non rispondere. <br><br> Cordiali Saluti,<br> La Direzione Mobidoc</div> <br></div></body></html>';


					mail($to3, $subject3, $message3, $headers3);

				}
				else{
					echo "Unable to insert record";
					exit();
				}
			}else{
				echo "Unable to insert record in booking table";
				exit();
			}

		}
	}

	unset($_SESSION['book_visits']);
	$_SESSION['pat_id']='';
	mysqli_close($conn);
	header("location: /paziente/booking-completed.php");
}


exit();



require __DIR__ .'/PayPal-PHP-SDK/autoload.php';

	//Api
	$apiContext = new ApiContext(
		new OAuthTokenCredential(
			'AWpX5sJTYwSVuoRXOBvzSfhsZFosZ5isFsDQ-qi46o-Q-fcrzVgOQLPHMC9CYdJo6_K4seUZji8uYKux',     // ClientID
			'EOfdxk2Tlkxu9J_e6FjYLk9fraj18mkkdPo_kJtFll43XqJ4_asq2-P2Ra6mybSAfDKYrZ5kxRJKwE8G'      // ClientSecret
		)
	);

	$apiContext->setConfig(
		array(
			'mode' => 'live',
			'http.ConnectionTimeOut' => 30,
			'log.LogEnabled' => false,
			'log.FileName' => '',
			'log.LogLevel' => 'FINE',
			'validation.level' => 'log'
		)
	);

	use \PayPal\Api\Payer;
	use \PayPal\Api\Details;
	use \PayPal\Api\Amount;
	use \PayPal\Api\Transaction;
	use \PayPal\Api\Payment;
	use \PayPal\Api\PaymentExecution;
	use \PayPal\Api\RedirectUrls;
	use \PayPal\Exception\PayPalConnectionException;

	// Get payment object by passing paymentId
	$paymentId = $_GET['paymentId'];
	$payment = Payment::get($paymentId, $apiContext);

// Execute payment with payer id
	$execution = new PaymentExecution();
	$execution->setPayerId($_GET['PayerID']);

	try {
		// Execute payment
		$result = $payment->execute($execution, $apiContext);

		// Extract authorization id
		$authid = $payment->transactions[0]->related_resources[0]->authorization->id;

//custom stuff
		include '../connect.php';

		$patient_id = $_SESSION['patient_id'];
		/*$doctor_id = $_SESSION['doctor_id'];
        $visit_name = $_SESSION['visit_name'];
        $price = $_SESSION['price'];*/
		$message = $_SESSION['message'];
		$payment_mode = $_SESSION['payment_mode'];
		$booking_status = $_SESSION['booking_status'];
		$doctor_booking_status = $_SESSION['doctor_booking_status'];
		$patient_confirmation = $_SESSION['patient_confirmation'];
		$pateint_remove_from_list = $_SESSION['pateint_remove_from_list'];
		date_default_timezone_set("Europe/Rome");
		$date_of_booking = date("d/m/Y H:i:s");
		$_SESSION['date_booking'] = $date_of_booking;

		$sql4 = "select * from paziente_profile where paziente_id='".$patient_id."'";
		$result4 = mysqli_query($conn, $sql4);
		$rows4 = mysqli_fetch_array($result4);
		$paziente_main_name = $rows4['first_name']." ".$rows4["last_name"];
		$paziente_email = $rows4['email'];
		$gmap_address = $rows4['gmap_address'];
		$latitude = $rows4['latitude'];
		$longitude = $rows4['longitude'];

		if (isset($_SESSION['book_visits'])){

			$book_visits = $_SESSION['book_visits'];

			$unique_cookie_array = array();
			foreach ($book_visits as $key => $unique_cookie_val){
				if(!in_array($unique_cookie_val, $unique_cookie_array))
					$unique_cookie_array[$key]=$unique_cookie_val;
			}
			foreach($unique_cookie_array as $key => $cookie_book_visit) {
				if (!empty($cookie_book_visit['book_patient_id'])){

					$doctor_id = $cookie_book_visit['book_doctor'];
					$visit_name = $cookie_book_visit['Booking_name'];
					$article_id = $cookie_book_visit['article_id'];

					$sql345 = "SELECT DISTINCT lis.visit_home_price, lis.visit_tele_price, am.home, am.tele
FROM articlesMobidoc am
JOIN listini lis ON am.id=lis.article_mobidoc_id
JOIN articlesMobidoc_specialty ams ON am.id=ams.id
JOIN doctor_specialty ds ON ams.specialtyMobidoc=ds.specialty
JOIN doctor_profile dp ON ds.doctor_id=dp.doctor_id
WHERE am.`descrizione`='$visit_name' AND (am.home='Y' OR am.tele='Y')";

					$result345 = mysqli_query($conn, $sql345);
					$rows345 = mysqli_fetch_array($result345);

					if ($rows345['home'] == 'Y' && $rows345['tele'] == 'Y' || $rows345['home'] == 'Y') {
						$price = $rows345['visit_home_price'];
					} else {
						$price = $rows345['visit_tele_price'];
					}

					$sql = "insert into bookings (patient_id, doctor_id, price, message, payment_mode, booking_status, doctor_booking_status, patient_confirmation, pateint_remove_from_list, date_of_booking, gmap_coordinates, latitude, longitude ) values('".$patient_id."', '".$doctor_id."', '".$price."', '".$message."', '".$payment_mode."', '".$booking_status."', '".$doctor_booking_status."', '".$patient_confirmation."', '".$pateint_remove_from_list."', '".$date_of_booking."', '".$gmap_address."', '".$latitude."', '".$longitude."')";
					$result = mysqli_query($conn, $sql);

					if($result==1) {
						$last_booking_id = mysqli_insert_id($conn);
						$sql_new1 = "insert into booked_service (booking_id, article_id, price) values('".$last_booking_id."', '".$article_id."', '".$price."')";
						$result_new1 = mysqli_query($conn, $sql_new1);

						$sql2 = "insert into payments (date_of_booking, patient_id, authorization_id, payment_status, capture_status) values('".$date_of_booking."', '".$patient_id."', '".$authid."', '1', '0')";
						$result2 = mysqli_query($conn, $sql2);

						if($result_new1==1)
						{

							$sql3 = "select * from doctor_profile where doctor_id='".$doctor_id."'";
							$result3 = mysqli_query($conn, $sql3);
							$rows3 = mysqli_fetch_array($result3);
							$doctor_main_name = $rows3['fname']." ".$rows3["lname"];
							$doctor_email = $rows3['email'];
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
							$message123 = '<!DOCTYPE html><html data-wf-page="5dcd852d5095d024f8ea51ae" data-wf-site="5dcd852d5095d04927ea51ad"><head><meta charset="utf-8"><meta content="width=device-width, initial-scale=1" name="viewport"><meta content="Webflow" name="generator"><style>.header{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;width:100%;height:180px;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;-webkit-box-align:center;-webkit-align-items:center;-ms-flex-align:center;align-items:center;background-image:url("https://www.mobidoc.it/images/mailer_header.png");background-position:50% 50%, 50% 0%;background-size:100%,cover;background-repeat:no-repeat,repeat}.text_container{width:80%;min-height:150px;margin-top:70px;margin-right:auto;margin-left:auto}.button{margin:20px 20px 20px 0px;padding:16px 34px;border-radius:50px;background-color:#00285c}.text-block{margin-top:10px;font-size:16px}.text-block.italic{margin-top:28px;font-style:italic;font-weight:300}.body{font-family:Poppins,sans-serif;color:#00285c}.heading{margin-bottom:23px}.name{width:auto}a{text-decoration:none;color:#fff}</style> <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script> <script type="text/javascript">WebFont.load({google:{families:["Poppins:300,regular,italic,600"]}});</script> <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script> </head><body class="body"><div class="header"></div><div class="text_container"><h4 class="heading">Nuova Prenotazione!</h4><div class="text-block">'.$paziente_main_name.' Ha prenotato una visita da '.$doctor_main_name.'. <br><br> Questa email è stata generata da un sistema automatico, si prega di non rispondere.<br><br> Cordiali Saluti,<br> La Direzione Mobidoc</div> <br></div></body></html>';


							mail($to, $subject, $message123, $headers);


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
							$message2 = '<!DOCTYPE html><html data-wf-page="5dcd852d5095d024f8ea51ae" data-wf-site="5dcd852d5095d04927ea51ad"><head><meta charset="utf-8"><meta content="width=device-width, initial-scale=1" name="viewport"><meta content="Webflow" name="generator"><style>.header{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;width:100%;height:180px;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;-webkit-box-align:center;-webkit-align-items:center;-ms-flex-align:center;align-items:center;background-image:url("https://www.mobidoc.it/images/mailer_header.png");background-position:50% 50%, 50% 0%;background-size:100%,cover;background-repeat:no-repeat,repeat}.text_container{width:80%;min-height:150px;margin-top:70px;margin-right:auto;margin-left:auto}.button{margin:20px 20px 20px 0px;padding:16px 34px;border-radius:50px;background-color:#00285c}.text-block{margin-top:10px;font-size:16px}.text-block.italic{margin-top:28px;font-style:italic;font-weight:300}.body{font-family:Poppins,sans-serif;color:#00285c}.heading{margin-bottom:23px}.name{width:auto}a{text-decoration:none;color:#fff}</style> <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script> <script type="text/javascript">WebFont.load({google:{families:["Poppins:300,regular,italic,600"]}});</script> <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script> </head><body class="body"><div class="header"></div><div class="text_container"><h4 class="heading">Nuova Prenotazione!</h4><div class="text-block">'.$paziente_main_name.' ha prenotato una visita. Effettua il login al tuo account per vedere ulteriori dettagli sulla prenotazione e per contattare il paziente.<br><br> Questa email è stata generata da un sistema automatico, si prega di non rispondere. <br><br> Cordiali Saluti,<br> La Direzione Mobidoc</div> <br></div></body></html>';


							mail($to2, $subject2, $message2, $headers2);


//email to patient
							$to3 = $paziente_email; //patient email
							$subject3 = 'Mobidoc Prestazione Prenotata';
							$from3 = 'mobidoc_update@mobidoc.it';

// To send HTML mail, the Content-type header must be set
							$headers3  = 'MIME-Version: 1.0' . "\r\n";
							$headers3 .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Create email headers
							$headers3 .= 'From: '.$from."\r\n". 'Reply-To: '.$rply_email."\r\n" .   'X-Mailer: PHP/' . phpversion();

// Compose a simple HTML email message
							$message3 = '<!DOCTYPE html><html data-wf-page="5dcd852d5095d024f8ea51ae" data-wf-site="5dcd852d5095d04927ea51ad"><head><meta charset="utf-8"><meta content="width=device-width, initial-scale=1" name="viewport"><meta content="Webflow" name="generator"><style>.header{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;width:100%;height:180px;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;-webkit-box-align:center;-webkit-align-items:center;-ms-flex-align:center;align-items:center;background-image:url("https://www.mobidoc.it/images/mailer_header_paziente.jpg");background-position:50% 50%, 50% 0%;background-size:100%,cover;background-repeat:no-repeat,repeat}.text_container{width:80%;min-height:150px;margin-top:70px;margin-right:auto;margin-left:auto}.button{margin:20px 20px 20px 0px;padding:16px 34px;border-radius:50px;background-color:#00285c}.text-block{margin-top:10px;font-size:16px}.text-block.italic{margin-top:28px;font-style:italic;font-weight:300}.body{font-family:Poppins,sans-serif;color:#00285c}.heading{margin-bottom:23px}.name{width:auto}a{text-decoration:none;color:#fff}</style> <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script> <script type="text/javascript">WebFont.load({google:{families:["Poppins:300,regular,italic,600"]}});</script> <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script> </head><body class="body"><div class="header"></div><div class="text_container"><h4 class="heading">Grazie per aver scelto Mobidoc!</h4><div class="text-block">La tua visita per '.$visit_name.' con '.$doctor_main_name.' è stata prenotata con successo. Sarai a breve contattato dal tuo Professionista Mobidoc con cui potrai concordare data e orario. <br> <br><strong>Data e Ora: da confermare.</strong><br> <br> Questa email è stata generata da un sistema automatico, si prega di non rispondere. <br><br> Cordiali Saluti,<br> La Direzione Mobidoc</div> <br></div></body></html>';


							mail($to3, $subject3, $message3, $headers3);

						}
						else{
							echo "Unable to insert record";
							exit();
						}
					}else{
						echo "Unable to insert record in booking table";
						exit();
					}

				}
			}

			unset($_SESSION['book_visits']);
			$_SESSION['pat_id']='';
			mysqli_close($conn);
			header("location: /paziente/booking-completed.php");
		}

	} catch (PayPal\Exception\PayPalConnectionException $ex) {
		echo $ex->getCode();
		echo $ex->getData();
		die($ex);
	} catch (Exception $ex) {
		die($ex);
	}	

	
?>
