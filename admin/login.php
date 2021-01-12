<?php session_start();
  if(isset($_SESSION['adminlogin']))
  {
    header("Location: /admin"); 
  } 
?>
<!DOCTYPE html>
<html data-wf-page="5dfbca93dac9922f74dd9864" data-wf-site="5d8cfd454ebd737ac1a48727">
<head>
  <meta charset="utf-8">
  <title>Login</title>
  <meta content="Login" property="og:title">
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
	.p{
  	text-align-last: center !important;
  }
</style>
  <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
  <style>
	*:focus{
  	outline:none;
    border:none;
  }
</style>
  <script>
$(document).ready(function(){
	$('#load').click(function(){
	 var location = '/admin/';
   setTimeout(function(){window.location.href=location},1200)
});
});
</script>

<!-- login -->
<script>
  function login(){
    var id = document.getElementById("name").value;
    var pwrd = document.getElementById("password").value;
    var xmlhttp2 = new XMLHttpRequest();
    xmlhttp2.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        if(this.responseText == 'Yes'){
          document.getElementById('load').click();
        } else {
          document.getElementById("result").innerHTML = this.responseText;
        }
        
      }
    };
    xmlhttp2.open("GET", "adminlogin.php?id=" + id +"&pwrd=" + pwrd, true);
    xmlhttp2.send();
  }
</script>

</head>
<body class="body-10">
  <div class="admin_login">
    <div data-w-id="de04929c-4992-d7c3-efa5-fc35743a5115" style="-webkit-transform:translate3d(0, 10%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, 10%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, 10%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, 10%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);opacity:0" class="admin_login_container">
      <div class="logo"></div>
      <div class="heading">
        <div class="text-block-74">Admin Panel</div>
        <div class="text-block-76">v2.0</div>
      </div>
      <div class="admin_login_from_container">
        <div class="w-form">
          <form id="email-form" name="email-form" data-name="Email Form" class="form-5 sad">
            <input type="text" class="text-field-3 proff w-input" autofocus="true" maxlength="256" name="name" data-name="Name" placeholder="Username" id="name" required="">
            <input type="password" class="text-field-3 proff w-input" maxlength="256" name="email" data-name="Email" placeholder="Password" id="password" required="">
            <input type="submit" value="Login" class="button-5 admin_login_button w-button" onClick="login()">
            <a id="load" data-w-id="796dc940-4909-060d-1e05-9d48138dc8f0" href="#" class="button-13 w-button">a</a>
          </form>
        </div>

        <div id="result"></div>
        </div>

      </div>
    </div>
  </div>

  <div style="-webkit-transform:translate3d(-100%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(-100%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(-100%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(-100%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0)" class="admin_side_panel fake">
    <div class="topsection">
      <div class="menubutton">
        <div data-w-id="370d1822-644a-01d3-77ab-3674407e4918" data-animation-type="lottie" data-src="https://uploads-ssl.webflow.com/5d8cfd454ebd737ac1a48727/5df8d5b6f7fac981eeddb5a6_lottieflow-menu-nav-07-ffffff-easey.json" data-loop="0" data-direction="1" data-autoplay="0" data-is-ix2-target="1" data-renderer="svg" data-default-duration="2.4791666666666665" data-duration="2.4791666666666665" class="lottie-animation"></div>
        <div class="admin_item_text">
          <div class="text-block-77">Close</div>
        </div>
      </div>
    </div>
    <div class="admin_item_menu">
      <div class="admin_item current"><img src="../images/icon.svg" width="21" alt="" class="menu_icon">
        <div class="admin_item_text">
          <div class="text-block-77">Applications</div>
        </div>
      </div>
      <div class="admin_item"><img src="../images/bookmark-regular.svg" width="20" alt="" class="menu_icon">
        <div class="admin_item_text">
          <div class="text-block-77">Bookings</div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.4.1.min.220afd743d.js" type="text/javascript" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script src="../js/admin/webflow.js" type="text/javascript"></script>
  <!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
  <div id="fb-root"></div>
  <script async="" defer="" crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v4.0"></script>
</body>
</html>

