<?PHP
session_start();
$a = $_REQUEST["id"];
$b = $_REQUEST["pwrd"];

	
		include '../connect.php';
		$uname = $a;
		$pwd = $b;
		$temp = 0;
		$sql = "select * from admin";
		$result = mysqli_query($conn, $sql);
		
		

		while($rows = mysqli_fetch_array($result))
		{
			$pwrd_right = password_verify($pwd, $rows['password']);
			if($uname===$rows['username'] && $pwrd_right==1)
			{
                $temp = 1;
				$_SESSION["adminlogin"] = $uname;
			}
		}
		mysqli_close($conn);
		if($temp)
		{
            echo "Yes";
		}
		else
		{
			echo "<div class='wrong_details_error' style='display:block;'><div class='text-block-75'>La password o il nome utente sono errati.</div>";
        }
        
?>