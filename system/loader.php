<?
session_start();
date_default_timezone_set('Asia/Tehran');

global $config;
require_once('system/common.php');
require_once('config.php');
require_once('core.php');
require_once('locale/' . $config['lang'] . '.php');
require_once('system/db.php');
require_once('system/view.php');
?>