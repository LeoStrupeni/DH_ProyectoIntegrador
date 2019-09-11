$(document).ready(function(){
    if(window.location.pathname == '/search')
    {
        $('.add-clear').append('<a class="btn btn-success my-2" href="/search" role="button">Clear</a>');
    } else {
        $('.clear-btn').remove();
    }
})
