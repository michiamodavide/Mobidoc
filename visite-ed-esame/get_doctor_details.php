<?php


$q = $_REQUEST["q"];

include '../connect.php';
include '../cam_visit.php';
        
if($conn === false){
    die("ERROR database");
}        

$sql = "select * from doctor_profile where doctor_id ='".$q."'";
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
        <a href="<?php echo $link;?>" target="_blank" class="button stroked qprofile_visit_button w-button">Visit Profile</a>
        <!--<img src="../images/close.svg" width="18" alt="" class="close_button">-->
      </div>

      <div class="qprofile_data_container">
        <div class="div-block-28">
          <div id="w-node-37914aee2dc4-bc1af318" class="left">
            <div class="text-block-22">Visite ed Esami</div>
            <div class="qprofile_visite_container">
            
<?php
include '../connect.php';
$sql2 = "select * from doctor_visit where doctor_email ='".$doctor_email."'";
$result2 = mysqli_query($conn, $sql2);


while($rows2 = mysqli_fetch_array($result2)){
    $visite_nome = $rows2['visit_name'];
?>
              <div class="qprofile_visite">
                <div class="text-block-23">

                  <?php
                  checkVisitTypes($visite_nome);
                  echo $visite_nome?>
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
$sql3 = "select * from doctor_cap where doctor_email ='".$doctor_email."'";
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