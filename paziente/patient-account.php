<?php session_start();
	if(!isset($_SESSION['paziente_email']))
	{
		header("Location: login.php");
  }

  $pat_id = '';
   $visit_page_param = '';
  if (!empty($_GET['pid'])){
    $_SESSION['pat_id']=$_GET['pid'];
    $pat_id = $_GET['pid'];
    $visit_page_param = '?pid='.$pat_id;
  }

if (isset($_SESSION['book_visits']) && !empty($_SESSION['book_visits'])){
    $book_visit_details = $_SESSION['book_visits'];
    foreach($book_visit_details as $key => $cookie_book_visit) {
        if ($key === array_key_last($book_visit_details) && empty($cookie_book_visit['book_patient_id'])){
            $cookie_book_visit['book_patient_id']=$pat_id;
            $redirect_url = '/checkout.php?book_visit='.$cookie_book_visit['Booking_name'].'&book_doctor='.$cookie_book_visit['book_doctor'].'&article_id='.$cookie_book_visit['article_id'].'&pati_id='.$pat_id;
            header('Location:'.$redirect_url);
        }
    }
}

  $contact_email = $_SESSION['paziente_email'];

  include '../connect.php';
  $sql3 = "select * from paziente_profile where paziente_id ='".$pat_id."'";
  $result3 = mysqli_query($conn, $sql3);
  $rows3 = mysqli_fetch_array($result3);
  $patient_fname = $rows3['first_name'];
  $patient_lname = $rows3['last_name'];

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
   .back-btn{
    background-color: #00000024 !important;
   }
.back-btn:hover{
 background-color: hsla(0, 0%, 100%, 0.15) !important;
}
	  
/**********************************************************/	  
.button.gradient.see_details {

    width: 240px;

}	  
	  .button.view_profile {width: 240px;}
