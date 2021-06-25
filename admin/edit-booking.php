<?php session_start();

if (!isset($_SESSION['adminlogin'])) {
  header("Location: login.php");
}
include '../connect.php';
?>
<!DOCTYPE html>
<html data-wf-page="5dfbca93dac992df80dd982b" data-wf-site="5d8cfd454ebd737ac1a48727">
<head>
 <meta charset="utf-8">
 <title>Modifica prenotazione</title>
 <meta content="admin" property="og:title">
 <meta content="width=device-width, initial-scale=1" name="viewport">
 <meta content="Webflow" name="generator">
 <link href="../css/admin/normalize.css" rel="stylesheet" type="text/css">
 <link href="../css/admin/webflow.css" rel="stylesheet" type="text/css">
 <link href="../css/admin/mobidoc.webflow.css?v=1" rel="stylesheet" type="text/css">
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
 <script src="https://kit.fontawesome.com/3f12b8b553.js" crossorigin="anonymous"></script>
 <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
         crossorigin="anonymous"></script>
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
 <link href="/paziente/dist/css/datepicker.css" rel="stylesheet" type="text/css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
 <link href="../dist/css/selectize.default.css?v=1" rel="stylesheet"/>
 <script src="../dist/js/standalone/selectize.min.js"></script>
 <script src="https://kit.fontawesome.com/3f12b8b553.js" crossorigin="anonymous"></script>
 <style>
  ::-webkit-scrollbar {
   width: 0px;
   height: 0px;
  }

  .p {
   text-align-last: center !important;
  }

  .input-controls {
   margin-top: 10px;
   border: 1px solid transparent;
   border-radius: 2px 0 0 2px;
   box-sizing: border-box;
   -moz-box-sizing: border-box;
   height: 32px;
   outline: none;
   box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
  }

  #address_search {
   width: 60%;
   left: 215px !important;
   top: 10px !important;
  }

  @media screen and (max-width: 767px) {
   .duo_flex .choose_your_area .input_element {
    width: 350px;
   }

   .choose_your_area.select2 {
    margin-left: 0px !important;
    margin-top: 15px !important;
    margin-bottom: 0px !important;
   }

   .submit_form_btn {
    text-align: center;
   }

   #address_search {
    width: 75%;
    left: 40px !important;
    top: 51px !important;
   }
   .section_content{
    padding-bottom: 10px;
   }
  }

  @media screen and (max-width: 400px) {
   .duo_flex .choose_your_area .input_element {
    width: 319px;
   }

   #address_search {
    width: 75%;
    left: 38px !important;
    top: 51px !important;
   }

  }

  @media screen and (max-width: 360px) {
   .duo_flex .choose_your_area .input_element {
    width: 307px;
   }
  }

  @media screen and (max-width: 340px) {
   .duo_flex .choose_your_area .input_element {
    width: 273px;
   }

   #address_search {
    width: 80%;
    left: 28px !important;
    top: 51px !important;
   }
  }
 </style>
 <style>
  ::-webkit-scrollbar {
   width: 0px;
   height: 0px;
  }

  .p {
   text-align-last: center !important;
  }

  *:focus {
   outline: none;
   border: none;
  }

  .pro_type {
   margin-top: 20px;
   width: 100% !important;
   padding: 8px 7px;
   border-radius: 1.2rem;
   font-size: 12px;
   border: 1px solid #979797 !important;
  }

  .button-10 {
   margin-top: 70px;
  }

  .search.home {
   background-color: black;
  }

  .mt-240 {
   margin-top: 240px;
  }

  .register .mt-240 {
   margin-top: 110px;
  }

  @media screen and (min-width: 1280px) {

   .register .custom_container.update_form {
    display: block;
    width: 100%;
   }
  }

  @media screen and (max-width: 767px) {
   .register .admin_section_heading {
    font-size: 24px;

   }

   .register .selectize-input {

    padding: 10px;

   }

   .register .mt-240 {
    margin-top: 70px;
   }

   .register .duo_flex .choose_your_area .input_element {
    min-width: 100%;
    width: 100%;
   }

   .register .admin_main_section {
    width: 80%;
    height: 100vh;
    margin-left: 70px;
    padding-top: 0.5px;
    padding-right: 3%;

   }

   .register .admin_main_section .admin_section_header {
    display: inline-block;
    left: 70px;
    width: 78%;

   }

   .admin_main_section .admin_section_header {
    display: inline-block;
    left: 90px;
   }

   .admin_main_section .scroll_indicator {
    display: none;
   }

   .body-14 .search.home {
    margin: 0px 0px;
    width: 105vw;
   }

   .body-14 .search {
    -webkit-transform: scale(0.75);
    -ms-transform: scale(0.75);
    transform: scale(0.75);
    -webkit-transform-origin: 0% 50%;
    -ms-transform-origin: 0% 50%;
    transform-origin: 0% 50%;
   }

   .mt-240 {
    margin-top: 200px;
   }

   .register .custom_container.update_form {
    width: 100%;
   }

   .register .input_element {

    padding-right: 10px;
    padding-left: 10px;
   }
  }

  @media screen and (max-width: 450px) {
   .register .duo_flex .choose_your_area .input_element {
    min-width: 290px;
    width: 100%;
   }

  }

  @media screen and (max-width: 400px) {
   #add .button-10 {
    font-size: 11px;
   }

   .register .duo_flex .choose_your_area .input_element {
    min-width: 255px;
    width: 100%;
   }
  }

  @media screen and (max-width: 340px) {
   #add .button-10 {
    margin-right: 10px !important;
   }

   .register .duo_flex .choose_your_area .input_element {
    min-width: 100%;
    width: 100%;
   }
  }
 </style>
 <script type="text/javascript"
         src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA9O3bcxgKNkrvPOc2kdGKsLF9FnTfh7Go&sensor=false&libraries=places"></script>

  <?php

  $booking_id = $_GET['id'];
  $sql_book = "select bs.article_id, am.descrizione, am.attributo, bk.apoint_time, bk.refertatore_id, bk.doctor_id, bk.patient_id, bk.booking_discount_id, bk.booking_status
