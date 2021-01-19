<?php

$q = $_REQUEST["q"];
include 'connect.php';
include 'cam_visit.php';

if($conn === false){
    die("ERROR database");
}        

//$sql = "select DISTINCT doctor_visit.visit_name from visit_type INNER JOIN doctor_visit on visit_type.visit_type_name = doctor_visit.visit_name where visit_type.visit_name='".$q."'";
if (isset($_SESSION['doctor_email'])) {
  $sql = "select DISTINCT doctor_visit.visit_name from visit_type
  INNER JOIN doctor_visit on visit_type.visit_type_name = doctor_visit.visit_name
  INNER JOIN doctor_profile on doctor_visit.doctor_email = doctor_profile.email
  where visit_type.visit_name='".$q."' AND doctor_profile.active = 'Y'";
}else{
  $sql = "select DISTINCT doctor_visit.visit_name from visit_type
  INNER JOIN doctor_visit on visit_type.visit_type_name = doctor_visit.visit_name
  INNER JOIN doctor_profile on doctor_visit.doctor_email = doctor_profile.email
  where visit_type.visit_name='".$q."' AND doctor_profile.puo_refertare='N' AND doctor_profile.active = 'Y'";
}

$result = mysqli_query($conn, $sql);

while($rows = mysqli_fetch_array($result)){
    $visit_name = $rows['visit_name']; ?>

    <div class="visite" id="<?php echo $visit_name;?>" data-name="<?php echo $visit_name;?>" onClick="getDoctors(this.getAttribute('data-name')); $('.visite').removeClass('visite_selected_true');$(this).toggleClass('visite_selected_true');">
       <div class="text-block-19">
          <?php
          checkVisitTypes($visit_name);
          echo $visit_name;

        ?>

       </div>
    </div>

<?php
} mysqli_close($conn);

?>


