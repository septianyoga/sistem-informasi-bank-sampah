<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// route login
$routes->get('/login', 'Login::index');
$routes->post('/login', 'Login::proses_login');

// route logout
$routes->get('/logout', 'Login::logout');

// route admin
$routes->get('/admin', 'Admin::index');

// route user
$routes->get('/user', 'User::index');
$routes->post('/user', 'User::tambah_user');
$routes->get('/user/(:num)', 'User::edit/$1');
$routes->post('/user/proses_edit', 'User::proses_edit');
$routes->get('/user/(:num)/hapus', 'User::hapus/$1');

// route operator
$routes->get('/operator', 'Operator::index');

// route input data sampah
$routes->get('/input_sampah', 'Sampah::input_sampah');
$routes->post('/input_sampah', 'Sampah::insert_sampah');

// route staff
$routes->get('/staff', 'Staff::index');

// route sampah
$routes->get('/sampah', 'Sampah::index');
$routes->post('/sampah/verif_sampah', 'Sampah::verif_sampah');
$routes->get('/kelola_sampah', 'Sampah::kelola_sampah');
$routes->get('/kelola_sampah/(:num)', 'Sampah::edit/$1');
$routes->post('/kelola_sampah/proses_edit', 'Sampah::proses_edit');

// route print sampah
$routes->get('/print_sampah', 'PrintSampah::index');
$routes->get('/print_sampah/print', 'PrintSampah::print');
