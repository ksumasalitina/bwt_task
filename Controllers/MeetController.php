<?php
namespace Controllers;
use Models\Meeting;
use App\Controller;
class MeetController extends Controller
{
    public function delete($request)
    {
        $model = new Meeting();
        $model->delete($request);
        header('Location: http://localhost:8888/');
    }

    public function details($request)
    {
        $model = new Meeting();
        $data = $model->get($request);
        return $this->render('details',['data'=>$data]);
    }

    public function changePage($request)
    {
        $model = new Meeting();
        $data = $model->get($request);
        return $this->render('change',['data'=>$data]);
    }

    public function change($request){
        $model = new Meeting();
        $request['date'] = date('Y/m/d H:m', strtotime($request['date']));
        $model->update($request);
        header('Location: http://localhost:8888/');
    }

    public function createPage($request){
        return $this->render('create');
    }
}

