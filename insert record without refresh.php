<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<script src="https://www.ankitweblogic.com/js/jquery-3.1.1.min.js"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script>
$(document).ready(function(){
$('#myModal').on('hidden.bs.modal', function (e) {
  //window.location ='aa2.php';
  window.location = location.href;
})
});
</script>
<body>
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <p>Some text in the modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

<div style="height: 200px; background: red;">
</div>
<form action="" method="post">
	<input type="text" name="name" required>
	<button name="submit">submit</button>
</form>
<?PHP
	if(isset($_POST['submit']))
	{
		$conn = mysqli_connect("localhost", "root", "", "test");
		if($conn === false){
			die("ERROR: Could not connect to database.");
		}
		$name = $_POST['name'];
	
		$sql = "insert into table1 (name) values('".$name."')";
		$result = mysqli_query($conn, $sql);
		mysqli_close($conn);
		if($result==1)
		{
			//echo "<script> alert('Record inserted, please wait for verify.');
			echo "<script>
			$(document).ready(function(){
				$('#myModal').modal('show');
				//alert('heehe');
			});
			//setTimeout(function(){ window.location ='aa2.php'; }, 300);
			</script>";
			//header("location: aa2.php");
		}
		else
			echo "Unable to insert record";
	}
?>