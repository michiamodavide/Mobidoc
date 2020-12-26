<?php
$q = $_REQUEST["q"];
$c = $_REQUEST["c"];

include '../connect.php';
        
if($conn === false){
    die("ERROR database");
}        

   $sql = "update bookings set admin_book='2' where patient_id = '".$q."' and booking_id = '".$c."' ";
    $result = mysqli_query($conn, $sql);
   if ($result == 1) {
     // sql to delete a record
     $sql22 = "DELETE FROM bookings where patient_id = '".$q."' and admin_book = 1";
     $result22 = mysqli_query($conn, $sql22);
    }else{
     echo 'Record not Update';
   }
		mysqli_close($conn);	

?>