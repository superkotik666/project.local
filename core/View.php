<?php

namespace core;


 class View {

public $path;
public $layout = 'default';   
public $route; 

public function __construct($route)
{
    $this->route=$route;
    $this->path = $route['controller'].'/'.$route['action'];
    
}
//МЕТОД ДЛЯ ПОДКЛЮЧЕНИЯ И ОТОБРАЖЕНИЯ ВИДОВ

public function render($title, $vars = []) {
    extract($vars);
    $path = 'views/'.$this->path.'.php';
    if (file_exists($path)) {
        ob_start();
        require $path;
        $content = ob_get_clean();
        require 'views/layouts/'.$this->layout.'.php';
    }
}
public function redirect($url) {
		header('location: /'.$url);
		exit;
	}
}





