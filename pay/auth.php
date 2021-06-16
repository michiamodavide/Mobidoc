<?php
	use PayPal\Rest\ApiContext;
	use PayPal\Auth\OAuthTokenCredential;

	session_start();
	echo $_GET['approved'];

	if($_GET['approved'] == 'false'){
		header('Location: ../paziente/booking-error.php');
	}

	//$price = $_SESSION['price'];

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


		$ii = 1;
		$booking_parent_id = '';
		$items_array = array();
		$email_sent = 0;

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

					$sql345 = "SELECT DISTINCT am.descrizione, lis.visit_home_price, lis.visit_tele_price, am.home, am.tele
FROM listini lis
JOIN articlesMobidoc am ON am.id=lis.article_mobidoc_id
WHERE lis.article_mobidoc_id='".$article_id."' AND lis.doctor_id='".$doctor_id."'";

					$result345 = mysqli_query($conn, $sql345);
					$rows345 = mysqli_fetch_array($result345);

					if ($rows345['home'] == 'Y' && $rows345['tele'] == 'Y' || $rows345['home'] == 'Y') {
						$price = $rows345['visit_home_price'];
					} else {
						$price = $rows345['visit_tele_price'];
					}

					array_push($items_array, array(
						"exam_name" => $visit_name,
						"exam_price" => $price,
					));


					if ($ii > 1){
						$discounted_price = $price/2;
						$sql = "insert into bookings (patient_id, booking_discount_id, doctor_id, price,total_discount, message, payment_mode, booking_status, doctor_booking_status, patient_confirmation, pateint_remove_from_list, date_of_booking, gmap_coordinates, latitude, longitude ) values('".$patient_id."', '".$booking_parent_id."', '".$doctor_id."', '".$price."','".$discounted_price."', '".$message."', '".$payment_mode."', '".$booking_status."', '".$doctor_booking_status."', '".$patient_confirmation."', '".$pateint_remove_from_list."', '".$date_of_booking."', '".$gmap_address."', '".$latitude."', '".$longitude."')";
					}else{
						$sql = "insert into bookings (patient_id, doctor_id, price, message, payment_mode, booking_status, doctor_booking_status, patient_confirmation, pateint_remove_from_list, date_of_booking, gmap_coordinates, latitude, longitude ) values('".$patient_id."', '".$doctor_id."', '".$price."', '".$message."', '".$payment_mode."', '".$booking_status."', '".$doctor_booking_status."', '".$patient_confirmation."', '".$pateint_remove_from_list."', '".$date_of_booking."', '".$gmap_address."', '".$latitude."', '".$longitude."')";
					}

					$result = mysqli_query($conn, $sql);

					if($result==1) {
						$last_booking_id = mysqli_insert_id($conn);
						if ($ii==1){
							$booking_parent_id = $last_booking_id;
						}
						$sql_new1 = "insert into booked_service (booking_id, article_id, price) values('".$last_booking_id."', '".$article_id."', '".$price."')";
						$result_new1 = mysqli_query($conn, $sql_new1);

						$sql2 = "insert into payments (date_of_booking, patient_id, authorization_id, payment_status, capture_status) values('".$date_of_booking."', '".$patient_id."', '".$authid."', '1', '0')";
						$result2 = mysqli_query($conn, $sql2);

						if($result_new1==1)
						{
							$email_sent = 1;
						}
						else{
							echo "Unable to insert record";
							exit();
						}
					}else{
						echo "Unable to insert record in booking table";
						exit();
					}
					$ii++;
				}
			}


			if ($email_sent == 1){

				/*get contact data*/
				$contact_sql = "select * from contact_profile where id='".$contact_id."'";
				$contact_result = mysqli_query($conn, $contact_sql);
				$contact_row = mysqli_fetch_array($contact_result);
				$contact_name = $contact_row['name']." ".$contact_row["surname"];
				$contact_email = $contact_row['email'];
				$contact_phone = $contact_row['phone'];
				$contact_fname = $contact_row['name'];
				$contact_surname = $contact_row["surname"];

				/*get patient data*/
				$patient_sql = "select * from paziente_profile where paziente_id='".$patient_id."'";
				$patient_result = mysqli_query($conn, $patient_sql);
				$patient_row = mysqli_fetch_array($patient_result);
				$patient_name = $patient_row['first_name']." ".$patient_row["last_name"];
				$patient_fiscal = $patient_row['fiscale'];
				$patient_dob = date("d-m-Y", strtotime($patient_row['dob']));
				$patient_address = $patient_row['address'];
				$patient_gmap_addr = $patient_row['gmap_address'];
				$p_first_name = $patient_row['first_name'];
				$p_last_name = $patient_row["last_name"];

				/*get doctor info*/
				$sql3 = "select * from doctor_profile where doctor_id='".$doctor_id."'";
				$result3 = mysqli_query($conn, $sql3);
				$rows3 = mysqli_fetch_array($result3);
				$doctor_main_name = $rows3['fname']." ".$rows3["lname"];
				$doctor_email = $rows3['email'];
				$doctor_phone = $rows3['phone'];
				$doctor_fname = $rows3['fname'];


				$send_emails_array = array($contact_email, $doctor_email, "info@mobidoc.it");

				$contact_full_n = $contact_name;
				include ("../contact_pdf.php");
				// Attachment file
				$pdf_file1 = "../assets/generate_pdf/mobidoc1.pdf";

				include ("../executor_pdf.php");
				// Attachment file
				$pdf_file2 = "../assets/generate_pdf/mobidoc2.pdf";

				$pdf_files = array($pdf_file1, $pdf_file2);


				$subject = 'Nuova Prenotazione!';
				// Sender
				$from = 'mobidoc_update@mobidoc.it';
				$rply_email = 'noreplay@mobidoc.it';

				// Header for sender info
				$headers .= 'From: '.$from."\r\n". 'Reply-To: '.$rply_email."\r\n" .   'X-Mailer: PHP/' . phpversion();

				// Boundary
				$semi_rand = md5(time());
				$mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";

				// Headers for attachment
				$headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\"";

				// Compose a simple HTML email message
				$htmlContent = '<!DOCTYPE html><html data-wf-page="5dcd852d5095d024f8ea51ae" data-wf-site="5dcd852d5095d04927ea51ad"><head><meta charset="utf-8"><meta content="width=device-width, initial-scale=1" name="viewport"><meta content="Webflow" name="generator"><style>.header{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;width:100%;height:180px;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;-webkit-box-align:center;-webkit-align-items:center;-ms-flex-align:center;align-items:center;background-image:url("https://www.mobidoc.it/images/mailer_header.png");background-position:50% 50%, 50% 0%;background-size:100%,cover;background-repeat:no-repeat,repeat}.text_container{width:80%;min-height:150px;margin-top:70px;margin-right:auto;margin-left:auto}.button{margin:20px 20px 20px 0px;padding:16px 34px;border-radius:50px;background-color:#00285c}.text-block{margin-top:10px;font-size:16px}.text-block.italic{margin-top:28px;font-style:italic;font-weight:300}.body{font-family:Poppins,sans-serif;color:#00285c}.heading{margin-bottom:23px}.name{width:auto}a{text-decoration:none;color:#fff}</style> <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script> <script type="text/javascript">WebFont.load({google:{families:["Poppins:300,regular,italic,600"]}});</script> <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script> </head><body class="body"><div class="header"></div><div class="text_container"><h4 class="heading">Nuova Prenotazione!</h4><div class="text-block">'.$paziente_main_name.' Ha prenotato una visita da '.$doctor_main_name.'. <br><br><strong>Contact Info</strong>:
                   <br><strong>Name</strong>: '.$contact_name.'<br><strong>Phone</strong>: '.$contact_phone.'<br><br><strong>Patient Info</strong><br><strong>Name</strong>: '.$patient_name.'<br><strong>Fiscal Code</strong>: '.$patient_fiscal.'<br><strong>Date of Birth</strong>: '.$patient_dob.'<br><strong>Address</strong>: <a target=\'_blank\' style=\'color: blue; text-decoration: underline\' href='.$patient_gmap_addr.'>'.$patient_address.'</a><br><br><strong>Visits/Exams</strong><br>';

				foreach($items_array as $key => $item_array) {
					$visit_amount = $item_array['exam_price'].'</strong>';
					if ($key > 0){
						$disounted_amount = $item_array['exam_price']/2;
						$visit_amount = $disounted_amount.' </strong>(With 50% discount)';
					}
					$htmlContent .="
      ". $item_array['exam_name'].'-: <strong>€'.$visit_amount.'<br>'."
     ";
				}
				$htmlContent .="<br><strong>Doctor Info<br>Name</strong>: ".$doctor_main_name."<br><strong>Email</strong>: ".$doctor_email."<br><strong>Phone</strong>: ".$doctor_phone."<br><br><strong>Data e Ora</strong>:da confermare<br><strong>Payment Method: </strong>".$payment_mode." <br><br>Questa email è stata generata da un sistema automatico, si prega di non rispondere.<br><br> Cordiali Saluti,<br> La Direzione Mobidoc</div> <br></div></body></html>";


				// Multipart boundary
				$message = "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"UTF-8\"\n" .
					"Content-Transfer-Encoding: 7bit\n\n" . $htmlContent . "\n\n";

				// Preparing attachment

				if(!empty($pdf_files)){
					for($px=0;$px<count($pdf_files);$px++){
						if(is_file($pdf_files[$px])){
							$file_name = basename($pdf_files[$px]);
							$file_size = filesize($pdf_files[$px]);

							$message .= "--{$mime_boundary}\n";
							$fp =    @fopen($pdf_files[$px], "rb");
							$data =  @fread($fp, $file_size);
							@fclose($fp);
							$data = chunk_split(base64_encode($data));
							$message .= "Content-Type: application/octet-stream; name=\"".$file_name."\"\n" .
								"Content-Description: ".$file_name."\n" .
								"Content-Disposition: attachment;\n" . " filename=\"".$file_name."\"; size=".$file_size.";\n" .
								"Content-Transfer-Encoding: base64\n\n" . $data . "\n\n";
						}
					}
				}

				$message .= "--{$mime_boundary}--";
				$returnpath = "-f" . $from;


				foreach($send_emails_array as $send_emails_key => $send_email) {

					// Send email
					@mail($send_email, $subject, $message, $headers, $returnpath);

					if ($send_emails_key == 2){
						for($pd=0;$pd < count($pdf_files);$pd++){
							unlink($pdf_files[$pd]);
						}
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
