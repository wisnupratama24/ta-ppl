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

$routes->get('logout', 'Auth::logout');

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


$routes->group('loker', function ($routes) {
	$routes->get('/', 'Loker::index');
});

$routes->group('news', function ($routes) {
	$routes->get('/', 'News::index');
	$routes->get('detail/(:any)', 'News::detail/$1');
});

$routes->group('marketplace', function ($routes) {
	$routes->get('/', 'Marketplace::index');
	$routes->get('form/(:any)', 'Marketplace::form/$1', ['filter' => 'checkMenuLogin']);
	// $routes->get('form', 'Marketplace::form', ['filter' => 'checkMenuLogin']);
	$routes->get('list', 'Marketplace::list', ['filter' => 'checkMenuLogin']);
	$routes->get('detail/(:any)', 'Marketplace::detail/$1');
	$routes->post('submit/(:any)', 'Marketplace::submit/$1', ['filter' => 'checkMenuLogin']);
	$routes->post('delete', 'Marketplace::delete', ['filter' => 'checkMenuLogin']);
});

$routes->group('loker', function ($routes) {
	$routes->get('/', 'Loker::index');
	$routes->get('form/(:any)', 'Loker::form/$1', ['filter' => 'checkMenuLogin']);
	$routes->get('list', 'Loker::list', ['filter' => 'checkMenuLogin']);
	$routes->get('detail/(:any)', 'Loker::detail/$1', ['filter' => 'checkMenuLogin']);
	$routes->post('submit/(:any)', 'Loker::submit/$1', ['filter' => 'checkMenuLogin']);
	$routes->post('delete', 'Loker::delete', ['filter' => 'checkMenuLogin']);
});

$routes->group('news', function ($routes) {
	$routes->get('/', 'News::index');
});

$routes->group('admin', function ($routes) {
	$routes->get('/', 'Admin::index');


	$routes->group('berita', function ($routes) {
		$routes->get('/', 'Berita::index');
		$routes->get('form/(:any)', 'Berita::form/$1');
		$routes->get('form', 'Berita::form');
		$routes->post('submit/(:any)', 'Berita::submit/$1');
		$routes->post('submit', 'Berita::submit');
		$routes->post('delete', 'Berita::delete');
	});
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
