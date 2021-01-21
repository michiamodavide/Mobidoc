<?php session_start();

if (!isset($_SESSION['doctor_email'])) {
  header("Location: login.php");
}
if (!isset($_GET['bookid'])) {
  header("Location: login.php");
}
?>
<!DOCTYPE html>
<html data-wf-page="5daa262de3e3f05ab91af322" data-wf-site="5d8cfd454ebd737ac1a48727">
  <head>
  <meta charset="utf-8">
  <title>Modifica prenotazione</title>
  <meta content="Crea un Profilo" property="og:title">
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
  <script src="https://kit.fontawesome.com/3f12b8b553.js" crossorigin="anonymous"></script>
  <style>
::-webkit-scrollbar {
 width: 0px;
 height:0px;
}
.p {
	text-align-last: center !important;
}
.edit_profile .update_form {
    display: -ms-grid;
    display: grid;
    margin-top: 0px;
    grid-auto-columns: 1fr;
    grid-column-gap: 16px;
    grid-row-gap: 0px;
    -ms-grid-columns: 1fr;
    grid-template-columns: 1fr;
    -ms-grid-rows: auto;
    grid-template-rows: auto;
}
.edit_profile .choose_your_area {
    margin-top: 0px;
}
.inputs {
    background-color: #ebeef2;

}
.edit_profile .selectize-input {

    padding: 13px 20px;

}
.edit_profile .button.gradient.submit {
    display: block;
    margin: 0 auto;
}
.section-23{
 min-height: inherit;
}
@media only screen and (max-width: 767px) {
.edit_profile .section-23 {
    display: block; 
	min-height: auto;
}
 .custom_container.detailed{
  display: block;
 }
.edit_profile .master_head.detaild {
    height: 58vh;
}
}

