<?php session_start();
if (!isset($_SESSION['adminlogin'])) {
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html data-wf-page="5dfbca93dac992df80dd982b" data-wf-site="5d8cfd454ebd737ac1a48727">
<head>
    <meta charset="utf-8">
    <title>Specialità medica</title>
    <meta content="admin" property="og:title">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta content="Webflow" name="generator">
    <link href="../css/admin/normalize.css" rel="stylesheet" type="text/css">
    <link href="../css/admin/webflow.css" rel="stylesheet" type="text/css">
    <link href="../css/admin/mobidoc.webflow.css?v=5" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script>
    <script
            type="text/javascript">WebFont.load({google: {families: ["Montserrat:100,100italic,200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic", "Poppins:100,100italic,200,300,300italic,regular,500,600,700,800,900", "PT Serif Caption:regular"]}});</script>
    <!-- [if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"
            type="text/javascript"></script>
    <![endif] -->
    <script type="text/javascript">!function (o, c) {
            var n = c.documentElement, t = " w-mod-";
            n.className += t + "js", ("ontouchstart" in o || o.DocumentTouch && c instanceof DocumentTouch) && (n.className += t + "touch")
        }(window, document);</script>
    <link href="../images/favicon.png" rel="shortcut icon" type="image/x-icon">
    <link href="../images/webclip.png" rel="apple-touch-icon">
    <script src="https://kit.fontawesome.com/3f12b8b553.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js"
            integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
            crossorigin="anonymous"></script>

    <style>

        .list-style-new {
            width: 100%;
            border-bottom: 1px solid rgba(12, 217, 237, 0.7);
            background-color: rgba(211, 251, 255, 0.48);
            font-family: Poppins, sans-serif;
            padding: 15px 15px;
            border-top: none;
            border-right: none;
            border-left: none;
            border-radius: 5px;
        }

        .active {
            margin-left: 20px;
            font-weight: bold;
            border-bottom: 1px solid rgba(12, 217, 237, 0.7);
            background-color: rgba(211, 251, 255, 0.48);
            padding: 10px 10px;
            border-top: none;
            border-right: none;
            border-left: none;
            border-radius: 5px;
        }

        .inactive {
            background-color: #f8dbdb;
            border-bottom: 1px solid rgba(255, 117, 117, 0.7);
        }

        .width-1 {
            width: 370px;
            height: auto
        }

        .pop-width {
            width: 60%;
        }

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

        /**************************************/
        .body-14 .glance_details_title {
            padding-top: 25px;
        }

        .body-14 .glance_details_title label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            float: left;
        }

        .body-14 input[type="checkbox"] {
            float: left;
            margin-right: 10px;
            margin-top: 4px;
        }

        @media screen and (max-width: 1536px) {
            .width-1 {
                width: 300px;
            }
        }

        @media screen and (max-width: 1440px) {
            .width-1 {
                width: 290px;
            }
        }

        @media screen and (max-width: 1366px) {
            .width-1 {
                width: 280px;
            }

            .input_num {
                width: 55px;
                padding-left: 3px;
                font-size: 14px

            }

            .image-14 {
                margin-left: 7px;
            }

            .visit_subitem {


                padding: 18px 25px 18px 15px;
            }

            .price_input {
                padding: 2px 2px 2px 6px;
            }
        }

        @media screen and (max-width: 1280px) {
            .width-1 {
                width: 270px;
            }

            .input_num {
                width: 55px;
                padding-left: 3px;
                font-size: 14px

            }

            .image-14 {
                margin-left: 7px;
            }

            .visit_subitem {


                padding: 18px 25px 18px 15px;
            }

            .price_input {
                padding: 2px 2px 2px 6px;
            }
        }

        @media screen and (max-width: 767px) {
            .admin_main_section .admin_section_header {
                display: inline-block;
                left: 90px;
            }

            .admin_main_section .scroll_indicator {
                display: none;
            }

            .body-14 .regi_doctor_card {

                padding: 23px 10px;

            }

            .width-1 {
                width: 100%;
            }

            .pop-width {
                width: 100%;
            }

            .grid-c {
                grid-template-columns: 1fr;
            }
        }

        @media screen and (max-width: 400px) {
            #add .button-10 {
                font-size: 11px;
            }
        }

        @media screen and (max-width: 340px) {
            #add .button-10 {
                margin-right: 10px !important;
            }
        }

        .active_anchor {
            text-decoration: none !important;
            color: black !important;
        }

        .active_anchor:hover {
            opacity: .7;
        }
    </style>
	
	
	
	<!-------------- Ali CSS Strat Here --------------------->
	<style>
		.med-specialties .regi_doctor_card {
    display: -ms-grid;
    display: grid;
    margin-top: 30px;
    padding: 33px;
    grid-auto-columns: 1fr;
    grid-column-gap: 70px;
    grid-row-gap: 16px;
    -ms-grid-columns: 47% 47%;
    grid-template-columns: 47% 47%;
    -ms-grid-rows: auto;
    grid-template-rows: auto;
    border-top: 1px none rgba(0, 40, 92, 0.07);
    border-radius: 20px;
    background-color: hsla(0, 0%, 100%, 0.5);
    box-shadow: 0 18px 30px 0 rgb(0 40 92 / 5%), 0 3px 30px 0 rgb(0 40 92 / 5%);
    -webkit-transform-origin: 0% 50%;
    -ms-transform-origin: 0% 50%;
    transform-origin: 0% 50%;
    text-align: left;
			
}
		.med-specialties input[type="checkbox"] {
 
    margin-top: 12px;
}
		.med-specialties .glance_details_title label {

    margin-top: 9px;
}
		.flot-r{
			float:right;
		}
		.width78{
			width:78%;
		}
		.scroll-div{
		    height: 550px;
    overflow-y: scroll;
  overflow-x: hidden;
  scrollbar-width: thin;
  scrollbar-color: #49ddef #49ddef;
			margin: 20px 0;
   
}

