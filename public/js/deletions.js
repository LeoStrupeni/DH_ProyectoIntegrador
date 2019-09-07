window.addEventListener('load', function(){

    console.log($('#form-suscriptor') );
    $('#form-suscriptor').submit(function(event){
        event.preventDefault();
        console.log('hola');
    })

})