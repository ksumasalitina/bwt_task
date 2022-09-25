<?php
use App\Router;

$router = new Router();

$router->get('/', function (){
    echo 'Hello World!';
});
$router->get('/about', function (){
    echo 'About Page!';
});

$router->run();
