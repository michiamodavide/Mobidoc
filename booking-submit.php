<?PHP
session_start();

	if(isset($_POST['submit']))
	{

		include 'connect.php';

		$patient_email = $_SESSION['paziente_email'];
		$patient_id = mysqli_real_escape_string($conn, $_POST['patient_id']);
		$contact_id = mysqli_real_escape_string($conn, $_POST['contact_id']);
		$message = $_POST['message'];
        $appoint_time = $_POST['appoint_time'];
		$payment_mode = mysqli_real_escape_string($conn, $_POST['payment_mode']);
        $doc_id = mysqli_real_escape_string($conn, $_POST['doctor_id']);
		$payment_status = 0;
		$booking_status = mysqli_real_escape_string($conn, $_POST['booking_status']);
		$doctor_booking_status = mysqli_real_escape_string($conn, $_POST['doctor_booking_status']);
		$patient_confirmation = mysqli_real_escape_string($conn, $_POST['patient_confirmation']);
		$pateint_remove_from_list = mysqli_real_escape_string($conn, $_POST['pateint_remove_from_list']);

        $total_price = $_POST['total_price'];

		date_default_timezone_set("Europe/Rome");
		$date_of_booking = date("Y/m/d H:i:s");

		if($payment_mode == 'Online'){
			$_SESSION['patient_id'] = $patient_id;
		    $_SESSION['doctor_id'] = $doc_id;
		    $_SESSION['contact_id'] = $contact_id;
			/*$_SESSION['visit_name'] = $visit_name;*/
			$_SESSION['price'] = $total_price;
			$_SESSION['message'] = $message;
			$_SESSION['appoint_time'] = $appoint_time;
			$_SESSION['payment_mode'] = $payment_mode;
			$_SESSION['booking_status'] = $booking_status;
			$_SESSION['doctor_booking_status'] = $doctor_booking_status;
			$_SESSION['patient_confirmation'] = $patient_confirmation;
			$_SESSION['pateint_remove_from_list'] = $pateint_remove_from_list;
			$_SESSION['payment_status'] = $payment_status;
			header("location: /pay/redirect.php");

		} else {

            $sql2 = "select * from paziente_profile where paziente_id='".$patient_id."'";
            $result2 = mysqli_query($conn, $sql2);
            $rows2 = mysqli_fetch_array($result2);
            $paziente_main_name = $rows2['first_name']." ".$rows2["last_name"];
            $gmap_address = $rows2['gmap_address'];
            $latitude = $rows2['latitude'];
            $longitude = $rows2['longitude'];
            $paziente_email = $rows2['email'];


            if (isset($_SESSION['book_visits'])){
                $book_visits = $_SESSION['book_visits'];
                $unique_cookie_array = array();
                foreach ($book_visits as $key => $unique_cookie_val){
                    if(!in_array($unique_cookie_val, $unique_cookie_array))
                        $unique_cookie_array[$key]=$unique_cookie_val;
                }


                $ii = 1;
                $booking_parent_id = '';
                $items_array = array();
                $email_sent = 0;

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


                     $apt_date = '';
                     //$appoint_time[$ii-1]
                     if ($appoint_time){
                         $apt_date = date("Y/m/d H:i:s", strtotime($appoint_time));
                     }

                      if ($ii > 1){
                         $discounted_price = $price/2;
                         $sql = "insert into bookings (patient_id, booking_discount_id, doctor_id, price, total_discount, message, payment_mode, booking_status, doctor_booking_status, patient_confirmation, pateint_remove_from_list, date_of_booking, apoint_time, gmap_coordinates, latitude, longitude ) values('".$patient_id."','".$booking_parent_id."', '".$doctor_id."', '".$price."', '".$discounted_price."', '".$message[$ii-1]."', '".$payment_mode."', '".$booking_status."', '".$doctor_booking_status."', '".$patient_confirmation."', '".$pateint_remove_from_list."', '".$date_of_booking."', '".$apt_date."', '".$gmap_address."', '".$latitude."', '".$longitude."')";
                     }else{
                         $sql = "insert into bookings (patient_id, doctor_id, price, message, payment_mode, booking_status, doctor_booking_status, patient_confirmation, pateint_remove_from_list, date_of_booking, apoint_time, gmap_coordinates, latitude, longitude ) values('".$patient_id."', '".$doctor_id."', '".$price."', '".$message[$ii-1]."', '".$payment_mode."', '".$booking_status."', '".$doctor_booking_status."', '".$patient_confirmation."', '".$pateint_remove_from_list."', '".$date_of_booking."', '".$apt_date."', '".$gmap_address."', '".$latitude."', '".$longitude."')";
                      }

                     $result = mysqli_query($conn, $sql);

                     if($result==1) {
                         $last_booking_id = mysqli_insert_id($conn);
                         if ($ii==1){
                             $booking_parent_id = $last_booking_id;
                         }
                         $sql_new1 = "insert into booked_service (booking_id, article_id, price) values('".$last_booking_id."', '".$article_id."', '".$price."')";
                         $result_new1 = mysqli_query($conn, $sql_new1);

                         if($result_new1==1) {
                             $email_sent = 1;
                         }else{
                             echo "Unable to insert record in booked_service table";
                             exit();
                         }

                     }
                     else{
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
                    $sql3 = "select * from doctor_profile where doctor_id='".$doc_id."'";
                    $result3 = mysqli_query($conn, $sql3);
                    $rows3 = mysqli_fetch_array($result3);
                    $doctor_main_name = $rows3['fname']." ".$rows3["lname"];
                    $doctor_email = $rows3['email'];
                    $doctor_phone = $rows3['phone'];
                    $doctor_fname = $rows3['fname'];


                    $send_emails_array = array($contact_email, $doctor_email, "info@mobidoc.it");

                    $pdf_file_path = '';
                    $contact_full_n = $contact_name;
                    include ("contact_pdf.php");
                    // Attachment file
                    $pdf_file1 = "assets/generate_pdf/mobidoc1.pdf";

                    include ("executor_pdf.php");
                    // Attachment file
                    $pdf_file2 = "assets/generate_pdf/mobidoc2.pdf";

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

                    /*
                    $apt_count = count($appoint_time);
                    foreach($appoint_time as $apt_key => $apt) {

                    }
                    */

                        $booking_time_link = 'da confermare';

                        if (!empty($appoint_time)) {
                            $booking_date = strtr($appoint_time, '/', '-');
                            /*booking start time*/
                            $start_date = date('Ymd', strtotime($booking_date));
                            $start_time = date('His', strtotime($booking_date));
                            /*booking end time*/
                            $selectedate = $booking_date;
                            $enddate = strtotime("+30 minutes", strtotime($selectedate));
                            $booking_end_date = date('Ymd', $enddate);
                            $booking_end_time = date('His', $enddate);

                            $start_dt = $start_date . 'T' . $start_time;
                            $end_dt = $booking_end_date . 'T' . $booking_end_time;

                            /*just date format change for date and time*/
                            $patient_date = date('d-m-Y', strtotime($booking_date));
                            $patient_time = date('H:i', strtotime($booking_date));

                            $calender_link = 'https://calendar.google.com/calendar/u/0/r/eventedit?action=TEMPLATE&text=Mobidoc Visit&dates='.$start_dt.'/'.$end_dt.'&ctz=Europe/Rome';

                            $outlook_calender_date = date('Y-m-d', strtotime($booking_date)).'T'.date('H:i:s', strtotime($booking_date));
                            $outlook_calender_link = 'https://outlook.live.com/calendar/0/deeplink/compose?startdt='.$outlook_calender_date.'&subject=Mobidoc%20Visit';



                            $icalender = '/ics_calendar.php?booking_id='.$booking_parent_id;
                            $booking_time_link = $patient_date.' '.$patient_time."<br><a target='_blank' style='color: blue; text-decoration: underline' href='$calender_link'>Calendario Google</a> | <a target='_blank' style='color: blue; text-decoration: underline' href='$outlook_calender_link'>Calendario Outlook</a> | <a target='_blank' style='color: blue; text-decoration: underline' href='$icalender'>iCal</a>";

                        }


                       /*
                        $date_nmb = '';
                        if ($apt_count > 1){
                            $date_nmb = $apt_key+1;
                        }

                        $add_break = '';
                           if ($apt_key < 1){
                              $add_break = '<br>';
                           }
                       */
                        $htmlContent .="<br><strong>Data e Ora</strong>:  ".$booking_time_link."<br>";


                    $htmlContent .="<br><strong>Doctor Info<br>Name</strong>: ".$doctor_main_name."<br><strong>Email</strong>: ".$doctor_email."<br><strong>Phone</strong>: ".$doctor_phone."<br><br><strong>Prezzo totale: </strong>€".$total_price." <br><strong>Payment Method: </strong>".$payment_mode." <br><br>Questa email è stata generata da un sistema automatico, si prega di non rispondere.<br><br> Cordiali Saluti,<br> La Direzione Mobidoc</div> <br></div></body></html>";


                    // Multipart boundary
                    $message = "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"UTF-8\"\n" .
                        "Content-Transfer-Encoding: 7bit\n\n" . $htmlContent . "\n\n";

                    // Preparing attachment
                    /*
                     if(!empty($file) > 0){
                         if(is_file($file)){
                             $message .= "--{$mime_boundary}\n";
                             $fp =    @fopen($file,"rb");
                             $data =  @fread($fp,filesize($file));

                             @fclose($fp);
                             $data = chunk_split(base64_encode($data));
                             $message .= "Content-Type: application/octet-stream; name=\"".basename($file)."\"\n" .
                                 "Content-Description: ".basename($file)."\n" .
                                 "Content-Disposition: attachment;\n" . " filename=\"".basename($file)."\"; size=".filesize($file).";\n" .
                                 "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n";
                         }
                     }
                    */

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

                        // Recipient
                        //$to = $send_email;

                        // Send email
                        @mail($send_email, $subject, $message, $headers, $returnpath);

                        if ($send_emails_key == 2){
                            for($pd=0;$pd < count($pdf_files);$pd++){
                                unlink($pdf_files[$pd]);
                            }
                        }
                    }



                    /*
                        old emails
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
                    $message123 = '<!DOCTYPE html><html data-wf-page="5dcd852d5095d024f8ea51ae" data-wf-site="5dcd852d5095d04927ea51ad"><head><meta charset="utf-8"><meta content="width=device-width, initial-scale=1" name="viewport"><meta content="Webflow" name="generator"><style>.header{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;width:100%;height:180px;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;-webkit-box-align:center;-webkit-align-items:center;-ms-flex-align:center;align-items:center;background-image:url("https://www.mobidoc.it/images/mailer_header.png");background-position:50% 50%, 50% 0%;background-size:100%,cover;background-repeat:no-repeat,repeat}.text_container{width:80%;min-height:150px;margin-top:70px;margin-right:auto;margin-left:auto}.button{margin:20px 20px 20px 0px;padding:16px 34px;border-radius:50px;background-color:#00285c}.text-block{margin-top:10px;font-size:16px}.text-block.italic{margin-top:28px;font-style:italic;font-weight:300}.body{font-family:Poppins,sans-serif;color:#00285c}.heading{margin-bottom:23px}.name{width:auto}a{text-decoration:none;color:#fff}</style> <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script> <script type="text/javascript">WebFont.load({google:{families:["Poppins:300,regular,italic,600"]}});</script> <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script> </head><body class="body"><div class="header"></div><div class="text_container"><h4 class="heading">Nuova Prenotazione!</h4><div class="text-block">'.$paziente_main_name.' Ha prenotato una visita da '.$doctor_main_name.'. <br><br>Questa email è stata generata da un sistema automatico, si prega di non rispondere.<br><br> Cordiali Saluti,<br> La Direzione Mobidoc</div> <br></div></body></html>';


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
                    $message2 = '<!DOCTYPE html><html data-wf-page="5dcd852d5095d024f8ea51ae" data-wf-site="5dcd852d5095d04927ea51ad"><head><meta charset="utf-8"><meta content="width=device-width, initial-scale=1" name="viewport"><meta content="Webflow" name="generator"><style>.header{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;width:100%;height:180px;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;-webkit-box-align:center;-webkit-align-items:center;-ms-flex-align:center;align-items:center;background-image:url("https://www.mobidoc.it/images/mailer_header.png");background-position:50% 50%, 50% 0%;background-size:100%,cover;background-repeat:no-repeat,repeat}.text_container{width:80%;min-height:150px;margin-top:70px;margin-right:auto;margin-left:auto}.button{margin:20px 20px 20px 0px;padding:16px 34px;border-radius:50px;background-color:#00285c}.text-block{margin-top:10px;font-size:16px}.text-block.italic{margin-top:28px;font-style:italic;font-weight:300}.body{font-family:Poppins,sans-serif;color:#00285c}.heading{margin-bottom:23px}.name{width:auto}a{text-decoration:none;color:#fff}</style> <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script> <script type="text/javascript">WebFont.load({google:{families:["Poppins:300,regular,italic,600"]}});</script> <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script> </head><body class="body"><div class="header"></div><div class="text_container"><h4 class="heading">Nuova Prenotazione!</h4><div class="text-block">'.$paziente_main_name.' ha prenotato una visita. Effettua il login al tuo account per vedere ulteriori dettagli sulla prenotazione e per contattare il paziente.<br><br>Questa email è stata generata da un sistema automatico, si prega di non rispondere.<br><br> Cordiali Saluti,<br> La Direzione Mobidoc</div> <br></div></body></html>';


                    mail($to2, $subject2, $message2, $headers2);


                    //email to contact
                    $to3 = $contact_email; //Contact email
                    $subject3 = 'Mobidoc Prestazione Prenotata';
                    $from3 = 'mobidoc_update@mobidoc.it';

                    // To send HTML mail, the Content-type header must be set
                    $headers3  = 'MIME-Version: 1.0' . "\r\n";
                    $headers3 .= 'Content-Type: text/html; charset=utf-8' . "\r\n";

                    // Create email headers
                    $headers3 .= 'From: '.$from."\r\n". 'Reply-To: '.$rply_email."\r\n" .   'X-Mailer: PHP/' . phpversion();

                    // Compose a simple HTML email message
                    $message3 = '<!DOCTYPE html><html data-wf-page="5dcd852d5095d024f8ea51ae" data-wf-site="5dcd852d5095d04927ea51ad"><head><meta charset="utf-8"><meta content="width=device-width, initial-scale=1" name="viewport"><meta content="Webflow" name="generator"><style>.header{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;width:100%;height:180px;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;-webkit-box-align:center;-webkit-align-items:center;-ms-flex-align:center;align-items:center;background-image:url("https://www.mobidoc.it/images/mailer_header_paziente.jpg");background-position:50% 50%, 50% 0%;background-size:100%,cover;background-repeat:no-repeat,repeat}.text_container{width:80%;min-height:150px;margin-top:70px;margin-right:auto;margin-left:auto}.button{margin:20px 20px 20px 0px;padding:16px 34px;border-radius:50px;background-color:#00285c}.text-block{margin-top:10px;font-size:16px}.text-block.italic{margin-top:28px;font-style:italic;font-weight:300}.body{font-family:Poppins,sans-serif;color:#00285c}.heading{margin-bottom:23px}.name{width:auto}a{text-decoration:none;color:#fff}</style> <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script> <script type="text/javascript">WebFont.load({google:{families:["Poppins:300,regular,italic,600"]}});</script> <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script> </head><body class="body"><div class="header"></div><div class="text_container"><h4 class="heading">Grazie per aver scelto Mobidoc!</h4><div class="text-block">La tua visita per '.$visit_name.' con '.$doctor_main_name.' è stata prenotata con successo. Sarai a breve contattato dal tuo Professionista Mobidoc con cui potrai concordare data e orario. <br> <br><strong>Data e Ora: da confermare.</strong><br> <br> Questa email è stata generata da un sistema automatico, si prega di non rispondere.<br><br> Cordiali Saluti,<br> La Direzione Mobidoc</div> <br></div></body></html>';

                    mail($to3, $subject3, $message3, $headers3);
                    */

                }


                unset($_SESSION['book_visits']);
                $_SESSION['pat_id']='';
                mysqli_close($conn);
                header("location: /paziente/booking-completed.php");
            }else{
                header("location: /paziente/account.php");
            }

		}
	} else {
        echo "error happened";
    }
?>
