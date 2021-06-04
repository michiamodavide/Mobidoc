<?php session_start();
if (!isset($_SESSION['adminlogin'])) {
    header("Location: login.php");
}

include '../connect.php';

$show_bar = 1;
$medical_sname = 'Create New LP';
$up_img_name = 'Immagine LP';
$page_description = '';
$medi_name = '';
if (isset($_GET['mdsid']) && !empty($_GET['mdsid'])){
    $get_visit_sql = "SELECT * FROM visit WHERE specialty_id = '".$_GET['mdsid']."'";
    $get_visit_result = mysqli_query($conn, $get_visit_sql);
    $get_visit_row = mysqli_fetch_array($get_visit_result);

    $show_bar = 0;
    $mds_speciality_id = $_GET['mdsid'];
    $medical_sname = $medi_name = $get_visit_row['visit_name'];
    $up_img_name = $get_visit_row['image'];
    $page_description = $get_visit_row['body_text'];
}
?>
<!DOCTYPE html>
<html data-wf-page="5dfbca93dac992df80dd982b" data-wf-site="5d8cfd454ebd737ac1a48727">
<head>
    <meta charset="utf-8">
    <title>Landing Page</title>
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

		.select-style{
			background: #ebeef2;
			padding: 20px;
    border-radius: 7px;
			border: none;
			width: 100%;
		}
	
		.div-1{
			display:block;
			
			float: left;
			width: 86.3%;
			
			margin-left: 2.5%;
			
		}
		.div-2{
			display:block;
			
			float: left;
			width: 11.2%;
			text-align: right !important;
			
		}
		.m-0-auto{
			margin:30px auto 0 auto !important;
		}
		.div-3{width: 100%;text-align: center !important; margin-top: 30px;}
		
		.bg-color {
    background-color: #f8dbdb;
    color: #00285c;
			
			
}
		.m-t-30{
			margin-top:30px;
		}
		/**************************************************************************/
	@media screen and (max-width: 1600px) {	
		
		.div-2 {
    
    width: 14.5%;
    
}
		.div-1 {
   
    width: 83%;
    
}
		}		
	@media screen and (max-width: 1440px) {	
		
		.div-2 {
    
    width: 15.5%;
    
}
		.div-1 {
   
    width: 82%;
    
}
		}		
		
			@media screen and (max-width: 1366px) {	
		
		.div-2 {
    
    width: 17%;
    
}
		.div-1 {
   
    width: 80%;
    
}
		}
	@media screen and (max-width: 1280px) {	
		
		.div-2 {
    
    width: 17%;
    
}
		.div-1 {
   
    width: 80%;
    
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
			
			
			
			.div-1{
			display:block;
			
			float: none;
			width: 100%;
			margin-top: 4%;
			margin-left: 0%;
			
		}
		.div-2{
			display:block !important;
			margin: 0px auto 0 auto;
			float: none;
			width: 80%;
			text-align: right !important;
			
		}
		.div-3{width: 100%;text-align: center !important; margin-top: 30px;}
			.div-block-35 {
    display: -webkit-block;
    display: -webkit-block;
    display: -ms-block;
    display: block;
      margin-bottom: 0px;
}
			.text-block-33 {
    margin-left: 0px;
}
			.profile_image_container.proff {
   
    margin: 0 auto;
}
			
        }
		
		
		
		
		
		
        .profile_image_container{
            border-radius: 0px;
        }
		
    </style>
</head>
<body class="body-14">
<div>
    <?php include("admin_side_bar.php") ?>
</div>
<div class="admin_main_section">
    <div data-w-id="671d7027-6f87-1c3f-c474-3b17f4b83b06" class="admin_section_header">
        <h1 class="admin_section_heading"><?=$medical_sname?></h1>
        <div class="div-block-70">
            <div class="scroll_indicator">
                <div data-w-id="98c7cd18-996f-4b08-777e-ae54e6517910" data-animation-type="lottie"
                     data-src="https://uploads-ssl.webflow.com/5d8cfd454ebd737ac1a48727/5df9f0f25ccbf3bb4c727941_lottieflow-scrolling-01-1-00285C-easey.json"
                     data-loop="0" data-direction="1" data-autoplay="0" data-is-ix2-target="1" data-renderer="svg"
                     data-default-duration="2.76" data-duration="0" class="lottie-animation-3"></div>
            </div>
            <a href="logout.php" class="admin_logout w-button"></a></div>
    </div>

    <div class="section_content">
        <div class="applications">
            <div class="doctors_block">
                <div class="regi_doctor_card" style="display: block;">
                    <?php if (isset($_GET['sb']) && $_GET['sb'] == 1){?>
                        <p class="visit_err" style="color: green">New page not added.</p>
                    <?php }?>

                    <?PHP
                    if(isset($_POST['submit']))
                    {

                        include '../connect.php';


                        $medi_id = mysqli_real_escape_string($conn, $_POST['medical_speciality']);
                        $page_des = mysqli_real_escape_string($conn, $_POST['page_des']);
                        $mds_name = mysqli_real_escape_string($conn, $_POST['mds_name']);


                        if($_FILES["upload-image"]["error"] == 0 && !empty($_FILES["upload-image"]["name"])) {
                            $target_file = $_FILES["upload-image"]["name"];
                            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                            $save_img_name = "mds".$medi_id.'.'.$imageFileType;
                            $upload_img_path = "../assets/visit_images/".$save_img_name;
                            move_uploaded_file($_FILES["upload-image"]["tmp_name"],$upload_img_path);
                            $lp_img = $save_img_name;
                        }else{
                            if (isset($_POST['old_img']) && !empty(isset($_POST['old_img']))) {
                                $lp_img = $_POST['old_img'];
                            }else{
                                $lp_img = '';
                            }

                        }

                        if (isset($_POST['old_img'])){
                            $sql_n1 = "update visit set body_text='$page_des', image='$lp_img' where specialty_id = '$medi_id'";

                        }else{
                            $sql_n1 = "insert into visit (specialty_id, visit_name, body_text, image) values('".$medi_id."', '".$mds_name."', '".$page_des."', '".$lp_img."')";

                        }
                        $result_n1 = mysqli_query($conn, $sql_n1);

                        if($result_n1==1)
                        {
                            if (isset($_POST['old_img'])){
                                echo "<script>window.location = '/admin/landing-pages.php'</script>";
                            }else{
                                $sql_n12 = "update medical_specialty set lp_created = 'Y' where id='".$medi_id."'";
                                $result_n12 = mysqli_query($conn, $sql_n12);

                                if($result_n12==1){
                                    echo "<script>window.location = '/admin/landing-pages.php'</script>";
                                }else{
                                    echo "<script>window.location = '/admin/create-lp.php?sb=1'</script>";
                                }
                            }

                        }else{
                            echo "<script>window.location = '/admin/create-lp.php?sb=1'</script>";
                        }

                        mysqli_close($conn);
                    }

                    ?>

                    <form class="lp_form " action="create-lp.php" name="email-form" method="post" enctype="multipart/form-data">
						 <input type="hidden" name="mds_name" class="mds-name" value="<?=$medi_name?>">
                        <?php
                        if ($show_bar == 1){
                        ?>
                        <select class="medical_speciality select-style" name="medical_speciality" id="medical_speciality">
                            <option value="">Chose Medical Speciality</option>
                            <?php
                            include '../connect.php';

                            $sql = "SELECT * FROM medical_specialty where lp_created = 'N' ORDER BY name ASC";
                            $result = mysqli_query($conn, $sql);
                            while ($rows = mysqli_fetch_array($result)) {
                                $mds_id = $rows['id'];
                                $mds_name = $rows['name'];
                                ?>
                                <option mds_name="<?=$mds_name?>" value="<?=$mds_id?>"><?=$mds_name?></option>
                                <?php
                            }
                            mysqli_close($conn);
                            ?>
                        </select>
                        <?php
                        }else{
                        ?>
                            <input type="hidden" name="old_img" class="old_img" value="<?=$up_img_name?>">
                            <input type="hidden" name="medical_speciality" class="medical_speciality" value="<?=$mds_speciality_id?>">
                        <?php }?>
						<div class="div-2">  <div class="div-block-35 m-t-30">
							
							
                            <div class="profile_image_container proff" id="profile_image">
                                <div id="dp" style="width:100%; height:100%; background: url(/assets/visit_images/<?=$up_img_name?>) center center / cover no-repeat; background-position:center; background-size:cover; cursor: pointer"></div>
                            </div>
                            <div class="text-block-33"><?=$up_img_name?></div>
							
							
                            <br>
                            <input type="file" class="upload_image" style="display:none;" name="upload-image" accept="image/*"
                                   onchange="readURL(this);" value="<?=$up_img_name?>">
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
                                            } else {
                                                $('.text-block-33').html("Immagine LP");
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
						<div class="div-1">
						
						
							<textarea placeholder="Page Description" maxlength="10000" id="page_des" name="page_des" class="text_area_profile page_des w-input"><?=$page_description?></textarea>
						</div>
						
						
						
						
                       

                      
						
						
						
						
						
						
						
                        

                        <div class="div-3">
                        <input type="submit" name="submit" value="Invia" id="submit_profile" class="button gradient login_button register w-button submit_profile_btn m-0-auto">

                        <div class="error_container">
                            <div class="error_message medical_speciality_msg" style="display: none">
                                <div class="text-block-30">Please Chose any Medical Speciality.</div>
                            </div>
                        </div>
							</div>
                    </form>
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

</div>

<script type="application/javascript">

    var show_bar = '<?php echo $show_bar?>';
    if (show_bar == 1){
        $('#submit_profile').click(function(){
            var mds_seleced = $(".medical_speciality").val();
            $(".mds-name").val($(".medical_speciality option:selected").attr("mds_name"));
            if (mds_seleced){
                return true;
            } else {
                $('.medical_speciality_msg').addClass("error_show").css("display", "inline");
                return false;
            }

        });
    }

    $(".regi_doctor_card").on("click", function () {
       $(".visit_err").css("display", "none")
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