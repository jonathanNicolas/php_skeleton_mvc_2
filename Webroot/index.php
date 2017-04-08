<?php

error_reporting(-1);
ini_set('display_errors', 'On');

include_once '../Config/core.php';

$tmp = new Core();
$tmp->iniRouter();



$requestUrl = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$requestString = substr($requestUrl, strlen($_SERVER['HTTP_HOST'])+7);
print_r($requestUrl);
echo '************';
print_r($requestString);

$urlParams = explode('/', $requestString);
//var_dump($urlParams);

$controllerName = ucfirst(array_shift($urlParams)).'Controller';
//var_dump($controllerName);
$actionName = strtolower(array_shift($urlParams)).'Action';
//var_dump($actionName);