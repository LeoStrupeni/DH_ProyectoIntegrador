
$(document).ready(function(){
    var yetVisited = window.sessionStorage['visited'];
    if (!yetVisited) {
        $('#modal-alert').modal('show');
        sessionStorage['visited'] = "yes";
    }
})