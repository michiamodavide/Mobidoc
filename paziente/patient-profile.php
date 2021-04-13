<?php session_start();
if (!isset($_SESSION['paziente_email'])) {
  header("Location: login.php");
}
$contact_email = $_SESSION['paziente_email'];

include '../connect.php';
$sql = "select * from contact_profile where email = '" . $contact_email . "'";
$result = mysqli_query($conn, $sql);
$rows = mysqli_fetch_array($result);
$contact_id = $rows['id'];


$name = '';
$cogname = '';
$email_p = '';
$dob = '';
$fiscale = '';
$address = '';
$gmap_addr = '';
$lat_lang = '';

$patient_id_param = '';
if (isset($_GET['pid'])) {

  $patient_id_param = $_GET['pid'];
  $sql12 = "select * from paziente_profile where paziente_id = '" . $patient_id_param . "'";
  $result12 = mysqli_query($conn, $sql12);
  $rows12 = mysqli_fetch_array($result12);

  $name = $rows12['first_name'];
  $cogname = $rows12['last_name'];
  $email_p = $rows12['email'];

  $dob = '';
  if ($rows12['dob']){
    $dob = $rows12['dob'];
    $dob = strtotime($dob);
    $dob = date('d-m-Y', $dob);
  }

  $fiscale = $rows12['fiscale'];
  $address = $rows12['address'];
  $gmap_addr = $rows12['gmap_address'];
  $lat_lang = $rows12['latitude'].','.$rows12['longitude'];

}
?>
<!DOCTYPE html>
<html data-wf-page="5daa262de3e3f064091af31c" data-wf-site="5d8cfd454ebd737ac1a48727">
<head>
 <meta charset="utf-8">
 <title>Patient Profile</title>
 <meta content="Profile Update" property="og:title">
 <meta content="width=device-width, initial-scale=1" name="viewport">
 <meta content="Webflow" name="generator">
 <link href="../css/normalize.css" rel="stylesheet" type="text/css">
 <link href="../css/webflow.css" rel="stylesheet" type="text/css">
 <link href="../css/mobidoc.webflow.css" rel="stylesheet" type="text/css">
 <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script>
 <script
  type="text/javascript">WebFont.load({google: {families: ["Montserrat:100,100italic,200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic", "Poppins:100,100italic,200,300,300italic,regular,500,600,700,800,900", "PT Serif Caption:regular"]}});</script>
 <!-- [if lt IE 9]>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js" type="text/javascript"></script>
 <![endif] -->
 <script type="text/javascript">!function (o, c) {
     var n = c.documentElement, t = " w-mod-";
     n.className += t + "js", ("ontouchstart" in o || o.DocumentTouch && c instanceof DocumentTouch) && (n.className += t + "touch")
   }(window, document);</script>
 <link href="../images/favicon.png" rel="shortcut icon" type="image/x-icon">
 <link href="../images/webclip.png" rel="apple-touch-icon">
 <link href="dist/css/datepicker.css" rel="stylesheet" type="text/css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
 <link href="../dist/css/selectize.default.css" rel="stylesheet"/>
 <script src="../dist/js/standalone/selectize.min.js"></script>
 <script src="dist/js/datepicker.js"></script>
 <script src="dist/js/i18n/datepicker.en.js"></script>
 <script src="https://kit.fontawesome.com/3f12b8b553.js" crossorigin="anonymous"></script>
 <style>
  ::-webkit-scrollbar {
   width: 0px;
   height: 0px;
  }

  .p {
   text-align-last: center !important;
  }
  .button.stroked.back-btn{
   background-color: #0000001c !important;
   border-color: #0000005c !important;
  }
  .button.stroked.back-btn:hover{
   background-color: hsla(0, 0%, 100%, 0.15) !important;
   border-color: hsla(0, 0%, 100%, 0.15) !important;
  }
 </style>
</head>
<body>
<?php include '../header.php'; ?>
<div class="masthead upform">
 <div class="masthead_container up_form" style="margin-bottom:50px;">
  <h1 class="heading-10">Compilare il modulo</h1>
  <div class="cover_section_buttons_container" style="margin-top:30px;">
   <a href="account.php" class="button stroked cover_btns logout w-button back-btn">Indietro</a>
   <a href="logout.php" class="button stroked cover_btns logout w-button">Logout</a>
  </div>
 </div>
