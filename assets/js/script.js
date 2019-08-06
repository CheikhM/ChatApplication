$(document).ready(function(){

    $(".chatMinimize").click(function(){
    if($(this).parent().parent().hasClass('mini'))
    {
        $(this).parent().parent().removeClass('mini').addClass('normal');

        $('.panel-body').animate({height: "250px"}, 500).show();

        $('.panel-footer').animate({height: "75px"}, 500).show();
    }
    else
    {
        $(this).parent().parent().removeClass('normal').addClass('mini');

        $('.panel-body').animate({height: "0"}, 500);

        $('.panel-footer').animate({height: "0"}, 500);

        setTimeout(function() {
            $('.panel-body').hide();
            $('.panel-footer').hide();
        }, 500);

    }

});
$(".chatClose").click(function(){
    $(this).parent().parent().remove();
});


$(".list-messages__content").scrollTop($('.list-messages__content')[0].scrollHeight);



function updateChat(){

}

// to get messages every three seconds
setInterval(function(){
    updateChat();
}, 3000);

});
