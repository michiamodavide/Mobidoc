<?php
$prof_type = $_POST['pro_value'];
$doctor_id = $_POST['doc_id'];
include '../connect.php';

if($conn === false){
  die("ERROR database");
}

$sql = "update doctor_profile set p_type = ".$prof_type." where doctor_id='".$doctor_id."'";
$result = mysqli_query($conn, $sql);
mysqli_close($conn);

if ($result == 1) {
  echo "true";
}else{
  echo "false";
}
exit();
?>