$(document).ready(function(){

     $('.form-register').submit(function(event)
    {
        var errores = [];

        $('.errores').detach();

        var regex_id = /^[0-9]{0,8}$/;

        var regex_email = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/

        if (($("input[name='name']").val()).trim() == "") {
            errores.push('Por favor, complete el nombre');
        }

        if (($("input[name='surname']").val()).trim() == "" ) {
            errores.push('Por favor, complete el apellido');
        }

        if ($("input[name='personal_id']").val() == "" ) {
            errores.push('Por favor, complete el documento');
        }

        if (regex_id.test($("input[name='personal_id']").val()) == false) {
            errores.push('Por favor, ingrese un documento valido');
        }

        if ($("input[name='documento']").val() == "" ) {
            errores.push('Por favor, complete el documento');
        }

        if ($("input[id='email-register']").val() == "" ) {
            errores.push('Por favor, ingrese su email');
        }

        if (regex_email.test($("input[id='email-register']").val()) == false) {
            errores.push('Por favor, ingrese un email valido');
        }

        if ($("input[name='birthday']").val() == "" ) {
            errores.push('Por favor, ingrese una fecha');
        }

        if ($("input[id='password-register']").val() == "" || $("input[id='password-confirm']").val() == "") {
            errores.push('Por favor, ingrese una contrasena');
        }

        if ($("input[id='password-register']").val() != $("input[id='password-confirm']").val()) {
            errores.push('Las contrasenas no coinciden');
        }

        var filename = $("input[name='avatar']").val();
        var extension = filename.replace(/^.*\./, '')

        if (extension.toLowerCase() != "jpg" && extension.toLowerCase() != "png" && extension.toLowerCase() != "jpeg") {
            errores.push('Ingrese una imagen con formato valido');
        }

        if (errores.length > 0) {
            event.preventDefault();
            $('.body-register').append("<div class='mt-2 errores'>Por favor, revisa los siguientes errores</div>");
            $('.errores').append('<ul class="list-unstyled"></ul>');
            errores.forEach(function(error){
                $('.errores ul').append('<li class="invalid-feedback">' + error + '</li>');
            });
        }
    })
})