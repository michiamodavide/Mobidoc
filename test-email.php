<?php
ini_set( 'display_errors', 1 );
error_reporting( E_ALL );

$bk_email = $_GET['email'];
$bk_name = strtolower($_GET['name']);
$doctor_name = strtolower($_GET['dc']);

$contact_full_n = $bk_name;
$contact_fname = $bk_name;
$doctor_fname = $doctor_name;
include ("contact_pdf.php");
include ("executor_pdf.php");

echo $bk_email;
echo '<br>';

// Recipient
$to = $bk_email;
$subject = 'Nuova Prenotazione!';
// Sender
$from = 'mobidoc_update@mobidoc.it';
$rply_email = 'noreplay@mobidoc.it';

//if (isset($_GET['path']) && $_GET['path'] == 1){
//    // Attachment file
//    $file1 = "/assets/generate_pdf/".$bk_name.".pdf";
//}else{
//    // Attachment file
//    $file = "assets/generate_pdf/".$bk_name.".pdf";
//}

$pdf_file1 = "assets/generate_pdf/".$bk_name.".pdf";
$pdf_file2 = "assets/generate_pdf/".$doctor_fname.".pdf";


$pdf_files = array($pdf_file1,$pdf_file2);

// Email body content
$htmlContent = '<!DOCTYPE html><html data-wf-page="5dcd852d5095d024f8ea51ae" data-wf-site="5dcd852d5095d04927ea51ad"><head><meta charset="utf-8"><meta content="width=device-width, initial-scale=1" name="viewport"><meta content="Webflow" name="generator"><style>.header{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;width:100%;height:180px;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;-webkit-box-align:center;-webkit-align-items:center;-ms-flex-align:center;align-items:center;background-image:url("https://www.mobidoc.it/images/mailer_header.png");background-position:50% 50%, 50% 0%;background-size:100%,cover;background-repeat:no-repeat,repeat}.text_container{width:80%;min-height:150px;margin-top:70px;margin-right:auto;margin-left:auto}.button{margin:20px 20px 20px 0px;padding:16px 34px;border-radius:50px;background-color:#00285c}.text-block{margin-top:10px;font-size:16px}.text-block.italic{margin-top:28px;font-style:italic;font-weight:300}.body{font-family:Poppins,sans-serif;color:#00285c}.heading{margin-bottom:23px}.name{width:auto}a{text-decoration:none;color:#fff}</style> <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script> <script type="text/javascript">WebFont.load({google:{families:["Poppins:300,regular,italic,600"]}});</script> <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script> </head><body class="body"><div class="header"></div><div class="text_container"><h4 class="heading">Nuova Prenotazione!</h4><div class="text-block">'.$paziente_main_name.' Ha prenotato una visita da '.$doctor_main_name.'. <br><br>Questa email è stata generata da un sistema automatico, si prega di non rispondere.<br><br> Cordiali Saluti,<br> La Direzione Mobidoc</div> <br></div></body></html>';

// Header for sender info
$headers .= 'From: '.$from."\r\n". 'Reply-To: '.$rply_email."\r\n" .   'X-Mailer: PHP/' . phpversion();

// Boundary
$semi_rand = md5(time());
$mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";

// Headers for attachment
$headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\"";

// Multipart boundary
$message = "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"UTF-8\"\n" .
"Content-Transfer-Encoding: 7bit\n\n" . $htmlContent . "\n\n";

for ($px = 0; $px < count($pdf_files); $px++) {
// Preparing attachment
    if(!empty($pdf_files[$px]) > 0){
        if(is_file($pdf_files[$px])){
            $message .= "--{$mime_boundary}\n";
            $fp =    @fopen($pdf_files[$px],"rb");
            $data =  @fread($fp,filesize($pdf_files[$px]));

            @fclose($fp);
            $data = chunk_split(base64_encode($data));
            $message .= "Content-Type: application/octet-stream; name=\"".basename($pdf_files[$px])."\"\n" .
                "Content-Description: ".basename($file)."\n" .
                "Content-Disposition: attachment;\n" . " filename=\"".basename($pdf_files[$px])."\"; size=".filesize($pdf_files[$px]).";\n" .
                "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n";
        }
    }

    $message .= "--{$mime_boundary}--";
}
$returnpath = "-f" . $from;

// Send email
$mail = @mail($to, $subject, $message, $headers, $returnpath);

// Email sending status
echo $mail?"<h1>Email Sent Successfully!</h1>":"<h1>Email sending failed.</h1>";

//unlink($file);
?>