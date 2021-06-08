<?php
ini_set( 'display_errors', 1 );
error_reporting( E_ALL );

$bk_email = $_GET['email'];
$bk_name = $_GET['name'];

echo $bk_email;
echo '<br>';

// Recipient
$to = $bk_email;

// Sender
$from = 'mobidoc_update@mobidoc.it';
$fromName = 'Mobidoc Test';

// Email subject
$subject = 'PHP Email with Attachment by CodexWorld';

// Attachment file
$file = "assets/generate_pdf/hamid3.pdf";

// Email body content
$htmlContent = ' 
    <h3>PHP Email with Attachment by CodexWorld</h3> 
    <p>This email is sent from the PHP script with attachment.</p> 
';

// Header for sender info
$headers = "From: $fromName"." <".$from.">";

// Boundary
$semi_rand = md5(time());
$mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";

// Headers for attachment
$headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\"";

// Multipart boundary
$message = "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"UTF-8\"\n" .
"Content-Transfer-Encoding: 7bit\n\n" . $htmlContent . "\n\n";

// Preparing attachment
if(!empty($file) > 0){
    if(is_file($file)){
        $message .= "--{$mime_boundary}\n";
        $fp =    @fopen($file,"rb");
        $data =  @fread($fp,filesize($file));

        @fclose($fp);
        $data = chunk_split(base64_encode($data));
        $message .= "Content-Type: application/octet-stream; name=\"".basename($file)."\"\n" .
        "Content-Description: ".basename($file)."\n" .
        "Content-Disposition: attachment;\n" . " filename=\"".basename($file)."\"; size=".filesize($file).";\n" .
        "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n";
    }
}
$message .= "--{$mime_boundary}--";
$returnpath = "-f" . $from;

// Send email
$mail = @mail($to, $subject, $message, $headers, $returnpath);

// Email sending status
echo $mail?"<h1>Email Sent Successfully!</h1>":"<h1>Email sending failed.</h1>";




//
////include ("render_pdf.php");
////renderPdf($bk_name, $bk_email);
//
//$to = $bk_email;
//$subject = 'Nuova Prenotazione!';
//$from = 'mobidoc_update@mobidoc.it';
//$rply_email = 'noreplay@mobidoc.it';
//
//// To send HTML mail, the Content-type header must be set
//$headers  = 'MIME-Version: 1.0' . "\r\n";
//$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
//
//// Create email headers
//$headers .= 'From: '.$from."\r\n". 'Reply-To: '.$rply_email."\r\n" .   'X-Mailer: PHP/' . phpversion();
//
//
//$file = 'assets/generate_pdf/hamid3.pdf';
//// Boundary
//$semi_rand = md5(time());
//$mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";
//// Headers for attachment
//$headers .= "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\"";
////$message123 = "This is test email";
//
//$paziente_main_name  = "New Name";
//$doctor_main_name  = "New Doctr";
//$message_email = '<!DOCTYPE html><html data-wf-page="5dcd852d5095d024f8ea51ae" data-wf-site="5dcd852d5095d04927ea51ad"><head><meta charset="utf-8"><meta content="width=device-width, initial-scale=1" name="viewport"><meta content="Webflow" name="generator"><style>.header{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;width:100%;height:180px;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;-webkit-box-align:center;-webkit-align-items:center;-ms-flex-align:center;align-items:center;background-image:url("https://www.mobidoc.it/images/mailer_header.png");background-position:50% 50%, 50% 0%;background-size:100%,cover;background-repeat:no-repeat,repeat}.text_container{width:80%;min-height:150px;margin-top:70px;margin-right:auto;margin-left:auto}.button{margin:20px 20px 20px 0px;padding:16px 34px;border-radius:50px;background-color:#00285c}.text-block{margin-top:10px;font-size:16px}.text-block.italic{margin-top:28px;font-style:italic;font-weight:300}.body{font-family:Poppins,sans-serif;color:#00285c}.heading{margin-bottom:23px}.name{width:auto}a{text-decoration:none;color:#fff}</style> <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script> <script type="text/javascript">WebFont.load({google:{families:["Poppins:300,regular,italic,600"]}});</script> <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script> </head><body class="body"><div class="header"></div><div class="text_container"><h4 class="heading">Nuova Prenotazione!</h4><div class="text-block">'.$paziente_main_name.' Ha prenotato una visita da '.$doctor_main_name.'. <br><br>Questa email è stata generata da un sistema automatico, si prega di non rispondere.<br><br> Cordiali Saluti,<br> La Direzione Mobidoc</div> <br></div></body></html>';
//
//
//// Multipart boundary
//$message123 = "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"UTF-8\"\n" .
//    "Content-Transfer-Encoding: 7bit\n\n" . $message_email . "\n\n";
//
//
//// Preparing attachment
//if(!empty($file) > 0){
//    if(is_file($file)){
//        $message123 .= "--{$mime_boundary}\n";
//        $fp =    @fopen($file,"rb");
//        $data =  @fread($fp,filesize($file));
//
//        @fclose($fp);
//        $data = chunk_split(base64_encode($data));
//        $message123 .= "Content-Type: application/octet-stream; name=\"".basename($file)."\"\n" .
//            "Content-Description: ".basename($file)."\n" .
//            "Content-Disposition: attachment;\n" . " filename=\"".basename($file)."\"; size=".filesize($file).";\n" .
//            "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n";
//    }
//}
//$message123 .= "--{$mime_boundary}--";
//$pdf_file_path = "-f" . $from;
//
//
////mail($to, $subject, $message123, $headers);
//
//if (mail($to, $subject, $message123, $headers, $pdf_file_path))
//{
//    echo "Message accepted";
//}
//else
//{
//    echo "Error: Message not accepted";
//}

//unlink($fileNL);

?>