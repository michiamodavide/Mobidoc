<?php session_start();
if(!isset($_SESSION['adminlogin']))
{
  header("Location: login.php");
}
include '../connect.php';
?>
<!DOCTYPE html>
<html data-wf-page="5dfbca93dac992df80dd982b" data-wf-site="5d8cfd454ebd737ac1a48727">
<head>
<meta charset="utf-8">
<title>Profilo non completo</title>
<meta content="admin" property="og:title">
<meta content="width=device-width, initial-scale=1" name="viewport">
<meta content="Webflow" name="generator">
<link href="../css/admin/normalize.css" rel="stylesheet" type="text/css">
<link href="../css/admin/webflow.css" rel="stylesheet" type="text/css">
<link href="../css/admin/mobidoc.webflow.css?v=1" rel="stylesheet" type="text/css">
<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script>
<script type="text/javascript">WebFont.load({  google: {    families: ["Montserrat:100,100italic,200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic","Poppins:100,100italic,200,300,300italic,regular,500,600,700,800,900","PT Serif Caption:regular"]  }});</script>
<!-- [if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js" type="text/javascript"></script><![endif] -->
<script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script>
<link href="../images/favicon.png" rel="shortcut icon" type="image/x-icon">
<link href="../images/webclip.png" rel="apple-touch-icon">
<script src="https://kit.fontawesome.com/3f12b8b553.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
<link href="../css/normalize.css" rel="stylesheet" type="text/css">
<link href="../css/webflow.css" rel="stylesheet" type="text/css">
<link href="../css/mobidoc.webflow.css" rel="stylesheet" type="text/css">
<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script>
<script type="text/javascript">WebFont.load({  google: {    families: ["Montserrat:100,100italic,200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic","Poppins:100,100italic,200,300,300italic,regular,500,600,700,800,900","PT Serif Caption:regular"]  }});</script>
<!-- [if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js" type="text/javascript"></script><![endif] -->
<script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script>
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
 height:0px;
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
   height:0px;
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
    width: 100%;}
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
    width:100%;
   }
   .register .admin_main_section {
    width: 80%;
    height: 100vh;
    margin-left: 70px;
    padding-top: 0.5px;
    padding-right: 3%;
    border:1px solid green;
   }

   .register .admin_main_section .admin_section_header {
    display: inline-block;
    left: 70px;
    width: 76%;
    border:1px solid red;
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
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA9O3bcxgKNkrvPOc2kdGKsLF9FnTfh7Go&sensor=false&libraries=places"></script>
<?php

  $fisc_code = '';
  $email = '';
  $call_fname = '';
  $call_lname=  '';
  $phone = '';
  $fname = '';
  $lname = '';
  $admin_note = '';
  $dobb = '';

  $icp_param = '';
  if (isset($_GET['icp'])){
    $icp_param = $_GET['icp'];
    $sql_get_query = "select * from temprary_patient where patient_id ='".$_GET['icp']."'";
    $sql_get_tmp = mysqli_query($conn, $sql_get_query);
    $sql_get_tmp_data = mysqli_fetch_array($sql_get_tmp);

    $patient_id = $sql_get_tmp_data['patient_id'];
    $fisc_code = $sql_get_tmp_data['fiscale'];
    $email = $sql_get_tmp_data['email'];
    $caller_name_string = explode(" ", $sql_get_tmp_data['caller_name']);
    $call_fname = $caller_name_string[0];
    $call_lname=  $caller_name_string[1];
    $phone = $sql_get_tmp_data['phone'];
    $fname = $sql_get_tmp_data['first_name'];
    $lname = $sql_get_tmp_data['last_name'];
    $admin_note = $sql_get_tmp_data['admin_note'];
    $dobb = $sql_get_tmp_data['dob'];
  }
  ?>

</head>
<body class="body-14 register">
<div>
  <?php include ("admin_side_bar.php")?>
  <div data-w-id="410c8c4a-713c-7280-b165-1dd2a36167c1" class="preloader">
    <div class="loader">
      <div data-w-id="410c8c4a-713c-7280-b165-1dd2a36167c3" data-animation-type="lottie" data-src="https://uploads-ssl.webflow.com/5d8cfd454ebd737ac1a48727/5df92a8de51cd1d00a86eb51_lottieflow-loading-04-2-00285C-easey.json" data-loop="1" data-direction="1" data-autoplay="1" data-is-ix2-target="0" data-renderer="svg" data-default-duration="1.7916666666666667" data-duration="0" class="lottie-animation-2"></div>
    </div>
  </div>
</div>
<div class="admin_main_section">
  <div data-w-id="671d7027-6f87-1c3f-c474-3b17f4b83b06" class="admin_section_header">
    <h1 class="admin_section_heading">Profilo paziente incompleto</h1>
    <!-- <div class="div-block-70">
      <div class="scroll_indicator">
        <div data-w-id="98c7cd18-996f-4b08-777e-ae54e6517910" data-animation-type="lottie" data-src="https://uploads-ssl.webflow.com/5d8cfd454ebd737ac1a48727/5df9f0f25ccbf3bb4c727941_lottieflow-scrolling-01-1-00285C-easey.json" data-loop="0" data-direction="1" data-autoplay="0" data-is-ix2-target="1" data-renderer="svg" data-default-duration="2.76" data-duration="0" class="lottie-animation-3"></div>
      </div>
      <div id="add">
        <div class="search home">
          <div class="form-block w-form">
            <form id="Search_form" name="email-form" action="javascript:;" method="get" class="form">
              <input type="text" class="text-field homapge w-input" autocomplete="off" maxlength="256" name="search" data-name="Name 2" placeholder="Ricerca il tipo di visita" id="name-2" required="">
              <input type="button" value="Search" class="submit-button homepage w-button">
            </form>
          </div>
        </div>
      </div>
    </div>--> 
    <a href="logout.php" class="admin_logout"></a></div>
  <div class="section_content mt-240" >
    <div class="applications">
      <div class="doctors_block">
        <div class="custom_container update_form">
          <div class="update_form_main_container">
            <div class="update_form_block w-form">
              <form id="email-form" name="email-form" class="update_form" action="patient_reg.php" method="post" enctype="multipart/form-data">
                <?php if (isset($_GET['icp'])){?>
                <input type="hidden" value="<?php echo $patient_id?>" name="patient_temp_id">
                <?php }?>
                <div>
                 <div class="form_section">
                  <div class="form_section_heading">Controllo Anagrafica Paziente</div>
                   <?php
                   if (isset($_GET['err']) && ($_GET['err'] == '1')){
                     ?>
                    <div class="error">
                     <div>Email già registrata.</div>
                    </div>
                   <?php }?>
                  <input type="text" class="inputs w-input" maxlength="256" name="fiscal_code" data-name="fiscal_code" placeholder="Codice Fiscale *" id="fiscal_code" value="<?php echo $fisc_code?>" autocomplete="off">
                 </div>
                 <div class="form_section">
                  <div class="form_section_heading">Informazioni Contatto</div>
                  <div class="dual_container diff">
                   <input type="text" class="inputs w-input" maxlength="256" name="call_first_name" data-name="first_name" placeholder="Nome *" value="<?php echo $call_fname?>" id="caller_first_name">
                   <input type="text" class="inputs w-input" maxlength="256" name="call_last_name" data-name="last_name" placeholder="Cognome *" value="<?php echo $call_lname?>" id="caller_last_name">
                  </div>
                  <div class="dual_container diff">
                   <input type="email" class="inputs w-input" maxlength="256" name="email" data-name="email" placeholder="Email *" value="<?php echo $email?>" id="email" required>
                   <input type="tel" class="inputs w-input" maxlength="256" name="tele" data-name="tele" placeholder="Telefono *" value="<?php echo $phone?>" id="tele">

                  </div>
                 </div>
                  <div class="form_section">
                    <div class="form_section_heading">Informazioni Paziente</div>
                    <div class="dual_container diff">
                      <input type="text" class="inputs w-input" maxlength="256" name="first_name" data-name="first_name" placeholder="Nome *" value="<?php echo $fname?>" id="first_name">
                      <input type="text" class="inputs w-input" maxlength="256" name="last_name" data-name="last_name" placeholder="Cognome *" value="<?php echo $lname?>" id="last_name">
                    </div>
                    <input type="text" class="datepicker-here inputs w-input date_of_birth" data-language="it" data-date-format="dd-mm-yyyy" maxlength="256" autocomplete="off" name="dob" placeholder="Data di Nascita *" id="dob" style="margin-bottom: 25px">
                    <input style="margin-bottom: 15px" type="text" class="inputs w-input" value="" maxlength="256" name="address" placeholder="Indirizzo Completo *" id="address_search">
                    <input type="hidden" class="inputs w-input gmap_adress" value="" maxlength="256" name="gmap_addr" placeholder="Indirizzo Completo *" >
                    <div class="map" id="map" style="width: 100%; height: 300px;margin: 0% auto 33px;"></div>
                    <?php
             /*
             <div class="form_area">
              <input type="text" name="location" id="location">
              <input type="text" name="lat" id="lat">
              <input type="text" name="lng" id="lng">
             </div>
             */
             ?>
                    <textarea placeholder="Note *" maxlength="10000" id="personal_description"
                       name="admin_note" data-name="personal_description"
                       class="text_area_profile personal_description w-input"><?php echo $admin_note?></textarea>
                  </div>
                  <div class="form_section">
                    <div class="form_section_heading">Prenotazione Prestazione</div>
                    <div class="duo_flex">
                      <div class="choose_your_area select1">
                        <div class="search_cap_input sci2">
                          <div class="input_element" style="background:#d3fbff;"> <img src="../images/search.svg" width="28"  alt="">
                            <select id="select-visit" placeholder="Seleziona Prestazione *" name="vist_name" onchange="getVisitDoc()">
                              <option value="">Seleziona Prestazione</option>
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
                          <div class="input_element" style="background:#d3fbff;"> <img src="../images/search.svg" width="28"  alt="">
                            <select id="select-doctor" placeholder="Seleziona Esecutore *" class="select-doctor-new" multiple name="doc_id[]">
                              <option value="">Seleziona Esecutore</option>
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
                 <option value="">Seleziona Refertatore</option>
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
                  <div class="form_section">
                    <div class="form_section_heading">Metodo di Pagamento</div>
                    <div class="duo_flex">
                      <div class="choose_your_area cash_method_select">
                        <div class="search_cap_input sci2">
                          <div class="input_element" style="background:#d3fbff;"> <img src="../images/search.svg" width="28"  alt="">
                            <select id="cash-option" placeholder="Metodo di Pagamento" name="payment_mode">
                              <option value="Contanti">Contanti</option>
                              <option value="Bancomat">Bancomat</option>
                              <option value="Bonifico Bancario">Bonifico Bancario</option>
                            </select>
                            <script>
                  $('#cash-option').selectize();
                </script> 
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <input type="text" name="privacy_check" id="privacy_check" value="0" style="display:none;">
                  <script>
              jQuery(document).ready(function() {
                jQuery('#checkbox').change(function() {
                  if ($(this).prop('checked')) {
                    $('#privacy_check').val('1');
                  }
                  else {
                    $('#privacy_check').val('0');
                  }
                });
              });
            </script>
                  <div class="form_section">
                    <div class="form_section_heading">Consenso privacy</div>
                    <label class="w-checkbox checkbox-field-2">
                    <div class="w-checkbox-input w-checkbox-input--inputType-custom checkbox"></div>
                    <input type="checkbox" id="checkbox" name="checkbox" data-name="Checkbox" style="opacity:0;position:absolute;z-index:-1">
                    <span class="checkbox-label-2 w-form-label">Esprimo il consenso in merito al trattamento e alla comunicazione a terzi dei miei dati personali per finalità di marketing</span>
                    </label>
                  </div>
                  <!--           <div class="error fasical_cd" style="display: none">--> 
                  <!--            <div>Il codice fiscale esiste già.</div>--> 
                  <!--           </div>-->
                  <div class="submit_form_btn">
                    <input type="submit" name="submit" style="color:#fff !important;" value="Invia" id="submit" class="button gradient submit w-button">
                  </div>
                </div>
                <div class="div-block-34">
                  <div class="div-block-35"> </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="end-of-the-list">
        <div class="line"></div>
        <div id="w-node-0e7522d67d94-80dd982b" class="text-block-70">Non ci sono più profili da visualizzare.</div>
        <div class="line"></div>
      </div>
    </div>
  </div>
</div>
<style>
  .search_help_open{
    display: block !important;
  }
  .search_help_open:hover{
    display: block !important;
  }

  .search_cap_input{
    display: inline-flex;
  }

  .selecteds{
    overflow:scroll !important;
  }

  .cap_name_input{
    -webkit-transform:translateX(-30px);
    -ms-transform:translateX(-30px);
    transform:translateX(-30px);
    margin:-5px;
  }
  .text-block-44{
    background:none;
    border:none;
  }
  textarea{resize: none;}
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
    height:0px;
  }
  .p{
    text-align-last: center !important;
  }

  .selectize-control{
    width:100%;
  }

  ::placeholder {
    color:rgba(0, 40, 92, 0.65); !important;
  }

  .selectize-input {
    background:transparent !important;
    border:none;
    box-shadow: none !important;
    padding:20px;
    margin-top:5px !important;
    color:#00285c !important;
  }

  .selectize-dropdown{
    background: #E4FDFF !important;
    border:none;
    margin-top:10px;
    border-radius: 5px !important;
    box-shadow: 3px 30px 50px 0 rgba(0, 37, 84, 0.16) !important;
    color:#00285c !important;
    height:auto !important;
    padding: 0px !important;
    overflow: hidden !important;
  }
  .selectize-dropdown-content{
    max-height:100% !important;
  }

  .selectize-dropdown-content .option{
    padding: 20px !important;
    margin:0px !important;
  }

  input[readonly]{
    background:#D3FBFF !important;
    color:#00285C !important;
  }

  input{
    color:#00285C !important;
  }

 .choose_your_area.select2, .choose_your_area.select3{
  pointer-events: none;
  opacity: 0.6;
 }
