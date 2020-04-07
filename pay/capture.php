<?php
	use PayPal\Rest\ApiContext;
	use PayPal\Auth\OAuthTokenCredential;

	session_start();


	$_SESSION['user_id'] = 1;

	require __DIR__ .'/PayPal-PHP-SDK/autoload.php';

	//Api
	$apiContext = new ApiContext(
		new OAuthTokenCredential(
			'AWpX5sJTYwSVuoRXOBvzSfhsZFosZ5isFsDQ-qi46o-Q-fcrzVgOQLPHMC9CYdJo6_K4seUZji8uYKux',     // ClientID
			'EOfdxk2Tlkxu9J_e6FjYLk9fraj18mkkdPo_kJtFll43XqJ4_asq2-P2Ra6mybSAfDKYrZ5kxRJKwE8G'      // ClientSecret
		)
	);

	$apiContext->setConfig(
		array(
			'mode' => 'live',
			'http.ConnectionTimeOut' => 30,
			'log.LogEnabled' => false,
			'log.FileName' => '',
			'log.LogLevel' => 'FINE',
			'validation.level' => 'log'
		)
	);

	use \PayPal\Api\Payer;
	use \PayPal\Api\Details;
	use \PayPal\Api\Amount;
	use \PayPal\Api\Capture;
	use \PayPal\Api\Transaction;
	use \PayPal\Api\Payment;
	use \PayPal\Api\PaymentExecution;
	use \PayPal\Api\Authorization;
	use \PayPal\Api\RedirectUrls;
	use \PayPal\Exception\PayPalConnectionException;

	try {
		// Set capture details
		$amt = new Amount();
		$amt->setCurrency("EUR")
			->setTotal($_GET['price']);

		// Capture authorization
		$capture = new Capture();
		$capture->setAmount($amt);

		$authorization = new Authorization();
		$authorization->setId($_GET['authid']);
		$getCapture = $authorization->capture($capture, $apiContext);
		print_r($getCapture);
		echo "you have been charged!";

		//custom stuff
		include '../connect.php';

		$sql2 = "update payments set capture_status='1' where authorization_id='".$_GET['authid']."' ";
		$result2 = mysqli_query($conn, $sql2);


		mysqli_close($conn);
			if($result2==1)
			{	
				header("location: ../professionisti/account.php");
            	echo "updated done";
			}
			else{
            	echo "Unable to insert record";
			}
		


	} catch (PayPal\Exception\PayPalConnectionException $ex) {
		echo $ex->getCode();
		echo $ex->getData();
		die($ex);
	} catch (Exception $ex) {
		die($ex);
	}

?>