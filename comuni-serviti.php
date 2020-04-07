<?php session_start(); ?>

<!DOCTYPE html>
<html data-wf-page="5daa262de3e3f020c21af313" data-wf-site="5d8cfd454ebd737ac1a48727">
<head>
  <meta charset="utf-8">
  <title>Comuni Serviti</title>
  <meta content="Communi Serviti" property="og:title">
  <meta content="width=device-width, initial-scale=1" name="viewport">
  <meta content="Webflow" name="generator">
  <link href="css/normalize.css" rel="stylesheet" type="text/css">
  <link href="css/webflow.css" rel="stylesheet" type="text/css">
  <link href="css/mobidoc.webflow.css" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script>
  <script type="text/javascript">WebFont.load({  google: {    families: ["Montserrat:100,100italic,200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic","Poppins:100,100italic,200,300,300italic,regular,500,600,700,800,900","PT Serif Caption:regular"]  }});</script>
  <!-- [if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js" type="text/javascript"></script><![endif] -->
  <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script>
  <link href="images/favicon.png" rel="shortcut icon" type="image/x-icon">
  <link href="images/webclip.png" rel="apple-touch-icon">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
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
</head>
<body class="body-4">
  <?php include 'header.php';?>
  <div class="masthead communi_serviti">
    <div class="custom_container masthead_content_container service comm_seriti">
      <div>
        <h1 class="heading-4 diff">Copertura Servizi Mobidoc</h1>
      </div>
    </div>
  </div>
  <section class="section-3 com_servitit">
    <div class="custom_container">
      <div class="content_grid">
        <h2 class="heading-2">Copertura Servizi Mobidoc</h2>
        <p class="paragraph-14">I professionisti di Mobidoc sono entrati a fare parte del team grazie alla Loro esperienza e competenza e perchè sin da subito hanno creduto che la Loro professionalità potesse essere messa a disposizione di chi soffre non solo nel proprio ambulatorio o in ospedale ma anche a casa del paziente realizzando in questo modo una vera rete assistenziale coordinata dove il paziente è sempre al centro dell’attenzione.</p>
      </div>
      <div class="w-embed">
        <style>
	.number_data{
  		background: -webkit-linear-gradient(#0CD9ED, #00285C) !important;
  		-webkit-background-clip: text !important;
  		-webkit-text-fill-color: transparent !important;
  }
</style>
      </div>

      <?php
		include 'connect.php';
		$doctor = "select * from doctor_profile";
    $doctor_result = mysqli_query($conn, $doctor);
    $doctor_count = mysqli_num_rows($doctor_result);

    $visit = "select DISTINCT visit_name from doctor_visit";
    $visit_result = mysqli_query($conn, $visit);
    $visit_count = mysqli_num_rows($visit_result);

    $comune = "select DISTINCT cap from doctor_cap";
    $comune_result = mysqli_query($conn, $comune);
    $comune_count = mysqli_num_rows($comune_result);
    ?>
    
      <div class="feature_container diff">
        <div class="feature-2">
          <h1 class="number_data"><?php echo $visit_count?>+</h1>
          <div class="feature_label light odd">Tipologie di Visite Offerte</div>
        </div>
        <div class="feature-2">
          <h1 class="number_data"><?php echo $comune_count?>+</h1>
          <div class="feature_label light odd">Comuni</div>
        </div>
        <div class="feature-2">
          <h1 class="number_data"><?php echo $doctor_count?>+</h1>
          <div class="feature_label light odd">Professionisti Iscritti</div>
        </div>
      </div>
    </div>
  </section>
  <div data-w-id="ef8d466a-1673-f5d3-4dd6-85fe50249372" class="section-10">
    <div class="w-embed">
      <style>
		.professionist_header{
    	backdrop-filter: blur(10px);
    }
</style>
    </div>

    <div data-w-id="e2f55d1b-28d2-fdb6-c786-61284e9e5134" class="div-block-14">
      <div class="professionist_header comm_seriti">
        <h2 class="heading-2">Lista Comuni Serviti</h2>
        <div class="search_doctor" style="display:none;">
          <div class="form-block w-form">
            <form id="Search_form" name="email-form" data-name="Email Form" class="form"><input type="text" class="text-field team w-input" autocomplete="off" maxlength="256" name="name-2" data-name="Name 2" placeholder="Ricerca Comune o CAP" id="name-2" required=""><input type="submit" value="Search" data-wait="Search" class="submit-button w-button"></form>
            <div class="w-form-done"></div>
            <div class="w-form-fail"></div>
          </div>
        </div>
        <div data-w-id="5bc18bf0-a65f-4c3f-1ce8-7fa25d10bea6" class="scroller">
          <div data-w-id="a367f146-23a3-5a49-9236-3ff42d778a98" class="scroller_thumb2"></div>
        </div>
      </div>
    </div>
    <div class="area_container">
    <?php 
    include 'connect.php'; 

    $sql = "select DISTINCT comune, cap, province from doctor_cap";
    $result = mysqli_query($conn, $sql);
    
    while($row = mysqli_fetch_array($result)){
      $comune = $row['comune'];
      $province = $row['province'];
      $cap = $row['cap'];
    ?>

      <div class="area_card">
        <div>
          <div class="area_name_container">
            <div class="bullets"></div>
            <div class="area_name" style="font-size:18px;"><?php echo $comune;?> (<?php echo $province;?>)</div>
          </div>
          <div class="area_code"><?php echo $cap;?></div>
        </div>
      </div>

      <?php }?>

    </div>
  </div>
  <div data-w-id="318a2e9e-dd23-8df2-52cb-34dabe4c81a1" class="section-11">
    <div class="map_container">
      <div class="map_code w-embed w-iframe"><iframe src="https://snazzymaps.com/embed/188234" width="100%" height="100%" style="border:none;"></iframe></div>
    </div>
  </div>
  <?php include 'cta_cards.php';?>
  <?php include 'footer.php';?>
  <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.4.1.min.220afd743d.js" type="text/javascript" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script src="js/webflow.js" type="text/javascript"></script>
  <!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
  <div id="fb-root"></div>
  <script async="" defer="" crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v4.0"></script>
</body>
</html>
