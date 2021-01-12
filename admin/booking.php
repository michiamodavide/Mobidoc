<?php session_start();
  if(!isset($_SESSION['adminlogin']))
  {
    header("Location: login.php"); 
  } 
?>
<!DOCTYPE html>
<html data-wf-page="5dfbca93dac9929422dd9875" data-wf-site="5d8cfd454ebd737ac1a48727">
<head>
  <meta charset="utf-8">
  <title>Booking</title>
  <meta content="Booking" property="og:title">
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
  .filter_options a{
    text-decoration:none;
    color:#00285c;
  }
</style>
  <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
  <script>
    $(document).ready(function(){
      $('.filter_options a').click(function(e){
	      var location = $(this).attr('href');
        e.preventDefault();
        setTimeout(function(){window.location.href=location},400);
      });

      $('.top a').click(function(e){
	      var location = $(this).attr('href');
        e.preventDefault();
        setTimeout(function(){window.location.href=location},450);
      });
    });
  </script>
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
  <div class="admin_main_section">
    <div data-w-id="671d7027-6f87-1c3f-c474-3b17f4b83b06" style="opacity:1" class="admin_section_header">
      <h1 class="admin_section_heading">Pazienti</h1>
      <div class="div-block-70">
        <div class="scroll_indicator">
          <div data-w-id="98c7cd18-996f-4b08-777e-ae54e6517910" data-animation-type="lottie" data-src="https://uploads-ssl.webflow.com/5d8cfd454ebd737ac1a48727/5df9f0f25ccbf3bb4c727941_lottieflow-scrolling-01-1-00285C-easey.json" data-loop="0" data-direction="1" data-autoplay="0" data-is-ix2-target="1" data-renderer="svg" data-default-duration="2.76" data-duration="0" class="lottie-animation-3"></div>
        </div>
        <?php
           $filters = array("Default", "Data Prenotazione", "Professionista", "Contanti", "Online", "Prezzo High", "Prezzo Low");
        
           if(isset($_GET['filter'])) {
             $filter_request = $_GET['filter'];
           } else {
             $filter_request = '';
           }
   
   
           if(in_array($filter_request, $filters)){
             $filter_request = $filter_request;
           } else {
             if(isset($_GET['filter'])){
               echo '<script>window.location.href="booking.php";</script>';
             } else {
               $filter_request = 'Più recenti';
             }
           }
   
           $order_by = 'booking_id desc';
   
           switch ($filter_request) {
               case "Più recenti":
                   $order_by = 'booking_id desc';
                   break;
               case "Data Prenotazione":
                   $order_by = 'date_of_booking';
                   break;
               case "Professionista":
                   $order_by = 'doctor_id';
                   break;
               case "Contanti":
                   $order_by = 'payment_mode';
                   break;
               case "Online":
                   $order_by = 'payment_mode desc';
                   break;
               case "Prezzo High":
                   $order_by = 'price desc';
                   break;
               case "Prezzo Low":
                   $order_by = 'price';
                   break;
               default:
                   $order_by = 'booking_id desc';
           }
        ?>
        <div class="filter">
          <div data-w-id="7320a79a-376d-b137-3fb6-1394bd9614d5" class="filter_button">
            <div class="text-block-78">Filtra</div>
            <div class="filter_selected"><?php echo $filter_request?></div>
          </div>
          <div style="-webkit-transform:translate3d(0, -10%, 0) scale3d(0.8, 0.8, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, -10%, 0) scale3d(0.8, 0.8, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, -10%, 0) scale3d(0.8, 0.8, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, -10%, 0) scale3d(0.8, 0.8, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);opacity:0;display:none" class="filter_options">
            <a href="booking.php"><div class="filter_select_option">
              <div class="optien_text">Recenti (Default)</div>
            </div></a>
            <a href="booking.php?filter=Professionista"><div class="filter_select_option">
              <div class="optien_text">Professionista</div>
            </div></a>
            <a href="booking.php?filter=Contanti"><div class="filter_select_option">
              <div class="optien_text">Contanti</div>
            </div></a>
            <a href="booking.php?filter=Online"><div class="filter_select_option">
              <div class="optien_text">Online</div>
            </div></a>
            <a href="booking.php?filter=Prezzo High"><div class="filter_select_option">
              <div class="optien_text">Prezzo High</div>
            </div></a>
            <a href="booking.php?filter=Prezzo Low"><div class="filter_select_option">
              <div class="optien_text">Prezzo Low</div>
            </div></a>
          </div>
        </div><a href="logout.php" class="admin_logout w-button"></a></div>
    </div>
    <div class="section_content">
      <div class="bookings">

      <?php

        include '../connect.php';
        
        $sql = "select * from bookings order by ".$order_by."";
        $result = mysqli_query($conn, $sql);
        while($rows = mysqli_fetch_array($result)){
          $visit_name = $rows['visit_name'];
          $price = $rows['price'];
          $payment_mode = $rows['payment_mode'];
          $dateBooking = $rows['date_of_booking'];
          $pateint_id = $rows['patient_id'];
          $doctor_id = $rows['doctor_id'];
          $booking_id = 'booking-details.php?id='.$rows['booking_id'];
          $booking_status = $rows['booking_status'];  
          
          $sql2 = "select * from paziente_profile where paziente_id = '".$pateint_id."'";
          $result2 = mysqli_query($conn, $sql2);
          $rows2 = mysqli_fetch_array($result2);
          $patient_name = $rows2['first_name']." ".$rows2['last_name'];
          if($rows2['photo'] == "../images/Group-556.jpg"){
            $patient_pic = '../images/Group-563.jpg';
          } else {
            $patient_pic = "/paziente/".$rows2['photo'];
          }

          $sql3 = "select * from doctor_profile where doctor_id = '".$doctor_id."'";
          $result3 = mysqli_query($conn, $sql3);
          $rows3 = mysqli_fetch_array($result3);
          $doctor_name = $rows3['fname']." ".$rows3['lname'];
        ?>
        <div style="-webkit-transform:translate3d(0, 30%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(5DEG) skew(0, 0);-moz-transform:translate3d(0, 30%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(5DEG) skew(0, 0);-ms-transform:translate3d(0, 30%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(5DEG) skew(0, 0);transform:translate3d(0, 30%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(5DEG) skew(0, 0);opacity:0" class="bookingcard">
          <div class="booking_patent_image" style=" background-image: url('<?PHP echo $patient_pic; ?>'); overflow:hidden; position:relative;">
            <?php if($booking_status == 1){?>
            <div class="selected_tick selected_true">
                <img src="../images/Path-107.svg" width="55" alt="" class="image-4">
            </div>
            <?php }?>
          </div>
          <div class="booking_details">
            <div class="top">
              <h1 class="heading-24"><?PHP echo $patient_name; ?></h1><a href="<?php echo $booking_id;?>" class="open_booking w-button">Vedi dettagli</a></div>
            <div class="bottom">
              <div class="glance_details">
                <div class="glance_details_title">Prestazione prenotata</div>
                <div class="glance_details_value" style="line-height:25px;"><?PHP echo $visit_name; ?></div>
              </div>
              <div class="glance_details">
                <div class="glance_details_title">Prezzo</div>
                <div class="glance_details_value"><?PHP echo '€'.$price; ?></div>
              </div>
              <div class="glance_details">
                <div class="glance_details_title">Metodo di pagamento</div>
                <div class="glance_details_value"><?PHP echo $payment_mode; ?></div>
              </div>
              <div class="glance_details">
                <div class="glance_details_title">Data Prenotazione</div>
                <div class="glance_details_value"><?PHP echo $dateBooking; ?></div>
              </div>
              <div class="glance_details">
                <div class="glance_details_title">Professionista</div>
                <div class="glance_details_value"><?PHP echo $doctor_name; ?></div>
              </div>
            </div>
          </div>
        </div>
        <?php } mysqli_close($conn);?>

      </div>
      <div class="end-of-the-list">
        <div class="line-2"></div>
        <div id="w-node-aeddfed5e09f-22dd9875" class="text-block-70">Non ci sono più profili da visualizzare.</div>
        <div class="line-2"></div>
      </div>
    </div>
    <div class="menu_current w-embed w-script">
      <script>
	$(document).ready(function(){
  	$('.admin_item:nth-child(2)').addClass('current');
  });
</script>
    </div>
  </div>
  <div style="-webkit-transform:translate3d(-100%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(-100%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(-100%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(-100%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0)" class="preloader diff">
    <div style="opacity:0" class="loader diff">
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