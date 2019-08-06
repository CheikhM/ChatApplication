<?php


class Controller
{

    static function render($filename, $params = []){
        ob_start();
        if(!empty($filename)) {
            require_once str_replace("\\", "/" , __DIR__) . '/../../pages/' . $filename . '.hiit.php';
            $content = ob_get_clean();


            // require the default layout
            require_once str_replace("\\", "/" , __DIR__) . '/../../pages/layout/template.hiit.php';
        }
    }

}
