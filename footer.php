<style>@media screen and (max-width: 767px){.whats-app-btn{display: none;}}</style>
<footer class="footer">
    <div class="custom_container footer_section">
      <div class="foofter_flex one">
        <div class="div-block-7">
          <div>
            <h4 class="heading-3">mobidoc</h4>
            <?php
           /*
           <div class="detail"><img src="/images/Subtraction-3.svg" alt="" class="image-3">
              <div class="text-block-6">Via Bellaria 6,<br>44121 Ferrara</div>
            </div>
           */
           ?>
            <div class="detail"><img src="/images/phone-solid.svg" alt="" class="image-3">
              <div class="text-block-6">335 779 88 44</div>
            </div>
            <div class="detail"><img src="/images/envelope-solid-1.svg" alt="" class="image-3">
              <div class="text-block-6"><a href="mailto:info@mobidoc.it" class="link">info@mobidoc.it</a></div>
            </div>
          </div><a href="tel:3357798844" class="button stroked foot w-button">Chiamaci</a></div>
      </div>
      <div class="foofter_flex two">
        <div class="div-block-6">
          <h4 class="heading-3">visite ed esami</h4>
          <div class="services_list_footer">

          <?php
        include 'connect.php';
        
        if($conn === false){
          die("ERROR database");
        }
        $sql = "select * from visit order by visit_type_name_count";
        $result = mysqli_query($conn, $sql);
        $visits_count = 0;

        while($rows = mysqli_fetch_array($result)){
        $visit_name = $rows['visit_name'];
        $link = $rows['link'];  
        $sql2 = "select * from visit_type INNER JOIN doctor_visit on visit_type.visit_type_name = doctor_visit.visit_name where visit_type.visit_name='".$visit_name."'";
        $result2 = mysqli_query($conn, $sql2);
        $row_count = mysqli_num_rows($result2);
        $visits_count += 1;
        if($row_count){
          if($visits_count <= 10) {
        ?>
          <a href="<?php echo $link;?>" targe="_blank" style="color:#fff; text-decoration:none;">
          <div style="margin-bottom: 10px;">

            <?php 
            switch ($visit_name) {
              case "Medicina Interna e Geriatria":
                  echo "Medicina Interna";
                  break;
              case "Psicologia e Psicoterapia":
                  echo "Psicologia";
                  break;
              case "Ecografia ed Ecocolordoppler":
                  echo "Ecografia";
                  break;
              case "Assistenza Infermieristica":
                  echo "Assistenza";
                  break;
              default:
                  echo $visit_name;
            }
            ?>
          
          </div></a>
        <?php }}  } mysqli_close($conn);?> 

          </div>
          <div class="div-block-4"><a href="/visite-ed-esami.php" class="button stroked foot _0dd w-button">Prenota Online</a></div>
        </div>
      </div>
      <div id="w-node-c2a4db51dd73-0687e8d9" class="foofter_flex three">
        <div class="div-block-3">
          <h4 class="heading-3">chi siamo</h4>
          <p class="paragraph-5"><em class="italic-text-2">Mobidoc è un servizio di visite ed esami a domicilio disponibile per le province di Ferrara e Rovigo che si rivolge a chi voglia ricevere un servizio sanitario qualificato a casa propria. </em><br></p>
          <br>
          <a href="/privacy-policy.php" target="_blank" style="color:#fff; text-decoration:none;">Privacy Policy</a>
        </div>
        <div class="div-block-5">
          <h4 class="heading-3">seguici su</h4>
          <div class="social_container">
            <div class="social_icon twitter"><img src="/images/twitter-brands.svg" width="17" alt="" class="social_icon_image">
              <div class="social_text">Twitter</div>
            </div>
            <a href="https://www.instagram.com/mobidoc.it/" target="_blank" class="w-inline-block">
              <div class="social_icon"><img src="/images/linkedin-in-brands.svg" width="17" alt="" class="social_icon_image">
                <div class="social_text">Instagram</div>
              </div>
            </a>
            <a href="https://www.facebook.com/mobidoc.it/" target="_blank" class="w-inline-block">
              <div class="social_icon"><img src="/images/facebook-f-brands.svg" width="17" alt="" class="social_icon_image">
                <div class="social_text">Facebook</div>
              </div>
            </a>


        <a href="https://web.whatsapp.com/send?phone=+39%20335%20779%2088%2044" target="_blank" class="w-inline-block whats-app-btn">
              <div class="social_icon"><img src="/images/what-app-icon.png?v=1" width="17" alt="" class="social_icon_image">
                <div class="social_text">What's App</div>
              </div>
            </a>

          </div>
        </div>
      </div>
    </div>
  </footer>
