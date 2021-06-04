<?php session_start();
if (!isset($_SESSION['adminlogin'])) {
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
  <link href="../css/admin/mobidoc.webflow.css?v=3" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script>
  <script
      type="text/javascript">WebFont.load({google: {families: ["Montserrat:100,100italic,200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic", "Poppins:100,100italic,200,300,300italic,regular,500,600,700,800,900", "PT Serif Caption:regular"]}});</script>
  <!-- [if lt IE 9]>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js" type="text/javascript"></script>
  <![endif] -->
  <script type="text/javascript">!function (o, c) {
          var n = c.documentElement, t = " w-mod-";
          n.className += t + "js", ("ontouchstart" in o || o.DocumentTouch && c instanceof DocumentTouch) && (n.className += t + "touch")
      }(window, document);</script>
  <link href="../images/favicon.png" rel="shortcut icon" type="image/x-icon">
  <link href="../images/webclip.png" rel="apple-touch-icon">
  <script src="https://kit.fontawesome.com/3f12b8b553.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
          crossorigin="anonymous"></script>

  <style>

      .list-style-new {
          width: 100%;
          border-bottom: 1px solid rgba(12, 217, 237, 0.7);
          background-color: rgba(211, 251, 255, 0.48);
          font-family: Poppins, sans-serif;
          padding: 15px 15px;
          border-top: none;
          border-right: none;
          border-left: none;
          border-radius: 5px;
      }

      .active {
          margin-left: 20px;
          font-weight: bold;
          border-bottom: 1px solid rgba(12, 217, 237, 0.7);
          background-color: rgba(211, 251, 255, 0.48);
          padding: 10px 10px;
          border-top: none;
          border-right: none;
          border-left: none;
          border-radius: 5px;
      }

      .inactive {
          background-color: #f8dbdb;
          border-bottom: 1px solid rgba(255, 117, 117, 0.7);
      }

      .width-1 {
          width: 370px;
          height: auto
      }

      .pop-width {
          width: 60%;
      }

      ::-webkit-scrollbar {
          width: 0px;
          height: 0px;
      }

      .p {
          text-align-last: center !important;
      }

      *:focus {
          outline: none;
          border: none;
      }

      .pro_type {
          margin-top: 20px;
          width: 100% !important;
          padding: 8px 7px;
          border-radius: 1.2rem;
          font-size: 12px;
          border: 1px solid #979797 !important;
      }

      /**************************************/
      .body-14 .glance_details_title {
          padding-top: 25px;
      }

      .body-14 .glance_details_title label {
          display: block;
          margin-bottom: 5px;
          font-weight: bold;
          float: left;
      }

      .body-14 input[type="checkbox"] {
          float: left;
          margin-right: 10px;
          margin-top: 4px;
      }

      @media screen and (max-width: 1536px) {
          .width-1 {
              width: 300px;
          }
      }

      @media screen and (max-width: 1440px) {
          .width-1 {
              width: 290px;
          }
      }

      @media screen and (max-width: 1366px) {
          .width-1 {
              width: 280px;
          }

          .input_num {
              width: 55px;
              padding-left: 3px;
              font-size: 14px

          }

          .image-14 {
              margin-left: 7px;
          }

          .visit_subitem {


              padding: 18px 25px 18px 15px;
          }

          .price_input {
              padding: 2px 2px 2px 6px;
          }
      }

      @media screen and (max-width: 1280px) {
          .width-1 {
              width: 270px;
          }

          .input_num {
              width: 55px;
              padding-left: 3px;
              font-size: 14px

          }

          .image-14 {
              margin-left: 7px;
          }

          .visit_subitem {


              padding: 18px 25px 18px 15px;
          }

          .price_input {
              padding: 2px 2px 2px 6px;
          }
      }

      @media screen and (max-width: 767px) {
          .admin_main_section .admin_section_header {
              display: inline-block;
              left: 90px;
          }

          .admin_main_section .scroll_indicator {
              display: none;
          }

          .body-14 .regi_doctor_card {

              padding: 23px 10px;

          }

          .width-1 {
              width: 100%;
          }

          .pop-width {
              width: 100%;
          }

          .grid-c {
              grid-template-columns: 1fr;
          }
      }

      @media screen and (max-width: 400px) {
          #add .button-10 {
              font-size: 11px;
          }
      }

      @media screen and (max-width: 340px) {
          #add .button-10 {
              margin-right: 10px !important;
          }
      }
      .active_anchor{
          text-decoration: none !important;
          color: black !important;
      }
      .active_anchor:hover{
          opacity: .7;
      }
  </style>
