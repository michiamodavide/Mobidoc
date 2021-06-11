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

$pdf->WriteHTML( file_get_contents( "emails_html/pdf2/page1.php" ) );
$html1 = '<br>
<p>Text-1</p>';
$pdf->writeHTMLCell( 0, 0, 50, 22, $html1, 0, 1, 0, true );

$html2 = '<br>
<p>Text-2</p>';
$pdf->writeHTMLCell( 0, 0, 135, 22, $html2, 0, 1, 0, true );

$html3 = '<br>
<p>Text-3</p>';
$pdf->writeHTMLCell( 0, 0, 45, 43, $html3, 0, 1, 0, true );

$html4 = '<br>
<p>Text-4</p>';
$pdf->writeHTMLCell( 0, 0, 40, 64, $html4, 0, 1, 0, true );

$html5 = '<br>
<p>Text-5</p>';
$pdf->writeHTMLCell( 0, 0, 115, 64, $html5, 0, 1, 0, true );

$html6 = '<br>
<p>Text-6</p>';
$pdf->writeHTMLCell( 0, 0, 185, 64, $html6, 0, 1, 0, true );

$html7 = '<br>
<p>Text-7</p>';
$pdf->writeHTMLCell( 0, 0, 35, 84, $html7, 0, 1, 0, true );

$html8 = '<br>
<p>Text-8</p>';
$pdf->writeHTMLCell( 0, 0, 80, 104, $html8, 0, 1, 0, true );

$pdf->SetMargins( PDF_MARGIN_LEFT, "0px", PDF_MARGIN_RIGHT );
$pdf->AddPage();



// set image scale factor
$pdf->setImageScale( "1.65" );
// add a page
$pdf->WriteHTML( file_get_contents( "emails_html/pdf2/page2.php" ) );
$html9 = '<br>
<p>Text-9</p>';
$pdf->writeHTMLCell( 0, 0, 25, 33, $html9, 0, 1, 0, true );

$html10 = '<br>
<p>Text-10</p>';
$pdf->writeHTMLCell( 0, 0, 85, 33, $html10, 0, 1, 0, true );

$html11 = '<br>
<p>Text-11</p>';
$pdf->writeHTMLCell( 0, 0, 160, 33, $html11, 0, 1, 0, true );

$html12 = '<br>
<p>Text-12</p>';
$pdf->writeHTMLCell( 0, 0, 27, 87, $html12, 0, 1, 0, true );

$html13 = '<br>
<p>Text-13</p>';
$pdf->writeHTMLCell( 0, 0, 125, 87, $html13, 0, 1, 0, true );

$html14 = '<br>
<p>Text-14</p>';
$pdf->writeHTMLCell( 0, 0, 43, 108, $html14, 0, 1, 0, true );

$html15 = '<br>
<p>Text-15</p>';
$pdf->writeHTMLCell( 0, 0, 110, 108, $html15, 0, 1, 0, true );

$html16 = '<br>
<p>Text-16</p>';
$pdf->writeHTMLCell( 0, 0, 182, 108, $html16, 0, 1, 0, true );

$html17 = '<br>
<p>Text-17</p>';
$pdf->writeHTMLCell( 0, 0, 24, 119, $html17, 0, 1, 0, true );

$html18 = '<br>
<p>Text-18</p>';
$pdf->writeHTMLCell( 0, 0, 59, 119, $html18, 0, 1, 0, true );

$html19 = '<br>
<p>Text-19</p>';
$pdf->writeHTMLCell( 0, 0, 89, 119, $html19, 0, 1, 0, true );

$html20 = '<br>
<p>Text-20</p>';
$pdf->writeHTMLCell( 0, 0, 117, 119, $html20, 0, 1, 0, true );

$html21 = '<br>
<p>Text-21</p>';
$pdf->writeHTMLCell( 0, 0, 175, 119, $html21, 0, 1, 0, true );

$html22 = '<br>
<p>Text-22</p>';
$pdf->writeHTMLCell( 0, 0, 25, 191, $html22, 0, 1, 0, true );

$html23 = '<br>
<p>Text-23</p>';
$pdf->writeHTMLCell( 0, 0, 95, 191, $html23, 0, 1, 0, true );

$html24 = '<br>
<p>Text-24</p>';
$pdf->writeHTMLCell( 0, 0, 44, 201, $html24, 0, 1, 0, true );

$html25 = '<br>
<p>Text-25</p>';
$pdf->writeHTMLCell( 0, 0, 24, 211, $html25, 0, 1, 0, true );


// set image scale factor
$pdf->setImageScale( "1.6" );



$pdf_save_path = dirname( __FILE__ ) . '/assets/generate_pdf';

$fileNL = $pdf_save_path . "/" . strtolower( $bk_name ) . '.pdf'; //Windows
//$pdf->Output(strtolower(str_replace(' ', '-', $title)).'-'.date('Ymd-Hi').'.pdf', 'F');
$pdf->Output( $fileNL, 'I' );