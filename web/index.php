<?php
require_once __DIR__.'/../config.php';
  
use Library\Router;

$request = $_SERVER['REQUEST_URI'];
$handle = new Router($request,$routers);

function __autoload($className) {
	$className = __DIR__.'/../'. str_replace('\\', '/', $className) . '.php';
	require_once $className;
}