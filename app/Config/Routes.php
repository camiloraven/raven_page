<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('blog', 'Blog::index');
$routes->get('blog/crear', 'Blog::create'); 
$routes->post('blog/guardar', 'Blog::store'); 
$routes->get('blog/(:segment)', 'Blog::show/$1');
$routes->get('login', 'Auth::login');
$routes->post('login/auth', 'Auth::attemptLogin');
$routes->get('logout', 'Auth::logout');