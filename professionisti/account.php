<?php session_start();

if (!isset($_SESSION['doctor_email'])) {
  header("Location: login.php");
}

include '../connect.php';
$sql3 = "select * from doctor_profile where email ='" . $_SESSION['doctor_email'] . "'";
$result3 = mysqli_query($conn, $sql3);
$rows3 = mysqli_fetch_array($result3);
?>
<!DOCTYPE html>
<html data-wf-page="5daae10f508f046541f51898" data-wf-site="5d8cfd454ebd737ac1a48727">
	<style>
		 .active{
		 margin-left:20px;
		 font-weight: bold;
		 border-bottom:1px solid rgba(12, 217, 237, 0.7);
		  background-color: rgba(211, 251, 255, 0.48);
		 padding: 10px 10px;
		 border-top:none;
	 border-right:none;
	 border-left:none;
	     border-radius: 5px;
	 }
		ul.list{
			margin: 0;
			padding: 0 0 0 20px !important;
		}
		ul.list li{
			list-style: decimal;
			text-align: left;
			margin-bottom: 10px;
			font-size: 14px;
    font-weight: 400;
			color: #00285c;
			    padding-left: 10px;
		}
	</style>
<head>
 <meta charset="utf-8">
 <title>Profile</title>
 <meta content="Profile" property="og:title">
 <meta content="width=device-width, initial-scale=1" name="viewport">
 <meta content="Webflow" name="generator">
 <link href="../css/normalize.css" rel="stylesheet" type="text/css">
 <link href="../css/webflow.css" rel="stylesheet" type="text/css">
 <link href="../css/mobidoc.webflow.css" rel="stylesheet" type="text/css">
 <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script>
 <script
  type="text/javascript">WebFont.load({google: {families: ["Montserrat:100,100italic,200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic", "Poppins:100,100italic,200,300,300italic,regular,500,600,700,800,900", "PT Serif Caption:regular"]}});</script>
 <!-- [if lt IE 9]>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js" type="text/javascript"></script>
 <![endif] -->
 <script type="text/javascript">!function (o, c) {
     var n = c.documentElement, t = " w-mod-";
     n.className += t + "js", ("ontouchstart" in o || o.DocumentTouch && c instanceof DocumentTouch) && (n.className += t + "touch")
   }(window, document);</script>
 <link href="../images/favicon.png" rel="shortcut icon" type="image/x-icon">
 <link href="../images/webclip.png" rel="apple-touch-icon">
 <link href="../css/new-styles.css?v=3" rel="stylesheet" type="text/css">
 <link href="/paziente/dist/css/datepicker.css" rel="stylesheet" type="text/css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
 <script src="https://kit.fontawesome.com/3f12b8b553.js" crossorigin="anonymous"></script>
 <link href="../dist/css/selectize.default.css?v=1" rel="stylesheet"/>
 <script src="../dist/js/standalone/selectize.min.js"></script>
 <style>
  ::-webkit-scrollbar {
   width: 0px;
   height: 0px;
  }

  .p {
   text-align-last: center !important;
  }

  .open {
   height: auto;
  }
  .button-5{
   font-size: 11px;
  }
	 .status_style, .vis_text{
		 font-size:11px;
		 line-height: normal;
		 margin-bottom: 20px;
	 }
	 .green-btn{
		 
   border: 1px solid #ddd;
padding: 13px 30px;
    border-radius: 50px;
		 margin-bottom: 15px;
		     font-family: Poppins, sans-serif;
    font-size: 11px;
	 }
	 
	 
	 .account-1 .appointment {

    -ms-grid-columns: 160px 1fr 180px;
    grid-template-columns: 160px 1fr 180px;
   
}
	 .ping-bg{
		 background-color: #f8dbdb !important;
	 }
	 .ping-bg:hover{
		 opacity: 0.8;
	 }
	  .account-1 .text-block-62 {
  
    line-height: 26px !important;
}
	 .no_active_btn:hover, .active_btn:hover{
   opacity: .7 !important;
  }
