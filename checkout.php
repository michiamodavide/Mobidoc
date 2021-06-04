<?php session_start();
include 'connect.php';

$pat_id = '';
if (isset($_SESSION['pat_id']) && !empty($_SESSION['pat_id'])) {
    $pat_id = $_SESSION['pat_id'];
}
$booking_name = $_GET['book_visit'];
$doctor_id = $_GET['book_doctor'];
$article_id = $_GET['article_id'];


if (isset($booking_name, $doctor_id)) {
    if (!isset($_SESSION['book_visits'])){
        $_SESSION['book_visits'] = array();
    }
    if (isset($_GET['up_arr']) && $_GET['up_arr'] == 1){
        $book_visit_details = $_SESSION['book_visits'];
        foreach($book_visit_details as $key => $cookie_book_visit) {
            if ($cookie_book_visit['article_id'] == $article_id){
                $book_visit_details[$key]['book_doctor'] = $doctor_id;
            }

        }

        $book_visit_details = array_values($book_visit_details);
        $_SESSION['book_visits'] = $book_visit_details;
    }else{
        array_push($_SESSION['book_visits'], array(
            "Booking_name" => $booking_name,
            "book_doctor" => $doctor_id,
            "article_id" => $article_id,
            "book_patient_id" => $pat_id
        ));
    }

} else {
    header('Location: /');
}

if (!isset($booking_name) || empty($booking_name)) {
    header('Location: /');
}
if (!isset($article_id) || empty($article_id)) {
    header('Location: /');
}

if (!isset($_SESSION['paziente_email'])) {
    header('Location: /paziente/login.php');
}
$sql132 = "select * from paziente_profile where paziente_id ='" . $pat_id . "'";
$result132 = mysqli_query($conn, $sql132);
$rows132 = mysqli_fetch_array($result132);
if (!$rows132) {
    header('Location: /paziente/account.php');
}

$month = date('m');
$day = date('d');
$year = date('Y');