/******************************/
/* Works on Chrome, Edge, and Safari */
.scroll-div::-webkit-scrollbar {
  width: 12px;
  border-radius: 20px;
}
.scroll-div::-webkit-scrollbar-track {
  background: #d1faff;
  border-radius: 20px;
}
.scroll-div::-webkit-scrollbar-thumb {
  background-color: #49ddef;
  border-radius: 20px;
  border: 2px solid #49ddef;
}		
		
		
		.med-specialties .div-block-20 {
  
    width: 100%;
    margin-top: 5px;
    margin-bottom: 5px;
    
    -ms-grid-columns: 7fr 2fr 2fr;
    grid-template-columns: 7fr 2fr 2fr;
}
		.med-specialties .glance_details_title {
    padding-top: 0px;
}
		.div-block-88 {
  display: -ms-grid;
  display: grid;
  width: 100%;
  margin-top: 0px;
  margin-bottom: 0px;
  -webkit-box-pack: justify;
  -webkit-justify-content: space-between;
  -ms-flex-pack: justify;
  justify-content: space-between;
  justify-items: stretch;
  -webkit-box-align: stretch;
  -webkit-align-items: stretch;
  -ms-flex-align: stretch;
  align-items: stretch;
  -webkit-align-content: space-between;
  -ms-flex-line-pack: justify;
  align-content: space-between;
  grid-auto-columns: 1fr;
  grid-column-gap: 10px;
  grid-row-gap: 10px;
  -ms-grid-columns: 1fr 1fr;
  grid-template-columns: 1fr 1fr;
  -ms-grid-rows: auto;
  grid-template-rows: auto;
}
		.visit_form input[type="checkbox"]{ margin-top: 3px;}
		.width-40{
			width:40%;
		}
		.btn-auto{
			margin: 0 auto 30px auto !important;
		}
