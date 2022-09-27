<?php

namespace Controllers;
use Models\Meeting;
use App\Controller;

class HomeController extends Controller
{
    public function showPage()
    {
        $model = new Meeting();
        $data = $model->all();
        return $this->render('home',['data'=>$data]);
    }
}
