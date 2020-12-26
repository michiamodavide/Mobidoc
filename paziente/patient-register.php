<?php
include '../connect.php';
?>
<!DOCTYPE html>
<html data-wf-page="5daa262de3e3f064091af31c" data-wf-site="5d8cfd454ebd737ac1a48727">
<head>
  <meta charset="utf-8">
  <title>Patient Register</title>
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
  <link href="../dist/css/selectize.default.css?v=1" rel="stylesheet"/>
  <script src="../dist/js/standalone/selectize.min.js"></script>
  <script src="date_pic.js?v=1"></script>
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
</head>
<body>
<?php include '../header.php';?>
<div class="masthead upform">
  <div class="masthead_container up_form" style="margin-bottom:0px;">
    <h1 class="heading-10">Compila il modulo</h1>
  </div>
</div>
<section class="section-19">
  <div class="custom_container update_form">
    <div class="update_form_main_container">
      <div class="update_form_block w-form">
        <form id="email-form" name="email-form" class="update_form" action="patient_reg.php" method="post" enctype="multipart/form-data">
          <div>
            <div class="form_section">
              <div class="form_section_heading">Informazioni Contatto</div>
             <?php
             if (isset($_GET['err']) && ($_GET['err'] == '1')){
             ?>
             <div class="error">
              <div>Email già registrata.</div>
             </div>
             <?php }?>
              <div class="dual_container diff">
                <input type="text" class="inputs w-input" maxlength="256" name="call_first_name" data-name="first_name" placeholder="Nome *" id="first_name" required>
                <input type="text" class="inputs w-input" maxlength="256" name="call_last_name" data-name="last_name" placeholder="Cognome *" id="last_name" required>
              </div>
              <div class="dual_container diff">
                <input type="email" class="inputs w-input" maxlength="256" name="email" data-name="email" placeholder="Email *" id="email" required>
                <input type="tel" class="inputs w-input" maxlength="256" name="tele" data-name="tele" placeholder="Contatto *" id="tele" required="">
              </div>

            </div>
            <div class="form_section">
              <div class="form_section_heading">Informazioni Paziente</div>
              <div class="dual_container diff">
                <input type="text" class="inputs w-input" maxlength="256" name="first_name" data-name="first_name" placeholder="Nome *" id="first_name" required>
                <input type="text" class="inputs w-input" maxlength="256" name="last_name" data-name="last_name" placeholder="Cognome *" id="last_name" required>
              </div>
             <input style="margin-bottom: 15px" type="text" class="inputs w-input" maxlength="256" name="address" data-name="fiscal_code" placeholder="Indirizzo Completo *" id="address" required="">
             <input type="text" class="inputs w-input" maxlength="256" name="fiscal_code" data-name="fiscal_code" placeholder="Codice Fiscale *" id="fiscal_code" required="">
             <textarea placeholder="Note *" maxlength="10000" id="personal_description"
                       name="admin_note" data-name="personal_description"
                       class="text_area_profile personal_description w-input" required></textarea>
            </div>

           <div class="form_section">
            <div class="form_section_heading">Prenotazione Prestazione</div>
            <div class="duo_flex">
             <div class="choose_your_area select1">
              <div class="search_cap_input sci2">
               <div class="input_element" style="background:#d3fbff;">
                <img src="../images/search.svg" width="28"  alt="">

                <select id="select-visit" placeholder="Seleziona Prestazione *" name="vist_name" required onchange="getVisitDoc()">
                 <option value="">Seleziona Prestazione</option>
                  <?php
                  include '../connect.php';
                  $visit_sql = "select * from doctor_visit order by visit_name";
                  $visit_result = mysqli_query($conn, $visit_sql);
                  while($visit_rows = mysqli_fetch_array($visit_result)){
                    $visit_types = $visit_rows['visit_name'];
                    ?>
                   <option value="<?PHP echo $visit_types;?>"><?PHP echo $visit_types;?></option>
                  <?php } mysqli_close($conn);?>
                </select>
                <script>
                  $('#select-visit').selectize();
                </script>
               </div>
              </div>
             </div>
             <div class="choose_your_area select2" style="margin: 10px;">
              <div class="search_cap_input sci2">
               <div class="input_element" style="background:#d3fbff;">
                <img src="../images/search.svg" width="28"  alt="">
                <select id="select-doctor" placeholder="Seleziona Professionista *" multiple name="doc_id[]" required >
                 <option value="">Seleziona Professionista</option>
                </select>
                <script>
                  // var doc_select = $('#select-doctor').selectize();
                  var $select = $('#select-doctor').selectize();

                  // fetch the instance
                  var doc_select = $select[0].selectize;
                </script>
               </div>
              </div>
             </div>
            </div>
            <div class="duo_flex">
             <div class="choose_your_area select3">
              <div class="search_cap_input sci2">
               <div class="input_element" style="background:#d3fbff;">
                <img src="../images/search.svg" width="28"  alt="">

                <select id="select-excutor" placeholder="Seleziona Tecnico" name="execut_id">
                 <option value="">Seleziona Tecnico</option>
                </select>
                <script>
                  var $select_ex = $('#select-excutor').selectize();

                  var exc_select = $select_ex[0].selectize;
                </script>
               </div>
              </div>
             </div>
            </div>
           </div>

           <div class="form_section">
            <div class="form_section_heading">Data e Ora</div>
            <div class="dual_container diff">
             <input type="text" class="datepicker-here inputs w-input"  data-language="it" data-date-format="dd-mm-yyyy" maxlength="256" autocomplete="off" name="appoint_time" placeholder="Data e Ora *" id="appoint_time" required="">
            </div>
           </div>
           <div class="form_section">
            <div class="form_section_heading">Metodo di Pagamento</div>
            <div class="duo_flex">
             <div class="choose_your_area">
              <div class="search_cap_input sci2">
               <div class="input_element" style="background:#d3fbff;">
                <img src="../images/search.svg" width="28"  alt="">

                <select id="cash-option" placeholder="Metodo di Pagamento" name="payment_mode">
                 <option value="Cash">Cash</option>
                 <option value="Bancomat">Bancomat</option>
                 <option value="Bonifico Bancario">Bonifico Bancario</option>
                </select>
                <script>
                  $('#cash-option').selectize();
                </script>
               </div>
              </div>
             </div>
            </div>
           </div>

            <input type="text" name="privacy_check" id="privacy_check" value="0" style="display:none;">
            <script>
              jQuery(document).ready(function() {
                jQuery('#checkbox').change(function() {
                  if ($(this).prop('checked')) {
                    $('#privacy_check').val('1');
                  }
                  else {
                    $('#privacy_check').val('0');
                  }
                });
              });
            </script>
            <div class="form_section">
              <div class="form_section_heading">Consenso privacy</div>
              <label class="w-checkbox checkbox-field-2">
                <div class="w-checkbox-input w-checkbox-input--inputType-custom checkbox"></div>
                <input type="checkbox" id="checkbox" name="checkbox" data-name="Checkbox" style="opacity:0;position:absolute;z-index:-1" required>
                <span class="checkbox-label-2 w-form-label">Esprimo il consenso in merito al trattamento e alla comunicazione a terzi dei miei dati personali per finalità di marketing</span>
              </label>
            </div>
          </div>

          <div class="div-block-34">
            <div class="div-block-35">
            </div>
          </div>
          <div>
            <input type="submit" name="submit" style="color:#fff !important;" value="Invia" id="submit" class="button gradient submit w-button">
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
    height:auto !important;
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

 .choose_your_area.select2, .choose_your_area.select3{
  pointer-events: none;
  opacity: 0.6;
 }
