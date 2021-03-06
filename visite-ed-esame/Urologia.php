<?php 
session_start(); 
$visit_id = 10;

include '../connect.php';
	
	if($conn === false){
		die("ERROR database");
  }
  
$sql = "select * from visit where visit_id='".$visit_id."'";
$result = mysqli_query($conn, $sql);
$rows = mysqli_fetch_array($result);
$visit_name = $rows['visit_name'];
$icon = "/".$rows['alt_image'];
$body_copy = $rows['body_text'];

?>


<!DOCTYPE html>
<html data-wf-page="5daa262de3e3f05cbc1af318" data-wf-site="5d8cfd454ebd737ac1a48727">
<head>
  <meta charset="utf-8">
  <title><?php echo $visit_name;?></title>
  <meta content="Ecografie" property="og:title">
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
 <link href="../css/new-styles.css?v=3" rel="stylesheet" type="text/css">
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
.masthead{background-image: linear-gradient(177deg, rgba(12, 217, 237, 0.7), rgba(0, 40, 92, 0.6)), url(images/Urologia.jpg?v=2);}
  </style>
 <script>
  function getDoctors(value){
    $('#book_visit').val($.trim(value));
    $('#book_doctor').val('');
    var xmlhttp2 = new XMLHttpRequest();
    xmlhttp2.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("load_doctors").innerHTML = this.responseText;
      }
    };
    xmlhttp2.open("GET", "../getDoctor2.php?q=" + value, true);
    xmlhttp2.send();
  }
  function setDoctor(val){
    $('#book_doctor').val(val);
  }
</script>
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
            xmlhttp.open("GET", "get_doctor_details.php?q=" + str, true);
            xmlhttp.send();
          }     
                        
        }
