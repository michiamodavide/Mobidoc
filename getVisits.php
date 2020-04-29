<?php

$q = $_REQUEST["q"];
include 'connect.php';
include 'cam_visit.php';

if($conn === false){
    die("ERROR database");
}        

$sql = "select DISTINCT doctor_visit.visit_name from visit_type INNER JOIN doctor_visit on visit_type.visit_type_name = doctor_visit.visit_name where visit_type.visit_name='".$q."'";
$result = mysqli_query($conn, $sql);

while($rows = mysqli_fetch_array($result)){
    $visit_name = $rows['visit_name']; ?>

    <div class="visite" id="<?php echo $visit_name;?>" data-name="<?php echo $visit_name;?>" onClick="getDoctors(this.getAttribute('data-name')); $('.visite').removeClass('visite_selected_true');$(this).toggleClass('visite_selected_true');">
       <div class="text-block-19">

         <?php
         $explod_visit = explode(" ",$visit_name);
         if ($explod_visit[0] == "Teleconsulto" && $explod_visit[1] == "fisioterapico" || $explod_visit[0] == "Teleconsulto" && $explod_visit[1] == "psicologico"){

           ?>
        <img src="assets/visit_icon/<?php echo $cam_favicon?>" style="width: 25px;margin-right: 10px" alt="">
          <?php
         }
          echo $visit_name;

        ?>

       </div>
    </div>

<?php
} mysqli_close($conn);

?>