from bookings bk
JOIN booked_service bs on bs.booking_id=bk.booking_id
JOIN articlesMobidoc am on bs.article_id=am.id
where bk.booking_id ='".$booking_id."'";

  $get_book_con = mysqli_query($conn, $sql_book);
  $get_book_result = mysqli_fetch_array($get_book_con);
  $book_article_id = $get_book_result['article_id'];
  $book_visit_name = $get_book_result['descrizione'];
  $book_visit_attribute = $get_book_result['attributo'];
  $refertatore_id = $get_book_result['refertatore_id'];
  $booking_discount_id = $get_book_result['booking_discount_id'];
  $booking_status = $get_book_result['booking_status'];


  $opoint_time = $get_book_result['apoint_time'];
  $apoint_time = '';
  if (!empty($opoint_time) && strtotime($opoint_time) > 0){
      $apoint_time = $get_book_result['apoint_time'];
  }


  /*get doctor data*/
  $sql_doc = "select dp.doctor_id, dp.fname, dp.lname, ds.specialty
from doctor_profile dp
join doctor_specialty ds on ds.doctor_id=dp.doctor_id
where dp.doctor_id ='".$get_book_result['doctor_id']."'";
  $sql_get_doc = mysqli_query($conn, $sql_doc);
  $sql_get_doc_data = mysqli_fetch_array($sql_get_doc);
  $doctor_id = $sql_get_doc_data['doctor_id'];
  $doc_name = $sql_get_doc_data['fname'].' '.$sql_get_doc_data['lname'];
  $doctor_speciality = $sql_get_doc_data['specialty'];

  if (isset($refertatore_id)) {
    /*get refertatore data*/
    $sql_ref = "select * from doctor_profile where doctor_id ='" . $refertatore_id . "'";
    $sql_get_ref = mysqli_query($conn, $sql_ref);
    $sql_get_ref_data = mysqli_fetch_array($sql_get_ref);
    $ref_id = $sql_get_ref_data['doctor_id'];
    $ref_name = $sql_get_ref_data['fname'] . ' ' . $sql_get_ref_data['lname'];
  }

  /*get patient data*/
  $sql_get_query = "select * from paziente_profile where paziente_id ='".$get_book_result['patient_id']."'";
  $sql_get_tmp = mysqli_query($conn, $sql_get_query);
  $sql_get_tmp_data = mysqli_fetch_array($sql_get_tmp);

  $patient_id = $sql_get_tmp_data['paziente_id'];
  $fisc_code = $sql_get_tmp_data['fiscale'];
  $email = $sql_get_tmp_data['email'];
  $fname = $sql_get_tmp_data['first_name'];
  $lname = $sql_get_tmp_data['last_name'];

  $dobb = '';
  if (!empty($sql_get_tmp_data['dob'])){
      $dobb = date("d-m-Y", strtotime($sql_get_tmp_data['dob']));
  }

  /*get patient data*/
  $sql_contact_query = "select * from  contact_profile where id ='".$sql_get_tmp_data['contact_id']."'";
  $get_contact_result = mysqli_query($conn, $sql_contact_query);
  $get_contact_row= mysqli_fetch_array($get_contact_result);

  ?>
