<?php

define('PATH', realpath('.'));
define('SUBFOLDER_NAME', dirname($_SERVER['SCRIPT_NAME']));
define('URL', 'http://' . $_SERVER['SERVER_NAME'] . (SUBFOLDER_NAME == '/' ? null : SUBFOLDER_NAME));

return [
    'db' => [
        'name' => 'insta',
        'host' => 'localhost',
        'user' => 'root',
        'pass' => '123asd'
    ],
    'account' =>[
        'username' => 'username',
        'password' => 'pass'
    ]
];
