<?php

if (!function_exists('view')) {
    function view(string $template, array $vars = []) {
        global $app;
        $vars['app'] =$app;

        $file = BASE_DIR . '/src/Views/' . $template . '.php';

        if (!file_exists($file)) {
            throw new Exception("Template: {$template} não foi encontrado no diretorio de views");
        }
        extract($vars);
        require_once($file);
    }
}

if (!function_exists('component')) {
    function component(string $component) {
        $file = BASE_DIR . '/src/Views/components/' . $component . '.php';

        if (!file_exists($file)) {
            return "";
        }

        global $app;
        extract(['app' => $app]);
        require_once($file);
    }
}

if (!function_exists('router')) {
    function router(string $route) {
        global $app;
        return $app->getRoutePathByName($route);
    }
}

if (!function_exists('getBaseUrl')) {
    function getBaseUrl() {
        $http = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https://" : "http://";  
        return $http . $_SERVER['HTTP_HOST'];
    }
}