.body-8 .top_section {
 
    grid-column-gap: 32px;
}	  
.body-8 .patient_name {
    margin-top: 45px;
    
}	  
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
          <div id="dp" class="image-20" style="width:100%; height:100%; background: url('/images/Group-556.jpg'); background-position:center; background-size:cover;"></div>
        </div>
        <div class="patient_name"><?php echo $patient_fname." ".$patient_lname?></div>
      </div>
      <div class="cover_section_buttons_container">
       <a href="account.php" class="button stroked cover_btns logout w-button back-btn">Indietro</a>

        <a href="logout.php" class="button stroked cover_btns logout w-button">Esci</a>
      </div>
    </div>
  </div>

    <div class="section-31">
     <div class="custom_container profile_account_data grid">
      <div class="my_bookings">
        <div class="no_booking_prompt" style="display:none;">
          <h2 class="heading-19">Al momento non hai nessuna prenotazione da visualizzare.</h2>
          <div class="div-block-57"><a href="../visite-ed-esami.php<?=$visit_page_param?>" class="button gradient w-button">Visite ed Esami</a><a href="tel:3357798844" class="button w-button">Chiamaci</a></div>
        </div>


      <?php
        include '../connect.php';
        $sql = "select * from bookings where patient_id ='".$rows3['paziente_id']."' order by booking_id desc";
        $result = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($result);

        $sql2 = "select * from bookings where patient_id ='".$rows3['paziente_id']."' and pateint_remove_from_list = '1'";
        $result2 = mysqli_query($conn, $sql2);
        $count2 = mysqli_num_rows($result2);

        if($count < 1 || $count == $count2){
      ?>


        <div class="no_booking_prompt" style="display:flex;">
          <h2 class="heading-19">Al momento non hai nessuna prenotazione da visualizzare.</h2>
          <div class="div-block-57"><a href="../visite-ed-esami.php<?=$visit_page_param?>" class="button gradient w-button">Visite ed Esami</a><a href="tel:3357798844" class="button w-button">Chiamaci</a></div>
        </div>

      <?php } else {

          $sql34 = "select * from bookings where patient_id ='".$rows3['paziente_id']."'";
          $result34 = mysqli_query($conn, $sql34);
          $booking_array = mysqli_fetch_array($result34);

          $sql35 = "select * from bookings where patient_id ='".$rows3['paziente_id']."' and admin_book = '2'";
          $result35 = mysqli_query($conn, $sql35);
          $count35 = mysqli_num_rows($result35);
      if(isset($booking_array['admin_book']) && $count35 < 1){
         ?>
       <div class="no_booking_prompt" style="display:flex;">
        <h2 class="heading-19">Al momento non hai nessuna prenotazione da visualizzare.</h2>
        <div class="div-block-57"><a href="../visite-ed-esami.php<?=$visit_page_param?>" class="button gradient w-button">Visite ed Esami</a><a href="tel:3357798844" class="button w-button">Chiamaci</a></div>
       </div>
        <?php }else{?>

         <div>
          <h2 class="heading-18">Le tue prenotazioni</h2>
          <script>
            $(document).ready(function(){
              $('.see_details').click(function(){
                $(this).parent().parent().siblings('.main_-details_container').children('.details_continer_grid').toggleClass('open');
              });
            });
          </script>

        <?php

          while($rows = mysqli_fetch_array($result)){
            $booked_service_query =
              "SELECT DISTINCT bg.price, bg.total_discount, am.descrizione, am.attributo
FROM bookings bg
JOIN booked_service as bs ON bs.booking_id = bg.booking_id 
 JOIN articlesMobidoc as am ON am.id=bs.article_id
where bg.booking_id='".$rows['booking_id']."'";

            $booked_service_result = mysqli_query($conn, $booked_service_query);
            $booked_service_row = mysqli_fetch_array($booked_service_result);

            $price = $booked_service_row['price'];
            $discounted_price = $booked_service_row['total_discount'];
            $visit_name = $booked_service_row['descrizione'];
            $visit_attribute = $booked_service_row['attributo'];
            $message = $rows['message'];
            $opoint_time = $rows['apoint_time'];

            $date_of_book = $rows['date_of_booking'] ;
            $booking_id = $rows['booking_id'];
              $booking_status = $rows['booking_status'];
              $payment_mode = $rows['payment_mode'];
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

            //Executer Rows
            $refertatore_id = $rows['refertatore_id'];
            $execut_sql = "select * from doctor_profile where doctor_id ='".$refertatore_id."'";
            $execut_sql_result = mysqli_query($conn, $execut_sql);
            $execute_rows = mysqli_fetch_array($execut_sql_result);

            //auth code
            $auth_sql = "select * from payments where date_of_booking='".$date_of_book."' and patient_id='".$patient_id."'";
            $auth_sql_result = mysqli_query($conn, $auth_sql);     
            $auth_rows = mysqli_fetch_array($auth_sql_result);

            $auth_rows['authorization_id'];

            if(isset($auth_rows['authorization_id'])){
              $auth_code = "../pay/capture.php?authid=".$auth_rows['authorization_id']."&price=".$price;
            } else {
              $auth_code = "#";
            }
            

            if($rows['pateint_remove_from_list'] == 0){

        ?>
        <div class="booking_card">
            <div class="main_data_container">
              <div class="top_section">
				  
				  
				  <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td align="center"><div class="doctor_profile_image">
                  <div style="background:red; width:100%; height:100%; background:url('/images/Group-556.jpg?v=1') no-repeat center center / cover;"></div>

                </div></td>
    </tr>
    <?php
    if ($booking_status){
    ?>
    <tr>
         <td align="center">
                     <?php
                     $flag_status_txt = array('','Email Inviata','Confermato','Eseguito','Refertato','Pagato');
                     ?>
                     <div class="bok_status button-3 gradient select_button w-button" style="margin-top: 15px; width: 150px;"><?=$flag_status_txt[$booking_status]?></div>
                 </td>
    </tr>
        <?php }?>
  </tbody>
</table>
				  
                <div class="booking_main_data">
                  <div class="booking_name">
                      <?php echo $visit_name;
                      if ($visit_attribute){
                          echo ' <span style="font-weight: 400">('.$visit_attribute.')</span>';
                      }
                      ?>
                  </div>
                  <div class="doctor_name_data_container">
                    <div class="titlo">Professionista:</div>
                    <div class="doctor_name"><?php echo $doctor_rows['fname']." ".$doctor_rows['lname']?></div>
                  </div>
                 <div class="doctor_name_data_container">
                  <div class="titlo">Data e Ora:</div>
                  <div class="doctor_name">
                    <?php
                    if (!empty($opoint_time)){
                      echo date("d/m/Y H:i", strtotime($opoint_time));;
                    }
                    ?>
                  </div>
                 </div>
                </div>
                <div class="booking_card_buttons">
                <?php if($rows['payment_status'] == 0){ ?>
                  <a href="#" class="button gradient see_details w-button">Vedi Dettagli Visita</a>
                <?php } ?>
                  <a href="<?php echo '/il-team/professionista.php?'.$doctor_id?>" target="_blank" class="button view_profile w-button">Profilo Professionisti</a>
                    <?php
                    if (strtolower($payment_mode) == 'online'){
                    ?>
                        <div class="glance_details">
                            <div class="glance_details_title" style="font-size: 14px">
								<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top: 10px;">
  <tbody>
    <tr>
      <td><input type="checkbox" checked class="admin_pyment_confirm lable2" id="online_payment_check" disabled="disabled"></td>
      <td align="left"><label for="online_payment_check">Carta di credito</label></td>
    </tr>
  </tbody>
</table>

                               
                               
                            </div>
                            <br>
                        </div>
                <?php }?>
                    <?php if($rows['payment_status'] == 1 && $rows['patient_confirmation'] == 0){ ?>
                    <a href="<?php echo $auth_code;?>" class="button view_profile confirm w-button" style="display:block; height:auto;">Conferma Prestazione</a>
                  <?php } ?>
                  <?php if($rows['patient_confirmation'] == 1){ ?>
                    <a href="#" class="button view_profile reject w-button" style="display:block;" onClick="remove_visit(<?php echo $patient_id.','.$booking_id;?>)">Rimuovi dalla lista</a>
                  <?php } ?>
                </div>
              </div>
              <div class="main_-details_container">
                <div class="div-block-48 details_continer_grid">
                  <h2 class="heading-12 booking">Dettagli Prenotazione</h2>
                  <div class="div-block-36">
                    <div class="data">
                      <div>Codice fiscale:</div>
                    </div>
                    <div class="value">
                      <div><?php echo $patient_rows['fiscale']?></div>
                    </div>
                   <div class="data">
                    <div>Email:</div>
                   </div>
                   <div class="value">
                    <div><?php echo $patient_rows['email']; ?></div>
                   </div>
                    <div class="data">
                      <div>Indirizzo:</div>
                    </div>
                   <div class="value">
                    <div><?php echo $patient_rows['address']?></div>
                   </div>
                    <div class="data">
                      <div>Data di nascita:</div>
                    </div>
                    <div class="value">
                      <div>
                        <?php
                        if (!empty($patient_rows['dob'])){
                          echo date("d/m/Y", strtotime($patient_rows['dob']));;
                        }
                        ?>
                      </div>
                    </div>

                    <div class="data">
                      <div>Costo</div>
                    </div>
                    <div class="value">
                      <div class="text-block-54">
                          <?php
                          if (!empty($discounted_price)){
                          ?>
                          <strike style="color:red"><span style="color:#00285c">€<?=$price?></span></strike>
						  <?php
                              echo ' €' . $discounted_price;
                          }else{
                              echo ' €' . $price;
                          }
                      ?>
						
						</div>
                    </div>
                 <br>
                  </div>
                </div>
              </div>
            </div>
            <?php if($rows['payment_status'] == 1){ ?>
            <div class="visit_completed" style="display:block;">
              <div class="text-block-59">Questa prestazione è stata completata.</div>
            </div>
            <?php } ?>
        </div>
        <?php }} ?>
        </div>

      <?php } }?>

      </div>
      <div id="w-node-605318334e24-c21af325" class="site_nav_cta">
        <h3 class="heading-17">Esplora Mobidoc</h3>
        <div class="nav_list">
         <?php
         /*
          <a href="../" class="list_item diff w-inline-block">
            <div class="blue_bulet"></div>
            <div class="text-block-58">Prenota Visita Online</div>
          </a>
         */
         ?>
         <a href="/visite-ed-esami.php<?=$visit_page_param?>" class="list_item diff w-inline-block">
          <div class="blue_bulet"></div>
          <div class="text-block-58">Visite ed Esami</div>
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