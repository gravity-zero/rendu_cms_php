<?php

namespace CMS_PHP\Controllers;

class Router
{

    private $url;
    private $routes = [];
    private $namedRoutes = [];
    private $route;
    public $renderer;

    public function __construct($url, $renderer){
        $this->url = $url;
        $this->renderer = $renderer;
    }

    public function get($path, $callable, $name = null){
        return $this->add($path, $callable, $name, 'GET');
    }

    public function post($path, $callable, $name = null){
        return $this->add($path, $callable, $name, 'POST');
    }

    private function add($path, $callable, $name, $method){
        $this->route = new Route($path, $callable);

        $this->routes[$method][] = $this->route;
        if(is_string($callable) && $name === null){
            $name = $callable;
        }
        if($name) {
            $this->namedRoutes[$name] = $this->route;
        }
        return $this->route;
    }

    public function run(){
        if(!isset($this->routes[$_SERVER['REQUEST_METHOD']])){
            throw new RouterException('REQUEST_METHOD does not exist');
        }

        foreach($this->routes[$_SERVER['REQUEST_METHOD']] as $route){
            if($route->match($this->url)){
                return $route->call();
            }
        }
        //TODO
        //REQUIRE PAGE ERREUR
        //throw new RouterException('No matching routes');
        $this->renderer->login();
    }

    public function url($name, $params = []){
        if(!isset($this->namedRoutes[$name])){
            throw new RouterException('No route matches this name');
        }
        return $this->namedRoutes[$name]->getUrl($params);
    }

}

