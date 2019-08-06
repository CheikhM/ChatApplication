<!-- fixed private chat div -->
<div class="panel panel-chat">
    <div class="panel-heading">
        <a href="#" class="chatMinimize" onclick=""><span>Özgür Gürbüz</span></a>
        <a href="#" class="chatClose" onclick=""><i class="glyphicon glyphicon-remove"></i></a>
        <div class="clearFix"></div>
    </div>
    <div class="panel-body">
        <div class="messageMe">
            <img src="http://www.bitrebels.com/wp-content/uploads/2011/02/Original-Facebook-Geek-Profile-Avatar-1.jpg" alt=""/>
            <span>asdasdssadasdasdassssssssssssssssssssssssssssssssssssssssssdasdasd</span>
            <div class="clearFix"></div>
        </div>
        <div class="messageHer">
            <img src="http://www.bitrebels.com/wp-content/uploads/2011/02/Original-Facebook-Geek-Profile-Avatar-1.jpg" alt=""/>
            <span>asdasdsassssssssssssssssssssssssssssssssssssssss</span>
            <div class="clearFix"></div>
        </div>
        <div class="clearFix"></div>
    </div>
    <div class="panel-footer">
        <textarea name="textMessage" placeholder="Press enter to send the message !" cols="0" rows="0"></textarea>
    </div>
</div>
<!-- end fixed privat chat div -->

<div class="container chat-box">
    <div class="row chat-box__header">
        <div class="chat-box__logout">
            <a href="./logout">
                <span>Logout</span>
                <img src="assets/images/logout.png" alt="logout button" />
            </a>
        </div>
        <h2>Welcome <span><?= $_SESSION['username']; ?></span></h2>
    </div>
    <div class="row chat-box__content">
        <div class="col-md-9 list-messages">
            <div class="row list-messages__content">
                <div class="col-12 messages-rows">
                    <?php
                        $count_messages = count($messages);
                        $i = 0;
                    ?>
                    <?php foreach ($messages as $message) { ?>
                        <div class="row">
                            <div class="col">
                                <span class="message"><?= $message['content']; ?></span>
                                <span class="date"><?= $message['created']; ?></span>
                            </div>
                        </div>
                    <?php
                        if (++$i === $count_messages) {
                            $next_message = ($message['public_id'] + 1);
                        echo "<input type='hidden' class='last__message_id' value='$next_message' />";
                        }
                    }
                    ?>
                </div>
            </div>
            <div class="row send-message">
                <input type="text" placeholder="type your message here !" />
            </div>
        </div>
        <div class="col-md-3 list-users">
            List Users
        </div>
    </div>
    <div class="row chat-box__footer">
        <span>all copyright reserved</span>
    </div>
</div>
