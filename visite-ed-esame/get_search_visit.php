<?php

session_start();

$search_city = trim($_REQUEST["city"]);
$mds_erid = $_REQUEST["erid"];
$mds_name  = $_REQUEST["mds_name"];

include '../connect.php';

if($conn === false){
    die("ERROR database");
}


if (isset($_SESSION['doctor_email'])) {
    $sql2 = "SELECT DISTINCT dp.doctor_id, am.id As article_id, descrizione, am.home, am.tele, am.attributo
FROM doctor_profile dp
JOIN doctor_register as dg ON dp.doctor_id = dg.id
JOIN doctor_cap as dc ON dp.doctor_id = dc.doctor_id
JOIN listini as ls ON dp.doctor_id = ls.doctor_id
JOIN doctor_specialty as ds ON dp.doctor_id = ds.doctor_id
JOIN articlesMobidoc as am ON am.id = ls.article_mobidoc_id
JOIN articlesMobidoc_specialty as ams ON am.id = ams.id
JOIN medical_specialty as ms ON '" . $mds_erid . "'=ams.specialtyMobidoc
WHERE dg.tick='1' AND dc.comune='".$search_city."' AND ds.specialty='".$mds_erid."' AND dp.active='Y' AND dp.visible='Y' AND am.home='Y' OR am.tele='Y' group by am.id";

}else{
    $sql2 = "SELECT DISTINCT dp.doctor_id, am.id As article_id, descrizione, am.home, am.tele, am.attributo
FROM doctor_profile dp
JOIN doctor_register as dg ON dp.doctor_id = dg.id
JOIN doctor_cap as dc ON dp.doctor_id = dc.doctor_id
JOIN listini as ls ON dp.doctor_id = ls.doctor_id
JOIN doctor_specialty as ds ON dp.doctor_id = ds.doctor_id
JOIN articlesMobidoc as am ON am.id = ls.article_mobidoc_id
JOIN articlesMobidoc_specialty as ams ON am.id = ams.id
JOIN medical_specialty as ms ON '" . $mds_erid . "'=ams.specialtyMobidoc
WHERE dg.tick='1' AND dc.comune='".$search_city."' AND ds.specialty='".$mds_erid."' AND dp.puo_refertare='N' AND dp.active='Y' AND dp.visible='Y' AND am.home='Y' OR am.tele='Y' group by am.id";
}

$result2 = mysqli_query($conn, $sql2);

while($rows2 = mysqli_fetch_array($result2)){
    $visit_type_name = trim($rows2['descrizione']," ");
    $article_id = trim($rows2['article_id'], " ");
    $visit_name_2 = '"'.$mds_name.'", "'.$visit_type_name.'","'.$article_id.'"';

    ?>

    <div class="visite_type" onClick='getDoctor_details(<?php echo $visit_name_2;?>);'>
        <div class="text-block-21">
            <?php  echo $visit_type_name;?>
        </div>
        <?php
        /*
           <div class="price">
               <div class="text-block-55">A Partire da</div>
               <div class="price_text">€<?php echo $price?></div>
           </div>
        */
        ?>
    </div>

<?Php } ?>

<br>
<a href="tel:3357798844" class="button visite_cta w-button">Visit Not Available? Call Us</a>

