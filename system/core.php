<?php
/**
 * Created by PhpStorm.
 * User: Mr648
 * Date: 7/13/2017
 * Time: 3:40 PM
 */

function __autoload($classname){
     if(str_contains($classname, "Model")){
         $filename = strtolower(str_replace("Model", "", $classname));
         require_once ("mvc/model/{$filename}.php");
         return;
     }else if (str_contains($classname, "Controller")){
         $filename = strtolower(str_replace("Controller", "", $classname));
         require_once ("mvc/controller/{$filename}.php");
         return;
     }
}