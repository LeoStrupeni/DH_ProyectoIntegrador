$(document).ready(function(){
    if(window.location.pathname == '/search')
    {
        $('.add-clear').append('<a class="btn btn-success" href="/search" role="button">Clear</a>');
    } else {
        $('.clear-btn').remove();
    }
})
