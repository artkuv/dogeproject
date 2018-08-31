<?php
/**
 * Файл с конфигурацией роутера
 */

use Framework\Router;

Router::group(['namespace' => 'App\Controllers'], function () {
    Router::get('/login', 'User@login');
    Router::get('/restore', 'User@restore');
    Router::get('/registration', 'User@registration');
    Router::get('/settings', 'User@settings');
    Router::get('/404', 'User@page404');
    Router::get('/{userName}', 'User@profile');
    Router::get('/', 'User@feed');
});
