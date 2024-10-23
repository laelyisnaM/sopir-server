<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('sopir', 'Sopir::index'); // Route untuk menampilkan halaman index
$routes->get('sopir/json', 'Sopir::showSimpleJson'); // Route untuk menampilkan JSON sederhana dari pemesanan mobil (pastikan method ada di controller)
$routes->get('sopir/data', 'Sopir::getSopir'); // Route untuk mendapatkan pemesanan mobil dalam format JSON
$routes->post('sopir/store', 'Sopir::create'); // Route untuk menyimpan data pemesanan mobil
$routes->get('sopir/data-pemesanan', 'Sopir::getSopirDataJson'); // Route untuk mendapatkan data Pemesanan mobil dalam format JSON
$routes->post('sopir/update/(:num)', 'Sopir::update/$1'); // Route untuk mengupdate data berdasarkan id
$routes->delete('sopir/delete/(:num)', 'Sopir::delete/$1'); // Route untuk menghapus data berdasarkan id
$routes->get('sopir/show/(:num)', 'Sopir::show/$1'); // Route untuk menampilkan data berdasarkan id
