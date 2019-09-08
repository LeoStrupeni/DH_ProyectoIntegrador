window.addEventListener('load', function()
{
    $('#modalLogin').on('show.bs.modal', function() {
        $('#formReset').hide();
    })

    $('#modalResetBtn').click(function() {
        $('#formReset').show(100);
    })

    $('#modalLogin').on('hidden.bs.modal', function() {
        $('#formReset').hide();
    })

})