<div data-w-id="c63fef3a-23b1-f70c-9014-2968db2eacbb" class="vselect_doctor">
    <div data-w-id="33cdd347-afe1-85b8-dddd-e96494f0f01b" style="transform: translate3d(0px, 0%, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); opacity: 1; transform-style: preserve-3d;" class="vdoctor_container">
        <div class="text-block-18">Stai riscontrando un problema? Scrivici</div>
        <br>
        <br>
        <div class="div-block-25">

            <script>
                function submit_message(){
                    var name = document.getElementById("name_contact").value;
                    var email = document.getElementById("email_contact").value;
                    var msg = document.getElementById("msg_contact").value;

                    if(name == '' || email == '' || msg == ''){
                        alert('Si prega di inserire tutte le informazioni correttamente.');
                    } else {
                        var xmlhttp2 = new XMLHttpRequest();
                        xmlhttp2.onreadystatechange = function() {
                            if (this.readyState == 4 && this.status == 200) {
                                if(this.responseText == 'Yes'){
                                    document.getElementById('load').click();
                                } else {
                                    document.getElementById("contact_result").innerHTML = this.responseText;
                                    document.getElementById("name_contact").value = '';
                                    document.getElementById("email_contact").value = '';
                                    document.getElementById("msg_contact").value = '';
                                    document.getElementById("contact_btn").value = 'Invia';
                                }

                            }
                        };
                        xmlhttp2.open("GET", "/sendMessage.php?name=" + name +"&email=" + email +"&message=" + msg, true);
                        xmlhttp2.send();
                    }

                }
            </script>
            <div class="contact_section">
                <div class="custom_container center">
                    <div class="div-block-79">
                        <div class="contact_form">
                            <div class="form-block-4 w-form">
                                <form id="email-form" name="email-form" data-name="Email Form">
                                    <input type="text" class="text-field-3 contact w-input" maxlength="256" name="name-3" data-name="Name 3" placeholder="Nome" id="name_contact" required="">
                                    <input type="email" class="text-field-3 contact w-input" maxlength="256" name="email" data-name="Email" placeholder="Email" id="email_contact" required="">
                                    <textarea name="field" maxlength="5000" id="msg_contact" placeholder="Messaggio" class="text-field-3 contact text_ara w-input" required=""></textarea>
                                    <a data-w-id="deac175c-85b0-7104-4736-171b0c9ce4da" href="#" class="button-3 next odd w-button adm_contact_pb">Indietro</a>
                                    <input type="button" value="Invia" id="contact_btn" class="button gradient contact w-button" style="color: #fff !important;" onClick="submit_message()">
                                </form>

                                <?php
                                if (isset($show_call_us_btn) && $show_call_us_btn == 1){
                                ?>
                                <br>
                                <a href="tel:3357798844" class="button gradient large diff w-inline-block home-tel">
                                    <img src="/images/phone.svg" width="11" alt="" class="image-2">
                                    <div class="text-block-2">Oppure chiamaci</div>
                                </a>
                                <?php }?>
                            </div>
                            <div id="contact_result">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div data-w-id="d1769b47-b536-ea11-3350-e5df432dbf52" class="closer"></div>
</div>