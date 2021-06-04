<?php

//$visit_name = trim($_REQUEST["q"]);
$article_id = trim($_REQUEST["article_id"]);
$mds_erid = trim($_REQUEST["erid"]);
include 'connect.php';
        
if($conn === false){
    die("ERROR database");
}

  if (isset($_SESSION['doctor_email'])) {
      $sql2 = "SELECT DISTINCT dp.doctor_id, dp.email, dp.fname, dp.lname, dp.photo, dp.title
FROM doctor_profile dp
JOIN doctor_specialty ds ON dp.doctor_id=ds.doctor_id
JOIN doctor_register dg ON ds.doctor_id=dg.id
JOIN listini ls ON ds.doctor_id=ls.doctor_id
 WHERE ds.specialty = '".$mds_erid."' AND ls.article_mobidoc_id='".$article_id."' AND dp.`active`='Y' AND dp.`visible`='Y' AND dg.tick = 1";
  }else{
      $sql2 = "SELECT DISTINCT dp.doctor_id, dp.email, dp.fname, dp.lname, dp.photo, dp.title
FROM doctor_profile dp
JOIN doctor_specialty ds ON dp.doctor_id=ds.doctor_id
JOIN doctor_register dg ON ds.doctor_id=dg.id
JOIN listini ls ON ds.doctor_id=ls.doctor_id
 WHERE ds.specialty = '".$mds_erid."' AND ls.article_mobidoc_id='".$article_id."' AND dp.`active`='Y' AND dp.`visible`='Y' AND dp.`puo_refertare`='N' AND dg.tick = 1";
  }

$result2 = mysqli_query($conn, $sql2);
  $row_count = mysqli_num_rows($result2);

 if ($row_count) {

   while ($rows2 = mysqli_fetch_array($result2)) {
     $profile_image = "/professionisti/" . $rows2['photo'];
     $name = $rows2['fname'] . " " . $rows2['lname'];
     $titile = ucwords($rows2['title']);
       $id = $rows2['doctor_id'];
     $link = "/il-team/professionista.php?" . $id;
     if (!empty($rows2)) {
       ?>

      <div class="professionist_card-2 selecting">
       <div class="professionist_image_container">
        <img src="<?php echo $profile_image; ?>" alt="" class="professionist_image">
        <div class="selected_tick">
         <img src="/images/Path-107.svg" width="55" alt="" class="image-4">
        </div>
       </div>
       <div class="preofessionist_name"><?php echo $name; ?></div>
       <div class="professionist_title"><?php echo $titile; ?></div>
       <div class="button_container">
        <a href="#" class="button-3 gradient select_button w-button" doctor-id="<?php echo $id; ?>" article-id="<?php echo $article_id; ?>"
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
