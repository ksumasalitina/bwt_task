<?php
declare(strict_types=1);
namespace App;

class Router {
    private array $actions;

    public function get(string $path, $action){
        $this->actions['GET' . $path] = [
            'path'=>$path,
            'method'=>'GET',
            'action'=>$action
        ];
    }

    public function post(string $path, $action){
        $this->actions['POST' . $path] = [
            'path'=>$path,
            'method'=>'POST',
            'action'=>$action
        ];
    }

    public function run(){
        $uri = parse_url($_SERVER['REQUEST_URI']);
        $path = $uri['path'];
        $method = $_SERVER['REQUEST_METHOD'];
        $func = null;
        foreach ($this->actions as $action){
            if($action['path'] === $path && $action['method'] === $method){
                $func = $action['action'];
            }
        }

        if(is_string($func)){
            $parts = explode('::', $func);
            if(is_array($parts)){
                $className = array_shift($parts);
                $action = new $className;
                $method = array_shift($parts);
                $func = [$action, $method];
            }
        }

        if(!$func){
            include 'Views/404.php';
            die();
        }

        call_user_func_array($func,[
            array_merge($_GET,$_POST)
        ]);
    }
}
