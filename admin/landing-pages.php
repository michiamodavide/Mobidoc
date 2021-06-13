<?php session_start();
if(!isset($_SESSION['adminlogin']))
{
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html data-wf-page="5dfbca93dac9929422dd9875" data-wf-site="5d8cfd454ebd737ac1a48727">
<head>
    <meta charset="utf-8">
    <title>Landing Pages</title>
    <meta content="Booking" property="og:title">
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
    <style>
        ::-webkit-scrollbar {
            width: 0px;
            height:0px;
        }
        .p {
            text-align-last: center !important;
        }
        .filter_options a {
            text-decoration: none;
            color: #00285c;
        }
        .bg-color {
            background-color: #f8dbdb;
            color: #00285c;
        }
        .body-13 .bottom {
            display: -ms-grid;
            display: grid;
            width: 100%;
            padding-right: 0px;
            -webkit-box-pack: justify;
            -webkit-justify-content: space-between;
            -ms-flex-pack: justify;
            justify-content: space-between;
            grid-auto-columns: 1fr;
            grid-column-gap: 15px;
            grid-row-gap: 0px;
            -ms-grid-columns: 1fr 0.5fr 1fr 1fr 1fr 0.5fr;
            grid-template-columns: 1fr 0.5fr 1fr 1fr 1fr 0.5fr;
            -ms-grid-rows: auto;
            grid-template-rows: auto;
        }
        .lable2{
            margin-right: 10px;
            float: left;
            margin-top: 4px;
        }
		.float-r{
			float:right;
			margin-top: 7px;
		}
        /*********************************/

        @media only screen and (max-width: 767px) {
            .body-13 .admin_side_panel {

                top: 0.01%;

            }
            .body-13 .top {
                display: revert;
            }
            .body-13 .bottom {
                display:contents;
            }
            .body-13 .heading-24 {
                font-size: 22px;
				float: left;
            }
            .body-13 .bookingcard {
                display: revert;
                padding: 10px 10px 10px 10px;
            }
            .body-13 .open_booking {
                padding: 10px 15px;
            }
            .body-13 .scroll_indicator {
                display: none;
            }
            .body-13 .filter_button {
                display: -webkit-box;
                display: -webkit-flex;
                display: -ms-flexbox;
                display: flex;
                width: 163px;
                height: 50px;
                padding-right: 15px;
                padding-left: 15px;
                -webkit-box-pack: center;
                -webkit-justify-content: center;
                -ms-flex-pack: center;
                justify-content: center;
                -webkit-box-align: center;
                -webkit-align-items: center;
                -ms-flex-align: center;
                align-items: center;
                border-radius: 30px;
                background-color: #e6e8eb;
                cursor: pointer;
            }
            .body-13 .admin_section_header {
                left: 70px;
                display: revert;
                width: 74%;
            }
            .body-13 .section_content {
                margin-top: 120px;
            }
            .body-13 .admin_main_section {
                width: 77%;
                height: 100vh;
                margin-left: 80px;
                padding-top: 0.5px;
                padding-right: 3%;
                padding-left: 3%;
            }
			.float-r {
    float: right;
    margin-top: 10px;
}
			.booking_patent_image {
    margin: 0 auto;
}
        }
        @media (min-width: 1200px) and (max-width: 1600px) {
            .lable2{
                margin-right: 10px;
                float: left;
                margin-top: 4px;
            }
            .body-13 .bottom {
                -ms-grid-columns: 1fr 0.5fr 1fr 1fr 0.5fr 1fr;
                grid-template-columns: 1fr 0.5fr 1fr 1fr 0.5fr 1fr;

            }
        }
        .booking_patent_image{
            border-radius: 0px !important;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <style>
        *:focus {
            outline: none;
            border: none;
        }
    </style>
</head>
<body class="body-13">
<div>
    <?php include ("admin_side_bar.php")?>
    <div data-w-id="410c8c4a-713c-7280-b165-1dd2a36167c1" class="preloader">
        <div class="loader">
            <div data-w-id="410c8c4a-713c-7280-b165-1dd2a36167c3" data-animation-type="lottie" data-src="https://uploads-ssl.webflow.com/5d8cfd454ebd737ac1a48727/5df92a8de51cd1d00a86eb51_lottieflow-loading-04-2-00285C-easey.json" data-loop="1" data-direction="1" data-autoplay="1" data-is-ix2-target="0" data-renderer="svg" data-default-duration="1.7916666666666667" data-duration="0" class="lottie-animation-2"></div>
        </div>
    </div>
</div>
<div class="admin_main_section">
    <div data-w-id="671d7027-6f87-1c3f-c474-3b17f4b83b06" style="opacity:1" class="admin_section_header">
        <h1 class="admin_section_heading">Landing Pages</h1>
        <div class="div-block-70">
            <div class="filter">
                <a href="create-lp.php" style="text-decoration: none;">
                <div data-w-id="7320a79a-376d-b137-3fb6-1394bd9614d5" class="filter_button">
                    <div class="text-block-78">
                       Add New Page
                    </div>
                </div>
                </a>
            </div>
            <a href="logout.php" class="admin_logout w-button"></a></div>
    </div>
    <div class="section_content">
        <div class="bookings">
            <?php

            include '../connect.php';

            $sql = "SELECT ms.id as medical_sid, visit_name, body_text, image, ms.status, ms.name
  FROM visit vs
  JOIN medical_specialty ms ON ms.id=vs.specialty_id";
            $result = mysqli_query($conn, $sql);
            while($rows = mysqli_fetch_array($result)){
                $medical_sid = $rows['medical_sid'];
                $visit_name = $rows['name'];
                $mds_status = $rows['status'];

                $visit_pic = 'empty.jpg';
                if (!empty($rows['image'])){
                    $visit_pic = $rows['image'];
                }
                ?>
                <div style="-webkit-transform:translate3d(0, 30%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(5DEG) skew(0, 0);-moz-transform:translate3d(0, 30%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(5DEG) skew(0, 0);-ms-transform:translate3d(0, 30%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(5DEG) skew(0, 0);transform:translate3d(0, 30%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(5DEG) skew(0, 0);opacity:0" class="bookingcard">
                    <div class="booking_patent_image" style=" background-image: url('/assets/visit_images/<?PHP echo $visit_pic; ?>?v=2'); overflow:hidden; position:relative;"></div>
                    <div class="booking_details">
                        <div class="top">
                            <h1 class="heading-24"><?PHP echo substr($visit_name, 0, 30);
                            if (strlen($visit_name) > 30){echo '...';}
                            ?> <span class="float-r"><div class="approved_tick"><img src="../images/Path-210.svg" width="13" alt="" class="image-26"></div></span></h1>
                            <?php
                            if ($mds_status == 'Y'){
                            ?>
                            
                           <?php }?>
                            <div class="div">
                                <a href="/admin/create-lp.php?mdsid=<?php echo $medical_sid;?>" class="open_booking w-button bg-color">Modifica</a>
                                <a href="/visite-ed-esame/landing-page.php?mds=<?php echo $visit_name;?>" target="_blank" class="button visite_cta w-button">Vedi dettagli</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } mysqli_close($conn);?>
        </div>
        <div class="end-of-the-list">
            <div class="line-2"></div>
            <div id="w-node-aeddfed5e09f-22dd9875" class="text-block-70">Non ci sono più profili da visualizzare.</div>
            <div class="line-2"></div>
        </div>
    </div>
    <div class="menu_current w-embed w-script">
        <script type="text/javascript">
            $(document).ready(function(){
                $('.admin_item:nth-child(7)').addClass('current');
            });

        </script>
    </div>
</div>
<div style="-webkit-transform:translate3d(-100%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(-100%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(-100%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(-100%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0)" class="preloader diff">
    <div style="opacity:0" class="loader diff">
        <div data-w-id="d47db303-519a-8b1c-faa2-841108655663" data-animation-type="lottie" data-src="https://uploads-ssl.webflow.com/5d8cfd454ebd737ac1a48727/5df92a8de51cd1d00a86eb51_lottieflow-loading-04-2-00285C-easey.json" data-loop="1" data-direction="1" data-autoplay="1" data-is-ix2-target="0" data-renderer="svg" data-default-duration="1.7916666666666667" data-duration="0" class="lottie-animation-2"></div>
    </div>
</div>
<script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.4.1.min.220afd743d.js" type="text/javascript" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="../js/admin/webflow.js" type="text/javascript"></script>
<!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
<div id="fb-root"></div>
<script async="" defer="" crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v4.0"></script>
</body>
</html>