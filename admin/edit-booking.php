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
  $sql_book = "select * from bookings where booking_id ='".$booking_id."'";
  $get_book_con = mysqli_query($conn, $sql_book);
  $get_book_result = mysqli_fetch_array($get_book_con);
  $book_visit_name = $get_book_result['visit_name'];
  $refertatore_id = $get_book_result['refertatore_id'];

  if ($get_book_result['apoint_time']){
    $apoint_time = date("m-d-Y H:s", strtotime($get_book_result['apoint_time']));
  }else{
    $apoint_time = $get_book_result['apoint_time'];
  }

  /*get doctor data*/
  $sql_doc = "select * from doctor_profile where doctor_id ='".$get_book_result['doctor_id']."'";
  $sql_get_doc = mysqli_query($conn, $sql_doc);
  $sql_get_doc_data = mysqli_fetch_array($sql_get_doc);
  $doctor_id = $sql_get_doc_data['doctor_id'];
  $doc_name = $sql_get_doc_data['fname'].' '.$sql_get_doc_data['lname'];

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
  $phone = $sql_get_tmp_data['phone'];
  $fname = $sql_get_tmp_data['first_name'];
  $lname = $sql_get_tmp_data['last_name'];
  $admin_note = $sql_get_tmp_data['admin_note'];
  $dobb = $sql_get_tmp_data['dob'];

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
           <div class="form_section_heading">Informazioni Contatto</div>
           <div class="dual_container diff">
            <input type="text" class="inputs w-input" maxlength="256" name="fiscal_code" data-name="fiscal_code" placeholder="Codice Fiscale *" id="fiscal_code" value="<?php echo $fisc_code?>" autocomplete="off" readonly>
            <input type="email" class="inputs w-input" maxlength="256" name="email" data-name="email" placeholder="Email *" value="<?php echo $email?>" id="email" readonly>
           </div>
           <input type="tel" class="inputs w-input" maxlength="256" name="tele" data-name="tele" placeholder="Telefono *" value="<?php echo $phone?>" id="tele" required>
          </div>
          <div class="form_section">
           <div class="form_section_heading">Informazioni Paziente</div>
           <div class="dual_container diff">
            <input type="text" class="inputs w-input" maxlength="256" name="first_name" data-name="first_name" placeholder="Nome *" value="<?php echo $fname?>" id="first_name" required>
            <input type="text" class="inputs w-input" maxlength="256" name="last_name" data-name="last_name" placeholder="Cognome *" value="<?php echo $lname?>" id="last_name" required>
           </div>
           <input type="text" class="datepicker-here inputs w-input date_of_birth" data-language="it" data-date-format="dd-mm-yyyy" maxlength="256" autocomplete="off" name="dob" placeholder="Data di Nascita *" id="dob" style="margin-bottom: 25px" required>

          </div>
          <div class="form_section">
           <div class="form_section_heading">Prenotazione Prestazione</div>
           <div class="duo_flex">
            <div class="choose_your_area select1">
             <div class="search_cap_input sci2">
              <div class="input_element" style="background:#d3fbff;">
               <img src="../images/search.svg" width="28"  alt="">
               <select id="select-visit" placeholder="Seleziona Prestazione *" name="vist_name" onchange="getVisitDoc()" required>
                <option value="<?php echo $book_visit_name?>" selected><?php echo $book_visit_name?></option>
                 <?php
                 include '../connect.php';
                 /* $visit_sql = "select * from doctor_visit order by visit_name";*/
                 $visit_sql = "select DISTINCT visit_name from doctor_visit
  INNER JOIN doctor_profile on doctor_visit.doctor_email = doctor_profile.email
  where doctor_profile.puo_refertare='N' AND doctor_profile.active = 'Y'";
                 $visit_result = mysqli_query($conn, $visit_sql);
                 while($visit_rows = mysqli_fetch_array($visit_result)){
                   $visit_types = $visit_rows['visit_name'];
                   ?>
                  <option value="<?PHP echo $visit_types;?>"><?PHP echo $visit_types;?></option>
                 <?php } mysqli_close($conn);?>
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
                 <?php }?>
               </select>
               <script>
                 var $select_ref = $('#select-refertatore').selectize();

                 var ref_select = $select_ref[0].selectize;
               </script>
              </div>
             </div>
            </div>
           </div>
          </div>
          <div class="form_section">
           <div class="form_section_heading">Data e Ora</div>
           <div class="dual_container diff">
            <input type="text" class="datepicker-here inputs w-input"  data-language="it" data-date-format="dd-mm-yyyy" maxlength="256" autocomplete="off" name="appoint_time" placeholder="Data e Ora" id="appoint_time">
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

     .choose_your_area.select2, .choose_your_area.select3 {
      pointer-events: none;
     }
    </style>
   </div>
   <div class="end-of-the-list" style="margin-top: 0px">
    <div class="line"></div>
    <div id="w-node-0e7522d67d94-80dd982b" class="text-block-70">Non ci sono più profili da visualizzare.</div>
    <div class="line"></div>
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

 .choose_your_area.select2, .choose_your_area.select3 {
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
    var visit_type_single = $("#select-visit option").val();
    // $(".choose_your_area.select2 .selectize-control.multi .selectize-input div, .choose_your_area.select2 .select-doctor-new option").remove();
    $(".choose_your_area.select3").attr("style", "pointer-events: none; opacity: 0.6;");
    $.ajax({
      url: "/paziente/get_visit_doc.php",
      type: "post",
      data: {data:visit_type_single},
      dataType: "json",
      success: function (response) {
        $.each(response, function(index) {
          var puo_refertare = response[index].puo_refertare;
          var is_active_doc = response[index].active;
          if (is_active_doc == 'Y'){
            if (puo_refertare == 'N'){
              $(".choose_your_area.select2").attr("style", "pointer-events: inherit; opacity: inherit; margin: 10px;");
              doc_select.addOption({value: response[index].doctor_id, text: response[index].fname+' '+response[index].lname});
            } else if (puo_refertare == 'Y') {
              $(".choose_your_area.select3").attr("style", "pointer-events: inherit; opacity: inherit;");
              ref_select.addOption({value: response[index].doctor_id, text: response[index].fname+' '+response[index].lname});
            }
          }
        });
      },
      error: function(jqXHR, textStatus, errorThrown) {
        console.log(textStatus, errorThrown);
      }
    });
  });
  function getVisitDoc() {
    var visit_type_single = $("#select-visit option").val();
    var items_new = doc_select.items.slice(0);
    for (var i in items_new) {
      doc_select.removeItem(items_new[i]);
    }
    doc_select.clearOptions();
    ref_select.clear();
    ref_select.clearOptions();
    // $(".choose_your_area.select2 .selectize-control.multi .selectize-input div, .choose_your_area.select2 .select-doctor-new option").remove();
    $(".choose_your_area.select3").attr("style", "pointer-events: none; opacity: 0.6;");
    $.ajax({
      url: "/paziente/get_visit_doc.php",
      type: "post",
      data: {data:visit_type_single},
      dataType: "json",
      success: function (response) {
        $.each(response, function(index) {
          var puo_refertare = response[index].puo_refertare;
          var is_active_doc = response[index].active;
          if (is_active_doc == 'Y'){
            if (puo_refertare == 'N'){
              $(".choose_your_area.select2").attr("style", "pointer-events: inherit; opacity: inherit; margin: 10px;");
              doc_select.addOption({value: response[index].doctor_id, text: response[index].fname+' '+response[index].lname});
            } else if (puo_refertare == 'Y') {
              $(".choose_your_area.select3").attr("style", "pointer-events: inherit; opacity: inherit;");
              ref_select.addOption({value: response[index].doctor_id, text: response[index].fname+' '+response[index].lname});
            }
          }
        });

        doc_select.refreshOptions();
        ref_select.refreshOptions();
      },
      error: function(jqXHR, textStatus, errorThrown) {
        console.log(textStatus, errorThrown);
      }
    });
  }


  var dobb = '<?php echo $dobb?>';
  if (dobb){
    var date_of_birth = date_of_birth = new Date('<?php echo $dobb?>');
    $('.date_of_birth').datepicker({
      timepicker: false
    }).data('datepicker').selectDate(new Date(date_of_birth.getFullYear(), date_of_birth.getMonth(), date_of_birth.getDate()));
  }else {
    $('.date_of_birth').datepicker({
      timepicker: false
    });
  }

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
    console.log(opoint_dd);
    var opoint_date = opoint_date = new Date('<?php echo $apoint_time?>');
    $('#appoint_time').datepicker().data('datepicker').selectDate(new Date(opoint_date.getFullYear(), opoint_date.getMonth(), opoint_date.getDate(), opoint_date.getHours(), opoint_date.getMinutes()));

  }
</script>
<!-- [if lte IE 9]>
<script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
<div id="fb-root"></div>
<script async="" defer="" crossorigin="anonymous"
        src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v4.0"></script>
</body>
</html>