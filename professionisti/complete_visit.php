<?php
$pid = $_REQUEST["pid"];
$b = $_REQUEST["b"];
$d = $_REQUEST["d"];
$p = $_REQUEST["p"];

include '../connect.php';
        
if($conn === false){
    die("ERROR database");
}        

        $sql = "update bookings set doctor_booking_status = '1', payment_status='1', patient_confirmation='1' where patient_id = '".$pid."' and booking_id = '".$b."' or  booking_discount_id = '".$b."'";
				
		$result = mysqli_query($conn, $sql);

        //auth code
        $auth_sql = "select * from payments where date_of_booking='".$d."' and patient_id='".$pid."'";
        $auth_sql_result = mysqli_query($conn, $auth_sql);
        $auth_rows = mysqli_fetch_array($auth_sql_result);

        $auth_rows['authorization_id'];

        if(isset($auth_rows['authorization_id'])){
          $auth_code = "/pay/capture.php?authid=".$auth_rows['authorization_id']."&price=".$p;
        } else {
          $auth_code = "#";
        }
        

        header("location: $auth_code");
        mysqli_close($conn);
?>