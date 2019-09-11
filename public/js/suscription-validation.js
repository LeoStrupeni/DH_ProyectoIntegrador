$(document).ready(function(){

    $('#email-suscriptor').blur(function(){
        var email = $('#email-suscriptor').val();
        $('.email-exist-alert').remove();

        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });

        $.ajax({
            type: "POST",
            url: '/checkSuscriptorEmail',
            data: {email:email},
            dataType: "json",
            success: function(res) {
                if(res.exists){
                    $('.email-suscriptor-section').append('<span class="invalid-feedback mb-4 email-exist-alert" role="alert">Este email ya se encuentra registrado a nuestro newsletter</span>');
                    $('.form-suscriptor').submit(function (e) {
                        e.preventDefault();
                    });
                }
            },
            error: function (jqXHR, exception) {
                // console.log(exception);
                // console.log(jqXHR);
            }
        });
    });

    $('.form-suscriptor').submit(function (e) {
        $('.errores').detach();

        var errores = [];
        var regex_email = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

        if ($('#email-suscriptor').val().trim() == "" ) {
            errores.push('Por favor, ingresa tu email');
        } else if(regex_email.test($('#email-suscriptor').val() == false)) {
            errores.push('Por favor, ingrese un email valido');
        };

        if (errores.length > 0) {
            e.preventDefault();
            $('.body-suscriptor').append("<div class='mt-2 errores'>Por favor, revisa los siguientes errores</div>");
            $('.errores').append('<ul class="list-unstyled"></ul>');
            errores.forEach(function(error){
                $('.errores ul').append('<li class="invalid-feedback">' + error + '</li>');
            });
        }
    })
})