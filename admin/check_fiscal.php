<?php
//$user_search = $_POST['data'];

include '../connect.php';

if($conn === false){
    die("ERROR database");
}


$fiscal_search = $_POST['data'];
$sql = "select * from paziente_profile where fiscale ='".$fiscal_search."'";

$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    $patients_data_array=array();

    $row = mysqli_fetch_array($result);
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


    $sql_new1 = "select * from contact_profile where id ='".$row['contact_id']."'";
    $result_new1 = mysqli_query($conn, $sql_new1);
    $row_new1 = mysqli_fetch_array($result_new1);

        array_push($patients_data_array,
            [
                'contact_id' => $row_new1['id'],
                'contact_email' => $row_new1['email'],
                'contact_name' => $row_new1['name'],
                'contact_surname' => $row_new1['surname'],
                'contact_phone' => $row_new1['phone'],
            ]
        );


    print_r(json_encode($patients_data_array));
}else{
    echo json_encode("true");
}
mysqli_close($conn);
exit();
?>
<?php
/*
$search_fasical = $_POST['data'];
include '../connect.php';

if($conn === false){
  die("ERROR database");
}
$sql = "select * from paziente_profile where fiscale ='".$search_fasical."'";
//$sql = "select * from paziente_profile where email ='".$user_search."' or fiscale ='".$user_search."' LIMIT 1";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
  $data_row = mysqli_fetch_array($result);
  print_r(json_encode($data_row));
}else{
  echo json_encode("true");
}
mysqli_close($conn);
exit();
*/
?>