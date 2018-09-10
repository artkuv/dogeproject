<?php
/**
 * Файл с конфигурацией роутера
 */

use Framework\Router;

Router::group(['namespace' => 'App\Controllers'], function () {
    Router::get('/', 'FeedController@globalFeed');
    Router::get('/feed', 'FeedController@feed');
    Router::get('/registration', 'RegistrationController@registration');
    Router::post('/registration/save', 'RegistrationController@save');
    Router::get('/login', 'LoginController@login');
    Router::post('/login/enter', 'LoginController@enter');
    Router::get('/signout', 'ProfileController@signOut');
    Router::get('/restore', 'RestoreController@restore');
    Router::match(['get','post'],'/profile/{userName?}', 'ProfileController@profile');
    Router::match(['get','post'],'/settings', 'SettingsController@settings');
    Router::get('/404', 'Page404Controller@page404');
});
