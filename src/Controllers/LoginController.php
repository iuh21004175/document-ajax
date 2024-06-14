<?php

namespace App\Controllers;

use App\Core\Controller;

class LoginController extends Controller
{
    public static function index(){
        $instance = new self();
        return $instance->view('login');
    }
    public static function checkLogin($username, $password){
        $instance = new self();
        $modelLogin = $instance->model('AccountModel');
        $result = $modelLogin->getAccount($username, md5($password));
        if(!$result){
            return json_encode(array('message' => 'Wrong username or password', 'status' => false));
        }
        else{
            return json_encode(array('message' => 'Login successful', 'status' => true));
        }
    }
}