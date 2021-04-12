<?php

$visit_name = trim($_REQUEST["q"]);
include 'connect.php';
//include 'cam_visit.php';

if($conn === false){
    die("ERROR database");
}

$sql = "SELECT DISTINCT am.id AS article_id, g.detailName, home, tele, descrizione, attributo
 FROM articlesMobidoc am
 JOIN articlesMobidoc_specialty as ams ON am.id = ams.id
 JOIN medical_specialty as ms ON ms.ERid=ams.specialtyMobidoc
 LEFT JOIN groups g ON g.id=am.gruppo
 WHERE ms.status='Y' AND (am.home = 'Y' OR am.tele = 'Y')";

$result = mysqli_query($conn, $sql);

while($rows = mysqli_fetch_array($result)){
   $exam_name = $rows['descrizione'];
  if (trim($rows['detailName']) == trim($visit_name)) {
   ?>

    <div class="visite" id="<?php echo $exam_name;?>" data-name="<?php echo $exam_name;?>" onClick="getDoctors(this.getAttribute('data-name')); $('.visite').removeClass('visite_selected_true');$(this).toggleClass('visite_selected_true');">
       <div class="text-block-19">
          <?php
          echo $exam_name;

        ?>

       </div>
    </div>

<?php
}} mysqli_close($conn);

?>


