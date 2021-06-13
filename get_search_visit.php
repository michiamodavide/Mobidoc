<?php
$search_city = trim($_REQUEST["city"]);
include 'connect.php';

if($conn === false){
    die("ERROR database");
}

$sql = "SELECT v.visit_id, v.visit_name, v.body_text, v.image, v.specialty_id, ms.ERid FROM visit v JOIN medical_specialty ms ON ms.id=v.specialty_id WHERE ms.`status`='Y'";

$result = mysqli_query($conn, $sql);
$row_count = mysqli_num_rows($result);

while($rows = mysqli_fetch_array($result)){
    $visit_name = $rows['visit_name'];
    $visit_id = $rows['specialty_id'];

    $image1 = 'empty.jpg';
    if ($rows['image']){
        $image1 = $rows['image'];
    }
    $mds_erid = $rows['ERid'];
    $link = '/visite-ed-esame/landing-page.php?mds_name='.$visit_name.'&mds_id='.$visit_id;

    if($row_count){
        $expl_visit_name = explode(" ", $visit_name);

        $first_word = $expl_visit_name[0];
        if ($mds_erid == '011'){
            $first_word = str_replace(".", "",$first_word);
        }


//        if ($last_selected_article_id){
//            $expl_visit1 = explode(" ", $last_selected_article_name);
//            $selector_div_css = trim(strtolower($expl_visit1[0]));
//            echo '<style>.service_container{display: none}.service_container.'.$selector_div_css.'{display: grid}</style>';
//        }


        $tm2_class = '';
        if (strlen($visit_name) < 20)
            $tm2_class = 'fet_tm2';

        ?>

        <div class="service_container <?php echo trim(strtolower($first_word))?>">
            <div id="w-node-9ebfabc602d8-851af311" class="service_maine_card">
                <!-- New HTML-Code --->
                <div class="feature diff">
                    <a class="pic2" href="<?php echo $link;?>" target="_blank">
                        <div class="feature_label <?php echo $tm2_class?>"><?php echo substr(wordwrap($visit_name,20,"<br>\n"), 0, 30);
                            if (strlen($visit_name) > 30){echo '...';}?>
                            <img src="images/arrow.png" alt="" >
                        </div>
                        <img src="/assets/visit_images/<?php echo strtolower($image1)?>?v=8" alt="">
                    </a>
                </div>
                <!-- New HTML-Code --->

            </div>
            <div class="service_type_card">
                <div class="text-block-7"><span class="service_text_underline"><?php echo $visit_name;?></span></div>
                <div class="type_of-service_grid">
                    <?php
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
                    $rows2_count = mysqli_num_rows($result2);
                    if (empty($rows2_count)){
                        echo '<style>.service_container.'.trim(strtolower($first_word)).'{display: none}</style>';
                    }

                    while($rows2 = mysqli_fetch_array($result2)){
                        $visit_type_name = trim($rows2['descrizione'], " ");
                        $article_id = trim($rows2['article_id'], " ");
                        $visit_name_2 = '"' . $mds_erid . '", "' . $visit_type_name . '", "' . $article_id . '"';
                        $attribute = $rows2['attributo'];

                        echo "<div class='sub_service' onClick='get_visit_Doctors(" . $visit_name_2 . ");' >";
                        echo "<div class='sub_service_text'>";

                        echo $visit_type_name;
                        if (!empty($attribute)){
                            echo ' <span style="font-size: 13px;font-weight: bold">('.$attribute.')</span>';
                        }
                        echo "</div>";
                        echo "</div>";

                    }
                    ?>

                </div>
            </div>
        </div>
    <?php }} mysqli_close($conn);?>