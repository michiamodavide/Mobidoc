<?php session_start();
  if(!isset($_SESSION['adminlogin']))
  {
    header("Location: login.php"); 
  } 

  include '../connect.php';
        
  $sql = "select * from bookings where booking_id = ".$_GET['id']."";
  $result = mysqli_query($conn, $sql);
  $rows = mysqli_fetch_array($result);
  $visit_name = $rows['visit_name'];
  $dateBooking = $rows['date_of_booking'];
  $price = '€'.$rows['price'];
  $payment_mode = $rows['payment_mode'];
  $pateint_id = $rows['patient_id'];
  $doctor_id = $rows['doctor_id'];          
  $booking_status = $rows['booking_status'];          
  $fattura = $rows['fattura'];          
  $opointment_time = $rows['apoint_time'];
  if($booking_status == 1){
    $state = 'Eseguito';          
  } else {
    $state = 'Prenotato';       
  }
 
  $sql2 = "select * from paziente_profile where paziente_id = '".$pateint_id."'";
  $result2 = mysqli_query($conn, $sql2);
  $rows2 = mysqli_fetch_array($result2);
  $patient_name = $rows2['first_name']." ".$rows2['last_name'];
  if($rows2['photo'] == "../images/Group-556.jpg"){
    $patient_pic = '../images/Group-563.jpg';
  } else {
    $patient_pic = "/paziente/".$rows2['photo'];
  }
  $patient_email = $rows2['email'];
  $patient_fiscale = $rows2['fiscale'];
  $patient_phone = $rows2['phone'];
  $patient_via = $rows2['via'];
  $patient_civico = $rows2['civico'];
  $patient_province = $rows2['province'];
  $patient_comune = $rows2['comune'];
  $patient_cap = $rows2['cap'];
  $patient_dob = $rows2['dob'];

  $sql3 = "select * from doctor_profile where doctor_id = '".$doctor_id."'";
  $result3 = mysqli_query($conn, $sql3);
  $rows3 = mysqli_fetch_array($result3);
  $doctor_name = $rows3['fname']." ".$rows3['lname'];
  $doctor_email = $rows3['email'];
  $doctor_title = $rows3['title'];
  $doctor_fiscale = $rows3['fiscale'];
  $doctor_phone = $rows3['phone'];
  $doctor_dob = $rows3['dob'];
  $doctor_via = $rows3['street_name'];
  $doctor_civico = $rows3['street_no'];
  $doctor_province = $rows3['comune'];
  $doctor_comune = $rows3['province'];
  $doctor_cap = $rows3['cap'];
  $doctor_vat = $rows3['vat_number'];
  $doctor_pic = "/professionisti/".$rows3['photo'];
  $doctor_link = "/il-team/professionista.php?".$doctor_id;
?>

<!DOCTYPE html>
<html data-wf-page="5dfc8aa2ef0cf96c18b84271" data-wf-site="5d8cfd454ebd737ac1a48727">
<head>
  <meta charset="utf-8">
  <title>Booking Details</title>
  <meta content="Booking Details" property="og:title">
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
  <div class="menu_current w-embed w-script">
    <script>
	$(document).ready(function(){
  	$('.admin_item:nth-child(2)').addClass('current');
  });
</script>
    <style>
	.pateint_bottom_item:nth-child(odd){
  	background-color: #F1F3F6 !important;
  }
