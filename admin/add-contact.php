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
    <title>Add Contact</title>
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
        <h1 class="admin_section_heading">Add Contact</h1>
        <a href="logout.php" class="admin_logout"></a></div>
    <div class="section_content mt-240">
        <div class="applications">
            <div class="doctors_block">
                <section class="section-19">
                    <div class="custom_container update_form">
                        <div class="update_form_main_container">
                            <div class="update_form_block w-form">

                                <?php
                                $show_error = 0;
                                if(isset($_POST['submit']))
                                {

                                    include '../connect.php';

                                    $email = mysqli_real_escape_string($conn, $_POST['Email-register']);

                                $sql_1 = "select email from contact_profile where email ='".$email."'";
                                $sql1_result = mysqli_query($conn, $sql_1);
                                if (mysqli_num_rows($sql1_result) > 0) {
                                    $show_error = 1;
                                }else{

                                    $fname = mysqli_real_escape_string($conn, $_POST['First_Name']);
                                    $lname = mysqli_real_escape_string($conn, $_POST['Last_Name']);
                                    $full_name = $fname.' '.$lname;
                                    $phone = mysqli_real_escape_string($conn, $_POST['tele']);

                                    function token($len, $set = "") {
                                        $gen = "";
                                        for($i=0;$i<$len;$i++) {
                                            $set = str_shuffle($set);
                                            $gen .= $set[0];
                                        }
                                        return $gen;
                                    }

                                    $passwd = strtolower($fname).token(3,'0123456789');

                                    $pwrd = password_hash($passwd, PASSWORD_DEFAULT);


                                    $privacy_consent = 'N';
                                    if ($_POST['checkbox'] == 'on'){
                                        $privacy_consent = 'Y';
                                    }

                                    $marketing_consent = 'N';
                                    if (isset($_POST['checkbox-3']) && $_POST['checkbox-3'] == 'on'){
                                        $marketing_consent = 'Y';
                                    }


                                    date_default_timezone_set("Europe/Rome");
                                    $privacy_consent_date = date("Y/m/d H:i:s");

                                    $sql = "insert into contact_profile (name, surname, password, email, phone, privacy_consent, lastDatePrivacyConsent,marketing_consent,lastDateMarketingConsent) values('".ucwords($fname)."', '".ucwords($lname)."', '".$pwrd."', '".$email."', '".$phone."', '".$privacy_consent."', '".$privacy_consent_date."', '".$marketing_consent."', '".$privacy_consent_date."')";

                                    $result = mysqli_query($conn, $sql);
                                    if($result==1)
                                    {

                                        //email to contact
                                        $to3 = $email; //contact email
                                        $subject3 = 'Mobidoc Prestazione Prenotata';
                                        $from3 = 'mobidoc_update@mobidoc.it';

                                        // To send HTML mail, the Content-type header must be set
                                        $headers3  = 'MIME-Version: 1.0' . "\r\n";
                                        $headers3 .= 'Content-Type: text/html; charset=utf-8' . "\r\n";

                                        // Create email headers
                                        $headers3 .= 'From: '.$from3."\r\n". 'Reply-To: '.$rply_email."\r\n" .   'X-Mailer: PHP/' . phpversion();


                                        $message3 = '<!DOCTYPE html><html data-wf-page="5dcd852d5095d024f8ea51ae" data-wf-site="5dcd852d5095d04927ea51ad"><head><meta charset="utf-8"><meta content="width=device-width, initial-scale=1" name="viewport"><meta content="Webflow" name="generator"><style>.header{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;width:100%;height:180px;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;-webkit-box-align:center;-webkit-align-items:center;-ms-flex-align:center;align-items:center;background-image:url("https://www.mobidoc.it/images/mailer_header_paziente.jpg");background-position:50% 50%, 50% 0%;background-size:100%,cover;background-repeat:no-repeat,repeat}.text_container{width:80%;min-height:150px;margin-top:70px;margin-right:auto;margin-left:auto}.button{margin:20px 20px 20px 0px;padding:16px 34px;border-radius:50px;background-color:#00285c}.text-block{margin-top:10px;font-size:16px}.text-block.italic{margin-top:28px;font-style:italic;font-weight:300}.body{font-family:Poppins,sans-serif;color:#00285c}.heading{margin-bottom:23px}.name{width:auto}a{text-decoration:none;color:#fff}</style> <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script> <script type="text/javascript">WebFont.load({google:{families:["Poppins:300,regular,italic,600"]}});</script> <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script> </head><body class="body"><div class="header"></div><div class="text_container"><h4 class="heading">Grazie per aver scelto Mobidoc!</h4><div class="text-block">Questa è la tua password generata dall amministratore <strong>'.$passwd.'</strong> contro la tua email <strong>'.$email.'</strong>. <br><br>';
                                        $message3 .= "<a target='_blank' style='color: blue; text-decoration: underline' href='https://mobidoc.it/informativaprivacy.html'>Clicca qui</a> per leggere la nostra informativa sulla privacy.<br> <br>
 Questa email è stata generata da un sistema automatico, si prega di non rispondere.<br><br> Cordiali Saluti,<br> La Direzione Mobidoc</div> <br></div></body></html>";

                                        mail($to3, $subject3, $message3, $headers3);

                                        echo "<script>window.location = '/admin/contacts.php'</script>";
                                    }
                                }

                                    mysqli_close($conn);
                                }
                                if ($show_error == 1){

                                ?>

                                    <div class="error" style="display:block;">
                                        <div>Email già registrata.</div>
                                    </div>
                                <?php }?>

                                <form id="email-form" action="add-contact.php" name="email-form" method="post">

                                    <div class="dual_container">
                                        <input type="text" class="text-field-3 name w-input" maxlength="256" name="First_Name" data-name="First_Name" placeholder="Nome" id="First_Name-2" required="">
                                        <input type="text" class="text-field-3 name w-input" maxlength="256" name="Last_Name" data-name="Last_Name" placeholder="Cognome" id="Last_Name-2">
                                    </div>

                                    <div class="dual_container">
                                        <input type="email" class="text-field-3 w-input" maxlength="256" name="Email-register" data-name="Email-register" placeholder="Email" id="Email-register-5" required="">
                                        <input type="tel" class="inputs w-input" maxlength="256" name="tele" data-name="tele" placeholder="Telefono" id="tele" required="" style="margin-bottom: 30px">
                                    </div>

                                    <label class="w-checkbox checkbox-field custom">
                                        <div class="w-checkbox-input w-checkbox-input--inputType-custom checkbox"></div>
                                        <input type="checkbox" id="checkbox2" name="checkbox" data-name="Checkbox" required="" style="opacity:0;position:absolute;z-index:-1">
                                        <span class="checkbox-label w-form-label" style="margin-top: 15px;">
                <span class="legal_consent">
                    Ho letto e compreso l’<a href="/informativaprivacy.html" target="_blank">informativa privacy</a>.

                </span>
              </span>
                                    </label>
                                    <label class="w-checkbox checkbox-field custom">
                                        <div class="w-checkbox-input w-checkbox-input--inputType-custom checkbox"></div>
                                        <input type="checkbox" id="checkbox-3" name="checkbox-3" data-name="Checkbox 3" style="opacity:0;position:absolute;z-index:-1">
                                        <span class="checkbox-label w-form-label">
                <span class="legal_consent">
                    Consenso al Trattamento di Dati Personali: Letta e compresa l’informativa privacy, premendo su “Presto il consenso” o “Nego il consenso”, esprimo la mia volontà in merito al trattamento dei miei dati personali per finalità di marketing: invio di comunicazioni di carattere commerciale, informativo e promo-pubblicitario su prodotti, servizi ed attività di Tekamed S.r.l., con modalità automatizzate di contatto o comunicazioni elettroniche mediante l’utilizzo di posta elettronica e messaggi del tipo SMS, IM, MMS, notifiche push; compimento di indagini di mercato e rilevazione del gradimento e della soddisfazione sui servizi resi agli interessati. Comunicazioni informative, commerciali e pubblicitarie che acconsento a ricevere anche tramite posta cartacea o chiamate telefoniche. Questo consenso potrà essere revocato nello stesso modo.
		</span>
              </span>
                                    </label>
                                    <div class="g-recaptcha brochure__form__captcha" data-sitekey="6LdyDJwaAAAAABFuvH-xSQDxaX0I16shCUMw8jCe" aria-required="true"></div>
                                    <br>
                                    <input type="submit" name="submit" value="Invia" id="submit_profile" class="button gradient login_button register w-button submit_profile_btn" style="margin-bottom:30px;">

                                </form>

                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>

<script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.4.1.min.220afd743d.js" type="text/javascript"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="../js/admin/webflow.js" type="text/javascript"></script>
<!-- [if lte IE 9]>
<script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
<div id="fb-root"></div>
<script async="" defer="" crossorigin="anonymous"
        src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v4.0"></script>
</body>
</html>