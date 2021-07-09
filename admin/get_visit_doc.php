<?php

$select_option = $_POST['data'];
include '../connect.php';

if($conn === false){
  die("ERROR database");
}

$get_mds_visit = 0;
if (isset($_POST['get_vist']) && $_POST['get_vist'] == 1){
  $get_mds_visit = 1;
}
$data_array = array();
if ($get_mds_visit == 1){
  $get_visit_sql = "SELECT DISTINCT am.id As article_id, descrizione, am.attributo
FROM doctor_profile dp
JOIN doctor_register as dg ON dp.doctor_id = dg.id
JOIN listini as ls ON dp.doctor_id = ls.doctor_id
JOIN doctor_specialty as ds ON dp.doctor_id = ds.doctor_id
JOIN articlesMobidoc as am ON am.id = ls.article_mobidoc_id
JOIN articlesMobidoc_specialty as ams ON am.id = ams.id
JOIN medical_specialty as ms ON '" . $select_option . "'=ams.specialtyMobidoc
WHERE dg.tick='1' AND ds.specialty='".$select_option."' AND dp.active='Y' AND (am.home='Y' OR am.tele='Y') group by am.id";

  $visits_result = mysqli_query($conn, $get_visit_sql);


  while($visits_row = mysqli_fetch_array($visits_result)){
    array_push($data_array, array(
        "article_id" => $visits_row['article_id'],
        "description" => $visits_row['descrizione'],
        "attribute" => $visits_row['attributo']
    ));
  }

}else{

    $mds_erid = $_POST['mds_erid'];
    $doctor_sql = "SELECT DISTINCT dp.doctor_id, dp.email, dp.fname, dp.lname, dp.photo, dp.title, dp.puo_refertare, dp.visible
FROM doctor_profile dp
JOIN doctor_specialty ds ON dp.doctor_id=ds.doctor_id
JOIN doctor_register dg ON ds.doctor_id=dg.id
JOIN listini ls ON ds.doctor_id=ls.doctor_id
 WHERE ds.specialty = '".$mds_erid."' AND ls.article_mobidoc_id='".$select_option."' AND dp.`active`='Y' AND dg.tick = 1";
  $doc_result = mysqli_query($conn, $doctor_sql);

  while($doc_rows = mysqli_fetch_array($doc_result)){
      array_push($data_array, array(
          "doctor_id" => $doc_rows['doctor_id'],
          "fname" => $doc_rows['fname'],
          "lname" => $doc_rows['lname'],
          "puo_refertare" => $doc_rows['puo_refertare'],
          "visible" => $doc_rows['visible']
      ));
  }
}

mysqli_close($conn);

//print_r($doc_data_array);
$data_detail = json_encode($data_array);
print_r($data_detail);
exit();
?>