
<?php
	$a= $_POST['dob'];

		$date = strtotime($a);
		
		$date = date('Y/m/d', $date);
		//echo $date;
		//echo '2011/05/21';
//echo date('d/M/Y H:i:s', $date);

		
		
		
if(isset($_POST['submit']))
	{
		include '../connect.php';
		$select_comun = mysqli_real_escape_string($conn, $_POST['select_comun']);
		echo $select_comun;
		$pos = strpos($select_comun, "(");
		$comune = substr($select_comun,0,$pos-2);
		$province = substr($select_comun,$pos+1,2);
		$cap = substr($select_comun,$pos+6,5);
	
		$sql = "insert into doctor_profile (dob,comune, province, cap ) values( '".$date."', '".$comune."', '".$province."','".$cap."')";
		
		
	
		$result = mysqli_query($conn, $sql);
	
		if($result==1)
			echo "Record inserted";
		else{
			echo "Unable to insert record"; 
			mysqli_close($conn);
		}
		
		
		//mysqli_close($conn);
	}
	

	
?>
