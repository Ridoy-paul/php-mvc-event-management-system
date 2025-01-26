<?php

if(!file_exists('../vendor')) {
    die ('<h3 align="center">Please run composer update on terminal</h3>');
}

define('DS', DIRECTORY_SEPARATOR);

define('ROOT', dirname(__DIR__) . DS);

define('APP', ROOT . 'App' . DS);
define('Services', ROOT . 'Services' . DS);

require_once ROOT . 'vendor/autoload.php';

require_once Services . 'config.php'; // App Setting

use Services\Router;

$router = new Router(); // Launch the application


