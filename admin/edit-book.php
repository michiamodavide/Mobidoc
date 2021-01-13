<?php
include '../connect.php';

if(isset($_POST['submit'])){

  $doctor_id = mysqli_real_escape_string($conn, $_POST['doc_id']);
  $visit_name = mysqli_real_escape_string($conn, $_POST['vist_name']);
  $patient_apt_date = $_POST['appoint_time'];
  echo $patient_apt_date;
  exit();

    $dob = mysqli_real_escape_string($conn, $_POST['dob']);
    $dob=strtotime($dob);
    $dob = date('Y/m/d', $dob);
    $tel = mysqli_real_escape_string($conn, $_POST['tele']);
    $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);

    $patients_idd = $_POST['patient_id'];
    $sql = "UPDATE `paziente_profile` SET `dob` = '$dob', `photo` = '$tel', `first_name` = '$first_name', `last_name` = '$last_name' WHERE `paziente_id` = $patients_idd;";
    $result = mysqli_query($conn, $sql);

    if ($result == 1) {

      $paziente_main_name = $first_name.' '.$last_name;

      $doctor_id = mysqli_real_escape_string($conn, $_POST['doc_id']);
      $visit_name = mysqli_real_escape_string($conn, $_POST['vist_name']);
      $patient_apt_date = $_POST['appoint_time'];

      $booking_idd = $_POST['booing_idd'];
      $sql12 = "UPDATE `bookings` SET `doctor_id` = '$doctor_id', `visit_name` = '$visit_name', `apoint_time` = '$patient_apt_date' WHERE `booking_id` = $booking_idd;";
      $result12 = mysqli_query($conn, $sql12);

      /*get doctor data*/
      $sql44 = "select * from doctor_profile where doctor_id ='".$doctor_id."'";
      $result44 = mysqli_query($conn, $sql44);
      $rows44 = mysqli_fetch_array($result44);
      $doctor_main_name = $rows44['fname'].' '.$rows44['lname'];
      $doctor_email = $rows44['email'];

      if ($result12 == 1) {
        //email to doctor
        $to2 = $doctor_email; //doctor email
        $subject2 = 'Mobidoc Prestazione Prenotata';
        $rply_email = 'noreplay@mobidoc.it';
        $from2 = 'mobidoc_update@mobidoc.it';

        // To send HTML mail, the Content-type header must be set
        $headers2  = 'MIME-Version: 1.0' . "\r\n";
        $headers2 .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

        // Create email headers
        $headers2 .= 'From: '.$from2."\r\n". 'Reply-To: '.$rply_email."\r\n" .   'X-Mailer: PHP/' . phpversion();

        // Compose a simple HTML email message
        $message2 = '<!DOCTYPE html><html data-wf-page="5dcd852d5095d024f8ea51ae" data-wf-site="5dcd852d5095d04927ea51ad"><head><meta charset="utf-8"><meta content="width=device-width, initial-scale=1" name="viewport"><meta content="Webflow" name="generator"><style>.header{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;width:100%;height:180px;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;-webkit-box-align:center;-webkit-align-items:center;-ms-flex-align:center;align-items:center;background-image:url("https://www.mobidoc.it/images/mailer_header.png");background-position:50% 50%, 50% 0%;background-size:100%,cover;background-repeat:no-repeat,repeat}.text_container{width:80%;min-height:150px;margin-top:70px;margin-right:auto;margin-left:auto}.button{margin:20px 20px 20px 0px;padding:16px 34px;border-radius:50px;background-color:#00285c}.text-block{margin-top:10px;font-size:16px}.text-block.italic{margin-top:28px;font-style:italic;font-weight:300}.body{font-family:Poppins,sans-serif;color:#00285c}.heading{margin-bottom:23px}.name{width:auto}a{text-decoration:none;color:#fff}</style> <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script> <script type="text/javascript">WebFont.load({google:{families:["Poppins:300,regular,italic,600"]}});</script> <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script> </head><body class="body"><div class="header"></div><div class="text_container"><h4 class="heading">Aggiorna prenotazione!</h4><div class="text-block">Lamministratore ha aggiornato una visita prenotata su questo paziente '.$paziente_main_name.'. Accedi al tuo account per vedere i dettagli di questa prenotazione.<br><br>Questa email è stata generata da un sistema automatico, si prega di non rispondere.<br><br> Cordiali Saluti,<br> La Direzione Mobidoc</div> <br></div></body></html>';

        mail($to2, $subject2, $message2, $headers2);
        header("location: /admin/booking.php");
      }else{
        echo "Unable to insert record";
        mysqli_close($conn);
      }

    } else {
      header("location: /admin/booking.php");
      echo "Unable to insert record2";
      mysqli_close($conn);
    }

    mysqli_close($conn);

}
?>
