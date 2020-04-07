<?PHP
	session_start();
	if(isset($_POST['submit']))
	{
		include '../connect.php';
		$uname = mysqli_real_escape_string($conn, $_POST['name']);
		$pwd = mysqli_real_escape_string($conn, $_POST['password']);
	
		if($conn === false){
			die("Ops! Connessione al database non riuscita.");
		}
		$temp = 0;
		$sql = "select * from admin";
		$result = mysqli_query($conn, $sql);
		
		while($rows = mysqli_fetch_array($result))
		{
			if($uname===$rows['username'] && $pwd===$rows['password'])
			{
				$temp = 1;
				$_SESSION["id"] = $rows['username'];
			}
		}
		mysqli_close($conn);
		if($temp)
		{
			header("Location: index.php"); 
		}
		else
		{
			echo "invalid username or password";
		}
	}
?>