</div>
<section class="section-19">
 <div class="custom_container update_form">

  <div class="update_form_main_container">
   <div class="update_form_block w-form">
    <form id="email-form" name="email-form" class="update_form" action="patient_profile_c.php" method="post"
          enctype="multipart/form-data" style="display: inherit;">
     <input type="hidden" name="contact_id" value="<?php echo $contact_id?>">
     <?php if ((isset($_GET['pid'])) && (!empty($_GET['pid']))){ ?>
     <input type="hidden" name="patient_id" value="<?php echo $_GET['pid']?>">
     <?php }?>
     <div>
      <div class="form_section">
       <div class="form_section_heading">Dati anagrafici</div>

       <div class="dual_container diff">
        <input type="text" class="inputs w-input" maxlength="256" name="fiscal_code" data-name="fiscal_code"
               placeholder="Codice Fiscale" id="fiscal_code" value="<?PHP echo $fiscale; ?>" required>
        <input type="email" class="inputs w-input" maxlength="256" name="email" value="<?PHP echo $email_p; ?>" required
               data-name="email" placeholder="Email" id="email">
       </div>

       <div class="dual_container diff">
        <input type="text" class="inputs w-input" maxlength="256" name="first_name" value="<?PHP echo $name; ?>" required
               data-name="first_name" placeholder="Nome" id="first_name">
        <input type="text" class="inputs w-input" maxlength="256" name="last_name" value="<?PHP echo $cogname; ?>" required
               data-name="last_name" placeholder="Cognome" id="last_name">
       </div>
       <input type="text" class="datepicker-here inputs w-input" autocomplete="off" data-language="it" data-date-format="dd-mm-yyyy"
              maxlength="256" name="dob" placeholder="Data di Nascita" id="dob" value="<?PHP echo $dob; ?>" required>
      <br>
       <input style="margin-bottom: 15px;width: 70%;margin-left: 15%;" type="text" class="inputs w-input" maxlength="256" name="address" placeholder="Indirizzo Completo *" autocomplete="off" id="address_search" value="<?php echo $address?>" required>
       <input type="hidden" class="inputs w-input gmap_adress" value="<?php echo $gmap_addr?>" maxlength="256" name="gmap_addr" placeholder="Indirizzo Completo *">
       <input type="hidden" class="inputs w-input lat_log" value="<?php echo $lat_lang?>" maxlength="256" name="lat_log" placeholder="Indirizzo Completo *">
       <div class="map" id="map" style="width: 100%; height: 300px;margin: 0% auto 33px;"></div>
      </div>

     </div>

     <div class="div-block-34">
      <div class="div-block-35">
        <?php
        /*
          <div class="profile_image_container">
            <div id="dp_2" style="width:100%; height:100%; background: url('<?PHP echo $photo;?>'); background-position:center; background-size:cover;cursor: pointer"></div>
          </div>
          <div class="text-block-33">Carica un’immagine profilo</div>
          <br>
          <input type="file" class="upload_image" style="display:none;" name="upload-image" accept="image/*" onchange="readURL(this);">

        */
        ?>
      </div>

     </div>
     <style>#submit{color:#fff !important;}
     .contact-error-msg{font-size: 18px; color: red; display: none}
     </style>
     <div style="text-align: center">
      <p class="contact-error-msg">Paziente già registrato con questo codice fiscale.</p>
      <input type="submit" name="submit" value="Conferma Dati" id="submit"
             class="button gradient submit w-button">
     </div>
    </form>
   </div>
  </div>
 </div>
</section>