</head>
<body class="body-14 register">
<div>
  <?php include("admin_side_bar.php") ?>
 <div data-w-id="410c8c4a-713c-7280-b165-1dd2a36167c1" class="preloader">
  <div class="loader">
   <div data-w-id="410c8c4a-713c-7280-b165-1dd2a36167c3" data-animation-type="lottie"
        data-src="https://uploads-ssl.webflow.com/5d8cfd454ebd737ac1a48727/5df92a8de51cd1d00a86eb51_lottieflow-loading-04-2-00285C-easey.json"
        data-loop="1" data-direction="1" data-autoplay="1" data-is-ix2-target="0" data-renderer="svg"
        data-default-duration="1.7916666666666667" data-duration="0" class="lottie-animation-2"></div>
  </div>
 </div>
</div>
<div class="admin_main_section">
 <div data-w-id="671d7027-6f87-1c3f-c474-3b17f4b83b06" class="admin_section_header">
  <h1 class="admin_section_heading">Modifica prenotazione</h1>
  <a href="logout.php" class="admin_logout"></a></div>
 <div class="section_content mt-240">
  <div class="applications">
   <div class="doctors_block">
    <section class="section-19">
     <div class="custom_container update_form">
      <div class="update_form_main_container">
       <div class="update_form_block w-form">
        <form id="email-form" name="email-form" class="update_form" action="edit-book.php" method="post" enctype="multipart/form-data">
         <input type="hidden" name="old_ref_id" value="<?php echo $refertatore_id?>">
         <input type="hidden" name="patient_id" value="<?php echo $patient_id?>">
         <input type="hidden" name="booing_idd" value="<?php echo $booking_id?>">
         <div>
          <div class="form_section">
           <div class="form_section_heading">Informazioni Paziente</div>
           <div class="dual_container diff">
               <input type="text" class="inputs w-input" maxlength="256" name="last_name" data-name="last_name" placeholder="Cognome" value="<?php echo $lname?>" id="last_name" readonly>
               <input type="text" class="inputs w-input" maxlength="256" name="first_name" data-name="first_name" placeholder="Nome" value="<?php echo $fname?>" id="first_name" readonly>
           </div>
              <div class="dual_container diff">

                  <input type="text" class="inputs w-input" maxlength="256" name="fiscal_code" data-name="fiscal_code" placeholder="Codice Fiscale *" id="fiscal_code" value="<?php echo $fisc_code?>" autocomplete="off" readonly>
                  <input type="text" class="inputs w-input" maxlength="256" autocomplete="off" name="dob" value="<?=$dobb?>" placeholder="Data di Nascita *" id="dob" readonly>

              </div>
          </div>
          <div class="form_section">
           <div class="form_section_heading">Informazioni Contatto</div>
              <div class="dual_container diff">
                  <input type="text" class="inputs w-input" maxlength="256" name="contact_fname" placeholder="Codice Fiscale *" id="fiscal_code" value="<?php echo $get_contact_row['name']?>" autocomplete="off" readonly>
                  <input type="text" class="inputs w-input" maxlength="256" name="contact_lname" placeholder="Email *" value="<?php echo $get_contact_row['surname']?>" id="contact_lname" readonly>
              </div>

              <div class="dual_container diff">
                  <input type="text" class="inputs w-input" maxlength="256" name="contact_email" placeholder="Nome *" value="<?php echo $get_contact_row['email']?>" readonly>
                  <input type="tel" class="inputs w-input" maxlength="256" name="contact_tele" placeholder="Telefono *" value="<?php echo $get_contact_row['phone']?>" readonly>
              </div>


          </div>
          <div class="form_section">
           <div class="form_section_heading">Prenotazione Prestazione</div>
           <div class="duo_flex">
            <div class="choose_your_area select1" style="pointer-events: none;opacity: 0.8;">
             <div class="search_cap_input sci2">
              <div class="input_element" style="background:#d3fbff;">
               <img src="../images/search.svg" width="28"  alt="">
               <select id="select-visit" placeholder="Seleziona Prestazione *" name="vist_name" required>
                <option value="<?php echo $book_visit_name?>" selected>
                    <?php echo $book_visit_name;
                    if ($book_visit_attribute){
                        echo ' <strong>('.$book_visit_attribute.')</strong>';
                    }
                    ?>
                </option>
               </select>
               <script>
                 $('#select-visit').selectize();
               </script>
              </div>
             </div>
            </div>
            <div class="choose_your_area select2" style="margin: 10px;">
             <div class="search_cap_input sci2">
              <div class="input_element" style="background:#d3fbff;">
               <img src="../images/search.svg" width="28"  alt="">
               <select id="select-doctor" placeholder="Seleziona Esecutore *" class="select-doctor-new" name="doc_id" required>
                <option value="<?php echo $doctor_id?>" selected><?php echo $doc_name?></option>
               </select>
               <script>
                 // var doc_select = $('#select-doctor').selectize();
                 var $select = $('#select-doctor').selectize();

                 // fetch the instance
                 var doc_select = $select[0].selectize;
               </script>
              </div>
             </div>
            </div>
           </div>

           <div class="duo_flex">
            <div class="choose_your_area select3">
             <div class="search_cap_input sci2">
              <div class="input_element" style="background:#d3fbff;">
               <img src="../images/search.svg" width="28"  alt="">


               <select id="select-refertatore" placeholder="Seleziona Refertatore" name="refertatore_id">

                 <?php  if (isset($refertatore_id)) {?>
                  <option value="<?php echo $ref_id ?>" selected><?php echo $ref_name ?></option>
                   <?php
                 } else{
                   ?>
                  <option value="">Seleziona Refertatore</option>
                 <?php }
                 $get_ref_sql = "SELECT DISTINCT dp.doctor_id, dp.fname, dp.lname