/******************************************/	 
  @media screen and (max-width: 767px){

	  	  
   .button-5.faded.diff{
    display: block;
   }
   .view_details_button{
    display: none !important;
   }
	  .account-1 .appointments_container {
    width: 96%;
}
	.account-1 .text_container {
    width: 100%;
    
}  
	.account-1  .pateint_message {  
    padding: 12px 12px 12px 12px; 	  	 	  
  }
	  
.account-1 .heading {
    width: 90%;
  
}	  
	  
	.active {
		margin-left: 00px;}  
	  
	 }
.account-1 .div-block-61 {
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    width: 100%;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -webkit-flex-direction: row;
    -ms-flex-direction: row;
    flex-direction: column;
    -webkit-box-pack: justify;
    -webkit-justify-content: space-between;
    -ms-flex-pack: justify;
    justify-content: space-between;
    -webkit-box-align: center;
    -webkit-align-items: center;
    -ms-flex-align: center;
    align-items: center;
    -webkit-box-ordinal-group: 0;
    -webkit-order: -1;
    -ms-flex-order: -1;
    order: -1;
}	 
/*************************************************/	 
  
 </style>
 <script>
   function complete_visit(value, value2, value3, value4) {
     var a = "complete_visit.php?pid=" + value + "&b=" + value2 + "&d=" + value3 + "&p=" + value4;
     window.location.href = a;
     /*var xmlhttp2 = new XMLHttpRequest();
     xmlhttp2.onreadystatechange = function() {
       if (this.readyState == 4 && this.status == 200) {
         setTimeout(function(){ location.reload(); }, 500);
       }
     };
     xmlhttp2.open("GET", "complete_visit.php?pid=" + value + "&b=" +value2+ "&d=" +value3+ "&p=" +value4, true);
     xmlhttp2.send();*/
   }

   function complete_visit_cash(value, value2) {
     var xmlhttp2 = new XMLHttpRequest();
     xmlhttp2.onreadystatechange = function () {
       if (this.readyState == 4 && this.status == 200) {
         setTimeout(function () {
           location.reload();
         }, 500);
       }
     };
     xmlhttp2.open("GET", "complete_visit_cash.php?q=" + value + "&c=" + value2, true);
     xmlhttp2.send();
   }
   function confirm_doc_vst(value, value2) {
     var xmlhttp2 = new XMLHttpRequest();
     xmlhttp2.onreadystatechange = function () {
       if (this.readyState == 4 && this.status == 200) {
         setTimeout(function () {
           location.reload();
         }, 500);
       }
     };
     xmlhttp2.open("GET", "confirm_doc_visit.php?q=" + value + "&c=" + value2, true);
     xmlhttp2.send();
   }
 </script>
</head>
<body class="account-1">

<?php include '../header-prof.php'; ?>
<div class="master_head profile">
 <div class="custom_container prfo_profile_head">
  <div class="prof_data_container">

   <div class="prof_profile_image_container">

    <div class="image-21"
         style="width:100%; height:100%; background: url('<?PHP echo $photo; ?>'); background-position:center; background-size:cover;"></div>
   </div>
   <div class="div-block-58">
    <h1 class="prof_name"><?PHP echo $fname . " " . $lname; ?></h1>
    <div class="text-block-61"><?PHP echo $title; ?></div>
   </div>
  </div>
  <div class="cover_section_buttons_container">
    <?php
    /*
    if($rows3['active'] =='Y'){
      ?>
     <a href="doc_active.php?a=N&email=<?php echo urlencode($rows3['email']);?>" class="button-9 stroked cover_btns w-button active_btn" style="margin-top: 10px;background-color: #00800052;">Attivo</a>
    <?php }else{?>

     <a href="doc_active.php?a=Y&email=<?php echo urlencode($rows3['email']);?>" class="button-9 stroked cover_btns w-button no_active_btn" style="margin-top: 10px;background-color: #ff0000b5;">Non Attivo</a>
    <?php } */?>
   <a href="logout.php" class="button-9 stroked cover_btns logout w-button">Esci</a>
  </div>
 </div>
