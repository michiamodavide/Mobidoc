<?php session_start();	
	if(isset($_POST['submit']))
	{


	  include '../connect.php';
		$email = $_SESSION['doctor_email'];
		$doctor_id = $_POST['doctor-id'];
		$fname = $_POST['nome'];
		$lname = $_POST['cognome'];
		$dob = mysqli_real_escape_string($conn, $_POST['dob']);
		$dob=strtotime($dob);
		$dob = date('Y/m/d', $dob);
		$fiscal = mysqli_real_escape_string($conn, $_POST['fiscal_code']);
		$vat = mysqli_real_escape_string($conn, $_POST['vat_number']);
	/*	$title = mysqli_real_escape_string($conn, $_POST['title']);
	 	$p_type = mysqli_real_escape_string($conn, $_POST['p_type']);
		$description = mysqli_real_escape_string($conn, $_POST['personal_description']);
			$education = mysqli_real_escape_string($conn, $_POST['personal_description-3']);
		$experience = mysqli_real_escape_string($conn, $_POST['personal_description-2']);
	*/

    $profile_description = mysqli_real_escape_string($conn, $_POST['p_description']);
		$tel = mysqli_real_escape_string($conn, $_POST['tele']);
		$street_name = mysqli_real_escape_string($conn, $_POST['Via']);
		$street_no = mysqli_real_escape_string($conn, $_POST['Civico']);
		$select_comun = mysqli_real_escape_string($conn, $_POST['select_comun']);
		$pos = strpos($select_comun, "(");
		$comune = substr($select_comun,0,$pos-1);
		$province = substr($select_comun,$pos+1,2);
		$cap = substr($select_comun,$pos+6,5);

		$b = explode("@",$email);
		
		$sql = "select photo from doctor_profile where email = '$email'";		
			
		$result = mysqli_query($conn, $sql);
		$rows = mysqli_fetch_array($result);
		$profile_img = $rows['photo'];

        $marketing_consent = 'N';
        if (isset($_POST['marketing_consent']) && $_POST['marketing_consent'] == 'Y') {
            $marketing_consent = 'Y';
        }
		
		if($_FILES["upload-image"]["error"] != 0) {
			$photo = $profile_img;
		} else {
			$imageFileType = pathinfo($_FILES["upload-image"]["name"],PATHINFO_EXTENSION);
			$photo = "photo/".$b[0].".".$imageFileType;
		}


		//echo $photo;
		date_default_timezone_set("Europe/Rome");
		$dor = date("Y/m/d H:i:s");
		
		$sql = "update doctor_profile set fname='$fname', lname='$lname', dob='$dob', photo='$photo', fiscale='$fiscal', vat_number='$vat', description='$profile_description', phone='$tel', street_name='$street_name', street_no='$street_no', comune='$comune', province='$province', cap='$cap', dor='$dor', lastDatePrivacyConsent='$dor', marketing_consent='$marketing_consent', lastDateMarketingConsent='$dor' where email = '$email'";
		
		move_uploaded_file($_FILES["upload-image"]["tmp_name"], $photo);
	
		$result = mysqli_query($conn, $sql);
		if($result==1)
			echo " ";//"Record inserted1";
		else{
			echo "Unable to insert record1"; 
			mysqli_close($conn);
		}
		
		$sql = "delete from doctor_cap where doctor_id='$doctor_id'";
		$result = mysqli_query($conn, $sql);
		
		$i=0;
		for($i=1;$i<=100;$i++)
		{
			$c1='db_cap'.$i;
			if(isset($_POST[$c1])){
				$c2 = mysqli_real_escape_string($conn, $_POST[$c1]);
				$c3 = strpos($c2, "(");
				$c4 = substr($c2, 0, $c3-1);
				$c5 = substr($c2, $c3+1, 2);
				$c6 = substr($c2, $c3+6, 5);
				$sql2 = "insert into doctor_cap (doctor_id, comune, province, cap) values('".$doctor_id."','".$c4."', '".$c5."', '".$c6."')";
				
				$result = mysqli_query($conn, $sql2);
				if($result==1)
					echo " ";//"Record dp cap inserted1";
				else
					echo "Unable to insert record2"; 
			}
		}
		for($i=1;$i<=100;$i++)
		{
			$c1='cap'.$i;
			
			if(isset($_POST[$c1])){
				$c2 = mysqli_real_escape_string($conn, $_POST[$c1]);
				$c3 = strpos($c2, "(");
				$c4 = substr($c2, 0, $c3-1);
				$c5 = substr($c2, $c3+1, 2);
				$c6 = substr($c2, $c3+6, 5);
        $sql2 = "insert into doctor_cap (doctor_id, comune, province, cap) values('".$doctor_id."','".$c4."', '".$c5."', '".$c6."')";

				$result = mysqli_query($conn, $sql2);
				if($result==1)
					echo " ";//"Record cap inserted2";
				else
					echo "Unable to insert record2"; 
			}
		}
		
	/*
		$sql = "delete from listini where doctor_id='$doctor_id'";
		$result = mysqli_query($conn, $sql);
		$i=0;
		for($i=1;$i<=100;$i++)
		{
			$v1='service_name'.$i;
			$v2='service_price'.$i;
      $v5='service_price_tel'.$i;
			if(isset($_POST[$v1])){
				$v3 = mysqli_real_escape_string($conn, $_POST[$v1]);
				$v4 = mysqli_real_escape_string($conn, $_POST[$v2]);
        $v6 = '0.0';
        if ($v5 >=1){
          $v6 = mysqli_real_escape_string($conn, $_POST[$v5]);
        }
        $sql3 = "insert into listini (doctor_id, article_mobidoc_id, visit_home_price, visit_tele_price) values('".$doctor_id."','".$v3."', '".$v4."', '".$v6."')";

        $result = mysqli_query($conn, $sql3);
				if($result==1)
					echo " ";//"Record inserted3";
				else
					echo "Unable to insert record3";
			}
		}

		for($i=1;$i<=100;$i++)
		{
			$v11='service_name_pre'.$i;
			$v21='service_price_pre'.$i;
      $v51='service_price_pre_tele'.$i;
			if(isset($_POST[$v11])){
				$v31 = mysqli_real_escape_string($conn, $_POST[$v11]);
				$v41 = mysqli_real_escape_string($conn, $_POST[$v21]);
				$v61 = '0.0';
        if ($v51 >=1){
          $v61 = mysqli_real_escape_string($conn, $_POST[$v51]);
        }
        $sql31 = "insert into listini (doctor_id, article_mobidoc_id, visit_home_price, visit_tele_price) values('".$doctor_id."','".$v31."', '".$v41."', '".$v61."')";

				$result1 = mysqli_query($conn, $sql31);
				if($result1==1){
					echo " ";//"Record inserted3";
					echo "<script>alert('Il profilo è stato aggiornato con successo. Verrà ora indirizzato al suo account.'); window.location = 'account.php';</script>";
				}else{
					echo "Unable to insert record3";
				}
			}
		}
	*/
		mysqli_close($conn);
	}
	
	echo "<script>alert('Il suo profilo è stato aggiornato con successo. Sarà ora reindirizzato al suo account.');</script>";
	echo "<script>window.location = 'account.php'</script>";
	//header("Location: account.php");
?>