</style>
  </head>

  <body class="edit_profile">
  <?php include '../header-prof.php';?>
  <div class="master_head detaild">
    <div class="custom_container detailed">
      <h1 class="heading-15">Modifica prenotazione</h1>
    </div>
  </div>
  <div class="section-23">
    <div class="custom_container"> 
      <!--<p class="paragraph-9">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros elementum tristique. Duis cursus, mi quis viverra ornare, eros dolor interdum nulla, ut commodo diam libero vitae erat. Aenean faucibus nibh et justo cursus id rutrum lorem imperdiet. Nunc ut sem vitae risus tristique posuere.</p>
    -->
      <div class="update_form_main_container">
        <div class="update_form_block w-form">
          <form id="email-form" name="email-form" data-name="Email Form" class="update_form" action="exec_edit_booking.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="booking_id" value="<?php echo $_GET['bookid']?>">
            <div>
              <div class="form_section">
                <div class="dual_container diff">
                  <input type="text" class="datepicker-here inputs w-input appoint_time" data-language="it" data-date-format="dd-mm-yyyy"
                      maxlength="256" autocomplete="off" name="appoint_time" placeholder="Data e Ora" id="appoint_time">
                      <div class="choose_your_area">
                  <div class="search_cap_input sci2">
                    <div class="input_element"> <img src="../images/search.svg" width="28"  alt="">
                      <select id="select-refer" name="ref_id" placeholder="Seleziona Refertatore">
                        <?php
                      include '../connect.php';

                      $booking_id =  $_GET['bookid'];
                      /*get data from booking table*/
                      $sql = "select * from bookings where booking_id ='" . $booking_id . "'";
                      $result = mysqli_query($conn, $sql);
                      $booking_res = mysqli_fetch_array($result);


                      $ref_v_sql21 = "select * from doctor_profile where doctor_id ='" . $booking_res['refertatore_id'] . "' AND puo_refertare ='Y' AND active ='Y'";
                      $ref_v_result21 = mysqli_query($conn, $ref_v_sql21);
                      $ref_v_res21 = mysqli_fetch_array($ref_v_result21);
                      ?>
                        <option value="<?PHP echo $ref_v_res21['doctor_id']; ?>"
                             selected><?PHP echo $ref_v_res21['fname'] . ' ' . $ref_v_res21['lname']; ?></option>
                        <?php
                      $doctor_v_sql = "select * from doctor_visit where visit_name ='" . $booking_res['visit_name'] . "'";
                      $doctor_v_result = mysqli_query($conn, $doctor_v_sql);

                      while ($doctor_v_rows = mysqli_fetch_array($doctor_v_result)) {
                        $ref_v_email = $doctor_v_rows['doctor_email'];
                        $ref_v_sql2 = "select * from doctor_profile where email ='" . $ref_v_email . "' AND puo_refertare ='Y' AND active ='Y'";
                        $ref_v_result2 = mysqli_query($conn, $ref_v_sql2);
                        $ref_v_res2 = mysqli_fetch_array($ref_v_result2);
                        if ($ref_v_res2 && $ref_v_res2['doctor_id'] != $booking_res['refertatore_id']) {
                          ?>
                        <option
                          value="<?PHP echo $ref_v_res2['doctor_id']; ?>"><?PHP echo $ref_v_res2['fname'] . ' ' . $ref_v_res2['lname']; ?></option>
                        <?php }
                      }
                      ?>
                        <input type="hidden" class="old_ref_id" name="old_ref_id" value="<?PHP echo $ref_v_res21['doctor_id']; ?>">
                        <input type="hidden" class="opt_date" name="opt_date" value="<?php echo $booking_res['apoint_time']?>">
                        <?php mysqli_close($conn); ?>
                      </select>
                      <script>
                      $('#select-refer').selectize();
                    </script> 
                    </div>
                  </div>
                </div>
                </div>
                
              </div>
              <input type="submit" name="submit" value="Conferma  Dati" class="button gradient submit proff w-button" id="submit_profile">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.4.1.min.220afd743d.js" type="text/javascript" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script> 
  <script src="../js/webflow.js" type="text/javascript"></script> 
  <!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
  <div id="fb-root"></div>
  <script src="/paziente/date_pic.js?v=1"></script> 
  <script src="/paziente/dist/js/i18n/datepicker.en.js?v=1"></script> 
  <script type="text/javascript">

  $( document ).ready(function() {
    var opt_date = $(".opt_date").val();
    addDate(opt_date);
  });
  $(".appoint_time").keyup(function(){
    var get_date = $(this).val();
    addDate(get_date);
  });

  function addDate(date) {
    var select_date = date.split('-');
    var date_string = select_date[1] + '-' + select_date[0] + '-' + select_date[2];

    var opoint_date = opoint_date = new Date(date_string);
    setTimeout(function(){
      if (opoint_date == 'Invalid Date') {
        //do not do anyting
      }else {
        $('.appoint_time').datepicker().data('datepicker').selectDate(new Date(opoint_date.getFullYear(), opoint_date.getMonth(), opoint_date.getDate(), opoint_date.getHours(), opoint_date.getMinutes()));
      }
    }, 500);
  }
</script>
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
    background: #ebeef2 !important;
    border:none;
    margin-top:10px;
    border-radius: 5px !important;
    box-shadow: 3px 30px 50px 0 rgba(0, 37, 84, 0.16) !important;
    color:#00285c !important;
    height:auto !important;
    padding: 0px !important;
    overflow: hidden !important;
  }
  .input_element_new .selectize-dropdown {
    height: auto !important;
  }
  .selectize-dropdown-content{
    max-height:100% !important;
  }

  .selectize-dropdown-content .option{
    padding: 20px !important;
    margin:0px !important;
  }

</style>
  <style>
  .error_message{
    margin-bottom:25px;
  }
  .error_show{
    display:block !important;
  }

  .choose_your_area{
    margin-top:30px;
    margin-bottom:-10px;
  }
  .sci2 {
    width:100% !important;
  }
  .sci2 .input_element{
    width:100% !important;
  }
</style>
  <?php include ("../google_analytic.php")?>
</body>
</html>
