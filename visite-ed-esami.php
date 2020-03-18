<?php session_start(); ?>
<!DOCTYPE html>
<html data-wf-page="5daa262de3e3f012851af311" data-wf-site="5d8cfd454ebd737ac1a48727">
<head>
  <meta charset="utf-8">
  <title>Services</title>
  <meta content="Services" property="og:title">
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
    xmlhttp2.open("GET", "getDoctor.php?q=" + value, true);
    xmlhttp2.send();
  }
  function setDoctor(val){
    $('#book_doctor').val(val);
  }
</script>
</head>
<body>
  <?php include 'header.php';?>
  <div class="masthead services">
    <div class="custom_container masthead_content_container service">
      <div>
        <h1 class="heading-4">Visite ed esami</h1>
      </div>
      <div class="w-embed">
        <style>
		.search.team{
    		backdrop-filter: blur(10px);
    }
</style>
      </div>
      <div class="div-block-8 another">
        <div class="div-block-51">
          <div class="search team">
            <div class="form-block w-form">
              <form id="Search_form" name="email-form" action="search-result.php" method="get" class="form">
                <input type="text" class="text-field _2 services_list_footer w-input" autocomplete="off" maxlength="256" name="search" data-name="Name 2" placeholder="Ricerca il tipo di visita / esame" id="name-2" required="">
                <input type="submit" value="Search" data-wait="Search" class="submit-button visit w-button">
              </form>
              <div class="w-form-done"></div>
              <div class="w-form-fail"></div>
            </div>
            <div class="homepage_search_help visite_ed_esame">
              <div class="visitie_search_help_item">
                <div class="text-block-56">Ecografia Dell Collo</div>
              </div>
              <div class="visitie_search_help_item">
                <div class="text-block-56">Ecografia Dell Collo</div>
              </div>
              <div class="visitie_search_help_item">
                <div class="text-block-56">Ecografia Dell Collo</div>
              </div>
              <div class="visitie_search_help_item">
                <div class="text-block-56">Ecografia Dell Collo</div>
              </div>
              <div class="visitie_search_help_item">
                <div class="text-block-56">Ecografia Dell Collo</div>
              </div>
              <div class="visitie_search_help_item">
                <div class="text-block-56">Ecografia Dell Collo</div>
              </div>
              <div class="visitie_search_help_item">
                <div class="text-block-56">Ecografia Dell Collo</div>
              </div>
              <div class="visitie_search_help_item">
                <div class="text-block-56">Ecografia Dell Collo</div>
              </div>
              <div class="visitie_search_help_item">
                <div class="text-block-56">Ecografia Dell Collo</div>
              </div>
            </div>
          </div><a href="tel:3357798844" class="button stroked m_b servc w-button">Chiamaci</a></div>
      </div>
    </div>
  </div>
  <div class="section-7">
    <div class="custom_container diff">
      <div class="content_grid">
        <h2 class="heading-2 diff">Mobidoc Ospedale a domicilio</h2>
        <p class="paragraph">
        Mobidoc è stato pensato come un’organizzazione sanitaria, un ambulatorio o un piccolo ospedale a domicilio. I nostri professionisti sono medici, psicologi, infermieri, fisioterapisti e tecnici di radiologia che credono che in alcune circostanze la migliore cura possibile sia quella a casa del paziente: siamo noi che veniamo da te quando ne hai bisogno.
      </p>
      </div>
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
            xmlhttp.open("GET", "getVisits.php?q=" + str, true);
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
    </div>
	
	<!--start-->
	<?php
	include 'connect.php';
	
	if($conn === false){
		die("ERROR database");
	}
	$sql = "select * from visit order by visit_type_name_count desc";
  $result = mysqli_query($conn, $sql);
            
	while($rows = mysqli_fetch_array($result)){
	$visit_name = $rows['visit_name'];
	$body_text = $rows['body_text'];
	$image = $rows['image'];
  $link = $rows['link'];  
  $sql2 = "select * from visit_type INNER JOIN doctor_visit on visit_type.visit_type_name = doctor_visit.visit_name where visit_type.visit_name='".$visit_name."'";
  $result2 = mysqli_query($conn, $sql2);
  $row_count = mysqli_num_rows($result2);
  if($row_count){
  ?>
  
    <div class="service_container">
      <div id="w-node-9ebfabc602d8-851af311" class="service_maine_card"><img src="<?php echo $image;?>" alt="" class="service_main_icon">
        <h3 class="service_main_name" style="width:90%; margin-left:3.5%;"><strong><?php echo $visit_name;?> a Domicilio</strong></h3>
        <p class="service_main_description" style="height:200px; overflow:hidden;"><?php echo $body_text;?></p>
        <div class="div-block-9">
          <a href="#" class="button gradient service_main_book w-button" data-name="<?php echo $visit_name;?>" onClick="showHint(this.getAttribute('data-name'))">Prenota online</a>
          <a href="<?php echo $link;?>" class="button service_main_learn_more w-button">Scopri di più</a>
        </div>
      </div>
      <div class="service_type_card">
        <div class="text-block-7"><span class="service_text_underline"><?php echo $visit_name;?></span></div>
        <div class="type_of-service_grid">      	
		<?php
			//$sql2 = "select * from visit_type where visit_name='".$visit_name."'";
			$sql2 = "select DISTINCT doctor_visit.visit_name from visit_type INNER JOIN doctor_visit on visit_type.visit_type_name = doctor_visit.visit_name where visit_type.visit_name='".$visit_name."'";
			//$sql2 = "select doctor_visit.visit_name, doctor_visit.price from doctor_visit INNER JOIN visit_type on;
			$result2 = mysqli_query($conn, $sql2);
      
			while($rows2 = mysqli_fetch_array($result2)){
        $visit_type_name = trim($rows2['visit_name']," ");
				$visit_name_2 = '"'.$visit_name.'", "'.$visit_type_name.'"'; 
				echo "<div class='sub_service' onClick='get_visit_Doctors(".$visit_name_2.");' >";
				echo "<div class='sub_service_text'>";
				echo $visit_type_name;
				echo"</div>";
				echo "<div class='price'>";
        echo "<div class='text-block-55'>A Partire da</div>";       
        $sql3 = "select MIN(price) from doctor_visit where visit_name ='".$visit_type_name."'";
        $result3 = mysqli_query($conn, $sql3);
        $rows3 = mysqli_fetch_array($result3);
        $price = $rows3[0];
        echo "<div class='price_text'>€$price</div>"; 
				echo "</div>";
				echo "</div>";
			}
        ?>
          
        </div>
      </div>
    </div>
	<?php }} mysqli_close($conn);?>
	<!--end-->
  </div>
  <div data-w-id="9da09dce-74fd-48c2-3856-6fbbf1fa1101" style="display:none;opacity:0" class="select_visite">
    <div data-w-id="cd023d65-eafd-6990-97f3-f7f1d70c1f35" class="closer"></div>
    <div data-w-id="74b504a4-434f-f3ca-0eff-3cc62dc83f42" style="-webkit-transform:translate3d(0, 10%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, 10%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, 10%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, 10%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);opacity:0" class="visite_select_container">
      <div class="close_btn" data-w-id="59f2a1ad-911e-85f4-e6eb-5c357ae648d4"><img src="https://uploads-ssl.webflow.com/5d8cfd454ebd737ac1a48727/5d9d869b12f8e2378f12b8e3_Path%20175.svg" alt="" class="image-27"/></div>
      <div class="text-block-18">SELEZIONA IL TIPO DI VISITA</div>
      
        <div class="visite_list" id="visite_list">
          
        </div>
      
      <div class="div-block-21"><a data-w-id="59f2a1ad-911e-85f4-e6eb-5c357ae648d4" href="#" class="button-3 next close odd w-button">Close</a><a data-w-id="edfe7a79-7498-a90d-618f-cd9c0d79fac8" href="#" class="button-3 next w-button" style="padding-right:100px;">Continua</a></div>
    </div>
  </div>
  <div data-w-id="e63c0446-c4e2-04c7-011e-cc7eda105d92" class="select_doctor">
    <div data-w-id="18c3de8b-b737-4d7d-bc89-c71022690854" class="closer"></div>
    <div data-w-id="815eebd5-c0bb-d447-59df-ebd85e4eeccd" style="-webkit-transform:translate3d(0, 10%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, 10%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, 10%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, 10%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);opacity:0" class="select_doctor_container">
      <div class="text-block-18">SELEZIONA PROFESSIONISTA</div>
      <div class="div-block-19">
        <div class="div-block-20" id="load_doctors">

          <div class="professionist_card-2 selecting">
            <div class="professionist_image_container"><img src="https://d3e54v103j8qbb.cloudfront.net/plugins/Image/assets/placeholder.60f9b1840c.svg" alt="" class="professionist_image">
              <div class="selected_tick"><img src="images/Path-107.svg" width="55" alt="" class="image-4"></div>
            </div>
            <div class="preofessionist_name">Paolo Colamussi</div>
            <div class="professionist_title">Primario Radiologia</div>
            <div class="button_container"><a href="#" class="button-3 gradient select_button w-button">Select</a><a href="#" class="button-3 w-button">View Profile</a></div>
          </div>
          
        </div>
      </div>
      
      <div class="div-block-25">
        <form action="checkout.php?book_visit" method="get">
          <input type="text" name="book_visit" id="book_visit" style="display:none;"> 
          <input type="text" name="book_doctor" id="book_doctor" style="display:none;"> 
          <a data-w-id="365b64cd-1aba-0309-c567-e78f0e672a65" href="#" class="button-3 next odd w-button">Indietro</a>
          <button href="checkout.php" class="button-3 next w-button" style="padding-right:100px;">Continua</button>
        </form>
      </div>
    </div>
  </div>
  <div class="login_alert">
    <div data-w-id="6442a0e1-ecb3-7c36-de0a-5ddd0865f2f8" class="closer"></div>
    <div class="div-block-22"><img src="images/upload_1.svg" width="38" alt="" class="image-19">
      <div class="text-block-15">Please Login to Continue</div><a href="#" class="button gradient redirect-to-login w-button">Click here to Login</a></div>
  </div>
  <?php include 'cta_cards.php';?>
  <?php include 'footer.php';?>

  <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.4.1.min.220afd743d.js" type="text/javascript" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script src="js/webflow.js" type="text/javascript"></script>
  <!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
  <div id="fb-root"></div>
  <script async="" defer="" crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v4.0"></script>
  <script>
	$(document).ready(function(){
  	 $('.visite').click(function(){
        $('.visite').removeClass("c");
        $(this).addClass("visite_selected_true");
   });
   $('.select_button').click(function(){
        $('.selected_tick').removeClass("selected_true");
        $(this).parent().siblings(".professionist_image_container").find('.selected_tick').addClass("selected_true");
   });
  });
</script>
<script>
  function get_visit_Doctors(str, visit_name) {
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
            xmlhttp.open("GET", "getVisits.php?q=" + str, true);
            xmlhttp.send();
          }      
          
          setTimeout( function(){ 
                var visite_count = $('.visite_list').children('.visite').length;
                
                if(visite_count < 6){
                  $('.visite').css('margin-bottom','15px');
                  $('.visite_list').css('display','block'); 
                  $('#book_visit').val(visit_name);                
                  $('#book_doctor').val('');                
                } else {
                  $('.visite').css('margin-bottom','0px');
                  $('.visite_list').css('display','grid'); 
                  $('#book_visit').val(visit_name);                
                  $('#book_doctor').val('');  
                }
              }, 100); 
              getDoctors(visit_name);                   
        }
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
</body>
</html>