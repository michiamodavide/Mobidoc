<?php session_start();
if (isset($_GET['email'])) {
  $email = $_GET['email'];

  include '../connect.php';

  $sql2 = "select * from doctor_profile where email = '" . $email . "'";
  $result2 = mysqli_query($conn, $sql2);
  $rows = mysqli_fetch_array($result2);
  $doctorr_id = $rows['doctor_id'];
  $rowcount2 = mysqli_num_rows($result2);

  $sql = "select * from doctor_register where id = '" . $doctorr_id . "'";
  $result = mysqli_query($conn, $sql);
  $result_row_new = mysqli_fetch_array($result);

  if ($rowcount2 < 1 || $result_row_new['status'] == 0) {
    header("location: validate.php");
  }


  if ($rowcount2) {
//    $rows = mysqli_fetch_array($result2);
    $r1 = $rows['fname'];
    $r2 = $rows['lname'];
    $r3 = $rows['email'];
    $pro_phone = $rows['phone'];
    $doc_title = $rows['title'];
    $approved = $result_row_new['status'];
    if ($approved == 0) {
      header("location: validate.php");
    }
    //$_SESSION['doctor_email']=$_GET['email'];
  } else
    header("location: validate2.php");
  mysqli_close($conn);
} else {
  header("location: validate.php");
} ?>
<!DOCTYPE html>
<html data-wf-page="5daa262de3e3f05ab91af322" data-wf-site="5d8cfd454ebd737ac1a48727">
<head>
 <meta charset="utf-8">
 <title>Crea un Profilo</title>
 <meta content="Crea un Profilo" property="og:title">
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
 <link href="dist/css/datepicker.css" rel="stylesheet" type="text/css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
 <link href="../dist/css/selectize.default.css" rel="stylesheet"/>
 <script src="../dist/js/standalone/selectize.min.js"></script>
 <script src="dist/js/datepicker.js"></script>
 <script src="dist/js/i18n/datepicker.en.js"></script>
 <script src="https://kit.fontawesome.com/3f12b8b553.js" crossorigin="anonymous"></script>
 <style>
  ::-webkit-scrollbar {
   width: 0px;
   height: 0px;
  }

  .p {
   text-align-last: center !important;
  }
 </style>
  <?php include("../cam_visit.php") ?>
</head>

<body>
<?php include '../header-prof.php'; ?>
<div class="master_head detaild">
 <div class="custom_container detailed">
  <h1 class="heading-15">Dettagli Profilo</h1>
  <div class="text-block-41">Compila I seguenti moduli per completare la registrazione</div>
 </div>
 <div class="text-block-52">Si prega di connettersi a dispositivo Desktop per completare la registrazione.</div>
