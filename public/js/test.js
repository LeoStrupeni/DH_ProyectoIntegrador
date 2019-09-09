$(document).ready(function(){
    $('.form-login').submit(function (event) {
        event.preventDefault();

        $('#login-error').detach();
        $('.errores').detach();


        var errores = [];

        var regex_email = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

        if ($("input[id='email-to-login']").val().trim() == "" ) {
            errores.push('Por favor, ingrese su email');
        }
        else if(regex_email.test($("input[id='email-to-login']").val()) == false){
            errores.push('Por favor, ingrese un email valido');
        }
        
        if ($("input[id='password-login']").val().trim() == "") {
            errores.push('Por favor, ingrese su password');
        }

        console.log(errores);

        if (errores.length == 0) {
            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });

            $.ajax({
                type: 'POST',
                url: 'login',
                data: $('.form-login').serialize(),
                success: function() {
                    window.location.href = "/";
                },
                error: function (data) {
                    var errors = $.parseJSON(data.responseText);
                    $('#email-login').append('<span class="invalid-feedback" role="alert" id="login-error">' + errors.errors['email'] + "</span>");
                }
            });
        } else {
            $('.body-login').append("<div class='mt-2 errores'>Por favor, revisa los siguientes errores</div>");
            $('.errores').append('<ul class="list-unstyled"></ul>');
            errores.forEach(function(error){
                $('.errores ul').append('<li class="invalid-feedback">' + error + '</li>');
            });
        }
        
    })
})