</div>

<section class="section-32">
 <div class="custom_container prof_accoutn_data">
  <div class="appointments">
   <h2 class="heading-20">Le tue Visite</h2>
   <div class="appointments_container">

     <?php
     include '../connect.php';

     if ($rows3['puo_refertare'] == 'Y'){
       $cur_doctor = 0;
       $sql = "select * from bookings where refertatore_id ='" . $rows3['doctor_id'] . "' order by booking_id desc";
     }else{
       $cur_doctor = 1;
      $sql = "select * from bookings where doctor_id ='" . $rows3['doctor_id'] . "' order by booking_id desc";
     }

     $result = mysqli_query($conn, $sql);
     $count = mysqli_num_rows($result);
     if ($count < 1) {
       ?>
      <div class="appointment" style="display:block;">
       <div class="data_container">
        <span class="paziente_name" style="font-size:18px;">Non hai prenotazioni.</span>
       </div>
      </div>
     <?php } else { ?>

       <?php
       while ($rows = mysqli_fetch_array($result)) {
         $price = $rows['price'];
         $discounted_price = $rows['total_discount'];
         $payment_status = $rows['payment_status'];
         $booking_id = $rows['booking_id'];
         $refertatore_id = $rows['refertatore_id'];
         $opoint_time = $rows['apoint_time'];
         $booking_status = $rows['booking_status'];
           $payment_mode = $rows['payment_mode'];

         if ($payment_status == 0) {
           $payment_status = "Authorized, Not Captured";
         }
         if ($payment_status == 1) {
           $payment_status = "Authorized, Payment Captured";
         }


         $booked_service_query = "select article_id from booked_service where booking_id='" . $booking_id . "'";
         $booked_service_result = mysqli_query($conn, $booked_service_query);
         $booked_service_row = mysqli_fetch_array($booked_service_result);

         $article_id = $booked_service_row['article_id'];
         $get_visit_query = "select descrizione from articlesMobidoc where id='" . $article_id . "'";
         $get_visit_result = mysqli_query($conn, $get_visit_query);
         $get_visit_row = mysqli_fetch_array($get_visit_result);

         $visit_name = $get_visit_row['descrizione'];
         $message = $rows['message'];
         $date_of_booking = $rows['date_of_booking'];
         $date_of_booking_string = "'" . $date_of_booking . "'";
         //Patient Rows
         $patient_id = $rows['patient_id'];
         $patient_sql = "select * from paziente_profile where paziente_id ='" . $patient_id . "'";
         $patient_sql_result = mysqli_query($conn, $patient_sql);
         $patient_rows = mysqli_fetch_array($patient_sql_result);

         /*get contact data*/
         $contact_data_query = "select * from contact_profile where id='" . $patient_rows['contact_id'] . "'";
         $contact_data_result = mysqli_query($conn, $contact_data_query);
         $contact_data_row = mysqli_fetch_array($contact_data_result);

         //Doctor Rows
         $doctor_id = $rows['doctor_id'];
         $doctor_sql = "select * from doctor_profile where doctor_id ='" . $doctor_id . "'";
         $doctor_sql_result = mysqli_query($conn, $doctor_sql);
         $doctor_rows = mysqli_fetch_array($doctor_sql_result);
         $current_doc_name = $doctor_rows['fname'].' '.$doctor_rows['lname'];

         //reporter data
         $refreter_name = '';
         if ($refertatore_id){
           $ref_sql = "select * from doctor_profile where doctor_id ='" . $refertatore_id . "'";
           $ref_sql_result = mysqli_query($conn, $ref_sql);
           $ref_rows = mysqli_fetch_array($ref_sql_result);
           $current_ref_name = $ref_rows['fname'].' '.$ref_rows['lname'];
         }

         ?>

        <div class="appointment">
         <div class="div-block-61">
          <div class="patient_profile_image" style="position:relative;">
            <?php if ($rows['doctor_booking_status'] == 1 && $rows['patient_confirmation'] == 0) { ?>
             <div class="booking_completed done" style="background-color: rgba(255, 221, 0, 0.5);">
              <img src="../images/Path-107.svg" width="59" alt="">
             </div>
            <?php } ?>
            <?php if ($rows['doctor_booking_status'] == 1 && $rows['patient_confirmation'] == 1) { ?>
             <div class="booking_completed done" style="background-color: rgba(73, 255, 155, 0.51);"><img
               src="../images/Path-107.svg" width="59" alt=""></div>
            <?php } ?>
           <div
            style="background:red; width:100%; height:100%; background:url('<?php echo "../paziente/" . $patient_rows['photo'] ?>') no-repeat center center / cover;"></div>
          </div>

          <div class="price_container">
           <div class="text-block-65">Prezzo Visita</div>
           <div class="price_euro">
               <span class="text-span-5"></span>

           <?php
           if ($discounted_price){
           ?>
               <strike style="color:red">
                   <span class="total_amount" style="color:#00285c"><?php echo '€' . $price; ?></span>
               </strike>
               <?php
               echo '€' . $discounted_price;
           }else{?>
               <span class="total_amount" style="color:#00285c"><?php echo '€' . $price; ?></span>
           <?php }?>
               <br>
               <br>

             <div>
                 <?php
                 if ($cur_doctor == 1 && $rows['admin_book'] != 1 && !empty($booking_status)){
                 $flag_status_txt = '0';
                 $flag_status_txt = array('','Email Inviata','Confermato','Eseguito','Refertato','Pagato');

                     $new_status = $booking_status+1;
                     if ($booking_status==1){
                     ?>
                     <div class="bok_status status_style">Confirm the booking status after contacting the patient.</div>
                     <?php }else{?>
                         <div class="green-btn"><?=$flag_status_txt[$booking_status]?></div>
                         <?php }
                     if ($booking_status == 1 || $booking_status == 2){
                     ?>

                         <a href="/booking_status.php?bkg_id=<?php echo $booking_id?>&booking_flag=<?php echo $new_status?>" class="ping-bg button-5 faded diff w-button ">
                             <?=$flag_status_txt[$booking_status+1]?>
                         </a>
                 <?php }}?>
             </div>
           </div>
          </div>

         </div>
         <div class="data_container">
          <h3 class="paziente_name"><?php echo $patient_rows['first_name'] . " " . $patient_rows['last_name'] ?></h3>
          <div class="paziente_data_block">
           <div class="text-block-63">Prenotato per</div>
           <div class="text-block-62"><?php echo $visit_name; ?></div>
          </div>

          <div class="paziente_data_block">
           <div class="text-block-63">Professionista</div>

           <?php
           if ($cur_doctor == 1) {
             ?>

            <div class="text-block-62"><?php echo $current_doc_name; ?></div>
             <?php
           }else {

             ?>
            <div class="text-block-62"><?php echo $current_ref_name; ?></div>
             <?php
           }
             ?>
          </div>

          <div class="paziente_data_block">
           <div class="text-block-63">Indirizzo</div>
           <div class="text-block-64"><?php echo $patient_rows['address']; ?>
           </div>
          </div>
         </div>

         <div class="appoint_buttons_container book_btn_<?php echo $rows['booking_id']?>">
          <a href="tel:<?php echo $contact_data_row['phone']; ?>" class="button-5 w-button">Chiama contatto</a>
          <a href="#" class="button-5 faded diff w-button view_details_button">Vedi Dettagli Visita</a>

          <?php  if ($rows3['puo_refertare'] != 'Y'){?>
           <?php if ($rows['doctor_booking_status'] == 0) {
               if ($booking_status < 3){
                echo '<style>.appoint_buttons_container.book_btn_'.$rows['booking_id'].' .exam-share-btn, .appoint_buttons_container.book_btn_'.$rows['booking_id'].' .visit_complete{pointer-events: none !important;opacity: 0.4 !important;}</style>';
               }
               ?>
            <a data-w-id="5287ebc5-906c-b8a2-9414-a7b9a3835c86" href="#" class="button-5 visit_complete w-button">Visita Completata</a>
            <a href="javascript:;" visit-name="<?php echo $visit_name; ?>" article-id="<?php echo $article_id; ?>" data-id="<?php echo $booking_id?>" curr-doc-nam="<?php echo $current_doc_name?>" curr-doc-id="<?php echo $doctor_id?>" class="button-5 faded diff w-button exam-share-btn" style="background-color: #0ce5b2;">Condividi esame</a>
            <a href="/professionisti/edit-booking.php?bookid=<?php echo $booking_id?>&article_id=<?=$article_id?>&visit_name=<?=$visit_name?>" class="button-5 faded diff w-button edit-booking-btn" style="background-color: #f8dbdb;;">Modifica</a>
           <?php } ?>
        <?php if ($rows['admin_book'] == 1){
                   if (empty($rows['total_discount'])) {
                       ?>
                       <a href="#" onClick="confirm_doc_vst(<?php echo $patient_id . ',' . $booking_id; ?>)"
                          class="button-5 faded diff w-button" style="background-color: #ebeef2;">Conferma
                           prenotazione</a>

                       <?php
                   }else{
                       ?>
                       <div class="vis_text">Confirmation for this discounted visit is connected to the visit below.</div>
                   <?php }
              echo '<style>.appoint_buttons_container.book_btn_'.$rows['booking_id'].' a{pointer-events: none !important;opacity: 0.4 !important;}  .appoint_buttons_container.book_btn_'.$rows['booking_id'].' a:nth-child(6){pointer-events: inherit !important;opacity: inherit !important;}</style>';
          }}else{?>
           <a href="tel:<?php echo $doctor_rows['phone']; ?>" class="button-5 faded diff w-button" style="background-color: rgba(0, 0, 0, 0.7); color: white;">Chiama Professionista</a>
           <a href="<?php echo '/il-team/professionista.php?'.$doctor_rows['doctor_id']?>" target="_blank" class="button-5 faded diff w-button" style="background-color: #0ce5b2;">Vedi Profilo Professionista</a>
           <?php }?>
             <?php
             if (strtolower($payment_mode) == 'online'){
                 ?>
                 <div class="glance_details">
                     <div class="glance_details_title" style="font-size: 14px">
						 <table align="center" width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td><input type="checkbox" checked class="admin_pyment_confirm lable2" id="online_payment_check" disabled="disabled"></td>
      <td><label for="online_payment_check">Carta di credito</label></td>
    </tr>
  </tbody>
</table>

						 
						 
                         
                         
                     </div>
                     
                 </div>
             <?php }?>
          <div data-w-id="5287ebc5-906c-b8a2-9414-a7b9a3835c88" class="confirm diff">
           <div
            style="-webkit-transform:translate3d(0, 20%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, 20%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, 20%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, 20%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);opacity:0"
            class="confirm_prompt">
            <div class="text-block-66">Sei sicuro di volere confermare questa visita come completata?</div>
            <div class="div-block-63">
             <a href="#" class="button-5 no w-button">Cancella</a>
              <?php if ($rows['payment_mode'] == 'Online') { ?>
               <a href="#" class="button-5 yes w-button"
                  onClick="complete_visit(<?php echo $patient_id . ',' . $booking_id . ',' . $date_of_booking_string . ',' . $price; ?>)">Conferma</a>
              <?php }else{ ?>
              <?php //if ($rows['payment_mode'] == 'Contanti') { ?>
               <a href="#" class="button-5 yes w-button"
                  onClick="complete_visit_cash(<?php echo $patient_id . ',' . $booking_id; ?>)">Conferma</a>
              <?php } ?>
            </div>
           </div>
          </div>
         </div>
         <div id="w-node-a7b9a3835c91-41f51898" class="div-block-60">
          <div class="paziente_data_block">
           <div class="text-block-63">Contatto Email</div>
           <div class="text-block-64"><?php echo $contact_data_row['email']; ?></div>
          </div>
          <div class="paziente_data_block">
           <div class="text-block-63">Contatto Telefono</div>
           <div class="text-block-64"><?php echo $contact_data_row['phone']; ?></div>
          </div>
          <?php
          /*
          <div class="paziente_data_block">
           <div class="text-block-63">Data Prenotazione</div>
           <div class="text-block-64"><?php echo $date_of_booking; ?></div>
          </div>
          */
          ?>
          <div class="paziente_data_block">
           <div class="text-block-63">Data e Ora</div>
           <div class="text-block-64">
          <?php
          if (!empty($opoint_time)){
           echo date("d/m/Y H:i", strtotime($opoint_time));;
          }
           ?>
           </div>
          </div>

          <div class="paziente_data_block">
           <div class="text-block-63">Pagamento</div>
           <div class="text-block-64"><?php echo ucwords($rows['payment_mode']); ?> </div>
          </div>

           <?php if ($rows['payment_mode'] == 'online') { ?>
            <div class="paziente_data_block">
             <div class="text-block-63">Payment Status</div>
             <div class="text-block-64"><?php echo $payment_status; ?> </div>
            </div>
           <?php } ?>

          <div class="paziente_data_block">
           <div class="text-block-63">Messaggio</div>
           <div class="pateint_message">
            <div class="text-block-64 diff"><?php echo $rows['message']; ?> </div>
           </div>
          </div>


         </div>
        </div>

       <?php } ?>
     <?php } ?>
   </div>
  </div>

  <div id="w-node-9d0132f6eb49-41f51898" class="site_nav">
   <h2 class="heading-20 diff">Gestisci Profilo</h2>
   <div class="nav_container">
    <a href="edit-un-profilo.php?email=<?php echo urlencode($email); ?>" class="button-5 faded w-button">Modifica
     Profilo</a>
    <a href="<?php echo $doctor_id_link; ?>" target="_blank" class="button-5 faded w-button">Vedi Profilo</a>
   </div>

   <br>
   <div class="active">
    <h2 class="heading-20 diff" style="margin-top: 10px;">Le mie visite</h2>
	   <ul class="list">
      <?php
      include '../connect.php';

      $sql152 = "SELECT DISTINCT am.id AS article_id, descrizione, ls.visit_home_price, ls.visit_tele_price
