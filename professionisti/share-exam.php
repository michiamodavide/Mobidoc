<?php session_start();
if(isset($_POST['submit']))
{

  include '../connect.php';

  $booking_id = $_POST['book_id'];
  $visit_name = $_POST['vis_name'];
    $visit_attribute = '';
  if ($_POST['vis_attribute']){
      $visit_attribute = ' <strong>('.$_POST['vis_attribute'].')</strong>';
  }
  $doctor_main_name = $_POST['doct_name'];
  $refer_email1 = $_POST['refer_email'];
  $refer_name1 = $_POST['refer_name'];
  $excuter_note = $_POST['ext_not'];
  $refertatore_id = mysqli_real_escape_string($conn, $_POST['refertatore_id']);

  /*get booking data*/
  $sql_booking = "select * from bookings where booking_id ='" . $booking_id . "'";
  $result_booking = mysqli_query($conn, $sql_booking);
  $booking_res = mysqli_fetch_array($result_booking);

  $price = $booking_res['price'];
  $discounted_price = '';
  if (!empty($booking_res['total_discount'])){
      $discounted_price = '<br> Prezzo scontato: €'.$booking_res['total_discount'];
  }

  $payment_mode = $booking_res['payment_mode'];
  $opointment_time = $booking_res['apoint_time'];
  $old_ref = $booking_res['refertatore_id'];
  $patients_idd = $booking_res['patient_id'];

  /*update booking data*/
  $sql = "UPDATE `bookings` SET `refertatore_id` = '$refertatore_id', `executer_note` = '$excuter_note' WHERE `bookings`.`booking_id` = $booking_id or `bookings`.`booking_discount_id` = $booking_id";
  $result = mysqli_query($conn, $sql);

  if($result==1) {


    /*get patient date*/
    $ref_v_sql22 = "select * from paziente_profile where paziente_id ='" . $patients_idd . "'";
    $ref_v_result22 = mysqli_query($conn, $ref_v_sql22);
    $ref_v_res22 = mysqli_fetch_array($ref_v_result22);

    /*get patient date*/
    $paziente_main_name = $ref_v_res22['first_name'].' '.$ref_v_res22['last_name'];
    $fiscal = $ref_v_res22['fiscale'];
    $date_of_birth = date("d-m-Y", strtotime($ref_v_res22['dob']));
    $address = $ref_v_res22['address'];
    $gmap_addr = $ref_v_res22['gmap_address'];


      /*get contact date*/
      $ref_v_sql2210 = "select * from contact_profile where id ='" . $ref_v_res22['contact_id'] . "'";
      $ref_v_result22100 = mysqli_query($conn, $ref_v_sql2210);
      $ref_v_res22100 = mysqli_fetch_array($ref_v_result22100);
      $contact_email = $ref_v_res22100['email'];
      $contact_full_name = $ref_v_res22100['name'].' '. $ref_v_res22100['surname'];


      /*get executor name*/
      $ref_v_sql23 = "select * from doctor_profile where doctor_id ='" . $booking_res['doctor_id'] . "'";
      $ref_v_result23 = mysqli_query($conn, $ref_v_sql23);
      $ref_v_res23 = mysqli_fetch_array($ref_v_result23);
      $excutor_name = $ref_v_res23['fname'].' '.$ref_v_res23['lname'];

    $start_dt = '';
    $end_dt = '';
    $patient_date =  '';
    $patient_time =  '';
    $calender_link = 'javascript:;';
    $outlook_calender_link = 'javascript:;';

    if (!empty($opointment_time)) {
      $booking_date = strtr($opointment_time, '/', '-');
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

    }

    $subject = 'Mobidoc Prestazione Prenotata';
    $from = 'mobidoc_update@mobidoc.it';
    $rply_email = 'noreplay@mobidoc.it';

    // To send HTML mail, the Content-type header must be set
    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

    // Create email headers
    $headers .= 'From: ' . $from . "\r\n" . 'Reply-To: ' . $rply_email . "\r\n" . 'X-Mailer: PHP/' . phpversion();

    if (!empty($old_ref)){
      /*get old data*/
      $ref_v_sql24 = "select * from doctor_profile where doctor_id ='" . $old_ref . "'";
      $ref_v_result24 = mysqli_query($conn, $ref_v_sql24);
      $ref_v_res24 = mysqli_fetch_array($ref_v_result24);
      $old_ref_name = $ref_v_res24['fname'] . ' ' . $ref_v_res24['lname'];
      $old_ref_email = $ref_v_res24['email'];

      /*email to old refer*/
      $to = $old_ref_email;
     // Compose a simple HTML email message
      $message = '<!DOCTYPE html><html data-wf-page="5dcd852d5095d024f8ea51ae" data-wf-site="5dcd852d5095d04927ea51ad"><head><meta charset="utf-8"><meta content="width=device-width, initial-scale=1" name="viewport"><meta content="Webflow" name="generator"><style>.header{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;width:100%;height:180px;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;-webkit-box-align:center;-webkit-align-items:center;-ms-flex-align:center;align-items:center;background-image:url("https://www.mobidoc.it/images/mailer_header.png");background-position:50% 50%, 50% 0%;background-size:100%,cover;background-repeat:no-repeat,repeat}.text_container{width:80%;min-height:150px;margin-top:70px;margin-right:auto;margin-left:auto}.button{margin:20px 20px 20px 0px;padding:16px 34px;border-radius:50px;background-color:#00285c}.text-block{margin-top:10px;font-size:16px}.text-block.italic{margin-top:28px;font-style:italic;font-weight:300}.body{font-family:Poppins,sans-serif;color:#00285c}.heading{margin-bottom:23px}.name{width:auto}a{text-decoration:none;color:#fff}</style> <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script> <script type="text/javascript">WebFont.load({google:{families:["Poppins:300,regular,italic,600"]}});</script> <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script> </head><body class="body"><div class="header"></div><div class="text_container"><h4 class="heading">Messaggio automatico di modifica prestazione</h4><div class="text-block">Le comunichiamo che l’admin ha modificato la prestazione ' . $visit_name.$visit_attribute . ' per il paziente ' . $paziente_main_name . ' di cui lei non presenta più come refertatore.<br><br>Clicca il seguente link per connetterti alla tua dashboard e visualizzare le modifiche: <a target=\'_blank\' style=\'color: blue; text-decoration: underline\' href=\'https://mobidoc.it/professionisti/account.php\'>https://mobidoc.it/professionisti/account.php</a></div></div></body></html>';

      mail($to, $subject, $message, $headers);
    }


    /*email to new refer*/
    $to1 = $refer_email1;
    // Compose a simple HTML email message
    $message1 = '<!DOCTYPE html><html data-wf-page="5dcd852d5095d024f8ea51ae" data-wf-site="5dcd852d5095d04927ea51ad"><head><meta charset="utf-8"><meta content="width=device-width, initial-scale=1" name="viewport"><meta content="Webflow" name="generator"><style>.header{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;width:100%;height:180px;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;-webkit-box-align:center;-webkit-align-items:center;-ms-flex-align:center;align-items:center;background-image:url("https://www.mobidoc.it/images/mailer_header.png");background-position:50% 50%, 50% 0%;background-size:100%,cover;background-repeat:no-repeat,repeat}.text_container{width:80%;min-height:150px;margin-top:70px;margin-right:auto;margin-left:auto}.button{margin:20px 20px 20px 0px;padding:16px 34px;border-radius:50px;background-color:#00285c}.text-block{margin-top:10px;font-size:16px}.text-block.italic{margin-top:28px;font-style:italic;font-weight:300}.body{font-family:Poppins,sans-serif;color:#00285c}.heading{margin-bottom:23px}.name{width:auto}a{text-decoration:none;color:#fff}</style> <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script> <script type="text/javascript">WebFont.load({google:{families:["Poppins:300,regular,italic,600"]}});</script> <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script> </head><body class="body"><div class="header"></div><div class="text_container"><h4 class="heading">Messaggio automatico di conferma prenotazione</h4><div class="text-block">Le comunichiamo che le è stata assegnata una prenotazione come refertatore:<br><br>Prestazione prenotata:  ' . $visit_name.$visit_attribute . '<br><br>Nome Paziente: ' . $paziente_main_name . '<br>Codice Fiscale: ' . $fiscal . '<br><br>Data di nascita: ' . $date_of_birth . '<br>Indirizzo: <a target=\'_blank\' style=\'color: blue; text-decoration: underline\' href="'. $gmap_addr .'">' . $address . '</a><br><br>Commento da Esecutore Mobidoc:<br>'.$excuter_note.'<br><br>Clicca il seguente link per connetterti alla tua dashboard e visualizzare e/o modificare i dettagli della prenotazione: <a target=\'_blank\' style=\'color: blue; text-decoration: underline\' href=\'https://mobidoc.it/professionisti/account.php\'>https://mobidoc.it/professionisti/account.php</a></div> <br></div></body></html>';

    mail($to1, $subject, $message1, $headers);

    /*email to admin*/
    $to2 = 'info@mobidoc.it';
    // Compose a simple HTML email message
    $message2 = '<!DOCTYPE html><html data-wf-page="5dcd852d5095d024f8ea51ae" data-wf-site="5dcd852d5095d04927ea51ad"><head><meta charset="utf-8"><meta content="width=device-width, initial-scale=1" name="viewport"><meta content="Webflow" name="generator"><style>.header{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;width:100%;height:180px;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;-webkit-box-align:center;-webkit-align-items:center;-ms-flex-align:center;align-items:center;background-image:url("https://www.mobidoc.it/images/mailer_header.png");background-position:50% 50%, 50% 0%;background-size:100%,cover;background-repeat:no-repeat,repeat}.text_container{width:80%;min-height:150px;margin-top:70px;margin-right:auto;margin-left:auto}.button{margin:20px 20px 20px 0px;padding:16px 34px;border-radius:50px;background-color:#00285c}.text-block{margin-top:10px;font-size:16px}.text-block.italic{margin-top:28px;font-style:italic;font-weight:300}.body{font-family:Poppins,sans-serif;color:#00285c}.heading{margin-bottom:23px}.name{width:auto}a{text-decoration:none;color:#fff}</style> <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script> <script type="text/javascript">WebFont.load({google:{families:["Poppins:300,regular,italic,600"]}});</script> <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script> </head><body class="body"><div class="header"></div><div class="text_container"><h4 class="heading">Messaggio di aggiornamento prestazione:</h4><div class="text-block">Prestazione prenotata:  ' . $visit_name.$visit_attribute . '<br>Esecutore: ' . $doctor_main_name . '';
    $message2 .= "<br>Refertatore: $refer_name1<br><br>Nome Paziente: $paziente_main_name<br>Codice Fiscale: $fiscal<br>Data di nascita: $date_of_birth<br><br>Data: $patient_date<br>Ora: $patient_time<br>Indirizzo: <a target='_blank' style='color: blue; text-decoration: underline' href='$gmap_addr'>$address</a><br><br>Prezzo: €$price$discounted_price<br>Metodo di pagamento: $payment_mode<br><br>Aggiungi l’evento al tuo: <a target='_blank' style='color: blue; text-decoration: underline' href='$calender_link'>Calendario Google</a> | <a target='_blank' style='color: blue; text-decoration: underline' href='$outlook_calender_link'>Calendario Outlook</a><br><br>Clicca il seguente link per connetterti all’admin dashboard e visualizzare i dettagli completi della prenotazione: <a target='_blank' style='color: blue; text-decoration: underline' href='https://mobidoc.it/admin/index.php'>https://mobidoc.it/admin/index.php</a></div> <br></div></body></html>";

    mail($to2, $subject, $message2, $headers);


//      $to3 = $contact_email;
//      $message31 = '<!DOCTYPE html><html data-wf-page="5dcd852d5095d024f8ea51ae" data-wf-site="5dcd852d5095d04927ea51ad"><head><meta charset="utf-8"><meta content="width=device-width, initial-scale=1" name="viewport"><meta content="Webflow" name="generator"><style>.header{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;width:100%;height:180px;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;-webkit-box-align:center;-webkit-align-items:center;-ms-flex-align:center;align-items:center;background-image:url("https://www.mobidoc.it/images/mailer_header.png");background-position:50% 50%, 50% 0%;background-size:100%,cover;background-repeat:no-repeat,repeat}.text_container{width:80%;min-height:150px;margin-top:70px;margin-right:auto;margin-left:auto}.button{margin:20px 20px 20px 0px;padding:16px 34px;border-radius:50px;background-color:#00285c}.text-block{margin-top:10px;font-size:16px}.text-block.italic{margin-top:28px;font-style:italic;font-weight:300}.body{font-family:Poppins,sans-serif;color:#00285c}.heading{margin-bottom:23px}.name{width:auto}a{text-decoration:none;color:#fff}</style> <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script> <script type="text/javascript">WebFont.load({google:{families:["Poppins:300,regular,italic,600"]}});</script> <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script> </head><body class="body"><div class="header"></div><div class="text_container"><h4 class="heading">Gentile '.$contact_full_name.',</h4><div class="text-block">Ti informiamo che la tua prenotazione è stata modificata:<br><br>Prestazione prenotata: '.$visit_name.$visit_attribute.'<br>Professionista: '.$excutor_name.'';
//      $message31 .="<br>Indirizzo: <a target='_blank' style='color: blue; text-decoration: underline' href='$gmap_addr'>$address</a><br>Data: $patient_date<br>Ora: $patient_time<br><br>Può visualizzare la prestazione collegandosi al suo profilo contatto o cliccando il seguente <a target='_blank' style='color: blue; text-decoration: underline' href='https://mobidoc.it/paziente/account.php'>link</a>.<br><br>Per qualsiasi aggiornamento non esiti a contattarci rispondendo semplicemente a questa email o contattando il professionista mobidoc.<br><br>Cordialmente,<br>La Direzione.</div> <br></div></body></html>";
//
//
//      mail($to3, $subject, $message31, $headers);

//    $to = $refer_email;
//    $subject = 'Condividi nuovo esame';
//    $from = 'mobidoc_update@mobidoc.it';
//    $rply_email = 'noreplay@mobidoc.it';
//
//    // To send HTML mail, the Content-type header must be set
//    $headers  = 'MIME-Version: 1.0' . "\r\n";
//    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
//
//    // Create email headers
//    $headers .= 'From: '.$from."\r\n". 'Reply-To: '.$rply_email."\r\n" .   'X-Mailer: PHP/' . phpversion();
//
//    // Compose a simple HTML email message
//    $message = '<!DOCTYPE html><html data-wf-page="5dcd852d5095d024f8ea51ae" data-wf-site="5dcd852d5095d04927ea51ad"><head><meta charset="utf-8"><meta content="width=device-width, initial-scale=1" name="viewport"><meta content="Webflow" name="generator"><style>.header{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;width:100%;height:180px;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;-webkit-box-align:center;-webkit-align-items:center;-ms-flex-align:center;align-items:center;background-image:url("https://www.mobidoc.it/images/mailer_header.png");background-position:50% 50%, 50% 0%;background-size:100%,cover;background-repeat:no-repeat,repeat}.text_container{width:80%;min-height:150px;margin-top:70px;margin-right:auto;margin-left:auto}.button{margin:20px 20px 20px 0px;padding:16px 34px;border-radius:50px;background-color:#00285c}.text-block{margin-top:10px;font-size:16px}.text-block.italic{margin-top:28px;font-style:italic;font-weight:300}.body{font-family:Poppins,sans-serif;color:#00285c}.heading{margin-bottom:23px}.name{width:auto}a{text-decoration:none;color:#fff}</style> <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script> <script type="text/javascript">WebFont.load({google:{families:["Poppins:300,regular,italic,600"]}});</script> <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script> </head><body class="body"><div class="header"></div><div class="text_container"><h4 class="heading">Gentile '.$excuter_name.',</h4><div class="text-block">Il professionista '.$doct_name.' ha condiviso la prestazione '.$vis_name.' con te. <br><br>Ecco i dettagli per lesame:<br>'.$excuter_note.'. </div> <br> <br><a href="https://mobidoc.it/professionisti/account.php" class="button" style="margin-top:100px;">Clicca qui per accedere al tuo profilo e visualizzare i dettagli.</a></div></body></html>';
//
//    mail($to, $subject, $message, $headers);


//    echo "<script>alert('Lesame è stato condiviso con successo.');</script>";
    echo "<script>window.location = 'account.php'</script>";
  }
  else{
    echo "Your Record not Updated";
  }
  mysqli_close($conn);
}

?>