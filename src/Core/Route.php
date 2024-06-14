<?php

namespace App\Core;


class Route
{
    private $routers = array();
    public function __construct()
    {
        $this->routers['GET'] = array();
        $this->routers['POST'] = array();
        $this->routers['PUT'] = array();
        $this->routers['DELETE'] = array();
    }


    public function get($url, $callback)
    {
        $this->routers['GET'][$url] = $callback;
    }
    public function post($url, $callback){
        $this->routers['POST'][$url] = $callback;
    }
    public function put($url, $callback){
        $this->routers['PUT'][$url] = $callback;
    }
    public function delete($url, $callback){
        $this->routers['DELETE'][$url] = $callback;
    }
    public function getRoute()
    {
        return $this->routers;
    }
}