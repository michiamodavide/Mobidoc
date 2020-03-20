<?php
	if(isset($_SESSION['doctor_email'])){
		$email=$_SESSION['doctor_email'];
		include 'connect.php';
		$sql = "select * from doctor_profile where email = '".$email."'";
		$result = mysqli_query($conn, $sql);
		$rows = mysqli_fetch_array($result);
		$doctor_id_link = "/il-team/professionista.php?".$rows['doctor_id'];
		$photo = "/professionisti/".$rows['photo'];
		$fname = $rows['fname'];
		$lname = $rows['lname'];
		$title = $rows['title'];
		mysqli_close($conn);
	}
	else { 
	$photo = "https://d3e54v103j8qbb.cloudfront.net/plugins/Image/assets/placeholder.60f9b1840c.svg";
	$fname = "";
	$lname = "";
	$title = "";
	}
?>

<div class="header">
    <div class="custom_container header_nav_bar">
      <div class="navbar"><a href="/" class="w-inline-block"><img src="/images/logo.svg" alt="" class="logo"></a>
        <div class="nav_menu_container">
          <div class="nav-menu diff">

            <div class="login_register doct">
			<a href='/professionisti/account.php' style='text-decoration:none; color:#fff;'>
              <div class="user_doctor_image">
			  <?php if(isset($_SESSION['doctor_email'])){ ?>
			  	<a href='/professionisti/account.php' style='text-decoration:none; color:#fff;'>
			  		<div class="user_doct_img" style="display:block; width:100%; height:100%; background: url('<?PHP echo $photo;?>'); background-position:center; background-size:cover;"></div> 
				</a>
			  <?PHP }?>
			  </div>
              <?php
				if(isset($_SESSION['doctor_email'])){ 
					echo "<a href='/professionisti/account.php' style='text-decoration:none; color:#fff;'><div class='doctor_user_name' style='display:block;'>$fname $lname</div></a>";
				}
				else { ?>
					<a href="/professionisti/login.php" class="link-block w-inline-block">
                		<div class="text-block-36">Login</div>
              		</a>
              
			<?PHP } ?>						  
            </div> </a>
          </div>
		  <a href="/professionisti-home.php" class="link-block w-inline-block back"><img src="/images/back_indietro.svg" width="8px"> &nbsp; Indietro</a>
		  <style>
  		  .link-block.w-inline-block.back{
		  	  display:none;
  		  }
		  	@media (max-width: 479px) {
		  		.login_register{
		  			display:none;
		  		}
		  		.link-block.w-inline-block.back{
					display:inline;
					width:200px;
  		  		}
		  	}
  		  </style>
        </div>
      </div>
    </div>
  </div>


  