$today = $year . '-' . $month . '-' . $day;
?>
<!DOCTYPE html>
<!--  This site was created in Webflow. http://www.webflow.com  -->
<!--  Last Published: Fri Nov 22 2019 13:46:15 GMT+0000 (Coordinated Universal Time)  -->
<html data-wf-page="5dd4433aefd97c23de2666cf" data-wf-site="5d8cfd454ebd737ac1a48727">
<head>
    <meta charset="utf-8">
    <title>Checkout</title>
    <meta content="Checkout" property="og:title">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta content="Webflow" name="generator">
    <link href="css/normalize.css" rel="stylesheet" type="text/css">
    <link href="css/webflow.css" rel="stylesheet" type="text/css">
    <link href="css/mobidoc.webflow.css?v=2" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script>
    <script type="text/javascript">WebFont.load({google: {families: ["Montserrat:100,100italic,200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic", "Poppins:100,100italic,200,300,300italic,regular,500,600,700,800,900", "PT Serif Caption:regular"]}});</script>
    <!-- [if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"
            type="text/javascript"></script><![endif] -->
    <script type="text/javascript">!function (o, c) {
            var n = c.documentElement, t = " w-mod-";
            n.className += t + "js", ("ontouchstart" in o || o.DocumentTouch && c instanceof DocumentTouch) && (n.className += t + "touch")
        }(window, document);</script>
    <link href="images/favicon.png" rel="shortcut icon" type="image/x-icon">
    <link href="images/webclip.png" rel="apple-touch-icon">
    <link href="css/new-styles.css?v=3" rel="stylesheet" type="text/css">
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
		.w-240{
		  width:235px !important;
	  }
		
		.checkout_grid2 {
    display: -ms-grid;
    display: grid;
    grid-auto-columns: 1fr;
    grid-column-gap: 16px;
    grid-row-gap: 16px;
    -ms-grid-columns: 0.75fr 0.75fr;
    grid-template-columns: 1.75fr 0.75fr;
    -ms-grid-rows: auto;
    grid-template-rows: auto;
}
		.mb-30{
			margin-bottom:30px;
		}
		.price-1{
			font-size:36px;
			
			margin: 20px 0;
		}
		
		
		@media only screen and (max-width:767px) {

		.checkout_grid2 {
 
    -ms-grid-columns: 1.75fr ;
    grid-template-columns: 1fr ;
   
			}}
    </style>
    <style>
        textarea {
            resize: none;
        }
    </style>
</head>
<body>

<div style="opacity:1;display:flex;" class="select_payment_method_new">
    <div style="opacity:1;-webkit-transform:translate3d(0, 10%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, 10%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, 10%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, 10%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0)"
         class="slectpay_container">
        <div class="text-block-18 paypay_heading">
            <span class="heading1">Wait!</span> <br><br>
            <span class="heading2">
                      You can get 50% off on your second <br>
                     booking of same professionist.
                     </span>
        </div>
        <br>
        <div class="div-block-25" style="margin-top: 20px">
            <a href="javascript:;" class="button-3 next odd diff w-button w-240">Proceed with Checkout</a>
            <a href="/visite-ed-esami.php?morev=1" class="button-3 next diff w-button w-240">Add more visits</a>
        </div>
    </div>
</div>
<?php include 'header.php'; ?>

<div class="masthead checkout">
    <div class="masthead_container diff">
        <h1 class="heading-11">Riepilogo Richiesta</h1>
    </div>
</div>
<div class="section-30">
    <div class="custom_container checkout">
        <div class="checkout_grid2">

            <div class="check_step1">
            <?php
            include 'connect.php';
            $total_price = 0;

            if (isset($_SESSION['book_visits'])){

                $book_visits = $_SESSION['book_visits'];
                $unique_cookie_array = array();
                foreach ($book_visits as $key => $unique_cookie_val){
                    if(!in_array($unique_cookie_val, $unique_cookie_array))
                        $unique_cookie_array[$key]=$unique_cookie_val;
                }

                $ii = 1;
                foreach($unique_cookie_array as $key => $cookie_book_visit) {
                    if (!empty($cookie_book_visit['book_patient_id'])) {
                        //print_r($cookie_book_visit->book_patient_id);
                        $cr_doctor_id = $cookie_book_visit['book_doctor'];
                        $cr_booking_name = $cookie_book_visit['Booking_name'];
                        $cr_article_id = $cookie_book_visit['article_id'];
                        $sql2 = "select * from doctor_profile where doctor_id ='" . $cr_doctor_id . "'";

                        $result2 = mysqli_query($conn, $sql2);
                        $rows2 = mysqli_fetch_array($result2);
                        $doctor_email = $rows2['email'];

                        if (!isset($rows2['email'])) {
                            header('Location: /');
                        }

                        $doctor_name = $rows2['fname'] . " " . $rows2['lname'];
                        $doctor_photo = "/professionisti/" . $rows2['photo'];


                        $sql3 = "SELECT DISTINCT lis.visit_home_price, lis.visit_tele_price, am.home, am.tele
FROM articlesMobidoc am
JOIN listini lis ON am.id=lis.article_mobidoc_id
JOIN articlesMobidoc_specialty ams ON am.id=ams.id
JOIN doctor_specialty ds ON ams.specialtyMobidoc=ds.specialty
JOIN doctor_profile dp ON ds.doctor_id=dp.doctor_id
WHERE am.`descrizione`='$cr_booking_name' AND (am.home='Y' OR am.tele='Y')";

                        $result3 = mysqli_query($conn, $sql3);
                        $rows3 = mysqli_fetch_array($result3);

                        if ($rows3['home'] == 'Y' && $rows3['tele'] == 'Y' || $rows3['home'] == 'Y') {
                            $visit_price = $rows3['visit_home_price'];
                        } else {
                            $visit_price = $rows3['visit_tele_price'];
                        }


                        ?>

                        <div class="details_container mb-30">
                            <div class="doctor_data">
                                <div class="doctor_data_image">
                                    <div class="image-16"
                                         style="background: url('<?php echo $doctor_photo; ?>') no-repeat center center / cover;"></div>
                                </div>
                                <div class="doctor_data_text">
                                    <div class="text-block-50">Salve, sono <span
                                                class="docotr_name"><?php echo $doctor_name; ?></span> e sarò il
                                        Professionista al
                                        tuo servizio.
                                    </div>
                                </div>
                            </div>
                            <div class="details">
                                <div class="div-block-48">
                                    <h2 class="heading-12">Dettagli Prenotazione</h2>
                                    <div class="div-block-36">
                                        <div class="data">
                                            <div>Tipo di Visita:</div>
                                        </div>
                                        <div class="value w-clearfix">
                                            <div class="text-block-35"><?php echo $cr_booking_name; ?></div>
                                            <div class="modify_visit_container"></div>
                                        </div>
                                        <div class="data">
                                            <div>Nome Paziente:</div>
                                        </div>
                                        <div class="value">
                                            <div><?php echo $rows132['first_name'] . " " . $rows132['last_name']; ?></div>
                                        </div>
                                        <div class="data">
                                            <div>Indirizzo:</div>
                                        </div>
                                        <div class="value">
                                            <div><?php echo $rows132['address']; ?></div>
                                        </div>

                                        <div class="data">
                                            <div>Email:</div>
                                        </div>
                                        <div class="value">
                                            <div><?php echo $rows132['email']; ?></div>
                                        </div>
                                        <div class="data">
                                            <div>Prezzo</div>
                                        </div>
                                        <div class="value">
                                            <?php
                                            if ($ii > 1){
                                            ?>
                                            <div class="text-block-54">€<?php echo $visit_price; ?>
                                                <span> €<?php
                                                    $visit_price = $visit_price/2;
                                                    if (strpos($visit_price,'.') !== false) {
                                                        echo $visit_price;
                                                    }else {
                                                        echo $visit_price.'.00';
                                                    }
                                                    ?>
                                                </span></div>
                                                <?php }else{?>
                                                <div class="text-block-54">€<?php echo $visit_price; ?></div>
                                                <?php }?>
                                        </div>
                                        <div id="w-node-f52807649448-ff1af31d" class="data">
                                            <div>Messaggio:</div>
                                            <br>
                                            <div style="font-weight:300; font-size:12px; width:70%; margin-top:-15px;">
                                                Specificare
                                                eventuali preferenze di giorno e data
                                            </div>
                                        </div>
                                        <div id="w-node-f5280764944b-ff1af31d" class="value">
                                <textarea maxlength="5000" id="field-2" name="field-2"
                                          class="textarea w-input text_msg"></textarea>
                                            <script>
                                                $('#field-2').keyup(function(){
                                                    this_text = $(this).val();
                                                    $('#message').attr("value",this_text);
                                                });
                                            </script>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-block-51">* Una volta confermata la prenotazione, verrai&#x27; contattato
                                dal tuo
                                professionista.
                            </div>

                            <br>
                            <a data-w-id="0f151d5f-aa1b-7d96-f52d-8d7913128245" href="#" data-article="<?=$cr_article_id?>" data-boook-name="<?=$cr_booking_name?>" class="button modify w-button">Cambia Professionista</a>

                        </div>

                            <?php
                        $ii++;
                        $total_price+= $visit_price;
                    }
                }
            }
            mysqli_close($conn);
            ?>
            </div>
            <div class="check_step2">
                <div class="div-block-49">
					 <?php
                    if ($ii > 2){
                        ?>
                        <div class="price-1">Total Price: <strong>€<?php
                            if (strpos($total_price,'.') !== false) {
                                echo $total_price;
                            }else {
                                echo $total_price.'.00';
                            }
                            ?>
							</strong>
                        </div>
                    <?php }?>
					<br>
                    <a data-w-id="c52ba0f4-d38b-9687-46ce-e745bbba5e78" href="#"
                       class="button gradient submit booking w-button">Conferma prenotazione</a>
                    <a href="javascript:;" class="button more_visits w-button">Add More Visits</a>


             
                   
                </div>

            </div>


            <div class="form">
                <div class="w-form">
                    <form id="checkout_form" name="checkout" action="booking-submit.php" method="post">
                        <div class="input_fields" style="display:none;">
                            <input type="text" class="w-input" maxlength="256" name="patient_id"
                                   placeholder="Patient ID" id="patient_id" value="<?php echo $pat_id; ?>">
                            <input type="text" class="w-input" maxlength="256" name="doctor_id"
                                   placeholder="Doctor ID" id="doctor_id" value="<?php echo $doctor_id; ?>">
                            <input type="text" class="w-input" maxlength="256" name="visit_name"
                                   placeholder="Visit Name" id="visit_name" value="<?php echo $booking_name; ?>">
                            <input type="text" class="w-input" maxlength="256" name="total_price" placeholder="Total Price"
                                   id="price" value="<?php echo $total_price; ?>">
                            <input type="text" class="w-input" maxlength="256" name="article_id"
                                   placeholder="article_id" id="article_id" value="<?php echo $article_id; ?>">
                            <input type="text" class="w-input" maxlength="256" name="message" placeholder="Message"
                                   id="message">
                            <input type="text" class="w-input" maxlength="256" name="payment_mode"
                                   placeholder="Payment Mode" id="payment_mode" value="">
                            <input type="text" class="w-input" maxlength="256" name="booking_status"
                                   placeholder="Booking Status" id="booking_status" value="0">
                            <input type="text" class="w-input" maxlength="256" name="doctor_booking_status"
                                   placeholder="Doctor Booking Status" id="doctor_booking_status" value="0">
                            <input type="text" class="w-input" maxlength="256" name="patient_confirmation"
                                   placeholder="Date of completion" id="patient-confirmation" value="0">
                            <input type="text" class="w-input" maxlength="256" name="pateint_remove_from_list"
                                   placeholder="Patient Remove from list" id="pateint_remove_from_list" value="0">
                            <input type="date" class="w-input" maxlength="256" name="date_of_booking"
                                   data-name="date_of_booking" placeholder="Date of Booking" id="date_of_booking"
                                   value="<?php echo $today; ?>">
                        </div>

                        <div data-w-id="0b7e3b0c-13c6-61bf-4622-8858fe41e086" style="opacity:0;display:none;"
                             class="select_payment_method">
                            <div data-w-id="815cc03f-3eba-e168-af08-dba23d269218" class="closer"><input type="email"
                                                                                                        class="w-input"
                                                                                                        maxlength="256"
                                                                                                        name="email"
                                                                                                        data-name="email"
                                                                                                        placeholder="email"
                                                                                                        id="email">
                            </div>
                            <div data-w-id="f2fb9200-3f41-4cc9-a9ce-2395f5b0dabd"
                                 style="opacity:0;-webkit-transform:translate3d(0, 10%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, 10%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, 10%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, 10%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0)"
                                 class="slectpay_container">
                                <div class="text-block-18 paypay_heading">
                                    <span class="heading1">AUTORIZZA IL PAGAMENTO</span> <br><br>
                                    <span class="heading2">
                      Questa è solo una autorizzazione preventiva.<br>
                     Pagherai solo a prestazione avvenuta.
                     </span>
                                </div>
                                <br>
                                <div style="width:460px; text-align:center;">Continuando confermi la tua
                                    prenotazione e verrai contattato dal tuo professionista per programmare la tua
                                    visita o il tuo esame.
                                </div>

                                <div class="pay_method_item_container">


                                    <div class="pay_method_item cash">
                                        <img src="images/cash.svg" alt="" class="pay_icon">
                                        <div class="pay_name">Contanti</div>
                                    </div>


                                    <div class="pay_method_item online"><img src="images/paypal_icon.svg?v=2" alt=""
                                                                             class="pay_icon">
                                        <div class="pay_name">PayPal o Carta di Credito</div>
                                    </div>
                                </div>
                                <div style="width:450px; text-align:center;font-size: 12px"> Per le autorizzazioni
                                    di pagamento online non è necessario avere un conto paypal, basta la carta di
                                    credito.
                                </div>
                                <div class="div-block-25" style="margin-top: 20px">
                                    <a data-w-id="214aa1f9-4e15-04df-fa79-87a2a27d2bca" href="#"
                                       class="button-3 next odd diff w-button">Annulla</a>
                                    <input type="submit" value="Continua" name="submit"
                                           class="button-3 next diff difff w-button" id="booking_submit">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div data-w-id="5c0009b2-4ece-2838-141c-f7e9fb810ad3" style="opacity:0;display:none" class="change_doctors">
    <div data-w-id="8cf68437-8f40-a893-ad28-bd8c57ebc8b1" class="closer"></div>
    <div data-w-id="03b26cb4-aa7d-0a1a-ab5e-1ab75d3f8e67"
         style="opacity:0;-webkit-transform:translate3d(0, 10%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, 10%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, 10%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, 10%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0)"
         class="select_doctor_container">
        <div class="text-block-18">Seleziona Professionista</div>
        <div id="change_doctor">
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>
<script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.4.1.min.220afd743d.js" type="text/javascript"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="js/webflow2.js" type="text/javascript"></script>
<!-- [if lte IE 9]>
<script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
<div id="fb-root"></div>
<script async="" defer="" crossorigin="anonymous"
        src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v4.0"></script>
<script>
    $(document).ready(function () {

        $(document).on('click touchstart', '.select_button', function(){
            var redirector = $(this).attr('data-link');
            $('#submit_redirector').attr("href", redirector);

            $('.selected_tick').removeClass("selected_true");
            $(this).parent().siblings(".professionist_image_container").find('.selected_tick').addClass("selected_true");

        }) ;

        $('.pay_method_item').click(function () {
            $('.pay_method_item').removeClass('selected');
            $(this).toggleClass('selected');
        });

        $('.pay_method_item').click(function () {
            var class_name = $(this).attr('class');
            if (class_name.indexOf("cash") > 0) {
                $('#payment_mode').attr("value", "Contanti");
            } else if (class_name.indexOf("online") > 0) {
                $('#payment_mode').attr("value", "Online");
            }
        });

        $('#booking_submit').click(function () {
            if ($('#payment_mode').attr("value") == '') {
                alert('Please select a payment mode');
                return false;
            } else {
                return true;
            }
        });



        // $('.select_button').click(function () {
        //     alert("hello");
        //     $('.selected_tick').removeClass("selected_true");
        //     $(this).parent().siblings(".professionist_image_container").find('.selected_tick').addClass("selected_true");
        //
        // });

    });

    $(".select_payment_method_new .div-block-25 .button-3.odd ").on("click", function () {
        $(".select_payment_method_new").attr("style", "opacity:0;display:none;")
    });

    $(".more_visits").on("click", function () {
        $(".select_payment_method_new").attr("style", "opacity:1;display:flex;")
    });

    $(".modify").on("click", function () {
        var cr_article_id = $(this).attr("data-article");
        var cr_visit_name = $(this).attr("data-boook-name");
        var xmlhttp2 = new XMLHttpRequest();
        xmlhttp2.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("change_doctor").innerHTML = this.responseText;
            }
        };
        xmlhttp2.open("GET", "changeDoctor.php?article_id=" + cr_article_id+'&book_name='+cr_visit_name, true);
        xmlhttp2.send();
    });
</script>
<?php include("google_analytic.php") ?>
</body>
</html>