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

    $latitude = "0.000000";
    $longtitude = "0.000000";
    $lat_lang = trim($_POST['lat_log']);
    if (!empty($lat_lang) && $lat_lang >= 1){
      $lat_lang1 = explode(",",$lat_lang);
      $latitude = $lat_lang1[0];
      $longtitude = $lat_lang1[1];
    }

    $profile_img = '../images/Group-556.jpg';
    $cap = 1;


   date_default_timezone_set("Europe/Rome");
   $dor = date("Y/m/d H:i:s");


  $sql_email = "select * from contact_profile where email ='".$email."'";
  $result_email = mysqli_query($conn, $sql_email);

   if ((isset($_POST['contact_id'])) && (!empty($_POST['contact_id'])) || mysqli_num_rows($result_email) > 0){
     if (mysqli_num_rows($result_email) > 0){
       $search_column = 'email';
       $search_data = $email;
     }else
     {
       $search_column = 'id';
       $search_data = $_POST['contact_id'];
     }
     $sql1_nnn = "UPDATE `contact_profile` SET `email` = '$email', `name` = '$caller_fname', `surname` = '$caller_lname',`phone` = '$tel',`privacy_consent` = '$check', `lastDatePrivacyConsent` = '$dor' WHERE `$search_column` = '$search_data'";
     $result_nnn = mysqli_query($conn, $sql1_nnn);
     if ($result_nnn){
//        not show anything
     }else{
       echo 'record2 not added';
     }
   }else{
       $sql_n12 = "insert into contact_profile (email, password, phone, name, surname,privacy_consent, lastDatePrivacyConsent) values('".$email."', '".$pwrd."', '".$tel."', '".$caller_fname."', '".$caller_lname."',  '".$check."',  '".$dor."')";
       $result_n12 = mysqli_query($conn, $sql_n12);

       if ($result_n12 == 1){
         $contact_id = mysqli_insert_id($conn);
     }else{
       echo 'record3 not added';
     }

   }

  $sql_fisical = "select * from paziente_profile where fiscale ='".$fiscal."'";
  $result_fisical = mysqli_query($conn, $sql_fisical);
  if (mysqli_num_rows($result_fisical) > 0) {
    $sql = "UPDATE `paziente_profile` SET `first_name` = '$first_name', `last_name` = '$last_name', `dob` = '$dob',`address` = '$address',`latitude` = '$latitude', `longitude` = '$longtitude',  `gmap_address` = '$gmap_address', `privacy_consent` = '$check', `lastDatePrivacyConsent` = '$dor', `dor` = '$dor' WHERE `fiscale` = '$fiscal'";
    $result = mysqli_query($conn, $sql);
    if ($result == 1){
//      not show anyting
    }else{
      echo 'record1 not added';
    }
  }else{

    if ((isset($_POST['contact_id'])) && (!empty($_POST['contact_id']))) {
      $contact_id = $_POST['contact_id'];
    }

    $sql = "insert into paziente_profile (contact_id, first_name, last_name, dob, fiscale,address, latitude, longitude, gmap_address, privacy_consent, lastDatePrivacyConsent, dor) values('".$contact_id."', '".ucwords($first_name)."', '".ucwords($last_name)."', '".$dob."', '".$fiscal."', '".$address."',  '".$latitude."',  '".$longtitude."', '".$gmap_address."','".$check."','".$dor."','".$dor."')";
    $result = mysqli_query($conn, $sql);
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

      $patient_apt_date = $_POST['appoint_time'];
      $ref_id  = $_POST['refertatore_id'];

      date_default_timezone_set("Europe/Rome");
      $date_of_booking = date("Y/m/d H:i:s");

      $payment_mode = mysqli_real_escape_string($conn, $_POST['payment_mode']);
      $km_price = $_POST['km_price'];
      $booking_status = 1;
      $doctor_booking_status = 0;
      $patient_confirmation = 0;
      $pateint_remove_from_list = 0;

      $doc_ids_array = array_unique($_POST['doc_id']);
      $discounted_value = $_POST['select_discount'];

      $patient_visit_count = count(array_filter($_POST['vist_name']));
      $visit_iteration = 0;
      $booking_ids_array = array();

      $book_visit_data = array();
      $hello = array();
      $pat_visits_array = $_POST['vist_name'];
      foreach ($pat_visits_array as $visit_key => $patient_visit) {

        $appoint_time = '';
        if ($patient_apt_date[$visit_iteration]){
          $appoint_time = date("Y/m/d H:i:s", strtotime($patient_apt_date[$visit_iteration]));
        }

        $refertatore_id = $ref_id[$visit_iteration];

        /*get refertatore detail*/
        $refertatore_name = '';
        $refertatore_email = '';
        if (!empty($refertatore_id)){
          $sql50 = "select * from doctor_profile where doctor_id ='".$refertatore_id."'";
          $result50 = mysqli_query($conn, $sql50);
          $rows50 = mysqli_fetch_array($result50);
          $refertatore_name = $rows50['fname'].' '.$rows50['lname'];
          $refertatore_email = $rows50['email'];
        }

        $article_id = $patient_visit;
        $booking_done = 0;
        $doc_details_array = array();

        $items_array = array(
            $patient_visit => array()
        );

        for ($i = 0; $i < count($doc_ids_array); $i++)  {

          $doctor_id = $doc_ids_array[$i];
          /*$article_id = mysqli_real_escape_string($conn, $_POST['vist_name']);*/
          $get_visit_query = "select descrizione, ls.visit_home_price, ls.visit_tele_price, am.home, am.tele
 from articlesMobidoc am
  join listini ls on ls.article_mobidoc_id=am.id
  where ls.article_mobidoc_id='" . $article_id . "' AND ls.doctor_id='" . $doctor_id . "'";
          $get_visit_result = mysqli_query($conn, $get_visit_query);
          $get_visit_row = mysqli_fetch_array($get_visit_result);

          $visit_name = $get_visit_row['descrizione'];

          if ($get_visit_row['home'] == 'Y' && $get_visit_row['tele'] == 'Y' || $get_visit_row['home'] == 'Y') {
            $price = $get_visit_row['visit_home_price'];
          } else {
            $price = $get_visit_row['visit_tele_price'];
          }


          /*get doctor email*/
          $sql44 = "select * from doctor_profile where doctor_id ='".$doctor_id."'";
          $result44 = mysqli_query($conn, $sql44);
          $rows44 = mysqli_fetch_array($result44);
          $doctor_main_name = $rows44['fname'].' '.$rows44['lname'];
          $doctor_email = $rows44['email'];
          array_push($doc_details_array, $rows44);


          $admin_book = 1;
          if (count($doc_ids_array) == 1)
            $admin_book = 2;

          $referr_id = '0';
          if (!empty($refertatore_id)) {
            $referr_id = $refertatore_id;
          }


          $discounted_price = '';
          if ($visit_iteration > 0){
//            $booking_parent_id = $booking_ids_array[$i];
//
//            if ($discounted_value[$visit_iteration-1]){
//              $discounted_price = $price*$discounted_value[$visit_iteration-1]/100;
//            }

            $discounted_price = 2;
           // $sql_booking = "insert into bookings (patient_id, booking_discount_id, doctor_id, refertatore_id, price, total_discount, km_price, message, payment_mode, booking_status, doctor_booking_status, patient_confirmation, pateint_remove_from_list, date_of_booking, apoint_time, admin_book, gmap_coordinates, latitude, longitude) values('".$patient_id."','".$booking_parent_id."', '".$doctor_id."', '".$referr_id."', '".$price."', '".$discounted_price."',  '".$km_price."','".$admin_note."', '".$payment_mode."', '".$booking_status."', '".$doctor_booking_status."', '".$patient_confirmation."', '".$pateint_remove_from_list."', '".$date_of_booking."', '".$appoint_time."', '".$admin_book."','".$gmap_address."', '".$latitude."', '".$longtitude."')";
          }else{
            //$sql_booking = "insert into bookings (patient_id, doctor_id, refertatore_id, price, km_price, message, payment_mode, booking_status, doctor_booking_status, patient_confirmation, pateint_remove_from_list, date_of_booking, apoint_time, admin_book, gmap_coordinates, latitude, longitude) values('".$patient_id."', '".$doctor_id."', '".$referr_id."', '".$price."', '".$km_price."', '".$admin_note."', '".$payment_mode."', '".$booking_status."', '".$doctor_booking_status."', '".$patient_confirmation."', '".$pateint_remove_from_list."', '".$date_of_booking."', '".$appoint_time."', '".$admin_book."','".$gmap_address."', '".$latitude."', '".$longtitude."')";
          }


          array_push($items_array[$patient_visit], array(
              "exam_name" => $visit_name,
              "exam_price" => $price,
              "discount_price" => $discounted_price,
              "doctor_name" => $doctor_main_name,
              "doctor_email" => $doctor_email,
//              "refer_name" => $refertatore_name,
//              "refer_email" => $refertatore_email,
          ));

           echo '<br>';

        /*
          $result_booking = mysqli_query($conn, $sql_booking);

          if ($result_booking == 1) {
            $last_booking_id = mysqli_insert_id($conn);
            if ($visit_iteration == 0){
                array_push($booking_ids_array,$last_booking_id);
            }
            $sql_new135 = "insert into booked_service (booking_id, article_id, price) values('".$last_booking_id."', '".$article_id."', '".$price."')";
            $result_new135 = mysqli_query($conn, $sql_new135);

            if ($result_new135 ==1){
              $booking_done = 1;
            }else{
              echo "Unable to insert record";
              exit();
            }
          }else{
            echo 'booked service record not added';
            exit();
          }
        */

        }

        array_push($hello, array($items_array));

        $visit_iteration++;
      }


      print_r($hello);
      echo '<br>';


      $contact_name = $contact_full_n = $caller_fname.' '.$caller_lname;
      $contact_phone  = $tel;
      $contact_fname = $caller_fname;
      $contact_surname = $caller_lname;


      $patient_name  = $first_name.' '.$last_name;
      $patient_fiscal  = $fiscal;
      $patient_dob  = $dob;
      $patient_address  = $select_address;
      $patient_gmap_addr  = $gmap_addr;
      $p_first_name = $first_name;
      $p_last_name = $last_name;

      $doctor_fname = '';





      $send_emails_array = array($contact_email);
      //$send_emails_array = array($contact_email, "info@mobidoc.it");


      foreach($send_emails_array as $send_emails_key => $send_email) {

        $visit_data = array();
        for ($ij = 0; $ij < count($doc_ids_array); $ij++)  {
          $doctor_id = $doc_ids_array[$ij];
          /*$article_id = mysqli_real_escape_string($conn, $_POST['vist_name']);*/

          /*get doctor email*/
          $sql44 = "select * from doctor_profile where doctor_id ='".$doctor_id."'";
          $result44 = mysqli_query($conn, $sql44);
          $rows44 = mysqli_fetch_array($result44);
          $doctor_main_name = $rows44['fname'].' '.$rows44['lname'];
          $doctor_email = $rows44['email'];
          $doctor_email = $rows44['email'];

          $email_to = $doctor_email;

          $visit_data = array(
              $doc_ids_array[$ij] => array(
                  "doctor_name" => $doctor_main_name,
              )
          );

          for ($jj = 0; $jj < count($pat_visits_array); $jj++)  {

            $get_visit_query = "select descrizione, ls.visit_home_price, ls.visit_tele_price, am.home, am.tele
 from articlesMobidoc am
  join listini ls on ls.article_mobidoc_id=am.id
  where ls.article_mobidoc_id='" . $pat_visits_array[$jj] . "' AND ls.doctor_id='" . $doctor_id . "'";
            $get_visit_result = mysqli_query($conn, $get_visit_query);
            $get_visit_row = mysqli_fetch_array($get_visit_result);

            $visit_name = $get_visit_row['descrizione'];

            if ($get_visit_row['home'] == 'Y' && $get_visit_row['tele'] == 'Y' || $get_visit_row['home'] == 'Y') {
              $price = $get_visit_row['visit_home_price'];
            } else {
              $price = $get_visit_row['visit_tele_price'];
            }

            array_push($visit_data[$doc_ids_array[$ij]], array(
                "exam_name" => $visit_name,
                "exam_price" => $price,
            ));

          }

        }



//        print_r($visit_data);
//        echo '<br>';
        // Compose a simple HTML email message
        $htmlContent = '<!DOCTYPE html><html data-wf-page="5dcd852d5095d024f8ea51ae" data-wf-site="5dcd852d5095d04927ea51ad"><head><meta charset="utf-8"><meta content="width=device-width, initial-scale=1" name="viewport"><meta content="Webflow" name="generator"><style>.header{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;width:100%;height:180px;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;-webkit-box-align:center;-webkit-align-items:center;-ms-flex-align:center;align-items:center;background-image:url("https://www.mobidoc.it/images/mailer_header.png");background-position:50% 50%, 50% 0%;background-size:100%,cover;background-repeat:no-repeat,repeat}.text_container{width:80%;min-height:150px;margin-top:70px;margin-right:auto;margin-left:auto}.button{margin:20px 20px 20px 0px;padding:16px 34px;border-radius:50px;background-color:#00285c}.text-block{margin-top:10px;font-size:16px}.text-block.italic{margin-top:28px;font-style:italic;font-weight:300}.body{font-family:Poppins,sans-serif;color:#00285c}.heading{margin-bottom:23px}.name{width:auto}a{text-decoration:none;color:#fff}</style> <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script> <script type="text/javascript">WebFont.load({google:{families:["Poppins:300,regular,italic,600"]}});</script> <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script> </head><body class="body"><div class="header"></div><div class="text_container"><h4 class="heading">Nuova Prenotazione!</h4><div class="text-block">'.$paziente_main_name.' Ha prenotato una visita da '.$doctor_main_name.'. <br><br><strong>Contact Info</strong>:
              <br><strong>Name</strong>: '.$contact_name.'<br><strong>Phone</strong>: '.$contact_phone.'<br><br><strong>Patient Info</strong><br><strong>Name</strong>: '.$patient_name.'<br><strong>Fiscal Code</strong>: '.$patient_fiscal.'<br><strong>Date of Birth</strong>: '.$patient_dob.'<br><strong>Address</strong>: <a target=\'_blank\' style=\'color: blue; text-decoration: underline\' href='.$patient_gmap_addr.'>'.$patient_address.'</a><br><br><strong>Visits/Exams</strong><br>';

        foreach($visit_data as $vis_key => $vis_data) {
          print_r($vis_data);
          echo '<br>';
          $visit_amount = $vis_data['exam_price'].'</strong>';
          if ($vis_key > 0 && !empty($discounted_value[$vis_key-1])){
            $is_discount =$discounted_value[$vis_key-1];
            $disounted_amount = $vis_data['exam_price']*$is_discount/100;
            $visit_amount = $disounted_amount.' </strong>(With '.$is_discount.'% discount)';
          }
          $htmlContent .="
 ". $vis_data['exam_name'].'-: <strong>€'.$visit_amount.'<br>'."
";
        }
        $htmlContent .="<br><strong>Doctor Info<br>Name</strong>: ".$doctor_main_name."<br><strong>Email</strong>: ".$doctor_email."<br><strong>Phone</strong>: ".$doctor_phone."<br><br><strong>Data e Ora</strong>:da confermare<br><strong>Payment Method: </strong>".$payment_mode." <br><br>Questa email è stata generata da un sistema automatico, si prega di non rispondere.<br><br> Cordiali Saluti,<br> La Direzione Mobidoc</div> <br></div></body></html>";

        echo $htmlContent;
//        // Multipart boundary
//        $message = "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"UTF-8\"\n" .
//            "Content-Transfer-Encoding: 7bit\n\n" . $htmlContent . "\n\n";
//
//        // Preparing attachment
//        $message .= "--{$mime_boundary}--";
//        $returnpath = "-f" . $from;
//
//
//        @mail($email_to, $subject, $message, $headers, $returnpath);


//        @mail($send_email, $subject, $message, $headers, $returnpath);
//
//        if ($send_emails_key == 2){
//          for($pd=0;$pd < count($pdf_files);$pd++){
//            unlink($pdf_files[$pd]);
//          }
//        }
      }


      exit();




      //   send emails to doctors
      $subject = 'Nuova Prenotazione!';
      // Sender
      $from = 'mobidoc_update@mobidoc.it';
      $rply_email = 'noreplay@mobidoc.it';

      // Header for sender info
      $headers = 'From: '.$from."\r\n". 'Reply-To: '.$rply_email."\r\n" .   'X-Mailer: PHP/' . phpversion();

      // Boundary
      $semi_rand = md5(time());
      $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";

      // Headers for attachment
      $headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\"";


      include ("../contact_pdf.php");
      $pdf_file1 = "../assets/generate_pdf/mobidoc1.pdf";

      include ("../executor_pdf.php");
      $pdf_file2 = "../assets/generate_pdf/mobidoc2.pdf";

      $pdf_files = array($pdf_file1, $pdf_file2);



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

      // send emails to doctor
      for ($ij = 0; $ij < count($doc_ids_array); $ij++)  {
        $doctor_id = $doc_ids_array[$ij];
        /*$article_id = mysqli_real_escape_string($conn, $_POST['vist_name']);*/

        /*get doctor email*/
        $sql44 = "select * from doctor_profile where doctor_id ='".$doctor_id."'";
        $result44 = mysqli_query($conn, $sql44);
        $rows44 = mysqli_fetch_array($result44);
        $doctor_main_name = $rows44['fname'].' '.$rows44['lname'];
        $doctor_email = $rows44['email'];
        $doctor_email = $rows44['email'];

        $email_to = $doctor_email;

        $visit_data = array(
            $doc_ids_array[$ij] => array(
                )
        );

        for ($jj = 0; $jj < count($pat_visits_array); $jj++)  {

          $get_visit_query = "select descrizione, ls.visit_home_price, ls.visit_tele_price, am.home, am.tele
 from articlesMobidoc am
  join listini ls on ls.article_mobidoc_id=am.id
  where ls.article_mobidoc_id='" . $pat_visits_array[$jj] . "' AND ls.doctor_id='" . $doctor_id . "'";
          $get_visit_result = mysqli_query($conn, $get_visit_query);
          $get_visit_row = mysqli_fetch_array($get_visit_result);

          $visit_name = $get_visit_row['descrizione'];

          if ($get_visit_row['home'] == 'Y' && $get_visit_row['tele'] == 'Y' || $get_visit_row['home'] == 'Y') {
            $price = $get_visit_row['visit_home_price'];
          } else {
            $price = $get_visit_row['visit_tele_price'];
          }

          array_push($visit_data[$doc_ids_array[$ij]], array(
              "exam_name" => $visit_name,
              "exam_price" => $price,
          ));

        }


        // Compose a simple HTML email message
        $htmlContent = '<!DOCTYPE html><html data-wf-page="5dcd852d5095d024f8ea51ae" data-wf-site="5dcd852d5095d04927ea51ad"><head><meta charset="utf-8"><meta content="width=device-width, initial-scale=1" name="viewport"><meta content="Webflow" name="generator"><style>.header{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;width:100%;height:180px;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;-webkit-box-align:center;-webkit-align-items:center;-ms-flex-align:center;align-items:center;background-image:url("https://www.mobidoc.it/images/mailer_header.png");background-position:50% 50%, 50% 0%;background-size:100%,cover;background-repeat:no-repeat,repeat}.text_container{width:80%;min-height:150px;margin-top:70px;margin-right:auto;margin-left:auto}.button{margin:20px 20px 20px 0px;padding:16px 34px;border-radius:50px;background-color:#00285c}.text-block{margin-top:10px;font-size:16px}.text-block.italic{margin-top:28px;font-style:italic;font-weight:300}.body{font-family:Poppins,sans-serif;color:#00285c}.heading{margin-bottom:23px}.name{width:auto}a{text-decoration:none;color:#fff}</style> <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script> <script type="text/javascript">WebFont.load({google:{families:["Poppins:300,regular,italic,600"]}});</script> <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script> </head><body class="body"><div class="header"></div><div class="text_container"><h4 class="heading">Nuova Prenotazione!</h4><div class="text-block">'.$paziente_main_name.' Ha prenotato una visita da '.$doctor_main_name.'. <br><br><strong>Contact Info</strong>:
              <br><strong>Name</strong>: '.$contact_name.'<br><strong>Phone</strong>: '.$contact_phone.'<br><br><strong>Patient Info</strong><br><strong>Name</strong>: '.$patient_name.'<br><strong>Fiscal Code</strong>: '.$patient_fiscal.'<br><strong>Date of Birth</strong>: '.$patient_dob.'<br><strong>Address</strong>: <a target=\'_blank\' style=\'color: blue; text-decoration: underline\' href='.$patient_gmap_addr.'>'.$patient_address.'</a><br><br><strong>Visits/Exams</strong><br>';

        foreach($visit_data[$doc_ids_array[$ij]] as $vis_key => $vis_data) {
          $visit_amount = $vis_data['exam_price'].'</strong>';
          if ($vis_key > 0 && !empty($discounted_value[$vis_key-1])){
            $is_discount =$discounted_value[$vis_key-1];
            $disounted_amount = $vis_data['exam_price']*$is_discount/100;
            $visit_amount = $disounted_amount.' </strong>(With '.$is_discount.'% discount)';
          }
          $htmlContent .="
 ". $vis_data['exam_name'].'-: <strong>€'.$visit_amount.'<br>'."
";
        }
        $htmlContent .="<br><strong>Doctor Info<br>Name</strong>: ".$doctor_main_name."<br><strong>Email</strong>: ".$doctor_email."<br><strong>Phone</strong>: ".$doctor_phone."<br><br><strong>Data e Ora</strong>:da confermare<br><strong>Payment Method: </strong>".$payment_mode." <br><br>Questa email è stata generata da un sistema automatico, si prega di non rispondere.<br><br> Cordiali Saluti,<br> La Direzione Mobidoc</div> <br></div></body></html>";

        echo $htmlContent;
        // Multipart boundary
        $message = "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"UTF-8\"\n" .
            "Content-Transfer-Encoding: 7bit\n\n" . $htmlContent . "\n\n";

        // Preparing attachment
        $message .= "--{$mime_boundary}--";
        $returnpath = "-f" . $from;


        @mail($email_to, $subject, $message, $headers, $returnpath);


      }

      exit();



      $send_emails_array = array("info@mobidoc.it");

        $contact_full_n = $caller_fname.' '.$caller_lname;
        $contact_fname = $caller_fname;
        include ("../contact_pdf.php");
        // Attachment file
        $pdf_file1 = "assets/generate_pdf/".strtolower($contact_fname).'.pdf';

        // include ("../executor_pdf.php");
        // Attachment file
//          $pdf_file2 = "assets/generate_pdf/".strtolower($doctor_fname).'.pdf';
//
//          $pdf_files = array($pdf_file1, $pdf_file2);
//

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


      @mail($send_email, $subject, $message, $headers, $returnpath);

//          foreach($send_emails_array as $send_emails_key => $send_email) {
//
//            // Recipient
//            //$to = $send_email;
//
//            // Send email
//            @mail($send_email, $subject, $message, $headers, $returnpath);
//
////            if ($send_emails_key == 2){
////              for($pd=0;$pd < count($pdf_files);$pd++){
////                unlink($pdf_files[$pd]);
////              }
////            }
//          }



      exit();


      $booking_done = 2;
      if ($booking_done == 1) {

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

      }

      header("location: /paziente/booking-completed.php");
    } else {
      header("location: /admin/patient-register.php?err=1");
      echo "Unable to insert record2";
      exit();
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
    $mds_id = $_POST['mds_name'];
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
    $payment_mode = mysqli_real_escape_string($conn, $_POST['payment_mode']);
     $lat_log = $_POST['lat_log'];
    $km_price = $_POST['km_price'];

    $refertatore_id = '0';
     if (!empty($referr_id)) {
    $refertatore_id = $referr_id;
     }

    $doc_ids_array = '0';
    if (!empty($_POST['doc_id'])) {
      $doc_ids_array = json_encode(array_unique($_POST['doc_id']));
    }

    $visit_name = '0';
    $vis_name = array_filter($_POST['vist_name']);
    if (!empty($vis_name)) {
        $visit_name = json_encode($vis_name);
    }

    $appoint_time = json_encode($_POST['appoint_time']);
    $referr_id = json_encode($_POST['refertatore_id']);


    $total_discount = '';
    if (!empty($_POST['select_discount'])) {
        $total_discount = json_encode($_POST['select_discount']);
    }

    date_default_timezone_set("Europe/Rome");
    $dor = date("Y/m/d H:i:s");

    if ($fesic_code == 1 && !empty($fiscal) || isset($_POST['patient_temp_id'])) {
      if ($fesic_code == 1){
        $sql = "update temprary_patient set mds_id = '" . $mds_id . "', first_name = '" . $first_name . "', last_name = '" . $last_name . "', last_name = '" . $last_name . "', caller_name = '" . $caller_fname . "', fiscale = '" . $fiscal . "', phone = '" . $tel . "', admin_note = '" . $admin_note . "', dor = '" . $dor . "', dob = '" . $dob . "', email = '" . $email . "', address = '" . $address . "', gmap_address = '" . $gmap_address . "', visit_name = '" . $visit_name . "', appoint_time = '" . $appoint_time . "', payment_mode = '" . $payment_mode . "', excutor_ids = '" . $doc_ids_array . "', refertatore_id = '" . $referr_id . "', total_discount = '" . $total_discount . "', km_price = '" . $km_price . "', lat_log = '" . $lat_log . "' where  fiscale='" . $fiscal . "'";
      }else{
        $sql = "update temprary_patient set mds_id = '" . $mds_id . "', first_name = '" . $first_name . "', last_name = '" . $last_name . "', last_name = '" . $last_name . "', caller_name = '" . $caller_fname . "', fiscale = '" . $fiscal . "', phone = '" . $tel . "', admin_note = '" . $admin_note . "', dor = '" . $dor . "', dob = '" . $dob . "', email = '" . $email . "', address = '" . $address . "', gmap_address = '" . $gmap_address . "', visit_name = '" . $visit_name . "', appoint_time = '" . $appoint_time . "', payment_mode = '" . $payment_mode . "', excutor_ids = '" . $doc_ids_array . "', refertatore_id = '" . $referr_id . "', total_discount = '" . $total_discount . "',km_price = '" . $km_price . "', lat_log = '" . $lat_log . "' where  patient_id='" . $_POST['patient_temp_id'] . "'";
      }
    } else {
      $sql = "insert into temprary_patient (mds_id,first_name, last_name, caller_name, dob, fiscale, address, email, phone, admin_note, gmap_address, lat_log, dor, visit_name, excutor_ids, refertatore_id, total_discount,km_price, appoint_time, payment_mode) values('".$mds_id."','".ucwords($first_name)."', '".ucwords($last_name)."','".$caller_name."', '".$dob."', '".$fiscal."', '".$address."', '".$email."','".$tel."', '".$admin_note."', '".$gmap_address."', '".$lat_log."', '".$dor."','".$visit_name."','".$doc_ids_array."', '".$referr_id."','".$total_discount."', '".$km_price."', '".$appoint_time."','".$payment_mode."')";
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