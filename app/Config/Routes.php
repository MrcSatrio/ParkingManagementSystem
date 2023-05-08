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
//$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

//login & Register, LOGOUT
$routes->get('/', 'Home::index');
$routes->post('/register', 'Auth\Auth::register');
$routes->post('/login', 'Auth\Auth::login');
$routes->get('/logout', 'Auth\Auth::logout');

//role admin

//role keuangan
$routes->get('/tambahmhs', 'Keuangan\Keuangan::tambah');

//role operator

//role user
$routes->get('/profileuser', 'User\User::profile');

///////////////////////////////////////////////////////////////////////////////////////////////////////////
//FILTERSS
//role admin
$routes->group('admin', ['filter' => 'roleFilter'], function ($routes) {
    $routes->get('index', 'Admin\Admin::index');

});
//role keuangan
$routes->group('keuangan', ['filter' => 'roleFilter'], function ($routes) {
    $routes->get('index', 'Keuangan\Keuangan::index');
    //$routes->get('tambah', 'Keuangan\Keuangan::tambah');
    
});
//role operator
$routes->group('operator', ['filter' => 'roleFilter'], function ($routes) {
    $routes->get('index', 'Operator\Operator::index');
});
//role user
$routes->group('user', ['filter' => 'roleFilter'], function ($routes) {
    $routes->get('index', 'User\User::index');
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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
