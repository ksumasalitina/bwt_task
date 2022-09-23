<?php
require_once ('app.php');
require_once ('Controllers/HomeController.php');

App::route('/', HomeController::showPage());

App::route('/login', function () {
    echo "Login Page";
});

App::route('/about-us', function () {
    echo "About Us";
});

App::route('/404', function () {
    echo "Page not found";
});

