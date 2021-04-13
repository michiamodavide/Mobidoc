<?php
include '../connect.php';
if(isset($_POST['submit'])){

  $fiscal = mysqli_real_escape_string($conn, $_POST['fiscal_code']);

  $sql_temp = "select * from paziente_profile where fiscale ='".$fiscal."'";
  $result_temp = mysqli_query($conn, $sql_temp);
  $fesic_code = 0;
  if (mysqli_num_rows($result_temp) > 0) {
    $fesic_code = 1;
  }

  $contact_id = mysqli_real_escape_string($conn, $_POST['contact_id']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
  $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
  $date_of_birth = mysqli_real_escape_string($conn, $_POST['dob']);
  $dob = '';
  if ($date_of_birth){
    $dob=strtotime($date_of_birth);
    $dob = date('Y/m/d', $dob);
  }
  $address = $_POST['address'];
  $gmap_addr = mysqli_real_escape_string($conn, $_POST['gmap_addr']);
  $lat_lang = explode(',', mysqli_real_escape_string($conn, $_POST['lat_log']));
  $latitude = $lat_lang[0];
  $long = $lat_lang[1];

  date_default_timezone_set("Europe/Rome");
  $dor = date("Y/m/d H:i:s");

  if ($fesic_code == 1 && !empty($fiscal) || isset($_POST['patient_id'])) {
    if ($fesic_code == 1){
      $sql = "update paziente_profile set first_name = '" . $first_name . "', last_name = '" . $last_name . "', fiscale = '" . $fiscal . "', dor = '" . $dor . "', dob = '" . $dob . "', email = '" . $email . "', address = '" . $address . "', gmap_address = '" . $gmap_addr . "', latitude = '" . $latitude . "', longitude = '" . $long . "' where  fiscale='" . $fiscal . "'";
    }else{
      $sql = "update paziente_profile set first_name = '" . $first_name . "', last_name = '" . $last_name . "', fiscale = '" . $fiscal . "', dor = '" . $dor . "', dob = '" . $dob . "', email = '" . $email . "', address = '" . $address . "', gmap_address = '" . $gmap_addr . "', latitude = '" . $latitude . "', longitude = '" . $long . "' where  paziente_id='" . $_POST['patient_id'] . "'";
    }
  } else {
    $sql = "insert into paziente_profile (contact_id, first_name, last_name, dob, fiscale, address, email, dor, gmap_address, latitude, longitude) values('".$contact_id."', '".ucwords($first_name)."', '".ucwords($last_name)."', '".$dob."', '".$fiscal."', '".$address."', '".$email."', '".$dor."', '".$gmap_addr."', '".$latitude."', '".$long."')";
  }


  $result = mysqli_query($conn, $sql);
  if ($result == 1) {
    header("location: /paziente/account.php");
  } else {
    echo 'There is some error in Database Connection';
  }


  mysqli_close($conn);

}
?>