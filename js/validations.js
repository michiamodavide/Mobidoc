$(document).ready(function(){
  
  // fiscale validation
  

  function validateTaxCode(value) {

    var TAX_CODE_LENGTH = 16;
    var REGEXP_STRING_FOR_LASTNAME = "[A-Za-z]{3}";
    var REGEXP_STRING_FOR_FIRSTNAME = "[A-Za-z]{3}";
    var REGEXP_STRING_FOR_BIRTHDATE_YEAR = "[0-9LlMmNnPpQqRrSsTtUuVv]{2}";
    var REGEXP_STRING_FOR_BIRTHDATE_MONTH = "[AaBbCcDdEeHhLlMmPpRrSsTt]{1}";
    var REGEXP_STRING_FOR_BIRTHDATE_DAY_GENDER_PART_1 = "[0-7LlMmNnPpQqRrSsTtUuVv]{1}";
    var REGEXP_STRING_FOR_BIRTHDATE_DAY_GENDER_PART_2 = "[0-9LlMmNnPpQqRrSsTtUuVv]{1}";
    var REGEXP_STRING_FOR_BIRTHTOWN_PART_1 = "[A-Za-z]{1}";
    var REGEXP_STRING_FOR_BIRTHTOWN_PART_2 = "[0-9LlMmNnPpQqRrSsTtUuVv]{3}";
    var REGEXP_STRING_FOR_CIN = "[A-Za-z]{1}";
    var REGEXP = new RegExp("^" + REGEXP_STRING_FOR_LASTNAME + REGEXP_STRING_FOR_FIRSTNAME + REGEXP_STRING_FOR_BIRTHDATE_YEAR + REGEXP_STRING_FOR_BIRTHDATE_MONTH + REGEXP_STRING_FOR_BIRTHDATE_DAY_GENDER_PART_1 + REGEXP_STRING_FOR_BIRTHDATE_DAY_GENDER_PART_2 + REGEXP_STRING_FOR_BIRTHTOWN_PART_1 + REGEXP_STRING_FOR_BIRTHTOWN_PART_2 + REGEXP_STRING_FOR_CIN + "$");
    var ODD_CHARS_MAP = new Map();
    var EVEN_CHARS_MAP = new Map();
    var MODS_MAP = new Map();
    
    var validCode = false;
    
    ODD_CHARS_MAP.set("0", 1);
    ODD_CHARS_MAP.set("1", 0);
    ODD_CHARS_MAP.set("2", 5);
    ODD_CHARS_MAP.set("3", 7);
    ODD_CHARS_MAP.set("4", 9);
    ODD_CHARS_MAP.set("5", 13);
    ODD_CHARS_MAP.set("6", 15);
    ODD_CHARS_MAP.set("7", 17);
    ODD_CHARS_MAP.set("8", 19);
    ODD_CHARS_MAP.set("9", 21);
    ODD_CHARS_MAP.set("A", 1);
    ODD_CHARS_MAP.set("B", 0);
    ODD_CHARS_MAP.set("C", 5);
    ODD_CHARS_MAP.set("D", 7);
    ODD_CHARS_MAP.set("E", 9);
    ODD_CHARS_MAP.set("F", 13);
    ODD_CHARS_MAP.set("G", 15);
    ODD_CHARS_MAP.set("H", 17);
    ODD_CHARS_MAP.set("I", 19);
    ODD_CHARS_MAP.set("J", 21);
    ODD_CHARS_MAP.set("K", 2);
    ODD_CHARS_MAP.set("L", 4);
    ODD_CHARS_MAP.set("M", 18);
    ODD_CHARS_MAP.set("N", 20);
    ODD_CHARS_MAP.set("O", 11);
    ODD_CHARS_MAP.set("P", 3);
    ODD_CHARS_MAP.set("Q", 6);
    ODD_CHARS_MAP.set("R", 8);
    ODD_CHARS_MAP.set("S", 12);
    ODD_CHARS_MAP.set("T", 14);
    ODD_CHARS_MAP.set("U", 16);
    ODD_CHARS_MAP.set("V", 10);
    ODD_CHARS_MAP.set("W", 22);
    ODD_CHARS_MAP.set("X", 25);
    ODD_CHARS_MAP.set("Y", 24);
    ODD_CHARS_MAP.set("Z", 23);
    
    EVEN_CHARS_MAP.set("0", 0);
    EVEN_CHARS_MAP.set("1", 1);
    EVEN_CHARS_MAP.set("2", 2);
    EVEN_CHARS_MAP.set("3", 3);
    EVEN_CHARS_MAP.set("4", 4);
    EVEN_CHARS_MAP.set("5", 5);
    EVEN_CHARS_MAP.set("6", 6);
    EVEN_CHARS_MAP.set("7", 7);
    EVEN_CHARS_MAP.set("8", 8);
    EVEN_CHARS_MAP.set("9", 9);
    EVEN_CHARS_MAP.set("A", 0);
    EVEN_CHARS_MAP.set("B", 1);
    EVEN_CHARS_MAP.set("C", 2);
    EVEN_CHARS_MAP.set("D", 3);
    EVEN_CHARS_MAP.set("E", 4);
    EVEN_CHARS_MAP.set("F", 5);
    EVEN_CHARS_MAP.set("G", 6);
    EVEN_CHARS_MAP.set("H", 7);
    EVEN_CHARS_MAP.set("I", 8);
    EVEN_CHARS_MAP.set("J", 9);
    EVEN_CHARS_MAP.set("K", 10);
    EVEN_CHARS_MAP.set("L", 11);
    EVEN_CHARS_MAP.set("M", 12);
    EVEN_CHARS_MAP.set("N", 13);
    EVEN_CHARS_MAP.set("O", 14);
    EVEN_CHARS_MAP.set("P", 15);
    EVEN_CHARS_MAP.set("Q", 16);
    EVEN_CHARS_MAP.set("R", 17);
    EVEN_CHARS_MAP.set("S", 18);
    EVEN_CHARS_MAP.set("T", 19);
    EVEN_CHARS_MAP.set("U", 20);
    EVEN_CHARS_MAP.set("V", 21);
    EVEN_CHARS_MAP.set("W", 22);
    EVEN_CHARS_MAP.set("X", 23);
    EVEN_CHARS_MAP.set("Y", 24);
    EVEN_CHARS_MAP.set("Z", 25);
    
    MODS_MAP.set(0, "A");
    MODS_MAP.set(1, "B");
    MODS_MAP.set(2, "C");
    MODS_MAP.set(3, "D");
    MODS_MAP.set(4, "E");
    MODS_MAP.set(5, "F");
    MODS_MAP.set(6, "G");
    MODS_MAP.set(7, "H");
    MODS_MAP.set(8, "I");
    MODS_MAP.set(9, "J");
    MODS_MAP.set(10, "K");
    MODS_MAP.set(11, "L");
    MODS_MAP.set(12, "M");
    MODS_MAP.set(13, "N");
    MODS_MAP.set(14, "O");
    MODS_MAP.set(15, "P");
    MODS_MAP.set(16, "Q");
    MODS_MAP.set(17, "R");
    MODS_MAP.set(18, "S");
    MODS_MAP.set(19, "T");
    MODS_MAP.set(20, "U");
    MODS_MAP.set(21, "V");
    MODS_MAP.set(22, "W");
    MODS_MAP.set(23, "X");
    MODS_MAP.set(24, "Y");
    MODS_MAP.set(25, "Z");
    
    if(value && value.length == 16 && REGEXP.test(value)) {
    
        var charsSum = 0;
    
        for(var position = 0; position < TAX_CODE_LENGTH - 1; ++position) {
            if(((position + 1) % 2) > 0) {
                charsSum += ODD_CHARS_MAP.get(value.charAt(position).toUpperCase());
            }
            else {
                charsSum += EVEN_CHARS_MAP.get(value.charAt(position).toUpperCase());
            }
        }
    
        validCode = (MODS_MAP.get(charsSum % 26)) == value.slice(-1).toUpperCase();
    }
    
    return validCode;
    };



  $('#submit_profile').click(function(){
    var fiscale_value = $('#fiscal_code').val();
    if(validateTaxCode(fiscale_value) == true){
      return true;      
    } else {
      $('.error_message.fiscale').addClass("error_show");
      return false;
    }
  });


    

  //Password Match

  $('#submit_profile').click(function(){

    $('input[name=pwrds], input[name=Cnfrm_pwrd]').keyup(function(){
      $('.password_dont_match').removeClass("error_show");
    });
    var password = $('input[name=pwrds]').val();
    var confirm_password = $('input[name=Cnfrm_pwrd]').val();
    if(password==confirm_password){
      return true;
    } else {      
      $('.password_dont_match').addClass("error_show");
      return false;
    }   
    
  });

  //profile picture missing error
  $('#submit_profile').click(function(){
    var image_path = $('.upload_image').val();
    if(image_path){
      var img_size = $('.upload_image')[0].files[0].size;
      if (img_size > 2000000) {
        $('.profile_image_error').addClass("error_show");
        return false;
      }else {
        return true;
      }
    } else {
      $('.profile_image_error').addClass("error_show");
      return false;
    }
  });

  //  Textareas Minimum length test

  $('#submit_profile').click(function(){ 
    var txtVal = $('#personal_description').val();
    var char = txtVal.trim().length;
    if(char > 20){
      return true;
    } else {
      $('.prsn_desc_length').addClass("error_show");
      return false;
    }
  }); 
  $('#personal_description').keyup(function(){$('.prsn_desc_length').removeClass("error_show");});

  $('#submit_profile').click(function(){ 
    var txtVal2 = $('#educazione').val();
    var char = txtVal2.trim().length;
    if(char > 20){
      return true;
    } else {
      $('.educazione_length').addClass("error_show");
      return false;
    }
  }); 
  $('#educazione').keyup(function(){$('.educazione_length').removeClass("error_show");});

  $('#submit_profile').click(function(){ 
    var txtVal3 = $('#esperienze_professionali-2').val();
    var char = txtVal3.trim().length;
    if(char > 20){
      return true;
    } else {
      $('.esperienze_length').addClass("error_show");
      return false;
    }
  });
  $('#esperienze_professionali-2').keyup(function(){$('.esperienze_length').removeClass("error_show");});

  // Age Vaidation 

  $('#submit_profile').click(function(){
    var dob = $('.datepicker-here').val();
    pos = dob.lastIndexOf("/");
    year = parseInt(dob.substr(pos+1));
    var d = new Date();
    difference = parseInt(d.getFullYear()) - year;
    if(difference > 22){
      return true;
    } else {
      $('.error_message.age').addClass("error_show");
      return false;
    }    
  });

  $('.datepicker-here').focusin(function(){
    $('.error_message.age').removeClass("error_show");
  });


  // visits validation

  $('#submit_profile').click(function(){
    if($('.selecteds').children().length == 0){
      $('.error_message.visit').addClass("error_show");
      return false;
    } else {
      return true;
    }
  });

   // cap validation
  
   $('#submit_profile').click(function(){
    if($('.cap_selected').children().length == 0){
      $('.error_message.capi').addClass("error_show");
      return false;
    } else {
      return true;
    }
  }); 


});     
