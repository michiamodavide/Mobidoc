<?php
//$user_search = $_POST['data'];

include '../connect.php';

if($conn === false){
  die("ERROR database");
}


if ($_POST['search_type'] == 1){
  $search_lname = $_POST['search_value'];
  $sql = "select * from paziente_profile where last_name ='".$search_lname."'";
}else if ($_POST['search_type'] == 2){
  $search_id = $_POST['paziente_id'];
  $sql = "select * from paziente_profile where paziente_id ='".$search_id."'";
}else{
  $search_email = $_POST['search_value'];
  $sql = "select * from contact_profile where email ='".$search_email."'";
}

$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
//  $data_row = mysqli_fetch_array($result);
//  print_r(json_encode($data_row));
  $patients_data_array=array();

  if ($_POST['search_type'] != 3){
    while($row = mysqli_fetch_array($result)) {
      array_push($patients_data_array,
        [
          'paziente_id' => $row['paziente_id'],
          'fname' => $row['first_name'],
          'lname' => $row['last_name'],
          'fiscale' => $row['fiscale'],
          'dob' => date("m-d-Y", strtotime($row['dob'])),
          'address' => $row['address'],
          'lat_lang' => $row['latitude'].','.$row['longitude'],
          'gmap_address' => $row['gmap_address'],
          'contact_id' => $row['contact_id'],
        ]
      );
    }
  }

  if ($_POST['search_type'] == 2 || $_POST['search_type'] == 3){
    if ($_POST['search_type'] == 2){
      $sql_new1 = "select * from contact_profile where id ='".$_POST['contact_id']."'";
      $result_new1 = mysqli_query($conn, $sql_new1);
      $row_new1 = mysqli_fetch_array($result_new1);
    }else{
      $row_new1 = mysqli_fetch_array($result);
    }

    array_push($patients_data_array,
      [
        'contact_id' => $row_new1['id'],
        'contact_email' => $row_new1['email'],
        'contact_name' => $row_new1['name'],
        'contact_surname' => $row_new1['surname'],
        'contact_phone' => $row_new1['phone'],
      ]
    );
  }

    print_r(json_encode($patients_data_array));
}else{
  echo json_encode("true");
}
mysqli_close($conn);
exit();
?>