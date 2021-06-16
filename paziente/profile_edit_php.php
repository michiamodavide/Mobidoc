<?php session_start();
$_SESSION['paziente_email'] = $_POST['email'];
include '../connect.php';

$email = $_SESSION['paziente_email'];
$fname = mysqli_real_escape_string($conn, $_POST['first_name']);
$lname = mysqli_real_escape_string($conn, $_POST['last_name']);
$tel = mysqli_real_escape_string($conn, $_POST['tele']);

/*
$marketing_consent = 'N';
if (isset($_POST['marketing_consent']) && $_POST['marketing_consent'] == 'Y') {
    $marketing_consent = 'Y';
}
*/

date_default_timezone_set("Europe/Rome");
$marketing_consent_date = date("Y/m/d H:i:s");

$sql = "update contact_profile set name='" . $fname . "', surname='" . $lname . "', phone='" . $tel . "' where email='" . $email . "'";

$result = mysqli_query($conn, $sql);
if ($result == 1)
    echo "Record inserted1";
else {
    echo "Unable to insert record1";
    mysqli_close($conn);
}

/*$sql3 = "update doctor_register set tick = 1 where email = '".$email."' ";
$result = mysqli_query($conn, $sql3);*/

mysqli_close($conn);

header("Location: account.php");
?>