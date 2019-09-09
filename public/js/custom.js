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

        fetch('/profiles')
            .then(function(respuesta){
                return respuesta.json();
            })
            .then(function(profiles){
                profiles.forEach(function(profile){
                    if (profile.id > 2) {
                        var option = new Option(profile.name, profile.id);
                        $('#profile').append(option);
                    }
                })
            })
            .catch(function(error){
                console.log('El error fue: ' + error);
            })
    })

})