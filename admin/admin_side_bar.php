
<script>
  $(document).ready(function(){
    $('.admin_item:nth-child(1)').click(function(){
      var location = '/admin/';
      setTimeout(function(){window.location.href=location},1200)
    });
    $('.admin_item:nth-child(2)').click(function(){
      var location = '/admin/booking.php';
      setTimeout(function(){window.location.href=location},1200)
    });
    $('.admin_item:nth-child(3)').click(function(){
      var location = '/paziente/patient-register.php';
      setTimeout(function(){window.location.href=location},50)
    });
    $('.admin_item:nth-child(4)').click(function(){
      var location = '/admin/incomplete-patient.php';
      setTimeout(function(){window.location.href=location},50)
    });
    $('.filter_select_option').click(function(){
      var location = '/admin/booking.php';
      setTimeout(function(){window.location.href=location},400)
    });
  });
</script>
<div class="admin_side_panel">
 <div class="topsection">
  <div data-w-id="410c8c4a-713c-7280-b165-1dd2a36167b1" class="menubutton">
   <div data-w-id="410c8c4a-713c-7280-b165-1dd2a36167b2" data-animation-type="lottie"
        data-src="https://uploads-ssl.webflow.com/5d8cfd454ebd737ac1a48727/5df8d5b6f7fac981eeddb5a6_lottieflow-menu-nav-07-ffffff-easey.json"
        data-loop="0" data-direction="1" data-autoplay="0" data-is-ix2-target="1" data-renderer="svg"
        data-default-duration="2.4791666666666665" data-duration="2.4791666666666665" class="lottie-animation"></div>
   <div class="admin_item_text">
    <div class="text-block-77"></div>
   </div>
  </div>
 </div>
 <div class="admin_item_menu">
  <div data-w-id="410c8c4a-713c-7280-b165-1dd2a36167b7" class="admin_item"><img src="../images/icon.svg" width="21"
                                                                                alt="" class="menu_icon">
   <div class="admin_item_text">
    <div class="text-block-77">Professionisti</div>
   </div>
  </div>
  <div data-w-id="410c8c4a-713c-7280-b165-1dd2a36167bc" class="admin_item"><img src="../images/bookmark-regular.svg"
                                                                                width="20" alt="" class="menu_icon">
   <div class="admin_item_text">
    <div class="text-block-77">Pazienti</div>
   </div>
  </div>
  <div data-w-id="410c8c4a-713c-7280-b165-1dd2a36167b7" class="admin_item"><img src="../images/telephon-booking.png?v=1" width="21"
                                                                                alt="" class="menu_icon">
   <div class="admin_item_text">
    <div class="text-block-77">Prenotazione Telefonica</div>
   </div>
  </div>

  <div data-w-id="410c8c4a-713c-7280-b165-1dd2a36167b7" class="admin_item"><img src="../images/uncomplete-patents.png?v=1" width="21"
                                                                                alt="" class="menu_icon">
   <div class="admin_item_text">
    <div class="text-block-77">Pazienti incompleti</div>
   </div>
  </div>

 </div>
</div>