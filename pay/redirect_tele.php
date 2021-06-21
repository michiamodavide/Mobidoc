<?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	use PayPal\Rest\ApiContext;
	use PayPal\Auth\OAuthTokenCredential;


	  $total_price = '10';
	  $booking_ids_array = array('2');

	require __DIR__ .'/PayPal-PHP-SDK/autoload.php';

	//Api
//	$apiContext = new ApiContext(
//		new OAuthTokenCredential(
//			'AWpX5sJTYwSVuoRXOBvzSfhsZFosZ5isFsDQ-qi46o-Q-fcrzVgOQLPHMC9CYdJo6_K4seUZji8uYKux',     // ClientID
//			'EOfdxk2Tlkxu9J_e6FjYLk9fraj18mkkdPo_kJtFll43XqJ4_asq2-P2Ra6mybSAfDKYrZ5kxRJKwE8G'      // ClientSecret
//		)
//	);

$apiContext = new ApiContext(
	new OAuthTokenCredential(
		'AXSLyRwfdDRhUw2WRRjf_pjrghe1WNFDGaVdi2gLu3L35tFpop6gSToqYnTTqPyK-kxP__P5FwvsNAPc',     // ClientID
		'EMO0MWKFEwDsFUQkR5jduOWdEhqjfOyuhrajCfQJM8wTKf2vPAaq0Mqv78GOfzjiBv4y_dHIQjqbfo1r'      // ClientSecret
	)
);

	$apiContext->setConfig(
		array(
			'mode' => 'sandbox',
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
	use \PayPal\Api\Transaction;
	use \PayPal\Api\Payment;
	use \PayPal\Api\RedirectUrls;
	use \PayPal\Exception\PayPalConnectionException;

	//require '../src/start.php';

	$payer = new Payer();
	$details = new Details();
	$amount = new Amount();
	$transaction = new Transaction();
	$payment = new Payment();
	$redirectUrls = new RedirectUrls();

	//Payer
	$payer->setPaymentMethod('paypal');

	//Details
	$details->setShipping('0.00')
		->setTax('0.00')
		->setSubtotal($total_price);

	//Amount
	$amount->setCurrency('EUR')
		->setTotal($total_price)
		->setDetails($details);

	//Transaction
	$transaction->setAmount($amount)
		->setDescription('Membeship');

	//Redirect URLs
	$redirectUrls->setReturnUrl('https://www.mobidoc.it/pay/auth_tele.php?approved=true&booking_id='.$booking_ids_array[0])
		->setCancelUrl('https://www.mobidoc.it/pay/auth_tele.php?approved=false');

	//Payment
	$payment->setIntent('authorize')
		->setPayer($payer)
		->setRedirectUrls($redirectUrls)
		->setTransactions(array($transaction));

	//$request = clone $payment;

	//try {
		$payment->create($apiContext);
		$redirectUrl = $payment->getApprovalLink();
		$auth_id = $payment->getId();
		//$_SESSION['auth'] = $auth_id;


echo $payment;
exit();
		//echo $redirectUrl;

		/*
	} catch (PayPal\Exception\PayPalConnectionException $ex) {
		echo $ex->getCode();
		echo $ex->getData();
		die($ex);
	} catch (Exception $ex) {
		die($ex);
		echo 'hello4';
	}
	*/
	/*header('Location: '. $redirectUrl);*/
?>
