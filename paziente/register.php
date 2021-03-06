<!DOCTYPE html>
<?php

session_start();

?>
<!--  This site was created in Webflow. http://www.webflow.com  -->
<!--  Last Published: Fri Nov 01 2019 17:31:02 GMT+0000 (UTC)  -->
<html data-wf-page="5daa262de3e3f02a621af31b" data-wf-site="5d8cfd454ebd737ac1a48727">
<head>
    <meta charset="utf-8">
    <title>Paziente Register</title>
    <meta content="Paziente Register" property="og:title">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta content="Webflow" name="generator">
    <link href="../css/normalize.css" rel="stylesheet" type="text/css">
    <link href="../css/webflow.css" rel="stylesheet" type="text/css">
    <link href="../css/mobidoc.webflow.css" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script>
    <script type="text/javascript">WebFont.load({google: {families: ["Montserrat:100,100italic,200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic", "Poppins:100,100italic,200,300,300italic,regular,500,600,700,800,900", "PT Serif Caption:regular"]}});</script>
    <!-- [if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"
            type="text/javascript"></script><![endif] -->
    <script type="text/javascript">!function (o, c) {
            var n = c.documentElement, t = " w-mod-";
            n.className += t + "js", ("ontouchstart" in o || o.DocumentTouch && c instanceof DocumentTouch) && (n.className += t + "touch")
        }(window, document);</script>
    <link href="../images/favicon.png" rel="shortcut icon" type="image/x-icon">
    <link href="../images/webclip.png" rel="apple-touch-icon">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="https://kit.fontawesome.com/3f12b8b553.js" crossorigin="anonymous"></script>
    <style>
        ::-webkit-scrollbar {
            width: 0px;
            height: 0px;
        }

        .p {
            text-align-last: center !important;
        }

        .w-m {
            width: 100%;
            margin: 0;
            padding-left: 0px !important;
        }

        .tbl-radio {
            color: #00285c;
            width: 70%;
            margin: 0 auto 30px auto;
        }

        @media screen and (max-width: 767px) {

            .tbl-radio {
                color: #00285c;
                width: 100%;
                margin: 0 auto 30px auto;
                font-size: 12px;
            }

        }
    </style>

</head>
<body>
<?php include '../header.php'; ?>
<div class="masthead register">
    <div class="masthead_container register">
        <div class="div-block-31 diff diff">
            <a href="/" style="text-decoration:none; color:#fff;">
                <div><img src="/images/back_bc.svg">&nbsp;&nbsp; Indietro</div>
            </a><br>
            <h1 class="heading-9">Registrati</h1>
        </div>
        <div class="register_form_container">
            <div class="form-block-3 w-form">

                <div class="errors">
                    <?PHP
                    $show_error = 0;
                    include("../recapctha.php");
                    if (isset($_POST['submit']) && $_POST['Email-register'] == $_POST['confirm-email-register'] && $_POST['pwrd'] == $_POST['cnfirm_pwrd']) {

                        include '../connect.php';


                        $email = mysqli_real_escape_string($conn, $_POST['Email-register']);

                        $sql_1 = "select email from contact_profile where email ='" . $email . "'";
                        $sql1_result = mysqli_query($conn, $sql_1);
                        if (mysqli_num_rows($sql1_result) > 0) {
                            $show_error = 1;
                            $error_text = 'Email già registrata.';
                        } else {
                            $recaptcha = $_POST['g-recaptcha-response'];
                            $res = reCaptcha($recaptcha);
                            if (!$res['success']) {
                                $show_error = 1;
                                $error_text = 'Si prega di compilare recaptcha.';

                            } else {
                                $fname = mysqli_real_escape_string($conn, $_POST['First_Name']);
                                $lname = mysqli_real_escape_string($conn, $_POST['Last_Name']);
                                $full_name = $fname . ' ' . $lname;
                                $pwrds = mysqli_real_escape_string($conn, $_POST['pwrd']);
                                $phone = mysqli_real_escape_string($conn, $_POST['tele']);
                                //$profile_img = '../images/Group-556.jpg';
                                $pwrd = password_hash($pwrds, PASSWORD_DEFAULT);

                                $privacy_consent = 'N';
                                if ($_POST['checkbox'] == 'on') {
                                    $privacy_consent = 'Y';
                                }

                                $marketing_consent = 'N';
                                if (isset($_POST['marketing_consent']) && $_POST['marketing_consent'] == 'Y') {
                                    $marketing_consent = 'Y';
                                }


                                date_default_timezone_set("Europe/Rome");
                                $privacy_consent_date = date("Y/m/d H:i:s");

                                //$sql = "insert into paziente_profile (first_name, last_name, password, email, photo, dor) values('".ucwords($fname)."', '".ucwords($lname)."', '".$pwrd."', '".$email."', '".$profile_img."', '".$dor."')";
                                $sql = "insert into contact_profile (name, surname, password, email, phone, privacy_consent, lastDatePrivacyConsent,marketing_consent,lastDateMarketingConsent) values('" . ucwords($fname) . "', '" . ucwords($lname) . "', '" . $pwrd . "', '" . $email . "', '" . $phone . "', '" . $privacy_consent . "', '" . $privacy_consent_date . "', '" . $marketing_consent . "', '" . $privacy_consent_date . "')";

                                $result = mysqli_query($conn, $sql);
                                if ($result == 1) {

                                    $_SESSION['paziente_email'] = $_POST['Email-register'];

                                    $to = 'info@mobidoc.it';
                                    $subject = 'Nuova Candidatura';
                                    $from = 'mobidoc_update@mobidoc.it';
                                    $rply_email = 'noreplay@mobidoc.it';

                                    // To send HTML mail, the Content-type header must be set
                                    $headers = 'MIME-Version: 1.0' . "\r\n";
                                    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

                                    // Create email headers
                                    $headers .= 'From: ' . $from . "\r\n" . 'Reply-To: ' . $rply_email . "\r\n" . 'X-Mailer: PHP/' . phpversion();

                                    // Compose a simple HTML email message
                                    $message = '<!DOCTYPE html><html data-wf-page="5dcd852d5095d024f8ea51ae" data-wf-site="5dcd852d5095d04927ea51ad"><head><meta charset="utf-8"><meta content="width=device-width, initial-scale=1" name="viewport"><meta content="Webflow" name="generator"><style>.header{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;width:100%;height:180px;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;-webkit-box-align:center;-webkit-align-items:center;-ms-flex-align:center;align-items:center;background-image:url("https://www.mobidoc.it/images/mailer_header.png");background-position:50% 50%, 50% 0%;background-size:100%,cover;background-repeat:no-repeat,repeat}.text_container{width:80%;min-height:150px;margin-top:70px;margin-right:auto;margin-left:auto}.button{margin:20px 20px 20px 0px;padding:16px 34px;border-radius:50px;background-color:#00285c}.text-block{margin-top:10px;font-size:16px}.text-block.italic{margin-top:28px;font-style:italic;font-weight:300}.body{font-family:Poppins,sans-serif;color:#00285c}.heading{margin-bottom:23px}.name{width:auto}a{text-decoration:none;color:#fff}</style> <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script> <script type="text/javascript">WebFont.load({google:{families:["Poppins:300,regular,italic,600"]}});</script> <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script> </head><body class="body"><div class="header"></div><div class="text_container"><h4 class="heading">Nuova Registrazione Paziente</h4><div class="text-block">Congratulazioni, il Contatto ' . $full_name . ' si è appena registrato al portale mobidoc.</div></div></body></html>';


                                    mail($to, $subject, $message, $headers);

                                    echo "<script>window.location = 'account.php'</script>";
                                }

                            }
                        }
                        mysqli_close($conn);
                    }
                    if ($show_error == 1) {
                        $email_errors =  'style="display: block;"';
                        ?>

                        <div class="error email-errors" <?=$email_errors?>>
                            <div><?= $error_text; ?></div>
                        </div>
                    <?php } ?>

                    <div class="error password_dont_match">
                        <div>Le password non combaciano!</div>
                    </div>
                    <div class="error email_dont_match">
                        <div>Le email non combaciano!</div>
                    </div>
                </div>

                <form id="email-form" action="register.php" name="email-form" method="post">

                    <div class="dual_container">
                        <input type="text" class="text-field-3 name w-input" maxlength="256" name="First_Name"
                               data-name="First_Name" placeholder="Nome" id="First_Name-2" required="">
                        <input type="text" class="text-field-3 name w-input" maxlength="256" name="Last_Name"
                               data-name="Last_Name" placeholder="Cognome" id="Last_Name-2">
                    </div>
                    <input type="email" class="text-field-3 w-input" maxlength="256" name="Email-register"
                           data-name="Email-register" placeholder="Email" id="Email-register-5" required="">
                    <input type="email" class="text-field-3 w-input" maxlength="256" name="confirm-email-register"
                           data-name="Confirm-Email-register" placeholder="Conferma Email" id="confirm-email-register"
                           required="">
                    <div class="dual_container">
                        <input type="password" class="text-field-3 name w-input" maxlength="256" name="pwrd"
                               data-name="pwrd" placeholder="Password" id="pwrd" required="">
                        <input type="password" class="text-field-3 name w-input" maxlength="256" name="cnfirm_pwrd"
                               data-name="Email Register 3" placeholder="Conferma Password" required=""
                               id="confirm_pass">
                    </div>
                    <input type="tel" class="inputs w-input" maxlength="256" name="tele" data-name="tele"
                           placeholder="Telefono" id="tele" required="" style="margin-bottom: 30px">
                    <label class="w-checkbox checkbox-field custom">
                        <div class="w-checkbox-input w-checkbox-input--inputType-custom checkbox"></div>
                        <input type="checkbox" id="checkbox2" name="checkbox" data-name="Checkbox" required=""
                               style="opacity:0;position:absolute;z-index:-1">
                        <span class="checkbox-label w-form-label" style="margin-top: 15px;">
                <span class="legal_consent">
                    Ho letto e compreso l’<a href="/informativaprivacy.html" target="_blank">informativa privacy</a>.
                    <?php
                    /*
                    Dichiaro d'aver letto, chiaramente compreso e preso atto dell'<a href="/informativaprivacy.html" target="_blank">informativa</a>, nonché dei miei diritti in qualità di interessato al trattamento, d'aver riconosciuto le esigenze funzionali rappresentate e, premendo su "Sì" o "No", esprimo la mia volontà in merito al trattamento e alla comunicazione a terzi dei miei dati personali per finalità di gestione della prenotazione ed erogazione del servizio richiesto alla società Tekamed S.r.l..
Il consenso qui espresso potrà essere revocato con le medesime modalità.
                    */
                    ?>

                </span>
              </span>
                    </label>
                    <label class="w-checkbox checkbox-field custom" style="padding-left: 0px">
                        <span class="checkbox-label w-form-label w-m">
                <span class="legal_consent">
                    Consenso al Trattamento di Dati Personali: Letta e compresa l’informativa privacy, premendo su “Presto il consenso” o “Nego il consenso”, esprimo la mia volontà in merito al trattamento dei miei dati personali per finalità di marketing: invio di comunicazioni di carattere commerciale, informativo e promo-pubblicitario su prodotti, servizi ed attività di Tekamed S.r.l., con modalità automatizzate di contatto o comunicazioni elettroniche mediante l’utilizzo di posta elettronica e messaggi del tipo SMS, IM, MMS, notifiche push; compimento di indagini di mercato e rilevazione del gradimento e della soddisfazione sui servizi resi agli interessati. Comunicazioni informative, commerciali e pubblicitarie che acconsento a ricevere anche tramite posta cartacea o chiamate telefoniche. Questo consenso potrà essere revocato nello stesso modo.
		</span>
              </span>
                    </label>
                    <table class="tbl-radio" border="0" cellspacing="0" cellpadding="0">
                        <tbody>
                        <tr>
                            <td>
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tbody>
                                    <tr>
                                        <td>
                                            <input type="radio" id="yes" name="marketing_consent" value="Y">
                                        </td>
                                        <td><label for="yes">Presto il consenso</label></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </td>
                            <td>
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tbody>
                                    <tr>
                                        <td>
                                            <input type="radio" id="no" name="marketing_consent" value="N">
                                        </td>
                                        <td><label for="no">Nego il consenso</label></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        </tbody>
                    </table>

                    <div class="g-recaptcha brochure__form__captcha"
                         data-sitekey="6LdyDJwaAAAAABFuvH-xSQDxaX0I16shCUMw8jCe" aria-required="true"></div>
                    <br>
                    <input type="submit" name="submit" value="Invia" id="submit_profile"
                           class="button gradient login_button register w-button submit_profile_btn"
                           style="margin-bottom:30px;">

                </form>

            </div>
            <div class="text-block-29">Per assistenza chiama il <span class="text-span-3">335 77 988 44</span></div>
        </div>
    </div>
</div>
<script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.4.1.min.220afd743d.js" type="text/javascript"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="../js/webflow.js" type="text/javascript"></script>
<!-- [if lte IE 9]>
<script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
<div id="fb-root"></div>
<script async="" defer="" crossorigin="anonymous"
        src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v4.0"></script>
<style>
    .password_dont_match, .email_dont_match {
        display: none;
    }

    .error_show {
        display: block;
    }
</style>
<script>
    $('.submit_profile_btn').click(function () {
        $('input[name=pwrd], input[name=cnfirm_pwrd]').keyup(function () {
            $('.password_dont_match').removeClass("error_show");
        });

        var password = $('input[name=pwrd]').val();
        var confirm_password = $('input[name=cnfirm_pwrd]').val();
        if (password == confirm_password) {

        } else {
            $('.password_dont_match').addClass("error_show");
            window.scrollTo(0, 0);
            return false;

        }

    });
    $( "form #email").focus(function() {
       $(".email-errors").css("display", "none");
    });
    $( "form #pwrd, form #confirm_pass").focus(function() {
        $('.password_dont_match').removeClass("error_show");
    });
</script>
<script src="https://www.google.com/recaptcha/api.js"></script>
<?php include("../google_analytic.php") ?>

</body>
</html>
