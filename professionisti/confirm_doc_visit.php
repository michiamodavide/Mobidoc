<?php
$q = $_REQUEST["q"];
$c = $_REQUEST["c"];

include '../connect.php';

if($conn === false){
    die("ERROR database");
}

   $sql = "update bookings set admin_book='2' where patient_id = '".$q."' and booking_id = '".$c."' or patient_id = '".$q."' and booking_discount_id = '".$c."' ";
    $result = mysqli_query($conn, $sql);
   if ($result == 1) {
     // sql to delete a record

     $sql222 = "select * from bookings where patient_id = '".$q."' and admin_book = 1";
     $result222 = mysqli_query($conn, $sql222);

     while ($rows222 = mysqli_fetch_array($result222)) {
       $sql22 = "DELETE FROM bookings where booking_id = '".$rows222['booking_id']."'";
       $result22 = mysqli_query($conn, $sql22);

       if ($result22 == 1){

         $sql223 = "DELETE FROM booked_service where booking_id = '".$rows222['booking_id']."'";
         $result223 = mysqli_query($conn, $sql223);

         if ($result223 ==1){
//           not show anything
         }else{
           echo 'Record1 not deleted';
           exit();
         }

       }else{
         echo 'Record not deleted';
           exit();
       }
     }


       /*get booked visits*/
       $sql_book = "select bs.article_id, ms.descrizione, ms.attributo, bk.doctor_id, bk.patient_id, bk.price, bk.total_discount, bk.km_price, bk.apoint_time, bk.payment_mode 
from bookings bk
join booked_service bs on bs.booking_id=bk.booking_id
join articlesMobidoc ms on ms.id=bs.article_id
where bk.patient_id = '".$q."' and bk.booking_id = '".$c."' or bk.patient_id = '".$q."' and bk.booking_discount_id = '".$c."' ";

       $sql_book_result = mysqli_query($conn, $sql_book);

       $doc_id = 0;
       $patient_id = 0;
       $kilo_meter_price = 0;
       $payment_mode = '';
       $items_array = array();
       $patient_apt_date = '';
       while ($sql_book_row = mysqli_fetch_array($sql_book_result)){
           array_push($items_array, array(
               "exam_name" => $sql_book_row['descrizione'],
               "exam_attribute" => $sql_book_row['attributo'],
               "exam_price" => $sql_book_row['price'],
               "exam_discount_price" => $sql_book_row['total_discount'],
           ));

           $patient_apt_date = $sql_book_row['apoint_time'];
           $doc_id = $sql_book_row['doctor_id'];
           $patient_id = $sql_book_row['patient_id'];
           if (!empty($sql_book_row['km_price'])){
               $kilo_meter_price = $sql_book_row['km_price'];
           }
           $payment_mode = $sql_book_row['payment_mode'];
       }


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

       /*get contact data*/
       $contact_sql = "select * from contact_profile where id='".$patient_row["contact_id"]."'";
       $contact_result = mysqli_query($conn, $contact_sql);
       $contact_row = mysqli_fetch_array($contact_result);
       $contact_name = $contact_row['name']." ".$contact_row["surname"];
       $contact_email = $contact_row['email'];
       $contact_phone = $contact_row['phone'];
       $contact_fname = $contact_row['name'];
       $contact_surname = $contact_row["surname"];

       /*get doctor info*/
       $sql3 = "select * from doctor_profile where doctor_id='".$doc_id."'";
       $result3 = mysqli_query($conn, $sql3);
       $rows3 = mysqli_fetch_array($result3);
       $doctor_main_name = $rows3['fname']." ".$rows3["lname"];
       $doctor_email = $rows3['email'];
       $doctor_phone = $rows3['phone'];
       $doctor_fname = $rows3['fname'];


       $contact_full_n = $contact_name;
       $pdf_file_path = '../';
       include ("../contact_pdf.php");
       $pdf_file1 = "../assets/generate_pdf/mobidoc1.pdf";

       include ("../executor_pdf.php");
       $pdf_file2 = "../assets/generate_pdf/mobidoc2.pdf";

       include ("../tele_pdf.php");
       $pdf_file3 = "../assets/generate_pdf/mobidoc3.pdf";

       $pdf_files = array($pdf_file1, $pdf_file2, $pdf_file3);


       $send_emails_array = array($contact_email, $doctor_email, "info@mobidoc.it");

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
       $htmlContent = $htmlContent1= '<!DOCTYPE html><html data-wf-page="5dcd852d5095d024f8ea51ae" data-wf-site="5dcd852d5095d04927ea51ad"><head><meta charset="utf-8"><meta content="width=device-width, initial-scale=1" name="viewport"><meta content="Webflow" name="generator"><style>.header{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;width:100%;height:180px;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;-webkit-box-align:center;-webkit-align-items:center;-ms-flex-align:center;align-items:center;background-image:url("https://www.mobidoc.it/images/mailer_header.png");background-position:50% 50%, 50% 0%;background-size:100%,cover;background-repeat:no-repeat,repeat}.text_container{width:80%;min-height:150px;margin-top:70px;margin-right:auto;margin-left:auto}.button{margin:20px 20px 20px 0px;padding:16px 34px;border-radius:50px;background-color:#00285c}.text-block{margin-top:10px;font-size:16px}.text-block.italic{margin-top:28px;font-style:italic;font-weight:300}.body{font-family:Poppins,sans-serif;color:#00285c}.heading{margin-bottom:23px}.name{width:auto}a{text-decoration:none;color:#fff}</style> <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script> <script type="text/javascript">WebFont.load({google:{families:["Poppins:300,regular,italic,600"]}});</script> <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script> </head><body class="body"><div class="header"></div><div class="text_container"><h4 class="heading">Nuova Prenotazione!</h4><div class="text-block">'.$paziente_main_name.' Ha prenotato una visita da '.$doctor_main_name.'. <br><br><strong>Contact Info</strong>:
                   <br><strong>Name</strong>: '.$contact_name.'<br><strong>Phone</strong>: '.$contact_phone.'<br><br><strong>Patient Info</strong><br><strong>Name</strong>: '.$patient_name.'<br><strong>Fiscal Code</strong>: '.$patient_fiscal.'<br><strong>Date of Birth</strong>: '.$patient_dob.'<br><strong>Address</strong>: <a target=\'_blank\' style=\'color: blue; text-decoration: underline\' href='.$patient_gmap_addr.'>'.$patient_address.'</a><br><br><strong>Visits/Exams</strong><br>';


       $total_price = $kilo_meter_price;
       foreach($items_array as $key => $item_array) {
           $current_ex_price = $item_array['exam_price'];
           $visit_amount = $item_array['exam_price'].'</strong>';
           if (!empty($item_array['exam_discount_price'])){
               $get_discount_price  = $item_array['exam_discount_price']*100/$item_array['exam_price'];
               $show_percentage = 100-$get_discount_price;
               $disounted_amount = $current_ex_price =  $item_array['exam_discount_price'];
               $visit_amount = $disounted_amount.' </strong>(With '.$show_percentage.'% discount)';

           }

           $attribute = '';
           if (!empty($item_array['exam_attribute'])){
               $attribute = ' ('.$item_array['exam_attribute'].')';
           }

           $total_price += $current_ex_price;
           $htmlContent = $htmlContent1 .="
      ". $item_array['exam_name'].$attribute.'-: <strong>€'.$visit_amount.'<br>'."
";
       }


       /*
       $apt_count = count($patient_apt_date);
       foreach($patient_apt_date as $apt_key => $apt) {

       }
       */
           $booking_time_link = 'da confermare';

           if (!empty($patient_apt_date) && strtotime($patient_apt_date) > 0) {
               $booking_date = strtr($patient_apt_date, '/', '-');
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


               $icalender = $_SERVER['SERVER_NAME'].'/ics_calendar.php?booking_id='.$c;
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
           $htmlContent = $htmlContent1 .="<br><strong>Data e Ora</strong>: ".$booking_time_link."<br>";


       $paypal_link = '';
       if ($payment_mode == "Carta di Credito"){
           $booking_ids_array = array($c);
           include ("../pay/redirect_tele.php");
           $paypal_link = " | <a target='_blank' style='color: blue; text-decoration: underline' href='$redirectUrl'>Clicca qui per pagare</a>";
       }


       $htmlContent .="<br><strong>Doctor Info<br>Name</strong>: ".$doctor_main_name."<br><strong>Email</strong>: ".$doctor_email."<br><br><strong>Indennità Km: </strong>€".$kilo_meter_price." <br><br><strong>Prezzo totale: </strong>€".$total_price." <br><strong>Metodo di Pagamento: </strong>".$payment_mode." <br><br>Questa email è stata generata da un sistema automatico, si prega di non rispondere.<br><br> Cordiali Saluti,<br> La Direzione Mobidoc</div> <br></div></body></html>";

       $htmlContent1 .="<br><strong>Doctor Info<br>Name</strong>: ".$doctor_main_name."<br><strong>Email</strong>: ".$doctor_email."<br><br><strong>Indennità Km: </strong>€".$kilo_meter_price." <br><br><strong>Prezzo totale: </strong>€".$total_price." <br><strong>Metodo di Pagamento: </strong>".$payment_mode.$paypal_link."<br><br>Questa email è stata generata da un sistema automatico, si prega di non rispondere.<br><br> Cordiali Saluti,<br> La Direzione Mobidoc</div> <br></div></body></html>";


// Multipart boundary
       $message = "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"UTF-8\"\n" .
           "Content-Transfer-Encoding: 7bit\n\n" . $htmlContent . "\n\n";

// Multipart boundary
       $message1 = "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"UTF-8\"\n" .
           "Content-Transfer-Encoding: 7bit\n\n" . $htmlContent1 . "\n\n";

       if(!empty($pdf_files)){
           for($px=0;$px<count($pdf_files);$px++){
               if(is_file($pdf_files[$px])){
                   $file_name = basename($pdf_files[$px]);
                   $file_size = filesize($pdf_files[$px]);

                   $message .= "--{$mime_boundary}\n";
                   $message1 .= "--{$mime_boundary}\n";
                   $fp =    @fopen($pdf_files[$px], "rb");
                   $data =  @fread($fp, $file_size);
                   @fclose($fp);
                   $data = chunk_split(base64_encode($data));
                   $message .= "Content-Type: application/octet-stream; name=\"".$file_name."\"\n" .
                       "Content-Description: ".$file_name."\n" .
                       "Content-Disposition: attachment;\n" . " filename=\"".$file_name."\"; size=".$file_size.";\n" .
                       "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n";
                   $message1 .= "Content-Type: application/octet-stream; name=\"".$file_name."\"\n" .
                       "Content-Description: ".$file_name."\n" .
                       "Content-Disposition: attachment;\n" . " filename=\"".$file_name."\"; size=".$file_size.";\n" .
                       "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n";
               }
           }
       }

       $message .= "--{$mime_boundary}--";
       $message1 .= "--{$mime_boundary}--";
       $returnpath = "-f" . $from;

       foreach($send_emails_array as $send_emails_key => $send_email) {
           // Send email

           if ($send_emails_key == 0){
               $email_message = $message1;
           }else{
               $email_message = $message;
           }
           @mail($send_email, $subject, $email_message, $headers, $returnpath);

           if ($send_emails_key == 2){
               for($pd=0;$pd < count($pdf_files);$pd++){
                   unlink($pdf_files[$pd]);
               }
           }
       }

   }else{
     echo 'Record not Update';
       exit();
   }


mysqli_close($conn);

?>