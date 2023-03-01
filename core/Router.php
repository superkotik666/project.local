<?php

namespace core;



class Router {

    protected $routes = [];
    protected $params = [];
    
    public function __construct() {
        $arr = require 'config/routes.php';
        foreach ($arr as $key => $value){
            $this->add($key, $value);
        }
     
    }
    


// ФУНКЦИЯ ДОБАВЛЕНИЯ МАРШРУТА
    public function add($route, $params) {
    $route = preg_replace('/{([a-z]+):([^\}]+)}/', '(?P<\1>\2)', $route);
    $route = '#^'.$route.'$#';
    $this->routes[$route] = $params;
}
// ПРОВЕРКА МАРШРУТА
public function match() {
    $url = trim($_SERVER['REQUEST_URI'], '/');
    foreach ($this->routes as $route => $params) {
        if (preg_match($route, $url, $matches)) {
            foreach ($matches as $key => $match) {
                if (is_string($key)) {
                    if (is_numeric($match)) {
                        $match = (int) $match;
                    }
                    $params[$key] = $match;
                }
            }
            $this->params = $params;
            return true;
            
        }
    }
    return false;
    
}
//ФУНКЦИЯ ЗАПУСКА РОУТЕРА
public function run(){
    if ($this->match()) {
        $path = 'controllers\\'.ucfirst($this->params['controller']).'Controller';
        if (class_exists($path)) {
            $action = $this->params['action'].'Action';
            if (method_exists($path, $action)) {
                $controller = new $path($this->params);
                $controller->$action();
            } else {
                echo 'не найден action : '. $action;
            }
        } else {
            echo 'не найден controller : '. $path;
        }
    } else {
        echo 'не найден данный маршрут!!!';
    }
}
    }


