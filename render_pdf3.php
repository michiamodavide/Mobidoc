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

$pdf->WriteHTML( file_get_contents( "emails_html/pdf3/page1.php" ) );
// set image scale factor
$pdf->setImageScale( "1.65" );
// add a page
$pdf->WriteHTML( file_get_contents( "emails_html/pdf3/page2.php" ) );
// set image scale factor
$pdf->setImageScale( "1.6" );
$pdf->SetMargins( PDF_MARGIN_LEFT, "0px", PDF_MARGIN_RIGHT );
$pdf->AddPage();
$pdf->WriteHTML( file_get_contents( "emails_html/pdf3/page3.php" ) );
// set image scale factor
$pdf->setImageScale( "1.6" );
// add a page


$pdf->WriteHTML( file_get_contents( "emails_html/pdf3/page4.php" ) );
// set margins
$pdf->SetMargins( PDF_MARGIN_LEFT, "30px", PDF_MARGIN_RIGHT );
$pdf->setImageScale( "1.6" );
// add a page

$pdf->WriteHTML( file_get_contents( "emails_html/pdf3/page5.php" ) );

/*$html5 = '<br>
<p>Text-1</p>';
$pdf->writeHTMLCell( 0, 0, 60, 45, $html5, 0, 1, 0, true );

$html6 = '<br>
<p>Text-2</p>';
$pdf->writeHTMLCell( 0, 0, 60, 60, $html6, 0, 1, 0, true );

$html7 = '<br>
<p>Text-2</p>';
$pdf->writeHTMLCell( 0, 0, 60, 75, $html7, 0, 1, 0, true );*/


$pdf->SetMargins( PDF_MARGIN_LEFT, "0px", PDF_MARGIN_RIGHT );
$pdf->AddPage();
$pdf->WriteHTML( file_get_contents( "emails_html/pdf3/page6.php" ) );

$pdf->SetMargins( PDF_MARGIN_LEFT, "0px", PDF_MARGIN_RIGHT );
$pdf->AddPage();
$pdf->WriteHTML( file_get_contents( "emails_html/pdf3/page7.php" ) );



$html2 = '
<p>Text-1</p>';
$pdf->writeHTMLCell( 0, 0, 33, 51, $html2, 0, 1, 0, true );

$html3 = '
<p>Text-2</p>';
$pdf->writeHTMLCell( 0, 0, 40, 71, $html3, 0, 1, 0, true );
$html4 = '
<p>Text-3</p>';
$pdf->writeHTMLCell( 0, 0, 21, 91, $html4, 0, 1, 0, true );

$pdf->SetMargins( PDF_MARGIN_LEFT, "0px", PDF_MARGIN_RIGHT );
$pdf->AddPage();
$pdf->WriteHTML( file_get_contents( "emails_html/pdf3/page8.php" ) );

$html5 = '
<p>Text-5</p>';
$pdf->writeHTMLCell( 0, 0, 33, 127, $html5, 0, 1, 0, true );

$html6= '
<p>Text-6</p>';
$pdf->writeHTMLCell( 0, 0, 40, 147, $html6, 0, 1, 0, true );
$html7 = '
<p>Text-7</p>';
$pdf->writeHTMLCell( 0, 0, 22, 168, $html7, 0, 1, 0, true );



$pdf->SetMargins( PDF_MARGIN_LEFT, "0px", PDF_MARGIN_RIGHT );
$pdf->AddPage();
$pdf->WriteHTML( file_get_contents( "emails_html/pdf3/page9.php" ) );

$html8 = '
<p>Text-8</p>';
$pdf->writeHTMLCell( 0, 0, 33, 121, $html8, 0, 1, 0, true );

$html9= '
<p>Text-9</p>';
$pdf->writeHTMLCell( 0, 0, 40, 141, $html9, 0, 1, 0, true );
$html10 = '
<p>Text-10</p>';
$pdf->writeHTMLCell( 0, 0, 22, 161, $html10, 0, 1, 0, true );








$pdf_save_path = dirname( __FILE__ ) . '/assets/generate_pdf';

$fileNL = $pdf_save_path . "/" . strtolower( $bk_name ) . '.pdf'; //Windows
//$pdf->Output(strtolower(str_replace(' ', '-', $title)).'-'.date('Ymd-Hi').'.pdf', 'F');
$pdf->Output( $fileNL, 'I' );