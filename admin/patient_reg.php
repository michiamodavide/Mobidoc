<?php
include '../connect.php';

if(isset($_POST['submit'])){

 /*
  $form_data_array = array('fiscal_code','email','call_first_name','call_last_name','tele','first_name','last_name', 'dob','address','admin_note','vist_name','doc_id');
  $verified = 1;
  foreach($form_data_array as $form_data) {
    if(!isset($_POST[$form_data]) || empty($_POST[$form_data])) {
      $verified = 0;
    }
  }
 */
    /*contact information*/
    $caller_fname = $_POST['call_first_name'];
    $caller_lname = $_POST['call_last_name'];
    $contact_email = $_POST['email'];
    $email = mysqli_real_escape_string($conn, $contact_email);
    $tel = mysqli_real_escape_string($conn, $_POST['tele']);
    function token($len, $set = "") {
    $gen = "";
    for($i=0;$i<$len;$i++) {
      $set = str_shuffle($set);
      $gen .= $set[0];
    }
    return $gen;
   }

   $passwd = strtolower($_POST['call_first_name']).token(3,'0123456789');
  //  $passwd = strtolower($_POST['call_first_name'].'123');
   $pwrd = password_hash($passwd, PASSWORD_DEFAULT);

   /*end contact information*/

    $date_of_birth = mysqli_real_escape_string($conn, $_POST['dob']);
    $dob=strtotime($date_of_birth);
    $dob = date('Y/m/d', $dob);
    $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
    $select_address = $_POST['address'];
    $address = mysqli_real_escape_string($conn, $select_address);
    $gmap_addr = $_POST['gmap_addr'];
    $gmap_address = mysqli_real_escape_string($conn, $gmap_addr);
    $fiscal = mysqli_real_escape_string($conn, $_POST['fiscal_code']);
    $admin_note = mysqli_real_escape_string($conn, $_POST['admin_note']);
    $check = mysqli_real_escape_string($conn, $_POST['privacy_check']);

    $latitude = '0.000000';
    $longtitude = '0.000000';
    if ($_POST['lat_log']){
      $lat_lang = explode(",",$_POST['lat_log']);
      $latitude = $lat_lang[0];
      $longtitude = $lat_lang[1];
    }


    $profile_img = '../images/Group-556.jpg';
    $cap = 1;


   date_default_timezone_set("Europe/Rome");
   $dor = date("Y/m/d H:i:s");

  $sql_fisical = "select * from paziente_profile where fiscale ='".$fiscal."'";
  $result_fisical = mysqli_query($conn, $sql_fisical);
  if (mysqli_num_rows($result_fisical) > 0) {
    $sql = "UPDATE `paziente_profile` SET `first_name` = '$first_name', `last_name` = '$last_name', `dob` = '$dob',`address` = '$address',`latitude` = '$latitude', `longitude` = '$longtitude',  `gmap_address` = '$gmap_address', `privacy_consent` = '$check', `lastDatePrivacyConsent` = '$dor', `dor` = '$dor' WHERE `fiscale` = '$fiscal'";
    $result = mysqli_query($conn, $sql);
    if ($result == 1){
      $result_patient_new = mysqli_fetch_array($result_fisical);
      $contact_id = $result_patient_new['contact_id'];
      $sql1_nnn = "UPDATE `contact_profile` SET `email` = '$email', `name` = '$caller_fname', `surname` = '$caller_lname',`phone` = '$tel',`privacy_consent` = '$check', `lastDatePrivacyConsent` = '$dor' WHERE `id` = '$contact_id'";
      $result_nnn = mysqli_query($conn, $sql1_nnn);
      if ($result_nnn){
//        not show anything
      }else{
        echo 'record2 not added';
      }
    }else{
      echo 'record1 not added';
    }
  }else{

      $sql_email = "select * from contact_profile where email ='".$email."'";
  $result_email = mysqli_query($conn, $sql_email);
  if (mysqli_num_rows($result_email) > 0) {
    header("location: /admin/patient-register.php?err=1");
  }else{
    $sql_n12 = "insert into contact_profile (email, password, phone, name, surname,privacy_consent, lastDatePrivacyConsent) values('".$email."', '".$pwrd."', '".$tel."', '".$caller_fname."', '".$caller_lname."',  '".$check."',  '".$dor."')";
    $result_n12 = mysqli_query($conn, $sql_n12);
    if ($result_n12 == 1){
      $contact_id = mysqli_insert_id($conn);
      $sql = "insert into paziente_profile (contact_id, first_name, last_name, dob, fiscale,address, latitude, longitude, gmap_address, privacy_consent, lastDatePrivacyConsent, dor) values('".$contact_id."', '".ucwords($first_name)."', '".ucwords($last_name)."', '".$dob."', '".$fiscal."', '".$address."',  '".$latitude."',  '".$longtitude."', '".$gmap_address."','".$check."','".$dor."','".$dor."')";
      $result = mysqli_query($conn, $sql);
    }else{
      echo 'record3 not added';
    }
  }

  }

    if ($result == 1) {

      /*delete temporary patients*/
      if (isset($_POST['patient_temp_id'])) {
        $tem_patient_id = $_POST['patient_temp_id'];
        $sql333 = "DELETE FROM temprary_patient where patient_id = '".$tem_patient_id."'";
        $result333 = mysqli_query($conn, $sql333);
      }

      $paziente_name = "select * from paziente_profile where fiscale='" . $fiscal . "'";
      $paziente_name_result = mysqli_query($conn, $paziente_name);
      $paziente_rows = mysqli_fetch_array($paziente_name_result);
      $first_name = $paziente_rows['first_name'];
      $last_name = $paziente_rows['last_name'];
      $paziente_main_name = $first_name . ' ' . $last_name;

      $patient_id = mysqli_real_escape_string($conn, $paziente_rows['paziente_id']);
      $article_id = mysqli_real_escape_string($conn, $_POST['vist_name']);
      $get_visit_query = "select descrizione from articlesmobidoc where id='" . $article_id . "'";
      $get_visit_result = mysqli_query($conn, $get_visit_query);
      $get_visit_row = mysqli_fetch_array($get_visit_result);

      $visit_name = $get_visit_row['descrizione'];

      $payment_mode = mysqli_real_escape_string($conn, $_POST['payment_mode']);
      $booking_status = 0;
      $doctor_booking_status = 0;
      $patient_confirmation = 0;
      $pateint_remove_from_list = 0;
      $patient_apt_date = $_POST['appoint_time'];
      $appoint_time = mysqli_real_escape_string($conn, date("Y/m/d H:i:s", strtotime($patient_apt_date)));

      $ref_id  = $_POST['refertatore_id'];
      $refertatore_id = mysqli_real_escape_string($conn, $ref_id);
      /*get refertatore detail*/
      $sql50 = "select * from doctor_profile where doctor_id ='".$ref_id."'";
      $result50 = mysqli_query($conn, $sql50);
      $rows50 = mysqli_fetch_array($result50);
      $refertatore_name = $rows50['fname'].' '.$rows50['lname'];
      $refertatore_email = $rows50['email'];

      date_default_timezone_set("Europe/Rome");
      $date_of_booking = date("Y/m/d H:i:s");

      $doc_details_array = array();
      $doc_ids_array = $_POST['doc_id'];
      for ($i = 0; $i < count($doc_ids_array); $i++)  {
        $doctor_id = mysqli_real_escape_string($conn, $doc_ids_array[$i]);
        /*get doctor email*/
        $sql44 = "select * from doctor_profile where doctor_id ='".$doctor_id."'";
        $result44 = mysqli_query($conn, $sql44);
        $rows44 = mysqli_fetch_array($result44);
        $doctor_main_name = $rows44['fname'].' '.$rows44['lname'];
        $doctor_email = $rows44['email'];
        array_push($doc_details_array, $rows44);
        /*get visit price*/
        $sql45 = "select visit_home_price from listini where article_mobidoc_id ='".$article_id."' AND doctor_id ='".$doctor_id."'";
        $result45 = mysqli_query($conn, $sql45);
        $rows45 = mysqli_fetch_array($result45);
        $price = mysqli_real_escape_string($conn, $rows45['visit_home_price']);

        $admin_book = 1;
        if (count($doc_ids_array) == 1)
          $admin_book = 2;

        $referr_id = '0';
        if (!empty($refertatore_id)) {
          $referr_id = $refertatore_id;
        }

        $sql_booking = "insert into bookings (patient_id, doctor_id, refertatore_id, price, message, payment_mode, booking_status, doctor_booking_status, patient_confirmation, pateint_remove_from_list, date_of_booking, apoint_time, admin_book, gmap_coordinates, latitude, longitude) values('".$patient_id."', '".$doctor_id."', '".$referr_id."', '".$price."', '".$admin_note."', '".$payment_mode."', '".$booking_status."', '".$doctor_booking_status."', '".$patient_confirmation."', '".$pateint_remove_from_list."', '".$date_of_booking."', '".$appoint_time."', '".$admin_book."','".$gmap_address."', '".$latitude."', '".$longtitude."')";

        echo $sql_booking;
        exit();

        $result_booking = mysqli_query($conn, $sql_booking);

        if ($result_booking == 1) {

          $last_booking_id = mysqli_insert_id($conn);
          $sql_new135 = "insert into booked_service (booking_id, article_id, price) values('".$last_booking_id."', '".$article_id."', '".$price."')";
          $result_new135 = mysqli_query($conn, $sql_new135);

          if ($result_new135 ==1){
            //email to doctor
            $to2 = $doctor_email; //doctor email
            $subject2 = 'Mobidoc Prestazione Prenotata';
            $from = 'mobidoc_update@mobidoc.it';
            $rply_email = 'noreplay@mobidoc.it';

            // To send HTML mail, the Content-type header must be set
            $headers2  = 'MIME-Version: 1.0' . "\r\n";
            $headers2 .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

            // Create email headers
            $headers2 .= 'From: '.$from."\r\n". 'Reply-To: '.$rply_email."\r\n" .   'X-Mailer: PHP/' . phpversion();

            // Compose a simple HTML email message
            $message2 = '<!DOCTYPE html><html data-wf-page="5dcd852d5095d024f8ea51ae" data-wf-site="5dcd852d5095d04927ea51ad"><head><meta charset="utf-8"><meta content="width=device-width, initial-scale=1" name="viewport"><meta content="Webflow" name="generator"><style>.header{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;width:100%;height:180px;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;-webkit-box-align:center;-webkit-align-items:center;-ms-flex-align:center;align-items:center;background-image:url("https://www.mobidoc.it/images/mailer_header.png");background-position:50% 50%, 50% 0%;background-size:100%,cover;background-repeat:no-repeat,repeat}.text_container{width:80%;min-height:150px;margin-top:70px;margin-right:auto;margin-left:auto}.button{margin:20px 20px 20px 0px;padding:16px 34px;border-radius:50px;background-color:#00285c}.text-block{margin-top:10px;font-size:16px}.text-block.italic{margin-top:28px;font-style:italic;font-weight:300}.body{font-family:Poppins,sans-serif;color:#00285c}.heading{margin-bottom:23px}.name{width:auto}a{text-decoration:none;color:#fff}</style> <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script> <script type="text/javascript">WebFont.load({google:{families:["Poppins:300,regular,italic,600"]}});</script> <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script> </head><body class="body"><div class="header"></div><div class="text_container"><h4 class="heading">Messaggio automatico di conferma prenotazione</h4><div class="text-block">Le comunichiamo che le è stata assegnata una prenotazione:<br><br>Prestazione prenotata:  '.$visit_name.'<br><br>Nome Paziente: '.$paziente_main_name.'<br>Codice Fiscale: '.$fiscal.'<br><br>Data di nascita: '.$date_of_birth.'<br>Indirizzo: <a target=\'_blank\' style=\'color: blue; text-decoration: underline\' href="'.$gmap_addr.'">'.$address.'</a><br><br>Clicca il seguente link per connetterti alla tua dashboard e visualizzare e/o modificare i dettagli della prenotazione: <a target=\'_blank\' style=\'color: blue; text-decoration: underline\' href=\'https://mobidoc.it/professionisti/account.php\'>https://mobidoc.it/professionisti/account.php</a></div> <br></div></body></html>';

            mail($to2, $subject2, $message2, $headers2);

          }else{
            echo "Unable to insert record";
            mysqli_close($conn);
          }
          }else{
            echo 'booked service record not added';
          }

      }

      if ($result_booking == 1) {

        $start_dt = '';
        $end_dt = '';
        $patient_date =  '';
        $patient_time =  '';
        $calender_link = 'javascript:;';

        if (!empty($patient_apt_date)){
          $booking_date = strtr($patient_apt_date, '/', '-');
          /*booking start time*/
          $start_date =  date('Ymd', strtotime($booking_date));
          $start_time =  date('His', strtotime($booking_date));
          /*booking end time*/
          $selectedate = $booking_date;
          $enddate = strtotime("+15 minutes", strtotime($selectedate));
          $booking_end_date =  date('Ymd', $enddate);
          $booking_end_time =  date('His', $enddate);

          $start_dt = $start_date.'T'.$start_time;
          $end_dt = $booking_end_date.'T'.$booking_end_time;

          /*just date format change for date and time*/
          $patient_date =  date('d-m-Y', strtotime($booking_date));
          $patient_time =  date('H:i', strtotime($booking_date));

          $calender_link = 'https://calendar.google.com/calendar/u/0/r/eventedit?action=TEMPLATE&text=Mobidoc Visit&dates='.$start_dt.'/'.$end_dt.'&ctz=Europe/Rome';
        }

        //email to admin
        $to = 'info@mobidoc.it';
        $subject = 'Nuova Prenotazione!';
        $from = 'mobidoc_update@mobidoc.it';
        $rply_email = 'noreplay@mobidoc.it';

        // To send HTML mail, the Content-type header must be set
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

        // Create email headers
        $headers .= 'From: '.$from."\r\n". 'Reply-To: '.$rply_email."\r\n" .   'X-Mailer: PHP/' . phpversion();

        // Compose a simple HTML email message
        $message = '<!DOCTYPE html><html data-wf-page="5dcd852d5095d024f8ea51ae" data-wf-site="5dcd852d5095d04927ea51ad"><head><meta charset="utf-8"><meta content="width=device-width, initial-scale=1" name="viewport"><meta content="Webflow" name="generator"><style>.header{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;width:100%;height:180px;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;-webkit-box-align:center;-webkit-align-items:center;-ms-flex-align:center;align-items:center;background-image:url("https://www.mobidoc.it/images/mailer_header.png");background-position:50% 50%, 50% 0%;background-size:100%,cover;background-repeat:no-repeat,repeat}.text_container{width:80%;min-height:150px;margin-top:70px;margin-right:auto;margin-left:auto}.button{margin:20px 20px 20px 0px;padding:16px 34px;border-radius:50px;background-color:#00285c}.text-block{margin-top:10px;font-size:16px}.text-block.italic{margin-top:28px;font-style:italic;font-weight:300}.body{font-family:Poppins,sans-serif;color:#00285c}.heading{margin-bottom:23px}.name{width:auto}a{text-decoration:none;color:#fff}</style> <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script> <script type="text/javascript">WebFont.load({google:{families:["Poppins:300,regular,italic,600"]}});</script> <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script> </head><body class="body"><div class="header"></div><div class="text_container"><h4 class="heading">Messaggio di riepilogo prenotazione telefonica</h4><div class="text-block">Prestazione prenotata:  '.$visit_name.'<br>Esecutore: ';
        foreach($doc_details_array as $doc_detail) {
          $comma_w = '';
          if (count($doc_details_array) > 1){
            $comma_w = ',';
          }
          $message .="
      " . $doc_detail['fname'].' '.$doc_detail['lname'].$comma_w."
     ";
        }
        $message .= "<br>Refertatore: $refertatore_name<br><br>Nome Paziente: $paziente_main_name<br>Codice Fiscale: $fiscal.<br>Data di nascita: $date_of_birth<br><br>Data: $patient_date<br>Ora: $patient_time<br>Indirizzo: <a target='_blank' style='color: blue; text-decoration: underline' href='$gmap_addr'>$address</a><br><br>Prezzo: €$price<br>Metodo di pagamento: $payment_mode<br><br><a target='_blank' style='color: blue; text-decoration: underline' href='$calender_link'>Aggiungi l’evento al tuo calendario google: </a><br><br>Clicca il seguente link per connetterti all’admin dashboard e visualizzare i dettagli completi della prenotazione: <a target='_blank' style='color: blue; text-decoration: underline' href='https://mobidoc.it/admin/index.php'>https://mobidoc.it/admin/index.php</a></div> <br></div></body></html>";

        mail($to, $subject, $message, $headers);

        //email to patient
        $to3 = $contact_email; //patient email
        $subject3 = 'Mobidoc Prestazione Prenotata';
        $from3 = 'mobidoc_update@mobidoc.it';

        // To send HTML mail, the Content-type header must be set
        $headers3  = 'MIME-Version: 1.0' . "\r\n";
        $headers3 .= 'Content-Type: text/html; charset=utf-8' . "\r\n";

        // Create email headers
        $headers3 .= 'From: '.$from3."\r\n". 'Reply-To: '.$rply_email."\r\n" .   'X-Mailer: PHP/' . phpversion();


        if(!isset($_POST['patients_id'])){
          $message3 = '<!DOCTYPE html><html data-wf-page="5dcd852d5095d024f8ea51ae" data-wf-site="5dcd852d5095d04927ea51ad"><head><meta charset="utf-8"><meta content="width=device-width, initial-scale=1" name="viewport"><meta content="Webflow" name="generator"><style>.header{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;width:100%;height:180px;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;-webkit-box-align:center;-webkit-align-items:center;-ms-flex-align:center;align-items:center;background-image:url("https://www.mobidoc.it/images/mailer_header_paziente.jpg");background-position:50% 50%, 50% 0%;background-size:100%,cover;background-repeat:no-repeat,repeat}.text_container{width:80%;min-height:150px;margin-top:70px;margin-right:auto;margin-left:auto}.button{margin:20px 20px 20px 0px;padding:16px 34px;border-radius:50px;background-color:#00285c}.text-block{margin-top:10px;font-size:16px}.text-block.italic{margin-top:28px;font-style:italic;font-weight:300}.body{font-family:Poppins,sans-serif;color:#00285c}.heading{margin-bottom:23px}.name{width:auto}a{text-decoration:none;color:#fff}</style> <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script> <script type="text/javascript">WebFont.load({google:{families:["Poppins:300,regular,italic,600"]}});</script> <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script> </head><body class="body"><div class="header"></div><div class="text_container"><h4 class="heading">Grazie per aver scelto Mobidoc!</h4><div class="text-block">Questa è la tua password generata dall amministratore <strong>'.$passwd.'</strong> contro la tua email <strong>'.$contact_email.'</strong>. <br><br>';
          $message3 .= "<a target='_blank' style='color: blue; text-decoration: underline' href='https://mobidoc.it/informativaprivacy.html'>Clicca qui</a> per leggere la nostra informativa sulla privacy.<br> <br>
 Questa email è stata generata da un sistema automatico, si prega di non rispondere.<br><br> Cordiali Saluti,<br> La Direzione Mobidoc</div> <br></div></body></html>";
          mail($to3, $subject3, $message3, $headers3);
        }

        if (!empty($patient_apt_date)) {
        /*Second email to patient*/

        $message31 = '<!DOCTYPE html><html data-wf-page="5dcd852d5095d024f8ea51ae" data-wf-site="5dcd852d5095d04927ea51ad"><head><meta charset="utf-8"><meta content="width=device-width, initial-scale=1" name="viewport"><meta content="Webflow" name="generator"><style>.header{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;width:100%;height:180px;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;-webkit-box-align:center;-webkit-align-items:center;-ms-flex-align:center;align-items:center;background-image:url("https://www.mobidoc.it/images/mailer_header.png");background-position:50% 50%, 50% 0%;background-size:100%,cover;background-repeat:no-repeat,repeat}.text_container{width:80%;min-height:150px;margin-top:70px;margin-right:auto;margin-left:auto}.button{margin:20px 20px 20px 0px;padding:16px 34px;border-radius:50px;background-color:#00285c}.text-block{margin-top:10px;font-size:16px}.text-block.italic{margin-top:28px;font-style:italic;font-weight:300}.body{font-family:Poppins,sans-serif;color:#00285c}.heading{margin-bottom:23px}.name{width:auto}a{text-decoration:none;color:#fff}</style> <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script> <script type="text/javascript">WebFont.load({google:{families:["Poppins:300,regular,italic,600"]}});</script> <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script> </head><body class="body"><div class="header"></div><div class="text_container"><h4 class="heading">Gentile '.$paziente_main_name.',</h4><div class="text-block">Le comunichiamo che la prenotazione da lei effettuata è stata confermata:<br><br>Prestazione prenotata: '.$visit_name.'<br>Professionista: ';
        foreach($doc_details_array as $doc_detail) {
          $comma_w = '';
          if (count($doc_details_array) > 1){
            $comma_w = ',';
          }
          $message31 .="
      " . $doc_detail['fname'].' '.$doc_detail['lname'].$comma_w."
     ";
        }
        $message31 .="<br>Indirizzo: <a target='_blank' style='color: blue; text-decoration: underline' href='$gmap_addr'>$address</a><br>Data: $patient_date<br>Ora: $patient_time<br><br>Può visualizzare la prestazione collegandosi al suo profilo paziente o cliccando il seguente <a target='_blank' style='color: blue; text-decoration: underline' href='https://mobidoc.it/paziente/account.php'>link</a><br><br>Per qualsiasi aggiornamento non esiti a contattarci rispondendo semplicemente a questa email o contattando il professionista mobidoc.<br><br>Cordialmente,<br>La Direzione.</div> <br></div></body></html>";

        mail($to3, $subject3, $message31, $headers3);
      }

        //email to refertatore
        $to4 = $refertatore_email;
        $subject4 = 'Mobidoc Prestazione Prenotata';
        $from4 = 'mobidoc_update@mobidoc.it';
        $rply_email4 = 'noreplay@mobidoc.it';

        // To send HTML mail, the Content-type header must be set
        $headers4  = 'MIME-Version: 1.0' . "\r\n";
        $headers4 .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

        // Create email headers
        $headers4 .= 'From: '.$from4."\r\n". 'Reply-To: '.$rply_email4."\r\n" .   'X-Mailer: PHP/' . phpversion();

        // Compose a simple HTML email message
        $message4 = '<!DOCTYPE html><html data-wf-page="5dcd852d5095d024f8ea51ae" data-wf-site="5dcd852d5095d04927ea51ad"><head><meta charset="utf-8"><meta content="width=device-width, initial-scale=1" name="viewport"><meta content="Webflow" name="generator"><style>.header{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;width:100%;height:180px;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;-webkit-box-align:center;-webkit-align-items:center;-ms-flex-align:center;align-items:center;background-image:url("https://www.mobidoc.it/images/mailer_header.png");background-position:50% 50%, 50% 0%;background-size:100%,cover;background-repeat:no-repeat,repeat}.text_container{width:80%;min-height:150px;margin-top:70px;margin-right:auto;margin-left:auto}.button{margin:20px 20px 20px 0px;padding:16px 34px;border-radius:50px;background-color:#00285c}.text-block{margin-top:10px;font-size:16px}.text-block.italic{margin-top:28px;font-style:italic;font-weight:300}.body{font-family:Poppins,sans-serif;color:#00285c}.heading{margin-bottom:23px}.name{width:auto}a{text-decoration:none;color:#fff}</style> <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script> <script type="text/javascript">WebFont.load({google:{families:["Poppins:300,regular,italic,600"]}});</script> <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script> </head><body class="body"><div class="header"></div><div class="text_container"><h4 class="heading">Messaggio automatico di conferma prenotazione</h4><div class="text-block">Le comunichiamo che le è stata assegnata una prenotazione:<br><br>Prestazione prenotata:  '.$visit_name.'<br><br>Nome Paziente: '.$paziente_main_name.'<br>Codice Fiscale: '.$fiscal.'<br><br>Data di nascita: '.$date_of_birth.'<br>Indirizzo: <a target=\'_blank\' style=\'color: blue; text-decoration: underline\' href="'.$gmap_addr.'">'.$address.'</a><br><br>Clicca il seguente link per connetterti alla tua dashboard e visualizzare e/o modificare i dettagli della prenotazione: <a target=\'_blank\' style=\'color: blue; text-decoration: underline\' href=\'https://mobidoc.it/professionisti/account.php\'>https://mobidoc.it/professionisti/account.php</a></div> <br></div></body></html>';

        mail($to4, $subject4, $message4, $headers4);

        header("location: /paziente/booking-completed.php");

      }else{
        echo "Unable to insert record1";
        mysqli_close($conn);
      }
    } else {
      header("location: /admin/patient-register.php?err=1");
      echo "Unable to insert record2";
      mysqli_close($conn);
    }

    mysqli_close($conn);

}else{

  $fiscal = mysqli_real_escape_string($conn, $_POST['fiscal_code']);

  $sql_temp = "select * from temprary_patient where fiscale ='".$fiscal."'";
  $result_temp = mysqli_query($conn, $sql_temp);
  $fesic_code = 0;
  if (mysqli_num_rows($result_temp) > 0) {
   $fesic_code = 1;
  }

    $caller_fname = $_POST['call_first_name'] . ' ' . $_POST['call_last_name'];
    $caller_name = mysqli_real_escape_string($conn, $caller_fname);
    $paziente_email = $_POST['email'];
    $email = mysqli_real_escape_string($conn, $paziente_email);
    $tel = mysqli_real_escape_string($conn, $_POST['tele']);
    $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
    $date_of_birth = $_POST['dob'];
    $dob = $date_of_birth;
    $admin_note = mysqli_real_escape_string($conn, $_POST['admin_note']);
    $select_address = $_POST['address'];
    $address = mysqli_real_escape_string($conn, $select_address);
    $gmap_addr = $_POST['gmap_addr'];
    $gmap_address = mysqli_real_escape_string($conn, $gmap_addr);
    $visit_name = mysqli_real_escape_string($conn, $_POST['vist_name']);
    $payment_mode = mysqli_real_escape_string($conn, $_POST['payment_mode']);
    $patient_apt_date = $_POST['appoint_time'];
     $appoint_time = mysqli_real_escape_string($conn, $patient_apt_date);

     $referr_id = $_POST['refertatore_id'];
     $lat_log = $_POST['lat_log'];

    $refertatore_id = '0';
     if (!empty($referr_id)) {
    $refertatore_id = $referr_id;
     }

    $doc_ids_array = '0';
    if (!empty($_POST['doc_id'])) {
      $doc_ids_array = json_encode($_POST['doc_id']);
    }

    date_default_timezone_set("Europe/Rome");
    $dor = date("Y/m/d H:i:s");

    if ($fesic_code == 1 && !empty($fiscal) || isset($_POST['patient_temp_id'])) {
      if ($fesic_code == 1){
        $sql = "update temprary_patient set first_name = '" . $first_name . "', last_name = '" . $last_name . "', last_name = '" . $last_name . "', caller_name = '" . $caller_fname . "', fiscale = '" . $fiscal . "', phone = '" . $tel . "', admin_note = '" . $admin_note . "', dor = '" . $dor . "', dob = '" . $dob . "', email = '" . $email . "', address = '" . $address . "', gmap_address = '" . $gmap_address . "', visit_name = '" . $visit_name . "', appoint_time = '" . $appoint_time . "', payment_mode = '" . $payment_mode . "', excutor_ids = '" . $doc_ids_array . "', refertatore_id = '" . $refertatore_id . "', lat_log = '" . $lat_log . "' where  fiscale='" . $fiscal . "'";
      }else{
        $sql = "update temprary_patient set first_name = '" . $first_name . "', last_name = '" . $last_name . "', last_name = '" . $last_name . "', caller_name = '" . $caller_fname . "', fiscale = '" . $fiscal . "', phone = '" . $tel . "', admin_note = '" . $admin_note . "', dor = '" . $dor . "', dob = '" . $dob . "', email = '" . $email . "', address = '" . $address . "', gmap_address = '" . $gmap_address . "', visit_name = '" . $visit_name . "', appoint_time = '" . $appoint_time . "', payment_mode = '" . $payment_mode . "', excutor_ids = '" . $doc_ids_array . "', refertatore_id = '" . $refertatore_id . "', lat_log = '" . $lat_log . "' where  patient_id='" . $_POST['patient_temp_id'] . "'";
      }
    } else {
      $sql = "insert into temprary_patient (first_name, last_name, caller_name, dob, fiscale, address, email, phone, admin_note, gmap_address, lat_log, dor, visit_name, excutor_ids, refertatore_id, appoint_time, payment_mode) values('".ucwords($first_name)."', '".ucwords($last_name)."','".$caller_name."', '".$dob."', '".$fiscal."', '".$address."', '".$email."','".$tel."', '".$admin_note."', '".$gmap_address."', '".$lat_log."', '".$dor."','".$visit_name."','".$doc_ids_array."', '".$refertatore_id."', '".$appoint_time."','".$payment_mode."')";
    }

    $result = mysqli_query($conn, $sql);
    if ($result == 1) {
      header("location: /paziente/non-complete-profile.php");
    } else {
      echo 'There is some error in Database Connection';
    }


  mysqli_close($conn);
}
?>
