<?php
$is_first = 0;
if(isset($_POST['update-status'])){
  $is_first = 1;
  $doct_id = $_POST['doctor-id'];
  $status = $_POST['status'];
  $doc_spaciality = $_POST['doc_spaciality'];
  if (isset($_POST['medical_speciality'])){
    $med_speciality = $_POST['medical_speciality'];
    if (!empty($_POST['puo_refertare_pop']) && $_POST['puo_refertare_pop'] == 'on'){
      $puo_refertare = 'Y';
    }else{
      $puo_refertare = 'N';
    }
  }
  $is_edit = 1;
  if (!empty($doc_spaciality)){
    $is_edit = 0;
  }
}else{
  $status = $_GET['s'];
  $doct_id = $_GET['id'];
}


	include '../connect.php';

$sql = "update doctor_register set status = ".$status." where id='".$doct_id."'";

$result = mysqli_query($conn, $sql);

if ($is_first ==1 && $result==1){
 if ($is_edit != 1) {
   $sql1 = "update doctor_profile set puo_refertare = '" . $puo_refertare . "', title= '" . $med_speciality . "' where doctor_id='" . $doct_id . "'";
   $result1 = mysqli_query($conn, $sql1);
 }else{
   $result1 = 0;
 }
  if ($result1 ==1 || $is_edit ==1){

   if ($is_edit ==1){
     $sql_del = "delete from listini where doctor_id='$doct_id'";
     $result_del = mysqli_query($conn, $sql_del);
     $i=0;
     if($result_del==1) {

       for($i=1;$i<=100;$i++)
       {
         $v11='service_name_pre'.$i;
         $v21='service_price_pre'.$i;
         $v51='service_price_pre_tele'.$i;
         if(isset($_POST[$v11])){
           $v31 = mysqli_real_escape_string($conn, $_POST[$v11]);
           $v41 = mysqli_real_escape_string($conn, $_POST[$v21]);
           $v61 = '0.0';
           if ($_POST[$v51] >=1){
             $v61 = mysqli_real_escape_string($conn, $_POST[$v51]);
           }
           $sql34 = "insert into listini (doctor_id, article_mobidoc_id, visit_home_price, visit_tele_price) values('".$doct_id."','".$v31."', '".$v41."', '".$v61."')";
           $result134 = mysqli_query($conn, $sql34);
           if($result134==1) {
//            do not anything
           }else {
             echo "Unable to insert record34";
           }
         }
       }
     }else {
       echo "Unable to delete record record";
     }

   }

    for($i=1;$i<=100;$i++)
    {
      $v1='service_name'.$i;
      $v2='service_price'.$i;
      $v5='service_price_tel'.$i;
      if(isset($_POST[$v1])){
        $v3 = mysqli_real_escape_string($conn, $_POST[$v1]);
        $v4 = mysqli_real_escape_string($conn, $_POST[$v2]);
        $v6 = '0.0';
        if ($_POST[$v5] >=1){
          $v6 = mysqli_real_escape_string($conn, $_POST[$v5]);
        }

        $sql3 = "insert into listini (doctor_id, article_mobidoc_id, visit_home_price, visit_tele_price) values('".$doct_id."','".$v3."', '".$v4."', '".$v6."')";
        $result13 = mysqli_query($conn, $sql3);
        if($result13==1 && $is_edit != 1) {

          $sql3_new = "insert into doctor_specialty (doctor_id, specialty) values('".$doct_id."','".$doc_spaciality."')";
          $result3_new = mysqli_query($conn, $sql3_new);
          if($result==1) {
            echo "Record inserted45";
          }else {
            echo "Unable to insert record45";
          }

        }else {
          echo "Unable to insert record3";
        }
      }
    }

  }else{
    echo '<script type="text/javascript">alert("Your Data not updating correctly in doctor profile table")</script>';
    header("Location: index.php");
  }
}


	$sql2 = "select * from doctor_profile where doctor_id='".$doct_id."'";
	$result2 = mysqli_query($conn, $sql2);
	$rows = mysqli_fetch_array($result2);
	$doctor_fname = $rows['fname'];
	$doctor_lname = $rows['lname'];
  $email = $rows['email'];

	$doctor_name =  $doctor_fname." ".$doctor_lname;
	
	if($result==1 && $status)
	{

		$to = $email;
        $subject = 'Esito Candidatura Mobidoc';
        $from = 'mobidoc_update@mobidoc.it';
         $rply_email = 'noreplay@mobidoc.it';
        // To send HTML mail, the Content-type header must be set
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                        
        // Create email headers
        $headers .= 'From: '.$from."\r\n". 'Reply-To: '.$rply_email."\r\n" .   'X-Mailer: PHP/' . phpversion();
                        
        // Compose a simple HTML email message
        $message = '<!DOCTYPE html><html data-wf-page="5dcd852d5095d024f8ea51ae" data-wf-site="5dcd852d5095d04927ea51ad"><head> <meta charset="utf-8"> <meta content="width=device-width, initial-scale=1" name="viewport"> <meta content="Webflow" name="generator"> <style>.header{display: -webkit-box; display: -webkit-flex; display: -ms-flexbox; display: flex; width: 100%; height: 180px; -webkit-box-pack: center; -webkit-justify-content: center; -ms-flex-pack: center; justify-content: center; -webkit-box-align: center; -webkit-align-items: center; -ms-flex-align: center; align-items: center; background-image: url("https://www.mobidoc.it/images/mailer_logo.png"), url("https://www.mobidoc.it/images/mailer_header.png"); background-position: 50% 50%, 50% 0%; background-size: 200px, cover; background-repeat: no-repeat, repeat;}.text_container{width: 80%; min-height: 150px; margin-top: 70px; margin-right: auto; margin-left: auto;}.button{margin: 20px 20px 20px 0px; padding: 16px 34px; border-radius: 50px; background-color: #00285c;}.text-block{margin-top: 10px; font-size: 16px;}.text-block.italic{margin-top: 28px; font-style: italic; font-weight: 300;}.body{font-family: Poppins, sans-serif; color: #00285c;}.heading{margin-bottom: 23px;}.name{width: auto;}a{text-decoration: none; color:#fff;}</style> <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script> <script type="text/javascript">WebFont.load({google:{families: ["Poppins:300,regular,italic,600"]}});</script> <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script></head><body class="body"> <div class="header"></div><div class="text_container"> <h4 class="heading">Gentile '.$doctor_name.',</h4> <div class="text-block">Ottime notizie! Il suo profilo è stato approvato e può ora dedicarsi a completare le informazioni del suo profilo che può trovare cliccando il seguente bottone:</div><br><br><a href="https://www.mobidoc.it/professionisti/crea-un-profilo.php?email='.$email.'" class="button" style="margin-top:100px;">Crea un profilo</a><br><br><div class="text-block">Una volta completata la registrazione, riceverà una seconda email che confermerà la pubblicazione del suo profilo Mobidoc.</div><div class="text-block">Rimaniamo a sua disposizione per qualsiasi informazione o chiarimento.<br><br>Questa email è stata generata da un sistema automatico, si prega di non rispondere. </div><div class="text-block italic">Cordiali Saluti,<br>La Direzione Mobidoc</div></div></body></html>';


        mail($to, $subject, $message, $headers);
        // Sending email            
						
		  header("Location: index.php");

		echo "link sent on doctor email id: <br> www.mobidoc.it/professionisti/crea-un-profilo.php?email=$email";

	}
	else
	{
		
		$to = $email;
                        $subject = 'Esito Candidatura Mobidoc';
                        $from = 'mobidoc_update@mobidoc.it';
                        $rply_email = 'noreplay@mobidoc.it';
                        
                        // To send HTML mail, the Content-type header must be set
                        $headers  = 'MIME-Version: 1.0' . "\r\n";
                        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                        
                        // Create email headers
                        $headers .= 'From: '.$from."\r\n". 'Reply-To: '.$rply_email."\r\n" .   'X-Mailer: PHP/' . phpversion();
                        
                        // Compose a simple HTML email message
                        $message = '<!DOCTYPE html><html data-wf-page="5dcd852d5095d024f8ea51ae" data-wf-site="5dcd852d5095d04927ea51ad"> <head> <meta charset="utf-8"> <meta content="width=device-width, initial-scale=1" name="viewport"> <meta content="Webflow" name="generator"> <style>.header{display: -webkit-box; display: -webkit-flex; display: -ms-flexbox; display: flex; width: 100%; height: 180px; -webkit-box-pack: center; -webkit-justify-content: center; -ms-flex-pack: center; justify-content: center; -webkit-box-align: center; -webkit-align-items: center; -ms-flex-align: center; align-items: center; background-image: url("https://www.mobidoc.it/images/mailer_logo.png"), url("https://www.mobidoc.it/images/mailer_header.png"); background-position: 50% 50%, 50% 0%; background-size: 200px, cover; background-repeat: no-repeat, repeat;}.text_container{width: 80%; min-height: 150px; margin-top: 70px; margin-right: auto; margin-left: auto;}.button{margin: 20px 20px 20px 0px; padding: 16px 34px; border-radius: 50px; background-color: #00285c;}.text-block{margin-top: 10px; font-size: 16px;}.text-block.italic{margin-top: 28px; font-style: italic; font-weight: 300;}.body{font-family: Poppins, sans-serif; color: #00285c;}.heading{margin-bottom: 23px;}.name{width: auto;}a{text-decoration: none; color:#fff;}</style> <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script> <script type="text/javascript">WebFont.load({google:{families: ["Poppins:300,regular,italic,600"]}});</script> <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script> </head> <body class="body"> <div class="header"></div><div class="text_container"> <h4 class="heading">Gentile '.$doctor_name.'</h4> <div class="text-block">Ci spiace informarla che la sua candidatura non è stata approvata. </div><div class="text-block">Invitandola a riprovare in un secondo momento, rimaniamo a sua disposizione per qualsiasi informazione o chiarimento.<br><br>Questa email è stata generata da un sistema automatico, si prega di non rispondere. </div><div class="text-block italic">Cordiali Saluti,<br>La Direzione Mobidoc</div></div></body></html>';


		echo "Mail sent<br>Application Rejected<br>record is deleted from db";
		$sql2 = "delete from doctor_register where email='".$email."'";
		$result2 = mysqli_query($conn, $sql2);
		header("Location: index.php");
	}
	mysqli_close($conn);
?>
<br>
<a href="index.php">back</a>

				
