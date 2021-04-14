<?php session_start();

	if(isset($_POST['submit']))
	{


		$_SESSION['doctor_email']=$_POST['email'];
		include '../connect.php';
		$email = $_SESSION['doctor_email'];
		$doctor_id = $_POST['doctor-id'];
		$fname = $_POST['nome'];
		$lname = $_POST['cognome'];
		$passwords = mysqli_real_escape_string($conn, $_POST['pwrds']);
		$password = password_hash($passwords, PASSWORD_DEFAULT);
		$dob = mysqli_real_escape_string($conn, $_POST['dob']);
		$dob=strtotime($dob);
		$dob = date('Y/m/d', $dob);
		$fiscal = mysqli_real_escape_string($conn, $_POST['fiscal_code']);
		$vat = mysqli_real_escape_string($conn, $_POST['vat_number']);
		/*$title = mysqli_real_escape_string($conn, $_POST['title']);
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
		$checkbox = 'Y';

		$b = explode("@",$email);

		$profile_img = "photo/default.jpg";

		if($_FILES["upload-image"]["error"] != 0) {
			$photo = $profile_img;
		} else {
			$imageFileType = pathinfo($_FILES["upload-image"]["name"],PATHINFO_EXTENSION);
			$photo = "photo/".$b[0].".".$imageFileType;
		}


		date_default_timezone_set("Europe/Rome");
		$dor = date("Y/m/d");

    $sql = "update doctor_profile set fname = '".$fname."', lname= '".$lname."', password= '".$password."', dob= '".$dob."', photo= '".$photo."', fiscale= '".strtoupper($fiscal)."', vat_number= '".$vat."', profile_description= '".$profile_description."', phone= '".$tel."', street_name= '".$street_name."', street_no= '".$street_no."', comune= '".$comune."' , province= '".$province."', cap= '".$cap."', deontological_consent= '".$checkbox."', deontologicalAcceptDate= '".$dor."', dor= '".$dor."' where email='".$email."'";

		move_uploaded_file($_FILES["upload-image"]["tmp_name"], $photo);

		$result = mysqli_query($conn, $sql);
		if($result==1)
			echo "Record inserted1";
		else{
			echo "Unable to insert record1";
			mysqli_close($conn);
		}

		$i=0;
		for($i=1;$i<=100;$i++)
		{
			$c1='cap'.$i;

			if(isset($_POST[$c1])){
				$c2 = mysqli_real_escape_string($conn, $_POST[$c1]);
				$c3 = strpos($c2, "(");
				$c4 = substr($c2, 0, $c3-1);
				$c5 = substr($c2, $c3+1, 2);
				$c6 = substr($c2, $c3+6, 5);
				$sql2 = "insert into doctor_cap (doctor_id, comune, province, cap) values('".$doctor_id."', '".$c4."', '".$c5."', '".$c6."')";
				$result = mysqli_query($conn, $sql2);
				if($result==1)
					echo "Record inserted2";
				else
					echo "Unable to insert record2";
			}
		}

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
					echo "Record inserted3";
				else
					echo "Unable to insert record3";
			}
		}

    $sql3_new = "insert into doctor_specialty (doctor_id, specialty) values('".$doctor_id."','".$_POST['doc_spaciality']."')";
    $result3_new = mysqli_query($conn, $sql3_new);
    if($result==1) {
      echo "Record inserted45";
    }else {
      echo "Unable to insert record45";
    }

    $sql3 = "update doctor_register set tick = 1 where id = '".$doctor_id."' ";
		$result = mysqli_query($conn, $sql3);

		mysqli_close($conn);
	}

	//header("location: application-sucessful.php");
	$to = 'info@mobidoc.it';
	$subject = 'Nuovo Professionista';
	$from = 'mobidoc_update@mobidoc.it';
  $rply_email = 'noreplay@mobidoc.it';

	// To send HTML mail, the Content-type header must be set
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

	// Create email headers
	$headers .= 'From: '.$from."\r\n". 'Reply-To: '.$rply_email."\r\n" .   'X-Mailer: PHP/' . phpversion();

	// Compose a simple HTML email message
	$message = '<!DOCTYPE html><html data-wf-page="5dcd852d5095d024f8ea51ae" data-wf-site="5dcd852d5095d04927ea51ad"><head><meta charset="utf-8"><meta content="width=device-width, initial-scale=1" name="viewport"><meta content="Webflow" name="generator"><style>.header{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;width:100%;height:180px;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;-webkit-box-align:center;-webkit-align-items:center;-ms-flex-align:center;align-items:center;background-image:url("https://www.mobidoc.it/images/mailer_header.png");background-position:50% 50%, 50% 0%;background-size:100%,cover;background-repeat:no-repeat,repeat}.text_container{width:80%;min-height:150px;margin-top:70px;margin-right:auto;margin-left:auto}.button{margin:20px 20px 20px 0px;padding:16px 34px;border-radius:50px;background-color:#00285c}.text-block{margin-top:10px;font-size:16px}.text-block.italic{margin-top:28px;font-style:italic;font-weight:300}.body{font-family:Poppins,sans-serif;color:#00285c}.heading{margin-bottom:23px}.name{width:auto}a{text-decoration:none;color:#fff}</style> <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script> <script type="text/javascript">WebFont.load({google:{families:["Poppins:300,regular,italic,600"]}});</script> <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script> </head><body class="body"><div class="header"></div><div class="text_container"><h4 class="heading">Nuovo Professionista!</h4><div class="text-block">'.$fname.' '.$lname.' Ha creato con successo il suo profilo il '.$dor.' . Clicca sul bottone sottostante per vedere il suo profilo.</div> <br> <br><a href="https://mobidoc.it/team-mobidoc.php" class="button" style="margin-top:100px;">Visualizza profilo</a></div></body></html>';


	mail($to, $subject, $message, $headers);

	echo "<script>window.location = 'application-sucessful.php'</script>";

	header("Location: account.php");
?>
