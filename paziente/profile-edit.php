<?php session_start();
	if(!isset($_SESSION['paziente_email']))
	{
		header("Location: login.php");
  }
  $user_email = $_SESSION['paziente_email'];

  include '../connect.php';
	$sql = "select * from contact_profile where email = '".$user_email."'";
  $result = mysqli_query($conn, $sql);
  $rows = mysqli_fetch_array($result);

  $name = $rows['name'];
	$cogname = $rows['surname'];
  $email = $rows['email'];
  $phone = $rows['phone'];
  $check = $rows['privacy_consent'];

?>
<!DOCTYPE html>
<html data-wf-page="5daa262de3e3f064091af31c" data-wf-site="5d8cfd454ebd737ac1a48727">
<head>
  <meta charset="utf-8">
  <title>Profile Update</title>
  <meta content="Profile Update" property="og:title">
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
  <link href="dist/css/datepicker.css" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
  <link href="../dist/css/selectize.default.css" rel="stylesheet"/>
  <script src="../dist/js/standalone/selectize.min.js"></script>
  <script src="dist/js/datepicker.js"></script>
  <script src="dist/js/i18n/datepicker.en.js"></script>
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
   function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();

                      reader.onload = function (e) {
                        $('#dp_2').css('background', 'url("'+e.target.result+'") no-repeat center center / cover')
                      };
                      reader.readAsDataURL(input.files[0]);
                    }
                  }
</script>
</head>
<body>
  <?php include '../header.php';?>
  <div class="masthead upform">
    <div class="masthead_container up_form" style="margin-bottom:50px;">
      <h1 class="heading-10">Compila il modulo per aggiornare i tuoi dati personali</h1>
      <div class="cover_section_buttons_container" style="margin-top:30px;">
        <a href="logout.php" class="button stroked cover_btns logout w-button">Esci</a>
      </div>
    </div>
  </div>
  <section class="section-19">
    <div class="custom_container update_form">
      
      <div class="update_form_main_container">
        <div class="update_form_block w-form">
          <form id="email-form" name="email-form" class="update_form" action="profile_edit_php.php" method="post" enctype="multipart/form-data">
            <div>
              <div class="form_section">
                <div class="form_section_heading">Dati anagrafici</div>
                <div class="dual_container diff">
                  <input type="text" class="inputs w-input" maxlength="256" name="first_name" value="<?PHP echo $name;?>" data-name="first_name" placeholder="Nome" id="first_name">
                  <input type="text" class="inputs w-input" maxlength="256" name="last_name" value="<?PHP echo $cogname;?>"  data-name="last_name" placeholder="Cognome" id="last_name">
                </div>
                </div>
              <div class="form_section">
                <div class="form_section_heading">Contatti</div>
                <div class="dual_container diff">
                  <input type="email" class="inputs w-input" maxlength="256" name="email" value="<?PHP echo $email;?>"   data-name="email" placeholder="Email" id="email" readonly>
                  <input type="tel" class="inputs w-input" maxlength="256" name="tele" data-name="tele" placeholder="Telefono" id="tele" required="" value="<?PHP echo $phone;?>">
                </div>
              </div>
              <input type="text" name="privacy_check" id="privacy_check" value="<?php echo $check;?>" style="display:none;">
              <script>
                jQuery(document).ready(function() {
                    jQuery('#checkbox').change(function() {

                        if ($(this).prop('checked')) {
                           $('#privacy_check').val('Y');
                        }
                        else {
                          $('#privacy_check').val('N');
                        }
                    });
                });
              </script>

                <?php 
                  if($check == 'Y'){ ?>

                    <div class="form_section">
                      <div class="form_section_heading">Consenso privacy</div>
                      <label class="w-checkbox checkbox-field-2">
                        <div class="w-checkbox-input w-checkbox-input--inputType-custom checkbox w--redirected-checked"></div>
                        <input type="checkbox" id="checkbox" checked name="checkbox" data-name="Checkbox" style="opacity:0;position:absolute;z-index:-1" >
                        <span class="checkbox-label-2 w-form-label">Esprimo il consenso in merito al trattamento e alla comunicazione a terzi dei miei dati personali per finalità di marketing</span>
                      </label>
                    </div>
                    
                  <?php } else { ?>
                    <div class="form_section">
                      <div class="form_section_heading">Consenso privacy</div>
                      <label class="w-checkbox checkbox-field-2">
                        <div class="w-checkbox-input w-checkbox-input--inputType-custom checkbox"></div>
                        <input type="checkbox" id="checkbox" name="checkbox" data-name="Checkbox" style="opacity:0;position:absolute;z-index:-1" required>
                        <span class="checkbox-label-2 w-form-label">Esprimo il consenso in merito al trattamento e alla comunicazione a terzi dei miei dati personali per finalità di marketing</span>
                      </label>
                    </div>
                  <?php } ?>                 

              </div>
              
                <div class="div-block-34">
                  <div class="div-block-35">
                  <?php
                  /*
                    <div class="profile_image_container">
                      <div id="dp_2" style="width:100%; height:100%; background: url('<?PHP echo $photo;?>'); background-position:center; background-size:cover;cursor: pointer"></div>
                    </div>
                    <div class="text-block-33">Carica un’immagine profilo</div>
                    <br>
                    <input type="file" class="upload_image" style="display:none;" name="upload-image" accept="image/*" onchange="readURL(this);">

                  */
                  ?>
                  </div>

            </div>
            <div>
              <input type="submit" style="color:#fff !important;" value="Conferma Dati" id="submit" class="button gradient submit w-button">
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
  <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.4.1.min.220afd743d.js" type="text/javascript" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script src="../js/webflow.js" type="text/javascript"></script>
  <!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
  <div id="fb-root"></div>
  <script async="" defer="" crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v4.0"></script>

  <style>
    .search_help_open{
      display: block !important;
    }
    .search_help_open:hover{
      display: block !important;
    }    

    .search_cap_input{
      display: inline-flex;
    }

    .selecteds{
      overflow:scroll !important;
    }
     
  .cap_name_input{
    -webkit-transform:translateX(-30px);
      -ms-transform:translateX(-30px);
          transform:translateX(-30px);
    margin:-5px;
  }
  .text-block-44{
    background:none;
    border:none;
  }
  textarea{resize: none;}
  .select-field {
  width: 100%;
  height: 100%;
  padding-top: 12px;
  padding-bottom: 12px;
  border: 1px none #000;
  background-color: transparent;
  color: #00285c;
}
   
::-webkit-scrollbar {
  width: 0px;
  height:0px;
}
	.p{
  	text-align-last: center !important;
  }

  .selectize-control{
    width:100%;
  }

  ::placeholder {
  color:rgba(0, 40, 92, 0.65); !important;
}

  .selectize-input {
    background:transparent !important;
    border:none;
    box-shadow: none !important;
    padding:20px;
    margin-top:5px !important;
    color:#00285c !important;
  }

  .selectize-dropdown{  
    background: #E4FDFF !important;
    border:none;
    margin-top:10px;
    border-radius: 5px !important;
    box-shadow: 3px 30px 50px 0 rgba(0, 37, 84, 0.16) !important;
    color:#00285c !important;
    height:250px !important;
    padding: 0px !important;
    overflow: hidden !important;
  }

  .selectize-dropdown-content{
    max-height:100% !important;
  }

  .selectize-dropdown-content .option{
    padding: 20px !important;
    margin:0px !important;
  }

  input[readonly]{
    background:#D3FBFF !important;
    color:#00285C !important;
  }

  input{    
    color:#00285C !important;
  }

</style>

  <?php include ("../google_analytic.php")?>
</body>
</html>