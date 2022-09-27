<?php

namespace App;

class Controller
{
    public function render($path, $data = [])
    {
        $fullPath = __DIR__ . '/../Views/' . $path . '.php';

         if (!file_exists($fullPath)) {
            throw new \ErrorException(require_once 'Views/404.php');
        }

         if (!empty($data)) {
                    foreach ($data as $key => $value) {
                            $$key = $value;
             }
         }
        return require_once ($fullPath);
    }
}
