<?php
//$user_search = $_POST['data'];
$search_fasical = $_POST['data'];
include '../connect.php';

if($conn === false){
  die("ERROR database");
}
$sql = "select * from paziente_profile where fiscale ='".$search_fasical."'";
//$sql = "select * from paziente_profile where email ='".$user_search."' or fiscale ='".$user_search."' LIMIT 1";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
  echo json_encode("false");
}else{
  $sql1 = "select * from paziente_contact where fiscale ='".$search_fasical."'";
  $result1 = mysqli_query($conn, $sql1);
  if (mysqli_num_rows($result1) > 0) {
    echo json_encode("false");
  }else{
    echo json_encode("true");
  }
}
mysqli_close($conn);
exit();
?>