</style>
  </div>
  <div class="admin_main_section diff">
    <div data-w-id="671d7027-6f87-1c3f-c474-3b17f4b83b06" style="-webkit-transform:translate3d(0, -50%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, -50%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, -50%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, -50%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);opacity:0" class="admin_section_header diff">
      <div class="div-block-72"><a href="booking.php" class="back_button w-inline-block"></a>
        <h1 class="admin_section_heading diff">Dettagli Prenotazione</h1>
      </div>
      <div class="div-block-70">
        <div class="scroll_indicator">
          <div data-w-id="98c7cd18-996f-4b08-777e-ae54e6517910" data-animation-type="lottie" data-src="https://uploads-ssl.webflow.com/5d8cfd454ebd737ac1a48727/5df9f0f25ccbf3bb4c727941_lottieflow-scrolling-01-1-00285C-easey.json" data-loop="0" data-direction="1" data-autoplay="0" data-is-ix2-target="1" data-renderer="svg" data-default-duration="2.76" data-duration="0" class="lottie-animation-3"></div>
        </div><a href="logout.php" class="admin_logout diff w-button"></a></div>
    </div>
    <div class="section_content">
      <div class="details_continer">
        <div id="w-node-7d6c7f06b303-18b84271" data-w-id="c5df2ca0-6a8a-091e-ce1e-7d6c7f06b303" style="-webkit-transform:translate3d(0, 60%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(5DEG) skew(0, 0);-moz-transform:translate3d(0, 60%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(5DEG) skew(0, 0);-ms-transform:translate3d(0, 60%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(5DEG) skew(0, 0);transform:translate3d(0, 60%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(5DEG) skew(0, 0);opacity:0" class="visit_detail">
          <div>
            <h1 class="heading-25"><?php echo $visit_name;?></h1>
          </div>
          <div>
            <div class="glance_details diff">
             <div class="glance_details_title">Data e Ora</div>
             <div class="glance_details_value">
               <?php
               if (!empty($opointment_time)){
                 echo date("d/m/Y H:i", strtotime($opointment_time));;
               }else{
             ?>
              <p style="text-align: center">...</p>
              <?php }?>
             </div>
              <?php
              /*
              <div class="glance_details_title">Data Prenotazione</div>
              <div class="glance_details_value"><?php echo $dateBooking;?></div>
              */
              ?>
            </div>
            <div class="glance_details diff">
              <div class="glance_details_title">Prezzo</div>
              <div class="glance_details_value"><?php echo $price;?></div>
            </div>
            <div class="glance_details diff">
              <div class="glance_details_title">Metodo di pagamento</div>
              <div class="glance_details_value"><?php echo $payment_mode;?></div>
            </div>
            <div class="glance_details diff">
              <div class="glance_details_title">Stato prenotazione</div>
              <div class="glance_details_value"><?php echo $state;?></div>
            </div>
            <div class="glance_details diff" style="position:relative;">
              <div class="glance_details_title">Fattura</div>
              <div class="glance_details_value">
                  <span style="visibility:hidden;">Fattura</span>
                  <label class="w-checkbox checkbox-field">                      
                    <?php if($fattura == 1){ ?>
                      <div id="checky" class="w-checkbox-input w-checkbox-input--inputType-custom checkbox proff w--redirected-checked" style="height:30px; width:30px; position:absolute; top:40px; left:20px;"></div>
                      <input type="checkbox" id="checkbox" name="checkbox" checked data-name="Checkbox" required="" style="display:none; opacity:0;">
                    <?php } else { ?>
                      <div id="checky" class="w-checkbox-input w-checkbox-input--inputType-custom checkbox proff" style="height:30px; width:30px; position:absolute; top:40px; left:20px;"></div>
                      <input type="checkbox" id="checkbox" name="checkbox" data-name="Checkbox" required="" style="display:none; opacity:0;">
                    <?php } ?> 
                  </label>
              </div>
            </div>
          </div>
        </div>
        <div data-w-id="afc83dfc-904a-ccd3-b55b-56461dd04c4d" style="-webkit-transform:translate3d(0, 30%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(5DEG) skew(0, 0);-moz-transform:translate3d(0, 30%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(5DEG) skew(0, 0);-ms-transform:translate3d(0, 30%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(5DEG) skew(0, 0);transform:translate3d(0, 30%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(5DEG) skew(0, 0);opacity:0" class="details_card">
          <div class="ptop">
            <div class="profilo pateint" style="background-image:url(<?php echo $patient_pic;?>)"></div>
            <div id="w-node-c424662913dd-18b84271">
              <div class="name pateint"><?php echo $patient_name?></div>
              <div class="email patient"><?php echo $patient_email?></div>
            </div>
          </div>
          <div class="pateint_bottom">
            <div class="pateint_bottom_item">
              <div id="w-node-d85ee62611c9-18b84271" class="text-block-80">Codice Fiscale</div>
              <div class="text-block-79"><?php echo $patient_fiscale?></div>
            </div>
            <div class="pateint_bottom_item">
              <div id="w-node-c1c619d0275b-18b84271" class="text-block-80">Telefono</div>
              <div class="text-block-79"><?php echo $patient_phone?></div>
            </div>
            <div class="pateint_bottom_item">
              <div id="w-node-2e10e3ab0c86-18b84271" class="text-block-80">Data di Nascita</div>
              <div class="text-block-79"><?php echo $patient_dob?></div>
            </div>
            <div class="pateint_bottom_item">
              <div id="w-node-c9a4310b646b-18b84271" class="text-block-80">Indirizzo</div>
              <div class="text-block-79"><?php echo $patient_via?> <br><?php echo $patient_civico?>, <?php echo $patient_comune?><br><?php echo $patient_province?> <?php echo $patient_cap?></div>
            </div>
          </div>
        </div>
        <div data-w-id="ea7af5c5-832d-06c3-5f17-ea319863613e" style="-webkit-transform:translate3d(0, 30%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(5DEG) skew(0, 0);-moz-transform:translate3d(0, 30%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(5DEG) skew(0, 0);-ms-transform:translate3d(0, 30%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(5DEG) skew(0, 0);transform:translate3d(0, 30%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(5DEG) skew(0, 0);opacity:0" class="details_card">
          <div class="ptop diff">
            <div class="div-block-73">
              <div class="profilo doctor" style="background-image:url(<?php echo $doctor_pic;?>)"></div>
              <div>
                <div class="name doctor"><?php echo $doctor_name?></div>
                <div class="email doctor"><?php echo $doctor_email?></div>
              </div>
            </div><a href="<?php echo $doctor_link;?>" target="_blank" class="button-14 w-button">Profilo</a></div>
          <div class="pateint_bottom">
            <div class="pateint_bottom_item">
              <div id="w-node-ea3198636148-18b84271" class="text-block-80">Titilo</div>
              <div class="text-block-79"><?php echo $doctor_title?></div>
            </div>
            <div class="pateint_bottom_item">
              <div id="w-node-07bd1ed14d13-18b84271" class="text-block-80">Codice Fiscale</div>
              <div class="text-block-79"><?php echo $doctor_fiscale?></div>
            </div>
            <div class="pateint_bottom_item">
              <div id="w-node-ea319863614d-18b84271" class="text-block-80">Telefono</div>
              <div class="text-block-79"><?php echo $doctor_phone?></div>
            </div>
            <div class="pateint_bottom_item">
              <div id="w-node-ea3198636152-18b84271" class="text-block-80">Data di Nascita</div>
              <div class="text-block-79"><?php echo $doctor_dob?></div>
            </div>
            <div class="pateint_bottom_item">
              <div id="w-node-ea3198636157-18b84271" class="text-block-80">Indirizzo</div>
              <div class="text-block-79"><?php echo $doctor_via?> <br><?php echo $doctor_civico?>, <?php echo $doctor_comune?><br><?php echo $doctor_province?> <?php echo $doctor_cap?></div>
            </div>
            <div class="pateint_bottom_item">
              <div id="w-node-ea3198636157-18b84271" class="text-block-80">Partita IVA</div>
              <div class="text-block-79"><?php echo $doctor_vat?></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="preloader diff">
    <div class="loader diff">
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
<script>
  $(document).ready(function(){
    $('#checky').click(function(){                              
      if($(this).hasClass('w--redirected-checked')) {
        $(this).removeClass('w--redirected-checked');   

        function update_fattura_n(){
          var xmlhttp2 = new XMLHttpRequest();
          xmlhttp2.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              alert("The Value has been updated to - Disabled");
            }
          };
          xmlhttp2.open("GET", "update_fattura_n.php?b=<?php echo $_GET["id"];?>" , true);
          xmlhttp2.send();
        }     
        update_fattura_n();   
                           
      } else {
        $(this).addClass('w--redirected-checked'); 
        
        function update_fattura_y(){
          var xmlhttp2 = new XMLHttpRequest();
          xmlhttp2.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              alert("The Value has been updated to - Enabled");
            }
          };
          xmlhttp2.open("GET", "update_fattura_y.php?b=<?php echo $_GET["id"];?>" , true);
          xmlhttp2.send();
        }     
        update_fattura_y(); 
      }
    });
  });
</script>