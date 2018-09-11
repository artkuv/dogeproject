<?php
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
