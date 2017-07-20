<?php
function hr($return = false) {

    if ($return) {
        return "<hr>\n";
    } else {
        echo "<hr>\n";
    }
}

function br($return = false) {

    if ($return) {
        return "<br>\n";
    } else {
        echo "<br>\n";
    }

}

function dump($var, $return = false) {

    if (is_array($var)) {
        $out = print_r($var, true);
    } else if (is_object($var)) {
        $out = var_export($var, true);
    } else {
        $out = $var;
    }

    if ($return) {
        return "\n<pre>$out</pre>\n";
    } else {
        echo "\n<pre>$out</pre>\n";
    }
}

function getCurrentDateTime() {

    return date("Y-m-d H:i:s");
}

function encryptPassword($password) {

    global $config;

    return md5($password . $config['salt']);
}


function pre($array) {

    echo '<pre>';
    print_r($array);
    echo '</pre>';
}

function getFullUrl() {

    $fullUrl = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

    return $fullUrl;
}


function getRequestUri() {

    return $_SERVER['REQUEST_URI'];
}

function getRequestParams() {

    return explode('/', str_replace(baseUrl() . '/', '/', getRequestUri()));
}

function baseUrl() {

    global $config;

    return $config['base'];
}


function fullUrl() {

    global $config;

    return 'http://' . $_SERVER['HTTP_HOST'] . $config['base'];
}

function str_contains($str, $search, $caseSensitive = false) {

    return $caseSensitive
        ? strpos(strtolower($str), strtolower($search)) !== false
        : strpos($str, $search) !== false;
}

function message($type, $msg, $mustExit) {

    $data['message'] = $msg;
    View::render("message/" . $type . ".php", $data);
    if ($mustExit)
        exit;
}