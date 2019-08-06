$(document).ready(function () {

    $(".chatMinimize").click(function () {
        if ($(this).parent().parent().hasClass('mini')) {
            $(this).parent().parent().removeClass('mini').addClass('normal');

            $('.panel-body').animate({height: "250px"}, 500).show();

            $('.panel-footer').animate({height: "75px"}, 500).show();
        } else {
            $(this).parent().parent().removeClass('normal').addClass('mini');

            $('.panel-body').animate({height: "0"}, 500);

            $('.panel-footer').animate({height: "0"}, 500);

            setTimeout(function () {
                $('.panel-body').hide();
                $('.panel-footer').hide();
            }, 500);

        }

    });
    $(".chatClose").click(function () {
        $(this).parent().parent().remove();
    });


    $(".list-messages__content").scrollTop($('.list-messages__content')[0].scrollHeight);


    function updateChat(id) {
        $.post("rest/message", {"action": "retrieve", "scope": "public", "message_id": id}, function (data, status) {
            if (data != null) {
                $(".list-messages__content .messages-rows").append("" +
                    "<div class='row'>" +
                    "    <div class='col'>" +
                    "    <span class='message'>" + data.content +
                    "</span><span class='date'>" + data.created +
                    "</span></div></div>")

                return true;
            }
            else {
                return false;
            }
        })
    }

    setInterval(function () {
        id = $('.last__message_id').val();
        if(updateChat()){
            $('.last__message_id').val(id + 1)
        }
    }, 500);

});