</style>
<script>
  // $(document).ready(function(){
  //   // fiscale validation
  //
  //   function validateTaxCode(value) {
  //
  //     var TAX_CODE_LENGTH = 16;
  //     var REGEXP_STRING_FOR_LASTNAME = "[A-Za-z]{3}";
  //     var REGEXP_STRING_FOR_FIRSTNAME = "[A-Za-z]{3}";
  //     var REGEXP_STRING_FOR_BIRTHDATE_YEAR = "[0-9LlMmNnPpQqRrSsTtUuVv]{2}";
  //     var REGEXP_STRING_FOR_BIRTHDATE_MONTH = "[AaBbCcDdEeHhLlMmPpRrSsTt]{1}";
  //     var REGEXP_STRING_FOR_BIRTHDATE_DAY_GENDER_PART_1 = "[0-7LlMmNnPpQqRrSsTtUuVv]{1}";
  //     var REGEXP_STRING_FOR_BIRTHDATE_DAY_GENDER_PART_2 = "[0-9LlMmNnPpQqRrSsTtUuVv]{1}";
  //     var REGEXP_STRING_FOR_BIRTHTOWN_PART_1 = "[A-Za-z]{1}";
  //     var REGEXP_STRING_FOR_BIRTHTOWN_PART_2 = "[0-9LlMmNnPpQqRrSsTtUuVv]{3}";
  //     var REGEXP_STRING_FOR_CIN = "[A-Za-z]{1}";
  //     var REGEXP = new RegExp("^" + REGEXP_STRING_FOR_LASTNAME + REGEXP_STRING_FOR_FIRSTNAME + REGEXP_STRING_FOR_BIRTHDATE_YEAR + REGEXP_STRING_FOR_BIRTHDATE_MONTH + REGEXP_STRING_FOR_BIRTHDATE_DAY_GENDER_PART_1 + REGEXP_STRING_FOR_BIRTHDATE_DAY_GENDER_PART_2 + REGEXP_STRING_FOR_BIRTHTOWN_PART_1 + REGEXP_STRING_FOR_BIRTHTOWN_PART_2 + REGEXP_STRING_FOR_CIN + "$");
  //     var ODD_CHARS_MAP = new Map();
  //     var EVEN_CHARS_MAP = new Map();
  //     var MODS_MAP = new Map();
  //
  //     var validCode = false;
  //
  //     ODD_CHARS_MAP.set("0", 1);
  //     ODD_CHARS_MAP.set("1", 0);
  //     ODD_CHARS_MAP.set("2", 5);
  //     ODD_CHARS_MAP.set("3", 7);
  //     ODD_CHARS_MAP.set("4", 9);
  //     ODD_CHARS_MAP.set("5", 13);
  //     ODD_CHARS_MAP.set("6", 15);
  //     ODD_CHARS_MAP.set("7", 17);
  //     ODD_CHARS_MAP.set("8", 19);
  //     ODD_CHARS_MAP.set("9", 21);
  //     ODD_CHARS_MAP.set("A", 1);
  //     ODD_CHARS_MAP.set("B", 0);
  //     ODD_CHARS_MAP.set("C", 5);
  //     ODD_CHARS_MAP.set("D", 7);
  //     ODD_CHARS_MAP.set("E", 9);
  //     ODD_CHARS_MAP.set("F", 13);
  //     ODD_CHARS_MAP.set("G", 15);
  //     ODD_CHARS_MAP.set("H", 17);
  //     ODD_CHARS_MAP.set("I", 19);
  //     ODD_CHARS_MAP.set("J", 21);
  //     ODD_CHARS_MAP.set("K", 2);
  //     ODD_CHARS_MAP.set("L", 4);
  //     ODD_CHARS_MAP.set("M", 18);
  //     ODD_CHARS_MAP.set("N", 20);
  //     ODD_CHARS_MAP.set("O", 11);
  //     ODD_CHARS_MAP.set("P", 3);
  //
  //     ODD_CHARS_MAP.set("Q", 6);
  //     ODD_CHARS_MAP.set("R", 8);
  //     ODD_CHARS_MAP.set("S", 12);
  //     ODD_CHARS_MAP.set("T", 14);
  //     ODD_CHARS_MAP.set("U", 16);
  //     ODD_CHARS_MAP.set("V", 10);
  //     ODD_CHARS_MAP.set("W", 22);
  //     ODD_CHARS_MAP.set("X", 25);
  //     ODD_CHARS_MAP.set("Y", 24);
  //     ODD_CHARS_MAP.set("Z", 23);
  //
  //     EVEN_CHARS_MAP.set("0", 0);
  //     EVEN_CHARS_MAP.set("1", 1);
  //     EVEN_CHARS_MAP.set("2", 2);
  //     EVEN_CHARS_MAP.set("3", 3);
  //     EVEN_CHARS_MAP.set("4", 4);
  //     EVEN_CHARS_MAP.set("5", 5);
  //     EVEN_CHARS_MAP.set("6", 6);
  //     EVEN_CHARS_MAP.set("7", 7);
  //     EVEN_CHARS_MAP.set("8", 8);
  //     EVEN_CHARS_MAP.set("9", 9);
  //     EVEN_CHARS_MAP.set("A", 0);
  //     EVEN_CHARS_MAP.set("B", 1);
  //     EVEN_CHARS_MAP.set("C", 2);
  //     EVEN_CHARS_MAP.set("D", 3);
  //     EVEN_CHARS_MAP.set("E", 4);
  //     EVEN_CHARS_MAP.set("F", 5);
  //     EVEN_CHARS_MAP.set("G", 6);
  //     EVEN_CHARS_MAP.set("H", 7);
  //     EVEN_CHARS_MAP.set("I", 8);
  //     EVEN_CHARS_MAP.set("J", 9);
  //     EVEN_CHARS_MAP.set("K", 10);
  //     EVEN_CHARS_MAP.set("L", 11);
  //     EVEN_CHARS_MAP.set("M", 12);
  //     EVEN_CHARS_MAP.set("N", 13);
  //     EVEN_CHARS_MAP.set("O", 14);
  //     EVEN_CHARS_MAP.set("P", 15);
  //     EVEN_CHARS_MAP.set("Q", 16);
  //     EVEN_CHARS_MAP.set("R", 17);
  //     EVEN_CHARS_MAP.set("S", 18);
  //     EVEN_CHARS_MAP.set("T", 19);
  //     EVEN_CHARS_MAP.set("U", 20);
  //     EVEN_CHARS_MAP.set("V", 21);
  //     EVEN_CHARS_MAP.set("W", 22);
  //     EVEN_CHARS_MAP.set("X", 23);
  //     EVEN_CHARS_MAP.set("Y", 24);
  //     EVEN_CHARS_MAP.set("Z", 25);
  //
  //     MODS_MAP.set(0, "A");
  //     MODS_MAP.set(1, "B");
  //     MODS_MAP.set(2, "C");
  //     MODS_MAP.set(3, "D");
  //     MODS_MAP.set(4, "E");
  //     MODS_MAP.set(5, "F");
  //     MODS_MAP.set(6, "G");
  //     MODS_MAP.set(7, "H");
  //     MODS_MAP.set(8, "I");
  //     MODS_MAP.set(9, "J");
  //     MODS_MAP.set(10, "K");
  //     MODS_MAP.set(11, "L");
  //     MODS_MAP.set(12, "M");
  //     MODS_MAP.set(13, "N");
  //     MODS_MAP.set(14, "O");
  //     MODS_MAP.set(15, "P");
  //     MODS_MAP.set(16, "Q");
  //     MODS_MAP.set(17, "R");
  //     MODS_MAP.set(18, "S");
  //     MODS_MAP.set(19, "T");
  //     MODS_MAP.set(20, "U");
  //     MODS_MAP.set(21, "V");
  //     MODS_MAP.set(22, "W");
  //     MODS_MAP.set(23, "X");
  //     MODS_MAP.set(24, "Y");
  //     MODS_MAP.set(25, "Z");
  //
  //     if(value && value.length == 16 && REGEXP.test(value)) {
  //
  //       var charsSum = 0;
  //
  //       for(var position = 0; position < TAX_CODE_LENGTH - 1; ++position) {
  //         if(((position + 1) % 2) > 0) {
  //           charsSum += ODD_CHARS_MAP.get(value.charAt(position).toUpperCase());
  //         }
  //         else {
  //           charsSum += EVEN_CHARS_MAP.get(value.charAt(position).toUpperCase());
  //         }
  //       }
  //
  //       validCode = (MODS_MAP.get(charsSum % 26)) == value.slice(-1).toUpperCase();
  //     }
  //
  //     return validCode;
  //   };
  //
  //
  //
  //   $('#submit').click(function(){
  //     var fiscale_value = $('#fiscal_code').val();
  //     if(validateTaxCode(fiscale_value) == true){
  //       return true;
  //     } else {
  //       alert('Il codice fiscale non è valido!');
  //       return false;
  //     }
  //   });
  // });

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

    $('#fiscal_code').keyup(function(eev) {
      eev.preventDefault();
    var fis_val = $(this).val();
      $.ajax({
        url: "check_fiscal.php",
        type: "post",
        data: {data:fis_val},
        dataType: "json",
        success: function (response) {
          if (response == 'true'){
            // $(".error.fasical_cd").css("display", "none");
            $("input#fiscal_code").css("background-color", "#d3fbff");
            // $("#submit").attr("style", "opacity: inherit;pointer-events: inherit;color: #fff !important;");
            $("#email, #first_name, #last_name, #caller_first_name, #caller_last_name, #tele").prop( "readonly", false );
            $("#dob").css("pointer-events", "inherit").prop( "readonly", false );
            $("#email").val('');
            $("#first_name").val('');
            $("#last_name").val('');
            $("#dob").val('');
              $("#caller_first_name").val('');
              $("#caller_last_name").val('');
            $("#tele").val('');
            $('.patiend_idd').remove();
          } else {
            $('.patiend_idd').remove();
            $("#email-form").append('<input class="patiend_idd" type="hidden" name="patients_id" value="'+response.paziente_id+'">');
          $("#email, #first_name, #last_name, #caller_first_name, #caller_last_name, #tele").prop( "readonly", true );
          $("#dob").css("pointer-events", "none").prop( "readonly", true );
            // $(".error.fasical_cd").css("display", "block");
            $("input#fiscal_code").css("background-color", "#ffc5c5");
            // $("#submit").attr("style", "opacity: 0.4;pointer-events: none;color: #fff !important;");
                 $("#email").val(response.email);
                 $("#first_name").val(response.first_name);
                 $("#last_name").val(response.last_name);
                 $("#dob").val(response.dob);
                 var call_name = response.caller_name;
                 var phone_num = response.phone;
                 if (call_name){
                   var ret = call_name.split(" ");
                   var call_fname = ret[0];
                   var call_lname = ret[1];
                   $("#caller_first_name").val(call_fname);
                   $("#caller_last_name").val(call_lname);
                 }
                 if (phone_num){
                   $("#tele").val(phone_num);
                 }
          }
        },
        error: function(jqXHR, textStatus, errorThrown) {
          console.log(textStatus, errorThrown);
        }
      });
  });
