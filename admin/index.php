<?php session_start();
  if(!isset($_SESSION['adminlogin']))
  {
    header("Location: login.php"); 
  } 
?>
<!DOCTYPE html>
<html data-wf-page="5dfbca93dac992df80dd982b" data-wf-site="5d8cfd454ebd737ac1a48727">
<head>
  <meta charset="utf-8">
  <title>admin</title>
  <meta content="admin" property="og:title">
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
 <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>

 <style>
::-webkit-scrollbar {
  width: 0px;
  height:0px;
}
	.p{
  	text-align-last: center !important;
  }
*:focus{
 outline:none;
 border:none;
}
.pro_type{
 margin-top: 20px;
 width: 100% !important;
 padding: 8px 7px;
 border-radius: 1.2rem;
 font-size: 12px;
 border: 1px solid #979797 !important;
}
@media screen and (max-width: 767px){
 .admin_main_section .admin_section_header{
  display: inline-block;
  left: 90px;
 }
 .admin_main_section .scroll_indicator{
  display: none;
 }
}
@media screen and (max-width: 400px){
 #add .button-10{
  font-size: 11px;
 }
}
@media screen and (max-width: 340px){
 #add .button-10{
  margin-right: 10px !important;
 }
}
</style>
</head>
<body class="body-14">
  <div>
   <?php include ("admin_side_bar.php")?>
    <div data-w-id="410c8c4a-713c-7280-b165-1dd2a36167c1" class="preloader">
      <div class="loader">
        <div data-w-id="410c8c4a-713c-7280-b165-1dd2a36167c3" data-animation-type="lottie" data-src="https://uploads-ssl.webflow.com/5d8cfd454ebd737ac1a48727/5df92a8de51cd1d00a86eb51_lottieflow-loading-04-2-00285C-easey.json" data-loop="1" data-direction="1" data-autoplay="1" data-is-ix2-target="0" data-renderer="svg" data-default-duration="1.7916666666666667" data-duration="0" class="lottie-animation-2"></div>
      </div>
    </div>
  </div>
  <div class="admin_main_section">
    <div data-w-id="671d7027-6f87-1c3f-c474-3b17f4b83b06" class="admin_section_header">
      <h1 class="admin_section_heading">Professionisti</h1>
      <div class="div-block-70">
      <div class="scroll_indicator">
          <div data-w-id="98c7cd18-996f-4b08-777e-ae54e6517910" data-animation-type="lottie" data-src="https://uploads-ssl.webflow.com/5d8cfd454ebd737ac1a48727/5df9f0f25ccbf3bb4c727941_lottieflow-scrolling-01-1-00285C-easey.json" data-loop="0" data-direction="1" data-autoplay="0" data-is-ix2-target="1" data-renderer="svg" data-default-duration="2.76" data-duration="0" class="lottie-animation-3"></div>
        </div>
        <div id="add">
         <?php
         /*
          <a href="/paziente/register.php" target="_blank" class="button-10 w-button" style="display:inline; padding:10px 20px 10px 20px; margin-right:10px;">+ Paziente</a>
          <a href="/professionisti/register.php?admin" target="_blank" class="button-10 w-button" style="display:inline; padding:10px 20px 10px 20px; margin-right:30px;">+ Professionista</a>
           <a href="/paziente/patient-register.php" target="_blank" class="button-10 w-button" style="display:inline; padding:10px 20px 10px 20px; margin-right:30px;">+ Prenotazione Telefonica</a>
         */
         ?>

        </div>
        <a href="logout.php" class="admin_logout w-button"></a></div>
    </div>

    <div class="section_content">
      <div class="applications">
        <div class="doctors_block">

        <?php
        include '../connect.php';
        
        $sql = "select * from doctor_register where remove = 0 order by id desc";
        $result = mysqli_query($conn, $sql);
        while($rows = mysqli_fetch_array($result)){
          $name = $rows['name'];
          $cogname = $rows['cogname'];
          $email = $rows['email'];
          $cv = "/professionisti/".$rows['cv'];
          $dor = strtotime($rows['dor']);
		      $status = $rows['status'];
		      $tick = $rows['tick'];
        ?>

        <?php 
          $sql2 = "select * from doctor_profile where email = '".$email."'";        
          $result2 = mysqli_query($conn, $sql2);
          $rows2 = mysqli_fetch_array($result2);
          $doct_id = $rows2['doctor_id'];
          $doct_photo = $rows2['photo'];
          $user_active= $rows2['is_active'];
          $p_type = $rows2['p_type'];
          if(isset($doct_id)){
            $link = "/il-team/professionista.php?".$doct_id;  
          } else {
            $link = "/il-team/professionista.php?0";
          }      
          if(isset($doct_photo)){
            $photo_link = "/professionisti/".$doct_photo;
          } else {
            $photo_link = "../images/Group-563.jpg";
          }

          $prof_type_array = array('','Esecutore','Refertatore');
        ?>
          <div class="regi_doctor_card regi_doctor_card<?php echo $doct_id?>">
            <div class="regi_doctor_image"><img src="<?PHP echo $photo_link ?>" alt="" class="image-24"></div>
            <div class="div-block-65">
              <div id="w-node-cf99e8f702f8-80dd982b" class="regi_name_block">
                <div class="text-block-68"><?PHP echo ucwords($name)." ".ucwords($cogname); ?></div>
                <?PHP if($tick){?>
                <div class="approved_tick"><img src="../images/Path-210.svg" width="13" alt="" class="image-26"></div>
                  <?php
                  if(isset($p_type)){
                  $prof_type = $p_type;
                  }else{
                    $prof_type = '0';
                  }?>
                 <p style="margin-left: 15px" class="show-prof"><?php echo $prof_type_array[$prof_type] ?></p>
               <?php }?>
              </div>
              <div class="div-block-66">
                <div class="regi_data">Email</div>
                <div class="regi_value"><?PHP echo $email; ?></div>
              </div>
              <div class="div-block-67">
                <div class="regi_data">Data Registrazione</div>
                <div class="regi_value"><?php echo date("d F Y", $dor);?></div>
              </div>
            </div>
            <div id="w-node-cf99e8f70307-80dd982b" class="regi_button_container">
              <div id="w-node-cf99e8f70308-80dd982b"><a href="<?PHP echo $cv; ?>" download class="button-10 w-button">Scarica CV</a></div>
              <div class="div-block-75">
                <?PHP if($status==0){ ?>
                <a href="#" class="button-10 reject w-button">Rifiuta</a>
                <?php } else {?>
                <a data-w-id="293fdba6-5dda-9f43-9d25-cf99e8f7030e" href="#" class="button-10 remove w-button">Rimuovi<br></a>
                <?php }?>
                <div class="reject_confirm">
                  <div data-w-id="293fdba6-5dda-9f43-9d25-cf99e8f70312" class="closer diff"></div>
                  <div class="reject_container">
                    <div class="text-block-66">Sei sicuro di voler rifiutare questa candidatura?</div>
                    <div class="div-block-63">
                      <a data-w-id="293fdba6-5dda-9f43-9d25-cf99e8f70317" href="#" class="button-5 no w-button">Cancella</a>
                      <a href="index2.php?s=0&email=<?php echo urlencode($email);?>" class="button-5 yes w-button">Conferma</a>
                    </div>
                  </div>
                </div>
                <div style="opacity:0;display:none" class="remove_confirm">
                  <div style="-webkit-transform:translate3d(0, 10%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, 10%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, 10%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, 10%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);opacity:0" class="reject_container removecontainer">
                    <div class="text-block-66">Sei sicuro di voler rimuovere questa candidatura?</div>
                    <div class="div-block-63">
                      <a data-w-id="293fdba6-5dda-9f43-9d25-cf99e8f70320" href="#" class="button-5 no w-button">Cancella</a>
                      <a href="remove.php?email=<?php echo urldecode($email);?>" class="button-5 yes w-button">Conferma</a>
                    </div>
                  </div>
                  <div data-w-id="293fdba6-5dda-9f43-9d25-cf99e8f70324" class="closer"></div>
                </div>
              </div>
              <div class="div-block-74">
              <?PHP if($status==0){ ?>
                <a href="#" class="button-10 approve w-button">Approva</a>
                <?php } else {?> 
                <a href="<?php echo $link?>" target="_blank" class="button-10 open_profile w-button">Vedi Profilo</a>
              <?php }?>
                <div class="approve_confirm">
                  <div data-w-id="293fdba6-5dda-9f43-9d25-cf99e8f7032b" class="closer"></div>
                  <div class="approve_confirm_container">
                    <div class="text-block-66 diff">Sei sicuro di voler approvare?</div>
                    <div class="text-block-69">Una volta approvata la candidatura, un link per la registrazione verrà inviato alla casella mail del Professionista, il quale, effettuata la registrazione, potrà unirsi al team.<br></div>
                    <div class="div-block-63">
                      <a data-w-id="293fdba6-5dda-9f43-9d25-cf99e8f70333" href="#" class="button-5 no w-button">Cancella</a>
                      <a href="index2.php?s=1&email=<?php echo urlencode($email);?>" class="button-5 yes w-button">Si</a></div>
                  </div>
                </div>
              </div>
             <div class="div-block-74">
               <?PHP if($status==1){ ?>
                 <?php if(isset($doct_id)){
                   if($user_active==1){
                     ?>
                    <a href="doc_active.php?a=0&email=<?php echo urlencode($email);?>" class="button-10 w-button" style="margin-top: 10px;background-color: #00800052;">Attivo</a>
                   <?php }else{?>

                    <a href="doc_active.php?a=1&email=<?php echo urlencode($email);?>" class="button-10 w-button" style="margin-top: 10px;background-color: #ff0000b5;">Non Attivo</a>
                   <?php }}}?>

             </div>
             <div class="div-block-74">
               <?PHP if($tick){?>
                 <?php
                 if(isset($p_type)){
                   $prof_type = $p_type;
                 }else{
                   $prof_type = '0';
                 }?>
                <select style="margin-left: 10px;width: 100px;outline: inherit;border: 1px solid;" name="pro_type" class="pro_type" data-item="<?php echo $doct_id?>">
                 <option value="<?PHP echo $prof_type;?>"><?php echo $prof_type_array[$prof_type]?></option>
                 <option value="1">Esecutore</option>
                 <option value="2">Refertatore</option>
                </select>
               <?php }?>
             </div>
            </div>
          </div>
          <?php } mysqli_close($conn);?>

        </div>
        <div class="end-of-the-list">
          <div class="line"></div>
          <div id="w-node-0e7522d67d94-80dd982b" class="text-block-70">Non ci sono più profili da visualizzare.</div>
          <div class="line"></div>
        </div>
      </div>
    </div>
    <div class="menu_current w-embed w-script">
      <script>
	$(document).ready(function(){
  	$('.admin_item:nth-child(1)').addClass('current');
  });

 $('.pro_type').on('change', function() {
   var pro_tt = this.value;
   var doctor_idd = $(this).attr("data-item");
   if (pro_tt > 0){
     $.ajax({
       url: "change_p_type.php",
       type: "post",
       data: {pro_value:pro_tt, doc_id:doctor_idd},
       success: function (response) {
          // console.log(response);
         if (response == 'true'){
           if (pro_tt == 1){
             $(".regi_doctor_card"+doctor_idd+" .show-prof").text("Esecutore");
           }else if (pro_tt == 2){
             $(".regi_doctor_card"+doctor_idd+" .show-prof").text("Refertatore");
           }
         }
       },
       error: function(jqXHR, textStatus, errorThrown) {
         console.log(textStatus, errorThrown);
       }
     });
   }
 });
</script>
    </div>
  </div>
  <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.4.1.min.220afd743d.js" type="text/javascript" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script src="../js/admin/webflow.js" type="text/javascript"></script>
  <!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
  <div id="fb-root"></div>
  <script async="" defer="" crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v4.0"></script>
</body>
</html>