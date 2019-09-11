$(document).ready(function(){
    $('.form-contacto').submit(function (e) {
        
        $('.errores').detach();

        var errores = [];
        var regex_email = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/

        if ($('#nombre-contact').val().trim() == "") {
            errores.push('Por favor, ingrese su nombre');
        }

        if ($('#email-contact').val().trim() == "" ) {
            errores.push('Por favor, ingrese su email');
        } else if(regex_email.test($('#email-contact').val() == false)) {
            errores.push('Por favor, ingrese un email valido');
        }

        if ($('#telefono-contact').val().trim() == "") {
            errores.push('Por favor, ingrese su telefono');
        }

        if ($('#message-contact').val().trim() == "" ) {
            errores.push('Por favor, ingrese su mensaje');
        } else if($('#message-contact').val().length > 255){
            errores.push('El maximo del mensaje puede ser hasta 255 caracteres');
        }

        if (errores.length > 0) {
            e.preventDefault();
            $('.body-contact').append("<div class='mt-2 errores'>Por favor, revisa los siguientes errores</div>");
            $('.errores').append('<ul class="list-unstyled"></ul>');
            errores.forEach(function(error){
                $('.errores ul').append('<li class="invalid-feedback">' + error + '</li>');
            });
        }

    })
})