<?php
session_start();
?>
<div class="div-block-19">
    <div class="div-block-20">
        <?php

        $erid_id = trim($_REQUEST["erid-id"]);
        include '../connect.php';

        if($conn === false){
            die("ERROR database");
        }

        $sql4 = "
SELECT am.id As article_id, descrizione, am.home, am.tele, am.attributo
FROM articlesMobidoc am
JOIN articlesMobidoc_specialty as ams ON am.id = ams.id WHERE ams.specialtyMobidoc='".$erid_id."' group by am.id";


        $result4 = mysqli_query($conn, $sql4);
        $row5_count = mysqli_num_rows($result4);

        if ($conn === false) {
            die("ERROR database");
        }

        if ($row5_count) {
            while ($rows5 = mysqli_fetch_array($result4)) {
                //print_r($rows5);
                $article_id = $rows5['article_id'];
                $home_status = $rows5['home'];
                if ($home_status == 'Y') {
                    $home_check = 'checked';
                } else {
                    $home_check = '';
                }

                $tele_status = $rows5['tele'];
                if ($tele_status == 'Y') {
                    $tele_check = 'checked';
                } else {
                    $tele_check = '';
                }
                ?>

                <p><strong><?=$rows5['descrizione']?></strong>
                    <?php
                    if (!empty($rows5['attributo'])){
                        echo '('. $rows5['attributo'].')';
                    }
                    ?>

                </p>
                <div class="glance_details_title" style="font-size: 14px;margin-left: 15px;">
                    <input type="checkbox" <?php echo $home_check ?> class="home_visit lable2" id="home_visit<?=$article_id?>"
                           name="home_visit" article_id="<?=$article_id?>" value="<?=$home_status?>">
                    <label for="home_visit<?=$article_id?>">Home</label>
                </div>
                <div class="glance_details_title" style="font-size: 14px;margin-left: 15px;">
                    <input type="checkbox" <?php echo $tele_check ?> class="tele_visit lable2" id="tele_visit<?=$article_id?>"
                           name="tele_visit" article_id="<?=$article_id?>" value="<?=$tele_status?>">
                    <label for="tele_visit<?=$article_id?>">Tele</label>
                </div>
                <?php
            }
        }else{

        ?>
        <p style="text-align: center">There is no Visit/Exam.</p>
        <?php }
        mysqli_close($conn);
        ?>

    </div>
</div>

