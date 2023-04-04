<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

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
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/Opal', 'Home::Opal');
$routes->get('/mahasiswa', 'C_Mahasiswa::index');
$routes->get('/mahasiswa/create', 'C_Mahasiswa::create');
$routes->get('/mahasiswa/edit/(:segment)', 'C_Mahasiswa::edit/$1');
$routes->post('/mahasiswa/update', 'C_Mahasiswa::update');
$routes->post('/mahasiswa/save', 'C_Mahasiswa::save');
$routes->get('/home', 'C_home::index');
$routes->get('/info', 'C_info::index');
$routes->post('/mahasiswa/search', 'C_mahasiswa::Search_Data');
$routes->get('/mahasiswa/detail/(:segment)', 'C_mahasiswa::detail/$1');

$routes->get('/toko', 'C_Toko::index');
$routes->get('/keranjang/list', 'C_Keranjang::index');
$routes->post('/keranjang', 'C_Keranjang::savekeranjang');
$routes->delete('/keranjang/delete/(:segment)', 'C_Keranjang::delete/$1');
$routes->get('/pegawai', 'C_Pegawai::index');
$routes->get('/pegawai/create', 'C_Pegawai::create');
$routes->post('/pegawai/save', 'C_Pegawai::save');

$routes->get('/login', 'C_Login::index');
$routes->post('/login/process', 'C_Login::process');
$routes->get('/logout', 'C_Login::logout');

$routes->get('/checkout', 'C_Toko::checkout');
$routes->post('/checkout', 'C_Toko::storeCheckout');


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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
