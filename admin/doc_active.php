<?php
$user_permission = $_GET['a'];
$email = $_GET['email'];
include '../connect.php';
$sql = "update doctor_profile set active = '".$user_permission."' where email='".$email."'";
$result = mysqli_query($conn, $sql);
if ($result == 1) {
  header("Location: /admin/index.php");
} else {
  echo 'Dati non aggiornati correttamente.';
}
mysqli_close($conn);
?>
<br>


