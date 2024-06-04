<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('login', 'Auth::login');
$routes->get('/', 'Auth::login');
$routes->post('auth/login', 'Auth::login');
$routes->get('logout', 'Auth::logout');

$routes->group('admin', ['filter' => 'role'], function ($routes) {
    $routes->get('dashboard', 'Admin::index');
    $routes->get('users', 'Admin::users');
    $routes->get('article', 'Admin::article');
    $routes->get('models', 'Admin::models');
    $routes->get('ml', 'Admin::ml');
    // tambahkan rute admin lainnya
});

$routes->group('jurnalis', ['filter' => 'role'], function ($routes) {
    $routes->get('/', 'Jurnalis::index');
    $routes->get('dashboard', 'Jurnalis::index');
    $routes->get('post', 'Jurnalis::post');
    $routes->get('analyst', 'Jurnalis::analyst');
    $routes->get('setting', 'Jurnalis::setting');
    $routes->post('generate', 'Jurnalis::generate');
    $routes->post('save', 'Jurnalis::saveanalyst');
    $routes->get('detail/(:num)', 'Jurnalis::postdetail/$1');

    // tambahkan rute jurnalis lainnya
});

$routes->get('api/analysts/(:num)', 'Jurnalis::getAnalystDetail/$1');
$routes->post('api/generate', 'Jurnalis::generateapi');
$routes->post('api/preditions', 'Emotion::preditions');




