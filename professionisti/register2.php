<?PHP
	if(isset($_POST['submit']))
	{
		include '../connect.php';
		$fname = mysqli_real_escape_string($conn, $_POST['Name']);
		$lname = mysqli_real_escape_string($conn, $_POST['Cognome']);
		$email = mysqli_real_escape_string($conn, $_POST['pwrd']);
		
		$b = explode("@",$email);
		$imageFileType = pathinfo($_FILES["cv"]["name"],PATHINFO_EXTENSION);

		$cv = "cv/".$b[0]."_cv.".$imageFileType;
		
		date_default_timezone_set("Europe/Rome");
		$dor = date("Y/m/d");
	
		$sql = "insert into doctor_register (name, cogname, email, cv, dor) values('".$fname."', '".$lname."', '".$email."', '".$cv."', '".$dor."')";
		move_uploaded_file($_FILES["cv"]["tmp_name"], $cv);
		
		$result = mysqli_query($conn, $sql);
		mysqli_close($conn);
		if($result==1)
		{
			header("location: application-sucessful.php");
		}
		else
			echo "Unable to insert record";
	}
?>