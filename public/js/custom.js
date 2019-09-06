window.addEventListener('load', function() {

    var modalRegistro = this.document.getElementById('button-register');
    var selPaises = this.document.getElementById('country');


    modalRegistro.onclick = function(){
        fetch('/countries')
        .then(function(respuesta){
            return respuesta.json();
        })
        .then(function(paises){
            paises.forEach(function(pais){
                var option = document.createElement('option');
                option.text = pais;
                selPaises.add(option);
            })
        })
        .catch(function(error){
            console.log('El error fue: ' + error);
        })
    }

})