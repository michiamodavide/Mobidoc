<?php 	session_start();
		$_SESSION['paziente_email']=$_POST['email'];
		include '../connect.php';
		$email = $_SESSION['paziente_email'];
		$dob = mysqli_real_escape_string($conn, $_POST['dob']);
		$dob=strtotime($dob);
		$dob = date('Y/m/d', $dob);
		$fiscal = mysqli_real_escape_string($conn, $_POST['fiscal_code']);
		$lname = mysqli_real_escape_string($conn, $_POST['last_name']);
		$fname = mysqli_real_escape_string($conn, $_POST['first_name']);
		$tel = mysqli_real_escape_string($conn, $_POST['tele']);
		$via = mysqli_real_escape_string($conn, $_POST['Via']);
		$civico = mysqli_real_escape_string($conn, $_POST['civico']);
		$select_comun = mysqli_real_escape_string($conn, $_POST['select_comun']);
		$check = mysqli_real_escape_string($conn, $_POST['privacy_check']);
		$pos = strpos($select_comun, "(");
		$comune = substr($select_comun,0,$pos-1);
		$province = substr($select_comun,$pos+1,2);
		$cap = substr($select_comun,$pos+6,5);
		
		$b = explode("@",$email);

		$sql4 = "select photo from paziente_profile where email = '$email'";		
			
		$result4 = mysqli_query($conn, $sql4);
		$rows4 = mysqli_fetch_array($result4);
		$profile_img = $rows4['photo'];

		if($_FILES["upload-image"]["error"] != 0) {
			$photo = $profile_img;
		} else {
			$imageFileType = pathinfo($_FILES["upload-image"]["name"],PATHINFO_EXTENSION);			
			$photo = "photo/".$b[0].".".$imageFileType;
			echo $photo;
		}

		$sql = "update paziente_profile set dob='".$dob."', first_name='".$fname."', last_name='".$lname."', photo='".$photo."', fiscale='".$fiscal."', phone='".$tel."', via='".$via."', civico='".$civico."', comune='".$comune."', province='".$province."', cap='".$cap."', privacy_consent='".$check."' where email='".$email."'";
		
		move_uploaded_file($_FILES["upload-image"]["tmp_name"], $photo);
	
		$result = mysqli_query($conn, $sql);
		if($result==1)
			echo "Record inserted1";
		else{
			echo "Unable to insert record1"; 
			mysqli_close($conn);
		}
		
		/*$sql3 = "update doctor_register set tick = 1 where email = '".$email."' ";
		$result = mysqli_query($conn, $sql3);*/

		mysqli_close($conn);

		if(isset($_COOKIE["Booking_name"], $_COOKIE["Booking_id"]) ){	
			$booking_name = $_COOKIE["Booking_name"];		
			$doctor_id = $_COOKIE["Booking_id"];		
			$link = "/checkout.php?book_visit=".$booking_name."&book_doctor=".$doctor_id;
			header('Location: '.$link);
		} else {
			header("Location: account.php");
		}
?>