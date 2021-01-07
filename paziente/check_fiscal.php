<?php
$user_search = $_POST['data'];
include '../connect.php';

if($conn === false){
  die("ERROR database");
}
//$sql = "select * from paziente_profile where fiscale ='".$search_fasical."'";
$sql = "select * from paziente_profile where email ='".$user_search."' or fiscale ='".$user_search."' LIMIT 1";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
  $data_row = mysqli_fetch_array($result);
  print_r(json_encode($data_row));
}else{
  echo json_encode("true");
}
mysqli_close($conn);
exit();
?>