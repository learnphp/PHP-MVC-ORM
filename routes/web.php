<?php

$router->get('/', function() {echo "Welcome to my ORM mini project";});

$router->get('/register', 'UserController@registerForm');
$router->get('/login', 'UserController@loginForm');

$router->post('/register', 'UserController@register');
$router->post('/login', 'UserController@login');


return $router;
