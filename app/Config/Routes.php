<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('sopir', 'Sopir::index'); // Route untuk menampilkan halaman index
$routes->get('sopir/json', 'Sopir::showSimpleJson'); // Route untuk menampilkan JSON sederhana dari sopir
$routes->get('sopir/data', 'Sopir::getSopirData'); // Route untuk mendapatkan sopir dalam format JSON
$routes->post('sopir/store', 'Sopir::create'); // Route untuk menyimpan data sopir
$routes->get('sopir/datasopir', 'Sopir::getSopirDataJson'); // Route untuk mendapatkan data sopir dalam format JSON
$routes->post('sopir/update/(:num)', 'Sopir::update/$1'); // Route untuk mengupdate data berdasarkan id
$routes->delete('sopir/delete/(:num)', 'Sopir::delete/$1');
$routes->get('sopir/show/(:num)', 'Sopir::show/$1');  
