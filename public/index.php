<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
/**
 * Composer
 */
require '../vendor/autoload.php';


/**
 * Configs
 */
require '../config/app.php';

session_start();

\Framework\Router::start();
