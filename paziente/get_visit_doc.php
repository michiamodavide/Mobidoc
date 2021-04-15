<?php
$select_visit = $_POST['data'];
include '../connect.php';

if($conn === false){
  die("ERROR database");
}

$doctor_sql = "SELECT ls.doctor_id FROM listini ls
 JOIN doctor_register dg ON ls.doctor_id=dg.id
 WHERE ls.article_mobidoc_id = '".$select_visit."' AND dg.tick = 1";
$doc_result = mysqli_query($conn, $doctor_sql);

$doc_data_array = array();
while($doc_rows = mysqli_fetch_array($doc_result)){
  $doctor_id = $doc_rows['doctor_id'];
    $sql2 = "select * from doctor_profile where doctor_id ='".$doctor_id."'";
  $result2 = mysqli_query($conn, $sql2);
  $rows2 = mysqli_fetch_array($result2);
  if (!empty($rows2)) {
    array_push($doc_data_array,$rows2);
  }
  ?>
<?php
}
mysqli_close($conn);

//print_r($doc_data_array);
$doc_detail = json_encode($doc_data_array);
print_r($doc_detail);
exit();
?>