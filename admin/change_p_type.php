<?php
$doctor_id = $_POST['doctor_id'];
$puo_refertare = $_POST['puo_refertare'];
include '../connect.php';

if($conn === false){
  die("ERROR database");
}

$sql = "update doctor_profile set puo_refertare = '".$puo_refertare."' where doctor_id='".$doctor_id."'";
$result = mysqli_query($conn, $sql);
mysqli_close($conn);

if ($result == 1) {
  echo "true";
}else{
  echo "false";
}
exit();
?>