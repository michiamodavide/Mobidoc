<?php
session_start();

$q = $_REQUEST["q"];

include '../connect.php';
        
if($conn === false){
    die("ERROR database");
}        

$sql = "SELECT doctor_id from listini where article_mobidoc_id ='".$q."'";
$result = mysqli_query($conn, $sql);

while($rows = mysqli_fetch_array($result)){
  $doctor_id = $rows['doctor_id'];
  $sql2 = "select * from doctor_profile where doctor_id ='".$doctor_id."' AND puo_refertare ='Y' ";
  $result2 = mysqli_query($conn, $sql2);
  $rows2 = mysqli_fetch_array($result2);
    $profile_image = "/professionisti/".$rows2['photo'];
    $name = $rows2['fname']." ".$rows2['lname'];
    $titile = ucwords($rows2['title']);
    $link = "/il-team/professionista.php?".$rows2['doctor_id'];
    $id = $rows2['doctor_id'];
         if ($rows2['active'] == 'Y' && $rows2['email'] !== $_SESSION['doctor_email']){
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
       <a href="#" class="button-3 gradient select_button w-button" doctor-id="<?php echo $id; ?>" excuter-email="<?php echo $rows2['email']; ?>" executer-name="<?php echo $name; ?>"
          onClick="setDoctor(this.getAttribute('doctor-id'),this.getAttribute('excuter-email'),this.getAttribute('executer-name')); $('.selected_tick').removeClass('selected_true'); $(this).parent().siblings('.professionist_image_container').children('.selected_tick').toggleClass('selected_true');">Seleziona</a>
       <a href="<?php echo $link; ?>" class="button-3 w-button" target="_blank">Esplora profilo</a>
      </div>
     </div>

      <?php
    }
} mysqli_close($conn);

?>