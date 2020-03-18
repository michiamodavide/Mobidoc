<!DOCTYPE html>
<?php
 session_start();
 
 ?>
<!--  This site was created in Webflow. http://www.webflow.com  -->
<!--  Last Published: Fri Nov 01 2019 17:31:02 GMT+0000 (UTC)  -->
<html data-wf-page="5daa262de3e3f02a621af31b" data-wf-site="5d8cfd454ebd737ac1a48727">
<head>
  <meta charset="utf-8">
  <title>Paziente Register</title>
  <meta content="Paziente Register" property="og:title">
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
<body>
    <?php include '../header.php';?>
  <div class="masthead register">
    <div class="masthead_container register">
      <div class="div-block-31 diff diff">
      <a href="/" style="text-decoration:none; color:#fff;"><div><img src="/images/back_bc.svg">&nbsp;&nbsp; Indietro</div></a><br>
        <h1 class="heading-9">Registrati</h1>
      </div>
      <div class="register_form_container">
        <div class="form-block-3 w-form">  

        <div class="errors">
            <?PHP
                  if(isset($_POST['submit']))
                  {
                    $_SESSION['paziente_email']=$_POST['Email-register'];
                    include '../connect.php';
                    $email_paziente = $_SESSION['paziente_email'];
                    $fname = mysqli_real_escape_string($conn, $_POST['First_Name']);
                    $lname = mysqli_real_escape_string($conn, $_POST['Last_Name']);
                    $pwrds = mysqli_real_escape_string($conn, $_POST['pwrd']);
                    $email = mysqli_real_escape_string($conn, $_POST['Email-register']);
                    $profile_img = '../images/Group-556.jpg';
                    $pwrd = password_hash($pwrds, PASSWORD_DEFAULT);
                              
                    date_default_timezone_set("Europe/Rome");
                    $dor = date("Y/m/d");
                  
                    $sql = "insert into paziente_profile (first_name, last_name, password, email, photo, dor) values('".ucwords($fname)."', '".ucwords($lname)."', '".$pwrd."', '".$email."', '".$profile_img."', '".$dor."')";
                                        
                    $result = mysqli_query($conn, $sql);
                    mysqli_close($conn);
                    if($result==1)
                    {
                      //header("location: application-sucessful.php");
                      include '../connect.php';
  		                $sql3 = "select * from paziente_profile where email ='".$email_paziente."'";
  		                $result3 = mysqli_query($conn, $sql3);
                      $rows3 = mysqli_fetch_array($result3); 

                      if($rows3['cap'] == ''){
                        echo "<script>window.location = '/paziente/profile-update.php'</script>";
                      } else {
                        echo "<script>window.location = 'account.php'</script>";
                      }
                    }
	                	else { ?>

                        <div class="error">
                          <div>Email già registrata.</div>
                        </div>
                    
                    <?php }} ?>

            <div class="error password_dont_match">
              <div>Le password non combaciano!</div>
            </div>

          </div>


          <form id="email-form" action="register.php" name="email-form" method="post">
            
            <div class="dual_container">
              <input type="text" class="text-field-3 name w-input" maxlength="256" name="First_Name" data-name="First_Name" placeholder="Nome" id="First_Name-2" required="">
              <input type="text" class="text-field-3 name w-input" maxlength="256" name="Last_Name" data-name="Last_Name" placeholder="Cognome" id="Last_Name-2">
            </div>
            <input type="email" class="text-field-3 w-input" maxlength="256" name="Email-register" data-name="Email-register" placeholder="Email" id="Email-register-5" required="">
            <div class="dual_container">
              <input type="password" class="text-field-3 name w-input" maxlength="256" name="pwrd" data-name="pwrd" placeholder="Password" id="pwrd" required="">
              <input type="password" class="text-field-3 name w-input" maxlength="256" name="cnfirm_pwrd" data-name="Email Register 3" placeholder="Conferma Password" required="" id="email-register-3">
            </div>
            <label class="w-checkbox checkbox-field custom">
              <div class="w-checkbox-input w-checkbox-input--inputType-custom checkbox"></div>
              <input type="checkbox" id="checkbox2" name="checkbox" data-name="Checkbox" required="" style="opacity:0;position:absolute;z-index:-1">
              <span class="checkbox-label w-form-label">
                <span class="legal_consent">Esprimo il consenso per finalità di gestione della prenotazione ed erogazione del servizio richiesto da parte dell’interessato (finalità a) indicata dall’informativa di trattamento).</span>
              </span>
            </label>
            <label class="w-checkbox checkbox-field custom">
              <div class="w-checkbox-input w-checkbox-input--inputType-custom checkbox"></div>
              <input type="checkbox" id="checkbox-3" name="checkbox-3" data-name="Checkbox 3" style="opacity:0;position:absolute;z-index:-1" required="">
              <span class="checkbox-label w-form-label">
                <span class="legal_consent">Esprimo il consenso al trattamento, anche di dati appartenenti a particolari categorie, per finalità di erogazione delle prestazioni e degli interventi di prevenzione, diagnosi e cura (ivi incluse le attività di follow-up a fini di cura e/o le visite specialistiche e/o le prestazioni ambulatoriali eventualmente richieste dall’interessato) (finalità b) indicata dall’informativa di trattamento).</span>
              </span>
            </label>
            <!--
            <label class="w-checkbox checkbox-field custom">
              <div class="w-checkbox-input w-checkbox-input--inputType-custom checkbox"></div>
              <input type="checkbox" id="checkbox-2" name="checkbox-2" data-name="Checkbox 2" style="opacity:0;position:absolute;z-index:-1">
              <span class="checkbox-label w-form-label">  
                <span class="legal_consent">Opzionale: esprimo il consenso per finalità di marketing ed attività di comunicazione di carattere commerciale, informativa e promo-pubblicitaria (finalità e) indicata dall’informativa di trattamento).</span>
              </span>
            </label>-->
            <div class="text-block-32">In questo modulo puoi inserire e modificare i tuoi dati. Seleziona con cura il tuo comune di residenza ed il CAP, specie se il tuo comune ne prevede più di uno, perché è in base ad esso che cambierà la lista delle visite/esami disponibili</div>
            
            <input type="submit" name="submit" value="Invia" id="submit_profile" class="button gradient login_button register w-button" style="margin-bottom:30px;">
          </form>

                 
          


        </div>
        <div class="text-block-29">Per assistenza chiama il <span class="text-span-3">335 77 988 44</span></div>
      </div>
    </div>
  </div>
  <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.4.1.min.220afd743d.js" type="text/javascript" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script src="../js/webflow.js" type="text/javascript"></script>
  <!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
  <div id="fb-root"></div>
  <script async="" defer="" crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v4.0"></script>
  <style>
    .password_dont_match{
      display:none;
    }
    .error_show{
      display:block;
    }
  </style>
  <script>
    $('#submit_profile').click(function(){
      $('input[name=pwrd], input[name=cnfirm_pwrd]').keyup(function(){
        $('.password_dont_match').removeClass("error_show");
      });
      var password = $('input[name=pwrd]').val();
      var confirm_password = $('input[name=cnfirm_pwrd]').val();
      if(password==confirm_password){
        return true;
      } else {      
        $('.password_dont_match').addClass("error_show");
        window.scrollTo(0, 0); 
          return false;
      }   
    }); 
  </script>
</body>
</html>