FROM doctor_profile dp
JOIN doctor_register as dg ON dg.id = dp.doctor_id 
JOIN doctor_specialty ds ON ds.doctor_id = dg.id 
JOIN listini ls ON ls.doctor_id = ds.doctor_id
where dg.tick='1' AND ds.specialty='".$doctor_speciality."' AND ls.article_mobidoc_id='".$book_article_id."' AND dp.puo_refertare='Y' AND dp.active='Y'";
                 $get_ref_result = mysqli_query($conn, $get_ref_sql);
                 $get_rows_count = mysqli_num_rows($get_ref_result);
                 while ($get_ref_row = mysqli_fetch_array($get_ref_result)) {
                     if ($get_ref_row['doctor_id'] != $ref_id){
                 ?>
                     <option value="<?php echo $get_ref_row['doctor_id'] ?>"><?php echo $get_ref_row['fname'].' '.$get_ref_row['lname'] ?></option>
                   <?php }}?>
               </select>
               <script>
                 var $select_ref = $('#select-refertatore').selectize();

                 var ref_select = $select_ref[0].selectize;
               </script>
              </div>
             </div>
                <?php if ($get_rows_count < 1){?>
                <p style="text-align: center;color: red;">No referrer available for the selected visit.</p>
                    <style>.choose_your_area.select3{pointer-events: none;opacity: 0.8;}</style>
           <?php }else if ($booking_status < 3){?>
                <p style="text-align: center;color: red;">Puoi modificare il refertatore una volta che la prenotazione  è confermata</p>
                <style>.choose_your_area.select3{pointer-events: none;opacity: 0.8;}</style>
                <?php }?>
            </div>
           </div>
          </div>
          <div class="form_section">
           <div class="form_section_heading">Data e Ora</div>
           <div class="dual_container diff">
            <input type="text" class="datepicker-here inputs w-input"  data-language="it" data-date-format="dd-mm-yyyy" maxlength="256" autocomplete="off" name="appoint_time" placeholder="Data e Ora" id="appoint_time">

               <?php
               if ($booking_status > 2){?>
                   <br>
               <p class="apt_date_error" style="text-align: center;color: red;">La data di prenotazione non può essere cambiata a prestazione avvenuta</p>
               <style>#appoint_time{pointer-events: none;opacity: 0.8;}.apt_date_error{margin-top: -20px}
                   @media screen and (max-width: 780px){.apt_date_error{margin-top: -32px}  }</style>
               <?php
               }else if(!empty($booking_discount_id)){?>
              <br>
               <p class="apt_date_error" style="text-align: center;color: red;">La data non può essere modificata per la prenotazione scontata</p>
               <style>#appoint_time{pointer-events: none;opacity: 0.8;}.apt_date_error{margin-top: -20px}
               @media screen and (max-width: 780px){.apt_date_error{margin-top: -32px}  }</style>
               <?php }?>
           </div>

          </div>
          <div class="submit_form_btn">
           <input type="submit" name="submit" style="color:#fff !important;" value="Invia" id="submit" class="button gradient submit w-button">
          </div>
         </div>

         <div class="div-block-34">
          <div class="div-block-35">
          </div>
         </div>

        </form>
       </div>
      </div>
     </div>
    </section>
    <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.4.1.min.220afd743d.js" type="text/javascript"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="../js/webflow.js" type="text/javascript"></script>
    <!-- [if lte IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
    <div id="fb-root"></div>
    <script async="" defer="" crossorigin="anonymous"
            src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v4.0"></script>

    <style>
     .search_help_open {
      display: block !important;
     }

     .search_help_open:hover {
      display: block !important;
     }

     .search_cap_input {
      display: inline-flex;
     }

     .selecteds {
      overflow: scroll !important;
     }

     .cap_name_input {
      -webkit-transform: translateX(-30px);
      -ms-transform: translateX(-30px);
      transform: translateX(-30px);
      margin: -5px;
     }

     .text-block-44 {
      background: none;
      border: none;
     }

     textarea {
      resize: none;
     }

     .select-field {
      width: 100%;
      height: 100%;
      padding-top: 12px;
      padding-bottom: 12px;
      border: 1px none #000;
      background-color: transparent;
      color: #00285c;
     }

     ::-webkit-scrollbar {
      width: 0px;
      height: 0px;
     }

     .p {
      text-align-last: center !important;
     }

     .selectize-control {
      width: 100%;
     }

     ::placeholder {
      color: rgba(0, 40, 92, 0.65);
     !important;
     }

     .selectize-input {
      background: transparent !important;
      border: none;
      box-shadow: none !important;
      padding: 20px;
      margin-top: 5px !important;
      color: #00285c !important;
     }

     .selectize-dropdown {
      background: #E4FDFF !important;
      border: none;
      margin-top: 10px;
      border-radius: 5px !important;
      box-shadow: 3px 30px 50px 0 rgba(0, 37, 84, 0.16) !important;
      color: #00285c !important;
      height: auto !important;
      padding: 0px !important;
      overflow: hidden !important;
     }

     .selectize-dropdown-content {
      max-height: 100% !important;
     }

     .selectize-dropdown-content .option {
      padding: 20px !important;
      margin: 0px !important;
     }

     input[readonly] {
      background: #D3FBFF !important;
      color: #00285C !important;
     }

     input {
      color: #00285C !important;
     }

     .choose_your_area.select2 {
      pointer-events: none;
     }
    </style>
   </div>
  </div>
 </div>
</div>
<style>
 .search_help_open {
  display: block !important;
 }

 .search_help_open:hover {
  display: block !important;
 }

 .search_cap_input {
  display: inline-flex;
 }

 .selecteds {
  overflow: scroll !important;
 }

 .cap_name_input {
  -webkit-transform: translateX(-30px);
  -ms-transform: translateX(-30px);
  transform: translateX(-30px);
  margin: -5px;
 }

 .text-block-44 {
  background: none;
  border: none;
 }

 textarea {
  resize: none;
 }

 .select-field {
  width: 100%;
  height: 100%;
  padding-top: 12px;
  padding-bottom: 12px;
  border: 1px none #000;
  background-color: transparent;
  color: #00285c;
 }

 ::-webkit-scrollbar {
  width: 0px;
  height: 0px;
 }

 .p {
  text-align-last: center !important;
 }

 .selectize-control {
  width: 100%;
 }

 ::placeholder {
  color: rgba(0, 40, 92, 0.65);
 !important;
 }

 .selectize-input {
  background: transparent !important;
  border: none;
  box-shadow: none !important;
  padding: 20px;
  margin-top: 5px !important;
  color: #00285c !important;
 }

 .selectize-dropdown {
  background: #E4FDFF !important;
  border: none;
  margin-top: 10px;
  border-radius: 5px !important;
  box-shadow: 3px 30px 50px 0 rgba(0, 37, 84, 0.16) !important;
  color: #00285c !important;
  height: auto !important;
  padding: 0px !important;
  overflow: hidden !important;
 }

 .selectize-dropdown-content {
  max-height: 100% !important;
 }

 .selectize-dropdown-content .option {
  padding: 20px !important;
  margin: 0px !important;
 }

 input[readonly] {
  background: #D3FBFF !important;
  color: #00285C !important;
 }

 input {
  color: #00285C !important;
 }

 .choose_your_area.select2 {
  pointer-events: none;
  opacity: 0.6;
 }
</style>
<script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.4.1.min.220afd743d.js" type="text/javascript"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="../js/admin/webflow.js" type="text/javascript"></script>
<script src="/paziente/date_pic.js?v=1"></script>
<script src="/paziente/dist/js/i18n/datepicker.en.js?v=1"></script>

<script type="text/javascript">
  $( document ).ready(function() {
  $("#appoint_time").keyup(function(){
    var select_date = $(this).val().split('-');
    var date_string = select_date[1] + '-' + select_date[0] + '-' + select_date[2];

    var opoint_date = opoint_date = new Date(date_string);
    setTimeout(function(){
      if (opoint_date == 'Invalid Date') {
        //do not do anyting
      }else {
        $('#appoint_time').datepicker().data('datepicker').selectDate(new Date(opoint_date.getFullYear(), opoint_date.getMonth(), opoint_date.getDate(), opoint_date.getHours(), opoint_date.getMinutes()));
      }
    }, 500);

  });

      var opoint_dd = '<?php echo $apoint_time?>';
      if (opoint_dd){
          var select_date = opoint_dd.split('-');
          var year_split = select_date[2].split(' ');
          var date_string =  select_date[0]+ '-' + select_date[1] + '-' + year_split[0]+' '+year_split[1];

          var opoint_date = opoint_date = new Date(date_string);
          $('#appoint_time').datepicker().data('datepicker').selectDate(new Date(opoint_date.getFullYear(), opoint_date.getMonth(), opoint_date.getDate(), opoint_date.getHours(), opoint_date.getMinutes()));

      }
  });

  $(document).ready(function(){
    $('.admin_item:nth-child(3)').addClass('current');
  });
</script>
<!-- [if lte IE 9]>
<script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
<div id="fb-root"></div>
<script async="" defer="" crossorigin="anonymous"
        src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v4.0"></script>
</body>
</html>