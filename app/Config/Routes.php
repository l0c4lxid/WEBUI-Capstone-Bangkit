<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('login', 'Auth::login');
$routes->get('/', 'PublicController::trypredictions');
$routes->post('auth/login', 'Auth::login');
$routes->get('logout', 'Auth::logout');

$routes->get('try-predictions', 'PublicController::trypredictions');
$routes->post('postPrediction', 'PublicController::postPrediction');
$routes->get('try-recomendations', 'PublicController::tryrekomendations');
$routes->post('postRecommendation', 'PublicController::postRecommendation');
$routes->get('try-ai', 'PublicController::chatAI');
$routes->post('postChatAI', 'PublicController::postChatAI');

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




