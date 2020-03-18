<?PHP
$b = $_REQUEST["b"];
	
		include '../connect.php';
        $id = $b;
        
		$sql = "update bookings set fattura = '1' where booking_id = '".$id."'";
		$result = mysqli_query($conn, $sql);
		mysqli_close($conn);
        
?>