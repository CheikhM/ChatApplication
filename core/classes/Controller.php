<?php


class Controller
{

    static function render($filename, $params = [])
    {
        ob_start();
        if (!empty($filename)) {

            $message_manager = new MessageManager();
            $user_manager = new UserManager();

            $messages = $message_manager->getAllMessages();
            $users = $user_manager->getAllUsers();
            $current_user_id = $user_manager->getCurrentUser()['user_id'];

            require_once str_replace("\\", "/", __DIR__) . '/../../pages/' . $filename . '.hiit.php';
            $content = ob_get_clean();


            // require the default layout
            require_once str_replace("\\", "/", __DIR__) . '/../../pages/layout/template.hiit.php';
        }
    }


    /*static function ForceRedirect($url)
    {
            echo '<script type="text/javascript">';
            echo 'window.location.href="' . $url . '";';
            echo '</script>';

    }*/

}