</head>
<body class="body-14">
<div>
    <?php include("admin_side_bar.php") ?>
  <div data-w-id="410c8c4a-713c-7280-b165-1dd2a36167c1" class="preloader">
    <div class="loader">
      <div data-w-id="410c8c4a-713c-7280-b165-1dd2a36167c3" data-animation-type="lottie"
           data-src="https://uploads-ssl.webflow.com/5d8cfd454ebd737ac1a48727/5df92a8de51cd1d00a86eb51_lottieflow-loading-04-2-00285C-easey.json"
           data-loop="1" data-direction="1" data-autoplay="1" data-is-ix2-target="0" data-renderer="svg"
           data-default-duration="1.7916666666666667" data-duration="0" class="lottie-animation-2"></div>
    </div>
  </div>
</div>
<div class="admin_main_section">
  <div data-w-id="671d7027-6f87-1c3f-c474-3b17f4b83b06" class="admin_section_header">
    <h1 class="admin_section_heading">Professionisti</h1>
    <div class="div-block-70">
      <div class="scroll_indicator">
        <div data-w-id="98c7cd18-996f-4b08-777e-ae54e6517910" data-animation-type="lottie"
             data-src="https://uploads-ssl.webflow.com/5d8cfd454ebd737ac1a48727/5df9f0f25ccbf3bb4c727941_lottieflow-scrolling-01-1-00285C-easey.json"
             data-loop="0" data-direction="1" data-autoplay="0" data-is-ix2-target="1" data-renderer="svg"
             data-default-duration="2.76" data-duration="0" class="lottie-animation-3"></div>
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

          $sql = "SELECT dp.doctor_id, dp.fname, dp.lname, dp.email, dp.description, dr.cv, dr.dor, dr.status, dr.tick 
