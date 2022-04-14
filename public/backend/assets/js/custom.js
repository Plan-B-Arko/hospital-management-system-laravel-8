$(document).ready(function()
{
    $('ul.sub-menu').hide();
    $('li').click(function(event){
        $('ul.sub-menu').hide(200);
        event.stopPropagation();
        $('> ul',this).toggle(300);
    });
});
