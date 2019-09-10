$(document).ready(function(){
    if(window.location.pathname == '/search')
    {
        $('.add-clear').append('<a class="btn btn-success ml-1 clear-btn" href="/search" role="button" id="clear-btn">Clear</a>');
    } else {
        $('.clear-btn').remove();
    }
})
