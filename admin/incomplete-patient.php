<?php session_start();
if(!isset($_SESSION['adminlogin']))
{
  header("Location: login.php");
}
?>
<!DOCTYPE html>
<html data-wf-page="5dfbca93dac992df80dd982b" data-wf-site="5d8cfd454ebd737ac1a48727">
<head>
<meta charset="utf-8">
<title>Prenotazioni in sospeso</title>
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
.mt-240{
	margin-top:240px;}

@media screen and (max-width: 767px) {
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
.mt-240{
	margin-top:200px;}
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

    .status_btn{
        margin-left: 20px;
        font-weight: bold;
        border-bottom: 1px solid rgb(0 40 92 / 10%);
        background-color: #dddddd;
        padding: 10px 10px;
        border-top: none;
        border-right: none;
        border-left: none;
        border-radius: 5px;
    }
</style>
</head>
<body class="body-14">
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
    <h1 class="admin_section_heading">Prenotazioni in sospeso</h1>
    <div class="div-block-70">
      <div class="scroll_indicator">
        <div data-w-id="98c7cd18-996f-4b08-777e-ae54e6517910" data-animation-type="lottie" data-src="https://uploads-ssl.webflow.com/5d8cfd454ebd737ac1a48727/5df9f0f25ccbf3bb4c727941_lottieflow-scrolling-01-1-00285C-easey.json" data-loop="0" data-direction="1" data-autoplay="0" data-is-ix2-target="1" data-renderer="svg" data-default-duration="2.76" data-duration="0" class="lottie-animation-3"></div>
      </div>
      <div id="add">
        <div class="search home">
          <div class="form-block w-form">
            <form id="Search_form" name="email-form" action="javascript:;" method="get" class="form">
              <input type="text" class="text-field homapge w-input" autocomplete="off" maxlength="256" name="search" data-name="Name 2" placeholder="Ricerca email o codice fiscale" id="name-2" required="">
              <input type="button" value="Search" class="submit-button homepage w-button">
            </form>
          </div>
        </div>
      </div>
    </div>
    <a href="logout.php" class="admin_logout w-button"></a></div>
    <div class="section_content mt-240" >
  <div class="applications">
    <div class="doctors_block">
      <?php

        include '../connect.php';
        $sql = "select * from temprary_patient order by dor DESC";
        $result = mysqli_query($conn, $sql);
        while($rows = mysqli_fetch_array($result)){
          $patient_id = $rows['patient_id'];
          $fname = $rows['first_name'];
          $lname = $rows['last_name'];
          $email = $rows['email'];
          $fiscal_code = $rows['fiscale'];
          $caller_name = $rows['caller_name'];
          $dor = strtotime($rows['dor']);

          ?>
      <div class="regi_doctor_card">
        <div class="regi_doctor_image"><img src="/images/Group-556.jpg" alt="" class="image-24"></div>
        <div class="div-block-65">
          <div id="w-node-cf99e8f702f8-80dd982b" class="regi_name_block">
            <div class="text-block-68"><?PHP echo ucwords($fname)." ".ucwords($lname); ?></div>
              <div class="status_btn">Salvato</div>
          </div>
          <div class="div-block-66">
            <div class="regi_data">Nome contatto</div>
            <div class="regi_value"><?PHP echo $caller_name; ?></div>
          </div>
          <div class="div-block-67">
            <div class="regi_data">Codice Fiscale</div>
            <div class="regi_value fasic-text"><?PHP echo $fiscal_code; ?></div>
          </div>
          <div class="div-block-66">
            <div class="regi_data">Email</div>
            <div class="regi_value email-text"><?PHP echo $email; ?></div>
          </div>
          <div class="div-block-67">
            <div class="regi_data">Data Registrazione</div>
            <div class="regi_value"><?php echo date("d F Y", $dor);?></div>
          </div>
        </div>
        <div id="w-node-cf99e8f70307-80dd982b" class="regi_button_container">
          <div id="w-node-cf99e8f70308-80dd982b"> <a href="/admin/patient-register.php?icp=<?php echo $patient_id?>" class="button-10 w-button">Riprendi prenotazione</a></div>
        </div>
      </div>
      <?php } mysqli_close($conn);?>
    </div>
    <div class="end-of-the-list">
      <div class="line"></div>
      <div id="w-node-0e7522d67d94-80dd982b" class="text-block-70">Non ci sono più profili da visualizzare.</div>
      <div class="line"></div>
    </div>
  </div>
</div>
</div>
<div class="menu_current w-embed w-script"> 
  <script>
      $(document).ready(function(){
        $('.admin_item:nth-child(5)').addClass('current');
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