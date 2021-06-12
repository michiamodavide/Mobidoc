<!DOCTYPE html>
<?php session_start();
    $time_value = time() + (86400 * 30 * 365);
   if(!isset($_COOKIE['privacy_popop'])){
     $cookie_value = "0";
     setcookie("privacy_popop", $cookie_value, intval($time_value), "/");
   }
unset($_SESSION['book_visits']);
unset($_SESSION['pat_id']);

?>
<html data-wf-page="5daa262de3e3f080fd1af309" data-wf-site="5d8cfd454ebd737ac1a48727">
	<head>
	<meta charset="utf-8">
	<title>Mobidoc</title>
	<meta content="width=device-width, initial-scale=1" name="viewport">
	<meta content="Webflow" name="generator">
	<link href="css/normalize.css" rel="stylesheet" type="text/css">
	<link href="css/webflow.css" rel="stylesheet" type="text/css">
	<link href="css/mobidoc.webflow.css?v=1" rel="stylesheet" type="text/css">
	<link href="css/new-styles.css?v=22" rel="stylesheet" type="text/css">
	<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script>
	<script type="text/javascript">
		WebFont.load( {
			google: {
				families: [ "Montserrat:100,100italic,200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic", "Poppins:100,100italic,200,300,300italic,regular,500,600,700,800,900", "PT Serif Caption:regular" ]
			}
		} );
	</script>
	<!-- [if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js" type="text/javascript"></script><![endif] -->
	<script type="text/javascript">
		! function ( o, c ) {
			var n = c.documentElement,
				t = " w-mod-";
			n.className += t + "js", ( "ontouchstart" in o || o.DocumentTouch && c instanceof DocumentTouch ) && ( n.className += t + "touch" )
		}( window, document );
	</script>
	<link href="images/favicon.png" rel="shortcut icon" type="image/x-icon">
	<link href="images/webclip.png" rel="apple-touch-icon">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
	<script src="https://kit.fontawesome.com/3f12b8b553.js" crossorigin="anonymous"></script>
	<style>
::-webkit-scrollbar {
 width: 0px;
 height: 0px;
}
.p {
	text-align-last: center !important;
}
.stop-scrolling {
	height: 100%;
	overflow: hidden;
}
.paragraph-2 {
	word-break: all;
}
.feature_container .feature.diff a:hover .feature_label {
	opacity: .5 !important;
}
.btn-width {
	min-width: 150px;
}
.m-r {
	margin-right: 30px;
}
/******************************************************/
.bg-color{
	background-color:  #fff !important;color:#00285c !important;}
.bg-color:hover{background-color: hsla(0, 0%, 100%, 0.12) !important;color:  #fff !important;}
/******************************************************/
		.abc{
			
   
    justify-content: start !important;
    

		}
@media screen and (min-width: 767px) {
.extra_card {
	visibility: hidden;
	display: block !important;
}
}
.w-inline-block{
 float: inherit !important;
}
</style>
	<script>
		function getDoctors( value ) {
			$( '#book_visit' ).val( $.trim( value ) );
			$( '#book_doctor' ).val( '' );
			var xmlhttp2 = new XMLHttpRequest();
			xmlhttp2.onreadystatechange = function () {
				if ( this.readyState == 4 && this.status == 200 ) {
					document.getElementById( "load_doctors" ).innerHTML = this.responseText;
				}
			};
			xmlhttp2.open( "GET", "getDoctor.php?q=" + value, true );
			xmlhttp2.send();
		}

		function setDoctor( val ) {
			$( '#book_doctor' ).val( val );
		}

		function cookie_value() {
			document.body.classList.remove( "stop-scrolling" );
			var xmlhttp2 = new XMLHttpRequest();
			xmlhttp2.onreadystatechange = function () {
				if ( this.readyState == 4 && this.status == 200 ) {
					//document.getElementById("load_doctors").innerHTML = this.responseText;
				}
			};
			xmlhttp2.open( "GET", "cookie.php", true );
			xmlhttp2.send();
		}
	</script>
	<?php include 'connect.php';
 if($conn === false){
   die("ERROR database");
 }
 ?>
	</head>

	<body class="body index_p">
<?php
	if ( !isset( $_COOKIE[ 'privacy_popop' ] ) || $_COOKIE[ 'privacy_popop' ] == 0 ) {
		?>
<div class="gdpr_popup" style="overflow:visible !important;">
      <div style="height:100%; width:100%; background:rgba(0,0,0,0.5); position:fixed; top:0px; left:0px; z-index:-1;"></div>
      <div class="gdpr_popup">
    <p class="paragraph-15"> Mobidoc, per offrirti una migliore esperienza su questo sito utilizza cookies di sessione e di "terze parti", installati da un sito diverso tramite questo; NON utilizza, invece, alcun cookie di profilazione. È molto importante che tu sia informato sul loro funzionamento e per questo ti invitiamo a consultare la nostra <a href="/cookie-policy.html" target="_blank">informativa</a>, che ti illustrerà anche i tuoi diritti in relazione al trattamento dei tuoi dati personali. La prosecuzione della navigazione, mediante consenso (pressione su "ACCETTA"), comporta l'accettazione all'uso dei cookies ed alla loro scrittura sul tuo dispositivo </p>
    <a class="button gradient w-button" onClick="cookie_value('ashsih')" id="popup_button">Accetto</a> </div>
    </div>
<script>
		document.body.classList.add( "stop-scrolling" );
	</script>
<?php } ?>
<div class="scroll_bar">
      <div data-w-id="9f6a9011-662a-5c81-876b-ef83ac4f72aa" class="scroll_thumb"></div>
    </div>
<?php include 'header.php';?>
<div id="n-section-top">
      <div id="masthead" class="masthead">
    <div class="masthead_content_container homepage">
          <div>
        <?php
   /*	<h1 class="heading">Visite mediche a casa tua.</h1>*/
   ?>
        <h1 class="heading">Visite mediche ed esami a casa tua.</h1>
        <a href="javascript:;" class="button stroked card w-button btn-width m-r domici-btn">A Domicilio</a>
          <?php
          /*
              <a href="/poliambulatorio-online.php" class="button stroked card w-button btn-width bg-color">Online</a>
          */
          ?>
          </div>
          <div class="w-embed">
        <style>
					.search.home,
					.homepage_search_help {
						backdrop-filter: blur(10px);
					
					}
				</style>
      </div>
          <div id="w-node-3edc56e7c1a4-fd1af309" class="div-block-47">
        <div class="search home">
              <div class="form-block w-form">
            <form id="Search_form" name="email-form" action="search-result.php" method="get" class="form">
                  <input type="text" class="text-field homapge w-input" autocomplete="off" maxlength="256" name="search" data-name="Name 2" placeholder="Ricerca il tipo di visita / esame" id="name-2" required="">
                  <input type="submit" value="Search" class="submit-button homepage w-button">
                </form>
          </div>
              <div class="homepage_search_help">
            <div class="visitie_search_help_item">
                  <div class="text-block-56">Ecografia Dell Collo</div>
                </div>
          </div>
            </div>
      </div>
          <div class="div-block-13"><a href="#n-section2" class="button stroked m_b w-button">Scopri le visite</a><a href="tel:3357798844" class="button stroked m_b u w-button">Chiamaci</a> </div>
        </div>
    <a href="professionisti-home.php" class="link-block-3 w-inline-block">
        <div class="members" style="z-index:80;"><img src="images/members-area-tab.svg" width="48" alt=""> </div>
        </a>
    <div class="scroll_anim_container"> <a href="#" data-w-id="048a4362-089b-cc1c-e9b1-e48a3ac23d41" class="w-inline-block">
      <div class="scroll_anim">
        <div class="scroller_thumb">
          <div data-w-id="048a4362-089b-cc1c-e9b1-e48a3ac23d44" style="-webkit-transform:translate3d(0, -100%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, -100%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, -100%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, -100%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0)" class="scroller_thumb_animator"></div>
        </div>
      </div>
      </a>
          <p>Scopri di più</p>
        </div>
  </div>
    </div>
<!---------New Content Starts---------->
<div id="n-section1">
<section class="section-6">
<div class="custom_container cta_container" style="max-width: 1450px;">
      <div class="cta_card _1">
    <div class="text-block-5" style="width: 100%;">
          <div class="img-left"> <img src="images/qestion-icon.png" width="77" alt=""> </div>
          <div class="text-left">
        <?php
      /*<h2>Cos'è Mobidoc?</h2> Mobidoc è un servizio di visite mediche a domicilio a nessun costo aggiuntivo per il paziente.*/
      ?>
        <h2>Cos'è Mobidoc?</h2>
        Mobidoc è un servizio di visite mediche ed esami a domicilio. </div>
        </div>
  </div>
      <div class="cta_card _2">
    <div class="text-block-5">
          <div class="img-left"> <img src="images/location-icon.png" width="77" alt=""> </div>
          <div class="text-left">
        <?php
      /*	<h2>Dove Operiamo? </h2> Al momento offriamo visite a domicilio per pazienti in provincia di Ferrara e Rovigo.*/
      ?>
        <h2>Dove Operiamo? </h2>
        Siamo presenti in provincia di Ferrara <span class="mob_hide"><br>
            </span> e di Rovigo. </div>
        </div>
  </div>
      </section>
    </div>
<div id="n-section2">
      <section class="section-2" style="padding-top: 50px;padding-bottom: 0px;background-color: #F3F4F9;">
    <div class="custom_container">
          <div class="content_grid-2">
        <h2 class="heading-2">Visite Mediche Prenotabili a Domicilio:</h2>
        <p class="paragraph">I nostri professionisti sono medici, psicologi, infermieri, fisioterapisti e tecnici di radiologia che credono che la migliore cura possibile sia quella a casa del paziente: siamo noi che veniamo da te quando ne hai bisogno.</p>
      </div>
          <?php

          include 'connect.php';
          if($conn === false){
              die("ERROR database");
          }
      $x_num=0;
      echo "<div class=\"feature_container abc\">";

      $sql_get_result1 = "SELECT v.visit_id, v.visit_name, v.body_text, v.image, v.specialty_id FROM visit v JOIN medical_specialty ms ON ms.id=v.specialty_id WHERE ms.`status`='Y'";
      $get_result1 = mysqli_query($conn, $sql_get_result1);
      $row_count1 = mysqli_num_rows($get_result1);

      while($visit_doc_rows = mysqli_fetch_array($get_result1)){
      $visit_name1 = $visit_doc_rows['visit_name'];
      $visit_id = $visit_doc_rows['specialty_id'];
        $link1 = '/visite-ed-esame/landing-page.php?mds_name='.$visit_name1.'&mds_id='.$visit_id;
          $image1 = 'empty.jpg';
          if (!empty($visit_doc_rows['image'])){
              $image1 = $visit_doc_rows['image'];
          }
      if($row_count1){
        if($x_num!=0 && $x_num%3==0){
          echo "</div>\n<div class='feature_container abc'>";
        }

        $tm21_class = '';
        if (strlen($visit_name1) < 20)
          $tm21_class = 'm-t-14';
      ?>
          <div class="feature diff"> <a href="<?php echo $link1?>" target="_blank">
            <div class="feature_label <?php echo $tm21_class?>"><?php echo wordwrap($visit_name1,20,"<br>\n");?> <img src="images/arrow.png" alt="" > </div>
            <img src="/assets/visit_images/<?php echo strtolower($image1)?>?v=3" style="width: 550px;height: 300px;max-width: 463px;" alt=""> </a> </div>
          <?php
          ++$x_num;
        }}
          echo "</div>";
          ?>
        </div>
  </section>
    </div>
<div id="n-section3">
      <div class="cta_section">
    <div class="text-block-3">Non trovi il tipo di visita di cui hai bisogno?</div>
    <a href="tel:3357798844" class="w-inline-block" style="float: inherit"> <a href="tel:3357798844" class="button gradient large diff w-inline-block home-tel"> <img src="images/phone.svg" width="15" alt="" class="image-2">
        <div class="text-block-2">Chiamaci</div>
        </a> </a> </div>
    </div>
<div id="n-section4">
      <section class="section-2 sec4-style">
    <div class="custom_container">
          <div class="content_grid-2">
        <h2 class="heading-2">Come funziona Mobidoc?</h2>
      <?php
      /*
        <p class="paragraph">Mobidoc è un punto di riferimento per chiunque abbia bisogno di assistenza sanitaria e voglia un servizio attento e dedicato, compatibile con i propri impegni, senza doversi sottoporre ad interminabili attese ed inutili spostamenti.</p>
      */
      ?>
      </div>
          <div class="feature_container">
        <div class="feature diff">
              <div class="number">01</div>
              <img src="images/icon-1.png" alt="">
              <div class="feature_label">Seleziona la visita o l'esame</div>
            </div>
        <div class="dottedline"></div>
        <div class="feature diff">
              <div class="number">02</div>
              <img src="images/icon-2.png" alt="">
              <div class="feature_label">Scegli il Professionista<span class="hide"><br>
                </span> e accordati su data e orario</div>
            </div>
        <div class="dottedline"></div>
        <div class="feature diff" id="feature_dif3">
              <div class="number">03</div>
              <img src="images/icon-3.png" alt="">
              <div class="feature_label">Paghi in tutta sicurezza<span class="hide"><br>
                </span> a prestazione avvenuta</div>
            </div>
      </div>
          <a href="/visite-ed-esami.php" class="w-inline-block"> <a href="/visite-ed-esami.php" class="button w-inline-block m-r-20">
      <div class="text-block-2">Prenota Online</div>
      </a> </a> <a href="tel:3357798844" class="button gradient large diff w-inline-block home-tel"> <img src="images/phone.svg" width="15" alt="" class="image-2">
      <div class="text-block-2">Chiamaci</div>
      </a> </div>
  </section>
    </div>
<!---------New Content Ends---------->
<section id="section-3-grid" data-w-id="92431e2b-82c4-bfde-c60b-c27892faf8bb" class="section-3">
      <div class="custom_container">
    <div class="content_grid-2">
          <h2 class="heading-2">Copertura Visite a Domicilio</h2>
          <p class="paragraph">I professionisti di Mobidoc sono entrati a far parte del team grazie alla Loro esperienza e competenza. Sin da subito hanno creduto che la Loro professionalità potesse essere messa a disposizione di chi soffre non solo nel proprio ambulatorio o in ospedale, ma anche a casa del paziente, realizzando in questo modo una rete assistenziale coordinata in cui il paziente è sempre al centro dell’attenzione.</p>
        </div>
    <div class="w-embed">
          <style>
						.number_data {
							background: -webkit-linear-gradient(#0CD9ED, #00285C) !important;
							-webkit-background-clip: text !important;
							-webkit-text-fill-color: transparent !important;
						}

					</style>
        </div>
    <?php
				$doctor = "select * from doctor_profile";
				$doctor_result = mysqli_query( $conn, $doctor );
				$doctor_count = mysqli_num_rows( $doctor_result );

				$visit = "select DISTINCT article_mobidoc_id from listini";
				$visit_result = mysqli_query( $conn, $visit );
				$visit_count = mysqli_num_rows( $visit_result );

				$comune = "select DISTINCT cap from doctor_cap";
				$comune_result = mysqli_query( $conn, $comune );
				$comune_count = mysqli_num_rows( $comune_result );
				?>
    <div class="feature_container diff">
          <div class="feature">
        <div class="numbers_container">
              <div data-w-id="32345caf-6858-0c9c-427c-2f0ee289a85f" style="-webkit-transform:translate3d(0, 0%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, 0%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, 0%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, 0%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0)" class="numbers">
            <div class="extra">
                  <h1 class="number_data">0+</h1>
                  <h1 class="number_data">4+</h1>
                  <h1 class="number_data">7+</h1>
                  <h1 class="number_data">10+</h1>
                  <h1 class="number_data">13+</h1>
                  <h1 class="number_data">24+</h1>
                  <h1 class="number_data">30+</h1>
                  <h1 class="number_data">36+</h1>
                  <h1 class="number_data">45+</h1>
                  <h1 class="number_data">48+</h1>
                  <h1 class="number_data">53+</h1>
                  <h1 class="number_data">67+</h1>
                  <h1 class="number_data">74+</h1>
                  <h1 class="number_data">78+</h1>
                </div>
            <div class="main">
                  <h1 class="number_data"> <?php echo $visit_count?>+</h1>
                </div>
          </div>
            </div>
        <div class="feature_label light odd">Tipologie di Visite Offerte</div>
      </div>
          <div class="feature">
        <div class="numbers_container">
              <div data-w-id="3236a1ad-ed1f-ad23-f1bd-66b47e4d00bb" style="-webkit-transform:translate3d(0, 0%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, 0%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, 0%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, 0%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0)" class="numbers">
            <div class="extra">
                  <h1 class="number_data">0+</h1>
                  <h1 class="number_data">1+</h1>
                  <h1 class="number_data">3+</h1>
                  <h1 class="number_data">4+</h1>
                  <h1 class="number_data">5+</h1>
                  <h1 class="number_data">6+</h1>
                  <h1 class="number_data">7+</h1>
                  <h1 class="number_data">8+</h1>
                  <h1 class="number_data">9+</h1>
                  <h1 class="number_data">10+</h1>
                  <h1 class="number_data">11+</h1>
                  <h1 class="number_data">10+</h1>
                  <h1 class="number_data">12+</h1>
                  <h1 class="number_data">13+</h1>
                </div>
            <div class="main">
                  <h1 class="number_data"> <?php echo $comune_count?>+</h1>
                </div>
          </div>
            </div>
        <div class="feature_label light odd">Comuni</div>
      </div>
          <div class="feature">
        <div class="numbers_container">
              <div data-w-id="10dc85d5-3103-2042-143c-7754412e5e5d" style="-webkit-transform:translate3d(0, 0%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, 0%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, 0%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, 0%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0)" class="numbers">
            <div class="extra">
                  <h1 class="number_data">0+</h1>
                  <h1 class="number_data">1+</h1>
                  <h1 class="number_data">3+</h1>
                  <h1 class="number_data">7+</h1>
                  <h1 class="number_data">10+</h1>
                  <h1 class="number_data">13+</h1>
                  <h1 class="number_data">18+</h1>
                  <h1 class="number_data">20+</h1>
                  <h1 class="number_data">21+</h1>
                  <h1 class="number_data">24+</h1>
                  <h1 class="number_data">25+</h1>
                  <h1 class="number_data">26+</h1>
                  <h1 class="number_data">27+</h1>
                  <h1 class="number_data">29+</h1>
                </div>
            <div class="main">
                  <h1 class="number_data"> <?php echo $doctor_count?>+</h1>
                </div>
          </div>
            </div>
        <div class="feature_label light odd">Professionisti</div>
      </div>
        </div>
  </div>
    </section>
<div id="n-section5">
      <div class="section-28">
    <div class="map">
          <div class="map_code w-embed w-iframe">
          <?php
          /*
                  <iframe src="https://snazzymaps.com/embed/188234" width="100%" height="100%" style="border:none;"></iframe>

          */
          ?>
           <iframe src="https://snazzymaps.com/embed/279561" width="100%" height="100%" style="border:none;"></iframe>
          </div>
        </div>
    <a href="comuni-serviti.php" class="button gradient w-button">Scopri Lista Comuni</a><a href="#masthead" class="button _2nd w-button">Ricerca Visita o Esame</a> </div>
    </div>
<section class="section-4">
      <div class="custom_container card verti">
    <h2 class="heading-2 bold center odd">I migliori Professionisti, a casa tua</h2>
    <p class="paragraph p feature diff"><em class="italic-text">La selezione dei professionisti Mobidoc avviene sempre tramite rigorosissimi controlli. Mobidoc è un servizio sanitario con caratteristiche di multidisciplinarietà: medici, psicologi, infermieri, fisioterapisti, tecnici di radiologia altamente qualificati e selezionati dalla direzione di Mobidoc lavorano assieme per rispondere ai bisogni e alle esigenze del pazienti. Il team di mobidoc è in grado di rispondere a dubbi diagnostici ed effettuare terapie in un ampio range di situazioni sanitarie.</em><br>
        </p>
    <a href="team-mobidoc.php" class="button stroked card w-button">Scopri i Professionisti</a> </div>
    </section>
<div id="n-section6">
      <section class="section-5">
    <div class="custom_container doc">
          <div class="content_grid-2">
        <h2 class="heading-2">La Direzione Mobidoc</h2>
        <p class="paragraph">Il progetto nasce dalla consapevolezza che è possibile portare a del paziente tecnologie complesse e professionalità qualificate, con percorsi di cura caratterizzati da umanità ed empatia.</p>
      </div>
          <div class="doctors_container">
        <style>
							@media (max-width: 600px) {
								.doctor.one {
									display: none;
								}
							}

						</style>
        <?php
     /*
     	<div class="doctor one" style="visibility:hidden;">
						<img src="images/5ccc4a39405083b13e2f7828_WhatsApp-Image-2019-04-12-at-10.43.19-AM-p-500.jpg" width="174" alt="" class="doctor_image">
						<div class="doctor_data home">
							<div class="doctor_name_container">Paolo Colamussi</div>
							<div class="text-block-4">Medico, Coordinatore Sanitario</div>
						</div>
					</div>
     */
     ?>
        <div class="doctor"> <img src="images/5ccc4a39405083b13e2f7828_WhatsApp-Image-2019-04-12-at-10.43.19-AM-p-500.jpg" width="174" alt="" class="doctor_image">
              <div class="doctor_data home">
            <div class="doctor_name_container">Paolo Colamussi</div>
            <div class="text-block-4">Medico, Coordinatore Sanitario</div>
          </div>
            </div>
        <div class="doctor"> <img src="images/5ccc4a394050836b4c2f781b_IMG_1598-p-500.jpg" width="174" alt="" class="doctor_image">
              <div class="doctor_data home">
            <div class="doctor_name_container">Maddalena Pellegrini</div>
            <div class="text-block-4">Psicologa, Responsabile Qualità</div>
          </div>
            </div>
        <?php
    /*
    	<div class="doctor"><img src="images/5ccc4a394050836a6f2f7823_WhatsApp-Image-2019-04-12-at-9.32.30-AM-p-500.jpg" width="174" alt="" class="doctor_image">
                  <div class="doctor_data home">
                    <div class="doctor_name_container">Francesco Sisini</div>
                    <div class="text-block-4">Fisico, Responsabile Servizi Informatici</div>
                  </div>
                  </div>
    */
    ?>
      </div>
          <?php
     /*
     <a href="team-mobidoc.php" class="button gradient w-button">Scopri I Professionisti</a>
     */
     ?>
        </div>
  </section>
    </div>
<div class="login_alert">
      <div data-w-id="6442a0e1-ecb3-7c36-de0a-5ddd0865f2f8" class="closer"></div>
      <div class="div-block-22"> <img src="images/upload_1.svg" width="38" alt="" class="image-19">
    <div class="text-block-15">Please Login to Continue</div>
    <a href="#" class="button gradient redirect-to-login w-button">Click here to Login</a> </div>
    </div>
<div class="section-29">
      <div class="custom_container instagram_feed"> <a href="https://www.instagram.com/mobidoc.it/" target="_blank" class="social_card_lonk instagram w-inline-block">
        <div class="scl_container"> <img src="https://uploads-ssl.webflow.com/5d8cfd454ebd737ac1a48727/5e15d52a9ba5cbf59d45455a_insta_icon.png" width="110" alt="" class="scl_icon">
        <div class="text-block-83">Seguici su Instagram</div>
      </div>
        </a> <a href="https://www.facebook.com/mobidoc.it/" target="_blank" class="social_card_lonk facebook w-inline-block">
        <div class="scl_container"> <img src="https://uploads-ssl.webflow.com/5d8cfd454ebd737ac1a48727/5e15d62617a0cf0456db035b_facebook_icon.png" width="54" alt="">
          <div class="text-block-83">Seguici su Facebook</div>
        </div>
        </a> </div>
    </div>
<!-- Selectors -->
<div data-w-id="0c4e9c06-8324-405c-d768-8f6c4e54e08d" style="display:none;opacity:0; overflow:scroll;" class="select_visite">
      <div data-w-id="846dfde8-e7fc-1511-31bf-14155a9a348a" class="closer"></div>
      <div data-w-id="dbc1b59d-c9bc-fdcc-a3cc-c03b5ec00dce" style="opacity:0;-webkit-transform:translate3d(0, 10%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, 10%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, 10%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, 10%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0)" class="visite_select_container">
    <div class="close_btn" data-w-id="846dfde8-e7fc-1511-31bf-14155a9a348a"><img src="https://uploads-ssl.webflow.com/5d8cfd454ebd737ac1a48727/5d9d869b12f8e2378f12b8e3_Path%20175.svg" alt="" class="image-27"/> </div>
    <div class="text-block-18">Seleziona il tipo di visita</div>
    <div class="visite_list" id="visite_list"> </div>
    <div class="div-block-21"><a data-w-id="c01137a8-e8e9-5c27-bf44-f169900449a8" href="#" class="button-3 next close odd w-button">Close</a><a data-w-id="c01137a8-e8e9-5c27-bf44-f169900449aa" href="#" class="button-3 next w-button" style="padding-right:100px;">Continua</a> </div>
  </div>
    </div>
<div data-w-id="8622417e-2876-b078-2cca-269a7aef7fe0" class="select_doctor div-block-26">
      <div data-w-id="8622417e-2876-b078-2cca-269a7aef7fe2" style="-webkit-transform:translate3d(0, 10%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, 10%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, 10%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, 10%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);opacity:0" class="select_doctor_container">
    <div class="text-block-18">Seleziona Professionista</div>
    <div class="div-block-19">
          <div class="div-block-20" id="load_doctors"> </div>
        </div>
    <div class="div-block-25">
          <form action="checkout.php?book_visit" method="get">
        <input type="text" name="book_visit" id="book_visit" style="display:none;">
        <input type="text" name="book_doctor" id="book_doctor" style="display:none;">
        <a data-w-id="8622417e-2876-b078-2cca-269a7aef8012" href="#" class="button-3 next odd w-button" style="padding-right:50px;">Indietro</a>
        <button href="checkout.php" class="button-3 next w-button" style="padding-right:100px;">Continua</button>
      </form>
        </div>
  </div>
      <div data-w-id="8622417e-2876-b078-2cca-269a7aef7fe1" class="closer"></div>
    </div>
<!-- Selectors -->
<?php include 'cta_cards2.php';?>
<?php include 'footer.php';?>
<script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.4.1.min.220afd743d.js" type="text/javascript" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script> 
<script src="js/webflow.js?v=6" type="text/javascript"></script> 
<!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
<div id="fb-root"></div>
<script async="" defer="" crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v4.0"></script> 
<script>
			$( document ).ready( function () {
				$( '.visite' ).click( function () {
					$( '.visite' ).removeClass( "visite_selected_true" );
					$( this ).addClass( "visite_selected_true" );
				} );
				$( '.select_button' ).click( function () {
					$( '.selected_tick' ).removeClass( "selected_true" );
					$( this ).parent().siblings( ".professionist_image_container" ).find( '.selected_tick' ).addClass( "selected_true" );
				} );

				$( '#popup_button' ).click( function () {
					$( '.gdpr_popup' ).hide();
				} );

			} );

   $(".domici-btn").click(function (event) {
     event.preventDefault();
     $('html, body').animate({scrollTop: $('#n-section2').offset().top}, 1500);
   });
		</script>
<?php include ("google_analytic.php")?>
</body>
</html>
<style>
.popup_show {
	display: block !important;
}
.slect_visit_first {
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
.slect_visit_first span {
	font-family: Poppins, sans-serif;
	color: #00285c;
	font-size: 20px;
}
.button.gradient.contact {
	margin-right: auto;
	margin-left: auto;
	padding: 14px 48px;
	float: none;
	font-size: 14px;
}
.text-field-3.contact {
	width: 100%;
	border-bottom-style: solid;
	background-color: rgba(211, 251, 255, 0.48);
	font-family: Poppins, sans-serif;
}
.text-field-3.contact.text_ara {
	min-height: 150px;
	padding-top: 20px;
}
.contact_section {
	margin-bottom: 60px;
	padding-top: 5%;
	padding-bottom: 5%;
	background-color: #edfdff;
}
.contact_form {
	width: 60%;
	max-width: 550px;
	padding: 30px 30px 20px;
	border-style: none;
	border-width: 1px;
	border-color: rgba(12, 217, 237, 0.52);
	border-radius: 10px;
	background-color: rgba(255, 255, 255, 0.5);
	box-shadow: -1px 10px 25px 0 rgba(0, 40, 92, 0.06);
}
.form-block-4 {
	text-align: left;
}
.heading-2.diff.dd {
	margin-bottom: 30px;
	text-align: center;
}
.custom_container.center {
	display: -webkit-box;
	display: -webkit-flex;
	display: -ms-flexbox;
	display: flex;
}
.div-block-77 {
	display: -webkit-box;
	display: -webkit-flex;
	display: -ms-flexbox;
	display: flex;
}
.contact_sucess {
	margin-top: 30px;
	margin-bottom: 15px;
	padding: 17px;
	border-radius: 5px;
	background-color: #c6ffe3;
}
.text-block-82 {
	font-family: Poppins,
}
</style>
