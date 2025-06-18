<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

 //Buku
$routes->get('/', 'Home::index');
$routes->resource('buku');
$routes->get('buku', 'Buku::index');
$routes->get('buku/(:num)', 'Buku::show/$1');
$routes->post('buku', 'Buku::create');
$routes->put('buku/(:num)', 'Buku::update/$1');
$routes->delete('buku/(:num)', 'Buku::delete/$1');

//Peminjaman
$routes->get('/', 'Home::index');
$routes->resource('peminjaman');
$routes->get('peminjaman', 'Peminjaman::index');
$routes->get('peminjaman/(:num)', 'Peminjaman::show/$1');
$routes->post('peminjaman', 'Peminjaman::create');
$routes->put('peminjaman/(:num)', 'Peminjaman::update/$1');
$routes->delete('peminjaman/(:num)', 'Peminjaman::delete/$1');