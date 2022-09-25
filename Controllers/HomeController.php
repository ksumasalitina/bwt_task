<?php

//namespace Controllers;
class HomeController{
    static public function showPage(){
        return require_once ('Views/home.php');
    }
}