<div data-w-id="c63fef3a-23b1-f70c-9014-2968db2eacbb" class="vselect_doctor">
 <div data-w-id="33cdd347-afe1-85b8-dddd-e96494f0f01b" style="transform: translate3d(0px, 0%, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); opacity: 1; transform-style: preserve-3d;" class="vdoctor_container">
  <div class="text-block-18">Stai riscontrando un problema? Scrivici</div>
  <br>
  <br>
  <div class="div-block-25">

   <script>
     function submit_message(){
       var name = document.getElementById("name_contact").value;
       var email = document.getElementById("email_contact").value;
       var msg = document.getElementById("msg_contact").value;

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
         xmlhttp2.open("GET", "/sendMessage.php?name=" + name +"&email=" + email +"&message=" + msg, true);
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
         <a data-w-id="deac175c-85b0-7104-4736-171b0c9ce4da" href="#" class="button-3 next odd w-button">Indietro</a>
         <input type="button" value="Invia" id="contact_btn" class="button gradient contact w-button" style="color: #fff !important;" onClick="submit_message()">
        </form>
       </div>
       <div id="contact_result">
       </div>
      </div>
     </div>
    </div>
   </div>
  </div>
 </div>
 <div data-w-id="d1769b47-b536-ea11-3350-e5df432dbf52" class="closer"></div>
</div>
<script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.4.1.min.220afd743d.js" type="text/javascript"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="../js/webflow.js" type="text/javascript"></script>
<!-- [if lte IE 9]>
<script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
<div id="fb-root"></div>
<script async="" defer="" crossorigin="anonymous"
        src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v4.0"></script>

<script type="text/javascript">
  var contact_param = '<?php echo $contact_id_param?>';

  function checkFisical(fis_val){
    $.ajax({
      url: "check_fiscal.php",
      type: "post",
      data: {data:fis_val},
      dataType: "json",
      success: function (response) {
        // console.log(response);
        if (response == 'true'){
          $("input#fiscal_code").css("background-color", "#d3fbff");
          return true;
        } else {
          $(".vselect_doctor").attr("style", "display: flex;opacity: 1;");
          $("input#fiscal_code").css("background-color", "#ffc5c5");
          // $("#submit").css("display", "none");
          // $(".contact-error-msg").css("display", "block");
          return false;
        }
      },
      error: function(jqXHR, textStatus, errorThrown) {
        console.log(textStatus, errorThrown);
      }
    });
  }

  $('#submit').click(function(){
    var fis_val = $("#fiscal_code").val();
    if (fis_val.length > 1) {
      checkFisical(fis_val);
    }

  });

  $(".odd.w-button").on("click", function () {
    $(".vselect_doctor").attr("style", "display: none;opacity: 1;");
    $("input#fiscal_code").css("background-color", "#d3fbff");
  });
</script>
<?php include ("../googel_map.php")?>
<style>
 .search_help_open {
  display: block !important;
 }

 .search_help_open:hover {
  display: block !important;
 }

 .search_cap_input {
  display: inline-flex;
 }

 .selecteds {
  overflow: scroll !important;
 }

 .cap_name_input {
  -webkit-transform: translateX(-30px);
  -ms-transform: translateX(-30px);
  transform: translateX(-30px);
  margin: -5px;
 }

 .text-block-44 {
  background: none;
  border: none;
 }

 textarea {
  resize: none;
 }

 .select-field {
  width: 100%;
  height: 100%;
  padding-top: 12px;
  padding-bottom: 12px;
  border: 1px none #000;
  background-color: transparent;
  color: #00285c;
 }

 ::-webkit-scrollbar {
  width: 0px;
  height: 0px;
 }

 .p {
  text-align-last: center !important;
 }

 .selectize-control {
  width: 100%;
 }

 ::placeholder {
  color: rgba(0, 40, 92, 0.65);
 !important;
 }

 .selectize-input {
  background: transparent !important;
  border: none;
  box-shadow: none !important;
  padding: 20px;
  margin-top: 5px !important;
  color: #00285c !important;
 }

 .selectize-dropdown {
  background: #E4FDFF !important;
  border: none;
  margin-top: 10px;
  border-radius: 5px !important;
  box-shadow: 3px 30px 50px 0 rgba(0, 37, 84, 0.16) !important;
  color: #00285c !important;
  height: 250px !important;
  padding: 0px !important;
  overflow: hidden !important;
 }

 .selectize-dropdown-content {
  max-height: 100% !important;
 }

 .selectize-dropdown-content .option {
  padding: 20px !important;
  margin: 0px !important;
 }

 input[readonly] {
  background: #D3FBFF !important;
  color: #00285C !important;
 }

 input {
  color: #00285C !important;
 }

</style>

<?php include("../google_analytic.php") ?>
</body>
</html>