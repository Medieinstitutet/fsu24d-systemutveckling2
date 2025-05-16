<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/newsletters/', 'Newsletters::index');
$routes->get('/newsletters/(:segment)', 'Newsletters::single/$1');

$routes->get('/sign-in/logged-out/', 'Message::index/signedOut');
$routes->get('/my-account/', 'Message::index/signedIn');
$routes->get('/no-access/', 'Message::index/noAccess');

$routes->post('/login/', 'Login::login');