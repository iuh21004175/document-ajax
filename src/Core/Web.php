<?php

namespace App\Core;
use App\Controllers\HomeController;
use App\Controllers\LoginController;
use App\Controllers\ProductController;

class Web
{
    private $route;
    public function __construct()
    {
        $this->route = new Route();
        $this->route->get("", [LoginController::class, 'index']);
        $this->route->get("home", [HomeController::class, 'index']);
        $this->route->get("product", [ProductController::class, 'index']);
    }

    public function __destruct()
    {
        switch ($_SERVER["REQUEST_METHOD"]) {
            case "GET":
                echo call_user_func($this->route->getRoute()['GET'][PRESENT_ROUTE]);
                break;
            case "POST":
                echo call_user_func($this->route->getRoute()['POST'][PRESENT_ROUTE]);
                break;
            case "PUT":
                echo call_user_func($this->route->getRoute()['PUT'][PRESENT_ROUTE]);
                break;
            case "DELETE":
                echo call_user_func($this->route->getRoute()['DELETE'][PRESENT_ROUTE]);
        }
        // TODO: Implement __destruct() method.
    }


}