<?php

namespace App\Controllers;

use App\Core\Controller;

class HomeController extends Controller
{
    public static function index(){
        $instance = new self();
        return $instance->view('home');
    }

}