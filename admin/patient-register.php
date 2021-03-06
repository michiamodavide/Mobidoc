<?php
session_start();

if (!isset($_SESSION['adminlogin'])) {
    header("Location: login.php");
}
include '../connect.php';
?>
<!DOCTYPE html>
<html data-wf-page="5dfbca93dac992df80dd982b" data-wf-site="5d8cfd454ebd737ac1a48727">
<head>
    <meta charset="utf-8">
    <title>Prenotazione Telefonica</title>
    <meta content="admin" property="og:title">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta content="Webflow" name="generator">
    <link href="../css/admin/normalize.css" rel="stylesheet" type="text/css">
    <link href="../css/admin/webflow.css" rel="stylesheet" type="text/css">
    <link href="../css/admin/mobidoc.webflow.css?v=1" rel="stylesheet" type="text/css">
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
    <script src="https://kit.fontawesome.com/3f12b8b553.js" crossorigin="anonymous"></script>
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
    <link href="/paziente/dist/css/datepicker.css" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <link href="../dist/css/selectize.default.css?v=1" rel="stylesheet"/>
    <script src="../dist/js/standalone/selectize.min.js"></script>
    <script src="https://kit.fontawesome.com/3f12b8b553.js" crossorigin="anonymous"></script>
    <style>
        .error_message {
            transform: none !important;
        }

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
                width: 76%;
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

            .section_content {
                padding-bottom: 5px;
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

            .button.gradient.submit {
                padding-right: 22px;
                padding-left: 22px;
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

            .button.gradient {
                padding: 11px 17px;
            }

            .button.gradient.submit {
                padding-right: 18px;
                padding-left: 18px;
                font-size: 11px;
            }
        }
    </style>
    <script type="text/javascript"
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA9O3bcxgKNkrvPOc2kdGKsLF9FnTfh7Go&sensor=false&libraries=places"></script>
    <?php

    $fisc_code = '';
    $email = '';
    $call_fname = '';
    $call_lname = '';
    $phone = '';
    $fname = '';
    $lname = '';
    $admin_note = '';
    $dobb = '';
    $address = '';
    $opoint_time = '';
    $payment_mode = '';
    $refer_id = '';
    $gmap_addr = '';
    $lat_log = '';
    $selected_exc = '';
    $medical_speciality = '';

    $icp_param = '';
    $refer_idss = '';
    $total_discount = '';
    $apt_datetime = '';
    $article_idd = '';


    if (isset($_GET['icp'])) {
        $icp_param = $_GET['icp'];
        $sql_get_query = "select * from temprary_patient where patient_id ='" . $_GET['icp'] . "'";
        $sql_get_tmp = mysqli_query($conn, $sql_get_query);
        $sql_get_tmp_data = mysqli_fetch_array($sql_get_tmp);

        $patient_id = $sql_get_tmp_data['patient_id'];
        $fisc_code = $sql_get_tmp_data['fiscale'];
        $email = $sql_get_tmp_data['email'];
        $caller_name_string = explode(" ", $sql_get_tmp_data['caller_name']);
        $call_fname = $caller_name_string[0];
        $call_lname = $caller_name_string[1];
        $phone = $sql_get_tmp_data['phone'];
        $fname = $sql_get_tmp_data['first_name'];
        $lname = $sql_get_tmp_data['last_name'];
        $admin_note = $sql_get_tmp_data['admin_note'];
        $medical_speciality = trim($sql_get_tmp_data['mds_id']);
        $dobb = date("Y-m-d", strtotime($sql_get_tmp_data['dob']));

        $address = $sql_get_tmp_data['address'];
        $article_idd = $sql_get_tmp_data['visit_name'];

        if (!empty($total_discount)){
            $total_discount = $sql_get_tmp_data['total_discount'];
        }


        $apt_datetime = $sql_get_tmp_data['appoint_time'];

        $payment_mode = $sql_get_tmp_data['payment_mode'];
        $refer_id = json_decode($sql_get_tmp_data['refertatore_id']);
        $refer_idss = $sql_get_tmp_data['refertatore_id'];
        $gmap_addr = $sql_get_tmp_data['gmap_address'];
        $lat_log = $sql_get_tmp_data['lat_log'];
        $selected_exc = $sql_get_tmp_data['excutor_ids'];


        /*get refer email*/
        $sql44 = "select * from doctor_profile where doctor_id ='" . $refer_id[0] . "'";
        $result44 = mysqli_query($conn, $sql44);
        $rows44 = mysqli_fetch_array($result44);
        $doctor_main_name = $rows44['fname'] . ' ' . $rows44['lname'];
        $doctor_id = $rows44['doctor_id'];
    }

    ?>
    <style>
        .patient_names_background {
            background-color: #fff;
            padding: 10px;
            border-radius: 0 0 5px 5px;
            width: 48.5%;
        }

        .patient_names ol {
            padding-left: 18px;
        }

        .patient_names ol li {
            line-height: 36px;
            list-style: none;
        }

        .patient_names ol li span {
            margin-right: 20px;
            width: 60px;
        }
		.m-t-minus{
			margin-top:-34px !important;
		}

        .plus {
             background-color: #00285c;
            display: block;
            height: 34px;
            width: auto;
            margin: 0 auto;
			color: #fff;
			border-radius: 30px;
			float: left;
			margin-top: -30px;
            padding-left: 11px;
            padding-right: 13px;
        }
		.plus i
		{
			margin-right:5px;
		}
        .minus {
             background-color: #f8dbdb;
            display: block;
            height: 34px;
            width: auto;
            margin: 0 auto;
			color: #000;
			border-radius: 30px;
			margin-top: 40px;
            padding-left: 11px;
            padding-right: 13px;
				
        }.minus i
		{
			margin-right:5px;}
		.dynamic_div{
		padding: 30px 0 0px 0;
			}

        .m-b-input {
            margin-bottom: 0px;
        }

        .input-style {

            width: 100%;

        }

        .input-style2 {
            background-color: #d1faff;
            width: 100%;
            padding: 20px;
            border: none;

            border-radius: 7px;
        }

        .input-style select {
            background-color: #d1faff;
            width: 100%;
            padding: 20px;
            border: none;

            border-radius: 7px;
        }

        .m-l {
            margin-left: 10px;
        }

        .m-r {
            margin-right: 8px;
        }
		.date-input{
			height: 67px;
			
		}
		/*.m-b-25{*/
				/*margin-bottom: 0px !important;*/
			/*}*/
		.style-date{
			margin: 10px 0 0 10px; padding-top: 10px; display: block;width: 100%;
		}
        @media only screen and (max-width: 767px) {
			.m-b-25{
				margin-bottom: 25px !important;
			}
			.plus {
           margin-bottom: 10px;
			margin-top: 0px;
        }
			.minus {
  
    margin-left: 120px;
}
			
			
			.date-input {
    height: 50px;
}
			.style-date{
			margin: 10px 0 0 0px;
		}
            .patient_names {

                padding: 5px;

                width: 100%;
            }

            .patient_names ol {
                padding-left: 5px;
            }


            .patient_names ol li {
                line-height: 20px;
                list-style: none;
                font-size: 9px;
            }

            .patient_names ol li span {
                margin-right: 0px;
                margin-right: 0px;
                width: 60px;
            }

            .m-b-input {
                margin-bottom: 0px;
            }

            .input-style {
                margin-bottom: 10px;
            }
        }
    </style>


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
<div class="admin_main_section" data-id="1">
    <div data-w-id="671d7027-6f87-1c3f-c474-3b17f4b83b06" class="admin_section_header">
        <h1 class="admin_section_heading">Prenotazione Telefonica</h1>
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
    <div class="section_content mt-240">
        <div class="applications">
            <div class="doctors_block">
                <div class="custom_container update_form">
                    <div class="update_form_main_container">
                        <div class="update_form_block w-form">
                            <form id="email-form" name="email-form" class="update_form" action="patient_reg.php"
                                  method="post" enctype="multipart/form-data">
                                <?php if (isset($_GET['icp'])) { ?>
                                    <input type="hidden" value="<?php echo $patient_id ?>" name="patient_temp_id">
                                <?php } ?>
                                <div>
                                    <div class="form_section">
                                        <?php
                                        if (isset($_GET['err']) && ($_GET['err'] == '1')) {
                                            ?>
                                            <div class="error" style="display: block">
                                                <div>Email già registrata.</div>
                                            </div>
                                        <?php } ?>
                                        <div class="form_section_heading">Controllo Anagrafica Paziente</div>
                                        <input type="text" class="inputs w-input m-b-input" autocomplete="off" maxlength="256"
                                               name="last_name" data-name="last_name" placeholder="Cognome *"
                                               value="<?php echo $lname ?>" id="last_name">
                                        <div class="patient_names">
                                            <ol>
                                            </ol>
                                        </div>
                                        <br>
                                        <div class="dual_container diff">
                                            <input type="text" class="inputs w-input" maxlength="256" name="first_name"
                                                   data-name="first_name" placeholder="Nome *"
                                                   value="<?php echo $fname ?>" id="first_name">
                                            <input type="text" class="inputs w-input" maxlength="256" name="fiscal_code"
                                                   data-name="fiscal_code" placeholder="Codice Fiscale *"
                                                   id="fiscal_code" value="<?php echo $fisc_code ?>" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="form_section">
                                        <div class="form_section_heading">Informazioni Contatto</div>
                                        <div class="dual_container diff">
                                            <input type="text" class="inputs w-input" maxlength="256"
                                                   name="call_first_name" data-name="first_name" placeholder="Nome *"
                                                   value="<?php echo $call_fname ?>" id="caller_first_name">
                                            <input type="text" class="inputs w-input" maxlength="256"
                                                   name="call_last_name" data-name="last_name" placeholder="Cognome *"
                                                   value="<?php echo $call_lname ?>" id="caller_last_name">
                                        </div>
                                        <div class="dual_container diff">
                                            <input type="email" class="inputs w-input" maxlength="256" name="email"
                                                   data-name="email" placeholder="Email *" value="<?php echo $email ?>"
                                                   id="email">
                                            <input type="tel" class="inputs w-input" maxlength="256" name="tele"
                                                   data-name="tele" placeholder="Telefono *"
                                                   value="<?php echo $phone ?>" id="tele">
                                        </div>
                                        <style>
                                            .show_contact_msg {
                                                margin-top: -20px;
                                                margin-bottom: -10px;
                                                color: green;
                                                display: none
                                            }
                                        </style>
                                        <p class="show_contact_msg">Contatto già registrato.</p>
                                    </div>
                                    <div class="form_section">
                                        <div class="form_section_heading">Informazioni Paziente</div>
                                        <input type="text" class="datepicker-here inputs w-input date_of_birth"
                                               data-language="it" data-date-format="dd-mm-yyyy" maxlength="256"
                                               autocomplete="off" name="dob" placeholder="Data di Nascita *" id="dob"
                                               style="margin-bottom: 25px">
                                        <input style="margin-bottom: 15px" type="text" class="inputs w-input"
                                               maxlength="256" name="address" placeholder="Indirizzo Completo *"
                                               autocomplete="off" id="address_search" value="<?php echo $address ?>">
                                        <input type="hidden" class="inputs w-input gmap_adress"
                                               value="<?php echo $gmap_addr ?>" maxlength="256" name="gmap_addr"
                                               placeholder="Indirizzo Completo *">
                                        <input type="hidden" class="inputs w-input lat_log"
                                               value="<?php echo $lat_log ?>" maxlength="256" name="lat_log"
                                               placeholder="Indirizzo Completo *">
                                        <div class="map" id="map"
                                             style="width: 100%; height: 300px;margin: 0% auto 33px;"></div>
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
                                                  class="text_area_profile personal_description w-input"><?php echo $admin_note ?></textarea>
                                    </div>
                                    <div class="form_section">
                                        <div class="form_section_heading">Prenotazione Prestazione</div>

                                        <div class="duo_flex">
                                            <div class="choose_your_area select4">
                                                <div class="search_cap_input sci2">
                                                    <div class="input_element" style="background:#d3fbff;"><img
                                                                src="../images/search.svg" width="28" alt="">
                                                        <select id="get-medical-speciality"
                                                                placeholder="Seleziona Specialità Medica della Prestazione *"
                                                                name="mds_name" onchange="getVisits()">

                                                            <option value="">Seleziona Specialità Medica della Prestazione</option>
                                                            <?php
                                                            include '../connect.php';
                                                            $mds_sql = "SELECT DISTINCT ms.ERid, ms.name 
FROM  doctor_profile dp
JOIN doctor_register as dg ON dg.id = dp.doctor_id 
JOIN doctor_specialty as ds ON ds.doctor_id = dg.id 
JOIN medical_specialty as ms ON ms.ERid = ds.specialty 
where dg.tick='1' AND dp.puo_refertare='N' AND dp.active='Y' AND ms.status='Y' group by ds.specialty";
                                                            $mds_result = mysqli_query($conn, $mds_sql);
                                                            while ($mds_rows = mysqli_fetch_array($mds_result)) {
                                                                $medical_erd = $mds_rows['ERid'];
                                                                $medical_name = $mds_rows['name'];
                                                                if (!empty($medical_speciality) && $medical_speciality == $medical_erd){
                                                                ?>
                                                                <option value="<?PHP echo $medical_erd; ?>" selected><?PHP echo $medical_name; ?></option>
                                                                 <?php }else{?>
                                                                <option value="<?PHP echo $medical_erd; ?>"><?PHP echo $medical_name; ?></option>
                                                            <?php }}
                                                            mysqli_close($conn); ?>
                                                        </select>
                                                        <script>
                                                            $('#get-medical-speciality').selectize();
                                                        </script>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="new_visit_no1">
                                            <div class="duo_flex">
                                                <div class="choose_your_area select1" id="select1">
                                                    <div class="search_cap_input sci2">
                                                        <div class="input_element" style="background:#d3fbff;"><img
                                                                    src="../images/search.svg" width="28" alt="">
                                                            <select id="select-visit" class="select-visit-new" placeholder="Seleziona Prestazione *" name="vist_name[]">
                                                                <option value="">Seleziona Prestazione</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="choose_your_area select2" id="select2"
                                                     style="margin: 10px;">
                                                    <div class="search_cap_input sci2">
                                                        <div class="input_element" style="background:#d3fbff;"><img
                                                                    src="../images/search.svg" width="28" alt="">
                                                            <select id="select-doctor"
                                                                    placeholder="Seleziona Esecutore *"
                                                                    class="select-doctor-new" multiple name="doc_id[]">
                                                                <option value="">Seleziona Esecutore</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="duo_flex">
                                                <div class="choose_your_area select3">
                                                    <div class="search_cap_input sci2">
                                                        <div class="input_element" style="background:#d3fbff;"><img
                                                                    src="../images/search.svg" width="28" alt="">
                                                            <select id="select-refertatore"
                                                                    class="select-refertatore-new"
                                                                    placeholder="Seleziona Refertatore"
                                                                    name="refertatore_id[]">
                                                                <?php
                                                                if (!empty($refer_id)) {
                                                                    ?>
                                                                    <option value="<?php echo $doctor_id ?>"
                                                                            selected><?php echo $doctor_main_name ?></option>
                                                                <?php } else {
                                                                    ?>
                                                                    <option value="">Seleziona Refertatore</option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
												<div class="style-date">
												 <input type="text"
                                                           class="datepicker-here inputs w-input appoint_time date-input dual_container diff m-b-25"
                                                           data-language="it" data-date-format="dd-mm-yyyy"
                                                           maxlength="256" autocomplete="off" name="appoint_time"
                                                           placeholder="Data e Ora" id="appoint_time">
												
                                               </div>
                                            </div>

                                        </div>



                                        <div id="new_visit"></div>


                                        <div class="input-group-btn">
                                            <button class="btn btn-success plus" style="display: none" type="button" onclick="addNewVisit();"><i class="fa fa-plus"></i> Aggiungi</button>
                                        </div>
                                    </div>
									<div style="clear: both;"></div>
							
                                    <div class="form_section">
                                        <div class="form_section_heading">Indennità Km</div>
                                        <div class="dual_container diff">
                                            <input type="number" id="km_price" class="inputs w-input" min="1" autocomplete="off"
                                                   name="km_price" placeholder="Km Extra">
                                            <h4 class="km_total_price"></h4>
                                        </div>
                                    </div>
                                    <div class="form_section">
                                        <div class="form_section_heading">Metodo di Pagamento</div>
                                        <div class="duo_flex">
                                            <div class="choose_your_area cash_method_select">
                                                <div class="search_cap_input sci2">
                                                    <div class="input_element" style="background:#d3fbff;"><img
                                                                src="../images/search.svg" width="28" alt="">
                                                        <select id="cash-option" placeholder="Metodo di Pagamento"
                                                                name="payment_mode">
                                                            <?php
                                                            if (!empty($payment_mode)) {
                                                                ?>
                                                                <option value="<?php echo $payment_mode ?>"
                                                                        selected><?php echo $payment_mode ?></option>
                                                            <?php } ?>
                                                            <option value="Contanti">Contanti</option>
                                                            <option value="Bancomat">Bancomat</option>
                                                            <option value="Bonifico Bancario">Bonifico Bancario</option>
                                                            <option value="Carta di Credito">Carta di Credito</option>
                                                        </select>
                                                        <script>
                                                            $('#cash-option').selectize();
                                                        </script>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="text" name="privacy_check" id="privacy_check" checked value="Y"
                                           style="display:none;">
                                    <script>
                                        jQuery(document).ready(function () {
                                            jQuery('#checkbox').change(function () {
                                                if ($(this).prop('checked')) {
                                                    $('#privacy_check').val('Y');
                                                } else {
                                                    $('#privacy_check').val('N');
                                                }
                                            });
                                        });
                                    </script>
                                    <div class="form_section">
                                        <div class="form_section_heading">Consenso privacy</div>
                                        <label class="w-checkbox checkbox-field-2">
                                            <div class="w-checkbox-input w-checkbox-input--inputType-custom checkbox w--redirected-checked"></div>
                                            <input type="checkbox" id="checkbox" name="checkbox" checked value="Y"
                                                   data-name="Checkbox" style="opacity:0;position:absolute;z-index:-1">
                                            <span class="checkbox-label-2 w-form-label">Esprimo il consenso in merito al trattamento e alla comunicazione a terzi dei miei dati personali per finalità di marketing</span>
                                        </label>
                                    </div>
                                    <div class="error_container">
                                        <div class="error_message fiscale error_fiscal_code"
                                             onClick="window.location='#fiscal_code';">
                                            <div class="text-block-30">Il codice fiscale non è valido.</div>
                                        </div>
                                        <div class="error_message call_fname_length error_caller_first_name"
                                             onClick="window.location='#caller_first_name';">
                                            <div class="text-block-30">Il nome del chiamante deve contenere un massimo
                                                di 2 caratteri.
                                            </div>
                                        </div>
                                        <div class="error_message caller_last_length error_caller_last_name"
                                             onClick="window.location='#caller_last_name';">
                                            <div class="text-block-30">Il cognome del chiamante deve contenere un
                                                massimo di 2 caratteri.
                                            </div>
                                        </div>
                                        <div class="error_message email_dont_match error_email"
                                             onClick="window.location='#email';">
                                            <div class="text-block-30">Email non valida.</div>
                                        </div>
                                        <div class="error_message tele_length error_tele"
                                             onClick="window.location='#tele';">
                                            <div class="text-block-30">Aggiungi un numero di telefono valido.</div>
                                        </div>
                                        <div class="error_message first_name_length error_first_name"
                                             onClick="window.location='#first_name';">
                                            <div class="text-block-30">Il nome del paziente deve contenere un massimo di
                                                2 caratteri.
                                            </div>
                                        </div>
                                        <div class="error_message last_name_length error_last_name"
                                             onClick="window.location='#last_name';">
                                            <div class="text-block-30">Il cognome del paziente deve contenere un massimo
                                                di 2 caratteri.
                                            </div>
                                        </div>
                                        <div class="error_message age error_dob" onClick="window.location='#dob';">
                                            <div class="text-block-30">Si prega di aggiungere la data di nascita.</div>
                                        </div>
                                        <div class="error_message address_search_length error_address_search"
                                             onClick="window.location='#address_search';">
                                            <div class="text-block-30">Si prega di aggiungere l'indirizzo.</div>
                                        </div>
                                        <div class="error_message personal_description_length error_personal_description"
                                             onClick="window.location='#personal_description';">
                                            <div class="text-block-30">Inserisci almeno 15 caratteri per il campo della
                                                nota amministratore.
                                            </div>
                                        </div>
                                        <div class="error_message select-visi_length error_select-visit-selectized"
                                             onClick="window.location='#select1';">
                                            <div class="text-block-30">Seleziona Visita.</div>
                                        </div>
                                        <div class="error_message select-doctor_length error_select-doctor-selectized"
                                             onClick="window.location='#select-doctor';">
                                            <div class="text-block-30">Seleziona Executor.</div>
                                        </div>
                                    </div>
                                    <div class="submit_form_btn">
                                        <input type="submit" name="save_data" style="color:#fff !important;"
                                               value="Salva" class="button gradient w-button">
                                        <input type="submit" name="submit" style="color:#fff !important;"
                                               value="Conferma e Invia" id="submit"
                                               class="button gradient submit w-button">
                                    </div>
                                </div>
                                <div class="div-block-34">
                                    <div class="div-block-35"></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
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

    .choose_your_area.select2, .choose_your_area.select3, .choose_your_area.select1 {
        pointer-events: none;
        opacity: 0.6;
    }
</style>
<script src="/paziente/date_pic.js?v=4"></script>
<script src="/paziente/dist/js/i18n/datepicker.en.js?v=4"></script>
<script type="application/javascript">

    var icp_param = '<?php echo $icp_param?>';


    var select1 = $('.new_visit_no1 #select-doctor').selectize();
    var doc_select1 = select1[0].selectize;
    // fetch the instance for reporter
    var select_ref1 = $('.new_visit_no1 #select-refertatore').selectize();
    var ref_select1 = select_ref1[0].selectize;
    // fetch the instance for visits
    var select_visit1 = $('.new_visit_no1 #select-visit').selectize();
    var visit_select1 = select_visit1[0].selectize;


    var room = 1;

    function getVisits() {
        var get_medical_speciality = $("#get-medical-speciality option").val();

        var items_new = doc_select1.items.slice(0);
        for (var i in items_new) {
            doc_select1.removeItem(items_new[i]);
        }

        doc_select1.clearOptions();
        ref_select1.clear();
        ref_select1.clearOptions();
        visit_select1.clear();
        visit_select1.clearOptions();

        $(".new_visit_no1 .choose_your_area.select1").attr("style", "pointer-events: none; opacity: 0.6;");
        $.ajax({
            url: "get_visit_doc.php",
            type: "post",
            data: {data:get_medical_speciality, get_vist:1},
            dataType: "json",
            success: function (response) {
                $.each(response, function(index) {
                    $(".new_visit_no1 .choose_your_area.select1").attr("style", "pointer-events: inherit; opacity: inherit; margin: 10px;");
                    var visit_att = '';
                    if (response[index].attribute){
                        var visit_att = ' ('+response[index].attribute+')';
                    }
                    visit_select1.addOption({value: response[index].article_id, text: response[index].description+visit_att});
                });

                doc_select1.refreshOptions();
                ref_select1.refreshOptions();
                visit_select1.refreshOptions();

                var ij;
                for (ij = 2; ij <= room; ij++) {
                    $('.new_visit_no'+ij).remove();
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
        });

        // $(".new_visit_no1 .appoint_time").val('');
    }



    $(document).on("change",'.new_visit_no1 .select-visit-new', function(event) {
            event.preventDefault();
        getVisitDoc();
    });
    function getVisitDoc() {
        var visit_type_single = $(".new_visit_no1 #select-visit option").val();
        var get_mds_id = $("#get-medical-speciality option").val();

        var items_new = doc_select1.items.slice(0);
        for (var i in items_new) {
            doc_select1.removeItem(items_new[i]);
        }
        doc_select1.clearOptions();
        ref_select1.clear();
        ref_select1.clearOptions();
        // $(".choose_your_area.select2 .selectize-control.multi .selectize-input div, .choose_your_area.select2 .select-doctor-new option").remove();
        $(".new_visit_no1 .choose_your_area.select3").attr("style", "pointer-events: none; opacity: 0.6;");
        $.ajax({
            url: "get_visit_doc.php",
            type: "post",
            data: {data:visit_type_single, mds_erid:get_mds_id, get_vist:0},
            dataType: "json",
            success: function (response) {
                $.each(response, function(index) {
                    var puo_refertare = response[index].puo_refertare;
                    var prof_visible = response[index].visible;
                    if (puo_refertare == 'N' || puo_refertare == 'Y' && prof_visible == 'Y') {
                        $(".new_visit_no1 .appoint_time").attr("style", "pointer-events: inherit; opacity: inherit");
                        $(".new_visit_no1 .choose_your_area.select2").attr("style", "pointer-events: inherit; opacity: inherit; margin: 10px;");
                        doc_select1.addOption({value: response[index].doctor_id, text: response[index].fname+' '+response[index].lname});
                    } else if (puo_refertare == 'Y' && prof_visible == 'N') {
                        $(".new_visit_no1 .choose_your_area.select3").attr("style", "pointer-events: inherit; opacity: inherit;");
                        ref_select1.addOption({value: response[index].doctor_id, text: response[index].fname+' '+response[index].lname});
                    }
                });

                doc_select1.refreshOptions();
                ref_select1.refreshOptions();
                $(".input-group-btn .plus").css("display", "block");
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
        });

        $(".new_visit_no1 .appoint_time").val('');
    }
    function render_html() {
        room++;
        var objTo = document.getElementById('new_visit');
        var divtest = document.createElement("div");
        divtest.setAttribute("class", "new_visit_no"+room);
        var rdiv = 'new_visit_no'+room;
        divtest.innerHTML = '      <div class="dynamic_div">\n' +
            '                                            <div class="duo_flex" style="justify-content: space-around !important;">\n' +
            '                                                <div class="input-style m-r">\n' +
            '                                                    <select data-id="'+room+'" class="select-visit-new" name="vist_name[]">\n' +
            '                                                        <option value="">Seleziona Prestazione</option>\n' +
            '                                                    </select>\n' +
            '                                                </div>\n' +
            '                                                <div class="input-style">\n' +
            '                                                    <select class="select-discount-new" name="select_discount[]">\n' +
            '                                                        <option value="">Seleziona Sconto</option>\n' +
            '                                                    </select>\n' +
            '                                                </div>\n' +
            '                                            </div>\n' +
            '                                            <div class="duo_flex" style="justify-content: space-around !important;">\n' +
            '                                                <div class="input-style m-r">\n' +
            '                                                    <select class="select-refertatore-new" name="refertatore_id[]">\n' +
            '                                                        <option value="">Seleziona Refertatore</option>\n' +
            '                                                    </select>\n' +
            '                                                </div>\n' +
            '\n' +
            '                                                <div style="width: 100%;">\n' +
            '                                                </div>\n' +
            '                                            </div>\n' +
            '\n' +
            '                                        </div><div class="input-group-btn">\n' +
            '                                                <button class="btn btn-success minus"  type="button" onclick="remove_visit_fields('+ room +');"><i class="fa fa-trash"></i> Cancella</button>\n' +
            '                                             </div>';

        objTo.appendChild(divtest);
		
		$(".input-group-btn .plus").addClass("m-t-minus");

        // $(".appoint_time").on("keyup", function(e) {
        //     alert("hello");
        // })
        // $(rdiv).find(".appoint_time").datepicker();

        $('.appoint_time').datepicker();
    }
    $(document).ready(function () {
        if (icp_param) {
            var get_medical_speciality = $("#get-medical-speciality option").val();
            var articles_idds = $.parseJSON('<?php echo $article_idd?>');
            var apt_datetime = '<?php echo $apt_datetime?>';
            var refer_idsss = $.parseJSON('<?php echo $refer_idss?>');

            if (apt_datetime){
                var select_date = apt_datetime.split('-');
                var year_split = select_date[2].split(' ');
                var date_string =  year_split[0]+ '-' + select_date[1] + '-' + select_date[0]+' '+year_split[1];
                var opoint_date = new Date(date_string);
                $(".appoint_time ").datepicker().data('datepicker').selectDate(new Date(opoint_date.getFullYear(), opoint_date.getMonth(), opoint_date.getDate(), opoint_date.getHours(), opoint_date.getMinutes()));
            }

            $.ajax({
                url: "get_visit_doc.php",
                type: "post",
                data: {data:get_medical_speciality, get_vist:1},
                dataType: "json",
                success: function (response) {
                    $.each(response, function(index) {
                        $(".new_visit_no1 .choose_your_area.select1").attr("style", "pointer-events: inherit; opacity: inherit; margin: 10px;");
                        var visit_att = '';
                        if (response[index].attribute){
                            var visit_att = ' ('+response[index].attribute+')';
                        }
                        visit_select1.addOption({value: response[index].article_id, text: response[index].description+visit_att});
                    });

                    visit_select1.setValue(articles_idds[0]);


                    discounted_prices = '';
                    var tt_discount = '<?php echo $total_discount?>';
                   if (tt_discount){
                       var discounted_prices = $.parseJSON(tt_discount);
                   }

                    $(articles_idds).each(function(index, val) {
                        if (index > 0){
                            render_html();

                            var back_index = parseInt(index)-1;
                            for (ds = 1; ds < 10; ds++) {
                                var options_data = ds*10;
                                if (options_data == discounted_prices[back_index]) {
                                    $(".new_visit_no"+room+" .select-discount-new")
                                        .append($("<option></option>")
                                            .attr("value", options_data)
                                            .text(options_data+'%')
                                            .attr('selected', 'selected')
                                        );
                                }else {
                                    $(".new_visit_no"+room+" .select-discount-new")
                                        .append($("<option></option>")
                                            .attr("value", options_data)
                                            .text(options_data+'%'));
                                }

                            }
                            var current_art_id = val;
                            $.each(response, function(index) {
                                    var visit_att = '';
                                    if (response[index].attribute){
                                        var visit_att = ' ('+response[index].attribute+')';
                                    }
                                    if (current_art_id == response[index].article_id) {
                                        $(".new_visit_no"+room+" .select-visit-new")
                                            .append($("<option></option>")
                                                .attr("value", response[index].article_id)
                                                .text(response[index].description+visit_att)
                                                .attr('selected', 'selected')
                                            );
                                    }else {
                                        $(".new_visit_no"+room+" .select-visit-new")
                                            .append($("<option></option>")
                                                .attr("value", response[index].article_id)
                                                .text(response[index].description+visit_att)
                                            );
                                    }

                            });

                            // if (apt_datetime[index]){
                            //     var select_date = apt_datetime[index].split('-');
                            //     var year_split = select_date[2].split(' ');
                            //     var date_string =  year_split[0]+ '-' + select_date[1] + '-' + select_date[0]+' '+year_split[1];
                            //     var opoint_date = new Date(date_string);
                            //     $(".new_visit_no"+room+" .appoint_time").datepicker().data('datepicker').selectDate(new Date(opoint_date.getFullYear(), opoint_date.getMonth(), opoint_date.getDate(), opoint_date.getHours(), opoint_date.getMinutes()));
                            // }

                        }
                    });


                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });

            var executor_selected = $.parseJSON('<?php echo $selected_exc?>');
            var visit_type_single = articles_idds[0];
            $(".new_visit_no1 .choose_your_area.select3").attr("style", "pointer-events: none; opacity: 0.6;");
            $.ajax({
                url: "get_visit_doc.php",
                type: "post",
                data: {data:visit_type_single, mds_erid:get_medical_speciality, get_vist:0},
                dataType: "json",
                success: function (response) {
                    $.each(response, function (index) {
                        var puo_refertare = response[index].puo_refertare;
                        var prof_visible = response[index].visible;
                        if (puo_refertare == 'N' || puo_refertare == 'Y' && prof_visible == 'Y') {
                                $(".new_visit_no1 .choose_your_area.select2").attr("style", "pointer-events: inherit; opacity: inherit; margin: 10px;");
                                doc_select1.addOption({
                                    value: response[index].doctor_id,
                                    text: response[index].fname + ' ' + response[index].lname
                                });
                        } else if (puo_refertare == 'Y' && prof_visible == 'N') {
                                $(".new_visit_no1 .choose_your_area.select3").attr("style", "pointer-events: inherit; opacity: inherit;");
                                ref_select1.addOption({
                                    value: response[index].doctor_id,
                                    text: response[index].fname + ' ' + response[index].lname
                                });
                            }

                    });

                    doc_select1.setValue(executor_selected);
                    if (refer_idsss[0]) {
                        ref_select1.setValue(refer_idsss[0]);
                    }

                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });

            // console.log(discounted_prices);

            $(articles_idds).each(function(index, val) {
                var loop_iteration = index;

                if (loop_iteration > 0){
                    var current_nb = parseInt(index)+1;
                    $.ajax({
                        url: "get_visit_doc.php",
                        type: "post",
                        data: {data:val, mds_erid:get_medical_speciality, get_vist:0},
                        dataType: "json",
                        success: function (response) {
                            $.each(response, function (index) {
                                var puo_refertare = response[index].puo_refertare;
                                var prof_visible = response[index].visible;
                                if (puo_refertare == 'Y' && prof_visible == 'N') {
                                    if (refer_idsss[loop_iteration] == response[index].doctor_id){
                                        $(".new_visit_no"+current_nb+" .select-refertatore-new")
                                            .append($("<option></option>")
                                                .attr("value", response[index].doctor_id)
                                                .text(response[index].fname + ' ' + response[index].lname)
                                                .attr('selected', 'selected')
                                            );
                                    } else {
                                        $(".new_visit_no"+current_nb+" .select-refertatore-new")
                                            .append($("<option></option>")
                                                .attr("value", response[index].doctor_id)
                                                .text(response[index].fname + ' ' + response[index].lname)
                                            );
                                    }

                                }

                            });

                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            console.log(textStatus, errorThrown);
                        }
                    });


                }

            });


            var select_visits_arr = [articles_idds[0]];
            $(".dynamic_div .select-visit-new").each(function(i){
                var selected_value = $(this).children("option:selected").val();
                if (selected_value){
                    select_visits_arr.push(selected_value);
                }
            });

            $(".input-group-btn .plus").css("display", "block");

            $('html, body').animate({scrollTop: $('.admin_main_section').offset().top}, 500);
        }
    });


    function addNewVisit() {

        render_html();
        var get_medical_speciality = $("#get-medical-speciality option").val();

        var select_visits_arr = [];
        $(".select-visit-new").each(function(i){
            var selected_value = $(this).children("option:selected").val();
            if (selected_value){
                select_visits_arr.push(selected_value);
            }
        });
        $.ajax({
            url: "get_visit_doc.php",
            type: "post",
            data: {data:get_medical_speciality, get_vist:1},
            dataType: "json",
            success: function (response) {
                $.each(response, function(index) {
                    // $(".new_visit_no2 .choose_your_area.select1").attr("style", "pointer-events: inherit; opacity: inherit; margin: 10px;");
                    if ($.inArray(response[index].article_id, select_visits_arr) != -1 ){
                        // not add visit
                    }else {
                        var visit_att = '';
                        if (response[index].attribute){
                            var visit_att = ' ('+response[index].attribute+')';
                        }
                        $(".new_visit_no"+room+" .select-visit-new")
                            .append($("<option></option>")
                                .attr("value", response[index].article_id)
                                .text(response[index].description+visit_att));
                    }

                });

            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
        });


        for (ds = 1; ds < 10; ds++) {
            var options_data = ds*10;
            if(options_data == 50){
                $(".new_visit_no"+room+" .select-discount-new")
                    .append($("<option></option>")
                        .attr("value", options_data)
                        .text(options_data+'%')
                        .attr('selected', 'selected')
                    );
            }else {
                $(".new_visit_no"+room+" .select-discount-new")
                    .append($("<option></option>")
                        .attr("value", options_data)
                        .text(options_data+'%'));
            }


        }

    }
    function remove_visit_fields(rid) {
        $('.new_visit_no'+rid).remove();
    }

    $(document).on("change",'.dynamic_div .select-visit-new', function(event){
        event.preventDefault();

        var visit_type_single = $(this).find(':selected').val();

        if (visit_type_single) {
            var booking_number = $(this).attr("data-id");
            $('.new_visit_no' + booking_number + ' .select-visit-new option:eq(0)').removeAttr('selected');

            var get_mds_id = $("#get-medical-speciality option").val();


            var select_doctor_arr = [];
            var select_doctor_arr1 = [];
            $(".select-doctor-new option:selected").each(function (i) {
                var selected_id = $(this).val();
                var selected_text = $(this).text();
                if (selected_id) {
                    select_doctor_arr.push({
                        doctor_id: selected_id,
                        doctor_name: selected_text
                    });
                    select_doctor_arr1.push(selected_id);
                }
            });

            // $(".choose_your_area.select2 .selectize-control.multi .selectize-input div, .choose_your_area.select2 .select-doctor-new option").remove();
            $(".new_visit_no2 .choose_your_area.select3").attr("style", "pointer-events: none; opacity: 0.6;");
            $.ajax({
                url: "get_visit_doc.php",
                type: "post",
                data: {data: visit_type_single, mds_erid: get_mds_id, get_vist: 0},
                dataType: "json",
                success: function (response) {
                    var get_doctor_arr = [];
                    $.each(response, function (index) {
                        var puo_refertare = response[index].puo_refertare;
                        var prof_visible = response[index].visible;
                        if (puo_refertare == 'N' || puo_refertare == 'Y' && prof_visible == 'Y') {
                            get_doctor_arr.push(response[index].doctor_id);
                        }
                    });

                    $.each(response, function (index) {
                        var puo_refertare = response[index].puo_refertare;
                        var prof_visible = response[index].visible;
                        if (puo_refertare == 'Y' && prof_visible == 'N') {
                            // $(".new_visit_no2 .choose_your_area.select3").attr("style", "pointer-events: inherit; opacity: inherit;");
                            $(".new_visit_no" + booking_number + " .select-refertatore-new")
                                .append($("<option></option>")
                                    .attr("value", response[index].doctor_id)
                                    .text(response[index].fname + ' ' + response[index].lname));
                        }
                    });


                    $.each(select_doctor_arr, function (index) {
                        if ($.inArray(select_doctor_arr[index].doctor_id, get_doctor_arr) !== -1) {
                            return true;
                        } else {
                            alert("Attenzione, "+select_doctor_arr[index].doctor_name +" non eroga questa prestazione. Cambia professionista o scegli un'altra prestazione.");
                            // $(".new_visit_no2 .choose_your_area.select2").attr("style", "pointer-events: none; opacity: 0.6;");
                            $('.new_visit_no' + booking_number + ' .select-visit-new option:eq(0)').attr('selected', 'selected');
                            $('.new_visit_no' + booking_number + ' .select-refertatore-new option').each(function () {
                                if ($(this).val() !== '') {
                                    $(this).remove();
                                }
                            });
                            return false;

                        }
                    });

                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }

            });
        }
    });


    function checkFisical(fis_val) {
        $.ajax({
            url: "check_fiscal.php",
            type: "post",
            data: {data: fis_val},
            dataType: "json",
            success: function (response) {
                if (response == 'true') {
                    // $(".error.fasical_cd").css("display", "none");
                    $("input#fiscal_code").css("background-color", "#d3fbff");
                    // $("#submit").attr("style", "opacity: inherit;pointer-events: inherit;color: #fff !important;");

                    if ($("body").attr("data-item") == 2){
                        $("#email, #first_name, #last_name, #caller_first_name, #caller_last_name, #tele,#dob").prop("readonly", false).val('');
                    } else {
                        if ($("#email").val()){
                        //
                        }else {
                            $("#email, #caller_first_name, #caller_last_name, #tele,#dob").prop("readonly", false).val('');

                        }
                    }

                    $("#dob").css("pointer-events", "inherit").prop("readonly", false);
                    // $("#email").val('');
                    // $("#first_name").val('');
                    // $("#last_name").val('');
                    // $("#dob").val('');
                    //   $("#caller_first_name").val('');
                    //   $("#caller_last_name").val('');
                    // $("#tele").val('');
                    $('.patiend_idd').remove();

                    if ($('.contact_id').length && $('.contact_id').val().length) {
                        $("#caller_first_name, #caller_last_name, #tele").val('');
                    }
                    $('.contact_id').remove();
                } else {
                    $('.patiend_idd').remove();
                    $("#email-form").append('<input class="patiend_idd" type="hidden" name="patients_id" value="' + response.paziente_id + '">');
                    $("#email, #first_name, #last_name, #tele, #caller_first_name, #caller_last_name").prop("readonly", true);
                    $('.contact_id').remove();
                    $("#email-form").append('<input type="hidden" class="contact_id" name="contact_id" value="' + response[0].contact_id + '">');
                    $("#dob").css("pointer-events", "none").prop("readonly", true);
                    // $(".error.fasical_cd").css("display", "block");
                    $("input#fiscal_code").css("background-color", "#ffc5c5");
                    // $("#submit").attr("style", "opacity: 0.4;pointer-events: none;color: #fff !important;");
                    $("#first_name").val(response[0].fname);
                    $("#last_name").val(response[0].lname);
                    $("#dob").val(response[0].dob);
                    $("#email").val(response[1].contact_email);
                    var phone_num = response[1].contact_phone;
                    $("#caller_first_name").val(response[1].contact_name);
                    $("#caller_last_name").val(response[1].contact_surname);
                    if (phone_num) {
                        $("#tele").val(phone_num);
                    }

                    $("body").attr("data-item", "2");
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
        });
    }

    $('#fiscal_code').keyup(function (eev) {
        eev.preventDefault();
        $(".patient_names ol strong").remove();
        $(".patient_names").removeClass("patient_names_background");
        var fis_val = $("#fiscal_code").val();
        if (fis_val.length > 1) {
            checkFisical(fis_val);
        } else {
            if ($("#email").val()){
                $("#dob, #gmap_adress").val('');
            }else {
               $("#email, #dob, #address_search, .gmap_adress, #caller_first_name, #caller_last_name, #tele").val('');
            }

        }
    });

    $(document).ready(function () {
        if (icp_param) {
            var fis_val = $("#fiscal_code").val();
            checkFisical(fis_val);
        }
    });

    $('#last_name, #email').keyup(function (eev) {
        eev.preventDefault();
        var name_attr = $(this).attr("name");
        if (name_attr == 'email') {
            var search_value = $(this).val();
            var search_type = 3;
        } else {
            var search_value = $(this).val();
            var search_type = 1;

            $("body").attr("data-item", "1");
        }
        if (search_value.length >= 1) {
            $.ajax({
                url: "get_patient.php",
                type: "post",
                data: {search_value: search_value, search_type: search_type},
                dataType: "json",
                success: function (response) {
                    // console.log(response);
                    if (response == 'true') {
                        if ($('.contact_id').length && $('.contact_id').val().length) {
                            $("#caller_first_name, #caller_last_name, #tele").val('');
                        }
                        $('.contact_id').remove();
                        if (name_attr == 'email') {
                            $(".show_contact_msg").css("display", "none");
                        } else {
                            $(".patient_names ol strong").remove();
                            $(".patient_names").removeClass("patient_names_background");
                            if ($("#email").val()){
                                $("#first_name, #dob, #address_search, .gmap_adress").val('');
                            } else {
                                $("#email, #first_name, #dob, #address_search, .gmap_adress, #caller_first_name, #caller_last_name, #tele").val('');
                            }

                            if ($("#fiscal_code").val()){
                               //
                            }else {
                                $("#fiscal_code").val('');
                            }

                            document.getElementById("fiscal_code").readOnly = false;
                            $('.patiend_idd').remove();
                        }

                    } else {

                        $('.contact_id').remove();
                        $("#email-form").append('<input type="hidden" class="contact_id" name="contact_id" value="' + response[0].contact_id + '">');
                        if (name_attr == 'email') {

                            $("#caller_first_name").val(response[0].contact_name);
                            $("#caller_last_name").val(response[0].contact_surname);
                            $("#tele").val(response[0].contact_phone);
                            $(".show_contact_msg").css("display", "block");
                        } else {
                            if ($(".admin_main_section").attr("data-id") == 2){

                                $("#email, #fiscal_code, #first_name, #dob, #address_search, .gmap_adress, #caller_first_name, #caller_last_name, #tele").val('');
                            }
                            $(".patient_names ol strong").remove();
                            $(".patient_names").addClass("patient_names_background");
                            $.each(response, function (key, value) {
                                var date_of_birth = response[key].dob.split('-');
                                var dob = date_of_birth[1] + '-' + date_of_birth[0] + '-' + date_of_birth[2];
                                $(".patient_names ol").append("<strong><li class='data-list' style='cursor: pointer;' contact-id='" + response[key].contact_id + "' data-id='" + response[key].paziente_id + "'>" + '<span style="color: #00285c;">' + response[key].fname + ' ' + response[key].lname + ',</span> <span style="color: #0cd9ed;">' + response[key].fiscale + ', </span><span style="color: #0ab;">' + dob + '</span>' + "</li></strong>");
                            });
                        }
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });
        }else {
            if (name_attr == 'email') {
                if ($('.contact_id').length && $('.contact_id').val().length) {
                    $("#caller_first_name, #caller_last_name, #tele").val('');
                }
                $('.contact_id').remove();
                $(".show_contact_msg").css("display", "none");
            } else {
                $(".patient_names ol strong").remove();
                $(".patient_names").removeClass("patient_names_background");

                if ($("#email").val()){
                    $("#first_name, #dob, #address_search, .gmap_adress").val('');
                } else {
                    $("#email, #first_name, #dob, #address_search, .gmap_adress, #caller_first_name, #caller_last_name, #tele").val('');
                }

                if ($("#fiscal_code").val()){
                    //
                }else {
                    $("#fiscal_code").val('');
                }

                document.getElementById("fiscal_code").readOnly = false;
                $('.patiend_idd').remove();
            }
        }
    });

    $('.patient_names').on('click', '.data-list', function () {
        var paziente_id = $(this).attr("data-id");
        var contact_id = $(this).attr("contact-id");
        $.ajax({
            url: "get_patient.php",
            type: "post",
            data: {paziente_id: paziente_id, contact_id: contact_id, search_type: 2},
            dataType: "json",
            success: function (response) {
                if (response == 'true') {
                    document.getElementById("fiscal_code").readOnly = false;
                    $("#email, #first_name, #dob, #fiscal_code, #address_search, .gmap_adress, #caller_first_name, #caller_last_name, #tele").val('');
                    $('.patiend_idd').remove();
                } else {
                    $('.patiend_idd').remove();
                    $("#email-form").append('<input class="patiend_idd" type="hidden" name="patients_id" value="' + response[0].paziente_id + '">');
                    $("#caller_first_name, #caller_last_name, #tele, #email").prop("readonly", true);
                    $(".patient_names ol strong").remove();
                    $(".patient_names").removeClass("patient_names_background");
                    $("#first_name").val(response[0].fname);
                    $("#last_name").val(response[0].lname);
                    $("#dob").val(response[0].dob);
                    $("#fiscal_code").val(response[0].fiscale);
                    document.getElementById("fiscal_code").readOnly = true;
                    $("#address_search").val(response[0].address);
                    $(".lat_log").val(response[0].lat_lang);
                    $(".gmap_adress").val(response[0].gmap_address);
                    $("#email").val(response[1].contact_email);
                    $("#caller_first_name").val(response[1].contact_name);
                    $("#caller_last_name").val(response[1].contact_surname);
                    $("#tele").val(response[1].contact_phone);

                 $(".admin_main_section").attr("data-id", "2");

                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
        });
    });


    $('#first_name').keyup(function (eev) {
        eev.preventDefault();
        $(".patient_names ol strong").remove();
        $(".patient_names").removeClass("patient_names_background");
    });

     $("input").on("click", function () {
         $(".show_contact_msg").css("display", "none")
     });


    $("#km_price").on('keyup mouseup', function () {
        var km_total_price = $(this).val();
        if (km_total_price < 1){
            $('.km_total_price').html('');
        }else{
            $('.km_total_price').html(km_total_price+' Euro');

        }
    }).trigger('mouseup');

</script>
<script>
    /* script */
    function initialize() {
        var selected_latlng = $(".lat_log").val();
        if (selected_latlng) {
            var split = selected_latlng.split(",");
            var latlng = new google.maps.LatLng(split[0], split[1]);
        } else {
            var latlng = new google.maps.LatLng(44.838124, 11.619787);
        }
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
        autocomplete.addListener('place_changed', function () {
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

            bindDataToForm(place.formatted_address, place.geometry.location.lat(), place.geometry.location.lng());
            infowindow.setContent(place.formatted_address);
            infowindow.open(map, marker);

        });
        // this function will work on marker move event into map
        google.maps.event.addListener(marker, 'dragend', function () {
            geocoder.geocode({'latLng': marker.getPosition()}, function (results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    if (results[0]) {
                        bindDataToForm(results[0].formatted_address, marker.getPosition().lat(), marker.getPosition().lng());
                        infowindow.setContent(results[0].formatted_address);
                        infowindow.open(map, marker);
                    }
                }
            });
        });
    }

    function bindDataToForm(address, lat, lng) {

        $(".gmap_adress").val("https://www.google.com/maps/place/" + address + "/@" + lat + "," + lng);
        $(".lat_log").val(lat + "," + lng);
        // document.getElementById('location').value = address;
        // document.getElementById('lat').value = lat;
        // document.getElementById('lng').value = lng;
    }

    google.maps.event.addDomListener(window, 'load', initialize);
</script>
<script type="text/javascript">
    $(".appoint_time").on("keyup", function(e) {
        var select_date = $(this).val().split('-');
        var date_string = select_date[1] + '-' + select_date[0] + '-' + select_date[2];

        var opoint_date = opoint_date = new Date(date_string);
        setTimeout(function () {
            if (opoint_date == 'Invalid Date') {
                //do not do anyting
            } else {
                $('.appoint_time').datepicker().data('datepicker').selectDate(new Date(opoint_date.getFullYear(), opoint_date.getMonth(), opoint_date.getDate(), opoint_date.getHours(), opoint_date.getMinutes()));
            }
        }, 500);

    });

    var dobb = '<?php echo $dobb?>';
    if (dobb) {
        var date_of_birth = new Date(dobb);
        $('.date_of_birth').datepicker({
            timepicker: false
        }).data('datepicker').selectDate(new Date(date_of_birth.getFullYear(), date_of_birth.getMonth(), date_of_birth.getDate()));
    } else {
        $('.date_of_birth').datepicker({
            timepicker: false
        });
    }

</script>
<script>
    $(document).ready(function () {
        $('.admin_item:nth-child(4)').addClass('current');

        $(".search .text-field").on("keyup", function () {
            var value = $(this).val().toLowerCase();
            if (value.length == 0) {
                $("#Search_form .w-button").css("display", "block");
            } else {
                $("#Search_form .w-button").css("display", "none");
            }
            $(".doctors_block .regi_doctor_card").filter(function () {
                $(this).toggle($(".email-text, .fasic-text", this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });

    $("input, textarea").focus(function () {
        var input_id = $(this).attr("id");
        $(".error_" + input_id).removeClass('error_show');
    });

</script>
<style>
    .error_message {
        margin-bottom: 25px;
    }

    .error_show {
        display: block;
    }
    #get-medical-speciality-selectized{
        width: 310px !important;
    }
</style>
<script src="../js/admin/webflow.js" type="text/javascript"></script>
<script src="/js/admin/tel_book_val.js" type="text/javascript"></script>
<!-- [if lte IE 9]>
<script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
<div id="fb-root"></div>
<script async="" defer="" crossorigin="anonymous"
        src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v4.0"></script>
</body>
</body>
</html>