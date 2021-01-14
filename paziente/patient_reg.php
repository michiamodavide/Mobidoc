<?php
include '../connect.php';

if(isset($_POST['submit'])){

  $form_data_array = array('fiscal_code','email','call_first_name','call_last_name','tele','first_name','last_name', 'dob','address','admin_note','vist_name','doc_id');
  $verified = 1;
  foreach($form_data_array as $form_data) {
    if(!isset($_POST[$form_data]) || empty($_POST[$form_data])) {
      $verified = 0;
    }
  }
  if ($verified == 1){
    $caller_fname = $_POST['call_first_name'].' '.$_POST['call_last_name'];
    $caller_name = mysqli_real_escape_string($conn, $caller_fname);
    $paziente_email = $_POST['email'];
    $dob = mysqli_real_escape_string($conn, $_POST['dob']);
    $dob=strtotime($dob);
    $dob = date('Y/m/d', $dob);
    //$email = mysqli_real_escape_string($conn, $paziente_email);
    $email = $paziente_email;
    $tel = mysqli_real_escape_string($conn, $_POST['tele']);
    $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
    $select_address = $_POST['address'];
    $address = mysqli_real_escape_string($conn, $select_address);
    $gmap_addr = $_POST['gmap_addr'];
    $gmap_address = mysqli_real_escape_string($conn, $gmap_addr);
    $fiscal = mysqli_real_escape_string($conn, $_POST['fiscal_code']);
    $admin_note = mysqli_real_escape_string($conn, $_POST['admin_note']);
    $check = mysqli_real_escape_string($conn, $_POST['privacy_check']);
    $profile_img = '../images/Group-556.jpg';
    $cap = 1;

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

    date_default_timezone_set("Europe/Rome");
    $dor = date("d/m/Y");

  if(isset($_POST['patients_id'])){
    $patients_idd = $_POST['patients_id'];
    $sql = "UPDATE `paziente_profile` SET `via` = '$address', `admin_note` = '$admin_note', `gmap_address` = '$gmap_address', `privacy_consent` = '$check' WHERE `paziente_id` = $patients_idd;";
    $result = mysqli_query($conn, $sql);
  }else{
  $sql = "insert into paziente_profile (first_name, last_name, password, caller_name, dob, fiscale, via, cap, email, phone, photo, admin_note, gmap_address, dor, privacy_consent) values('".ucwords($first_name)."', '".ucwords($last_name)."', '".$pwrd."','".$caller_name."', '".$dob."', '".$fiscal."', '".$address."', '".$cap."', '".$email."','".$tel."', '".$profile_img."', '".$admin_note."', '".$gmap_address."','".$dor."','".$check."')";
  $result = mysqli_query($conn, $sql);
  }

    if ($result == 1) {
      /*delete temporary patients*/
      if (isset($_POST['patient_temp_id'])) {
        $tem_patient_id = $_POST['patient_temp_id'];
        $sql333 = "DELETE FROM temprary_patient where patient_id = '".$tem_patient_id."'";
        $result333 = mysqli_query($conn, $sql333);
      }

      $paziente_name = "select * from paziente_profile where email='" . $paziente_email . "'";
      $paziente_name_result = mysqli_query($conn, $paziente_name);
      $paziente_rows = mysqli_fetch_array($paziente_name_result);
      $first_name = $paziente_rows['first_name'];
      $last_name = $paziente_rows['last_name'];
      $paziente_main_name = $first_name . ' ' . $last_name;

      $patient_id = mysqli_real_escape_string($conn, $paziente_rows['paziente_id']);
      $visit_name = mysqli_real_escape_string($conn, $_POST['vist_name']);
      $payment_mode = mysqli_real_escape_string($conn, $_POST['payment_mode']);
      $booking_status = 0;
      $doctor_booking_status = 0;
      $patient_confirmation = 0;
      $pateint_remove_from_list = 0;
      $patient_apt_date = $_POST['appoint_time'];
      $appoint_time = mysqli_real_escape_string($conn, $patient_apt_date);

//      $exect_id  = $_POST['execut_id'];
//      $execut_id = mysqli_real_escape_string($conn, $exect_id);
      /*get executor detail*/
//      $sql50 = "select * from doctor_profile where doctor_id ='".$exect_id."'";
//      $result50 = mysqli_query($conn, $sql50);
//      $rows50 = mysqli_fetch_array($result50);
//      $executor_main_name = $rows50['fname'].' '.$rows50['lname'];
//      $executor_email = $rows50['email'];

      date_default_timezone_set("Europe/Rome");
      $date_of_booking = date("d/m/Y H:i:s");

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
        $sql45 = "select * from doctor_visit where visit_name ='".$visit_name."' AND doctor_email ='".$rows44['email']."'";
        $result45 = mysqli_query($conn, $sql45);
        $rows45 = mysqli_fetch_array($result45);
        $price = mysqli_real_escape_string($conn, $rows45['price']);

        $admin_book = 1;
        if (count($doc_ids_array) == 1)
          $admin_book = 2;

        $sql_booking = "insert into bookings (patient_id, doctor_id, visit_name, price, payment_mode, booking_status, doctor_booking_status, patient_confirmation, pateint_remove_from_list, date_of_booking, apoint_time, admin_book) values('".$patient_id."', '".$doctor_id."', '".$visit_name."', '".$price."', '".$payment_mode."', '".$booking_status."', '".$doctor_booking_status."', '".$patient_confirmation."', '".$pateint_remove_from_list."', '".$date_of_booking."', '".$appoint_time."', '".$admin_book."')";
        $result_booking = mysqli_query($conn, $sql_booking);

        if ($result_booking == 1) {
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
          $message2 = '<!DOCTYPE html><html data-wf-page="5dcd852d5095d024f8ea51ae" data-wf-site="5dcd852d5095d04927ea51ad"><head><meta charset="utf-8"><meta content="width=device-width, initial-scale=1" name="viewport"><meta content="Webflow" name="generator"><style>.header{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;width:100%;height:180px;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;-webkit-box-align:center;-webkit-align-items:center;-ms-flex-align:center;align-items:center;background-image:url("https://www.mobidoc.it/images/mailer_header.png");background-position:50% 50%, 50% 0%;background-size:100%,cover;background-repeat:no-repeat,repeat}.text_container{width:80%;min-height:150px;margin-top:70px;margin-right:auto;margin-left:auto}.button{margin:20px 20px 20px 0px;padding:16px 34px;border-radius:50px;background-color:#00285c}.text-block{margin-top:10px;font-size:16px}.text-block.italic{margin-top:28px;font-style:italic;font-weight:300}.body{font-family:Poppins,sans-serif;color:#00285c}.heading{margin-bottom:23px}.name{width:auto}a{text-decoration:none;color:#fff}</style> <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script> <script type="text/javascript">WebFont.load({google:{families:["Poppins:300,regular,italic,600"]}});</script> <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script> </head><body class="body"><div class="header"></div><div class="text_container"><h4 class="heading">Nuova Prenotazione!</h4><div class="text-block">Lamministratore ha prenotato una visita contro questo paziente '.$paziente_main_name.'. Accedi al tuo account per confermare questa prenotazione se sei disponibile.<br><br>Questa email è stata generata da un sistema automatico, si prega di non rispondere.<br><br> Cordiali Saluti,<br> La Direzione Mobidoc</div> <br></div></body></html>';

          mail($to2, $subject2, $message2, $headers2);

        }else{
          echo "Unable to insert record";
          mysqli_close($conn);
        }
      }

      if ($result_booking == 1) {
//      echo "$passwd";

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
        $message = '<!DOCTYPE html><html data-wf-page="5dcd852d5095d024f8ea51ae" data-wf-site="5dcd852d5095d04927ea51ad"><head><meta charset="utf-8"><meta content="width=device-width, initial-scale=1" name="viewport"><meta content="Webflow" name="generator"><style>.header{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;width:100%;height:180px;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;-webkit-box-align:center;-webkit-align-items:center;-ms-flex-align:center;align-items:center;background-image:url("https://www.mobidoc.it/images/mailer_header.png");background-position:50% 50%, 50% 0%;background-size:100%,cover;background-repeat:no-repeat,repeat}.text_container{width:80%;min-height:150px;margin-top:70px;margin-right:auto;margin-left:auto}.button{margin:20px 20px 20px 0px;padding:16px 34px;border-radius:50px;background-color:#00285c}.text-block{margin-top:10px;font-size:16px}.text-block.italic{margin-top:28px;font-style:italic;font-weight:300}.body{font-family:Poppins,sans-serif;color:#00285c}.heading{margin-bottom:23px}.name{width:auto}a{text-decoration:none;color:#fff}</style> <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script> <script type="text/javascript">WebFont.load({google:{families:["Poppins:300,regular,italic,600"]}});</script> <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script> </head><body class="body"><div class="header"></div><div class="text_container"><h4 class="heading">Nuova Prenotazione!</h4><div class="text-block">'.$paziente_main_name.' Ha prenotato una visita da: ';
        foreach($doc_details_array as $doc_detail) {
          $message .="
      <br><strong>" . $doc_detail['fname'].' '.$doc_detail['lname']."</strong>
     ";
        }
        $message .= "<br><br>Questa email è stata generata da un sistema automatico, si prega di non rispondere.<br><br> Cordiali Saluti,<br> La Direzione Mobidoc</div> <br></div></body></html>";

        mail($to, $subject, $message, $headers);


        //email to patient
        $to3 = $paziente_email; //patient email
        $subject3 = 'Mobidoc Prestazione Prenotata';
        $from3 = 'mobidoc_update@mobidoc.it';

        // To send HTML mail, the Content-type header must be set
        $headers3  = 'MIME-Version: 1.0' . "\r\n";
        $headers3 .= 'Content-Type: text/html; charset=utf-8' . "\r\n";

        // Create email headers
        $headers3 .= 'From: '.$from3."\r\n". 'Reply-To: '.$rply_email."\r\n" .   'X-Mailer: PHP/' . phpversion();

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

        // Compose a simple HTML email message
        $message3 = '<!DOCTYPE html><html data-wf-page="5dcd852d5095d024f8ea51ae" data-wf-site="5dcd852d5095d04927ea51ad"><head><meta charset="utf-8"><meta content="width=device-width, initial-scale=1" name="viewport"><meta content="Webflow" name="generator"><style>.header{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;width:100%;height:180px;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;-webkit-box-align:center;-webkit-align-items:center;-ms-flex-align:center;align-items:center;background-image:url("https://www.mobidoc.it/images/mailer_header_paziente.jpg");background-position:50% 50%, 50% 0%;background-size:100%,cover;background-repeat:no-repeat,repeat}.text_container{width:80%;min-height:150px;margin-top:70px;margin-right:auto;margin-left:auto}.button{margin:20px 20px 20px 0px;padding:16px 34px;border-radius:50px;background-color:#00285c}.text-block{margin-top:10px;font-size:16px}.text-block.italic{margin-top:28px;font-style:italic;font-weight:300}.body{font-family:Poppins,sans-serif;color:#00285c}.heading{margin-bottom:23px}.name{width:auto}a{text-decoration:none;color:#fff}</style> <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script> <script type="text/javascript">WebFont.load({google:{families:["Poppins:300,regular,italic,600"]}});</script> <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script> </head><body class="body"><div class="header"></div><div class="text_container"><h4 class="heading">Grazie per aver scelto Mobidoc!</h4><div class="text-block">Questa è la tua password generata dall amministratore <strong>'.$passwd.'</strong> contro la tua email <strong>'.$paziente_email.'</strong>. <br><br>La tua visita per '.$visit_name.' con: ';
        foreach($doc_details_array as $doc_detail) {
          $message3 .="
      <br><strong>" . $doc_detail['fname'].' '.$doc_detail['lname']."</strong>
     ";
        }
        $message3 .= "<br>è stata prenotata con successo. Sarai a breve contattato dal tuo Professionista Mobidoc con cui potrai concordare data e orario. <br> <br>
Fare <a target='_blank' style='color: blue; text-decoration: underline' href='$gmap_addr'>clic qui</a> per controllare la posizione del medico.<br> <br>
 Puoi aggiungere un evento di prenotazione sul tuo calendario di Google  
 <a target='_blank' style='color: blue; text-decoration: underline' href='https://calendar.google.com/calendar/u/0/r/eventedit?action=TEMPLATE&text=Mobidoc Visit&dates=$start_dt/$end_dt&ctz=Europe/Rome'>da qui</a>.<br> <br>
 <a target='_blank' style='color: blue; text-decoration: underline' href='https://mobidoc.it/informativaprivacy.html'>Clicca qui</a> per leggere la nostra informativa sulla privacy.<br> <br>
 Questa email è stata generata da un sistema automatico, si prega di non rispondere.<br><br> Cordiali Saluti,<br> La Direzione Mobidoc</div> <br></div></body></html>";

        mail($to3, $subject3, $message3, $headers3);

        header("location: /paziente/booking-completed.php");

      }else{
        echo "Unable to insert record1";
        mysqli_close($conn);
      }
    } else {
      header("location: /paziente/patient-register.php?err=1");
      echo "Unable to insert record2";
      mysqli_close($conn);
    }

    mysqli_close($conn);

  }else{
    if(!isset($_POST['patients_id'])) {
      $caller_fname = $_POST['call_first_name'] . ' ' . $_POST['call_last_name'];
      $caller_name = mysqli_real_escape_string($conn, $caller_fname);
      $paziente_email = $_POST['email'];
      $email = mysqli_real_escape_string($conn, $paziente_email);
      $tel = mysqli_real_escape_string($conn, $_POST['tele']);
      $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
      $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
      $dob = mysqli_real_escape_string($conn, $_POST['dob']);
      $dob = strtotime($dob);
      $dob = date('Y/m/d', $dob);
      $fiscal = mysqli_real_escape_string($conn, $_POST['fiscal_code']);
      $admin_note = mysqli_real_escape_string($conn, $_POST['admin_note']);

      date_default_timezone_set("Europe/Rome");
      $dor = date("Y/m/d");

      if (isset($_POST['patient_temp_id'])) {
        $sql = "update temprary_patient set first_name = '" . $first_name . "', last_name = '" . $last_name . "', caller_name = '" . $caller_fname . "', fiscale = '" . $fiscal . "', phone = '" . $tel . "', admin_note = '" . $admin_note . "', dor = '" . $dor . "', dob = '" . $dob . "' where patient_id='" . $_POST['patient_temp_id'] . "'";
      } else {
        $sql = "insert into temprary_patient (first_name, last_name, caller_name, fiscale, email, phone, admin_note, dor, dob) values('" . ucwords($first_name) . "', '" . ucwords($last_name) . "','" . $caller_name . "', '" . $fiscal . "', '" . $email . "','" . $tel . "', '" . $admin_note . "','" . $dor . "','" . $dob . "')";
      }

      $result = mysqli_query($conn, $sql);
      if ($result == 1) {
        header("location: /paziente/non-complete-profile.php");
      } else {
        $email = $_POST['email'];
        $sql = "update temprary_patient set first_name = '" . $first_name . "', last_name = '" . $last_name . "', caller_name = '" . $caller_fname . "', fiscale = '" . $fiscal . "', phone = '" . $tel . "', admin_note = '" . $admin_note . "', dor = '" . $dor . "', dob = '" . $dob . "' where email='" . $email . "'";
        $result = mysqli_query($conn, $sql);
        if ($result == 1) {
          header("location: /paziente/non-complete-profile.php");
        } else {
          echo 'There is some error in Database Connection';
        }
      }
    }else{
      header("location: /paziente/non-complete-profile.php");
    }
      mysqli_close($conn);
  }
}
?>
