<?php
error_reporting(E_ALL); ini_set('display_errors', '1');

use controllers\MainController;
use core\Router;
use core\Model;
use models\Main;

spl_autoload_register(function($class) {
    $path = str_replace('\\', '/', $class.'.php');
    if (file_exists($path)) {
        require $path;
    }
});

session_start();


$router = new Router;
$router->run();



	
	?>