FROM doctor_profile dp
JOIN doctor_register as dr ON dp.doctor_id = dr.id
WHERE dr.remove=0 ORDER BY dp.doctor_id DESC";
          $result = mysqli_query($conn, $sql);
          while ($rows = mysqli_fetch_array($result)) {
              $name = $rows['fname'];
              $cogname = $rows['lname'];
              $email = $rows['email'];
              $cv = "/professionisti/" . $rows['cv'];
              $dor = strtotime($rows['dor']);
              $status = $rows['status'];
              $tick = $rows['tick'];
              ?>

              <?php
              $sql2 = "select * from doctor_profile where email = '" . $email . "'";
              $result2 = mysqli_query($conn, $sql2);
              $rows2 = mysqli_fetch_array($result2);
              $doct_id = $rows2['doctor_id'];
              $doct_title = trim($rows2['title']);
              $doct_photo = $rows2['photo'];
              $user_active = $rows2['active'];
              $admin_active = $rows2['visible'];
              $puo_refertare = $rows2['puo_refertare'];

              if (isset($doct_id)) {
                  $link = "/il-team/professionista.php?" . $doct_id;
              } else {
                  $link = "/il-team/professionista.php?0";
              }
              if (isset($doct_photo)) {
                  $photo_link = "/professionisti/" . $doct_photo;
              } else {
                  $photo_link = "../images/Group-563.jpg";
              }

              /* $prof_type_array = array('','Esecutore','Refertatore');*/
              ?>
            <div class="regi_doctor_card regi_doctor_card<?php echo $doct_id ?>" data-title="<?php echo $doct_title ?>">
              <div class="regi_doctor_image"><img src="<?PHP echo $photo_link ?>" alt="" class="image-24"></div>
              <div class="div-block-65">
                <div id="w-node-cf99e8f702f8-80dd982b" class="regi_name_block">
                  <div class="text-block-68"><?PHP echo ucwords($name) . " " . ucwords($cogname); ?></div>
                    <?PHP if ($tick) { ?>
                      <div class="approved_tick"><img src="../images/Path-210.svg" width="13" alt="" class="image-26">
                      </div>
                    <?php } ?>

                    <?PHP
                    if ($user_active == 'Y') {
                        ?>
                  <a class="active_anchor" href="doc_active.php?a=N&email=<?php echo urlencode($email);?>"> <div class="active">Attivo</div></a>
                    <?php } else {
                        ?>
                  <a class="active_anchor" href="doc_active.php?a=Y&email=<?php echo urlencode($email);?>"><div class="active inactive">Non Attivo</div></a>
                    <?php } ?>


                </div>
                <div class="div-block-66">
                  <div class="regi_data">Email</div>
                  <div class="regi_value"><?PHP echo $email; ?></div>
                </div>
                <div class="div-block-67">
                  <div class="regi_data">Data Registrazione</div>
                  <div class="regi_value"><?php echo date("d F Y", $dor); ?></div>
                </div>
              </div>
              <div id="w-node-cf99e8f70307-80dd982b" class="regi_button_container">
                <div id="w-node-cf99e8f70308-80dd982b"><a href="<?PHP echo $cv; ?>" download class="button-10 w-button">Scarica
                    CV</a></div>
                <div class="div-block-75">
                    <?PHP if ($status == 0) { ?>
                      <a href="#" class="button-10 reject w-button">Rifiuta</a>
                    <?php } else { ?>
                      <a data-w-id="293fdba6-5dda-9f43-9d25-cf99e8f7030e" href="#" class="button-10 remove w-button">Rimuovi<br></a>
                        <?php
                        if ($admin_active == 'Y') {
                            ?>
                          <br>
                          <a href="doc_visible.php?a=N&email=<?php echo urlencode($email); ?>" class="button-10 w-button"
                             style="background-color: #00800052;">Visibile</a>
                        <?php } else {
                            ?>

                          <a href="doc_visible.php?a=Y&email=<?php echo urlencode($email); ?>" class="button-10 w-button"
                             style="margin-top: 18px;background-color: #ff0000b5;">Non Visibile</a>
                        <?php }
                    } ?>

                  <div class="reject_confirm">
                    <div data-w-id="293fdba6-5dda-9f43-9d25-cf99e8f70312" class="closer diff"></div>
                    <div class="reject_container">
                      <div class="text-block-66">Sei sicuro di voler rifiutare questa candidatura?</div>
                      <div class="div-block-63">
                        <a data-w-id="293fdba6-5dda-9f43-9d25-cf99e8f70317" href="#" class="button-5 no w-button">Cancella</a>
                        <a href="index2.php?s=0&id=<?php echo urlencode($doct_id); ?>" class="button-5 yes w-button">Conferma</a>
                      </div>
                    </div>
                  </div>
                  <div style="opacity:0;display:none" class="remove_confirm">
                    <div
                        style="-webkit-transform:translate3d(0, 10%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, 10%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, 10%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, 10%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);opacity:0"
                        class="reject_container removecontainer">
                      <div class="text-block-66">Sei sicuro di voler rimuovere questa candidatura?</div>
                      <div class="div-block-63">
                        <a data-w-id="293fdba6-5dda-9f43-9d25-cf99e8f70320" href="#" class="button-5 no w-button">Cancella</a>
                        <a href="remove.php?id=<?php echo urldecode($doct_id); ?>" class="button-5 yes w-button">Conferma</a>
                      </div>
                    </div>
                    <div data-w-id="293fdba6-5dda-9f43-9d25-cf99e8f70324" class="closer"></div>
                  </div>
                </div>
                <div class="div-block-74">
                    <?PHP if ($status == 0) { ?>
                      <a href="#" class="button-10 approve w-button">Approva</a>
                    <?php } else { ?>
                      <a href="<?php echo $link ?>" target="_blank" class="button-10 open_profile w-button">Vedi
                        Profilo</a>

                      <br>
                      <a href="#" class="button-10 approve w-button modi_btn"
                         style="background-color: #ccc;">Modifica</a>
                    <?php } ?>
                  <div class="approve_confirm">
                    <div data-w-id="293fdba6-5dda-9f43-9d25-cf99e8f7032b" class="closer"></div>
                    <div class="approve_confirm_container pop-width">
                      <div class="text-block-66 diff">Sei sicuro di voler approvare?</div>
                      <div class="text-block-100">Una volta approvata la candidatura, un link per la registrazione verrà
                        inviato
                        alla casella mail del Professionista, il quale, effettuata la registrazione, potrà unirsi al
                        team.<br>
                      </div>

                      <div class="w-form" data-id="1">
                        <form action="index2.php" method="post" enctype="multipart/form-data">
                          <input type="hidden" name="doctor-id" value="<?php echo urlencode($doct_id); ?>">
                          <input type="hidden" name="status" value="1">
                            <?php if (empty($doct_title)) { ?>
                              <div class="input_fields">

                                <div class="visit_selector_grid">
                                  <select id="medical_speciality" class="list-style-new" name="medical_speciality"
                                          doctor-id="<?php echo $doct_id ?>">
                                    <option value="">Seleziona Specialità medica</option>
                                      <?php
                                      $get_speciality_sql = "select * from medical_specialty where status='Y'";
                                      $get_speciality_result = mysqli_query($conn, $get_speciality_sql);

                                      while ($speciality_result_row = mysqli_fetch_array($get_speciality_result)) {
                                          $speciality_name = $speciality_result_row['name'];
                                          ?>
                                        <option value="<?= $speciality_name ?>"
                                                data-mds="<?= $speciality_result_row['ERid'] ?>"><?= $speciality_name ?></option>
                                          <?php
                                      }
                                      ?>
                                  </select>
                                  <div class="glance_details_title" style="font-size: 14px;padding-top: 12px;">
                                    <input type="checkbox" class="lable2" id="puo_refertare_pop"
                                           name="puo_refertare_pop">
                                    <label for="puo_refertare_pop">Puo Refertare </label>

                                    <input type="checkbox" class="lable2" id="prof_active"
                                           name="prof_active" style="margin-left: 20px;">
                                    <label for="prof_active">Attivo</label>
                                  </div>
                                </div>

                              </div>
                                <?php
                            }
                            ?>
                          <div class="form_section">
                            <div class="visit_selector_grid grid-c">
                              <div class="slectors">
                                <div class="visits_selector_container">
                                  <!--start-->
                                    <?php
                                    //include '../connect.php';
                                    $sql3 = "SELECT ERid, name from medical_specialty WHERE status='Y' order by name asc";
                                    $result13 = mysqli_query($conn, $sql3);
                                    while ($rows13 = mysqli_fetch_array($result13)) {
                                        $erid = $rows13['ERid'];
                                        $spaciality_name = $rows13['name'];

                                        $div_style = 'display: none';
                                        if (!empty($doct_title) && $doct_title == trim($spaciality_name)) {
                                            $div_style = 'display: block';
                                        }
                                        ?>
                                      <div class="visit mds-<?php echo $erid ?>" style="<?php echo $div_style ?>">
                                        <input type="hidden" class="doc_spaciality" name="doc_spaciality" value="">
                                        <div class="visit_heading">
                                          <div class="text-block-42"><?php echo $spaciality_name; ?></div>
                                        </div>
                                        <div class="visit_subitem_container_new width-1" style="width: 100%">
                                            <?php
                                            $sql23 = "
SELECT DISTINCT am.id As article_id, descrizione, am.attributo
FROM articlesMobidoc am
JOIN articlesMobidoc_specialty as ams ON am.id = ams.id
JOIN medical_specialty as ms ON '" . $erid . "'=ams.specialtyMobidoc
WHERE ms.status='Y' AND (am.home = 'Y' OR am.tele = 'Y') group by am.id";
                                            $result23 = mysqli_query($conn, $sql23);

                                            while ($rows2 = mysqli_fetch_array($result23)) {
                                                $visit_type_name = trim($rows2['descrizione']);
                                                $article_id = trim($rows2['article_id']);

                                                $attribute = '';
                                                if ($rows2['attributo']){
                                                    $attribute = '('.$rows2['attributo'].')';
                                                }
                                                ?>
                                              <div class="visit_subitem visit_show<?php echo $doct_id ?>"
                                                   doctor-id="<?php echo $doct_id ?>"
                                                   data-item="<?php echo $visit_type_name.$attribute ?>"
                                                   data-id="<?php echo $article_id ?>">
                                                <div class="text-block-43">
                                                    <?php echo $visit_type_name;
                                                    if (!empty($attribute)){
                                                        echo ' <span style="font-size: 13px;font-weight: bold">'.$attribute.'</span>';
                                                    }
                                                    ?>
                                                </div>
                                                <img src="../images/Path-175.svg" alt="" class="image-12">
                                              </div>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                      </div>
                                    <?php } //mysqli_close($conn);
                                    ?>
                                  <!--end-->
                                </div>
                              </div>
                              <div class="selecteds doc_visit<?php echo $doct_id ?>" id="visits">
                                <!--start-->
                                  <?php
                                  // include '../connect.php';

                                  if (!empty($doct_title)) {
                                      $sql150 = "SELECT DISTINCT am.id AS article_id, descrizione, ls.visit_home_price, ls.visit_tele_price, am.attributo
FROM listini ls
JOIN articlesMobidoc as am ON ls.article_mobidoc_id = am.id
JOIN articlesMobidoc_specialty as ams ON am.id = ams.id
JOIN medical_specialty as ms ON ms.ERid=ams.specialtyMobidoc
WHERE ms.status='Y' AND ls.doctor_id='" . $doct_id . "' AND (am.home = 'Y' OR am.tele = 'Y')";

                                      $result150 = mysqli_query($conn, $sql150);
                                      $j = 1;
                                      while ($rows150 = mysqli_fetch_array($result150)) {
                                          $visit_name1 = $rows150['descrizione'];
                                          $article_id1 = $rows150['article_id'];
                                          $price = $rows150['visit_home_price'];
                                          $tele_price = $rows150['visit_tele_price'];
                                          $service_name = "service_name_pre" . $j;
                                          $price_name = "service_price_pre" . $j;
                                          $price_tele_name = "service_price_pre_tele" . $j;

                                          $attribute1 = '';
                                          if ($rows150['attributo']){
                                              $attribute1 = '('.$rows150['attributo'].')';
                                          }
                                          ?>

                                        <div class="visit_subitem selected">
                                          <div style=' width:65%;'>
                                            <input type='checkbox' style='display:none;' checked class='text-block-44'
                                                   value='<?php echo $article_id1; ?>'
                                                   name='<?php echo $service_name; ?>'>
                                              <?php echo $visit_name1;
                                              if (!empty($attribute1)){
                                                  echo ' <span style="font-size: 13px;font-weight: bold">'.$attribute1.'</span>';
                                              }
                                              ?>
                                          </div>
                                          <div class="price_n_remove">
                                            <div class="price_input">
                                              <div>€</div>
                                              <input type="number" class="input_num w-input" maxlength="10"
                                                     name="<?php echo $price_name; ?>" min="1" data-name="Field"
                                                     value="<?php echo $price; ?>" id="field" required=""/>
                                            </div>
                                            <div class="price_input" style="margin-left: 5px">
                                              <div>€</div>
                                              <input type="number" class="input_num w-input" maxlength="10" min="0"
                                                     name="<?php echo $price_tele_name; ?>" data-name="Field"
                                                     value="<?php echo $tele_price; ?>" id="field"/>
                                            </div>
                                            <img src="../images/minus_1.svg" class="image-14"
                                                 onclick="service_remove(this)">
                                          </div>
                                        </div>
                                          <?php
                                          $j++;
                                      }
                                  } ?>
                              </div>
                            </div>
                          </div>
                          <div class="div-block-63" style="text-align: center;">
                            <a data-w-id="293fdba6-5dda-9f43-9d25-cf99e8f70333" href="#" class="button-5 no w-button">Cancella</a>
                            <button type="submit" name="update-status" class="button-5 yes w-button update-status">Continua
                            </button>
                          </div>
                        </form>
                      </div>
                    </div>

                  </div>

                </div>
                  <?PHP if ($status == 1) { ?>
                      <?php if (isset($doct_id)) {
                          ?>
                      <div class="div-block-74">
                          <?php
                          if ($puo_refertare == 'Y') {
                              $is_check = 'checked';
                          } else {
                              $is_check = '';
                          }
                          ?>
                        <div class="glance_details_title" style="font-size: 14px;margin-left: 15px;">
                          <input type="checkbox" <?php echo $is_check ?> class="puo_refertare lable2" id="puo_refertare"
                                 name="puo_refertare" data-id="<?php echo $doct_id ?>"
                                 value="<?php echo $puo_refertare ?>">
                          <label for="puo_refertare">Puo Refertare </label>
                          <p class="gen_errr" style="display: none">Database Error</p>
                        </div>
                        <br>
                      </div>
                      <?php }
                  } ?>


              </div>
            </div>
          <?php }
          mysqli_close($conn); ?>

      </div>
      <div class="end-of-the-list">
        <div class="line"></div>
        <div id="w-node-0e7522d67d94-80dd982b" class="text-block-70">Non ci sono più profili da visualizzare.</div>
        <div class="line"></div>
      </div>
    </div>
  </div>
  <div class="menu_current w-embed w-script">
    <script type="text/javascript">

        $(document).ready(function () {
            $('.update-status').click(function () {
                var get_parent_div = $(this).parent().parent();
                var get_option_val = $("#medical_speciality", get_parent_div).val();
                var get_parent_div1 = $(this).parent().parent().parent().parent().parent().parent().parent().parent().attr('data-title');
                if (get_option_val || get_parent_div1) {
                    return true;
                } else {
                    alert("Seleziona Specialità medica");
                    return false;
                }

            });

        });
    </script>
    <script>
        $(document).ready(function () {
            $('.admin_item:nth-child(1)').addClass('current');
        });

        $('.puo_refertare').click(function () {
            var puo_refertare = $(this).val();
            var doctor_id = $(this).attr("data-id");
            if (puo_refertare == 'Y') {
                var puo_refertare = 'N';
                $(this).val(puo_refertare);
            } else {
                var puo_refertare = 'Y';
                $(this).val(puo_refertare);
            }
            $.ajax({
                url: "change_p_type.php",
                type: "post",
                data: {doctor_id: doctor_id, puo_refertare: puo_refertare},
                success: function (response) {
                    // console.log(response);
                    if (response == 'true') {
                        $(".regi_doctor_card" + doctor_id + " .gen_errr").attr("style", "display:none");
                    } else {
                        $(".regi_doctor_card" + doctor_id + " .gen_errr").attr("style", "display:block;color:red");
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });

        });

    </script>
  </div>
</div>
<style>
    .slectors, .selecteds {
        height: 350px;
    }
</style>
<script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.4.1.min.220afd743d.js" type="text/javascript"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="../js/admin/webflow.js" type="text/javascript"></script>
<!-- [if lte IE 9]>
<script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
<script type="text/javascript">

    $('#medical_speciality').on('change', function () {
        var doc_idd = $(this).attr("doctor-id");
        var get_erd_code = $('option:selected', this).attr('data-mds');
        $(".visits_selector_container .visit").css("display", "none");
        $(".visits_selector_container .visit.mds-" + get_erd_code).css("display", "block");
        $(".doc_spaciality").val(get_erd_code);
        $(".selecteds.doc_visit" + doc_idd + " .visit_subitem.selected").remove();
        $('.visit_subitem_container_new > .visit_subitem.visit_show' + doc_idd).show();
    });
    $(document).ready(function () {
        selected_visit_counter = 0;
        $(".visits_selector_container .visit:last-child").addClass("last");
        $('.visit_subitem_container_new > .visit_subitem').click(function () {

            $('.error_message.visit').removeClass("error_show");
            selected_visit_counter += 1;
            // var se_name = $(this).children('.text-block-43').text();

            var current_visit_type = $(this).attr("data-item");
            var current_article_id = $(this).attr("data-id");
            // console.log(se_name);

            // console.log(visit_type_array[0]);
            var doctor_idd = $(this).attr("doctor-id");
            var service_add = "<div class='visit_subitem selected'><div style=' width:65%;'><input type='checkbox' style='display:none;' checked class='text-block-44' value='" + current_article_id + "' name='service_name" + selected_visit_counter + "'>" + current_visit_type + "</div><div class='price_n_remove'><div class='price_input'><div>€</div><input type='number' placeholder='Dom' class='input_num w-input' maxlength='256' name='service_price" + selected_visit_counter + "'  min='1' data-name='Field' id='field' required=''></div><div class='price_input' style='margin-left: 2px;'><div>€</div><input placeholder='Tele' min='0' type='number' class='input_num w-input' maxlength='256' name='service_price_tel" + selected_visit_counter + "' data-name='Field' id='field'></div><img src='../images/minus_1.svg' class='image-14' onClick='service_remove(this)'></div></div>";
            $(".selecteds.doc_visit" + doctor_idd).append(service_add);
            $(this).hide();

            var visit_attr_appender;
            $(".text-block-44").each(function (index) {
                var visit_attr = $(this).attr("name");
                var price_attr = $(this).siblings(".price_n_remove").children('.price_input').children('input').attr("name");
                visit_attr_appender = visit_attr + "," + price_attr + "|";
            });
            var visit_selector = $('.visit_name_attr');
            visit_selector.val(visit_selector.val() + visit_attr_appender);

        });
    });

    function service_remove(e) {
        $(e).parent().parent().remove();
        var this_name = ($(e).parent().siblings('.text-block-44').val()).trim();
        var slector = ".text-block-43:contains(" + this_name + ")";
        $(slector).parent().show();
        var service_name_attr = $(e).parent().siblings("input").attr("name");
        var service_price_attr = $(e).siblings(".price_input").children('input').attr("name");

        var get_visit_attr_text = $('.visit_name_attr').val();
        var service_attribute_remover = service_name_attr + "," + service_price_attr + "|";

        get_visit_attr_text = get_visit_attr_text.replace(service_attribute_remover, '');
        $('.visit_name_attr').val(get_visit_attr_text);
    }
</script>

<div id="fb-root"></div>
<script async="" defer="" crossorigin="anonymous"
        src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v4.0"></script>
</body>
</html>