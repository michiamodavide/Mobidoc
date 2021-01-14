<?php
$booking_id = $_POST['booking_id'];
$payment_status = $_POST['payment_status'];
include '../connect.php';

if($conn === false){
  die("ERROR database");
}

$sql = "update bookings set admin_payment_status = ".$payment_status." where booking_id='".$booking_id."'";
$result = mysqli_query($conn, $sql);
mysqli_close($conn);

if ($result == 1) {
  echo "true";
}else{
  echo "false";
}
exit();
?>