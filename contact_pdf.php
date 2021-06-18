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

     $pdf->WriteHTML(file_get_contents($pdf_file_path."emails_html/page1.php"));
   // set image scale factor
     $pdf->setImageScale("1.65");
   // add a page
      $pdf->WriteHTML(file_get_contents($pdf_file_path."emails_html/page2.php"));
    // set image scale factor
    $pdf->setImageScale("1.6");
      $pdf->WriteHTML(file_get_contents($pdf_file_path."emails_html/page3.php"));
    // set image scale factor
   $pdf->setImageScale("1.4");
    // add a page

      $pdf->WriteHTML(file_get_contents($pdf_file_path."emails_html/page4.php"));
   // set margins
  $pdf->SetMargins(PDF_MARGIN_LEFT, "30px", PDF_MARGIN_RIGHT);
     $pdf->setImageScale("1.6");
    // add a page

$pdf->WriteHTML(file_get_contents($pdf_file_path."emails_html/page5.php"));
$html2 = '<br><p>'.$contact_full_n.'</p>';
$pdf->writeHTMLCell(0, 0, 100, 70, $html2, 0, 1, 0, true);
// add a page
$pdf->AddPage();
      $pdf->WriteHTML(file_get_contents($pdf_file_path."emails_html/page6.php"));



      $pdf_save_path = dirname(__FILE__).'/assets/generate_pdf';

      $fileNL = $pdf_save_path."/mobidoc1.pdf";
      //$fileNL = $pdf_save_path."\\".strtolower($contact_fname).'.pdf';//Windows
    //$pdf->Output(strtolower(str_replace(' ', '-', $title)).'-'.date('Ymd-Hi').'.pdf', 'F');
    $pdf->Output($fileNL, 'F');

