<?php
declare(strict_types=1);

/**spl_autoload_register(function ($class) {
    $prefix = ['Controller\\','App\\' ];
    $base_dir = [__DIR__ . '/Controllers/', __DIR__ . '/src/'];
    for($i = 0;$i<count($prefix);$i++){
    $len = strlen($prefix[$i]);
    if (strncmp($prefix[$i], $class, $len) !== 0) {
        return;
    }
    $relative_class = substr($class, $len);
    $file = $base_dir[$i] . str_replace('\\', '/', $relative_class) . '.php';
    if (file_exists($file)) {
        require $file;
    }
    }
});**/
require_once('core/Autoloader.php');
// instantiate the loader
     $loader = new \App\Autoloader;

     // register the autoloader
     $loader->register();

   // register the base directories for the namespace prefix

    $loader->addNamespace('App', 'core');
    $loader->addNamespace('Controllers', 'Controllers');
    $loader->addNamespace('Models', 'Models');

require_once 'src/routes.php';
