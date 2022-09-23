<?php

use Couchbase\View;

class HomeController{
    static public function showPage(){
        return require_once ('Views/home.php');
    }
}