</script>
</head>
<body>
  <?php include '../header.php';?>
  <script>
        function showHint(str) {
          $('#load_doctors').html('<div class="slect_visit_first"><span>Please select a visit first!</span></div>');
          if (str.length == 0) {
            document.getElementById("txtHint").innerHTML = "";
            return;
          } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
              if (this.readyState == 4 && this.status == 200) {
                document.getElementById("visite_list").innerHTML = this.responseText;
              }
            };
            xmlhttp.open("GET", "../getVisits.php?q=" + str, true);
            xmlhttp.send();
          }      
          setTimeout( function(){ 
                var visite_count = $('.visite_list').children('.visite').length;
                
                if(visite_count < 6){
                  $('.visite').css('margin-bottom','15px');
                  $('.visite_list').css('display','block'); 
                  $('#book_visit, #book_doctor').val('');                
                } else {
                  $('.visite').css('margin-bottom','0px');
                  $('.visite_list').css('display','grid'); 
                  $('#book_visit, #book_doctor').val('');
                }
              }, 100);                        
        }
      </script>
  <section class="masthead visit_page_header">
    <div class="masthead_container">
      <div class="column"><img src="<?php echo  $icon;?>" height="80" alt="" class="image-7">
        <h1 class="visite_heading"><?php echo  $visit_name;?></h1>
      </div>
      <div class="column right"><a data-w-id="ba441505-e5ef-db71-84ad-f245017d0493" href="#" class="button stroked odd w-button" data-name="<?php echo $visit_name;?>" onClick="showHint(this.getAttribute('data-name'))">Prenota Online</a><a href="tel:3357798844" class="button stroked w-button">Chiamaci</a></div>
    </div>
  </section>
  <div class="section-13">
    <div class="custom_container info_container">
      <div class="div-block-27">
        <h2 class="heading-7"><?php echo $visit_name;?> a domicilio</h2>
        <p class="paragraph-7"><?php echo $body_copy;?></p>
        <div class="div-block-53">
          <a data-w-id="a5879364-b3b1-d445-2751-67a535feab81" href="#" class="button gradient visite_cta w-button" data-name="<?php echo $visit_name;?>" onClick="showHint(this.getAttribute('data-name'))">Prenota Online</a>
          <a href="tel:3357798844" class="button visite_cta w-button">Chiamaci</a>
        </div>
      </div>
      <div><img src="images/Urologia.jpg" alt="" class="image-5"></div>
    </div>
  </div>
  <div class="section-14" style="min-height:auto;">
    <div class="custom_container type_of-visit">
      <?php include ("visit_types_search.php")?>
      <div class="visite_type_container">

      <?php
      include '../connect.php';
      if (isset($_SESSION['doctor_email'])) {
//        $sql2 = "select DISTINCT doctor_visit.visit_name from visit_type INNER JOIN doctor_visit on visit_type.visit_type_name = doctor_visit.visit_name where visit_type.visit_name='".$visit_name."'";
        $sql2 = "select DISTINCT doctor_visit.visit_name from visit_type
  INNER JOIN doctor_visit on visit_type.visit_type_name = doctor_visit.visit_name
  INNER JOIN doctor_profile on doctor_visit.doctor_email = doctor_profile.email
  where visit_type.visit_name='".$visit_name."' AND doctor_profile.active='Y'";
      }else{
        $sql2 = "select DISTINCT doctor_visit.visit_name from visit_type
  INNER JOIN doctor_visit on visit_type.visit_type_name = doctor_visit.visit_name
  INNER JOIN doctor_profile on doctor_visit.doctor_email = doctor_profile.email
  where visit_type.visit_name='".$visit_name."' AND doctor_profile.puo_refertare='N' AND doctor_profile.active='Y'";
      }
      $result2 = mysqli_query($conn, $sql2);
      
			while($rows2 = mysqli_fetch_array($result2)){
        $visit_type_name = trim($rows2['visit_name']," ");
        $visit_name_2 = '"'.$visit_name.'", "'.$visit_type_name.'"'; 
        $sql3 = "select MIN(price) from doctor_visit where visit_name ='".$visit_type_name."'";
        $result3 = mysqli_query($conn, $sql3);
        $rows3 = mysqli_fetch_array($result3);
        $price = $rows3[0];
        
      ?>
        
        <div class="visite_type" onClick='getDoctor_details(<?php echo $visit_name_2;?>);'>
          <div class="text-block-21"><?php echo $visit_type_name;?></div>
          <div class="price">
            <div class="text-block-55">A Partire da</div>
            <div class="price_text">€<?php echo $price?></div>
          </div>
        </div>
        
			<?Php } ?>

       

      </div>

    </div>
  </div>
  <div class="section-15">
    <div class="custom_container doct_available">
      <div class="section_title"><span class="service_name"><?php echo  $visit_name;?>:</span> I Professionisti Mobidoc</div>
      <div class="doctors_parent_container">
        <div class="scroll left"><img src="../images/scroll_arrow.svg" width="13" alt="" class="scroll_image"></div>
        <div class="scroll right"><img src="../images/scroll_arrow.svg" width="13" alt="" class="scroll_image"></div>
        <div class="doctors_main_container">
          <div class="visit_doctor_container">
            
          <?php 
           include '../connect.php';
           $sql2 = "select DISTINCT doctor_visit.visit_name from visit_type INNER JOIN doctor_visit on visit_type.visit_type_name = doctor_visit.visit_name where visit_type.visit_name='".$visit_name."'";
           $result2 = mysqli_query($conn, $sql2);
           $unique_email = [];

           while($rows2 = mysqli_fetch_array($result2)){            
           $visit_type_name = trim($rows2['visit_name']," ");

           $sql4 = "select distinct doctor_email from doctor_visit where visit_name='".$visit_type_name."'";
           $result4 = mysqli_query($conn, $sql4);
//           $rows4 = mysqli_fetch_array($result4);
//           $rows7 = array_unique($rows4);
//           $continuousemail = implode($rows7);
//           array_push($unique_email, $continuousemail);
             while($doc_visit_data = mysqli_fetch_array($result4)){
               $doctor_email = $doc_visit_data['doctor_email'];
               array_push($unique_email, $doctor_email);
             }
           }
           $uniqu = array_unique($unique_email);
           foreach ($uniqu as $value){
             if (isset($_SESSION['doctor_email'])) {
               $sql5 = "select * from doctor_profile where email='".$value."' AND active = 'Y'";
             }else{
               $sql5 = "select * from doctor_profile where email='".$value."' AND puo_refertare='N' AND active = 'Y'";
             }
            $result5 = mysqli_query($conn, $sql5);    
            $rows5 = mysqli_fetch_array($result5);
          if (!empty($rows5['fname']) && !empty($rows5['title'])){
            $rows6 = array_unique($rows5);
            $doctor_image = "/professionisti/".$rows5['photo'];
            $doctor_name = $rows5['fname']." ".$rows5['lname'];
            $doctor_title = $rows5['title'];
            $doctor_id = $rows5['doctor_id'];
           
           ?>
           
            <div class="visite_doctor_card">
              <div class="doctor_data_container">
                <div class="professionist_image_container">
                <div class="image-16" style="background: url('<?php echo $doctor_image;?>') no-repeat center center / cover;"></div>
                </div>
                <div class="preofessionist_name"><?php echo $doctor_name;?></div>
                <div class="professionist_title"><?php echo $doctor_title;?></div>
                <a href="#" class="button gradient view_profile_popup w-button"  data-name="<?php echo $doctor_id;?>" onClick="get_visit_Doctors(this.getAttribute('data-name'));">Vedi dettagli</a></div>
            </div>

            <?php }}?>

          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="section-16" style="display:none;">
    <div class="custom_container search_doct_area">
      <h3 class="heading-8">Controlla Disponibilità Professionisti nella tua area:</h3>
      <div class="search_area_bar"><input type="text" class="searching_doct_area_textfield w-input" maxlength="256" name="field" data-name="Field" placeholder="Inserisci CAP o Comune" id="field" required=""><input type="submit" value="Submit" data-wait="Please wait..." class="submit-button homepage w-button"></div>
      <div class="searched_area_doct_container">
        <div id="w-node-c5187a05011f-bc1af318" class="visite_doctor_card searched">
          <div class="doctor_data_container">
            <div class="professionist_image_container"><img src="../images/img50003193.jpg" alt="" class="professionist_image"></div>
            <div class="preofessionist_name">Paolo Colamussi</div>
            <div class="professionist_title">Primario Radiologia</div><a href="#" class="button gradient view_profile_popup w-button">View Profile</a></div>
        </div>
        <div class="visite_doctor_card searched">
          <div class="doctor_data_container">
            <div class="professionist_image_container"><img src="../images/img50003193.jpg" alt="" class="professionist_image"></div>
            <div class="preofessionist_name">Paolo Colamussi</div>
            <div class="professionist_title">Primario Radiologia</div><a href="#" class="button gradient view_profile_popup w-button">View Profile</a></div>
        </div>
        <div class="visite_doctor_card searched">
          <div class="doctor_data_container">
            <div class="professionist_image_container"><img src="../images/img50003193.jpg" alt="" class="professionist_image"></div>
            <div class="preofessionist_name">Paolo Colamussi</div>
            <div class="professionist_title">Primario Radiologia</div><a href="#" class="button gradient view_profile_popup w-button">View Profile</a></div>
        </div>
        <div class="visite_doctor_card searched">
          <div class="doctor_data_container">
            <div class="professionist_image_container"><img src="../images/img50003193.jpg" alt="" class="professionist_image"></div>
            <div class="preofessionist_name">Paolo Colamussi</div>
            <div class="professionist_title">Primario Radiologia</div><a href="#" class="button gradient view_profile_popup w-button">View Profile</a></div>
        </div>
      </div>
    </div>
  </div>

  <div data-w-id="40862192-8e71-0551-b216-58e7628aa844" style="opacity:0;display:none" class="dcotor_quick_profile">
    <div data-w-id="6b5cd1c4-19f2-7ebc-d792-12356d83a781" class="closer"></div>
    <div data-w-id="b88c765e-8d96-8fd7-3c58-f3ce706f004a" style="opacity:0;-webkit-transform:translate3d(0, 10%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, 10%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, 10%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, 10%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0)" class="quick_profile_container" id="doctor_details">
      <!-- Quick view profile -->
    </div>
  </div>

  <div data-w-id="66c0daf9-02db-a5aa-e005-bf5a69c766b4" style="opacity:0;display:none;overflow:auto;" class="vselect_visite">
    <div data-w-id="bd51dcae-105d-cd54-8ec7-3cbfe34cfd52" style="opacity:0;-webkit-transform:translate3d(0, 10%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, 10%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, 10%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, 10%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0)" class="vvisite_container">
      <div class="close_btn" data-w-id="19fb11a3-3d75-27c7-7e95-8027996dc7f3"><img src="https://uploads-ssl.webflow.com/5d8cfd454ebd737ac1a48727/5d9d869b12f8e2378f12b8e3_Path%20175.svg" alt="" class="image-27"/></div>
      <div class="text-block-18">SELEZIONA IL TIPO DI VISITA</div>
      <div class="visite_list" id="visite_list">

          <div class="visite">
            <div class="text-block-19">Ecografia dei linfonodi inguinali</div>
          </div>

        </div>
      <div class="div-block-21"><a data-w-id="b43e47dd-7c65-be78-38e5-acfdfa158bbe" href="#" class="button-3 next close w-button">Close</a><a data-w-id="1c60da1f-0e40-aad4-c0c8-20980471ab4a" href="#" class="button-3 next w-button" style="padding-right:100px;">Continua</a></div>
    </div>
    <div data-w-id="19fb11a3-3d75-27c7-7e95-8027996dc7f3" class="closer"></div>
  </div>
  <div data-w-id="c63fef3a-23b1-f70c-9014-2968db2eacbb" style="display:none;opacity:0" class="vselect_doctor">
    <div data-w-id="33cdd347-afe1-85b8-dddd-e96494f0f01b" style="-webkit-transform:translate3d(0, 10%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, 10%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, 10%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, 10%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);opacity:0" class="vdoctor_container">
      <div class="text-block-18">SELEZIONA PROFESSIONISTA</div>
      <div class="div-block-19">
        <div class="div-block-20" id="load_doctors">
          
          
        </div>
      </div>

      <div class="div-block-25">
        <form action="/checkout.php?book_visit" method="get">
          <input type="text" name="book_visit" id="book_visit" style="display:none;"> 
          <input type="text" name="book_doctor" id="book_doctor" style="display:none;"> 
          <a data-w-id="deac175c-85b0-7104-4736-171b0c9ce4da" href="#" class="button-3 next odd w-button">Indietro</a>
          <input type="submit" href="#" class="button-3 next w-button" style="padding-right:100px;" value="Continua">
        </form>
        
        
      </div>
    </div>
    <div data-w-id="d1769b47-b536-ea11-3350-e5df432dbf52" class="closer"></div>
  </div>
  <div class="login_alert">
    <div data-w-id="6442a0e1-ecb3-7c36-de0a-5ddd0865f2f8" class="closer"></div>
    <div class="div-block-22"><img src="../images/upload_1.svg" width="38" alt="" class="image-19">
      <div class="text-block-15">Please Login to Continue</div><a href="#" class="button gradient redirect-to-login w-button">Click here to Login</a></div>
  </div>
  <?php include '../cta_cards.php';?>
  <?php include '../footer.php';?>
  <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.4.1.min.220afd743d.js" type="text/javascript" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script src="../js/webflow.js?v=1" type="text/javascript"></script>
  <!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
  <div id="fb-root"></div>
  <script async="" defer="" crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v4.0"></script>
  <script>