</script> 
<script>
  /* script */
  function initialize() {
    var latlng = new google.maps.LatLng(44.838124,11.619787);
    var map = new google.maps.Map(document.getElementById('map'), {
      center: latlng,
      zoom: 13
    });
    var marker = new google.maps.Marker({
      map: map,
      position: latlng,
      draggable: true,
      anchorPoint: new google.maps.Point(0, -29)
    });
    var input = document.getElementById('address_search');
    map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
    var geocoder = new google.maps.Geocoder();
    var autocomplete = new google.maps.places.Autocomplete(input);
    autocomplete.bindTo('bounds', map);
    var infowindow = new google.maps.InfoWindow();
    autocomplete.addListener('place_changed', function() {
      infowindow.close();
      marker.setVisible(false);
      var place = autocomplete.getPlace();
      if (!place.geometry) {
        window.alert("Autocomplete's returned place contains no geometry");
        return;
      }

      // If the place has a geometry, then present it on a map.
      if (place.geometry.viewport) {
        map.fitBounds(place.geometry.viewport);
      } else {
        map.setCenter(place.geometry.location);
        map.setZoom(17);
      }

      marker.setPosition(place.geometry.location);
      marker.setVisible(true);

      bindDataToForm(place.formatted_address,place.geometry.location.lat(),place.geometry.location.lng());
      infowindow.setContent(place.formatted_address);
      infowindow.open(map, marker);

    });
    // this function will work on marker move event into map
    google.maps.event.addListener(marker, 'dragend', function() {
      geocoder.geocode({'latLng': marker.getPosition()}, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
          if (results[0]) {
            bindDataToForm(results[0].formatted_address,marker.getPosition().lat(),marker.getPosition().lng());
            infowindow.setContent(results[0].formatted_address);
            infowindow.open(map, marker);
          }
        }
      });
    });
  }
  function bindDataToForm(address,lat,lng){

    $(".gmap_adress").val("https://www.google.com/maps/place/"+address+"/@"+lat+","+lng);
    // document.getElementById('location').value = address;
    // document.getElementById('lat').value = lat;
    // document.getElementById('lng').value = lng;
  }
  google.maps.event.addDomListener(window, 'load', initialize);
</script> 
<script src="/paziente/date_pic.js?v=1"></script>
<script src="/paziente/dist/js/i18n/datepicker.en.js?v=1"></script>
<script type="text/javascript">
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
</script>
<div class="menu_current w-embed w-script"> 
  <script>
      $(document).ready(function(){
        $('.admin_item:nth-child(3)').addClass('current');
      });

    </script> 
</div>
<script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.4.1.min.220afd743d.js" type="text/javascript" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script> 
<script>
  $(document).ready(function(){
    $(".search .text-field").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      if (value.length == 0){
        $("#Search_form .w-button").css("display", "block");
      }else {
        $("#Search_form .w-button").css("display", "none");
      }
      $(".doctors_block .regi_doctor_card").filter(function() {
        $(this).toggle($(".email-text, .fasic-text", this).text().toLowerCase().indexOf(value) > -1)
      });
    });
  });
</script> 
<script src="../js/admin/webflow.js" type="text/javascript"></script> 
<!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
<div id="fb-root"></div>
<script async="" defer="" crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v4.0"></script>
</body>
</html>