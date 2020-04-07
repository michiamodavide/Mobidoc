<?php session_start();
	if(!isset($_SESSION['id']) || $_SESSION['id'] == '') {
		header("Location: login.php");
	}
?>
<!DOCTYPE html>
<html data-wf-page="5dabf850508f04266ffb3542" data-wf-site="5d8cfd454ebd737ac1a48727">
<head>
  <meta charset="utf-8">
  <title>admin</title>
  <meta content="admin" property="og:title">
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
</head>
<body>
  <header class="admin_header">
    <div class="w-embed">
      <style>
	.blurer{
		backdrop-filter: blur(40px);
 	}
</style>
    </div>
    <div class="blurer">
      <div class="custom_container header diff">
        <div class="admin_logo"><a href="../"><img src="../images/256.svg" alt="" class="image-23 diff"></a>
          <div class="div-block-64">
            <h1 class="heading-21 diff">Admin Panel</h1>
            <div class="text-block-67">v1.0</div>
          </div>
        </div><a href="logout.php" class="button-9 stroked cover_btns logout diff w-button">Esci</a></div>
    </div>
  </header>
  <div class="section-33">
    <div class="custom_container">
      <h2 class="heading-22">Riepilogo Richieste</h2>
      <div class="doctors_block">
        <!--start-->
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
        ?>

        <div class="regi_doctor_card">
          <div class="regi_doctor_image"><img src="<?PHP echo $photo_link ?>" alt="" class="image-24"></div>
          <div class="div-block-65">
            <div id="w-node-aef90924dc63-6ffb3542" class="regi_name_block" style="margin-top:-15px; ">
              <div class="text-block-68" style="line-height:35px; margin-top:-5px; font-size:28px;">
                <?PHP echo ucwords($name)." ".ucwords($cogname); ?>
              </div>
			        <?PHP if($tick){?>
              <div class="approved_tick" ><img src="../images/Path-210.svg" width="13" alt="" class="image-26"></div>
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
          <div id="w-node-9d8b63d76574-6ffb3542" class="regi_button_container">
            <div id="w-node-57fb7d39e4ad-6ffb3542"><a href="<?PHP echo $cv; ?>" download class="button-10 w-button">Scarica CV</a></div>
            <div>
			  <?PHP if($status==0){ ?>
			  <a href="#" class="button-10 reject w-button">Rifiuta</a>
			  <?php } else {?>
			  <a data-w-id="b982edd5-a5eb-cb5e-9341-5d6c74a0dabe" href="#" class="button-10 remove w-button" >Rimuovi</a>
			  <?php }?>
              <div class="reject_confirm">
                <div data-w-id="1a32b22f-32a1-d854-69a3-befe12987261" class="closer diff"></div>
                <div style="-webkit-transform:translate3d(0, 10%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, 10%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, 10%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, 10%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);opacity:0" class="reject_container">
                  <div class="text-block-66">Sei sicuro di voler rifiutare questa candidatura?</div>
                  <div class="div-block-63"><a data-w-id="399b390c-d808-c63c-ef10-bb3654ce433f" href="#" class="button-5 no w-button">Cancella</a>
				          <a href="index2.php?s=0&email=<?php echo urlencode($email);?>" class="button-5 yes w-button">Conferma</a></div>
                </div>
              </div>
              <div style="opacity:0;display:none" class="remove_confirm">
                <div style="-webkit-transform:translate3d(0, 10%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, 10%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, 10%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, 10%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);opacity:0" class="reject_container removecontainer">
                  <div class="text-block-66">Sei sicuro di voler rimuovere questa candidatura?</div>
                  <div class="div-block-63">
                    <a data-w-id="74255c60-9acc-a579-cd6a-105520efb30a" href="#" class="button-5 no w-button">Cancella</a>
                    <a href="remove.php?email=<?php echo urldecode($email);?>" class="button-5 yes w-button">Conferma</a>
                  </div>
                </div>
                <div data-w-id="8c2a2020-c784-6355-3398-7be52cbc65a3" class="closer"></div>
              </div>
            </div>
            <div>
			  <?PHP if($status==0){ ?>
			  <a href="#" class="button-10 approve w-button">Approva</a>
			  <?php } else {?> 

        <a href="<?php echo $link?>" target="_blank" class="button-10 open_profile w-button" >Vedi Profilo</a>  
              
			  <?php }?>
              <div class="approve_confirm">
                <div data-w-id="59f3b168-1ab3-3c7d-7678-bb000b7ffbee" class="closer"></div>
                <div style="-webkit-transform:translate3d(0, 10%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, 10%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, 10%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, 10%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);opacity:0" class="approve_confirm_container">
                  <div class="text-block-66 diff">Sei sicuro di voler approvare?</div>
                  <div class="text-block-69">Una volta approvata la candidatura, un link per la registrazione verrà inviato alla casella mail del Professionista, il quale, effettuata la registrazione, potrà unirsi al team.</div>
                  <div class="div-block-63">
				            <a data-w-id="15a1390a-bf00-63fb-4540-2bd21b3d5132" href="#" class="button-5 no w-button">Cancella</a>
				            <a href="index2.php?s=1&email=<?php echo urlencode($email);?>" class="button-5 yes w-button">Si</a></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php } mysqli_close($conn);?>
        <!--end-->
      </div>
      <div class="end-of-the-list">
        <div class="line"></div>
        <div class="text-block-70">Hai raggiunto la fine della lista.</div>
        <div class="line"></div>
      </div>
    </div>
  </div>
  <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.4.1.min.220afd743d.js" type="text/javascript" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script src="../js/webflow.js" type="text/javascript"></script>
  <!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
  <div id="fb-root"></div>
  <script async="" defer="" crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v4.0"></script>
</body>
</html>