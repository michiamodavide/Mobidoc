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
  @media screen and (max-width: 767px){
   .button-5.faded.diff{
    display: block;
   }
   .view_details_button{
    display: none !important;
   }
  }
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
<body>

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
  <div class="cover_section_buttons_container"><a href="logout.php" class="button-9 stroked cover_btns logout w-button">Esci</a>
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
       $sql = "select * from bookings where refertatore_id ='" . $rows3['doctor_id'] . "' order by booking_id desc";
     }else{
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
         $payment_status = $rows['payment_status'];
         $booking_id = $rows['booking_id'];
         $refertatore_id = $rows['refertatore_id'];
         $opoint_time = $rows['apoint_time'];

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
         $get_visit_query = "select descrizione from articlesmobidoc where id='" . $article_id . "'";
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
           <div class="price_euro"><span class="text-span-5"></span><?php echo '€ ' . $price; ?></div>
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
           <div class="text-block-62"><?php echo $current_doc_name; ?></div>
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
           <?php if ($rows['doctor_booking_status'] == 0) { ?>
            <a data-w-id="5287ebc5-906c-b8a2-9414-a7b9a3835c86" href="#" class="button-5 visit_complete w-button">Visita Completata</a>
            <a href="javascript:;" visit-name="<?php echo $visit_name; ?>" data-id="<?php echo $booking_id?>" curr-doc-nam="<?php echo $current_doc_name?>" class="button-5 faded diff w-button exam-share-btn" style="background-color: #0ce5b2;">Condividi esame</a>
            <a href="/professionisti/edit-booking.php?bookid=<?php echo $booking_id?>" class="button-5 faded diff w-button edit-booking-btn" style="background-color: #f8dbdb;;">Modifica</a>
           <?php } ?>
        <?php if ($rows['admin_book'] == 1){
         ?>
          <a href="#" onClick="confirm_doc_vst(<?php echo $patient_id . ',' . $booking_id; ?>)" class="button-5 faded diff w-button" style="background-color: #ebeef2;">Conferma prenotazione</a>

            <?php
              echo '<style>.appoint_buttons_container.book_btn_'.$rows['booking_id'].' a{pointer-events: none !important;opacity: 0.4 !important;}  .appoint_buttons_container.book_btn_'.$rows['booking_id'].' a:nth-child(6){pointer-events: inherit !important;opacity: inherit !important;}</style>';
          }}else{?>
           <a href="tel:<?php echo $doctor_rows['phone']; ?>" class="button-5 faded diff w-button" style="background-color: rgba(0, 0, 0, 0.7); color: white;">Chiama Professionista</a>
           <a href="<?php echo '/il-team/professionista.php?'.$doctor_rows['doctor_id']?>" target="_blank" class="button-5 faded diff w-button" style="background-color: #0ce5b2;">Vedi Profilo Professionista</a>
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
           <div class="text-block-63">Email</div>
           <div class="text-block-64"><?php echo $patient_rows['email']; ?></div>
          </div>
          <div class="paziente_data_block">
           <div class="text-block-63">Telefono</div>
           <div class="text-block-64"><?php echo $patient_rows['phone']; ?></div>
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
    <!--<a href="#" class="button-5 faded w-button">Cambia Password</a>-->
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
    var get_visit_name = $(this).attr("visit-name");
    $("#vis_name").val(get_visit_name);
    $("#book_id").val($(this).attr("data-id"));
    $("#doct_name").val($(this).attr("curr-doc-nam"));
    var xmlhttp2 = new XMLHttpRequest();
    xmlhttp2.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("load_doctors").innerHTML = this.responseText;
      }
    };
    xmlhttp2.open("GET", "getTechn.php?q=" + get_visit_name, true);
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