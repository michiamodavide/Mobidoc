<?php
session_start();
?>
<div class="div-block-19">
    <div class="div-block-20">
<?php

$article_id = trim($_REQUEST["article_id"]);
$book_name = trim($_REQUEST["book_name"]);
include 'connect.php';

if($conn === false){
    die("ERROR database");
}

$sql4 = "SELECT DISTINCT dp.doctor_id, dp.email, dp.fname, dp.lname, dp.photo, dp.title
FROM doctor_profile dp
JOIN listini ls ON dp.doctor_id=ls.doctor_id
 JOIN doctor_register dg ON ls.doctor_id=dg.id
 WHERE ls.article_mobidoc_id = '" . $article_id . "' AND dp.`active`='Y' AND dp.`visible`='Y' AND dp.`puo_refertare`='N' AND dg.tick = 1";
$result4 = mysqli_query($conn, $sql4);
$row5_count = mysqli_num_rows($result4);

if ($conn === false) {
    die("ERROR database");
}

if ($row5_count) {
    while ($rows5 = mysqli_fetch_array($result4)) {
        $profile_image = "/professionisti/" . $rows5['photo'];
        $name = $rows5['fname'] . " " . $rows5['lname'];
        $titile = ucwords($rows5['title']);
        $link = "/il-team/professionista.php?" . $rows5['doctor_id'];
        $id = $rows5['doctor_id'];
        $select_link = "/checkout.php?book_visit=" . $book_name . "&book_doctor=" . $id . "&article_id=" . $article_id. "&up_arr=1";
        ?>

        <div class="professionist_card selecting">
            <div class="professionist_image_container"><img src="<?php echo $profile_image; ?>" alt=""
                                                            class="professionist_image">
                <div class="selected_tick"><img src="images/Path-107.svg" width="55" alt=""
                                                class="image-4"></div>
            </div>
            <div class="preofessionist_name"><?php echo $name; ?></div>
            <div class="professionist_title"><?php echo $titile; ?></div>
            <div class="button_container">
                <a href="#" data-link="<?php echo $select_link; ?>"
                   class="button gradient select_button w-button">Seleziona</a>
                <a href="<?php echo $link; ?>" target="_blank" class="button-3 w-button">Esplora
                    Profilo</a>
            </div>
        </div>

        <?php
    }
}
mysqli_close($conn);
?>

    </div>
</div>
<div class="div-block-21 diff">
    <a data-w-id="67c1aa61-b2e3-d5aa-a853-00529a462af0" href="#" class="button next close w-button">Close</a>
    <a href="#" class="button-3 next w-button" id="submit_redirector">Invia</a>
</div>
