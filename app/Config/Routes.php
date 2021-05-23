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

$routes->group('login', function ($routes) {
	$routes->get('/', 'Auth::login');
	$routes->post('process', 'Auth::login_process');
});

$routes->group('password', function ($routes) {
	$routes->get('forgot', 'Auth::forgot_password');
	$routes->post('forgot/process', 'Auth::forgot_password_process');
	$routes->post('reset/process', 'Auth::reset_password_process');
	$routes->get('reset/(:any)', 'Auth::reset_password/$1');
});


$routes->group('register', function ($routes) {
	$routes->get('/', 'Auth::register');
	$routes->get('aktivasi/(:any)', 'Auth::aktivasi/$1');
	$routes->post('aktivasi', 'Auth::process_aktivasi');
	$routes->post('process', 'Auth::process_register');
});



$routes->group('admin', function ($routes) {
	$routes->get('dashboard', 'Dashboard::index');
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
