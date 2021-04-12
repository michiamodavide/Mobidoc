<?php
session_start();

$visit_name = trim($_REQUEST["q"]);

include 'connect.php';
        
if($conn === false){
    die("ERROR database");
}

  if (isset($_SESSION['doctor_email'])) {
    $sql2 = "SELECT DISTINCT am.id AS article_id, dp.doctor_id, dp.email, dp.fname, dp.lname, dp.photo, dp.title 
FROM articlesMobidoc am
JOIN listini lis ON am.id=lis.article_mobidoc_id
JOIN articlesMobidoc_specialty ams ON am.id=ams.id
JOIN doctor_specialty ds ON ams.specialtyMobidoc=ds.specialty
JOIN doctor_profile dp ON ds.doctor_id=dp.doctor_id
WHERE am.`descrizione`='$visit_name' AND (am.home='Y' OR am.tele='Y')";
  }else{
    $sql2 = "SELECT DISTINCT am.id AS article_id, dp.doctor_id, dp.email, dp.fname, dp.lname, dp.photo, dp.title
FROM articlesMobidoc am
JOIN listini lis ON am.id=lis.article_mobidoc_id
JOIN articlesMobidoc_specialty ams ON am.id=ams.id
JOIN doctor_specialty ds ON ams.specialtyMobidoc=ds.specialty
JOIN doctor_profile dp ON ds.doctor_id=dp.doctor_id
WHERE am.`descrizione`='$visit_name' AND dp.`puo_refertare`='N' AND (am.home='Y' OR am.tele='Y')";
  }

    $result2 = mysqli_query($conn, $sql2);
  $row_count = mysqli_num_rows($result2);

 if ($row_count) {

   while ($rows2 = mysqli_fetch_array($result2)) {
     $profile_image = "/professionisti/" . $rows2['photo'];
     $name = $rows2['fname'] . " " . $rows2['lname'];
     $titile = ucwords($rows2['title']);
     $link = "/il-team/professionista.php?" . $rows2['doctor_id'];
     $id = $rows2['doctor_id'];
     if (!empty($rows2)) {
       ?>

      <div class="professionist_card-2 selecting">
       <div class="professionist_image_container">
        <img src="<?php echo $profile_image; ?>" alt="" class="professionist_image">
        <div class="selected_tick">
         <img src="images/Path-107.svg" width="55" alt="" class="image-4">
        </div>
       </div>
       <div class="preofessionist_name"><?php echo $name; ?></div>
       <div class="professionist_title"><?php echo $titile; ?></div>
       <div class="button_container">
        <a href="#" class="button-3 gradient select_button w-button" doctor-id="<?php echo $id; ?>" article-id="<?php echo $rows2['article_id']; ?>"
           onClick="setDoctor(this.getAttribute('doctor-id'), this.getAttribute('article-id')); $('.selected_tick').removeClass('selected_true'); $(this).parent().siblings('.professionist_image_container').children('.selected_tick').toggleClass('selected_true');">Seleziona</a>
        <a href="<?php echo $link; ?>" class="button-3 w-button" target="_blank">Esplora profilo</a>
       </div>
      </div>

       <?php
     }
   }
   mysqli_close($conn);
 }else{
  echo '<style>.div-block-25{display:none}</style>';

?>

<div class="professionist_card-2">
 <div class="preofessionist_name">Chiamaci per fissare una prenotazione</div>
 <br>
 <div class="professionist_title">
  <div class="detail"><img src="/images/phone-solid.svg" alt="" class="image-3">
   <div class="text-block-6" style="font-size: 16px"><a href="tel:3357798844">335 779 88 44</a></div>
  </div>
 </div>
</div>

<?php }?>
