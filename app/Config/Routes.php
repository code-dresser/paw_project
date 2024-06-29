<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');
// Auth routes
$routes->get('/login','Auth::show_view');
$routes->post('/auth/registerUser','Auth::registerUser');
$routes->post('/auth/loginUser','Auth::loginUser');
$routes->get('/logout', 'Auth::logout');
//User routes
$routes->get("/userPanel",'UserController::user_view');
$routes->post("/userPanel",'UserController::update_user');
$routes->get('/', 'UserController::shop_view');
$routes->post('/cart', 'UserController::cart');
//Seller routes
$routes->get('/products', 'SellerController::seller_view');
$routes->get('/product', 'SellerController::product');
$routes->get('/product/(:num)', 'SellerController::product/$1');
$routes->post('/saveProduct', 'SellerController::save');
//Admin routes
$routes->get('/admin', 'AdminController::admin_view');
$routes->get('/adminForm', 'AdminController::admin_seller_form');
$routes->get('/admin_history', 'AdminController::admin_purchase_history');