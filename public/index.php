<?php
session_start();

require_once '../core/Router.php';
require_once '../core/Controller.php';
require_once '../config/database.php';

require_once '../app/Controllers/PostController.php';
require_once '../app/Controllers/UserController.php';

$router = new Router();

$router->get('/', 'UserController@register');
$router->get('/auth/register', 'UserController@register');
$router->get('/auth/login', 'UserController@login');
$router->post('/auth/register', 'UserController@store');
$router->post('/auth/logout', 'UserController@logout');
$router->post('/auth/login', 'UserController@loginstore');

$router->get('/post/index', 'PostController@index');
$router->get('/post/create', 'PostController@create');
$router->post('/post/store', 'PostController@store');
$router->get('/post/show', 'PostController@show');
$router->get('/post/edit', 'PostController@edit');
$router->post('/post/update', 'PostController@update');
$router->get('/post/delete', 'PostController@destroy');

$router->dispatch();
