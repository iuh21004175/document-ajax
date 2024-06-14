<?php
    define("APP_ROOT", dirname(__DIR__));


    require APP_ROOT."/vendor/autoload.php";

    if($_SERVER["REQUEST_METHOD"] == "GET"){
        new \App\Core\Api($_GET['route'], json_decode($_GET["data"], true));
    }
    else{
        $json = file_get_contents('php://input');

        $dejson = json_decode($json, true);

        $route = $dejson['route'];

        $data = $dejson['data'];
    }
?>