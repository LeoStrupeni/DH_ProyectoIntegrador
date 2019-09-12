
$(document).ready(function(){
    var yetVisited = window.localStorage['visited'];
    if (!yetVisited) {
        $('#modal-alert').modal('show');
        localStorage['visited'] = "yes";
    }
})