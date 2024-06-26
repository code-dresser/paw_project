<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');
$routes->get('/login','Auth::show_view');
$routes->post('/auth/registerUser','Auth::registerUser');
$routes->post('/auth/loginUser','Auth::loginUser');
$routes->get("/userPanel",'UserController::user_view');
$routes->get('/', 'UserController::shop_view');
$routes->post('/cart', 'UserController::cart');
$routes->get('/logout', 'Auth::logout');

