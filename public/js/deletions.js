window.addEventListener('load', function(){

    $('#deleteSuscriptor').click(function(event){
        event.preventDefault();
        swal({
            title: "Estas seguro?",
            text: "Una vez eliminado, no se puede recuperar!",
            icon: "warning",
            buttons: ["Cancelar", "Borrar"],
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                swal("El suscriptor fue eliminado", {
                icon: "success",
                });
                setTimeout(function() {
                    $('#form-suscriptor').submit();
                    }, 1000)
            } else {
                swal("Se cancelo");
            }
        });
    })

})