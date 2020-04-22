<?php session_start();
	if(!isset($_SESSION['doctor_email']))
	{
		header("Location: login.php");
  }

  include '../connect.php';
  $sql3 = "select * from doctor_profile where email ='".$_SESSION['doctor_email']."'";
  $result3 = mysqli_query($conn, $sql3);
  $rows3 = mysqli_fetch_array($result3); 
?>
<!DOCTYPE html>
<html data-wf-page="5daae10f508f046541f51898" data-wf-site="5d8cfd454ebd737ac1a48727">
<head>
  <meta charset="utf-8">
  <title>Profile</title>
  <meta content="Profile" property="og:title">
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
  .open{
    height:auto;
  }
</style>
<script>
  function complete_visit(value,value2,value3,value4){  
    var a =  "complete_visit.php?pid=" + value + "&b=" +value2+ "&d=" +value3+ "&p=" +value4;
    window.location.href=a;
    /*var xmlhttp2 = new XMLHttpRequest();
    xmlhttp2.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        setTimeout(function(){ location.reload(); }, 500);        
      }
    };
    xmlhttp2.open("GET", "complete_visit.php?pid=" + value + "&b=" +value2+ "&d=" +value3+ "&p=" +value4, true);
    xmlhttp2.send();*/
  }
  function complete_visit_cash(value,value2){
    var xmlhttp2 = new XMLHttpRequest();
    xmlhttp2.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        setTimeout(function(){ location.reload(); }, 500);        
      }
    };
    xmlhttp2.open("GET", "complete_visit_cash.php?q=" + value + "&c=" +value2, true);
    xmlhttp2.send();
  }
