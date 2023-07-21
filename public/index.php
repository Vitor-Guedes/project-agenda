<?php

use GuedesRouter\App;

define('BASE_DIR', dirname(__DIR__));

require_once(BASE_DIR . '/vendor/autoload.php');

try {
    session_start();

    $app = new App($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);

    require_once(BASE_DIR . '/src/Routes/collection.php');
    
    require_once(BASE_DIR . '/src/Helpers/helper.php');

    echo $app->run();
} catch (Exception $e) {
    echo $e->getMessage();
}