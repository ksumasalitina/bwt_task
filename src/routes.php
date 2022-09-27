<?php
use App\Router;
use Controllers\HomeController;
use Controllers\MeetController;

$router = new Router();

$router->get('/', HomeController::class .'::showPage');

$router->post('/delete', MeetController::class .'::delete');

$router->get('/details',MeetController::class .'::details');

$router->get('/change_page', MeetController::class .'::changePage');

$router->run();
