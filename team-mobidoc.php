<?php session_start(); ?>

<!DOCTYPE html>
<html data-wf-page="5daa262de3e3f057961af312" data-wf-site="5d8cfd454ebd737ac1a48727">
<head>
  <meta charset="utf-8">
  <title>Chi Siamo</title>
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
  
  .search_doctor {
	  border-color: #00285c;
    background-color: #00285c;}
  .serch-icon{
	  background-image: url(images/Search_icon.svg);
	  background-color: transparent !important;
	      height: 40px;
		  border:none;
		  cursor:pointer;}
		 .text-field.team {
opacity:1;
    color: #fff!important;

}

.text-field.team::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
 color: #fff!important;
  opacity: 1; /* Firefox */
}

.text-field.team:-ms-input-placeholder { /* Internet Explorer 10-11 */
  color: #c5faff;
}

.text-field.team::-ms-input-placeholder { /* Microsoft Edge */
  color: #c5faff;
}
</style>
</head>
<body class="body-7">
  <?php include 'header.php';?>
  <div class="masthead team">
    <div class="custom_container masthead_content_container service">
      <div class="div-block-52">
        <h1 class="heading-4">Chi Siamo</h1>
      </div>
      
    </div>
  </div>
  <section class="section-8">
    <div class="custom_container doc">
      <div class="content_grid">
        <h2 class="heading-2 diff">La Direzione Mobidoc</h2>
        <p class="paragraph">Il progetto nasce dalla consapevolezza che è attualmente possibile portare a casa del paziente complesse tecnologie e qualificate professionalità in percorsi di cura caratterizzati da empatia ed umanità.<br><br>Vogliamo rendere più accessibile i servizi diagnostici e le cure sanitarie, dare loro un volto di attenzione e premura evitando disagi e inutili attese in un contesto famigliare rispettoso della privacy e dei bisogni . <br><br>Vogliamo infine fare in modo che il risultato delle visite e degli esami effettuati a domicilio rimangano sempre a disposizione del paziente, non si disperdano e possano essere inseriti nei propri fascicoli sanitari. <br><br>Crediamo che sia possibile fornire un’assistenza sanitaria personalizzata, umanizzata e finalizzata a creare un’alleanza con il paziente e la sua famiglia.Puntiamo a migliorare la vostra qualità di vita.</p>
      </div>
      <div class="doctors_container">
        <style>
            @media (max-width: 600px) {
              .doctor.one {display:none;}
            } 
        </style>
        <div class="doctor one" style="visibility:hidden;"><img src="images/5ccc4a39405083b13e2f7828_WhatsApp-Image-2019-04-12-at-10.43.19-AM-p-500.jpg" width="174" alt="" class="doctor_image">
          <div class="doctor_data home">
            <div class="doctor_name_container">Paolo Colamussi</div>
            <div class="text-block-4">Medico, Coordinatore Sanitario</div>
          </div>
        </div>
        <div class="doctor"><img src="images/5ccc4a39405083b13e2f7828_WhatsApp-Image-2019-04-12-at-10.43.19-AM-p-500.jpg" width="174" alt="" class="doctor_image">
          <div class="doctor_data home">
            <div class="doctor_name_container">Paolo Colamussi</div>
            <div class="text-block-4">Medico, Coordinatore Sanitario</div>
          </div>
        </div>
        <div class="doctor"><img src="images/5ccc4a394050836b4c2f781b_IMG_1598-p-500.jpg" width="174" alt="" class="doctor_image">
          <div class="doctor_data home">
            <div class="doctor_name_container">Maddalena Pellegrini</div>
            <div class="text-block-4">Psicologa, Responsabile Qualità</div>
          </div>
        </div>
        
      </div>
    </div>
    <div class="professionist_card_container">
      <div class="w-embed">
        <style>
		.professionist_header{
    	backdrop-filter: blur(10px);
    }
	
