window.addEventListener('load', function() {

    $('#button-register').click(function(){
        fetch('/countries')
            .then(function(respuesta){
                return respuesta.json();
            })
            .then(function(paises){
                paises.forEach(function(pais){
                    var option = new Option(pais, pais);
                    $('#country').append(option);
                })
            })
            .catch(function(error){
                console.log('El error fue: ' + error);
            })
    })

})