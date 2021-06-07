<?php
$booking_id = $_GET['bkg_id'];
$booking_flag = $_GET['booking_flag'];

include 'connect.php';

if($conn === false){
    die("ERROR database");
}

$sql = "update bookings set booking_status = ".$booking_flag." where booking_id='".$booking_id."'";
$result = mysqli_query($conn, $sql);
mysqli_close($conn);

if ($result == 1) {

    if (isset($_GET['admin']) && $_GET['admin'] == 1){
        header("Location: /admin/booking.php");
    }else{
        header("Location: /professionisti/account.php");
    }
}else{
    echo "false";
}
exit();
?>