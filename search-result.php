<?php session_start(); 
$search =  $_GET['search'];
if($search == ""){
  header('Location: /');
} else {
  $search = trim($search);
}

?>

<!DOCTYPE html>
<html data-wf-page="5daa262de3e3f062bb1af317" data-wf-site="5d8cfd454ebd737ac1a48727">
<head>
  <meta charset="utf-8">
  <title>Search Result</title>
  <meta content="Search Result" property="og:title">
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
    $('#book_visit').val(visit_name);                
    $('#book_doctor').val(''); 
  } 
  function setDoctor(val){
    $('#book_doctor').val(val);
  }
</script>
</head>
<body>
  <?php include 'header.php';?>
  <div class="masthead serach_result">
    <div class="masthead_search_container">
      <div class="left diff"><a href="/" class="button-2 w-button">Home</a>
        <div class="search_result_text_container">
          <div class="text-block-10">Risultati Ricerca per:</div>
          <div class="search_result_text_container">&quot;<span class="dynamic_text text-span"><?php echo $search;?></span>&quot;</div>
        </div>
      </div>
      <div class="div-block-8 another diff">
        <div class="w-embed">
          <style>
		.search.team{
        backdrop-filter: blur(10px);
     }
</style>
        </div>
        <div class="search team">
          <div class="form-block w-form">
            <form id="Search_form"  name="email-form" action="search-result.php" method="get" class="form">
              <input type="text" class="text-field _2 services_list_footer w-input" autocomplete="off" maxlength="256" name="search" data-name="Name 2" placeholder="Ricerca il tipo di visita / esame" id="name-2" required="">
              <input type="submit" value="Search" data-wait="Search" class="submit-button visit w-button">
            </form>
          </div>
          
        </div>
        <div class="div-block-17"><a href="visite-ed-esami.php" class="button stroked m_b servc search_result w-button">Scopri tutte le visite</a><a href="tel:3357798844" class="button stroked m_b servc search_result w-button">Chiamaci</a></div>
      </div>
    </div>
  </div>
  <section class="section-12">
    
    <div class="search_not_found">
      <div class="text-block-17" style="line-height:40px;">Al momento non sono disponibili risultati per la sua ricerca. Ritenti inserendo la tipologia della prestazione.</div>
    </div>

    <div class="container">
      <div class="text-block-11">Servizi trovati per la tua ricerca.</div>
      <div class="search_item_container">

      <?php
		include 'connect.php';
		$sql = "select * from doctor_visit group by visit_name";
		$result = mysqli_query($conn, $sql);
		while($rows = mysqli_fetch_array($result)){
      $visit_name = $rows['visit_name'];
      $sql2 = "select * from visit_type where visit_type_name = '".$visit_name."'";
		  $result2 = mysqli_query($conn, $sql2);
      $rows2 = mysqli_fetch_array($result2);
      $visit_parent_name = $rows2['visit_name'];      
      $sql3 = "select * from visit where visit_name = '".$visit_parent_name."'";
		  $result3 = mysqli_query($conn, $sql3);
      $rows3 = mysqli_fetch_array($result3);
      $image = $rows3['image'];
      $link = "/".$rows3['link'];
  ?>
  
        <div class="search_item">
          <img src="<?php echo $image;?>" style="height:50px !important;" alt="" class="search_image">
          <div class="search_item_name"><?php echo $visit_name?></div>
          <div class="parent_type">
            <div class="text-block-13">in</div>
            <a href="<?php echo $link;?>" style="text-decoration:none; color:inherit;"><div class="parent_type_text"><?php echo $visit_parent_name;?></div></a>
          </div>
          <div class="div-block-18">
            <a href="#" class="button gradient search_result_book w-button" onClick='getDoctors("<?php echo $visit_name?>");' >Prenota
</a>
          <a href="<?php echo $link;?>" class="button search_learn_more w-button">Scopri di più</a>
          </div>
        </div>

        <?php
		}
		mysqli_close($conn);
	?>

      </div>
    </div>
  </section>
  <div class="login_alert">
    <div data-w-id="6442a0e1-ecb3-7c36-de0a-5ddd0865f2f8" class="closer"></div>
    <div class="div-block-22"><img src="images/upload_1.svg" width="38" alt="" class="image-19">
      <div class="text-block-15">Please Login to Continue</div><a href="#" class="button gradient redirect-to-login w-button">Click here to Login</a></div>
  </div>
  <div data-w-id="41d69744-edb1-41c2-68c6-664ff7c949d7" style="opacity:0;display:none" class="select_doctor">
    <div data-w-id="1c3d15d2-7df2-d31d-2cfc-ed470523ad51" style="-webkit-transform:translate3d(0, 10%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, 10%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, 10%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, 10%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);opacity:0" class="select_doctor_container">
      <div class="text-block-18">SELEZIONA PROFESSIONISTA</div>
      <div class="div-block-19" >
        <div class="div-block-20" id="load_doctors">
          <div class="professionist_card selecting">
            <div class="professionist_image_container"><img src="images/img50003193.jpg" alt="" class="professionist_image">
              <div class="selected_tick"><img src="images/Path-107.svg" width="55" alt="" class="image-4"></div>
            </div>
            <div class="preofessionist_name">Paolo Colamussi</div>
            <div class="professionist_title">Primario Radiologia</div>
            <div class="button_container"><a href="#" class="button-3 gradient select_button w-button">Select</a><a href="#" class="button-3 w-button">View Profile</a></div>
          </div>
        </div>
      </div>
      <div class="div-block-21 diff">
        <form action="checkout.php?book_visit" method="get">
          <input type="text" name="book_visit" id="book_visit" style="display:none;"> 
          <input type="text" name="book_doctor" id="book_doctor" style="display:none;"> 
          <a data-w-id="4de42543-12ea-e21c-83f9-0166ded1a13d" href="#" class="button-3 next odd w-button" style="padding-right:50px;">Indietro</a>
          <button href="checkout.php" class="button-3 next w-button" style="padding-right:100px;">Continua</button>
        </form>  
      </div>
    </div>
    <div data-w-id="1d384be2-facb-9685-ac94-321091428427" class="closer"></div>
  </div>
  <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.4.1.min.220afd743d.js" type="text/javascript" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script src="js/webflow.js" type="text/javascript"></script>
  <script src="https://cdn.jsdelivr.net/npm/string-similarity@3.0.0/compare-strings.js"></script>
  <!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
  <div id="fb-root"></div>
  <script async="" defer="" crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v4.0"></script>
  <script>
	$(document).ready(function(){
   $('.select_button').click(function(){
        $('.selected_tick').removeClass("selected_true");
        $(this).parent().siblings(".professionist_image_container").find('.selected_tick').addClass("selected_true");
   });
   
   var search_value = ($('.dynamic_text').html()).toLowerCase();
   var search_count = 0;

   $('.search_item').each(function(){
     var this_text = ($(this).children('.search_item_name').html()).toLowerCase();
     var this_parent_text = ($(this).children('.parent_type').children('a').children('.parent_type_text').html()).toLowerCase();
     
     if(this_text.search(search_value) == -1 && this_parent_text.search(search_value) == -1){      
        $(this).css("display","none");
     } else {        
      $(this).css("display","flex");
      search_count += 1;
     }
   });

   if(search_count == 0){
     $('.container').hide();
     $('.search_not_found').css('display','flex');
   }

   var stringSimilarity = require('string-similarity'); 
   var similarity = stringSimilarity.compareTwoStrings('healed', 'sealed'); 
   alert(similarity);

});
</script>
</body>

</html>