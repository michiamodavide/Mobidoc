<?php
if(isset($_GET['admin'])){
  $admin = 1;
} else {
  $admin = 0;
}
?>
<!DOCTYPE html>
<html data-wf-page="5daa262de3e3f0ae581af321" data-wf-site="5d8cfd454ebd737ac1a48727">
<head>
  <meta charset="utf-8">
  <title>Professionisti Register</title>
  <meta content="Professionisti Register" property="og:title">
  <meta content="width=device-width, initial-scale=1" name="viewport">
  <meta content="Webflow" name="generator">
  <link href="../css/normalize.css" rel="stylesheet" type="text/css">
  <link href="../css/webflow.css" rel="stylesheet" type="text/css">
  <link href="../css/mobidoc.webflow.css" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script>
  <script type="text/javascript">WebFont.load({  google: {    families: ["Montserrat:100,100italic,200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic","Poppins:100,100italic,200,300,300italic,regular,500,600,700,800,900","PT Serif Caption:regular"]  }});</script>
  <!-- [if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js" type="text/javascript"></script><![endif] -->
  <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script>
  <link href="../images/favicon.png" rel="shortcut icon" type="image/x-icon">
  <link href="../images/webclip.png" rel="apple-touch-icon">
  <script src="https://kit.fontawesome.com/3f12b8b553.js" crossorigin="anonymous"></script>
  <style>
::-webkit-scrollbar {
  width: 0px;
  height:0px;
}
	.p{
  	text-align-last: center !important;
  }
</style>
  <style>
/* Kill the blink/flickering */
.forms_container {
    -webkit-backface-visibility: hidden;
    -webkit-transform: translateZ(0) scale(1.0, 1.0);
    transform: translateZ(0);
}
.email_dont_match{
 display:none;
}
.error_show{
 display:block;
}
</style>
</head>
<body>
  <?php include '../header-prof.php';?>
  
  <div class="master_head login">

    <div class="masthead_container login diff">

      <div class="div-block-31 diff diffrent">
      <a href="/" style="text-decoration:none; color:#fff;"><div><img src="/images/back_bc.svg">&nbsp;&nbsp; Indietro</div></a><br>
        <h1 class="heading-9">Unisciti al <br>team</h1>
        <div class="text-block-57">Unisciti al Team di Mobidoc compilando il seguente form. Ci penseremo noi a contattarti.</div>
      </div>

      <div class="login_form_container proff">
        <div class="form_parent_container">
          <div data-w-id="0519d48f-fd8c-3004-c5b2-f235eaac07c1" class="forms_container proff w-clearfix">
            <div class="login_form w-clearfix w-form">

              <form name="email-form" id="regist_form" class="form-4" action="<?php if($admin == 1){echo 'register.php?admin';}else{echo 'register.php';}?>" method="post" enctype="multipart/form-data">
                <div class="dual_container proff">
                  <input type="text" class="text-field-3 proff w-input" name="Name" data-name="First Name" placeholder="Nome di battesimo" id="Name"  pattern="[A-Z][a-z]*" title="Il nome deve essere in lettere e la prima lettera deve essere maiuscola" required=""  autocomplete="off" >
                  <input type="text" class="text-field-3 proff w-input" name="Cognome" data-name="Cognome" placeholder="Cognome" id="Cognome" required="" pattern="[A-Z][a-z]*" title="Il nome deve essere in lettere e la prima lettera deve essere maiuscola" autocomplete="off">
                </div>
                <input type="email" class="text-field-3 proff w-input" autocomplete="off" maxlength="50" name="email" data-name="email" placeholder="Email" id="email" required="">
                <input type="email" class="text-field-3 proff w-input" autocomplete="off" maxlength="50" name="confirm-email" data-name="confirm-email" placeholder="Conferma Email" id="confirm-email" required="">
               <input type="text" class="text-field-3 proff w-input" autocomplete="off" maxlength="50" name="description" placeholder="Descrivi la tua specialità" id="confirm-email" required="">

               <?php
               /*
               <input type="tel" class="text-field-3 proff w-input" placeholder="Telefono" maxlength="15" name="tele" required="" autocomplete="off">
               */
               ?>
                <?php if($admin == 0) {?>
                <div class="upload_cv">
                  <div class="div-block-56"><img src="../images/upload.svg" width="24" alt=""><img src="../images/warning.svg" width="24" alt="" class="image-18"><img src="../images/file.svg" width="21" alt="" class="image-17">
                    <div class="text-block-53">Allega CV (PDF o documento Word)</div>
                  </div>
                  <div class="upload_scceesful"><img src="../images/Path-210.svg" alt=""></div>
                </div>
                <?php } else {
                  //echo 'admin';
                }?>

                <div class="check_box_container">
                  <label class="w-checkbox checkbox-field">
                    <div class="w-checkbox-input w-checkbox-input--inputType-custom checkbox proff"></div>
                    <input type="checkbox" id="checkbox" name="checkbox" data-name="Checkbox" style="opacity:0;position:absolute;z-index:-1" required>
                    <span class="prff w-form-label">
                      Consenso GDPR<br>
                      <span class="text-span-4">
                        Ho letto e compreso l'<a href="/professionisti-privacy.html" target="_blank">informativa</a> e acconsento al trattamento dei miei dati personali ai fini dell'elaborazione della mia registrazione come professionista in Mobidoc.it.
                      </span>
                    </span>
                  </label>
                </div>

               <div class="check_box_container">
                <label class="w-checkbox checkbox-field">
                 <div class="w-checkbox-input w-checkbox-input--inputType-custom checkbox proff"></div>
                 <input type="checkbox" id="checkbox-m" name="checkbox-m" data-name="checkbox-m" style="opacity:0;position:absolute;z-index:-1">
                 <span class="prff w-form-label">
                      <span class="text-span-4">
                       Consenso al Trattamento di Dati Personali: Letta e compresa l’informativa privacy, premendo su “Presto il consenso” o “Nego il consenso”, esprimo la mia volontà in merito al trattamento dei miei dati personali per finalità di marketing: invio di comunicazioni di carattere commerciale, informativo e promo-pubblicitario su prodotti, servizi ed attività di Tekamed S.r.l., con modalità automatizzate di contatto o comunicazioni elettroniche mediante l’utilizzo di posta elettronica e messaggi del tipo SMS, IM, MMS, notifiche push; compimento di indagini di mercato e rilevazione del gradimento e della soddisfazione sui servizi resi agli interessati. Comunicazioni informative, commerciali e pubblicitarie che acconsento a ricevere anche tramite posta cartacea o chiamate telefoniche. Questo consenso potrà essere revocato nello stesso modo.
                      </span>
                    </span>
                </label>
               </div>

                <?php if($admin == 0) {?>
				        <div>
					        <input type="file" name="cv" class="file_upload_input" accept=".pdf, application/msword" required>
                </div>
                <?php } ?>
                
                

                <div class="error_message file_not_available" >
                  <div class="text-block-30">Si prega di allegare il CV</div>
                </div>

               <div class="error_message email_dont_match">
                <div>Le email non combaciano!</div>
               </div>
                <?PHP
                $show_error = 0;
                include ("../recapctha.php");
                  if(isset($_POST['submit']) && $_POST['email'] == $_POST['confirm-email'])
                  {

                    $recaptcha = $_POST['g-recaptcha-response'];
                    $res = reCaptcha($recaptcha);

                if(!$res['success']){
                  $show_error = 1;
                  $error_text = 'Si prega di compilare recaptcha.';
                }else{

                  $check_marketing_checkbox = array('checkbox-m');
                  $check_marketing_checkbox_ver = 1;
                  foreach($check_marketing_checkbox as $mark_checkbox) {
                    if(!isset($_POST[$mark_checkbox]) || empty($_POST[$mark_checkbox])) {
                      $check_marketing_checkbox_ver = 0;
                    }
                  }

                  include '../connect.php';
                  $fname = mysqli_real_escape_string($conn, $_POST['Name']);
                  $lname = mysqli_real_escape_string($conn, $_POST['Cognome']);
                  $email = mysqli_real_escape_string($conn, $_POST['email']);
                  $description = mysqli_real_escape_string($conn, $_POST['description']);
                  $checkbox = mysqli_real_escape_string($conn, $_POST['checkbox']);
                  $cv_status = 'Y';
                  if($admin == 1){
                    $cv = "cv/default_cv.pdf";
                  } else {
                    $b = explode("@",$email);
                    $imageFileType = pathinfo($_FILES["cv"]["name"],PATHINFO_EXTENSION);
                    $cv = "cv/".$b[0]."_cv.".$imageFileType;
                  }

                  $privacy_checkbox = 'N';
                  $market_checkbox = 'N';

                  date_default_timezone_set("Europe/Rome");
                  $dor = date("Y/m/d H:i:s");
                  if ($checkbox == 'on'){
                    $privacy_checkbox = 'Y';
                  }

                  $market_mod = '';
                  if ($check_marketing_checkbox_ver == 1){
                    $market_checkbox = 'Y';
                    $market_mod = date("Y/m/d H:i:s");
                  }

                  $dob = '1970-01-01';
                  if($admin == 0){
                    $sql = "insert into doctor_profile (fname, lname, email, cv, privacy_consent, lastDatePrivacyConsent, marketing_consent, lastDateMarketingConsent, description, dob) values('".$fname."', '".$lname."', '".$email."', '".$cv_status."', '".$privacy_checkbox."', '".$dor."', '".$market_checkbox."', '".$market_mod."', '".$description."', '".$dob."')";
                  } else {
                    $market_checkbox = 'Y';
                    $sql = "insert into doctor_profile (fname, lname, email, cv, privacy_consent, lastDatePrivacyConsent, marketing_consent, lastDateMarketingConsent, description, dob) values('".$fname."', '".$lname."', '".$email."', '".$cv_status."', '".$privacy_checkbox."', '".$dor."', '".$market_checkbox."', '".$dor."', '".$description."','".$dob."')";
                  }

                  $result = mysqli_query($conn, $sql); // or die(mysqli_error($conn));

                  if($result==1)
                  {
                    $last_doctor_id = mysqli_insert_id($conn);
                    if($admin == 0){
                      $sql_new1 = "insert into doctor_register (id, cv, dor, status, remove, tick) values('".$last_doctor_id."', '".$cv."', '".$dor."',0,0,0)";
                    }else{
                      $sql_new1 = "insert into doctor_register (id, cv, dor, status, remove, tick) values('".$last_doctor_id."', '".$cv."', '".$dor."',1,1,1)";
                    }

                    $result_new1 = mysqli_query($conn, $sql_new1);

                    if ($result_new1 == 1){

                      if($admin == 0){
                        move_uploaded_file($_FILES["cv"]["tmp_name"], $cv);
                      }

                      if($admin == 1){
                        $location = '/professionisti/crea-un-profilo.php?email='.$email;
                        echo "<script>window.location = '".$location."'</script>";
                      } else {
                        //header("location: application-sucessful.php");
                        $to = 'info@mobidoc.it';
                        $subject = 'Nuova Candidatura';
                        $from = 'mobidoc_update@mobidoc.it';
                        $rply_email = 'noreplay@mobidoc.it';

                        // To send HTML mail, the Content-type header must be set
                        $headers  = 'MIME-Version: 1.0' . "\r\n";
                        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

                        // Create email headers
                        $headers .= 'From: '.$from."\r\n". 'Reply-To: '.$rply_email."\r\n" .   'X-Mailer: PHP/' . phpversion();

                        // Compose a simple HTML email message
                        $message = '<!DOCTYPE html><html data-wf-page="5dcd852d5095d024f8ea51ae" data-wf-site="5dcd852d5095d04927ea51ad"><head><meta charset="utf-8"><meta content="width=device-width, initial-scale=1" name="viewport"><meta content="Webflow" name="generator"><style>.header{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;width:100%;height:180px;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;-webkit-box-align:center;-webkit-align-items:center;-ms-flex-align:center;align-items:center;background-image:url("https://www.mobidoc.it/images/mailer_header.png");background-position:50% 50%, 50% 0%;background-size:100%,cover;background-repeat:no-repeat,repeat}.text_container{width:80%;min-height:150px;margin-top:70px;margin-right:auto;margin-left:auto}.button{margin:20px 20px 20px 0px;padding:16px 34px;border-radius:50px;background-color:#00285c}.text-block{margin-top:10px;font-size:16px}.text-block.italic{margin-top:28px;font-style:italic;font-weight:300}.body{font-family:Poppins,sans-serif;color:#00285c}.heading{margin-bottom:23px}.name{width:auto}a{text-decoration:none;color:#fff}</style> <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script> <script type="text/javascript">WebFont.load({google:{families:["Poppins:300,regular,italic,600"]}});</script> <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script> </head><body class="body"><div class="header"></div><div class="text_container"><h4 class="heading">Nuova Candidatura ricevuta!</h4><div class="text-block">Un nuovo Professionista ha inoltrato la sua candidatura. Effettua il login dal Pannello Amministratore per vedere ulteriori dettagli e scaricare il suo CV</div> <br> <br><a href="https://www.mobidoc.it/admin" class="button" style="margin-top:100px;">Pannello Amministratore</a></div></body></html>';

                        mail($to, $subject, $message, $headers);

                        echo "<script>window.location = 'application-sucessful.php'</script>";
                      }
                      mysqli_close($conn);
                    }else{

                      echo '<script type="text/javascript">alert("C\'è qualcosa di sbagliato")</script>';

                    }

                  }
                  else {
                    $error_text = 'Indirizzo email già registrato.';
                    $show_error = 1;

                  }

                }

              }
                if ($show_error == 1){
              ?>

               <div class="error_message file_not_available" style="display:block;">
                <div class="text-block-30"><?=$error_text?></div>
               </div>
                <?php }?>
               <div class="g-recaptcha brochure__form__captcha" data-sitekey="6LdyDJwaAAAAABFuvH-xSQDxaX0I16shCUMw8jCe" aria-required="true"></div>
               <br>
                <input type="submit" name="submit" value="Invia" id="submit_application" class="button gradient login_button proff w-button" >
                
              </form>
              
            </div>
          </div>
        </div>
        <div class="div-block-40">
          <!--<div class="text-block-40">Collegati al nostro gruppo Facebook <span class="bold bold">Mobidoc Professionisti</span> per rimanere aggiornato</div>-->
          <div class="text-block-29 proff">Per assistenza chiama il <span class="text-span-3 proff">335 77 988 44</span></div>
        </div>
      </div>
    </div>
  </div>
  
  <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.4.1.min.220afd743d.js" type="text/javascript" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script src="../js/webflow.js" type="text/javascript"></script>
  <!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
  <div id="fb-root"></div>
  <script async="" defer="" crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v4.0"></script>
  
  <style>
		.file_upload_input{
			display:none;
		}
		.upload_cv{
			overflow:hidden;
			cursor:pointer;
    }
    .error_message{
      margin-bottom:25px;
    }
    .error_show{
      display:block !important;
    }
  </style>
  <?php if($admin == 0) {?>
   <script>
     $(document).ready(function(){
       $('.upload_cv').click(function(){
         $('.file_upload_input').trigger("click");
         $('.file_upload_input').change(function() {
           var filename = $('.file_upload_input').val();
           var pos = filename.lastIndexOf("\\");
           filename = filename.substr(pos+1);
           if(filename != ''){
             $('.text-block-53').html(filename);
             $('.file_not_available').removeClass("error_show");
           } else {
             $('.text-block-53').html("Allega CV (PDF o documento Word)");
           }

         });
       });

       $('#submit_application').click(function(){

         var a = $('input[name=Name]').val();


         $('input[name=email], input[name=confirm-email]').keyup(function(){
           $('.email_dont_match').removeClass("error_show");
         });
         var eamil = $('input[name=email]').val();
         var confirm_eamil = $('input[name=confirm-email]').val();
         if(eamil==confirm_eamil){
           return true;
         } else {
           $('.email_dont_match').addClass("error_show");
         }

       });

       $('#submit_application').click(function(){
         if($('.file_upload_input').get(0).files.length === 0){
           $('.file_not_available').addClass("error_show");
         }else {
           return true;
         }
       });

     });
   </script>
<?php } ?>
  <script src="https://www.google.com/recaptcha/api.js"></script>
  <?php include ("../google_analytic.php")?>
</body>
</html>
