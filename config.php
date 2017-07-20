<?
if (!defined('test')){
    echo 'Forbidden Request';
    exit;
}

global $config;
$config['db']['host'] = 'localhost';
$config['db']['user'] = 'root';
$config['db']['pass'] = '';
$config['db']['name'] = 'notes';

$config['lang'] = 'fa';

$config['salt'] = 'suya9s8ydaiu987vqo28bv9q87B87VPq7E98QVB';

$config['base'] = '/notes-v2';