</div>
<div class="section-23">
 <div class="custom_container">
  <!-- <p class="paragraph-9">
    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros elementum tristique. Duis cursus, mi quis viverra ornare, eros dolor interdum nulla, ut commodo diam libero vitae erat. Aenean faucibus nibh et justo cursus id rutrum lorem imperdiet. Nunc ut sem vitae risus tristique posuere.
  </p> -->
  <div class="update_form_main_container">
   <div class="update_form_block w-form">
    <form id="email-form" name="email-form" data-name="Email Form" class="update_form" action="create.php" method="post"
          enctype="multipart/form-data">
     <div>
      <div class="form_section">
       <div class="form_section_heading">Dati Personali</div>
       <div class="dual_container">
        <input type="hidden" name="doctor-id" value="<?php echo $rows['doctor_id']?>">
        <input type="text" class="inputs proff w-input" maxlength="100" id="nome" name="nome" data-name="nome"
               value="<?PHP echo $r1; ?>" id="nome" required="" readonly>
        <input type="text" class="inputs proff w-input" maxlength="100" id="cognome" name="cognome" data-name="cognome"
               value="<?PHP echo $r2; ?>" id="cognome" required="" readonly>
        <input type="password" class="inputs proff w-input" maxlength="100" id="pwrds" name="pwrds" data-name="pwrds"
               placeholder="Password *" id="pwrds" required="">
        <input type="password" class="inputs proff w-input" maxlength="100" id="Cnfrm_pwrd" name="Cnfrm_pwrd"
               data-name="Cnfrm_pwrd *" placeholder="Conferma Password" id="Cnfrm_pwrd" required="">
        <input type="text" class="datepicker-here inputs proff w-input" autocomplete="off" data-language="it" data-date-format="dd-mm-yyyy"
               maxlength="256" name="dob" placeholder="Data di Nascita" id="dob" required="">
        <input type="text" class="inputs proff w-input" name="fiscal_code" data-name="fiscal_code"
               placeholder="Codice Fiscale *" id="fiscal_code" required="">
        <input type="text" class="inputs proff w-input" name="vat_number" data-name="vat_number"
               placeholder="Partita IVA" id="vat_number">
       </div>
      </div>

      <div class="form_section">
       <div class="form_section_heading">Descrizione Profilo</div>
       <textarea placeholder="Educazione *" maxlength="10000" id="educazione" name="personal_description-3"
                 data-name="Personal Description 3" class="text_area_profile education w-input" required></textarea>
       <textarea placeholder="Esperienze Professionali *" maxlength="10000" id="esperienze_professionali-2"
                 name="personal_description-2" data-name="Personal Description 2" class="text_area_profile w-input"
                 required></textarea>
      </div>
     </div>
     <div class="div-block-34">
      <div class="div-block-35">
       <div class="profile_image_container proff" id="profile_image">
        <div id="dp"
             style="width:100%; height:100%; background-position:center; background-size:cover;cursor: pointer"></div>
       </div>
       <div class="text-block-33" style="cursor:pointer;">Immagine del profilo</div>
       <br>
       <input type="file" class="upload_image" style="display:none;" name="upload-image" accept="image/*"
              onchange="readURL(this);">
       <script>
         $(document).ready(function () {
           $('.text-block-33, .profile_image_container').click(function () {
             $('.upload_image').trigger("click");
             $('.upload_image').change(function () {
               var filename = $('.upload_image').val();
               var pos = filename.lastIndexOf("\\");
               filename = filename.substr(pos + 1);
               if (filename != '') {
                 $('.text-block-33').html(filename);
                 $('.profile_image_error').removeClass("error_show");

               } else {
                 $('.text-block-33').html("Immagine del profilo");
               }

             });
           });
         });

         function readURL(input) {
           if (input.files && input.files[0]) {
             var reader = new FileReader();

             reader.onload = function (e) {
               $('#dp').css('background', 'url("' + e.target.result + '") no-repeat center center / cover')
             };
             reader.readAsDataURL(input.files[0]);
           }
         }
       </script>
      </div>
     </div>
     <div id="w-node-a51d9beef4d6-b91af322" class="div-block-42">
      <div class="form_section">
       <div class="form_section_heading">Visite ed Esami</div>
       <div class="paragraph-10">Seleziona il tipo di servizi che i pazienti possono prenotare e inserisci il prezzo
        rispettivamente:
       </div>
       <div class="visit_selector_grid">
        <div class="slectors">
         <div class="visits_selector_container">
          <!--start-->
            <div class="visit">
             <div class="visit_heading">
              <div class="text-block-42"><?php echo trim($doc_title); ?></div>
              </div>
             <div class="visit_subitem_container_new" style="width: 488.391px;height: auto">
               <?php
               include '../connect.php';
               $get_medical_spec = "SELECT ERid from medical_specialty WHERE name='".trim($doc_title)."'";
               $get_medical_result = mysqli_query($conn, $get_medical_spec);
               $get_medical_row = mysqli_fetch_array($get_medical_result);
               $erid = $get_medical_row['ERid'];

               $sql2 = "SELECT DISTINCT am.id AS article_id, descrizione