$(document).ready(function(){
   $('.searching_doct_area_textfield').focusin(function(){
        $('.searched_area_doct_container').addClass('open');search_doct_area
   });
   $('.searching_doct_area_textfield').focusout(function(){
      $('.searched_area_doct_container').removeClass('open');
   });
   $('.select_button').click(function(){
        $('.selected_tick').removeClass("selected_true");
        $(this).parent().siblings(".professionist_image_container").find('.selected_tick').addClass("selected_true");
   });
      $('.visite').click(function(){
        $('.visite').removeClass("visite_selected_true");
        $(this).addClass("visite_selected_true");
   });
   $('.scroll.left').click(function () {
      var leftPos = $('.doctors_main_container').scrollLeft();
      $('.doctors_main_container').animate({
         scrollLeft: leftPos + 300
     }, 350);
   });
   $('.scroll.right').click(function () {
      var leftPos = $('.doctors_main_container').scrollLeft();
      $('.doctors_main_container').animate({
         scrollLeft: leftPos - 300
     }, 350);
   });
});
</script>
<style>
.slect_visit_first{              
  position: relative;
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  width: 100%;
  height: 250px;
  padding-right: 45px;
  padding-bottom: 0px;
  padding-left: 45px;
  -webkit-box-pack: center;
  -webkit-justify-content: center;
  -ms-flex-pack: center;
  justify-content: center;
  -webkit-box-align: center;
  -webkit-align-items: center;
  -ms-flex-align: center;
  align-items: center;
  border-radius: 20px;
  background-color: #ffe6e6;
  grid-column: 2 / 3;
}
.slect_visit_first span{
  font-family: Poppins, sans-serif;
  color: #00285c;
  font-size: 20px;
}
</style>

<script>
  function getDoctor_details(value, name){
    showHint(value);    
    $('#book_visit').val(name);
    $('#book_doctor').val('');
    var xmlhttp2 = new XMLHttpRequest();
    xmlhttp2.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("load_doctors").innerHTML = this.responseText;
      }
    };
    xmlhttp2.open("GET", "../getDoctor2.php?q=" + name, true);
    xmlhttp2.send();
  }
  function setDoctor(val, id){
    $('#book_visit').val(val);
    $('#book_doctor').val(id);
  }
</script>
  <?php include ("../google_analytic.php")?>
</body>
</html>