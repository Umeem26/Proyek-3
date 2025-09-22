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
    $routes->put('mahasiswa/update/(:num)', 'Mahasiswa::update/$1');

    $routes->get('mahasiswa/delete/(:num)', 'Mahasiswa::delete/$1');

    $routes->get('mahasiswa/profil', 'Mahasiswa::profil');
    $routes->get('course', 'CourseController::index');
    $routes->get('course/new', 'CourseController::new');
    $routes->post('course/create', 'CourseController::create');
    $routes->get('course/edit/(:num)', 'CourseController::edit/$1');
    $routes->put('course/update/(:num)', 'CourseController::update/$1');
    $routes->get('course/delete/(:num)', 'CourseController::delete/$1');

    $routes->get('enrollment', 'EnrollmentController::index');
    $routes->post('enrollment/process', 'EnrollmentController::processEnrollment');
});