</style>
<script>
  $(document).ready(function(){
    // fiscale validation


    function validateTaxCode(value) {

      var TAX_CODE_LENGTH = 16;
      var REGEXP_STRING_FOR_LASTNAME = "[A-Za-z]{3}";
      var REGEXP_STRING_FOR_FIRSTNAME = "[A-Za-z]{3}";
      var REGEXP_STRING_FOR_BIRTHDATE_YEAR = "[0-9LlMmNnPpQqRrSsTtUuVv]{2}";
      var REGEXP_STRING_FOR_BIRTHDATE_MONTH = "[AaBbCcDdEeHhLlMmPpRrSsTt]{1}";
      var REGEXP_STRING_FOR_BIRTHDATE_DAY_GENDER_PART_1 = "[0-7LlMmNnPpQqRrSsTtUuVv]{1}";
      var REGEXP_STRING_FOR_BIRTHDATE_DAY_GENDER_PART_2 = "[0-9LlMmNnPpQqRrSsTtUuVv]{1}";
      var REGEXP_STRING_FOR_BIRTHTOWN_PART_1 = "[A-Za-z]{1}";
      var REGEXP_STRING_FOR_BIRTHTOWN_PART_2 = "[0-9LlMmNnPpQqRrSsTtUuVv]{3}";
      var REGEXP_STRING_FOR_CIN = "[A-Za-z]{1}";
      var REGEXP = new RegExp("^" + REGEXP_STRING_FOR_LASTNAME + REGEXP_STRING_FOR_FIRSTNAME + REGEXP_STRING_FOR_BIRTHDATE_YEAR + REGEXP_STRING_FOR_BIRTHDATE_MONTH + REGEXP_STRING_FOR_BIRTHDATE_DAY_GENDER_PART_1 + REGEXP_STRING_FOR_BIRTHDATE_DAY_GENDER_PART_2 + REGEXP_STRING_FOR_BIRTHTOWN_PART_1 + REGEXP_STRING_FOR_BIRTHTOWN_PART_2 + REGEXP_STRING_FOR_CIN + "$");
      var ODD_CHARS_MAP = new Map();
      var EVEN_CHARS_MAP = new Map();
      var MODS_MAP = new Map();

      var validCode = false;

      ODD_CHARS_MAP.set("0", 1);
      ODD_CHARS_MAP.set("1", 0);
      ODD_CHARS_MAP.set("2", 5);
      ODD_CHARS_MAP.set("3", 7);
      ODD_CHARS_MAP.set("4", 9);
      ODD_CHARS_MAP.set("5", 13);
      ODD_CHARS_MAP.set("6", 15);
      ODD_CHARS_MAP.set("7", 17);
      ODD_CHARS_MAP.set("8", 19);
      ODD_CHARS_MAP.set("9", 21);
      ODD_CHARS_MAP.set("A", 1);
      ODD_CHARS_MAP.set("B", 0);
      ODD_CHARS_MAP.set("C", 5);
      ODD_CHARS_MAP.set("D", 7);
      ODD_CHARS_MAP.set("E", 9);
      ODD_CHARS_MAP.set("F", 13);
      ODD_CHARS_MAP.set("G", 15);
      ODD_CHARS_MAP.set("H", 17);
      ODD_CHARS_MAP.set("I", 19);
      ODD_CHARS_MAP.set("J", 21);
      ODD_CHARS_MAP.set("K", 2);
      ODD_CHARS_MAP.set("L", 4);
      ODD_CHARS_MAP.set("M", 18);
      ODD_CHARS_MAP.set("N", 20);
      ODD_CHARS_MAP.set("O", 11);
      ODD_CHARS_MAP.set("P", 3);
      ODD_CHARS_MAP.set("Q", 6);
      ODD_CHARS_MAP.set("R", 8);
      ODD_CHARS_MAP.set("S", 12);
      ODD_CHARS_MAP.set("T", 14);
      ODD_CHARS_MAP.set("U", 16);
      ODD_CHARS_MAP.set("V", 10);
      ODD_CHARS_MAP.set("W", 22);
      ODD_CHARS_MAP.set("X", 25);
      ODD_CHARS_MAP.set("Y", 24);
      ODD_CHARS_MAP.set("Z", 23);

      EVEN_CHARS_MAP.set("0", 0);
      EVEN_CHARS_MAP.set("1", 1);
      EVEN_CHARS_MAP.set("2", 2);
      EVEN_CHARS_MAP.set("3", 3);
      EVEN_CHARS_MAP.set("4", 4);
      EVEN_CHARS_MAP.set("5", 5);
      EVEN_CHARS_MAP.set("6", 6);
      EVEN_CHARS_MAP.set("7", 7);
      EVEN_CHARS_MAP.set("8", 8);
      EVEN_CHARS_MAP.set("9", 9);
      EVEN_CHARS_MAP.set("A", 0);
      EVEN_CHARS_MAP.set("B", 1);
      EVEN_CHARS_MAP.set("C", 2);
      EVEN_CHARS_MAP.set("D", 3);
      EVEN_CHARS_MAP.set("E", 4);
      EVEN_CHARS_MAP.set("F", 5);
      EVEN_CHARS_MAP.set("G", 6);
      EVEN_CHARS_MAP.set("H", 7);
      EVEN_CHARS_MAP.set("I", 8);
      EVEN_CHARS_MAP.set("J", 9);
      EVEN_CHARS_MAP.set("K", 10);
      EVEN_CHARS_MAP.set("L", 11);
      EVEN_CHARS_MAP.set("M", 12);
      EVEN_CHARS_MAP.set("N", 13);
      EVEN_CHARS_MAP.set("O", 14);
      EVEN_CHARS_MAP.set("P", 15);
      EVEN_CHARS_MAP.set("Q", 16);
      EVEN_CHARS_MAP.set("R", 17);
      EVEN_CHARS_MAP.set("S", 18);
      EVEN_CHARS_MAP.set("T", 19);
      EVEN_CHARS_MAP.set("U", 20);
      EVEN_CHARS_MAP.set("V", 21);
      EVEN_CHARS_MAP.set("W", 22);
      EVEN_CHARS_MAP.set("X", 23);
      EVEN_CHARS_MAP.set("Y", 24);
      EVEN_CHARS_MAP.set("Z", 25);

      MODS_MAP.set(0, "A");
      MODS_MAP.set(1, "B");
      MODS_MAP.set(2, "C");
      MODS_MAP.set(3, "D");
      MODS_MAP.set(4, "E");
      MODS_MAP.set(5, "F");
      MODS_MAP.set(6, "G");
      MODS_MAP.set(7, "H");
      MODS_MAP.set(8, "I");
      MODS_MAP.set(9, "J");
      MODS_MAP.set(10, "K");
      MODS_MAP.set(11, "L");
      MODS_MAP.set(12, "M");
      MODS_MAP.set(13, "N");
      MODS_MAP.set(14, "O");
      MODS_MAP.set(15, "P");
      MODS_MAP.set(16, "Q");
      MODS_MAP.set(17, "R");
      MODS_MAP.set(18, "S");
      MODS_MAP.set(19, "T");
      MODS_MAP.set(20, "U");
      MODS_MAP.set(21, "V");
      MODS_MAP.set(22, "W");
      MODS_MAP.set(23, "X");
      MODS_MAP.set(24, "Y");
      MODS_MAP.set(25, "Z");

      if(value && value.length == 16 && REGEXP.test(value)) {

        var charsSum = 0;

        for(var position = 0; position < TAX_CODE_LENGTH - 1; ++position) {
          if(((position + 1) % 2) > 0) {
            charsSum += ODD_CHARS_MAP.get(value.charAt(position).toUpperCase());
          }
          else {
            charsSum += EVEN_CHARS_MAP.get(value.charAt(position).toUpperCase());
          }
        }

        validCode = (MODS_MAP.get(charsSum % 26)) == value.slice(-1).toUpperCase();
      }

      return validCode;
    };



    $('#submit').click(function(){
      var fiscale_value = $('#fiscal_code').val();
      if(validateTaxCode(fiscale_value) == true){
        return true;
      } else {
        alert('Il codice fiscale non è valido!');
        return false;
      }
    });
  });

  function getVisitDoc() {
    var visit_type_single = $("#select-visit option").val();
    doc_select.clearOptions();
    $.ajax({
      url: "get_visit_doc.php",
      type: "post",
      data: {data:visit_type_single},
      dataType: "json",
      success: function (response) {

        $.each(response, function(index) {
          var p_type = response[index].p_type;
          if (p_type == 1 || p_type == 3){
            $(".choose_your_area.select2").attr("style", "pointer-events: inherit; opacity: inherit; margin: 10px;");
            doc_select.addOption({value: response[index].doctor_id, text: response[index].fname});
          }else if (p_type == 2) {
            $(".choose_your_area.select3").attr("style", "pointer-events: inherit; opacity: inherit;");
            exc_select.addOption({value: response[index].doctor_id, text: response[index].fname});
          }
        });
        doc_select.refreshOptions();
        exc_select.refreshOptions();
      },
      error: function(jqXHR, textStatus, errorThrown) {
        console.log(textStatus, errorThrown);
      }
    });
  }
</script>
<?php include ("../google_analytic.php")?>
</body>
</html>
