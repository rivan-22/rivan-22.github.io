<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'AuthController::login');
$routes->get('/login', 'AuthController::login');
$routes->get('/register', 'AuthController::register');
$routes->post('/auth/registerAction', 'AuthController::registerAction');
$routes->post('/auth/loginAction', 'AuthController::loginAction');
$routes->get('/auth/logout', 'AuthController::logout');

$routes->get('/user/tampil_data', 'UserController::tampil_data', ['filter' => 'auth']);
$routes->get('/admin/tampil_data', 'UserController::tampil_data', ['filter' => 'auth']);