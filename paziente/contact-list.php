<?php session_start();
	if(!isset($_SESSION['paziente_email']))
	{
		header("Location: login.php");
  }

?>
<!DOCTYPE html>
<!--  This site was created in Webflow. http://www.webflow.com  -->
<!--  Last Published: Sun Oct 20 2019 06:38:26 GMT+0000 (UTC)  -->
<html data-wf-page="5daa262de3e3f009c21af325" data-wf-site="5d8cfd454ebd737ac1a48727">
<head>
  <meta charset="utf-8">
  <title>Contact List</title>
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
.button.stroked.back-btn{
 background-color: #0000001c !important;
 border-color: #0000005c !important;
}
.button.stroked.back-btn:hover{
 background-color: hsla(0, 0%, 100%, 0.15) !important;
 border-color: hsla(0, 0%, 100%, 0.15) !important;
}
.custom_container.profile_account_data.grid{
 grid-column-gap: inherit;
 grid-row-gap: inherit;
 grid-template-columns: inherit;
}
</style>
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
       <a href="account.php" class="button stroked cover_btns logout w-button back-btn">Indietro</a>
       <a href="patient-profile.php" class="button stroked cover_btns w-button">Aggiungi Contatto</a>
        <a href="logout.php" class="button stroked cover_btns logout w-button">Esci</a>
      </div>
    </div>
  </div>


    <div class="section-31">
     <div class="custom_container profile_account_data grid">
      <div class="my_bookings">

      <?php
      $email_of_patient = $_SESSION['paziente_email'];

      include '../connect.php';
      $sql3 = "select * from paziente_profile where email ='".$email_of_patient."'";
      $result3 = mysqli_query($conn, $sql3);
      $rows3 = mysqli_fetch_array($result3);

      $sql4 = "select * from paziente_contact where paziente_id ='".$rows3['paziente_id']."'";
      $result4 = mysqli_query($conn, $sql4);
      $count4 = mysqli_num_rows($result4);

        if($count4 < 1){
      ?>
        <div class="no_booking_prompt" style="display:flex;">
         <br>
          <h2 class="heading-19">Al momento non hai contatti da visualizzare.</h2>
          <div class="div-block-57">
           <a href="patient-profile.php" class="button gradient w-button">Aggiungi Contatto</a>
          </div>
         <br>
         <br>
        </div>

      <?php } else { ?>

         <div>
          <h2 class="heading-18">I tuoi contatti</h2>
          <script>
            $(document).ready(function(){
              $('.see_details').click(function(){
                $(this).parent().parent().siblings('.main_-details_container').children('.details_continer_grid').toggleClass('open');
              });
            });
          </script>

        <?php

          while($rows = mysqli_fetch_array($result4)){
             $contact_id= $rows['id'];
             $fiscale = $rows['fiscale'];
            $email = $rows['email'];
            $first_name = $rows['first_name'];
            $last_name = $rows['last_name'];
            $dob = $rows['dob'];
            $date_of_book = $rows['dor'] ;
            $address = $rows['address'] ;

        ?>
        <div class="booking_card">
            <div class="main_data_container">
              <div class="top_section">
                <div class="doctor_profile_image">
                  <div style="background:red; width:100%; height:100%; background:url('/paziente/../images/Group-556.jpg') no-repeat center center / cover;"></div>
                </div>
                <div class="booking_main_data">
                  <div class="booking_name"><?php echo $first_name.' '.$last_name;?></div>

                  <div class="doctor_name_data_container">
                    <div class="titlo">Codice fiscale:</div>
                    <div class="doctor_name"><?php echo $fiscale?></div>
                  </div>
                 <div class="doctor_name_data_container">
                  <div class="titlo">Email:</div>
                  <div class="doctor_name"><?php echo $email?></div>
                 </div>

                 <div class="doctor_name_data_container">
                  <div class="titlo">Data di nascita:</div>
                  <div class="doctor_name">
                    <?php
                    if (!empty($dob)){
                      echo date("d/m/Y", strtotime($dob));;
                    }
                    ?>
                  </div>
                 </div>
                 <div class="doctor_name_data_container">
                  <div class="titlo">Indirizzo:</div>
                  <div class="doctor_name">
                    <?php echo $address; ?>
                  </div>
                 </div>
<br>
                </div>
                <div class="booking_card_buttons">
                 <a href="patient-profile.php?contact_id=<?php echo $contact_id?>" class="button view_profile w-button">Modifica</a>
                </div>
              </div>
            </div>
        </div>
        <?php } ?>
        </div>

      <?php  }?>

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