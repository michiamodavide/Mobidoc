<?PHP
session_start();
$name = $_REQUEST["name"];
$email = $_REQUEST["email"];
$msg = $_REQUEST["message"];


$to = 'info@mobidoc.it'; //admin email
$subject = 'Nuova Richiesta!';
$from = 'mobidoc_update@mobidoc.it';
$rply_email = 'noreplay@mobidoc.it';
								
// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
								
// Create email headers
$headers .= 'From: '.$from."\r\n". 'Reply-To: '.$rply_email."\r\n" .   'X-Mailer: PHP/' . phpversion();
								
// Compose a simple HTML email message
$message = '<!DOCTYPE html><html data-wf-page="5dcd852d5095d024f8ea51ae" data-wf-site="5dcd852d5095d04927ea51ad"> <head> <meta charset="utf-8"> <meta content="width=device-width, initial-scale=1" name="viewport"> <meta content="Webflow" name="generator"> <style>.header{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;width:100%;height:180px;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;-webkit-box-align:center;-webkit-align-items:center;-ms-flex-align:center;align-items:center;background-image:url("https://www.mobidoc.it/images/mailer_header.png");background-position:50% 50%, 50% 0%;background-size:100%,cover;background-repeat:no-repeat,repeat}.text_container{width:80%;min-height:150px;margin-top:70px;margin-right:auto;margin-left:auto}.button{margin:20px 20px 20px 0px;padding:16px 34px;border-radius:50px;background-color:#00285c}.text-block{margin-top:10px;font-size:16px}.text-block.italic{margin-top:28px;font-style:italic;font-weight:300}.body{font-family:Poppins,sans-serif;color:#00285c}.heading{margin-bottom:23px}.name{width:auto}a{text-decoration:none;color:#fff}</style> <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script> <script type="text/javascript">WebFont.load({google:{families:["Poppins:300,regular,italic,600"]}});</script> <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script> </head> <body class="body"> <div class="header"></div><div class="text_container"> <h4 class="heading">Nuova Richiesta</h4> <div class="text-block"> <table> <tr> <td><b>Nome<b></td><td style="padding-left:30px;">'.$name.'</td></tr><tr> <td><b>Email</b></td><td style="padding-left:30px;">'.$email.'</td></tr><tr> <td><b>Messaggio</b></td><td style="padding-left:30px;">'.$msg.'</td></tr></table> <br><br>Questa email è stata generata da un sistema automatico, si prega di non rispondere.<br><br>Cordiali Saluti,<br>La Direzione Mobidoc </div><br></div></body></html>';

if(mail($to, $subject, $message, $headers)){
	echo '<div class="contact_sucess"><div class="text-block-82">Grazie! Abbiamo ricevuto la tua richiesta con successo. </div></div>';
} else {
	echo '<div class="contact_sucess" style="background:rgba(218, 57, 57, 0.15);"><div class="text-block-82">Siamo spiacienti. Si è verificato un errore. Riprova più tardi.</div></div>';
}
	
        
?>
