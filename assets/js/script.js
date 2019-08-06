$(document).ready(function () {

    $(".chatMinimize").click(function () {
        if ($(".panel-chat").hasClass('mini')) {
            $(".panel-chat").removeClass('mini').addClass('normal');

            $('.panel-body').animate({height: "250px"}, 500).show();

            $('.panel-footer').animate({height: "75px"}, 500).show();
        } else {
            $(".panel-chat").removeClass('normal').addClass('mini');

            $('.panel-body').animate({height: "0"}, 500);

            $('.panel-footer').animate({height: "0"}, 500);

            setTimeout(function () {
                $('.panel-body').hide();
                $('.panel-footer').hide();
            }, 500);

        }

    });


    $('.chat_with').click(function(){
        $(".panel-chat").css('display', 'block');
        cid = $('.current_user_id').val();
        uid = $(this).parent().parent().find('input').val();

        $.post("rest/message", {"action": "retrieve", "scope": "private", "current_id": cid, "user_id": uid}, function (data, status) {
            console.log(data);
        })

    });

    $(".chatClose").click(function () {
        $(".panel-chat").css('display', 'none');
    });

    function chatToTop() {
        $(".list-messages__content").scrollTop($('.list-messages__content')[0].scrollHeight);
    }
    chatToTop();

    function updateChat(id)
    {
        $.post("rest/message", {"action": "retrieve", "scope": "public", "message_id": id}, function (data, status) {
            console.log(data);
            if (data != null) {
                $(".list-messages__content .messages-rows").append("" +
                    "<div class='row'>" +
                    "    <div class='col'>" +
                    "    <span class='message'>" + data.content +
                    "</span><span class='date'>" + data.created +
                    "</span></div></div>");
                chatToTop();
                $('.last__message_id').val(parseInt(id) + 1 )
            }

        })
    }

    function updateLastActivity(id){
        $.post("rest/message", {"action": "update_status", "user_id": id}, function (data, status) {
            // noting to do
        });

    }


    $('.send-message input').keypress(function(event)
    {
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if(keycode == '13'){
            $('.send-message input').attr('disabled', 'true');
            var message_text =  $('.send-message input').val();
            $.post("rest/message", {"action": "send", "scope": "public", "content": message_text}, function (data, status) {

                if (data.msg == 'ok') {
                    $('.send-message input').val('');
                    $('.send-message input').removeAttr('disabled');
                }
                else {
                    alert("an error was occured when sending message :(")
                }
            })
        }

    });



    // check for new public messages
    setInterval(function () {
        var id = $('.last__message_id').val();
        updateChat(id)

    }, 2000);


    setInterval(function () {
        var id = $('.current_user_id').val();

        updateLastActivity(id);

    }, 3000);

});
