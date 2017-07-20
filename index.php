<?
define('test', true);
require_once(getcwd()."/system/loader.php");
$params = getRequestParams();

array_shift($params);
$controller = $params[0];
$method = $params[1];
array_shift($params);
array_shift($params);
$methodParams = $params;

$controllerClassName = ucfirst($controller) . "Controller";

$controllerInstance = new $controllerClassName();
call_user_func_array(array($controllerInstance, $method), $params);


