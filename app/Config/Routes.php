<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
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
$routes->get('/dashboard', 'Home::dashboard');
$routes->get('/auth/login', 'Auth::index');
$routes->delete('/ruangan/(:num)', 'Ruangan::delete/$1');
$routes->get('/ruangan/ubah/(:any)/(:num)', 'Ruangan::ubah_data/$1/$2');
$routes->get('/ruangan/tambah/(:any)', 'Ruangan::tambah_data/$1');
$routes->get('/ruangan/(:any)', 'Ruangan::index/$1');

$routes->get('/master', 'Master::index');
$routes->delete('/master/(:num)', 'Master::delete/$1');
$routes->get('/master/ubah/(:num)', 'Master::ubah/$1');
$routes->get('/master/tambah', 'Master::tambah');

$routes->get('/settings/(:num)', 'Auth::settings/$1');


$routes->get('/user', 'User::index');
$routes->delete('/user/(:num)', 'User::delete/$1');
$routes->get('/user/ubah/(:num)', 'User::ubah_user/$1');
$routes->get('/user/tambah', 'User::tambah_user');

$routes->get('/api/json', 'Ruangan::dataJSON');
$routes->get('/api/xml', 'Ruangan::dataXML');

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
