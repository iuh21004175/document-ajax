<?php

namespace App\Core;

use App\Controllers\LoginController;
use App\Controllers\ProductController;

class Api
{
    private $route;
    private $presentRoute;
    private $value;
    public function __construct($route, $value)
    {
        $this->presentRoute = $route;
        $this->route = new Route();
        $this->value = $value;
        $this->route->post('login', [LoginController::class, 'checkLogin']);
        $this->route->get('product', [ProductController::class, 'getProductByPage']);
    }
    public function __destruct()
    {

        switch ($_SERVER["REQUEST_METHOD"]) {
            case "GET":
                echo call_user_func_array($this->route->getRoute()['GET'][$this->presentRoute], $this->value);
                break;
            case "POST":
                echo call_user_func_array($this->route->getRoute()['POST'][$this->presentRoute], $this->value);
                break;
            case "PUT":
                echo call_user_func_array($this->route->getRoute()['PUT'][$this->presentRoute], $this->value);
                break;
            case "DELETE":
                echo call_user_func_array($this->route->getRoute()['DELETE'][$this->presentRoute], $this->value);
        }
    }
}