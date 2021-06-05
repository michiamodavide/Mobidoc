<?php
session_start();

$last_selected_doctor_id = '';
$article_ids_array = array();
if ( isset( $_GET[ 'morev' ] ) && $_GET[ 'morev' ] == 1 || isset( $_GET[ 'pid' ] ) && !empty( $_GET[ 'pid' ] ) ) {
  if ( isset( $_SESSION[ 'book_visits' ] ) && !empty( $_SESSION[ 'book_visits' ] ) ) {
    $book_visit_details = $_SESSION[ 'book_visits' ];
    //    print_r($book_visit_details);
    foreach ( $book_visit_details as $key => $cookie_book_visit ) {
      if ( $key === array_key_last( $book_visit_details ) && !empty( $cookie_book_visit[ 'book_patient_id' ] ) ) {
        $last_selected_doctor_id = $cookie_book_visit[ 'book_doctor' ];
        array_push( $article_ids_array, $cookie_book_visit[ 'article_id' ] );
      } else {
        if ( empty( $cookie_book_visit[ 'book_patient_id' ] ) ) {
          unset( $book_visit_details[ $key ] );
        } else {
          array_push( $article_ids_array, $cookie_book_visit[ 'article_id' ] );
        }
      }
    }
    // Reset the index
    $book_visit_details = array_values( $book_visit_details );
    $_SESSION[ 'book_visits' ] = $book_visit_details;
    //print_r($book_visit_details);
  }
} else {

  unset( $_SESSION[ 'book_visits' ] );
  unset( $_SESSION[ 'pat_id' ] );

}
?>
<!DOCTYPE html>
<html data-wf-page="5daa262de3e3f012851af311" data-wf-site="5d8cfd454ebd737ac1a48727">
<head>
<meta charset="utf-8">
<title>Visite ed esami a domicilio</title>
<meta content="Services" property="og:title">
<meta content="width=device-width, initial-scale=1" name="viewport">
<meta content="Webflow" name="generator">
<link href="css/normalize.css" rel="stylesheet" type="text/css">
<link href="css/webflow.css" rel="stylesheet" type="text/css">
<link href="css/mobidoc.webflow.css?v=4" rel="stylesheet" type="text/css">
<link href="css/new-styles.css?v=17" rel="stylesheet" type="text/css">
<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script> 
<script type="text/javascript">WebFont.load({  google: {    families: ["Montserrat:100,100italic,200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic","Poppins:100,100italic,200,300,300italic,regular,500,600,700,800,900","PT Serif Caption:regular"]  }});</script> 
<!-- [if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js" type="text/javascript"></script><![endif] --> 
<script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script>
<link href="images/favicon.png" rel="shortcut icon" type="image/x-icon">
<link href="images/webclip.png" rel="apple-touch-icon">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script> 
<script src="https://kit.fontawesome.com/3f12b8b553.js" crossorigin="anonymous"></script>
<style>
::-webkit-scrollbar {
width: 0px;
height:0px;
}
.p {
    text-align-last: center !important;
}
.content_grid {
    margin-bottom: 90px;
}
.service_container {
    margin-top: 120px;
}
.w-inline-block {
    float: inherit !important;
}		
	
/******************************************************/	
	.label-wrap{
		margin:30px 0 60px 0;
	}	
	.label-style{
		display:inline;
		font-size: 20px;
		
	}
	.input-style{
		background-color: #d1faff;
		padding: 20px;
		border: none;
		margin-left: 15px;
		border-radius: 7px;
		width: 500px;
	}
	.mt-90{
		margin-top:30px;
	}
	
</style>
</head>
<body class="visit_page">
<div id="n-section-2nd">
  <?php include 'header.php';?>
  <div class="masthead services">
    <div class="custom_container masthead_content_container service">
      <div>
        <h1 class="heading-4">Visite ed esami a domicilio</h1>
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
          <?php
          /*
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
          </div>
          */
          ?>
          <br>
          <a href="tel:3357798844" class="button stroked m_b servc w-button">Chiamaci</a></div>
      </div>
    </div>
  </div>
  <div class="section-7">
    <div class="custom_container diff">
      <div class="content_grid">
        <h2 class="heading-2 diff">Mobidoc Ospedale a domicilio</h2>
        <p class="paragraph"> Mobidoc è stato pensato come un’organizzazione sanitaria, un ambulatorio o un piccolo ospedale a domicilio. I nostri professionisti sono medici, psicologi, infermieri, fisioterapisti e tecnici di radiologia che credono che in alcune circostanze la migliore cura possibile sia quella a casa del paziente: siamo noi che veniamo da te quando ne hai bisogno. </p>
      </div>
      <script>
        // function showHint(str) {
        //   $('#load_doctors').html('<div class="slect_visit_first"><span>Please select a visit first!</span></div>');
        //   if (str.length == 0) {
        //     document.getElementById("txtHint").innerHTML = "";
        //     return;
        //   } else {
        //     var xmlhttp = new XMLHttpRequest();
        //     xmlhttp.onreadystatechange = function() {
        //       if (this.readyState == 4 && this.status == 200) {
        //         document.getElementById("visite_list").innerHTML = this.responseText;
        //       }
        //     };
        //     xmlhttp.open("GET", "getVisits.php?q=" + str, true);
        //     xmlhttp.send();
        //   }
        //   setTimeout( function(){
        //         var visite_count = $('.visite_list').children('.visite').length;
        //
        //         if(visite_count < 6){
        //           $('.visite').css('margin-bottom','15px');
        //           $('.visite_list').css('display','block');
        //           $('#book_visit, #book_doctor').val('');
        //           $('#book_visit, #article_id').val('');
        //         } else {
        //           $('.visite').css('margin-bottom','0px');
        //           $('.visite_list').css('display','grid');
        //           $('#book_visit, #book_doctor').val('');
        //           $('#book_visit, #article_id').val('');
        //         }
        //       }, 100);
        // }
      </script> 
    </div>
    <div id="n-section4">
      <section class="section-2 sec4-style">
        <div class="custom_container">
          <div class="content_grid-2">
            <h2 class="heading-2">Come funziona Mobidoc?</h2>
            <p class="paragraph">Mobidoc è un punto di riferimento per chiunque abbia bisogno di assistenza sanitaria e voglia un servizio attento e dedicato, compatibile con i propri impegni, senza doversi sottoporre ad interminabili attese ed inutili spostamenti.</p>
          </div>
          <div class="feature_container">
            <div class="feature diff">
              <div class="number">1</div>
              <img src="images/icon-1.png" alt="">
              <div class="feature_label">Seleziona la visita o l'esame</div>
            </div>
            <div class="dottedline"></div>
            <div class="feature diff">
              <div class="number">2</div>
              <img src="images/icon-2.png" alt="">
              <div class="feature_label">Scegli il Professionista<span class="hide"><br>
                </span> e accordati su data e orario</div>
            </div>
            <div class="dottedline"></div>
            <div class="feature diff" id="feature_dif3">
              <div class="number">3</div>
              <img src="images/icon-3.png" alt="">
              <div class="feature_label">Paghi in tutta sicurezza<span class="hide"><br>
                </span> a prestazione avvenuta</div>
            </div>
          </div>
          <a href="#" class="w-inline-block"> <a href="#" class="button w-inline-block m-r-20">
          <div class="text-block-2">Prenota Online</div>
          </a> </a> <a href="tel:3357798844" class="button gradient large diff w-inline-block home-tel"> <img src="images/phone.svg" width="11" alt="" class="image-2">
          <div class="text-block-2">Chiamaci</div>
          </a> </div>
      </section>
    </div>
    <?php
    if ( empty( $last_selected_doctor_id ) ) {
      ?>
	  
	  
	  
	  <div class="label-wrap">
    <label class="label-style" for="search_visit">Search City for show visits.</label>
    
    <input class="input-style" name="search_visit" id="search_visit" list="search_visits" placeholder="Search here">
	  
	 </div>
	  
	  
    <datalist id="search_visits">
      <?php
      include 'connect.php';

      if ( $conn === false ) {
        die( "ERROR database" );
      }
      $sql = "select * from mobi_cap order by Comune";
      $result = mysqli_query( $conn, $sql );
      while ( $rows = mysqli_fetch_array( $result ) ) {
        $comune = $rows[ 'Comune' ];
        $provincia = $rows[ 'Provincia' ];
        $cap = $rows[ 'CAP' ];
        ?>
      <option value="<?PHP echo $comune ?>"><?PHP echo $comune ?></option>
      <?php
      }
      mysqli_close( $conn );
      ?>
    </datalist>
    
    <a href="tel:3357798844" class="button gradient large diff w-inline-block home-tel call_us_btn" style="display: none"> <img src="images/phone.svg" width="11" alt="" class="image-2">
    <div class="text-block-2">Not available? Call Us</div>
    </a>
    <?php }?>
    <?php
    /*
    <section class="section-2" style="padding-top: 70px;padding-bottom: 0px">
     <div class="custom_container">
      <div class="content_grid-2">
       <h2 class="heading-2">COME FUNZIONA MOBIDOC?</h2>
       <p class="paragraph">Mobidoc è un punto di riferimento per chiunque abbia bisogno di assistenza sanitaria e voglia un servizio attento e dedicato, compatibile con i propri impegni, senza doversi sottoporre ad interminabili attese ed inutili spostamenti.</p>
      </div>
      <div class="feature_container">
       <div class="feature diff">
        <img src="images/icon-1.png?v=1" alt="" class="feature_image">
        <div class="feature_label">1. Scegli la visita o l' esame</div>
       </div>
       <div class="feature diff">
        <img src="images/icon-2.png?v=1" alt="" class="feature_image odd">
        <div class="feature_label">2. Scegli il Professionista<span class="hide"><br></span>
         e accordati su data e orario</div>
       </div>
       <div class="feature diff">
        <img src="images/icon-3.png?v=1" alt="" class="feature_image">
        <div class="feature_label">3. Paghi in tutta sicurezza<span class="hide"><br></span>
         a prestazione avvenuta</div>
       </div>
      </div>
     </div>
    </section>
    */
    ?>
    <!--start-->
    <div class="booking_visits">
      <?php
      if ( !empty( $last_selected_doctor_id ) ) {
        include 'connect.php';

        if ( $conn === false ) {
          die( "ERROR database" );
        }

        $sql = "SELECT v.visit_id, v.visit_name, v.body_text, v.image, ms.ERid FROM visit v JOIN medical_specialty ms ON ms.id=v.specialty_id WHERE ms.`status`='Y'";
        $result = mysqli_query( $conn, $sql );
        $row_count = mysqli_num_rows( $result );


        while ( $rows = mysqli_fetch_array( $result ) ) {
          $visit_name = $rows[ 'visit_name' ];
            $image1 = 'empty.jpg';
            if ($rows['image']){
                $image1 = $rows['image'];
            }
          $mds_erid = $rows[ 'ERid' ];
          $link = '/visite-ed-esame/landing-page.php?mds=' . $visit_name;

          if ( $row_count ) {
            $expl_visit_name = explode( " ", $visit_name );

            $tm2_class = '';
            if ( strlen( $visit_name ) < 20 )
              $tm2_class = 'fet_tm2';

            ?>
      <div class="service_container <?php echo trim(strtolower($expl_visit_name[0]))?>">
        <div id="w-node-9ebfabc602d8-851af311" class="service_maine_card"> 
          <!-- New HTML-Code --->
          <div class="feature diff"> <a class="pic2" href="<?php echo $link;?>" target="_blank">
            <div class="feature_label <?php echo $tm2_class?>"><?php echo $visit_name;?> <img src="images/arrow.png" alt="" > </div>
            <img src="/assets/visit_images/<?php echo strtolower($image1)?>?v=8" alt=""> </a> </div>
          <!-- New HTML-Code ---> 
          
        </div>
        <div class="service_type_card">
          <div class="text-block-7"><span class="service_text_underline"><?php echo $visit_name;?></span></div>
          <div class="type_of-service_grid">
            <?php
            if ( isset( $_SESSION[ 'doctor_email' ] ) ) {
              $sql2 = "SELECT DISTINCT dp.doctor_id, am.id As article_id, descrizione, am.home, am.tele, am.attributo
                    FROM doctor_profile dp
                    JOIN doctor_register as dg ON dp.doctor_id = dg.id
                    JOIN listini as ls ON dp.doctor_id = ls.doctor_id
                    JOIN doctor_specialty as ds ON dp.doctor_id = ds.doctor_id
                    JOIN articlesMobidoc as am ON am.id = ls.article_mobidoc_id
                    JOIN articlesMobidoc_specialty as ams ON am.id = ams.id
                    JOIN medical_specialty as ms ON ds.specialty=ams.specialtyMobidoc
                    WHERE dg.tick='1' AND dp.doctor_id='" . $last_selected_doctor_id . "' AND ds.specialty='" . $mds_erid . "' AND dp.active='Y' AND dp.visible='Y' AND am.home='Y' OR am.tele='Y' group by am.id";

            } else {
              $sql2 = "SELECT DISTINCT dp.doctor_id, am.id As article_id, descrizione, am.home, am.tele, am.attributo
                    FROM doctor_profile dp
                    JOIN doctor_register as dg ON dp.doctor_id = dg.id
                    JOIN listini as ls ON dp.doctor_id = ls.doctor_id
                    JOIN doctor_specialty as ds ON dp.doctor_id = ds.doctor_id
                    JOIN articlesMobidoc as am ON am.id = ls.article_mobidoc_id
                    JOIN articlesMobidoc_specialty as ams ON am.id = ams.id
                    JOIN medical_specialty as ms ON ds.specialty=ams.specialtyMobidoc
                    WHERE dg.tick='1' AND dp.doctor_id='" . $last_selected_doctor_id . "' AND ds.specialty='" . $mds_erid . "' AND dp.puo_refertare='N' AND dp.active='Y' AND dp.visible='Y' AND am.home='Y' OR am.tele='Y' group by am.id";
            }


            $result2 = mysqli_query( $conn, $sql2 );
            $rows2_count = mysqli_num_rows( $result2 );
            if ( empty( $rows2_count ) ) {
              echo '<style>.service_container.' . trim( strtolower( $expl_visit_name[ 0 ] ) ) . '{display: none}</style>';
            }

            while ( $rows2 = mysqli_fetch_array( $result2 ) ) {

              $visit_type_name = trim( $rows2[ 'descrizione' ], " " );
              $article_id = trim( $rows2[ 'article_id' ], " " );
              $visit_name_2 = '"' . $mds_erid . '", "' . $visit_type_name . '", "' . $article_id . '"';
              $attribute = $rows2[ 'attributo' ];


              if ( in_array( $article_id, $article_ids_array ) ) {
                echo '<style>.sub_service.article_' . $article_id . '{display: none}</style>';
              }

              echo "<div class='sub_service article_" . $article_id . "' >";
              echo "<a style='color: #00285c;' href='/checkout.php?book_visit=" . $visit_type_name . "&book_doctor=" . $last_selected_doctor_id . "&article_id=" . $article_id . "'><div class='sub_service_text'>";

              echo $visit_type_name;
              if ( !empty( $attribute ) ) {
                echo ' <span style="font-size: 13px;font-weight: bold">(' . $attribute . ')</span>';
              }
              echo "</div></a>";
              echo "</div>";

            }
            ?>
          </div>
        </div>
      </div>
      <?php }} }?>
    </div>
    <div id="load_visits"> </div>
  </div>
  <?php
  /*
   <div data-w-id="9da09dce-74fd-48c2-3856-6fbbf1fa1101" style="display:none;opacity:0;overflow: auto" class="select_visite">
     <div data-w-id="cd023d65-eafd-6990-97f3-f7f1d70c1f35" class="closer"></div>
     <div data-w-id="74b504a4-434f-f3ca-0eff-3cc62dc83f42" style="-webkit-transform:translate3d(0, 10%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, 10%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, 10%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, 10%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);opacity:0" class="visite_select_container">
       <div class="close_btn" data-w-id="59f2a1ad-911e-85f4-e6eb-5c357ae648d4"><img src="https://uploads-ssl.webflow.com/5d8cfd454ebd737ac1a48727/5d9d869b12f8e2378f12b8e3_Path%20175.svg" alt="" class="image-27"/></div>
       <div class="text-block-18">SELEZIONA IL TIPO DI VISITA</div>

         <div class="visite_list" id="visite_list">

         </div>

       <div class="div-block-21"><a data-w-id="59f2a1ad-911e-85f4-e6eb-5c357ae648d4" href="#" class="button-3 next close odd w-button">Close</a><a data-w-id="edfe7a79-7498-a90d-618f-cd9c0d79fac8" href="#" class="button-3 next w-button" style="padding-right:100px;">Continua</a></div>
     </div>
   </div>
  */
  ?>
  <div style="display:none;opacity:0" class="select_doctor">
    <div data-w-id="18c3de8b-b737-4d7d-bc89-c71022690854" class="closer"></div>
    <div style="-webkit-transform:translate3d(0, 10%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, 10%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, 10%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, 10%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);opacity:1" class="select_doctor_container">
      <div class="text-block-18">SELEZIONA PROFESSIONISTA</div>
      <div class="div-block-19">
        <div class="div-block-20" id="load_doctors">
          <div class="professionist_card-2 selecting">
            <div class="professionist_image_container"><img src="https://d3e54v103j8qbb.cloudfront.net/plugins/Image/assets/placeholder.60f9b1840c.svg" alt="" class="professionist_image">
              <div class="selected_tick"> <img src="images/Path-107.svg" width="55" alt="" class="image-4"></div>
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
          <input type="text" name="article_id" id="article_id" style="display:none;">
          <a href="#" class="button-3 next odd w-button cls_btn">Indietro</a>
          <button href="checkout.php" class="button-3 next w-button visit-sbt" disabled="disabled" style="padding-right:100px;cursor: no-drop;">Continua</button>
        </form>
      </div>
    </div>
  </div>
  <div class="login_alert">
    <div data-w-id="6442a0e1-ecb3-7c36-de0a-5ddd0865f2f8" class="closer"></div>
    <div class="div-block-22"><img src="images/upload_1.svg" width="38" alt="" class="image-19">
      <div class="text-block-15">Please Login to Continue</div>
      <a href="#" class="button gradient redirect-to-login w-button">Click here to Login</a></div>
  </div>
  <?php include 'cta_cards2.php';?>
  <?php include 'footer.php';?>
  <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.4.1.min.220afd743d.js" type="text/javascript" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script> 
  <script src="js/webflow.js?v=3" type="text/javascript"></script> 
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
  <script type="application/javascript">

    $('#search_visit').on('input',function() {
        var opt = $('option[value="'+$(this).val()+'"]');
        var search_city = opt.length ? opt.attr('value') : '2';
        if (search_city == 2){
            $("#load_visits").empty();
        } else {
            var xmlhttp2 = new XMLHttpRequest();
            xmlhttp2.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("load_visits").innerHTML = this.responseText;
                }
            };
            xmlhttp2.open("GET", "get_search_visit.php?city="+search_city, true);
            xmlhttp2.send();

            $(".call_us_btn").css("display", "inline-block");

        }
    });
  // function get_visit_Doctors(str, visit_name, article_id) {
  //         $('#load_doctors').html('<div class="slect_visit_first"><span>Please select a visit first!</span></div>');
  //         if (str.length == 0) {
  //           document.getElementById("txtHint").innerHTML = "";
  //           return;
  //         } else {
  //           var xmlhttp = new XMLHttpRequest();
  //           xmlhttp.onreadystatechange = function() {
  //             if (this.readyState == 4 && this.status == 200) {
  //               document.getElementById("visite_list").innerHTML = this.responseText;
  //             }
  //           };
  //           xmlhttp.open("GET", "getVisits.php?q=" + str, true);
  //           xmlhttp.send();
  //         }
  //
  //         setTimeout( function(){
  //               var visite_count = $('.visite_list').children('.visite').length;
  //
  //               if(visite_count < 6){
  //                 $('.visite').css('margin-bottom','15px');
  //                 $('.visite_list').css('display','block');
  //                 $('#book_visit').val(visit_name);
  //                 $('#book_doctor').val('');
  //                 $('#article_id').val(article_id);
  //               } else {
  //                 $('.visite').css('margin-bottom','0px');
  //                 $('.visite_list').css('display','grid');
  //                 $('#book_visit').val(visit_name);
  //                 $('#book_doctor').val('');
  //                 $('#article_id').val(article_id);
  //               }
  //             }, 100);
  //             getDoctors(visit_name,article_id);
  //       }


    function get_visit_Doctors (mdsid, name, article_id){
        $('#book_visit').val($.trim(name));
        $('#book_doctor').val('');
        $('#article_id').val(article_id);
        var xmlhttp2 = new XMLHttpRequest();
        xmlhttp2.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("load_doctors").innerHTML = this.responseText;
            }
        };
        xmlhttp2.open("GET", "getDoctor.php?erid=" + mdsid+"&article_id="+article_id, true);
        xmlhttp2.send();

        $(".select_doctor").attr("style", "display:flex;opacity:1;overflow: auto");
        $(".visit-sbt").attr("style", "padding-right:100px; cursor: no-drop;");
        $(".visit-sbt").prop("disabled",true);
    }

    $(".select_doctor .closer, .select_doctor .cls_btn").on("click", function () {
        $(".select_doctor").attr("style", "display:none;opacity:0");
    });
    function setDoctor(val, art_id){
        $('#book_doctor').val(val);
        $('#article_id').val(art_id);

        $(".visit-sbt").attr("style", "padding-right:100px;cursor: pointer;");
        $(".visit-sbt").prop("disabled",false);
    }

  $('.section-7 .service_container').each(function(){
    if ( $('.service_type_card .type_of-service_grid', this).children().length > 0 ) {

    }else {
      $(this).remove()
    }
  });

    var doc_ids = '<?php echo $last_selected_doctor_id?>';
    if (doc_ids){
        $('html, body').animate({scrollTop: $('.booking_visits').offset().top}, 1000);
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
  <?php include ("google_analytic.php")?>
</div>
</body>
</html>