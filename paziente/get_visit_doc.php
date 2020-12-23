<?php
$select_visit = $_POST['data'];
include '../connect.php';

if($conn === false){
  die("ERROR database");
}

$doctor_sql = "select * from doctor_visit where visit_name ='".$select_visit."'";
$doc_result = mysqli_query($conn, $doctor_sql);


$doc_data_array = array();
while($doc_rows = mysqli_fetch_array($doc_result)){
  $doctor_email = $doc_rows['doctor_email'];
    $sql2 = "select * from doctor_profile where email ='".$doctor_email."' AND p_type='1'";
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