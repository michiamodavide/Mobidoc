<?php session_start();
if(isset($_POST['submit']))
{

  include '../connect.php';

  $booking_id = $_POST['book_id'];
  $excuter_name = $_POST['excuter_name'];
  $vis_name = $_POST['vis_name'];
  $doct_name = $_POST['doct_name'];
  $excuter_email = $_POST['excuter_email'];
  $executer_id = mysqli_real_escape_string($conn, $_POST['executer_id']);

  $sql = "UPDATE `bookings` SET `executer_id` = '$executer_id' WHERE `bookings`.`booking_id` = $booking_id;";
  $result = mysqli_query($conn, $sql);

  if($result==1) {
    $to = $excuter_email;
    $subject = 'Condividi nuovo esame';
    $from = 'mobidoc_update@mobidoc.it';
    $rply_email = 'noreplay@mobidoc.it';

    // To send HTML mail, the Content-type header must be set
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

    // Create email headers
    $headers .= 'From: '.$from."\r\n". 'Reply-To: '.$rply_email."\r\n" .   'X-Mailer: PHP/' . phpversion();

    // Compose a simple HTML email message
    $message = '<!DOCTYPE html><html data-wf-page="5dcd852d5095d024f8ea51ae" data-wf-site="5dcd852d5095d04927ea51ad"><head><meta charset="utf-8"><meta content="width=device-width, initial-scale=1" name="viewport"><meta content="Webflow" name="generator"><style>.header{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;width:100%;height:180px;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;-webkit-box-align:center;-webkit-align-items:center;-ms-flex-align:center;align-items:center;background-image:url("https://www.mobidoc.it/images/mailer_header.png");background-position:50% 50%, 50% 0%;background-size:100%,cover;background-repeat:no-repeat,repeat}.text_container{width:80%;min-height:150px;margin-top:70px;margin-right:auto;margin-left:auto}.button{margin:20px 20px 20px 0px;padding:16px 34px;border-radius:50px;background-color:#00285c}.text-block{margin-top:10px;font-size:16px}.text-block.italic{margin-top:28px;font-style:italic;font-weight:300}.body{font-family:Poppins,sans-serif;color:#00285c}.heading{margin-bottom:23px}.name{width:auto}a{text-decoration:none;color:#fff}</style> <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script> <script type="text/javascript">WebFont.load({google:{families:["Poppins:300,regular,italic,600"]}});</script> <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script> </head><body class="body"><div class="header"></div><div class="text_container"><h4 class="heading">Gentile '.$excuter_name.',</h4><div class="text-block">Il professionista '.$doct_name.' ha condiviso la prestazione '.$vis_name.' con te. </div> <br> <br><a href="https://mobidoc.it/professionisti/login.php" class="button" style="margin-top:100px;">Clicca qui per accedere al tuo profilo e visualizzare i dettagli.</a></div></body></html>';


    mail($to, $subject, $message, $headers);

    echo "<script>alert('Lesame è stato condiviso con successo.');</script>";
  }
  else{
    echo "Your Record not Updated";
  }
  mysqli_close($conn);
}

//echo "<script>alert('Il suo profilo è stato aggiornato con successo. Sarà ora reindirizzato al suo account.');</script>";
//echo "<script>window.location = 'account.php'</script>";
?>