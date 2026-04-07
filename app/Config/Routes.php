<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'AuthController::login');
$routes->get('/login', 'AuthController::login');
$routes->post('/login', 'AuthController::loginProcess');
$routes->get('/register', 'AuthController::register');
$routes->post('/register', 'AuthController::registerProcess');
$routes->get('/logout', 'AuthController::logout');

$routes->group('', ['filter' => 'auth'], function($routes) {
    $routes->get('/dashboard', 'DashboardController::index');
    
    $routes->group('profile', function($routes) {
        $routes->get('/', 'ProfileController::index');
        $routes->get('edit', 'ProfileController::edit');
        $routes->post('update', 'ProfileController::update');
    });
    
    $routes->get('barang', 'BarangController::index');
    $routes->get('barang/search', 'BarangController::search');

    $routes->group('barang', ['filter' => 'auth:admin'], function($routes) {
        $routes->get('create', 'BarangController::create');
        $routes->post('store', 'BarangController::store');
        $routes->get('edit/(:num)', 'BarangController::edit/$1');
        $routes->post('update/(:num)', 'BarangController::update/$1');
        $routes->get('delete/(:num)', 'BarangController::delete/$1');
    });

    $routes->get('kategori', 'KategoriController::index');
    $routes->get('kategori/detail/(:num)', 'KategoriController::detail/$1');
    
    $routes->group('kategori', ['filter' => 'auth:admin'], function($routes) {
        $routes->get('create', 'KategoriController::create');
        $routes->post('store', 'KategoriController::store');
        $routes->get('edit/(:num)', 'KategoriController::edit/$1');
        $routes->post('update/(:num)', 'KategoriController::update/$1');
        $routes->get('delete/(:num)', 'KategoriController::delete/$1');
    });
    
    $routes->group('user', ['filter' => 'auth:admin'], function($routes) {
        $routes->get('/', 'UserController::index');
        $routes->get('create', 'UserController::create');
        $routes->post('store', 'UserController::store');
        $routes->get('edit/(:num)', 'UserController::edit/$1');
        $routes->post('update/(:num)', 'UserController::update/$1');
        $routes->get('delete/(:num)', 'UserController::delete/$1');
    });
    
    $routes->group('peminjaman', function($routes) {
        $routes->get('/', 'PeminjamanController::index');
        $routes->get('create', 'PeminjamanController::create');
        $routes->post('store', 'PeminjamanController::store');
        $routes->get('detail/(:num)', 'PeminjamanController::detail/$1');
        $routes->get('export', 'PeminjamanController::export', ['filter' => 'auth:admin,petugas']);
        $routes->get('validasi/(:num)', 'PeminjamanController::validasi/$1', ['filter' => 'auth:admin,petugas']);
        $routes->post('proses-validasi/(:num)', 'PeminjamanController::prosesValidasi/$1', ['filter' => 'auth:admin,petugas']);
        $routes->get('kembalikan/(:num)', 'PeminjamanController::kembalikan/$1', ['filter' => 'auth:admin,petugas']);
    });
    
    $routes->get('log-aktivitas', 'LogAktivitasController::index', ['filter' => 'auth:admin']);
});
