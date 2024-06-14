<?php
    define("DOMAIN", "http://localhost/document/public/");
    define("DIR_DEFAULT", "/document/public/");
    $url = parse_url($_SERVER['REQUEST_URI'])['path'];
    $url = str_replace(DIR_DEFAULT, "", $url);
    define('PRESENT_ROUTE', strtolower($url));
    define("APP_ROOT", dirname(__DIR__));


    require APP_ROOT."/vendor/autoload.php";

    new \App\Core\Web();
?>
