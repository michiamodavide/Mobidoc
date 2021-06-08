<?php


$bk_email = $_GET['email'];
$bk_name = $_GET['name'];

include ("render_pdf.php");
//renderPdf($bk_name, $bk_email);

$to = $bk_email;
$subject = 'Nuova Prenotazione!';
$from = 'mobidoc_update@mobidoc.it';
$rply_email = 'noreplay@mobidoc.it';

// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Create email headers
$headers .= 'From: '.$from."\r\n". 'Reply-To: '.$rply_email."\r\n" .   'X-Mailer: PHP/' . phpversion();

$message123 = "This is test email";


// Preparing attachment
if(!empty($file) > 0){
    if(is_file($file)){
        $fp =    @fopen($file,"rb");
        $data =  @fread($fp,filesize($file));

        @fclose($fp);
        $data = chunk_split(base64_encode($data));
        $message123 .= "Content-Type: application/octet-stream; name=\"".basename($file)."\"\n" .
            "Content-Description: ".basename($file)."\n" .
            "Content-Disposition: attachment;\n" . " filename=\"".basename($file)."\"; size=".filesize($file).";\n" .
            "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n";
    }
}
$pdf_file_path = "-f" . $from;


mail($to, $subject, $message123, $headers, $pdf_file_path);


?>