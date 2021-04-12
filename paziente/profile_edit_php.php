<?php 	session_start();
		$_SESSION['paziente_email']=$_POST['email'];
		include '../connect.php';
		$email = $_SESSION['paziente_email'];
   $fname = mysqli_real_escape_string($conn, $_POST['first_name']);
		$lname = mysqli_real_escape_string($conn, $_POST['last_name']);
		$tel = mysqli_real_escape_string($conn, $_POST['tele']);
		$check = mysqli_real_escape_string($conn, $_POST['privacy_check']);

		$sql = "update contact_profile set name='".$fname."', surname='".$lname."', phone='".$tel."', privacy_consent='".$check."' where email='".$email."'";

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

		if(isset($_COOKIE["Booking_name"], $_COOKIE["Booking_id"], $_COOKIE["article_id"]) ){
			$booking_name = $_COOKIE["Booking_name"];		
			$doctor_id = $_COOKIE["Booking_id"];
      $article_id = $_COOKIE["article_id"];
			$link = "/checkout.php?book_visit=".$booking_name."&book_doctor=".$doctor_id."&article_id=".$article_id;
			header('Location: '.$link);
		} else {
			header("Location: account.php");
		}
?>