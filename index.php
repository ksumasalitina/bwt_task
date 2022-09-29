<?php
declare(strict_types=1);

require_once('core/Autoloader.php');

     $loader = new \App\Autoloader;

     $loader->register();

    $loader->addNamespace('App', 'core');
    $loader->addNamespace('Controllers', 'Controllers');
    $loader->addNamespace('Models', 'Models');

require_once 'src/routes.php';
