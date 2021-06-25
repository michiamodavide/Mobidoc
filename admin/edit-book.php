<?php
include '../connect.php';
if(isset($_POST['submit'])){


    $contact_email = $_POST['contact_email'];
    $dob = mysqli_real_escape_string($conn, $_POST['dob']);
    $dob=strtotime($dob);
    $dob = date('Y/m/d', $dob);
    $tel = mysqli_real_escape_string($conn, $_POST['contact_tele']);
    $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);

    $patients_idd = $_POST['patient_id'];
    $contact_name = $_POST['contact_fname'].' '.$_POST['contact_lname'];

     /*
         $sql = "UPDATE `paziente_profile` SET `dob` = '$dob', `phone` = '$tel', `first_name` = '$first_name', `last_name` = '$last_name' WHERE `paziente_id` = $patients_idd;";
    $result = mysqli_query($conn, $sql);
     */


      $paziente_main_name = $first_name.' '.$last_name;

      $doctor_id = mysqli_real_escape_string($conn, $_POST['doc_id']);
      $old_ref = $_POST['old_ref_id'];
      $refertatore_id = mysqli_real_escape_string($conn, $_POST['refertatore_id']);
      $visit_name = mysqli_real_escape_string($conn, $_POST['vist_name']);

      $patient_apt_date = $_POST['appoint_time'];

       date_default_timezone_set("Europe/Rome");
      $doc_apt_time = date("Y/m/d H:i:s", strtotime($patient_apt_date));


      $booking_idd = $_POST['booing_idd'];

      $referr_id = '0';
      if (!empty($refertatore_id)) {
        $referr_id = $refertatore_id;
      }

      /*get booking data*/
      $sql_booking = "select * from bookings where booking_id ='" . $booking_idd . "'";
      $result_booking = mysqli_query($conn, $sql_booking);
      $booking_res = mysqli_fetch_array($result_booking);

      $price = $booking_res['price'];
      $discounted_price = $booking_res['total_discount'];
      $payment_mode = $booking_res['payment_mode'];
      $opointment_time = $booking_res['apoint_time'];

      /*update booking data*/
   if ($old_ref == $refertatore_id){
   $sql12 = "UPDATE `bookings` SET `apoint_time` = '$doc_apt_time' WHERE `booking_id` = $booking_idd or `booking_discount_id` = $booking_idd;";
   }else{
   $sql12 = "UPDATE `bookings` SET `doctor_id` = '$doctor_id',`refertatore_id` = '$referr_id' WHERE `booking_id` = $booking_idd;";
   }

      $result12 = mysqli_query($conn, $sql12);

      /*get doctor data*/
      $sql44 = "select * from doctor_profile where doctor_id ='".$doctor_id."'";
      $result44 = mysqli_query($conn, $sql44);
      $rows44 = mysqli_fetch_array($result44);
      $doctor_main_name = $rows44['fname'].' '.$rows44['lname'];
      $doctor_email = $rows44['email'];

      if ($result12 == 1) {

        /*get patient date*/
        $ref_v_sql22 = "select * from paziente_profile where paziente_id ='" . $patients_idd . "'";
        $ref_v_result22 = mysqli_query($conn, $ref_v_sql22);
        $ref_v_res22 = mysqli_fetch_array($ref_v_result22);

        /*get patient date*/
        $fiscal = $ref_v_res22['fiscale'];
        $date_of_birth = date("d-m-Y", strtotime($ref_v_res22['dob']));
        $address = $ref_v_res22['address'];
        $gmap_addr = $ref_v_res22['gmap_address'];


        $date_text = 'da confermare';
        $add_calender = '';

        if (!empty($patient_apt_date)) {
          $booking_date = strtr($patient_apt_date, '/', '-');
          /*booking start time*/
          $start_date = date('Ymd', strtotime($booking_date));
          $start_time = date('His', strtotime($booking_date));
          /*booking end time*/
          $selectedate = $booking_date;
          $enddate = strtotime("+15 minutes", strtotime($selectedate));
          $booking_end_date = date('Ymd', $enddate);
          $booking_end_time = date('His', $enddate);

          $start_dt = $start_date . 'T' . $start_time;
          $end_dt = $booking_end_date . 'T' . $booking_end_time;

          /*just date format change for date and time*/
          $patient_date = date('d-m-Y', strtotime($booking_date));
          $patient_time = date('H:i', strtotime($booking_date));


          $date_text = $patient_date.' '.$patient_time;

          $calender_link = 'https://calendar.google.com/calendar/u/0/r/eventedit?action=TEMPLATE&text=Mobidoc Visit&dates='.$start_dt.'/'.$end_dt.'&ctz=Europe/Rome';

          $outlook_calender_date = date('Y-m-d', strtotime($booking_date)).'T'.date('H:i:s', strtotime($booking_date));
          $outlook_calender_link = 'https://outlook.live.com/calendar/0/deeplink/compose?startdt='.$outlook_calender_date.'&subject=Mobidoc%20Visit';

          $icalender = $_SERVER['SERVER_NAME'].'/ics_calendar.php?booking_id='.$booking_idd;
          $add_calender = "<br><br>Aggiungi l’evento al tuo: <a target='_blank' style='color: blue; text-decoration: underline' href='$calender_link'>Calendario Google</a> | <a target='_blank' style='color: blue; text-decoration: underline' href='$outlook_calender_link'>Calendario Outlook</a> | <a target='_blank' style='color: blue; text-decoration: underline' href='$icalender'>iCal</a>";

        }

        $dist_price = '';
        if (!empty($discounted_price)){
          $dist_price = '<br>Prezzo scontato: €'.$discounted_price;
        }

      /*
        if (empty($opointment_time)){
          $to3 = $contact_email;
          $subject3 = 'Modifica esame';
          $from3 = 'mobidoc_update@mobidoc.it';
          $rply_email3 = 'noreplay@mobidoc.it';

          // To send HTML mail, the Content-type header must be set
          $headers3  = 'MIME-Version: 1.0' . "\r\n";
          $headers3 .= 'Content-Type: text/html; charset=utf-8' . "\r\n";

          // Create email headers
          $headers3 .= 'From: '.$from3."\r\n". 'Reply-To: '.$rply_email3."\r\n" .   'X-Mailer: PHP/' . phpversion();


          $message31 = '<!DOCTYPE html><html data-wf-page="5dcd852d5095d024f8ea51ae" data-wf-site="5dcd852d5095d04927ea51ad"><head><meta charset="utf-8"><meta content="width=device-width, initial-scale=1" name="viewport"><meta content="Webflow" name="generator"><style>.header{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;width:100%;height:180px;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;-webkit-box-align:center;-webkit-align-items:center;-ms-flex-align:center;align-items:center;background-image:url("https://www.mobidoc.it/images/mailer_header.png");background-position:50% 50%, 50% 0%;background-size:100%,cover;background-repeat:no-repeat,repeat}.text_container{width:80%;min-height:150px;margin-top:70px;margin-right:auto;margin-left:auto}.button{margin:20px 20px 20px 0px;padding:16px 34px;border-radius:50px;background-color:#00285c}.text-block{margin-top:10px;font-size:16px}.text-block.italic{margin-top:28px;font-style:italic;font-weight:300}.body{font-family:Poppins,sans-serif;color:#00285c}.heading{margin-bottom:23px}.name{width:auto}a{text-decoration:none;color:#fff}</style> <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script> <script type="text/javascript">WebFont.load({google:{families:["Poppins:300,regular,italic,600"]}});</script> <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script> </head><body class="body"><div class="header"></div><div class="text_container"><h4 class="heading">Gentile '.$paziente_main_name.',</h4><div class="text-block">Le comunichiamo che la prenotazione da lei effettuata è stata confermata:<br><br>Prestazione prenotata: '.$visit_name.'<br>Professionista: '.$doctor_main_name.'';
          $message31 .="<br>Indirizzo: <a target='_blank' style='color: blue; text-decoration: underline' href='$gmap_addr'>$address</a><br>Data: $patient_date<br>Ora: $patient_time<br><br>Può visualizzare la prestazione collegandosi al suo profilo paziente o cliccando il seguente <a target='_blank' style='color: blue; text-decoration: underline' href='https://mobidoc.it/paziente/account.php'>link</a>.<br><br>Per qualsiasi aggiornamento non esiti a contattarci rispondendo semplicemente a questa email o contattando il professionista mobidoc.<br><br>Cordialmente,<br>La Direzione.</div> <br></div></body></html>";

          mail($to3, $subject3, $message31, $headers3);
        }
      */


        /*get old ref*/
        if ($old_ref == $refertatore_id){
          /*email to patient*/
          $to = $contact_email;
          $subject = 'Modifica esame';
          $from = 'mobidoc_update@mobidoc.it';
          $rply_email = 'noreplay@mobidoc.it';

          // To send HTML mail, the Content-type header must be set
          $headers  = 'MIME-Version: 1.0' . "\r\n";
          $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

          // Create email headers
          $headers .= 'From: '.$from."\r\n". 'Reply-To: '.$rply_email."\r\n" .   'X-Mailer: PHP/' . phpversion();

            // Compose a simple HTML email message
            $message = '<!DOCTYPE html><html data-wf-page="5dcd852d5095d024f8ea51ae" data-wf-site="5dcd852d5095d04927ea51ad"><head><meta charset="utf-8"><meta content="width=device-width, initial-scale=1" name="viewport"><meta content="Webflow" name="generator"><style>.header{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;width:100%;height:180px;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;-webkit-box-align:center;-webkit-align-items:center;-ms-flex-align:center;align-items:center;background-image:url("https://www.mobidoc.it/images/mailer_header.png");background-position:50% 50%, 50% 0%;background-size:100%,cover;background-repeat:no-repeat,repeat}.text_container{width:80%;min-height:150px;margin-top:70px;margin-right:auto;margin-left:auto}.button{margin:20px 20px 20px 0px;padding:16px 34px;border-radius:50px;background-color:#00285c}.text-block{margin-top:10px;font-size:16px}.text-block.italic{margin-top:28px;font-style:italic;font-weight:300}.body{font-family:Poppins,sans-serif;color:#00285c}.heading{margin-bottom:23px}.name{width:auto}a{text-decoration:none;color:#fff}</style> <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script> <script type="text/javascript">WebFont.load({google:{families:["Poppins:300,regular,italic,600"]}});</script> <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script> </head><body class="body"><div class="header"></div><div class="text_container"><h4 class="heading">Gentile ' . $contact_name . ',</h4><div class="text-block">Le comunichiamo che è stato effettuato un aggiornamento alla sua '.$visit_name .' prenotato/i.<br><br>Può visualizzare la modifica collegandosi al suo profilo paziente o cliccando il seguente <a target=\'_blank\' style=\'color: blue; text-decoration: underline\' href=\'https://mobidoc.it/paziente/account.php\'>link</a>.<br><br>Cordialmente,<br>La Direzione.</div></div></body></html>';

            mail($to, $subject, $message, $headers);

          /*email to doctor*/
          $to1 = $doctor_email;

          // Compose a simple HTML email message
          $message1 = '<!DOCTYPE html><html data-wf-page="5dcd852d5095d024f8ea51ae" data-wf-site="5dcd852d5095d04927ea51ad"><head><meta charset="utf-8"><meta content="width=device-width, initial-scale=1" name="viewport"><meta content="Webflow" name="generator"><style>.header{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;width:100%;height:180px;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;-webkit-box-align:center;-webkit-align-items:center;-ms-flex-align:center;align-items:center;background-image:url("https://www.mobidoc.it/images/mailer_header.png");background-position:50% 50%, 50% 0%;background-size:100%,cover;background-repeat:no-repeat,repeat}.text_container{width:80%;min-height:150px;margin-top:70px;margin-right:auto;margin-left:auto}.button{margin:20px 20px 20px 0px;padding:16px 34px;border-radius:50px;background-color:#00285c}.text-block{margin-top:10px;font-size:16px}.text-block.italic{margin-top:28px;font-style:italic;font-weight:300}.body{font-family:Poppins,sans-serif;color:#00285c}.heading{margin-bottom:23px}.name{width:auto}a{text-decoration:none;color:#fff}</style> <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script> <script type="text/javascript">WebFont.load({google:{families:["Poppins:300,regular,italic,600"]}});</script> <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script> </head><body class="body"><div class="header"></div><div class="text_container"><h4 class="heading">Messaggio automatico di modifica prestazione</h4><div class="text-block">Le comunichiamo che l’admin ha modificato la prestazione '.$visit_name.' per il paziente '.$paziente_main_name.'. <br><br>Clicca il seguente link per connetterti alla tua dashboard e visualizzare le modifiche: <a target=\'_blank\' style=\'color: blue; text-decoration: underline\' href=\'https://mobidoc.it/professionisti/account.php\'>https://mobidoc.it/professionisti/account.php</a></div></div></body></html>';

          mail($to1, $subject, $message1, $headers);

        }else {

          /*get old data*/
          $ref_v_sql24 = "select * from doctor_profile where doctor_id ='" . $old_ref . "'";
          $ref_v_result24 = mysqli_query($conn, $ref_v_sql24);
          $ref_v_res24 = mysqli_fetch_array($ref_v_result24);
          $old_ref_name = $ref_v_res24['fname'] . ' ' . $ref_v_res24['lname'];
          $old_ref_email = $ref_v_res24['email'];

          /*email to old refer*/
          $to = $old_ref_email;
          $subject = 'Mobidoc Prestazione Prenotata';
          $from = 'mobidoc_update@mobidoc.it';
          $rply_email = 'noreplay@mobidoc.it';

          // To send HTML mail, the Content-type header must be set
          $headers = 'MIME-Version: 1.0' . "\r\n";
          $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

          // Create email headers
          $headers .= 'From: ' . $from . "\r\n" . 'Reply-To: ' . $rply_email . "\r\n" . 'X-Mailer: PHP/' . phpversion();
          // Compose a simple HTML email message
          $message = '<!DOCTYPE html><html data-wf-page="5dcd852d5095d024f8ea51ae" data-wf-site="5dcd852d5095d04927ea51ad"><head><meta charset="utf-8"><meta content="width=device-width, initial-scale=1" name="viewport"><meta content="Webflow" name="generator"><style>.header{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;width:100%;height:180px;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;-webkit-box-align:center;-webkit-align-items:center;-ms-flex-align:center;align-items:center;background-image:url("https://www.mobidoc.it/images/mailer_header.png");background-position:50% 50%, 50% 0%;background-size:100%,cover;background-repeat:no-repeat,repeat}.text_container{width:80%;min-height:150px;margin-top:70px;margin-right:auto;margin-left:auto}.button{margin:20px 20px 20px 0px;padding:16px 34px;border-radius:50px;background-color:#00285c}.text-block{margin-top:10px;font-size:16px}.text-block.italic{margin-top:28px;font-style:italic;font-weight:300}.body{font-family:Poppins,sans-serif;color:#00285c}.heading{margin-bottom:23px}.name{width:auto}a{text-decoration:none;color:#fff}</style> <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script> <script type="text/javascript">WebFont.load({google:{families:["Poppins:300,regular,italic,600"]}});</script> <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script> </head><body class="body"><div class="header"></div><div class="text_container"><h4 class="heading">Messaggio automatico di modifica prestazione</h4><div class="text-block">Le comunichiamo che l’admin ha modificato la prestazione ' . $visit_name . ' per il paziente ' . $paziente_main_name . ' di cui lei non presenta più come refertatore.<br><br>Clicca il seguente link per connetterti alla tua dashboard e visualizzare le modifiche: <a target=\'_blank\' style=\'color: blue; text-decoration: underline\' href=\'https://mobidoc.it/professionisti/account.php\'>https://mobidoc.it/professionisti/account.php</a></div></div></body></html>';

          mail($to, $subject, $message, $headers);

          /*get ref detail*/
          $ref_v_sql25 = "select * from doctor_profile where doctor_id ='" . $refertatore_id . "'";
          $ref_v_result25 = mysqli_query($conn, $ref_v_sql25);
          $ref_v_res25 = mysqli_fetch_array($ref_v_result25);
          $refer_name1 = $ref_v_res25['fname'].' '.$ref_v_res25['lname'];
          $refer_email1 = $ref_v_res25['email'];


          /*email to new refer*/
          $to1 = $refer_email1;
          // Compose a simple HTML email message
          $message1 = '<!DOCTYPE html><html data-wf-page="5dcd852d5095d024f8ea51ae" data-wf-site="5dcd852d5095d04927ea51ad"><head><meta charset="utf-8"><meta content="width=device-width, initial-scale=1" name="viewport"><meta content="Webflow" name="generator"><style>.header{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;width:100%;height:180px;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;-webkit-box-align:center;-webkit-align-items:center;-ms-flex-align:center;align-items:center;background-image:url("https://www.mobidoc.it/images/mailer_header.png");background-position:50% 50%, 50% 0%;background-size:100%,cover;background-repeat:no-repeat,repeat}.text_container{width:80%;min-height:150px;margin-top:70px;margin-right:auto;margin-left:auto}.button{margin:20px 20px 20px 0px;padding:16px 34px;border-radius:50px;background-color:#00285c}.text-block{margin-top:10px;font-size:16px}.text-block.italic{margin-top:28px;font-style:italic;font-weight:300}.body{font-family:Poppins,sans-serif;color:#00285c}.heading{margin-bottom:23px}.name{width:auto}a{text-decoration:none;color:#fff}</style> <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script> <script type="text/javascript">WebFont.load({google:{families:["Poppins:300,regular,italic,600"]}});</script> <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script> </head><body class="body"><div class="header"></div><div class="text_container"><h4 class="heading">Messaggio automatico di conferma prenotazione</h4><div class="text-block">Le comunichiamo che le è stata assegnata una prenotazione come refertatore:<br><br>Prestazione prenotata:  ' . $visit_name . '<br><br>Nome Paziente: ' . $paziente_main_name . '<br>Codice Fiscale: ' . $fiscal . '<br><br>Data di nascita: ' . $date_of_birth . '<br>Indirizzo: <a target=\'_blank\' style=\'color: blue; text-decoration: underline\' href="'.$gmap_addr.'">' . $address . '</a><br><br>Clicca il seguente link per connetterti alla tua dashboard e visualizzare e/o modificare i dettagli della prenotazione: <a target=\'_blank\' style=\'color: blue; text-decoration: underline\' href=\'https://mobidoc.it/professionisti/account.php\'>https://mobidoc.it/professionisti/account.php</a></div> <br></div></body></html>';

          mail($to1, $subject, $message1, $headers);


          /*email to admin*/
          $to2 = 'info@mobidoc.it';
          // Compose a simple HTML email message
          $message2 = '<!DOCTYPE html><html data-wf-page="5dcd852d5095d024f8ea51ae" data-wf-site="5dcd852d5095d04927ea51ad"><head><meta charset="utf-8"><meta content="width=device-width, initial-scale=1" name="viewport"><meta content="Webflow" name="generator"><style>.header{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;width:100%;height:180px;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;-webkit-box-align:center;-webkit-align-items:center;-ms-flex-align:center;align-items:center;background-image:url("https://www.mobidoc.it/images/mailer_header.png");background-position:50% 50%, 50% 0%;background-size:100%,cover;background-repeat:no-repeat,repeat}.text_container{width:80%;min-height:150px;margin-top:70px;margin-right:auto;margin-left:auto}.button{margin:20px 20px 20px 0px;padding:16px 34px;border-radius:50px;background-color:#00285c}.text-block{margin-top:10px;font-size:16px}.text-block.italic{margin-top:28px;font-style:italic;font-weight:300}.body{font-family:Poppins,sans-serif;color:#00285c}.heading{margin-bottom:23px}.name{width:auto}a{text-decoration:none;color:#fff}</style> <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script> <script type="text/javascript">WebFont.load({google:{families:["Poppins:300,regular,italic,600"]}});</script> <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script> </head><body class="body"><div class="header"></div><div class="text_container"><h4 class="heading">Messaggio di aggiornamento prestazione:</h4><div class="text-block">Prestazione prenotata:  ' . $visit_name . '<br>Esecutore: ' . $doctor_main_name . '';
          $message2 .= "<br>Refertatore: $refer_name1<br><br>Nome Paziente: $paziente_main_name<br>Codice Fiscale: $fiscal<br>Data di nascita: $date_of_birth<br><br>Data e Ora: $date_text<br>Indirizzo: <a target='_blank' style='color: blue; text-decoration: underline' href='$gmap_addr'>$address</a><br><br>Prezzo: €$price$dist_price<br>Metodo di pagamento: $payment_mode$add_calender <br><br>Clicca il seguente link per connetterti all’admin dashboard e visualizzare i dettagli completi della prenotazione: <a target='_blank' style='color: blue; text-decoration: underline' href='https://mobidoc.it/admin/index.php'>https://mobidoc.it/admin/index.php</a></div> <br></div></body></html>";

          mail($to2, $subject, $message2, $headers);

        }

        header("location: /admin/booking.php");
      }else{
        echo "Unable to insert record";
      }


    mysqli_close($conn);

}
?>
