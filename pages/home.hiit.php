<!-- fixed private chat div -->
<div class="panel panel-chat">
    <div class="panel-heading">
        <a href="#" class="chatMinimize" onclick=""><span>username</span></a>
        <a href="#" class="chatClose" onclick=""><img src="assets/images/close.png" width="100%" /></a>
        <div class="clearFix"></div>
    </div>
    <div class="panel-body">
        <!--
        <div class="sentByMe">
            <img src="assets/images/avatar.jpg" alt=""/>
            <span>mesage text</span>
            <div class="clearFix"></div>
        </div>
        <div class="sentByHim">
            <img src="assets/images/avatar.jpg" alt=""/>
            <span>asdasdsassssssssssssssssssssssssssssssssssssssss</span>
            <div class="clearFix"></div>
        </div>
        -->
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
        <input type="hidden" class="current_user_id" value="<?= $current_user_id; ?>" />
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
            <div class="row">
                <div class="col-12 list-users__header">
                    <h2>Users</h2>
                </div>
            </div>
            <?php foreach ($users as $user) { ?>
                <?php
                    #time finish before fixing this part of code :(
                    $offline = '';

                    $manager = new UserManager();
                    if(!$manager->isOnline($user['user_id'])){
                        $offline = 'offline';
                    }

                    $manager->isOnline($user['user_id']);
                ?>

                <div class="row list-users__single-user" >
                    <div class="col-12">
                        <span class="username"><?= $user['username']; ?></span>
                        <div class="status <?= $offline; ?>"></div>
                        <a href="#">
                            <img src="assets/images/send.png" class="chat_with" />
                        </a>
                        <input type="hidden" class="user_id" value="<?= $user['user_id'] ?>" />
                    </div>
                </div>
            <?php } ?>

        </div>
    </div>
    <div class="row chat-box__footer">
        <span>all &copy; reserved 2019</span>
    </div>
</div>
