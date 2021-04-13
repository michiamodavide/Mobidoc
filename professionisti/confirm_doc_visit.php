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

     $sql222 = "select * from bookings where patient_id = '".$q."' and admin_book = 1";
     $result222 = mysqli_query($conn, $sql222);

     while ($rows222 = mysqli_fetch_array($result222)) {
       $sql22 = "DELETE FROM bookings where booking_id = '".$rows222['booking_id']."'";
       $result22 = mysqli_query($conn, $sql22);

       if ($result22 == 1){

         $sql223 = "DELETE FROM booked_service where booking_id = '".$rows222['booking_id']."'";
         $result223 = mysqli_query($conn, $sql223);

         if ($result223 ==1){
//           not show anything
         }else{
           echo 'Record1 not deleted';
         }

       }else{
         echo 'Record not deleted';
       }
     }

    }else{
     echo 'Record not Update';
   }
		mysqli_close($conn);	

?>