</script>
</head>
<body>
  
  <?php include '../header-prof.php';?>  
  <div class="master_head profile">
    <div class="custom_container prfo_profile_head">
      <div class="prof_data_container">
	  
        <div class="prof_profile_image_container">
                    
          <div class="image-21" style="width:100%; height:100%; background: url('<?PHP echo $photo;?>'); background-position:center; background-size:cover;"></div>
        </div>
        <div class="div-block-58">
          <h1 class="prof_name"><?PHP echo $fname." ".$lname;?></h1>
          <div class="text-block-61"><?PHP echo $title;?></div>
        </div>
      </div>
      <div class="cover_section_buttons_container"><a href="logout.php" class="button-9 stroked cover_btns logout w-button">Esci</a></div>
    </div>
  </div>

  <section class="section-32">
    <div class="custom_container prof_accoutn_data">
      <div class="appointments">
        <h2 class="heading-20">Le tue Visite</h2>
        <div class="appointments_container">
          
        <?php        
          include '../connect.php';
          $sql = "select * from bookings where doctor_id ='".$rows3['doctor_id']."' order by booking_id desc";
          $result = mysqli_query($conn, $sql);     
          $count = mysqli_num_rows($result);
          if($count < 1){          
        ?>
          <div class="appointment" style="display:block;">            
            <div class="data_container" >
              <span class="paziente_name" style="font-size:18px;">Non hai prenotazioni.</span>             
            </div>            
          </div>
        <?php } else {?>

          <?php 
          while($rows = mysqli_fetch_array($result)){
            $price = $rows['price'];
            $payment_status = $rows['payment_status'];
            $booking_id = $rows['booking_id'];

            if($payment_status == 0){
              $payment_status = "Authorized, Not Captured";
            }
            if($payment_status == 1){
              $payment_status = "Authorized, Payment Captured";
            }
            $visit_name = $rows['visit_name'];
            $message = $rows['message'];
            $date_of_booking = $rows['date_of_booking'];
            $date_of_booking_string = "'".$date_of_booking."'";
            //Patient Rows
            $patient_id = $rows['patient_id'];            
            $patient_sql = "select * from paziente_profile where paziente_id ='".$patient_id."'";
            $patient_sql_result = mysqli_query($conn, $patient_sql);     
            $patient_rows = mysqli_fetch_array($patient_sql_result);

            //Doctor Rows
            $doctor_id = $rows['doctor_id'];
            $doctor_sql = "select * from doctor_profile where doctor_id ='".$doctor_id."'";
            $doctor_sql_result = mysqli_query($conn, $doctor_sql);     
            $doctor_rows = mysqli_fetch_array($doctor_sql_result);
        ?>
          
          <div class="appointment">
            <div class="div-block-61">
              <div class="patient_profile_image" style="position:relative;">
              <?php if($rows['doctor_booking_status'] == 1 && $rows['patient_confirmation'] == 0){ ?>
                  <div class="booking_completed done" style="background-color: rgba(255, 221, 0, 0.5);"><img src="../images/Path-107.svg" width="59" alt=""></div>              
              <?php } ?> 
              <?php if($rows['doctor_booking_status'] == 1 && $rows['patient_confirmation'] == 1){ ?>
                  <div class="booking_completed done" style="background-color: rgba(73, 255, 155, 0.51);"><img src="../images/Path-107.svg" width="59" alt=""></div>              
              <?php } ?> 
                <div style="background:red; width:100%; height:100%; background:url('<?php echo "../paziente/".$patient_rows['photo']?>') no-repeat center center / cover;"></div>
              </div>
              <div class="price_container">
                <div class="text-block-65">Prezzo Visita</div>
                <div class="price_euro"><span class="text-span-5"></span><?php echo '€ '.$price;?></div>
              </div>
            </div>
            <div class="data_container">
              <h3 class="paziente_name"><?php echo $patient_rows['first_name']." ".$patient_rows['last_name']?></h3>
              <div class="paziente_data_block">
                <div class="text-block-63">Prenotato per</div>
                <div class="text-block-62"><?php echo $visit_name;?></div>
              </div>
              <div class="paziente_data_block">
                <div class="text-block-63">Indirizzo</div>
                <div class="text-block-64"><?php echo $patient_rows['via']; ?><br><?php echo $patient_rows['civico'].", ".$patient_rows['comune'];?> <br><?php echo $patient_rows['province']." ".$patient_rows['cap']; ?></div>
              </div>
            </div>

            <div class="appoint_buttons_container">
              <a href="tel:<?php echo $patient_rows['phone'];?>" class="button-5 w-button">Chiama Paziente</a>
              <a href="#" class="button-5 faded diff w-button view_details_button" >Vedi Dettagli Visita</a>
              <?php if($rows['doctor_booking_status'] == 0){ ?>
              <a data-w-id="5287ebc5-906c-b8a2-9414-a7b9a3835c86" href="#" class="button-5 visit_complete w-button">Visita Completata</a>
              <?php } ?>
              <div data-w-id="5287ebc5-906c-b8a2-9414-a7b9a3835c88" class="confirm diff">
                <div style="-webkit-transform:translate3d(0, 20%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, 20%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, 20%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, 20%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);opacity:0" class="confirm_prompt">
                  <div class="text-block-66">Sei sicuro di volere confermare questa visita come completata?</div>
                  <div class="div-block-63">
                    <a href="#" class="button-5 no w-button">Cancella</a>
                    <?php if($rows['payment_mode'] == 'Online'){ ?>
                    <a href="#" class="button-5 yes w-button" onClick="complete_visit(<?php echo $patient_id.','.$booking_id.','.$date_of_booking_string.','.$price;?>)">Conferma</a>
                    <?php } ?>
                    <?php if($rows['payment_mode'] == 'Contanti'){ ?>
                    <a href="#" class="button-5 yes w-button" onClick="complete_visit_cash(<?php echo $patient_id.','.$booking_id;?>)">Conferma</a>
                    <?php } ?>
                  </div>
                </div>
              </div>
            </div>            
            <div id="w-node-a7b9a3835c91-41f51898" class="div-block-60">
              <div class="paziente_data_block">
                <div class="text-block-63">Email</div>
                <div class="text-block-64"><?php echo $patient_rows['email'];?></div>
              </div>
              <div class="paziente_data_block">
                <div class="text-block-63">Data</div>
                <div class="text-block-64"><?php echo $date_of_booking; ?></div>
              </div>
              <div class="paziente_data_block">
                <div class="text-block-63">Pagamento</div>
                <div class="text-block-64"><?php echo ucwords($rows['payment_mode']);?> </div>
              </div>
              <?php if($rows['payment_mode'] == 'online'){ ?>
              <div class="paziente_data_block">
                <div class="text-block-63">Payment Status</div>
                <div class="text-block-64"><?php echo $payment_status;?> </div>
              </div>
              <?php } ?>
              <div class="paziente_data_block">
                <div class="text-block-63">Messaggio </div>
                <div class="pateint_message">
                  <div class="text-block-64 diff"><?php echo $rows['message'];?> </div>
                </div>
              </div>
            </div>
          </div>
        
        <?php } ?>
        <?php }?>
        </div>
      </div>
      <div id="w-node-9d0132f6eb49-41f51898" class="site_nav">
        <h2 class="heading-20 diff">Gestisci Profilo</h2>
        <div class="nav_container">
		  <a href="edit-un-profilo.php?email=<?php echo urlencode($email);?>" class="button-5 faded w-button">Modifica Profilo</a>
		  <a href="<?php echo $doctor_id_link;?>" target="_blank" class="button-5 faded w-button">Vedi Profilo</a>
		  <!--<a href="#" class="button-5 faded w-button">Cambia Password</a>-->
		</div>
      </div>
    </div>
  </section>
  <?PHP include '../footer.php' ?>
  <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.4.1.min.220afd743d.js" type="text/javascript" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script src="../js/webflow.js" type="text/javascript"></script>
  <!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
  <div id="fb-root"></div>
  <script async="" defer="" crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v4.0"></script>
  <script>
              $(document).ready(function(){
                $('.view_details_button').click(function(){
                  $(this).parent().siblings('.div-block-60').toggleClass('open');
                });
                $(".footer").addClass('prof');
              });
            </script>
  <?php include ("../google_analytic.php")?>
</body>
</html>