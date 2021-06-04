<?php

$contact_id = $_POST['contact_id'];
$checkbox_val = $_POST['checkbox_val'];
$checkbox_id = $_POST['checkbox_id'];
include '../connect.php';

if($conn === false){
    die("ERROR database");
}

date_default_timezone_set("Europe/Rome");
$consent_date = date("Y/m/d H:i:s");

if ($checkbox_id == 'privacy_consent'){
    $sql = "update contact_profile set privacy_consent = '".$checkbox_val."', lastDatePrivacyConsent = '".$consent_date."' where id='".$contact_id."'";
}else{
    $sql = "update contact_profile set marketing_consent = '".$checkbox_val."', lastDateMarketingConsent = '".$consent_date."' where id='".$contact_id."'";
}

$result = mysqli_query($conn, $sql);
mysqli_close($conn);

if ($result == 1) {
    echo "true";
}else{
    echo "false";
}
exit();
?>