<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// == RUTE PUBLIK (Bisa diakses tanpa login) ==
$routes->get('/', 'Home::index');
$routes->get('/login', 'AuthController::index');
$routes->post('/auth/process', 'AuthController::process');
$routes->get('/logout', 'AuthController::logout');


// == RUTE TERPROTEKSI (Wajib login untuk akses) ==
// Semua rute di dalam grup ini akan dijaga oleh filter 'auth'
$routes->group('', ['filter' => 'auth'], function($routes) {
    
    // Rute untuk halaman home setelah login (jika ada)
    $routes->get('home', 'Home::index');

    // Rute untuk mahasiswa
    $routes->get('mahasiswa', 'Mahasiswa::index');
    $routes->get('mahasiswa/detail/(:num)', 'Mahasiswa::detail/$1');

    $routes->get('mahasiswa/create', 'Mahasiswa::create');
    $routes->post('mahasiswa/store', 'Mahasiswa::store');

    $routes->get('mahasiswa/edit/(:segment)', 'Mahasiswa::edit/$1');
    $routes->post('mahasiswa/update/(:segment)', 'Mahasiswa::update/$1');

    $routes->get('mahasiswa/delete/(:segment)', 'Mahasiswa::delete/$1');
});