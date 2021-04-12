<?php
//$user_search = $_POST['data'];
$search_lname = $_POST['lname'];
include '../connect.php';

if($conn === false){
  die("ERROR database");
}
$sql = "select * from paziente_profile where last_name ='".$search_lname."'";
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