/*****************************************************************************/
		@media only screen and (max-width: 1792px) {	
		
		.width78 {
    width: 76%;
		}}
		@media only screen and (max-width: 1600px) {	
		
		.width78 {
    width: 75%;
		}}
		@media only screen and (max-width: 1536px) {	
		
		.width78 {
    width: 73%;
		}}
		@media only screen and (max-width: 1440px) {	
		
		.width78 {
    width: 70%;
		}}
	@media only screen and (max-width: 1366px) {	
		
		.width78 {
    width: 70%;
		}}	
		
	@media only screen and (max-width: 1280px) {	
		
		.width78 {
    width: 67%;
		}}
		
		@media only screen and (max-width: 767px) {
			.width78 {
    width: 90%;
}
			.med-specialties .regi_doctor_card {
    display: -ms-grid;
    display: grid;
    margin-top: 30px;
    padding: 15px;
    grid-auto-columns: 1fr;
    grid-column-gap: 16px;
    grid-row-gap: 16px;
    -ms-grid-columns: 100%;
    grid-template-columns: 100%;
    -ms-grid-rows: auto;
    grid-template-rows: auto;
    border-top: 1px none rgba(0, 40, 92, 0.07);
    border-radius: 20px;
    background-color: hsla(0, 0%, 100%, 0.5);
    box-shadow: 0 18px 30px 0 rgb(0 40 92 / 5%), 0 3px 30px 0 rgb(0 40 92 / 5%);
    -webkit-transform-origin: 0% 50%;
    -ms-transform-origin: 0% 50%;
    transform-origin: 0% 50%;
    text-align: left;
}
			.flot-r {
    float: none;
}
			.div-block-88 {
 
    -ms-grid-columns: 1fr;
    grid-template-columns: 1fr;
    
}
			.med-specialties .pop-width {
    width: 90%;
}
			.med-specialties .div-block-20 {
    width: 98%;
    margin-top: 5px;
    margin-bottom: 5px;
    -ms-grid-columns: 1fr 1fr 1fr;
    grid-template-columns: 0.9fr 2fr 2fr;
    display: grid;
    white-space: normal;
				    grid-column-gap: 10px;
    grid-row-gap: 10px;
				padding-left: 0px;
}
			.med-specialties .view_visits_container {

    padding: 20px 15px 15px;
}
			.width-40{
			width:50%;
		}
}
		
	</style>
	<!-------------- Ali CSS End Here --------------------->
