<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/productos', 'Producto::index');
$routes->post('/productos/nuevo', 'Producto::registrar');
$routes->get('/animales', 'Animal::index');
$routes->post('/animales/nuevo', 'Animal::registrarAnimal');
$routes->get('/productos/listado', 'Producto::buscar');
$routes->get('/productos/eliminar/(:num)', 'Producto::eliminar/$1');
$routes->post('/productos/editar/(:num)', 'Producto::editar/$1');
$routes->get('/animales/listado', 'Animal::buscarAnimal');
$routes->get('/animales/eliminar/(:num)', 'Animal::eliminar/$1');
$routes->post('/animales/editar/(:num)', 'Animal::editar/$1');
$routes->post('/animales/filtrar/(:num)', 'Animal::filtrar/$1');

$routes->group('',['filter'=>'AuthCheck'], function($routes){
    $routes->get('/users', 'Users::index');
    $routes->get('/users/list', 'Users::buscarUsers');
    $routes->get('/users/profile', 'Users::profile');
});


$routes->group('',['filter'=>'AlreadyLoggedIn'], function($routes){
    $routes->get('/auth', 'Auth::index');
    $routes->get('/auth/register', 'Auth::register');
});

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
