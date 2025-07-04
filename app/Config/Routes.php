<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//$routes->get('/', 'Home::index');
//$routes->get('admin/dashboard', 'Admin::dashboard', ['filter' => 'role:admin']);
//$routes->get('user/dashboard', 'User::dashboard', ['filter' => 'role:user']);
//$routes->get('login', 'Login::index');       // Menampilkan form login
//$routes->post('login', 'Login::login');      // Menangani proses login
//$routes->get('logout', 'Login::logout');     // (opsional) untuk logout
$routes->get('/', function () {
    return redirect()->to('/login');
});
//$routes->get('/', 'Home::index');
$routes->get('login', 'Auth::loginForm');
$routes->post('login', 'Auth::doLogin');
$routes->get('logout', 'Auth::logout');
$routes->get('securepage', 'SecurePage::index', ['filter' => 'auth']);
$routes->get('unauthorized', 'SecurePage::unauthorized');
$routes->get('quiz/level1', 'Quiz::level1');
$routes->post('quiz/submitLevel1', 'Quiz::submitLevel1');
$routes->get('quiz/level2', 'Quiz::level2');
$routes->post('quiz/submitLevel2', 'Quiz::submitLevel2');
$routes->get('quiz/success', 'Quiz::success');
