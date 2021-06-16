<?php session_start();

	if(!isset($_SESSION['paziente_email']))
	{
		header("Location: login.php");
  }
	if (isset($_GET['pnc']) && !empty($_GET['pnc'])){
        $_SESSION['pat_id']=$_GET['pnc'];
        $redirect_url = '/paziente/patient-account.php?pid='.$_GET['pnc'];
        header('Location:'.$redirect_url);
    }

  $email_of_contact = $_SESSION['paziente_email'];

  include '../connect.php';
  $sql3 = "select * from contact_profile where email ='".$email_of_contact."'";
  $result3 = mysqli_query($conn, $sql3);
  $rows3 = mysqli_fetch_array($result3);



  if (isset($_GET['pcheckout']) && $_GET['pcheckout']==1){
      unset( $_SESSION[ 'book_visits' ] );
      unset( $_SESSION[ 'pat_id' ] );
  }

?>

<!DOCTYPE html>
<!--  This site was created in Webflow. http://www.webflow.com  -->
<!--  Last Published: Sun Oct 20 2019 06:38:26 GMT+0000 (UTC)  -->
<html data-wf-page="5daa262de3e3f009c21af325" data-wf-site="5d8cfd454ebd737ac1a48727">
<head>
  <meta charset="utf-8">
  <title>profile</title>
  <meta content="profile" property="og:title">
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
/*****************************************/	  
@media screen and (max-width: 991px){	  
.body-8 a.list_item.diff {
    width: 282px;
   margin: 10px auto 0 auto;
}		  
	  }
	  
</style>
<script>
  function remove_visit(value,value2){
    var xmlhttp2 = new XMLHttpRequest();
    xmlhttp2.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        setTimeout(function(){ location.reload(); }, 500);   
      }
    };
    xmlhttp2.open("GET", "remove_visit.php?q=" + value + "&c=" +value2, true);
    xmlhttp2.send();
  }
</script>
</head>
<body class="body-8">
<?php include '../header.php';?>
  <div class="masthead patient_account">
    <div class="custom_container profile_cover_container">
      <div class="patient_data_container">
        <div class="patient_profile_image_container">
          <div id="dp" class="image-20" style="width:100%; height:100%; background: url('<?PHP echo $photo;?>'); background-position:center; background-size:cover;"></div>
        </div>
        <div class="patient_name"><?php echo $fname." ".$lname?></div>
      </div>
      <div class="cover_section_buttons_container">
        <a href="logout.php" class="button stroked cover_btns logout w-button">Esci</a>
      </div>
    </div>
  </div>

    <div class="section-31">
     <div class="custom_container profile_account_data grid">
      <div class="my_bookings">
      <?php

      $show_self_btn = 0;

        include '../connect.php';
        $sql = "select * from paziente_profile where contact_id ='".$rows3['id']."' order by paziente_id desc";
        $result = mysqli_query($conn, $sql);     
        $count = mysqli_num_rows($result);

        if($count < 1){
      ?>

        <div class="no_booking_prompt" style="display:flex;">
          <h2 class="heading-19">Al momento non hai pazienti da visualizzare.</h2>
          <div class="div-block-57"><a href="patient-profile.php" class="button gradient w-button">Aggiungi nuovo paziente</a><a href="tel:3357798844" class="button w-button">Chiamaci</a></div>
        </div>

      <?php } else {?>

         <div>
          <h2 class="heading-18">I tuoi pazienti</h2>
          <script>
            $(document).ready(function(){
              $('.see_details').click(function(){
                $(this).parent().parent().siblings('.main_-details_container').children('.details_continer_grid').toggleClass('open');
              });
            });
          </script>

        <?php

          while($rows = mysqli_fetch_array($result)){
           $patient_name = $rows['first_name'].' '.$rows['last_name'];

            if ($rows['contact_as_patient'] == 1){
                $show_self_btn = 1;
            }
        ?>
        <div class="booking_card">
            <div class="main_data_container">
              <div class="top_section">
                <div class="doctor_profile_image">
                  <div style="background:red; width:100%; height:100%; background:url(/images/Group-556.jpg) no-repeat center center / cover;"></div>
                </div>
                <div class="booking_main_data">
                  <div class="booking_name"><?=$patient_name?></div>

                  <div class="doctor_name_data_container">
                    <div class="titlo">Codice fiscale:</div>
                    <div class="doctor_name"><?=$rows['fiscale']?></div>
                  </div>
                 <div class="doctor_name_data_container">
                  <div class="titlo">E-mail:</div>
                  <div class="doctor_name"><?=$rows['email']?></div>
                 </div>
                 <div class="doctor_name_data_container">
                  <div class="titlo">Data di nascita:</div>
                  <div class="doctor_name">
                    <?php
                    if (!empty($rows['dob'])){
                      echo date("d/m/Y", strtotime($rows['dob']));;
                    }
                    ?>
                  </div>
                 </div>
                 <br>
                </div>
                <div class="booking_card_buttons">
                  <a href="patient-account.php?pid=<?=$rows['paziente_id']?>" class="button gradient see_details w-button">Prenotazioni</a>
                  <br>
                 <a href="patient-profile.php?pid=<?=$rows['paziente_id']?>" class="button gradient see_details w-button">Modifica</a>

                </div>
              </div>
            </div>
        </div>
        <?php } ?>
        </div>

      <?php  }?>

      </div>
      <div id="w-node-605318334e24-c21af325" class="site_nav_cta">
        <h3 class="heading-17">Esplora Mobidoc</h3>
        <div class="nav_list">
          <a href="patient-profile.php" class="list_item diff w-inline-block">
            <div class="blue_bulet"></div>
            <div class="text-block-58">Aggiungi nuovo paziente</div>
          </a>

            <?php
            if ($show_self_btn == 0){
            ?>
            <a href="patient-profile.php?contact-id=<?php echo $rows3['id']?>" class="list_item diff w-inline-block add_self">
                <div class="blue_bulet"></div>
                <div class="text-block-58">Sii paziente</div>
            </a>

            <?php }?>

         <a href="/paziente/profile-edit.php" class="list_item diff w-inline-block">
          <div class="blue_bulet"></div>
          <div class="text-block-58">Modifica Dettagli Personali</div>
         </a>
          <a href="tel:3357798844" class="list_item diff w-inline-block">
            <div class="blue_bulet"></div>
            <div class="text-block-58">Chiama Servizio Clienti</div>
          </a>
          <a href="../team-mobidoc.php" class="list_item diff w-inline-block">
            <div class="blue_bulet"></div>
            <div class="text-block-58">Chi Siamo</div>
          </a>
          <a href="../comuni-serviti.php" class="list_item diff w-inline-block">
            <div class="blue_bulet"></div>
            <div class="text-block-58">Copertura Servizi</div>
          </a>
        </div>
      </div>

      </div>
    </div>

  <?php include '../footer.php';?>


  <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.4.1.min.220afd743d.js" type="text/javascript" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script src="../js/webflow.js" type="text/javascript"></script>
  <!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
  <div id="fb-root"></div>
  <script async="" defer="" crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v4.0"></script>

<?php include ("../google_analytic.php")?>
</body>
</html>