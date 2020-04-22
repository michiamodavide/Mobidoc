<!DOCTYPE html>

<?php session_start(); 
if(isset($_SESSION['paziente_email'])){
	header("Location: /paziente/account.php");
}
$t1="";
$t2="";
if(isset($_SESSION['t1'])){
//echo $_SESSION['t1']." ".$_SESSION['t2'];
$t1=$_SESSION['t1'];
$t2=$_SESSION['t2'];
}
?>
<!--  This site was created in Webflow. http://www.webflow.com  -->
<!--  Last Published: Fri Nov 01 2019 17:31:02 GMT+0000 (UTC)  -->
<html data-wf-page="5daa262de3e3f0dd921af31a" data-wf-site="5d8cfd454ebd737ac1a48727">
<head>
  <meta charset="utf-8">
  <title>login</title>
  <meta content="login" property="og:title">
  <meta content="width=device-width, initial-scale=1" name="viewport">
  <meta content="Webflow" name="generator">
  <link href="../css/normalize.css" rel="stylesheet" type="text/css">
  <link href="../css/webflow.css" rel="stylesheet" type="text/css">
  <link href="../css/mobidoc.webflow.css" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script>
  <script type="text/javascript">WebFont.load({  google: {    families: ["Montserrat:100,100italic,200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic","Poppins:100,100italic,200,300,300italic,regular,500,600,700,800,900","PT Serif Caption:regular"]  }});</script>
  <!-- [if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js" type="text/javascript"></script><![endif] -->
  <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script>
  <link href="../images/favicon.png" rel="shortcut icon" type="image/x-icon">
  <link href="../images/webclip.png" rel="apple-touch-icon">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
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
  <style>
/* Kill the blink/flickering */
.forms_container {
    -webkit-backface-visibility: hidden;
    -webkit-transform: translateZ(0) scale(1.0, 1.0);
    transform: translateZ(0);
}
</style>
</head>
<body>
<?php include '../header.php';?>
  <div class="masthead login">
    <div class="masthead_container login">
      <div class="div-block-31">
        <a href="/" style="text-decoration:none; color:#fff;"><div><img src="/images/back_bc.svg">&nbsp;&nbsp; Indietro</div></a><br>
        <h1 class="heading-9">Login</h1>
        <p>Registrati ed effettua il Login per <br>accedere a tutti i servizi Mobidoc</p>
      </div>
      <div class="login_form_container">
        <div class="form_parent_container">
          <div data-w-id="0519d48f-fd8c-3004-c5b2-f235eaac07c1" style="-webkit-transform:translate3d(0%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0)" class="forms_container w-clearfix">
            <div class="login_form w-clearfix w-form">
              <form id="email-form" name="email-form" data-name="Email Form" class="form-4"  action="login2.php" method="post">
                <input type="email" class="text-field-3 w-input" autocomplete="off" maxlength="256" name="email" data-name="email" placeholder="Email" id="email" required="">
                <input type="password" class="text-field-4 w-input" maxlength="256" name="pwrd" data-name="pwrd" placeholder="Password" id="pwrd" required="">
                <div class="check_box_container"><label class="w-checkbox checkbox-field"><div class="w-checkbox-input w-checkbox-input--inputType-custom checkbox"></div><input type="checkbox" id="checkbox" name="checkbox" data-name="Checkbox" style="opacity:0;position:absolute;z-index:-1"><span class="checkbox-label diff w-form-label">Ricordami</span></label>
                  <div data-w-id="ce795bff-89ab-9d98-befb-1f98b8c41d3c" class="forgot_pwrd">
                    <div class="text-block-26">Password Dimenticata ?</div>
                  </div>
                </div><input type="submit" value="Login" data-wait="Loggin In . . ." class="button gradient login_button w-button">
                <div class="text-block-28">o</div><a href="../paziente/register.php" class="register_link"><span class="register_link">Registrati  </span></a>
                <div class="text-block-27">per continuare.</div>
                <div class="error_message">
                  <div class="text-block-30">La password o il nome utente sono errati. Si prega di controllare i dettagli inseriti.</div>
                </div>
              </form>
              
            </div>
            <div class="forgot_pwrd_form w-form">
              <form id="email-form-2" name="pwrd_resett"  class="form-3" action="password-reset.php" method="post">
                <div>
                  <img src="../images/Group-554.svg" width="29" data-w-id="0924a504-2bbd-1fad-74d1-d3614219485c" alt="" class="image-8">
                  <label for="email-2" class="field-label">Inserisci la tua email per cambiare password</label>
                  <input type="email" class="text-field-6 forgot_email proff w-input" maxlength="256" name="email" data-name="Email 2" placeholder="Email" id="email-2" required="">
                  <input type="submit" value="Invia" data-wait="Please wait..." class="button-9 gradient login_button w-button">
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="text-block-29">Per assistenza chiama il  <span class="text-span-3">335 77 988 44</span></div>
      </div>
    </div>
  </div>
  <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.4.1.min.220afd743d.js" type="text/javascript" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script src="../js/webflow.js" type="text/javascript"></script>
  <!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
  <div id="fb-root"></div>
  <script async="" defer="" crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v4.0"></script>
</body>
</html>