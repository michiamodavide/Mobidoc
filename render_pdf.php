<?php

  /**
   * function renderPdf
   *
   */
   error_reporting(0); //hide php errors
  require_once('tcpdf/tcpdf.php');
//  function renderPdf ($bk_name, $bk_email)
//  {
	  $pdf = new \TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

	  $pdf->SetCreator(PDF_CREATOR);
	  $pdf->SetAuthor('Downloaded on '.date('Y-m-d').' at '.date('H:i:s'));
	 // $pdf->SetTitle($title);

	  // set margins
	  $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
	  $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);


    // disable footer
    $pdf->setPrintHeader(false);
    $pdf->setPrintFooter(false);

    // set cell padding
    $pdf->setCellPaddings( .5,0,.5,0 );

    // set auto page breaks
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

    // set image scale factor
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

    // add a page
    $pdf->AddPage();

     $pdf->WriteHTML(file_get_contents("emails_html/page1.php"));
      $pdf->WriteHTML(file_get_contents("emails_html/page2.php"));
      $pdf->WriteHTML(file_get_contents("emails_html/page3.php"));
      $pdf->WriteHTML(file_get_contents("emails_html/page4.php"));
      $pdf->WriteHTML("<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"utf-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <style>@charset \"utf-8\";body{font-family:Roboto;margin:0;padding:0;color:#000}p{color:#000;font-size:16px;line-height:30px;font-weight:300}a{transition:.3s linear;text-decoration:none}a:focus,a:hover{text-decoration:none}li,ul{list-style:none;margin:0;padding:0}h1{margin-top:0}.main-wraper{width:50%;margin:0 auto}.wraper{width:100%;display:block;clear:both;height:60px}.left-div{width:15%;float:left;padding-top:15px;font-size:16px;padding-right:3px}.right-div{width:84%;float:left}.form1{margin:50px 0;font-size:14px}.form1 .form-control{display:block;width:100%;height:auto;padding:6px 12px;font-size:14px;line-height:1.42857143;color:#555;background-color:#fff;background-image:none;border:none;border-bottom:1px solid #000;border-radius:0;-webkit-box-shadow:none;box-shadow:none;-webkit-transition:border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;-o-transition:border-color ease-in-out .15s,box-shadow ease-in-out .15s;transition:border-color ease-in-out .15s,box-shadow ease-in-out .15s}input:focus-visible{outline:0!important;box-sizing:none!important}p{font-size:16px;line-height:26px}p a{font-size:16px;line-height:26px;font-weight:700;color:#4472c4;text-decoration:underline}p a:hover{color:red}h1{font-size:22px;line-height:26px;text-align:center;font-weight:700;margin-bottom:20px}h2{font-size:18px;line-height:26px;font-weight:700}h3{font-size:18px;line-height:26px;font-weight:700;color:red;font-style:italic}h4{font-size:20px;line-height:26px;font-weight:700;color:red;font-style:italic;margin:50px 0}ul li{font-size:16px;line-height:26px;padding-left:20px;margin-left:15px}ul.dot li{font-size:16px;line-height:26px;list-style:disc;padding-left:20px;margin:20px 0 20px 15px}ol li{font-size:12px;line-height:22px;list-style:decimal;padding-left:20px;margin:20px 0 20px 15px}.line{border-bottom:1px solid #000;width:250px;display:block}ul.abc li{font-size:16px;line-height:22px;list-style:lower-alpha;padding-left:10px;margin:20px 0 20px 60px}ul.arrow{position:relative;list-style:none}ul.arrow li{margin-bottom:20px}ul.arrow li::before{content:'⮚';position:absolute;left:0;font-size:26px}ul.center-list{text-align:center;margin:50px 0}ul.center-list li{list-style:none;display:inline-block;margin:0 40px;font-weight:700}.page-number{font-size:18px;line-height:26px;text-align:center;font-weight:700;margin:40px 0;padding:30px 0 10px 0}@media only screen and (max-width:1600px){.right-div{width:75%}.left-div{width:17%}}@media only screen and (max-width:1536px){.left-div{width:18%}}@media only screen and (max-width:1440px){.left-div{width:19%}}@media only screen and (max-width:1367px){.left-div{width:20%}}@media only screen and (max-width:1300px){.left-div{width:21%}}@media only screen and (max-width:1024px){.right-div{width:60%}.left-div{width:35%}}@media only screen and (max-width:767px){.right-div{width:50%}.left-div{width:48%}}</style>
</head>
<body>
<div class=\"main-wraper\">
    <h3>Flag di presa visione</h3>
    <p>O – Ho letto e compreso l’<a href=\"#\">informativa privacy.</a></p>
            <div class=\"wraper form1\">
                <div class=\"left-div\">Luogo e Data:</div>
                <div class=\"right-div\">
                    <div class=\"form-group\">
                        <input type=\"email\" class=\"form-control\" id=\"\" placeholder=\"\">
                    </div>
                </div>
            </div>
            <div class=\"wraper\">
                <div class=\"left-div\">Nome e Cognome: ".$bk_email."</div>
                <div class=\"right-div\">
                    <div class=\"form-group\">
                        <input type=\"email\" class=\"form-control\" id=\"\" placeholder=\"\">
                    </div>
                </div>
            </div>
            <div class=\"wraper\">
                <div class=\"left-div\">Firma :</div>
                <div class=\"right-div\">
                    <div class=\"form-group\">
                        <input type=\"email\" class=\"form-control\" id=\"\" placeholder=\"\">
                    </div>
                </div>
            </div>
    <div class=\"page-number\">5</div>
</div>
</body>
</html>");
      $pdf->WriteHTML(file_get_contents("emails_html/page6.php"));

      $pdf_save_path = dirname(__FILE__).'\emails_html\generate_pdf';
      $fileNL = $pdf_save_path."\\".strtolower($bk_name).'.pdf';//Windows
    //$pdf->Output(strtolower(str_replace(' ', '-', $title)).'-'.date('Ymd-Hi').'.pdf', 'F');
    $pdf->Output($fileNL, 'I');

