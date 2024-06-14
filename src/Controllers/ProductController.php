<?php

namespace App\Controllers;

use App\Core\Controller;

class ProductController extends Controller
{
    public static function index(){
        $instance = new self();
        $model = $instance->model('ProductModel');
        $countProducts = iterator_count($model->readAllProducts());
        return $instance->view('product', ['count_product' => $countProducts]);
    }
    public static function getProductByPage($page, $step){
        $instance = new self();
        $model = $instance->model('ProductModel');
        $data = $model->readProductByPage($page, $step);


        return json_encode(array('count' => count($data), 'data' => $data));
    }

}