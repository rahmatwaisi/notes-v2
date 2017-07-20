<?php

/**
 * Created by PhpStorm.
 * User: Mr648
 * Date: 7/12/2017
 * Time: 4:16 PM
 */
class View {
    public static function render($filePath, $data=null) {

        if ($data != null)
            extract($data);
        ob_start();

        require_once("mvc/view/" . $filePath);

        $content = ob_get_clean();
        require_once("theme/default.php");
    }
}