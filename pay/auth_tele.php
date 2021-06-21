<?php
	use PayPal\Rest\ApiContext;
	use PayPal\Auth\OAuthTokenCredential;

	echo $_GET['approved'];

	if($_GET['approved'] == 'false'){
		header('Location: ../paziente/booking-error.php');
	}

	//$price = $_SESSION['price'];

require __DIR__ .'/PayPal-PHP-SDK/autoload.php';

	//Api
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
	use \PayPal\Api\PaymentExecution;
	use \PayPal\Api\RedirectUrls;
	use \PayPal\Exception\PayPalConnectionException;

	// Get payment object by passing paymentId
	$paymentId = $_GET['paymentId'];
	$payment = Payment::get($paymentId, $apiContext);

// Execute payment with payer id
	$execution = new PaymentExecution();
	$execution->setPayerId($_GET['PayerID']);

	try {
		// Execute payment
		$result = $payment->execute($execution, $apiContext);

		// Extract authorization id
		$authid = $payment->transactions[0]->related_resources[0]->authorization->id;

//custom stuff

		$booking_id = $_GET['booking_id'];
		include '../connect.php';


		$sql4 = "select patient_id, date_of_booking from bookings where booking_id='".$booking_id."'";
		$result4 = mysqli_query($conn, $sql4);

		$rows4 = mysqli_fetch_array($result4);
		$patient_id = $rows4['patient_id'];
		$date_of_booking = date("d/m/Y H:i:s", strtotime($rows4['date_of_booking']));
		$sql2 = "insert into payments (date_of_booking, patient_id, authorization_id, payment_status, capture_status) values('".$date_of_booking."', '".$patient_id."', '".$authid."', '1', '0')";
		$result2 = mysqli_query($conn, $sql2);

		if($result2==1) {
			header("location: /paziente/booking-completed.php");
		}else{
			echo 'payment not saved';
			exit();
		}

	} catch (PayPal\Exception\PayPalConnectionException $ex) {
		echo $ex->getCode();
		echo $ex->getData();
		die($ex);
	} catch (Exception $ex) {
		die($ex);
	}	

	
?>
