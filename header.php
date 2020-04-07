<?php
	if(isset($_SESSION['paziente_email'])){
		$email=$_SESSION['paziente_email'];
		include 'connect.php';
		$sql = "select * from paziente_profile where email = '".$email."'";
		$result = mysqli_query($conn, $sql);
		$rows = mysqli_fetch_array($result);
		$photo = '/paziente/'.$rows['photo'];
		$fname = $rows['first_name'];
		$lname = $rows['last_name'];
		mysqli_close($conn);
	}
	else { 
	$photo = "https://d3e54v103j8qbb.cloudfront.net/plugins/Image/assets/placeholder.60f9b1840c.svg";
	}
?>
<header class="header header-2">
    <div class="custom_container header_nav_bar">
      <div class="navbar"><a href="/" class="w-inline-block w--current"><img src="/images/logo.svg" width="131" alt="" class="logo"></a>
        <div class="nav_menu_container"><img src="/images/Menu.svg" width="23" data-w-id="0dc1ea3e-5be5-9a68-d1a4-9e9f84da893d" alt="" class="menu-button">
          <nav role="navigation" data-w-id="0dc1ea3e-5be5-9a68-d1a4-9e9f84da893e" class="nav-menu w-nav-menu">
          <a href="/professionisti-home.php" class="nav-link mem w-nav-link">Area Professionisti</a>
            <a href="/visite-ed-esami.php" class="nav-link w-nav-link">Visite Ed Esami</a>
            <a href="/comuni-serviti.php" class="nav-link w-nav-link">Comuni Serviti</a>
            <a href="/team-mobidoc.php" class="nav-link w-nav-link">Chi Siamo</a>
            <a href="/contattaci.php" class="nav-link w-nav-link">Contattaci</a>
            
            
            <style>
              .user_doctor_image.login{
                border:none;
              }
              .login_register.login{
                background:rgba(255,255,255,0.2); 
                border-radius:30px; 
                padding-right:20px;
              }
            </style>

            <a href='/paziente/account.php' style='text-decoration:none; color:#fff;'>
            <div class="login_register">
              <div class="user_doctor_image">
              <?php if(isset($_SESSION['paziente_email'])){ ?>                
                  <div id="dp" class="user_doct_img" style="display:block; width:100%; height:100%; background: url('<?PHP echo $photo;?>'); background-position:center; background-size:cover;"></div>              
                </a>
              <?PHP } ?>
              </div>
              
              <?php
				        if(isset($_SESSION['paziente_email'])){ ?>
				        	<a href='/paziente/account.php' style='text-decoration:none; color:#fff;'><div class='doctor_user_name' style='display:block;'><?php echo $fname;?> <?php echo $lname;?></div></a>
                    
                  <script>
                    $(document).ready(function(){
                      $('.login_register').addClass('login');
                      $('.user_doctor_image').addClass('login');
                    });                   
                  </script>
               <?php }
			        	else { ?>              

              <div class="div-block-55">
                <a href="/paziente/login.php" class="link-block w-inline-block">
                  <div class="text-block-36">Login</div>
                </a>
                <div class="text-block-37">/</div>
                <a href="/paziente/register.php" class="link-block-2 w-inline-block">
                  <div class="text-block-38">Registrati</div>
                </a>
              </div>

              <?PHP } ?>

            </div>

          </nav>
        </div>
      </div>
    </div>
    <div class="w-embed">
      <style>
		.blur_backdrop{
    	backdrop-filter: blur(4px);
    }
</style>
    </div>
  </header>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
    var elements = document.getElementsByTagName("INPUT");
    for (var i = 0; i < elements.length; i++) {
        elements[i].oninvalid = function(e) {
            e.target.setCustomValidity("");
            if (!e.target.validity.valid) {
                e.target.setCustomValidity("Si prega di inserire le informazioni necessarie al proseguimento.");
            }
        };
        elements[i].oninput = function(e) { 
            e.target.setCustomValidity("");
        };
    }
});
  </script>