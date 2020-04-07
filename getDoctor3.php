<?php


$q = $_REQUEST["q"];

include 'connect.php';
        
if($conn === false){
    die("ERROR database");
}        

$sql = "select * from doctor_visit where visit_name ='".$q."'";
$result = mysqli_query($conn, $sql);


while($rows = mysqli_fetch_array($result)){
    $doctor_email = $rows['doctor_email'];
    $sql2 = "select * from doctor_profile where email ='".$doctor_email."'";
    $result2 = mysqli_query($conn, $sql2);
    $rows2 = mysqli_fetch_array($result2);
    $profile_image = "/professionisti/".$rows2['photo'];
    $name = $rows2['fname']." ".$rows2['lname'];
    $titile = ucwords($rows2['title']);
    $link = "/il-team/professionista.php?".$rows2['doctor_id'];
    $id = $rows2['doctor_id'];
?>
    

    <div class="professionist_card selecting">
        <div class="professionist_image_container"><img src="<?php echo $profile_image;?>" alt="" class="professionist_image">
            <div class="selected_tick"><img src="images/Path-107.svg" width="55" alt="" class="image-4"></div>
        </div>
        <div class="preofessionist_name"><?php echo $name;?></div>
        <div class="professionist_title"><?php echo $titile;?></div>
        <div class="button_container">
            <a href="#" class="button-3 gradient select_button w-button" doctor-id="<?php echo $id;?>" onClick="setDoctor(this.getAttribute('doctor-id')); $('.selected_tick').removeClass('selected_true'); $(this).parent().siblings('.professionist_image_container').children('.selected_tick').toggleClass('selected_true');">Seleziona</a>
            <a href="<?php echo $link;?>" class="button-3 w-button">Esplora Profilo</a>
        </div>
    </div>
    
<?php
} mysqli_close($conn);

?>