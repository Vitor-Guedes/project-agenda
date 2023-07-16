<?php

$http = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https://" : "http://";  

$BASE_URL = $http . $_SERVER['HTTP_HOST'];

$CURRENT_URL = $http . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; 

$URL_PATH = parse_url($CURRENT_URL)['path'];

$path = array_filter(explode('/', $URL_PATH));
$id = null;

$base = '../pages';

$TEMPLATE = '/home.php';

if (count($path) > 0) {
    if (in_array('process', $path)) {
        $base = $base . '/' . array_shift($path);
        $TEMPLATE = '/' . array_shift($path) . '.php';
    } else {
        $TEMPLATE = '/' . array_shift($path) . '.php';
    
        $id = array_shift($path);
    }

}

$TEMPLATE = $base . $TEMPLATE;

if (!file_exists($TEMPLATE)) {
    $TEMPLATE = $base . "/404.php";
}