FROM listini ls
JOIN articlesMobidoc as am ON ls.article_mobidoc_id = am.id
JOIN articlesMobidoc_specialty as ams ON am.id = ams.id
JOIN medical_specialty as ms ON ms.ERid=ams.specialtyMobidoc
WHERE ms.status='Y' AND ls.doctor_id='".$rows3['doctor_id']."' AND (am.home = 'Y' OR am.tele = 'Y')";

      $result152 = mysqli_query($conn, $sql152);
      while($rows152 = mysqli_fetch_array($result152)){
      $visit_name12 = $rows152['descrizione'];
      ?>
	   		<li><?=$visit_name12?></li>
      <?php } mysqli_close($conn);?>
	   </ul>
   </div>
  </div>
 </div>
</section>
<div data-w-id="e63c0446-c4e2-04c7-011e-cc7eda105d92" class="select_doctor">
 <div data-w-id="18c3de8b-b737-4d7d-bc89-c71022690854" class="closer"></div>
 <div data-w-id="815eebd5-c0bb-d447-59df-ebd85e4eeccd" style="transform: translate3d(0px, 0%, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg);opacity: 1;transform-style: preserve-3d;" class="select_doctor_container">
  <div class="text-block-18">SELEZIONA PROFESSIONISTA</div>
  <div class="div-block-19">
   <div class="div-block-20" id="load_doctors" style="margin-bottom: 5px;">
    <div class="professionist_card-2 selecting">
     <div class="professionist_image_container"><img src="https://d3e54v103j8qbb.cloudfront.net/plugins/Image/assets/placeholder.60f9b1840c.svg" alt="" class="professionist_image">
      <div class="selected_tick"><img src="../images/Path-107.svg" width="55" alt="" class="image-4"></div>
     </div>
     <div class="preofessionist_name">Paolo Colamussi</div>
     <div class="professionist_title">Primario Radiologia</div>
     <div class="button_container">
      <a href="#" class="button-3 gradient select_button w-button">Select</a>
      <a href="#" class="button-3 w-button">View Profile</a>
     </div>
    </div>
   </div>
  </div>
  <div class="div-block-25">
   <form action="share-exam.php" method="post">
    <input type="text" name="book_id" id="book_id" style="display:none;">
    <input type="text" name="refer_email" id="refer_email" style="display:none;">
    <input type="text" name="refertatore_id" id="share_exam" style="display:none;">
    <input type="text" name="refer_name" id="refer_name" style="display:none;">
    <input type="text" name="vis_name" id="vis_name" style="display:none;">
    <input type="text" name="doct_name" id="doct_name" style="display:none;">
    <textarea style="min-height: 100px;margin-top: 0px;" placeholder="Condividi rapporto *" maxlength="10000" id="ext_not"
              name="ext_not" data-name="personal_description"
              class="text_area_profile personal_description w-input" required></textarea>
    <a data-w-id="365b64cd-1aba-0309-c567-e78f0e672a65" href="#" class="button-3 next odd w-button back-btn">Indietro</a>
    <button type="submit" name="submit" class="button-3 next w-button share-exam-btn" style="padding-right:100px;cursor: no-drop" disabled>Continua</button>
   </form>
  </div>
 </div>
