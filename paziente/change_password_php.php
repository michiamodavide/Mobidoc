<?php 

  include '../connect.php';
  $pwrds = mysqli_real_escape_string($conn, $_POST['pwrd']);
  $pwrd = password_hash($pwrds, PASSWORD_DEFAULT);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $reset_code = mysqli_real_escape_string($conn, $_POST['reset_code']);
 
  $sql = "update paziente_profile set password = '".$pwrd."' where email = '".$email."'";
                      
  $result = mysqli_query($conn, $sql);
 
  if($result==1)
  {
    session_start();
    $_SESSION['paziente_email'] = $email;
    $sql2 = "update password_reset set reset_status = '1' where email = '".$email."' and reset_code = '".$reset_code."'";                      
    $result2 = mysqli_query($conn, $sql2);
    if($result2==1){
        echo "<script>window.location = 'account.php'</script>";
    }else {
        echo 'Error!';
    }    
  } else {
      echo 'Error!';
  }
  mysqli_close($conn);
?>