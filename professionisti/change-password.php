<?php
  $reset_code = $_GET['reset_code'];

  include '../connect.php';
	$sql = "select * from password_reset_prof where reset_code = '".$reset_code."'";
		
	$result = mysqli_query($conn, $sql);
	$rows = mysqli_fetch_array($result);
	
	if($rows['reset_code'] && $rows['reset_status'] == 0)
	{
    echo " ";
  } else {
    echo "<script>alert('Sorry! This link has been expired.'); window.location = '../';</script>";
  }
?>
<!DOCTYPE html>
<!--  This site was created in Webflow. http://www.webflow.com  -->
<!--  Last Published: Sun Dec 01 2019 05:50:44 GMT+0000 (Coordinated Universal Time)  -->
<html data-wf-page="5de3527659d27b338e25ed82" data-wf-site="5d8cfd454ebd737ac1a48727">
<head>
  <meta charset="utf-8">
  <title>Change Password - Professionisti</title>
  <meta content="Change Password - Professionisti" property="og:title">
  <meta content="width=device-width, initial-scale=1" name="viewport">
  <meta content="Webflow" name="generator">
  <link href="../css/normalize.css" rel="stylesheet" type="text/css">
  <link href="../css/webflow.css" rel="stylesheet" type="text/css">
  <link href="../css/change-password.css" rel="stylesheet" type="text/css">
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
</head>
<body class="body-9">
  <div class="admin_container">
    <div class="admin_login_container">
      <div class="admin_login_form">
        <div class="w-form">
          <form id="email-form" name="email-form" data-name="Email Form" class="form-5" action="change_password_php.php" method="post">
            <h2 class="heading-21 diff">Enter your New Password</h2>
            <input type="password" class="text-field-3 proff w-input" autofocus="true" maxlength="256" name="pwrd" data-name="password" placeholder="Password" id="password" required="">
            <input type="email" maxlength="256" name="email" value="<?php echo $rows['email'];?>" style="display:none;">
            <input type="text" maxlength="256" name="reset_code" value="<?php echo $rows['reset_code'];?>" style="display:none;">
            <input type="password" class="text-field-3 proff w-input" maxlength="256" name="cnfirm_pwrd" data-name="confirm-password" placeholder="Conferma Password" id="confirm-password" required="">
            <input type="submit" value="Cambia" class="button-5 admin_login_button w-button" id="submit_profile">
            <div class="error password_dont_match" style="margin-top:30px; margin-bottom:-5px;">
                <div>Le password non combaciano!</div>
              </div>
          </form>
        </div>
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
      var password = $('input[name=pwrd]').val();
      var confirm_password = $('input[name=cnfirm_pwrd]').val();

      if(password==confirm_password){
        $('.password_dont_match').removeClass("error_show");
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