</div>
<?PHP include '../footer.php' ?>
<script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.4.1.min.220afd743d.js" type="text/javascript"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="/paziente/date_pic.js?v=1"></script>
<script src="/paziente/dist/js/i18n/datepicker.en.js?v=1"></script>
<script src="../js/webflow.js" type="text/javascript"></script>
<!-- [if lte IE 9]>
<script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
<div id="fb-root"></div>
<script async="" defer="" crossorigin="anonymous"
        src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v4.0"></script>
<script>
  $(document).ready(function () {
    $('.view_details_button').click(function () {
      $(this).parent().siblings('.div-block-60').toggleClass('open');
    });
    $(".footer").addClass('prof');
  });


  $(".exam-share-btn").on("click", function (e) {
    e.preventDefault();
    var get_article_id = $(this).attr("article-id");
    var get_doc_id = $(this).attr("curr-doc-id");
    $("#vis_name").val($(this).attr("visit-name"));
    $("#book_id").val($(this).attr("data-id"));
    $("#doct_name").val($(this).attr("curr-doc-nam"));
    var xmlhttp2 = new XMLHttpRequest();
    xmlhttp2.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("load_doctors").innerHTML = this.responseText;
      }
    };
    xmlhttp2.open("GET", "getTechn.php?article-id=" + get_article_id+"&doc-id="+get_doc_id, true);
    xmlhttp2.send();

    $(".select_doctor").attr("style", "display: flex;opacity: 1;");
  });

   $(".back-btn").on("click", function (event) {
     event.preventDefault();
     $(".select_doctor").attr("style", "display: none;opacity: 0;");
   });

  function setDoctor(val, email,name){
    $('#share_exam').val(val);
    $("#refer_email").val(email);
    $("#refer_name").val(name);
    $(".share-exam-btn").prop("disabled", false).css("cursor","pointer");
  }

  $('.select_button').click(function(){
    $('.selected_tick').removeClass("selected_true");
    $(this).parent().siblings(".professionist_image_container").find('.selected_tick').addClass("selected_true");
  });

</script>
<?php include("../google_analytic.php") ?>
</body>
</html>