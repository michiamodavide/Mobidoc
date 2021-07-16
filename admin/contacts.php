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
<title>Contatti</title>
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
	.width-btn{
		width: 236px;
	}
/*********************************/	 

@media only screen and (max-width: 767px) {
	
	.glance_details_value {
    font-size: 12px;
  
}
	
.font-78 {
    text-align: center;
    font-size: 12px;
	}
    
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
    .filter_button{
        padding-right: 20px;
        padding-left: 20px;
    }
</style>
<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function(){
      $('.filter_options a').click(function(e){
	      var location = $(this).attr('href');
        e.preventDefault();
        setTimeout(function(){window.location.href=location},400);
      });

      $('.top a').click(function(e){
	      var location = $(this).attr('href');
        e.preventDefault();
        setTimeout(function(){window.location.href=location},450);
      });
    });
  </script>
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
    <h1 class="admin_section_heading">Contatti</h1>
    <div class="div-block-70">
      <div class="scroll_indicator">
        <div data-w-id="98c7cd18-996f-4b08-777e-ae54e6517910" data-animation-type="lottie" data-src="https://uploads-ssl.webflow.com/5d8cfd454ebd737ac1a48727/5df9f0f25ccbf3bb4c727941_lottieflow-scrolling-01-1-00285C-easey.json" data-loop="0" data-direction="1" data-autoplay="0" data-is-ix2-target="1" data-renderer="svg" data-default-duration="2.76" data-duration="0" class="lottie-animation-3"></div>
      </div>
        <div class="filter">
            <a href="add-contact.php" style="text-decoration: none;color: black">
            <div data-w-id="7320a79a-376d-b137-3fb6-1394bd9614d5" class="filter_button width-btn">
                <div class="text-block-78 font-78">
                    Aggiungi Nuovo Contatto
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
        
        $sql = "select * from contact_profile order by id DESC";
        $result = mysqli_query($conn, $sql);
        while($rows = mysqli_fetch_array($result)){

          $contact_name = $rows['name']." ".$rows['surname'];
          $contact_email = $rows['email'];
          $contact_phone = $rows['phone'];
          $contact_id = $rows['id'];
          $privacy_consent = $rows['privacy_consent'];
          $marketing_consent = $rows['marketing_consent'];
        ?>
      <div style="-webkit-transform:translate3d(0, 30%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(5DEG) skew(0, 0);-moz-transform:translate3d(0, 30%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(5DEG) skew(0, 0);-ms-transform:translate3d(0, 30%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(5DEG) skew(0, 0);transform:translate3d(0, 30%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(5DEG) skew(0, 0);opacity:0" class="bookingcard">
        <div class="booking_patent_image" style=" background-image: url('<?PHP echo $patient_pic; ?>'); overflow:hidden; position:relative;">
        </div>
        <div class="booking_details">
          <div class="top">
            <h1 class="heading-24"><?PHP echo $contact_name; ?></h1>
          </div>
          <div class="bottom">
            <div class="glance_details">
              <div class="glance_details_title">Email</div>
              <div class="glance_details_value" style="line-height:25px;"><?PHP echo $contact_email; ?></div>
            </div>
              <div class="glance_details" style="margin-left: 20px">
                  <div class="glance_details_title">Telefono</div>
                  <div class="glance_details_value" style="line-height:25px;"><?PHP echo $contact_phone; ?></div>
              </div>
              <?php
              if ($privacy_consent == 'Y'){
                  $is_check = 'checked';
              }else{
                  $is_check = '';
              }
              ?>
              <div class="glance_details">
                  <div class="glance_details_title" style="font-size: 14px">
                      <input type="checkbox" <?php echo $is_check?> class="privacy_consent lable2" id="privacy_consent" name="privacy_consent" value="<?=$privacy_consent?>" data-id="<?=$contact_id?>">
                      <label for="privacy_consent">Consenso Privacy</label>
                  </div>
                  <br>
              </div>

              <?php
              if ($marketing_consent == 'Y'){
                  $is_check1 = 'checked';
              }else{
                  $is_check1 = '';
              }
              ?>
              <div class="glance_details">
                  <div class="glance_details_title" style="font-size: 14px">
                      <input type="checkbox" <?php echo $is_check1?> class="marketing_consent lable2" id="marketing_consent" name="marketing_consent" value="<?=$marketing_consent?>" data-id="<?=$contact_id?>">
                      <label for="marketing_consent">Marketing Consenso</label>
                  </div>
                  <br>
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
  	$('.admin_item:nth-child(2)').addClass('current');
  });

    $('.marketing_consent, .privacy_consent').click(function () {
        var checkbox_val = $(this).val();
        var checkbox_id = $(this).attr("id");
        var contact_id = $(this).attr("data-id");
        if (checkbox_val == 'Y') {
            var checkbox_val_new = 'N';
            $(this).val(checkbox_val_new);
        } else {
            var checkbox_val_new = 'Y';
            $(this).val(checkbox_val_new);
        }

        $.ajax({
            url: "update_contact.php",
            type: "post",
            data: {contact_id: contact_id, checkbox_val: checkbox_val_new, checkbox_id: checkbox_id},
            success: function (response) {
                if (response == 'true') {
                    // do not anything
                 } else {
                   alert("There is error in DB");
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
        });

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