<?php
session_start();

$article_id = $_REQUEST["article-id"];
$doc_id = $_REQUEST["doc-id"];

include '../connect.php';
        
if($conn === false){
    die("ERROR database");
}

$doc_spec_sql = "SELECT specialty from doctor_specialty where doctor_id='".$doc_id."'";
$doc_spec_result = mysqli_query($conn, $doc_spec_sql);
$doc_spec_row = mysqli_fetch_array($doc_spec_result);

$sql = "SELECT DISTINCT dp.doctor_id, dp.email, dp.fname, dp.lname, dp.photo, dp.title
FROM doctor_profile dp
JOIN doctor_specialty ds ON dp.doctor_id=ds.doctor_id
JOIN doctor_register dg ON ds.doctor_id=dg.id
JOIN listini ls ON ds.doctor_id=ls.doctor_id
 WHERE ds.specialty = '".$doc_spec_row['specialty']."' AND ls.article_mobidoc_id='".$article_id."' AND dp.`active`='Y' AND dp.`puo_refertare`='Y' AND dg.tick = 1";

$result = mysqli_query($conn, $sql);
$result_count = mysqli_num_rows($result);

if ($result_count > 0) {
    while ($rows2 = mysqli_fetch_array($result)) {
        $profile_image = "/professionisti/" . $rows2['photo'];
        $name = $rows2['fname'] . " " . $rows2['lname'];
        $titile = ucwords($rows2['title']);
        $link = "/il-team/professionista.php?" . $rows2['doctor_id'];
        $id = $rows2['doctor_id'];
        if ($rows2['email'] !== $_SESSION['doctor_email']) {
            ?>

            <div class="professionist_card-2 selecting">
                <div class="professionist_image_container">
                    <img src="<?php echo $profile_image; ?>" alt="" class="professionist_image">
                    <div class="selected_tick">
                        <img src="../images/Path-107.svg" width="55" alt="" class="image-4">
                    </div>
                </div>
                <div class="preofessionist_name"><?php echo $name; ?></div>
                <div class="professionist_title"><?php echo $titile; ?></div>
                <div class="button_container">
                    <a href="#" class="button-3 gradient select_button w-button" doctor-id="<?php echo $id; ?>"
                       excuter-email="<?php echo $rows2['email']; ?>" executer-name="<?php echo $name; ?>"
                       onClick="setDoctor(this.getAttribute('doctor-id'),this.getAttribute('excuter-email'),this.getAttribute('executer-name')); $('.selected_tick').removeClass('selected_true'); $(this).parent().siblings('.professionist_image_container').children('.selected_tick').toggleClass('selected_true');">Seleziona</a>
                    <a href="<?php echo $link; ?>" class="button-3 w-button" target="_blank">Esplora profilo</a>
                </div>
            </div>

            <?php
        }
    }
    mysqli_close($conn);

}else{
?>
    <p id="no_refer_text" style="text-align: center;color: red;">Non ci sono refertatori disponibili per la prestazione selezionata</p>
    <style>#ext_not{display: none;}</style>
<?php }?>
