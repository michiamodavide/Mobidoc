<?php
$q = $_REQUEST["q"];
$c = $_REQUEST["c"];

include '../connect.php';
        
if($conn === false){
    die("ERROR database");
}        

   $sql = "update bookings set doctor_booking_status = '1', payment_status='1', patient_confirmation='1' where patient_id = '".$q."' and booking_id = '".$c."' ";
    $result = mysqli_query($conn, $sql);
   if ($result == 1) {
     // sql to delete a record
     $sql22 = "DELETE FROM bookings where patient_id = '".$q."' and booking_status = 0";
     $result22 = mysqli_query($conn, $sql22);
    }else{
     echo 'Record not Update';
   }
		mysqli_close($conn);	

?>