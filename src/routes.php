<?php


/** For request options http method */
$app->options('/{routes:.+}', function($request, $response, $args) {
    return $response;
});

/** =============== ROUTES =============== */
$app->get('/', 'HomeController:home')->setName('home');

$app->post('/login', 'LoginController:login')->setName('login');

$app->group('/api', function(Slim\App $app) { 
    $app->get('/users', 'UserController:index')->setName('userList');
    $app->get('/users/{loginname}', 'UserController:getUser')->setName('getUser');
});
/** =============== ROUTES =============== */

/** use this route if page not found. */
$app->map(['GET', 'POST', 'PUT', 'DELETE', 'PATCH'], '/routes:.+', function ($req, $res) {
    /** using default slim page not found handler. */
    $handler = $this->notFoundHandler;

    return $handler($req, $res);
});