</head>
<body class="body-14 med-specialties">
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
        <h1 class="admin_section_heading">Specialità medica</h1>
        <div class="div-block-70">
            <div class="scroll_indicator">
                <div data-w-id="98c7cd18-996f-4b08-777e-ae54e6517910" data-animation-type="lottie"
                     data-src="https://uploads-ssl.webflow.com/5d8cfd454ebd737ac1a48727/5df9f0f25ccbf3bb4c727941_lottieflow-scrolling-01-1-00285C-easey.json"
                     data-loop="0" data-direction="1" data-autoplay="0" data-is-ix2-target="1" data-renderer="svg"
                     data-default-duration="2.76" data-duration="0" class="lottie-animation-3"></div>
            </div>
            <div id="add">
                <?php
                /*
                 <a href="/paziente/register.php" target="_blank" class="button-10 w-button" style="display:inline; padding:10px 20px 10px 20px; margin-right:10px;">+ Paziente</a>
                 <a href="/professionisti/register.php?admin" target="_blank" class="button-10 w-button" style="display:inline; padding:10px 20px 10px 20px; margin-right:30px;">+ Professionista</a>
                  <a href="/paziente/patient-register.php" target="_blank" class="button-10 w-button" style="display:inline; padding:10px 20px 10px 20px; margin-right:30px;">+ Prenotazione Telefonica</a>
                */
                ?>

            </div>
            <a href="logout.php" class="admin_logout w-button"></a></div>
    </div>

    <div class="section_content">
        <div class="applications">
            <div class="doctors_block">
                <div class="regi_doctor_card">

                       <?php if (isset($_GET['sb']) && $_GET['sb'] == 1){?>
                           <p class="visit_err" style="color: green">New Visit added Successfully.</p>
                           <?php }else if (isset($_GET['sb']) && $_GET['sb'] == 2){?>
                           <p class="visit_err" style="color: red">New Visit not added.</p>
                           <?php }?>

                        <?php
                        include '../connect.php';

                        $sql = "SELECT * FROM medical_specialty ORDER BY name ASC";
                        $result = mysqli_query($conn, $sql);
                        while ($rows = mysqli_fetch_array($result)) {
                            $mds_idd = $rows['id'];
                            $mds_status = $rows['status'];
                            if ($mds_status == 'Y') {
                                $is_check = 'checked';
                            } else {
                                $is_check = '';
                            }

                            ?>
                            <div class="glance_details_title mds<?=$mds_idd?>" style="font-size: 14px;margin-left: 15px;">
                                <input type="checkbox" <?php echo $is_check ?> class="medical_speciality lable2" id="medical_speciality"
                                       name="medical_speciality" data-id="<?=$mds_idd?>" value="<?=$mds_status?>">
                                <label for="medical_speciality" class="width78"><?=$rows['name']?> </label>
                                <p class="gen_errr" style="display: none">Some Error.</p>
                                <a href="javascript:;" erid-id="<?=$rows['ERid']?>" class="button v_visits w-button flot-r">View Visits</a>
                            </div>

                            <?php
                        }
                        mysqli_close($conn);
                ?>

                </div>

            </div>
            <div class="end-of-the-list">
                <div class="line"></div>
                <div id="w-node-0e7522d67d94-80dd982b" class="text-block-70">Non ci sono più profili da visualizzare.
                </div>
                <div class="line"></div>
            </div>
        </div>
    </div>
    <div class="menu_current w-embed w-script">
        <script>
            $(document).ready(function () {
                $('.admin_item:nth-child(6)').addClass('current');
            });

            $('.medical_speciality').click(function () {
                var mds_val = $(this).val();
                var mds_id = $(this).attr("data-id");
                if (mds_val == 'Y') {
                    var mds_new_val = 'N';
                    $(this).val(mds_new_val);
                } else {
                    var mds_new_val = 'Y';
                    $(this).val(mds_new_val);
                }
                $.ajax({
                    url: "update_mds.php",
                    type: "post",
                    data: {mds_idd: mds_id, mds_status: mds_new_val},
                    success: function (response) {
                        if (response == 'true') {
                            $(".glance_details_title.mds" + mds_id + " .gen_errr").attr("style", "display:none");
                        } else {
                            $(".glance_details_title.mds" + mds_id + " .gen_errr").attr("style", "display:block;color:red");
                        }
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log(textStatus, errorThrown);
                    }
                });

            });

        </script>
    </div>

    <div class="view_visits" style="display: none; opacity: 0;">
        <div data-w-id="293fdba6-5dda-9f43-9d25-cf99e8f7032b" class="closer"></div>
        <div class="view_visits_container pop-width" style="transform: translate3d(0px, 0%, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d; opacity: 1;">
            <div class="text-block-66 diff">Sei sicuro di voler approvare?</div>
            <div class="w-form view_visit_pop" id="view_visit">
            </div>

            <div class="w-form add_new_visit" style="display: none">
                <?PHP
                if(isset($_POST['submit']))
                {

                    include '../connect.php';

                    $visit_name = mysqli_real_escape_string($conn, $_POST['visit_name']);
                    $attribute = mysqli_real_escape_string($conn, $_POST['attribute']);

                    $home_check_status = 'N';
                    if (isset($_POST['home_check']) && $_POST['home_check'] == 'on'){
                        $home_check_status = 'Y';
                    }

                    $tele_check_status = 'N';
                    if (isset($_POST['tele_check']) && $_POST['tele_check'] == 'on'){
                        $tele_check_status = 'Y';
                    }


                    $sql = "insert into articlesMobidoc (home, tele, descrizione, attributo) values('".$home_check_status."', '".$tele_check_status."', '".$visit_name."', '".$attribute."')";
                    $result = mysqli_query($conn, $sql);
                    if($result==1)
                    {
                        $last_visit_id = mysqli_insert_id($conn);
                        $visit_erid = $_POST['erid'];
                        $sql12 = "insert into articlesMobidoc_specialty (id, specialtyMobidoc) values('".$last_visit_id."', '".$visit_erid."')";
                        $result12 = mysqli_query($conn, $sql12);

                        if ($result12 == 1){
                            echo "<script>window.location = '/admin/medical-specialties.php?sb=1'</script>";
                        }else{
                            echo "<script>window.location = '/admin/medical-specialties.php?sb=2'</script>";
                        }
                    }else{
                        echo "<script>window.location = '/admin/medical-specialties.php?sb=2'</script>";
                    }

                    mysqli_close($conn);
                }

                ?>
                <form class="visit_form" action="medical-specialties.php" name="email-form" method="post">