FROM articlesMobidoc am
JOIN articlesMobidoc_specialty as ams ON am.id = ams.id
JOIN medical_specialty as ms ON '".$erid."'=ams.specialtyMobidoc
WHERE ms.status='Y' AND (am.home = 'Y' OR am.tele = 'Y')";

               $result2 = mysqli_query($conn, $sql2);
               while ($rows2 = mysqli_fetch_array($result2)) {
                 $visit_type_name = trim($rows2['descrizione']);
                 $article_id = trim($rows2['article_id']);
                 ?>
                <div class="visit_subitem" data-item="<?php echo $visit_type_name ?>" data-id="<?php echo $article_id ?>">
                 <div class="text-block-43">
                   <?php echo $visit_type_name; ?>
                 </div>
                 <img src="../images/Path-175.svg" alt="" class="image-12"></div>
               <?php }
               mysqli_close($conn); ?>
             </div>
             <input type="hidden" name="doc_spaciality" value="<?php echo $erid?>">
            </div>
          <!--end-->
         </div>
        </div>
        <div class="selecteds" id="visits">
        </div>
       </div>
      </div>
      <div id="w-node-67641905fe38-b91af322" class="cap_selecteors" id="capi">
       <div class="form_section_heading">Aggiungi città</div>
       <div class="paragraph-10">Aggiungi i Comuni sui quali opererai:</div>
       <div class="search_cap_input">
        <div class="input_element">
         <img src="../images/search.svg" width="28" alt="">

         <select id="select-comune" placeholder="Inserisci CAP o Comune *">
          <option value="">Inserisci CAP o Comune</option>
           <?php
           include '../connect.php';
           $sql = "select * from mobi_cap order by Comune";
           $result = mysqli_query($conn, $sql);
           while ($rows = mysqli_fetch_array($result)) {
             $comune = $rows['Comune'];
             $provincia = $rows['Provincia'];
             $cap = $rows['CAP'];
             ?>
            <option
             value="<?PHP echo $comune . ' (' . $provincia . '), ' . $cap; ?>"><?PHP echo $comune . " (" . $provincia . "), " . $cap; ?></option>
           <?php }
           mysqli_close($conn); ?>
         </select>
         <script>
           $('#select-comune').selectize();
         </script>
        </div>
        <a href="#" class="button-7 w-button"></a>
       </div>
       <div class="cap_selected"></div>
      </div>
     </div>
     <div>

      <div class="form_section">
       <div class="form_section_heading">Contatti</div>
       <div class="dual_container">
        <input type="email" class="inputs proff w-input" maxlength="100" name="email" data-name="Email"
               value="<?PHP echo $r3; ?>" id="email" required="" readonly>
        <input type="text" class="inputs proff w-input" maxlength="15" name="tele" data-name="Tele"
               placeholder="Telefono *" value="<?php echo $pro_phone?>" id="tele" required="">
        <input type="text" class="inputs proff w-input" maxlength="100" name="Via" data-name="Via" placeholder="Via *"
               id="Via" required="">
        <input type="text" class="inputs proff w-input" name="Civico" data-name="Civico" placeholder="Civico *"
               id="Civico" required="">

       </div>

       <div class="choose_your_area">
        <div class="search_cap_input sci2">
         <div class="input_element">
          <img src="../images/search.svg" width="28" alt="">

          <select id="select-comun" placeholder="Seleziona comune" name="select_comun" required>
           <option value="">Seleziona comune</option>
            <?php
            include '../connect.php';
            $sql = "select * from mobi_cap order by Comune";
            $result = mysqli_query($conn, $sql);
            while ($rows = mysqli_fetch_array($result)) {
              $comune = $rows['Comune'];
              $provincia = $rows['Provincia'];
              $cap = $rows['CAP'];
              ?>
             <option
              value="<?PHP echo $comune . ' (' . $provincia . '), ' . $cap; ?>"><?PHP echo $comune . " (" . $provincia . "), " . $cap; ?></option>
            <?php }
            mysqli_close($conn); ?>
          </select>
          <script>
            $('#select-comun').selectize();
          </script>
         </div>
        </div>
       </div>

       <div class="check_accept" style="margin-top:30px;">
        <label class="w-checkbox checkbox-field">
         <div class="w-checkbox-input w-checkbox-input--inputType-custom checkbox proff"></div>
         <input type="checkbox" id="checkbox" name="checkbox" data-name="Checkbox" required=""
                style="opacity:0;position:absolute;z-index:-1">
         <span class="prff w-form-label">Per presa visione ed accettazione<br>
                    <span class="text-span-4">
                      Il presente Codice di Comportamento Mobidoc, redatto ed approvato dalla società Tekamed S.r.l. (C.F.:01997780380), corrente in Ferrara (FE), via Bellaria, 6, anche in qualità di Titolare del trattamento (nelprosieguo, per brevità, anche “Mobidoc” o la “Direzione”), vale . . . . . . . .</span>
                      <a href="https://drive.google.com/file/d/12zuzO-CGass79yydWfR-JBKg_lyKw_YB/view?usp=sharing"
                         target="_blank"><span class="text-span-4"> leggi di più</span></a>
                    </span>
        </label>
       </div>
      </div>

      <div class="error_container">
       <div class="error_message password_dont_match" onClick="window.location='#pwrds';">
        <div class="text-block-30">Le password non corrispondono.</div>
       </div>
       <div class="error_message prsn_desc_length" onClick="window.location='#personal_description';">
        <div class="text-block-30">Si prega di introdurre almeno 20 caratteri per il campo dedicato alla descrizione
         personale.
        </div>
       </div>
       <div class="error_message educazione_length" onClick="window.location='#educazione';">
        <div class="text-block-30">Si prega di introdurre almeno 20 caratteri per il campo dedicato all’ educazione.
        </div>
       </div>
       <div class="error_message esperienze_length" onClick="window.location='#esperienze_professionali-2';">
        <div class="text-block-30">Si prega di introdurre almeno 20 caratteri per il campo dedicato alle esperienze
         professionali.
        </div>
       </div>
       <div class="error_message age" onClick="window.location='#dob';">
        <div class="text-block-30">Devi avere compiuto almeno 22 anni di età per continuare la registrazione.</div>
       </div>
       <div class="error_message visit" onClick="window.location='#visits';">
        <div class="text-block-30">Si prega di selezionare almeno una visita.</div>
       </div>
       <div class="error_message capi" onClick="window.location='#capi';">
        <div class="text-block-30">Si prega di selezionare almeno un CAP.</div>
       </div>
       <div class="error_message fiscale" onClick="window.location='#fiscal_code';">
        <div class="text-block-30">Il codice fiscale non è valido.</div>
       </div>
       <div class="error_message profile_image_error" onClick="window.location='#profile_image';">
        <div class="text-block-30">Devi caricare la foto e l'immagine del tuo profilo non più di 2 MB</div>
       </div>
      </div>
      <input type="submit" id="submit_profile" name="submit" value="Conferma  Dati"
             class="button gradient submit proff w-button">
     </div>
    </form>
   </div>
  </div>
 </div>
