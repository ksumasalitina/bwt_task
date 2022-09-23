<?php
class App{
    private $routes =[];

    static public function route(string $path, callable $callback) {
        global $routes;
        $routes[$path] = $callback;
    }

    static public function run() {
        global $routes;
        $uri = $_SERVER['REQUEST_URI'];
        $found = false;
        foreach ($routes as $path => $callback) {
            if ($path !== $uri) continue;

            $found = true;
            $callback();
        }
        if (!$found) {
            $notFoundCallback = $routes['/404'];
            $notFoundCallback();
        }
    }
}
