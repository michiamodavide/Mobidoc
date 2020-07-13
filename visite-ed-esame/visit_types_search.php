<link rel="stylesheet" href="/css/visit_type_search.css?v=8">
<div class="visit_types_dv">
 <div class="section_title">
  <span class="service_name"><?php echo  $visit_name;?></span> che offriamo a domicilio:</div>
 <div id="w-node-3edc56e7c1a4-fd1af309" class="div-block-47">
  <div class="search home">
   <div class="form-block w-form">
    <form id="Search_form" name="email-form" action="javascript:;" method="get" class="form">
     <input type="text" class="text-field homapge w-input" autocomplete="off" maxlength="256" name="search" data-name="Name 2" placeholder="Ricerca il tipo di visita" id="name-2" required="">
     <input type="button" value="Search" class="submit-button homepage w-button">
    </form>
   </div>
   <div class="homepage_search_help">
    <div class="visitie_search_help_item">
     <div class="text-block-56">Ecografia Dell Collo</div>
    </div>
   </div>
  </div>
 </div>
</div>
<div style="clear:both;"></div>
<script>
  $(document).ready(function(){
    $(".visit_types_dv .text-field").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      if (value.length == 0){
        $(".visit_types_dv #Search_form .w-button").css("display", "block");
      }else {
        $(".visit_types_dv #Search_form .w-button").css("display", "none");
      }
      $(".visite_type_container .visite_type").filter(function() {
        $(this).toggle($(".text-block-21", this).text().toLowerCase().indexOf(value) > -1)
      });
    });
  });
</script>