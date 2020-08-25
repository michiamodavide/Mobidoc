<!DOCTYPE html>
<!--  This site was created in Webflow. http://www.webflow.com  -->
<!--  Last Published: Wed Jan 08 2020 18:01:51 GMT+0000 (Coordinated Universal Time)  -->
<html data-wf-page="5dfbca93dac992011add9814" data-wf-site="5d8cfd454ebd737ac1a48727">
<head>
  <meta charset="utf-8">
  <title>Team</title>
  <meta content="Team" property="og:title">
  <meta content="width=device-width, initial-scale=1" name="viewport">
  <meta content="Webflow" name="generator">
  <link href="css/contattaci.webflow.css" rel="stylesheet" type="text/css">
  <link href="css/contattaci.mobidoc.webflow.css" rel="stylesheet" type="text/css">
  <link href="css/mobidoc.webflow.css" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script>
  <script type="text/javascript">WebFont.load({  google: {    families: ["Montserrat:100,100italic,200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic","Poppins:100,100italic,200,300,300italic,regular,500,600,700,800,900","PT Serif Caption:regular"]  }});</script>
  <!-- [if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js" type="text/javascript"></script><![endif] -->
  <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script>
  <link href="images/favicon.png" rel="shortcut icon" type="image/x-icon">
  <link href="images/webclip.png" rel="apple-touch-icon">
 <link href="css/new-styles.css?v=3" rel="stylesheet" type="text/css">
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
<body class="body-7">
<?php include 'header.php';?>


  <div class="masthead team">
    <div class="custom_container masthead_content_container service">
      <div class="div-block-52">
        <h1 class="heading-4">Contattaci</h1>
      </div>
      <div class="div-block-8"></div>
    </div>
  </div>

  <script>
         function submit_message(){
           var name = document.getElementById("name_contact").value;
           var email = document.getElementById("email_contact").value;
           var msg = document.getElementById("msg_contact").value;
           document.getElementById("contact_btn").value = 'Attendere prego. . . ';
         
           if(name == '' || email == '' || msg == ''){
             alert('Si prega di inserire tutte le informazioni correttamente.');
           } else {
             var xmlhttp2 = new XMLHttpRequest();
           xmlhttp2.onreadystatechange = function() {
             if (this.readyState == 4 && this.status == 200) {
               if(this.responseText == 'Yes'){
                 document.getElementById('load').click();
               } else {
                 document.getElementById("contact_result").innerHTML = this.responseText;
                 document.getElementById("name_contact").value = '';
                 document.getElementById("email_contact").value = '';
                 document.getElementById("msg_contact").value = '';
                 document.getElementById("contact_btn").value = 'Invia';
               }
               
             }
           };
           xmlhttp2.open("GET", "sendMessage.php?name=" + name +"&email=" + email +"&message=" + msg, true);
           xmlhttp2.send();
           }
           
         }
      </script>
  <div class="contact_section">
    <div class="custom_container center">
      <div class="div-block-79">
        <div class="contact_form">
          <div class="form-block-4 w-form">
            <form id="email-form" name="email-form" data-name="Email Form">
              <input type="text" class="text-field-3 contact w-input" maxlength="256" name="name-3" data-name="Name 3" placeholder="Nome" id="name_contact" required="">
              <input type="email" class="text-field-3 contact w-input" maxlength="256" name="email" data-name="Email" placeholder="Email" id="email_contact" required="">
              <textarea name="field" maxlength="5000" id="msg_contact" placeholder="Messaggio" class="text-field-3 contact text_ara w-input" required=""></textarea>
              <input type="button" value="Invia" data-wait="Attendere prego..." id="contact_btn" class="button gradient contact w-button" onClick="submit_message()">
            </form>
          </div>
          <div id="contact_result">
               </div>
        </div>
      </div>
      <div class="div-block-80">
        <div class="text-block-84">Per qualsiasi informazione non esitate a contattarci. Il nostro personale sarà a vostra disposizione per qualsiasi tipo di chiarimento.</div>
        <!--<div class="contattaci_item"><img src="images/Subtraction-20.svg" width="14" alt="">
          <div class="text-block-85">Via Bellaria 6,<br>44121 Ferrara</div>
        </div>-->
        <div class="contattaci_item"><img src="images/phone-solid_1.svg" width="18" alt="">
          <div class="text-block-85">335 779 88 44</div>
        </div>
        <div class="contattaci_item"><img src="images/envelope-solid-1_1.svg" width="26" alt="">
          <div class="text-block-85 last">info@mobidoc.it</div>
        </div>
      </div>
    </div>
  </div>
 
  <?php include 'footer.php';?>

  <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.4.1.min.220afd743d.js" type="text/javascript" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script src="js/contattaci.webflow.js" type="text/javascript"></script>
  <!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
  <div id="fb-root"></div>
  <script async="" defer="" crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v4.0"></script>
<?php include ("google_analytic.php")?>
</body>
</html>