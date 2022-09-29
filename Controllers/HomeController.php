<?php

namespace Controllers;
use Models\Meeting;
use App\Controller;

class HomeController extends Controller
{
    public function showPage() //Отображение главной страницы
    {
        $model = new Meeting();
        $data = $model->all();
        return $this->render('home',['data'=>$data]);
    }
}
