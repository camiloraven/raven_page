<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// 1. Ruta para la raíz con idioma (ej: /es o /en)
$routes->get('{locale}', 'Home::index');

// 2. Ruta para la raíz por defecto (redirige o carga idioma default)
$routes->get('/', 'Home::index');

// 3. Grupo para todas tus rutas existentes
$routes->group('{locale}', function($routes) {
    
    $routes->get('blog', 'Blog::index');
    $routes->get('blog/create', 'Blog::create'); 
    $routes->post('blog/guardar', 'Blog::store'); 
    $routes->get('blog/edit/(:num)', 'Blog::edit/$1');
    $routes->post('blog/update/(:num)', 'Blog::update/$1');
    $routes->post('blog/delete/(:num)', 'Blog::delete/$1');
    $routes->get('blog/(:segment)', 'Blog::show/$1');
    
    $routes->get('login', 'Auth::login');
    $routes->post('login/auth', 'Auth::attemptLogin');
    $routes->get('logout', 'Auth::logout');
});