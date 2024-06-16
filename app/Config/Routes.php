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
    $routes->get('/', 'Admin::index');
    $routes->get('dashboard', 'Admin::index');
    $routes->get('predictions', 'Admin::predictions');
    $routes->get('recomendation', 'Admin::recomendation');
    $routes->get('try-predictions', 'Admin::trypredictions');
    $routes->post('postPrediction', 'Admin::postPrediction');
    $routes->get('try-recomendations', 'Admin::tryrekomendations');
    $routes->post('postRecommendation', 'Admin::postRecommendation');
    // tambahkan rute admin lainnya
});


$routes->get('api/analysts/(:num)', 'Jurnalis::getAnalystDetail/$1');
$routes->post('api/generate', 'Jurnalis::generateapi');
$routes->post('api/preditions', 'Emotion::preditions');




