<?php
session_start();
$visit_idd = $_POST['visit_idd'];
$status_type = trim($_POST['status_type']);
$visit_status = $_POST['visit_status'];

include '../connect.php';

if($conn === false){
    die("ERROR database");
}

if ($status_type == 'home_visit'){
    $sql = "update articlesMobidoc set home = '".$visit_status."' where id='".$visit_idd."'";
}else{
    $sql = "update articlesMobidoc set tele = '".$visit_status."' where id='".$visit_idd."'";
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