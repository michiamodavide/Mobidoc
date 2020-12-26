<?php
$search_fasical = $_POST['data'];
include '../connect.php';

if($conn === false){
  die("ERROR database");
}

$sql = "select * from paziente_profile where fiscale ='".$search_fasical."'";
$result = mysqli_query($conn, $sql);
mysqli_close($conn);

if (mysqli_num_rows($result) > 0) {
 echo "false";
}else{
  echo "true";
}
exit();
?>