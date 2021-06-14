<?php

/**
 * function renderPdf
 *
 */
error_reporting( 0 ); //hide php errors
require_once( 'tcpdf/tcpdf.php' );
//  function renderPdf ($bk_name, $bk_email)
//  {
$pdf = new\ TCPDF( PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false );

$pdf->SetCreator( PDF_CREATOR );
$pdf->SetAuthor( 'Downloaded on ' . date( 'Y-m-d' ) . ' at ' . date( 'H:i:s' ) );
// $pdf->SetTitle($title);

// set margins
$pdf->SetMargins( PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT );
$pdf->SetHeaderMargin( PDF_MARGIN_HEADER );


// disable footer
$pdf->setPrintHeader( false );
$pdf->setPrintFooter( false );

// set cell padding
$pdf->setCellPaddings( .5, 0, .5, 0 );

// set auto page breaks
$pdf->SetAutoPageBreak( TRUE, PDF_MARGIN_BOTTOM );

// set image scale factor
$pdf->setImageScale( PDF_IMAGE_SCALE_RATIO );

// add a page
$pdf->AddPage();
$pdf->setImageScale("2.1");
$pdf->WriteHTML( file_get_contents( "emails_html/pdf2/page1.php" ) );
$html1 = '<br>
<p>'.$contact_fname.'</p>';
$pdf->writeHTMLCell( 0, 0, 75, 14, $html1, 0, 1, 0, true );

$html2 = '<br>
<p>'.$contact_surname.'</p>';
$pdf->writeHTMLCell( 0, 0, 160, 14, $html2, 0, 1, 0, true );

$html3 = '<br>
<p></p>';
$pdf->writeHTMLCell( 0, 0, 106, 25, $html3, 0, 1, 0, true );

$html4 = '<br>
<p></p>';
$pdf->writeHTMLCell( 0, 0, 62, 35, $html4, 0, 1, 0, true );

$html5 = '<br>
<p></p>';
$pdf->writeHTMLCell( 0, 0, 125, 35, $html5, 0, 1, 0, true );

$html6 = '<br>
<p></p>';
$pdf->writeHTMLCell( 0, 0, 176	, 35, $html6, 0, 1, 0, true );

$html7 = '<br>
<p>'.$contact_phone.'</p>';
$pdf->writeHTMLCell( 0, 0, 102, 46, $html7, 0, 1, 0, true );

$html8 = '<br>
<p>'.$contact_email.'</p>';
$pdf->writeHTMLCell( 0, 0, 127, 56, $html8, 0, 1, 0, true );

$html9 = '<br>
<p>'.$p_first_name.'</p>';
$pdf->writeHTMLCell( 0, 0, 50, 178, $html9, 0, 1, 0, true );

$html10 = '<br>
<p>'.$p_last_name.'</p>';
$pdf->writeHTMLCell( 0, 0, 148, 178, $html10, 0, 1, 0, true );

$html11 = '<br>
<p>'.$patient_fiscal.'</p>';
$pdf->writeHTMLCell( 0, 0, 105, 188, $html11, 0, 1, 0, true );

$html12 = '<br>
<p>'.$patient_address.'</p>';
$pdf->writeHTMLCell( 0, 0, 55, 199, $html12, 0, 1, 0, true );

$html13 = '<br>
<p>'.$patient_address.'</p>';
$pdf->writeHTMLCell( 0, 0, 115, 199, $html13, 0, 1, 0, true );

$html14 = '<br>
<p></p>';
$pdf->writeHTMLCell( 0, 0, 173, 199, $html14, 0, 1, 0, true );

$pdf->AddPage();

// set image scale factor
$pdf->setImageScale( "1.65" );
// add a page
$pdf->WriteHTML( file_get_contents( "emails_html/pdf2/page2.php" ) );
$html9 = '<br>
<p></p>';
$pdf->writeHTMLCell( 0, 0, 35, 33, $html9, 0, 1, 0, true );

$html10 = '<br>
<p></p>';
$pdf->writeHTMLCell( 0, 0, 95, 33, $html10, 0, 1, 0, true );

$html11 = '<br>
<p></p>';
$pdf->writeHTMLCell( 0, 0, 170, 33, $html11, 0, 1, 0, true );

$html12 = '<br>
<p></p>';
$pdf->writeHTMLCell( 0, 0, 50, 87, $html12, 0, 1, 0, true );

$html13 = '<br>
<p></p>';
$pdf->writeHTMLCell( 0, 0, 150, 87, $html13, 0, 1, 0, true );

$html14 = '<br>
<p></p>';
$pdf->writeHTMLCell( 0, 0, 100, 98, $html14, 0, 1, 0, true );

$html15 = '<br>
<p></p>';
$pdf->writeHTMLCell( 0, 0, 62, 108, $html15, 0, 1, 0, true );

$html16 = '<br>
<p></p>';
$pdf->writeHTMLCell( 0, 0, 135, 108, $html16, 0, 1, 0, true );

$html17 = '<br>
<p></p>';
$pdf->writeHTMLCell( 0, 0, 182, 108, $html17, 0, 1, 0, true );

$html18 = '<br>
<p></p>';
$pdf->writeHTMLCell( 0, 0, 31, 119, $html18, 0, 1, 0, true );

$html19 = '<br>
<p></p>';
$pdf->writeHTMLCell( 0, 0, 70	, 119, $html19, 0, 1, 0, true );

$html20 = '<br>
<p></p>';
$pdf->writeHTMLCell( 0, 0, 155, 119, $html20, 0, 1, 0, true );





$html24 = '<br>
<p>'.$contact_name.'</p>';
$pdf->writeHTMLCell( 0, 0, 105, 207, $html24, 0, 1, 0, true );






$pdf_save_path = dirname( __FILE__ ) . '/assets/generate_pdf';

$fileNL = $pdf_save_path . "/" . strtolower($doctor_fname).'.pdf';
//$pdf->Output(strtolower(str_replace(' ', '-', $title)).'-'.date('Ymd-Hi').'.pdf', 'F');
$pdf->Output( $fileNL, 'F' );