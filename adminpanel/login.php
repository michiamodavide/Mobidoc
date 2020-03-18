<?PHP session_start(); ?>
<!DOCTYPE html>
<html data-wf-page="5dabf40665b2d900050bbba0" data-wf-site="5d8cfd454ebd737ac1a48727">
<head>
  <meta charset="utf-8">
  <title>Login</title>
  <meta content="Login" property="og:title">
  <meta content="width=device-width, initial-scale=1" name="viewport">
  <meta content="Webflow" name="generator">
  <link href="../css/normalize.css" rel="stylesheet" type="text/css">
  <link href="../css/webflow.css" rel="stylesheet" type="text/css">
  <link href="../css/mobidoc.webflow.css" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script>
  <script type="text/javascript">WebFont.load({  google: {    families: ["Montserrat:100,100italic,200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic","Poppins:100,100italic,200,300,300italic,regular,500,600,700,800,900","PT Serif Caption:regular"]  }});</script>
  <!-- [if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js" type="text/javascript"></script><![endif] -->
  <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script>
  <link href="../images/favicon.png" rel="shortcut icon" type="image/x-icon">
  <link href="../images/webclip.png" rel="apple-touch-icon">
  <script src="https://kit.fontawesome.com/3f12b8b553.js" crossorigin="anonymous"></script>
  <style>
::-webkit-scrollbar {
  width: 0px;
  height:0px;
}
	.p{
  	text-align-last: center !important;
  }
</style>
</head>
<body class="body-9">
  <div class="admin_container">
    <div class="admin_login_container"><a href="../"><img src="../images/256.svg" width="81" alt="" class="image-22"></a>
      <div>
        <h1 class="heading-21">Admin Panel</h1>
        <div class="text-block-67">v1.0</div>
      </div>
      <div class="admin_login_form">
        <div class="w-form">			
          <form id="email-form" name="email-form" data-name="Email Form" class="form-5" action="login.php" method="post">
            <input type="text" class="text-field-3 proff admin_login w-input" autofocus="true" maxlength="50" name="name" data-name="Name" placeholder="Username" id="name" required="">
            <input type="password" class="text-field-3 proff admin_login w-input" maxlength="50" name="password" data-name="Email" placeholder="Password" id="email" required="">
            <input type="submit" name="submit" value="Login" data-wait="Please wait..." class="button-5 admin_login_button w-button">
          </form>
        </div>
      </div>
    </div>
  </div>
  <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.4.1.min.220afd743d.js" type="text/javascript" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script src="../js/webflow.js" type="text/javascript"></script>
  <!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
  <div id="fb-root"></div>
  <script async="" defer="" crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v4.0"></script>
</body>
</html>

<?PHP
	if(isset($_POST['submit']))
	{
		include '../connect.php';
		$uname = mysqli_real_escape_string($conn, $_POST['name']);
		$pwd = mysqli_real_escape_string($conn, $_POST['password']);
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
			echo "<script> alert('La password o il nome utente sono errati.')</script>";
		}
	}
?>