<?php
session_start();
$mds_id = $_POST['mds_idd'];
$mds_status = $_POST['mds_status'];

include '../connect.php';

if($conn === false){
  die("ERROR database");
}

$sql = "update medical_specialty set status = '".$mds_status."' where id='".$mds_id."'";
$result = mysqli_query($conn, $sql);
mysqli_close($conn);

if ($result == 1) {
  echo "true";
}else{
  echo "false";
}
exit();
?>