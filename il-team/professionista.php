<?php
session_start();
$doctor_id=$_SERVER['QUERY_STRING'];
/*if(isset($_GET['doctor_id'])) {
$doctor_id=$_GET['doctor_id'];
}
else { echo "<script>alert('Invalid link');</script>";
header("location: validate.php");
}*/

?>
<!DOCTYPE html>
<html data-wf-page="5daa262de3e3f003031af323" data-wf-site="5d8cfd454ebd737ac1a48727">
<head>
  <meta charset="utf-8">
  <title>Profilo professionista</title>
  <meta content="Docotr Profile" property="og:title">
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
  <script src="https://kit.fontawesome.com/3f12b8b553.js" crossorigin="anonymous"></script>
    <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.4.1.min.220afd743d.js" type="text/javascript" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

    <style>
::-webkit-scrollbar {
  width: 0px;
  height:0px;
}
	.p{
  	text-align-last: center !important;
  }
		
		
	@media screen and (max-width: 767px) {	
		.about_me{
			margin-left: 0%;
		}
		.about_ex_prof{
			width:82%;
		}}
</style>
</head>
<body>
  <?php include '../header.php';
	include '../connect.php';
  $sql = "select * from doctor_profile where doctor_id = ".$doctor_id."";

	$result = mysqli_query($conn, $sql);
  $rows = mysqli_fetch_array($result);
  
  if(isset($rows['doctor_id'])){
  } else {
    echo "<script>alert('Doctor Profile not Found!')</script>";
    echo "<script>window.location = '../'</script>";
  }

	$fname = $rows['fname'];
	$lname = $rows['lname'];
	$email = $rows['email'];
	$title = $rows['title'];
	$photo = "../professionisti/". $rows['photo'];
	$description = $rows['description'];
  ?>
  <div class="profile_masthead">
    <div class="custom_container user_block">
      <div class="user_img_name">
        <div class="user_image_container"><img src="<?PHP echo $photo;?>" alt="" class="image-15"></div>
        <div class="name_titilo">
          <h1 class="user_doctor_name"><?PHP echo $fname." ".$lname;?></h1>
          <div class="text-block-48"><?PHP echo $title;?></div>
        </div>
      </div>
      <div style="display:none;"><a href="#" class="button stroked book_doctro w-button">Prenota Visita</a></div>
    </div>
  </div>
  <div class="section-24">
    <div class="custom_container profilo_data">
      <div id="w-node-035afe234337-031af323" class="visite_ed_esami">
        <div class="grid_item_headin">Visite ed Esami</div>
        <div class="visite_container">
          <?php
			$sql = "SELECT DISTINCT am.id As article_id, descrizione, am.home, am.tele, am.attributo
FROM doctor_specialty ds 
JOIN articlesMobidoc_specialty as ams ON ds.specialty = ams.specialtyMobidoc
JOIN  listini as ls ON ams.id = ls.article_mobidoc_id
JOIN articlesMobidoc as am ON am.id = ls.article_mobidoc_id
WHERE ds.doctor_id='".$doctor_id."' AND ls.doctor_id='".$doctor_id."' AND am.home='Y' OR am.tele='Y'";
			$result = mysqli_query($conn, $sql);
			while($rows = mysqli_fetch_array($result)){
			$visit_name = $rows['descrizione'];
                $attribute = $rows['attributo'];
		  ?>	
		  <div style="cursor: pointer" class="doctura_visite">
            <div class="text-block-45">
              <?php
              echo $visit_name;
              if (!empty($attribute)){
                  echo ' <span style="font-size: 13px;font-weight: bold">('.$attribute.')</span>';
              }
              ?>
            </div>
          </div>
		  <?php
			}
		  ?>
          
        </div>
      </div>
      <div class="area_di_competenza">
        <div class="grid_item_headin">Prestazioni</div>
        <div class="areas">
          <div class="area">
            <div class="div-block-43"></div>
            <div class="area_text">
              <?=$title?>
              </div>

          </div>
       <div class="div" style="text-align:left;">
            <a href="/visite-ed-esami.php" class="button gradient visite_cta w-button move_to_div">Prenota Online</a>
</div>
        </div>
      </div>
      <div class="about_ex_prof">
        <div class="about_me">
          <div class="grid_item_headin">Su di me</div>
          <p class="paragraph-12"><?php echo $description;?></p>
        </div>
      </div>
    </div>
  </div>
  <div class="section-25">
    <div class="custom_container profilo_data comuni_serviti">
      <div>
        <h2 class="heading-16">Comuni Serviti:</h2>
        <div class="text-block-46"><!--Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed.--></div>
      </div>
      <div class="cap_served">
	  
		<?php
	$sql = "select * from doctor_cap where doctor_id = '".$doctor_id."'";
	$result = mysqli_query($conn, $sql);
	while($rows = mysqli_fetch_array($result)){
		$comune = $rows['comune'];
		$province = $rows['province'];
		$cap = $rows['cap'];
  ?>
  
        <div class="cap_copertura">
          <div class="city_name_container">
            <div class="bullets azure"></div>
            <div class="text-block-47"><?php echo $comune;?> (<?php echo $province;?>)</div>
          </div>
          <div class="cap_code"><?php echo $cap;?></div>
        </div>
        
        <?php 
		}
	mysqli_close($conn);
	?>

      </div>
    </div>
  </div>
  <?php include '../cta_cards.php';?>
  <?php include '../footer.php';?>
  <script src="../js/webflow.js" type="text/javascript"></script>
  <!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
  <div id="fb-root"></div>
  <script async="" defer="" crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v4.0"></script>
  <script>
    $(document).ready(function(){
      $('.user_image_container img').each(function(){
        var src = $(this).attr('src');
        if(src == '../professionisti/photo/default.jpg'){          
          $(this).attr('src','/images/Group-556.jpg');
        }
      });      
    });

    // $(".doctura_visite").on("click", function (e) {
    //   e.preventDefault();
    //   var current_visit_name = $(this).attr("data-item");
    //   var current_doc_id = $(this).data("id");
    //   window.location.href = '/checkout.php?book_visit='+current_visit_name+'&book_doctor='+current_doc_id;
    // })
  </script>
  <?php include ("../google_analytic.php")?>
</body>
</html>