<?php

require __DIR__ . '/app/init.php';
require __DIR__.'/vendor/autoload.php';

#allowDangerousWebUsageAtMyOwnRisk at here
         

$routeExplode = explode('?', $_SERVER['REQUEST_URI']);
$route = array_values(array_filter(explode('/', $routeExplode[0])));
if (SUBFOLDER_NAME != '/'){
    array_shift($route);
}

if (!route(0)){
    $route[0] = 'index';
}

if (!file_exists(controller(route(0)))){
    $route[0] = '404';
}

if (setting('maintenance_mode') == 1 && route(0) != 'admin'){
    $route[0] = 'maintenance-mode';
}


if (!session('user_mail') || !session('user_password')){
    $route[0] = 'login';
}else{

    $ig = new \InstagramAPI\Instagram();

    $username = $config['account']['username'];
    $password = $config['account']['password'];

    try {
        $ig->login($username, $password);
    } catch (\Exception $e) {
        
    }
}


$menus = [
    [
        'url' => 'index',
        'title' => 'Anasayfa',
        'icon' => 'home',
    ]
];


require controller(route(0));
