
<?php

$booking_date = strtr($_GET['date'], '/', '-');
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
?>

<?php

$passwd = 'hello123';
$visit_name = 'Test Visit';
//email to patient
$paziente_email = $_GET['email'];
$to3 = $paziente_email; //patient email
$subject3 = 'Mobidoc Prestazione Prenotata';
$from3 = 'mobidoc_update@mobidoc.it';
$rply_email3 = 'noreplay@mobidoc.it';

// To send HTML mail, the Content-type header must be set
$headers3 = 'MIME-Version: 1.0' . "\r\n";
$headers3 .= 'Content-Type: text/html; charset=utf-8' . "\r\n";

// Create email headers
$headers3 .= 'From: ' . $from3 . "\r\n" . 'Reply-To: ' . $rply_email3 . "\r\n" . 'X-Mailer: PHP/' . phpversion();

// Compose a simple HTML email message
$message3 = '<!DOCTYPE html><html data-wf-page="5dcd852d5095d024f8ea51ae" data-wf-site="5dcd852d5095d04927ea51ad"><head><meta charset="utf-8"><meta content="width=device-width, initial-scale=1" name="viewport"><meta content="Webflow" name="generator"><style>.header{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;width:100%;height:180px;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;-webkit-box-align:center;-webkit-align-items:center;-ms-flex-align:center;align-items:center;background-image:url("https://www.mobidoc.it/images/mailer_header_paziente.jpg");background-position:50% 50%, 50% 0%;background-size:100%,cover;background-repeat:no-repeat,repeat}.text_container{width:80%;min-height:150px;margin-top:70px;margin-right:auto;margin-left:auto}.button{margin:20px 20px 20px 0px;padding:16px 34px;border-radius:50px;background-color:#00285c}.text-block{margin-top:10px;font-size:16px}.text-block.italic{margin-top:28px;font-style:italic;font-weight:300}.body{font-family:Poppins,sans-serif;color:#00285c}.heading{margin-bottom:23px}.name{width:auto}a{text-decoration:none;color:#fff}</style> <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script> <script type="text/javascript">WebFont.load({google:{families:["Poppins:300,regular,italic,600"]}});</script> <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script> </head><body class="body"><div class="header"></div><div class="text_container"><h4 class="heading">Grazie per aver scelto Mobidoc!</h4><div class="text-block">Questa è la tua password generata dall amministratore <strong>' . $passwd . '</strong> contro la tua email <strong>' . $paziente_email . '</strong>. <br><br>La tua visita per ' . $visit_name . ' con: ';
$message3 .= "<br>è stata prenotata con successo. Sarai a breve contattato dal tuo Professionista Mobidoc con cui potrai concordare data e orario. <br> <br>
 Puoi aggiungere un evento di prenotazione sul tuo calendario di Google  
 <a target='_blank' style='color: blue; text-decoration: underline' href='https://calendar.google.com/calendar/u/0/r/eventedit?action=TEMPLATE&text=booking&dates=$start_dt/$end_dt&ctz=Europe/Rome'>da qui</a>
 .<br> <br>
 Questa email è stata generata da un sistema automatico, si prega di non rispondere.<br><br> Cordiali Saluti,<br> La Direzione Mobidoc</div> <br></div></body></html>";

mail($to3, $subject3, $message3, $headers3);
?>