</style>
      </div>
      <div class="professionist_header">
        <h2 class="heading-2">I PROFESSIONISTI MOBIDOC</h2>

       <div class="search_doctor search-bg">
        <div class="form-block w-form">
         <form id="Search_form" name="email-form" action="javascript:;" method="get" class="form">
          <input type="text" class="text-field team w-input text-white" autocomplete="off" maxlength="256" name="name-2" data-name="Name 2" placeholder="Cerca il professionista" id="name-2" required="">
          <input type="submit" value="Search" data-wait="Search" class="submit-button serch-icon"></form>
        </div>
       </div>

      </div>
      <div class="w-layout-grid professionist_grid">
	<?php
		include 'connect.php';
 if (isset($_SESSION['doctor_email'])) {
   $sql = "select * from doctor_profile order by doctor_id desc";
 }else{
   $sql = "select * from doctor_profile where p_type != '2' order by doctor_id desc";
 }
		$result = mysqli_query($conn, $sql);
		while($rows = mysqli_fetch_array($result)){
			$doctor_id = $rows['doctor_id'];
			$doctor_id_link = "/il-team/professionista.php?".$rows['doctor_id'];
			$photo = "professionisti/".$rows['photo'];
			$fname = $rows['fname'];
			$lname = $rows['lname'];
			$title = $rows['title'];
	?>
        <div class="professionist_card main_team">
          <div class="professionist_image_container"><img src="<?php echo $photo;?>" alt="" class="professionist_image"></div>
          <div class="preofessionist_name"><?php echo $fname. " ". $lname;?></div>
          <div class="professionist_title"><?php echo $title;?></div>
          <div class="button_container diff">
            <a href="<?php echo $doctor_id_link; ?>" target="_blank" class="button gradient vide_profilo w-button">Esplora profilo</a>
            <!--<a href="#" data-name="" onClick="get_visit_Doctors(this.getAttribute('data-name'))" class="button small w-button">Quick View</a>-->
          </div>
        </div>
    <?php
		}
		mysqli_close($conn);
	?>
      </div>
    </div>
  </section>
  
  <div data-w-id="fbb53901-a497-8fed-9aad-252e4a9dc7e3" style="opacity:0;display:none" class="dcotor_quick_profile">
    <div data-w-id="6b5cd1c4-19f2-7ebc-d792-12356d83a781" class="closer"></div>
    <div data-w-id="cecbf796-8901-fc1d-47b3-b536e08353d8" style="-webkit-transform:translate3d(0, 10%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, 10%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, 10%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, 10%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);opacity:0" class="quick_profile_container" id="doctor_details">
      
      <div class="profile_header">
        <div class="qprofile_image">
          <img src="images/img50003193.jpg" alt="" class="image-6">
        </div>
        <div class="name_y_titilo">
          <h3 class="profile_name">Paolo Colamussi</h3>
          <div class="profile_titilo">Primario Radiologia</div>
        </div><a href="#" class="button-8 stroked qprofile_visit_button w-button">Visit Profile</a><img src="images/close.svg" width="18" data-w-id="f11899b6-e8e9-0ac4-538d-1dfece0f60c3" alt="" class="close_button"></div>
      <div class="qprofile_data_container-2">
        <div class="div-block-28">
          <div id="w-node-a1e45dfd3fdc-961af312" class="left">
            <div class="text-block-22">Visite ed Esami</div>
            <div class="qprofile_visite_container">
              <div class="qprofile_visite">
                <div class="text-block-23">Ecografia dei linfonodi inguinali</div>
              </div>
              <div class="qprofile_visite">
                <div class="text-block-23">Ecografia dei linfonodi inguinali</div>
              </div>
              <div class="qprofile_visite">
                <div class="text-block-23">Ecografia dei linfonodi inguinali</div>
              </div>
              <div class="qprofile_visite">
                <div class="text-block-23">Ecografia dei linfonodi inguinali</div>
              </div>
              <div class="qprofile_visite">
                <div class="text-block-23">Ecografia dei linfonodi inguinali</div>
              </div>
              <div class="qprofile_visite">
                <div class="text-block-23">Ecografia dei linfonodi inguinali</div>
              </div>
            </div>
          </div>
          <div class="right">
            <div class="text-block-22">Comuni Serviti:</div>
            <div class="qprofile_area_grid">
              <div class="qprofile_area">
                <div class="qprofile_area_name">
                  <div class="bullets"></div>
                  <div class="text-block-24">Bondeno (FE)</div>
                </div>
                <div class="text-block-25">44012</div>
              </div>
              <div class="qprofile_area">
                <div class="qprofile_area_name">
                  <div class="bullets"></div>
                  <div class="text-block-24">Bondeno (FE)</div>
                </div>
                <div class="text-block-25">44012</div>
              </div>
              <div class="qprofile_area">
                <div class="qprofile_area_name">
                  <div class="bullets"></div>
                  <div class="text-block-24">Bondeno (FE)</div>
                </div>
                <div class="text-block-25">44012</div>
              </div>
              <div class="qprofile_area">
                <div class="qprofile_area_name">
                  <div class="bullets"></div>
                  <div class="text-block-24">Bondeno (FE)</div>
                </div>
                <div class="text-block-25">44012</div>
              </div>
              <div class="qprofile_area">
                <div class="qprofile_area_name">
                  <div class="bullets"></div>
                  <div class="text-block-24">Bondeno (FE)</div>
                </div>
                <div class="text-block-25">44012</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    
    </div>
  </div>
  <div class="section-29">
         <div class="custom_container instagram_feed">
            
            <a href="https://www.instagram.com/mobidoc.it/" target="_blank" class="social_card_lonk instagram w-inline-block">
               <div class="scl_container">
                  <img src="https://uploads-ssl.webflow.com/5d8cfd454ebd737ac1a48727/5e15d52a9ba5cbf59d45455a_insta_icon.png" width="110" alt="" class="scl_icon">
                  <div class="text-block-83">Seguici su Instagram</div>
               </div>
            </a>

            <a href="https://www.facebook.com/mobidoc.it/" target="_blank" class="social_card_lonk facebook w-inline-block">
               <div class="scl_container">
                  <img src="https://uploads-ssl.webflow.com/5d8cfd454ebd737ac1a48727/5e15d62617a0cf0456db035b_facebook_icon.png" width="54" alt="">
                  <div class="text-block-83">Seguici su Facebook</div>
               </div>
            </a>

         </div>
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
      $('.professionist_image_container img').each(function(){
        var src = $(this).attr('src');
        if(src == 'professionisti/photo/default.jpg'){          
          $(this).attr('src','images/Group-556.jpg');
        }
      });
      $(".search_doctor .text-field").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        if (value.length == 0){
          $(".search_doctor #Search_form .serch-icon").css("display", "block");
        }else {
          $(".search_doctor #Search_form .serch-icon").css("display", "none");
        }
        $(".professionist_grid .main_team").filter(function() {
          $(this).toggle($(".preofessionist_name", this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });
  </script>
  <?php include ("google_analytic.php")?>
</body>
</html>