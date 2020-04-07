
    $(document).mouseup(function (e) { 
        if ($(e.target).closest(".search_cap_input").length === 0) { 
          $('.search_help').removeClass("search_help_open");
        } 
      });   
  
      function cap_remover(d){
        $(d).parent().parent().remove();       
  
        var value_name_attr = $(d).siblings('.cap_name').children().attr("name");
        var get_name_attr_text = $('.cap_name_attr').val();
        get_name_attr_text = get_name_attr_text.replace(value_name_attr+"|",'');
        $('.cap_name_attr').val(get_name_attr_text);
      }
  
  
      $(document).ready(function(){ 
	  	
			//var address = $('.address').text().trim();
			//alert(address);
			
			/*$('#select-comun option').each(function(index)){
			var get_value = $(this).text().trim();
			if(get_value == address){
				alert("true");			
			} else {
				alert("false");
			}
			});*/
		
	  
	  
        $('.datepicker-here').keyup(function(){
          $(this).val('');
        }); 
            
        current_pos = 0;
  
          $('.button-7').click(function(){            
            var text = $('#select-comune').children("option:selected").text().trim();
            current_pos += 1;  
            if(text != ''){
             
              var selected_cap_length = $( ".cap_selected .cap" ).length;
              var appeneder = "<div class='cap'><div class='cap_flex_container'><div class='cap_name'><input type='checkbox' class='cap_name_input' checked readonly name='cap"+current_pos+"'value='"+ text + "'>"+text+"</input></div><div class='cap_remove' onClick='cap_remover(this);'><img src='../images/minus.svg' alt=''></div></div></div>";
              
              if(selected_cap_length == 0){
                $(".cap_selected").append(appeneder);
              } else {
                var current_val = $( ".cap_selected").text();                
                if(current_val.includes(text)){
                  alert("Comune already Selected");
                } else {
                  $(".cap_selected").append(appeneder);
                  $('.error_message.capi').removeClass("error_show");
                }
              }     
        
            } else {
              alert('please select a value');
            }
          }); 
  
          $('.button-7').click(function(){
            var name_attr_appender;
            $(".cap_name_input").each(function(index) {
                var name_attr  = $(this).attr("name");
                name_attr_appender =  name_attr +"|";                      
            });
            var selector = $('.cap_name_attr');
            selector.val( selector.val() + name_attr_appender);
          });
  
          selected_visit_counter = 0;  
          $(".visits_selector_container .visit:last-child").addClass("last");
          $('.visit_subitem_container > .visit_subitem').click(function(){
              
              $('.error_message.visit').removeClass("error_show");
              selected_visit_counter += 1;
              var se_name = $(this).children('.text-block-43').text();    
              var service_add = "<div class='visit_subitem selected'><div style=' width:65%;'><input type='checkbox' style='display:none;' checked class='text-block-44' value='" + se_name + "' name='service_name"+selected_visit_counter+"'>"+se_name+"</div><div class='price_n_remove'><div class='price_input'><div>€</div><input type='number' class='input_num w-input' maxlength='256' name='service_price"+selected_visit_counter+"'  min='1' data-name='Field' id='field' required=''></div><img src='../images/minus_1.svg' class='image-14' onClick='service_remove(this)'></div></div>";
              $(".selecteds").append(service_add);
              $(this).hide();
  
              var visit_attr_appender;
              $(".text-block-44").each(function(index) {
                var visit_attr = $(this).attr("name");   
                var price_attr = $(this).siblings(".price_n_remove").children('.price_input').children('input').attr("name");
                visit_attr_appender =  visit_attr +","+price_attr+"|";   
              });
              var visit_selector = $('.visit_name_attr');
              visit_selector.val( visit_selector.val() + visit_attr_appender);
  
          });
      });     

      function service_remove(e){
        $(e).parent().parent().remove();
        var this_name = ($(e).parent().siblings('.text-block-44').val()).trim();
        var slector = ".text-block-43:contains("+this_name+")";
        $(slector).parent().show();   
        var service_name_attr = $(e).parent().siblings("input").attr("name");
        var service_price_attr = $(e).siblings(".price_input").children('input').attr("name");
  
        var get_visit_attr_text = $('.visit_name_attr').val();
        var service_attribute_remover = service_name_attr+","+service_price_attr+"|";
        
        get_visit_attr_text = get_visit_attr_text.replace(service_attribute_remover,'');
        $('.visit_name_attr').val(get_visit_attr_text);
      }              