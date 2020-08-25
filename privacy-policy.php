<?php session_start(); ?>

<!DOCTYPE html>
<html data-wf-page="5daa262de3e3f057961af312" data-wf-site="5d8cfd454ebd737ac1a48727">
<head>
  <meta charset="utf-8">
  <title>Privacy Policy</title>
  <meta content="Team" property="og:title">
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
 <link href="css/new-styles.css?v=3" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
  <script src="https://kit.fontawesome.com/3f12b8b553.js" crossorigin="anonymous"></script>
  <script>
  function get_visit_Doctors(str) {
          if (str.length == 0) {
            document.getElementById("txtHint").innerHTML = "";
            return;
          } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
              if (this.readyState == 4 && this.status == 200) {
                document.getElementById("doctor_details").innerHTML = this.responseText;
              }
            };
            xmlhttp.open("GET", "/visite-ed-esame/get_doctor_details.php?q=" + str, true);
            xmlhttp.send();
          }     
                        
        }
</script>
  <style>
::-webkit-scrollbar {
  width: 0px;
  height:0px;
}
	.p{
  	text-align-last: center !important;
  }
  .privacy_policy{
    overflow: hidden;
  width: 100%;
  height: 110vh;
  border: 1px none #000;
  }
</style>
</head>
<body class="body-7">
  <?php include 'header.php';?>
  <div class="masthead" style="min-height:40vh !important;">
    <div class="custom_container masthead_content_container service" >
      <div class="div-block-52">
        <h1 class="heading-4">Privacy Policy</h1>
      </div>
      
    </div>
  </div>
  <section class="section-8" style="padding-top:30px !important; padding-bottom:0px !important;">
    <iframe class="privacy_policy" src="https://www.iubenda.com/privacy-policy/72861989"></iframe>
  </section>
  <?php include 'footer.php';?>
  <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.4.1.min.220afd743d.js" type="text/javascript" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script src="js/webflow.js" type="text/javascript"></script>
  <!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
  <div id="fb-root"></div>
  <script async="" defer="" crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v4.0"></script>
  <script>
    $(document).ready(function(){
      $('.professionist_image_container img').each(function(){
        var src = $(this).attr('src');
        if(src == 'professionisti/photo/default.jpg'){          
          $(this).attr('src','images/Group-556.jpg');
        }
      });      
    });
  </script>
  <?php include ("google_analytic.php")?>
</body>
</html>