<?php

$doctor_id = $_REQUEST["doctor-id"];

include '../connect.php';
        
if($conn === false){
    die("ERROR database");
}        

$sql = "select * from doctor_profile where doctor_id ='".$doctor_id."'";
$result = mysqli_query($conn, $sql);


while($rows = mysqli_fetch_array($result)){
    $doctor_email = $rows['email'];
    $profile_image = "/professionisti/".$rows['photo'];
    $name = $rows['fname']." ".$rows['lname'];
    $titile = ucwords($rows['title']);
    $link = "/il-team/professionista.php?".$rows['doctor_id'];
?>

    <div class="profile_header">
        <div class="qprofile_image">
            <div style="background:url(<?php echo $profile_image;?>) no-repeat center center / cover;" class="image-6"></div>
        </div>
        <div class="name_y_titilo">
          <h3 class="profile_name"><?php echo $name;?></h3>
          <div class="profile_titilo"><?php echo $titile;?></div>
        </div>
        <a href="<?php echo $link;?>" target="_blank" class="button stroked qprofile_visit_button w-button">Vedi Profilo</a>
        <!--<img src="../images/close.svg" width="18" alt="" class="close_button">-->
      </div>

      <div class="qprofile_data_container">
        <div class="div-block-28">
          <div id="w-node-37914aee2dc4-bc1af318" class="left">
            <div class="text-block-22">Visite ed Esami</div>
            <div class="qprofile_visite_container">
            
<?php
include '../connect.php';

$sql2 = "SELECT DISTINCT am.id As article_id, descrizione, am.home, am.tele, am.attributo
FROM doctor_specialty ds 
JOIN articlesMobidoc_specialty as ams ON ds.specialty = ams.specialtyMobidoc
JOIN  listini as ls ON ams.id = ls.article_mobidoc_id
JOIN articlesMobidoc as am ON am.id = ls.article_mobidoc_id
WHERE ds.doctor_id='".$doctor_id."' AND ls.doctor_id='".$doctor_id."' AND (am.home='Y' OR am.tele='Y')";

$result2 = mysqli_query($conn, $sql2);

while($rows2 = mysqli_fetch_array($result2)){
    $visite_nome = $rows2['descrizione'];
    $attribute = $rows2['attributo'];
?>
              <div class="qprofile_visite">
                <div class="text-block-23">

                  <?php
                  echo $visite_nome;
                   if (!empty($attribute)){
                       echo ' <span style="font-size: 13px;font-weight: bold">('.$attribute.')</span>';
                   }
                  ?>
                </div>
              </div>
<?php } ?> 

            </div>
          </div>
          <div class="right">
            <div class="text-block-22">Comuni Serviti:</div>
            <div class="qprofile_area_grid">

            <?php
include '../connect.php';
$sql3 = "select * from doctor_cap where doctor_id ='".$doctor_id."'";
$result3 = mysqli_query($conn, $sql3);


while($rows3 = mysqli_fetch_array($result3)){
    $comune = $rows3['comune'];
    $province = $rows3['province'];
    $cap = $rows3['cap'];
?>
              <div class="qprofile_area">
                <div class="qprofile_area_name">
                  <div class="bullets"></div>
                  <div class="text-block-24"><?php echo $comune;?> (<?php echo $province;?>)</div>
                </div>
                <div class="text-block-25"><?php echo $cap;?></div>
              </div>

<?php } ?> 
              
            </div>
          </div>
        </div>
      </div>
      

<?php
} mysqli_close($conn);

?>