</div>

<script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.4.1.min.220afd743d.js" type="text/javascript"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="../js/webflow.js" type="text/javascript"></script>
<!-- [if lte IE 9]>
<script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
<div id="fb-root"></div>
<script type="application/javascript">
  var visit_type_array = <?php echo json_encode($cam_array); ?>;
</script>
<script async="" defer="" crossorigin="anonymous"
        src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v4.0"></script>
<script src="../js/crea_un_profilo.js?v=32" type="text/javascript"></script>
<script src="../js/validations.js?v=20" type="text/javascript"></script>
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
  background: #ebeef2 !important;
  border: none;
  margin-top: 10px;
  border-radius: 5px !important;
  box-shadow: 3px 30px 50px 0 rgba(0, 37, 84, 0.16) !important;
  color: #00285c !important;
  height: 250px !important;
  padding: 0px !important;
  overflow: hidden !important;
 }
 .input_element_new .selectize-dropdown {
  height: auto !important;
 }
 .selectize-dropdown-content {
  max-height: 100% !important;
 }

 .selectize-dropdown-content .option {
  padding: 20px !important;
  margin: 0px !important;
 }

</style>
<style>
 .error_message {
  margin-bottom: 25px;
 }

 .error_show {
  display: block !important;
 }

 .choose_your_area {
  margin-top: 30px;
  margin-bottom: -10px;
 }

 .sci2 {
  width: 100% !important;
 }

 .sci2 .input_element {
  width: 100% !important;
 }
</style>
<?php include("../google_analytic.php") ?>
</body>
</html>
