<?php

namespace App\Core;

use eftec\bladeone\BladeOne;

class Controller
{
    public function model($model)
    {
        $srtModel = "App\\Models\\" . $model;
        return new $srtModel();
    }
    public function view($view, $data = []){
        $blade = new BladeOne(APP_ROOT.'/src/Views', APP_ROOT.'/src/Views/Cache');
        return $blade->run($view, $data);
    }
}