<div class="div-block-88">
                    <input type="hidden" name="erid" class="form_erid">
                    <input type="text" class="inputs w-input" maxlength="256" name="visit_name" placeholder="Visit/Exam Name"" required="">
                    <input type="text" class="inputs w-input" maxlength="256" name="attribute" placeholder="Attributo">
	
	
	<table  border="0" cellspacing="0" cellpadding="0" class="width-40">
  <tbody>
    <tr>
      <td> <input type="checkbox" class="home_check lable2" id="home_check"
                               name="home_check">
                        <label for="home_check">Home</label></td>
      <td><input type="checkbox" class="tele_check lable2" id="tele_check"
                           name="tele_check">
                    <label for="tele_check">Tele</label></td>
    </tr>
	  
  </tbody>
</table>

	
                    

                   
	</div>
					
					<div class="div-block-21 diff">
                <br>
                    <input type="submit" name="submit" value="Invia" id="submit_profile" class="button gradient login_button register w-button submit_profile_btn btn-auto">
            </div>
					
					
					
	
                </form>

            </div>
            <div class="div-block-21 diff">
                <a style="display: inline-block;margin-left: 0px;" href="#" class="button next close w-button">Cancella</a>
                <a href="#" class="button-3 next add_visit w-button" style="width: auto;">Add New Visit/Exam</a>
            </div>
        </div>

    </div>

</div>
<style>
    .slectors, .selecteds {
        height: 350px;
    }
</style>

<script type="application/javascript">

    $(".v_visits").on("click", function () {
        $(".view_visits").attr("style", "display: flex; opacity: 1;");
        var erid_id = $(this).attr("erid-id");
        $(".form_erid").val(erid_id);
        var xmlhttp2 = new XMLHttpRequest();
        xmlhttp2.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("view_visit").innerHTML = this.responseText;
            }
        };
        xmlhttp2.open("GET", "update_visit.php?erid-id=" + erid_id, true);
        xmlhttp2.send();

        $(".view_visits .div-block-19").css("display", "block");
        $(".view_visits .add_visit").css("display", "inline-block");
        $(".add_new_visit").css("display", "none");
		$(".view_visit_pop").addClass("scroll-div");
    });

        $(document).on('click touchstart', '.view_visits .glance_details_title input', function(){
            var visit_id = $(this).attr("article_id");
            var status_type = $(this).attr("name");
           var visit_status = $(this).val();
        if (visit_status == 'Y') {
            var visit_status_new = 'N';
            $(this).val(visit_status_new);
        } else {
            var visit_status_new = 'Y';
            $(this).val(visit_status_new);
        }
        $.ajax({
            url: "update_visit_type.php",
            type: "post",
            data: {visit_idd: visit_id, status_type: status_type, visit_status: visit_status_new },
            success: function (response) {
                console.log(response);
                if (response == 'true') {
                    //do not do anything
                } else {
                    alert("C'è qualche errore.");
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
        });

    });

    $(".view_visits .close").click(function () {
        $(".view_visits").attr("style", "display: none; opacity: 0;");
        $('.visit_form')[0].reset();
        $('.visit_form input[type=checkbox]').prop('checked',false);
    });

    $(document).ready(function () {
        $(".view_visits .add_visit").on("click", function () {
            $(".view_visits .div-block-19").slideUp("slow", function () {
                $(".add_new_visit").slideDown("slow");
            });
			$(".view_visit_pop").removeClass("scroll-div");
            $(".view_visits .add_visit").css("display", "none");
        });

        setTimeout(function(){
            $(".visit_err").css("display", "none");
            }, 3000);

    });
</script>
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