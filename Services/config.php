<?php
session_start();

define('URL_PUBLIC_FOLDER', 'public'); // public
define('URL_PROTOCOL', '//'); // //
define('URL_DOMAIN', $_SERVER['HTTP_HOST']); // localhost
define('URL_SUB_FOLDER', str_replace(URL_PUBLIC_FOLDER, '', dirname($_SERVER['SCRIPT_NAME'])));// Root application - /appfolder
define('URL', URL_PROTOCOL . URL_DOMAIN . URL_SUB_FOLDER); // Root Path of the project
define('APP_TITTLE', 'Event Management System');
define('DEFAULT_CONTROLLER', 'FrontController');

define('DB_TYPE', 'mysql');
define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'php_test_mvc_route');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_PORT', '3306');// 3306 or 5432
define('DB_CHARSET', 'utf8mb4');


// Define Auth Info
if (isset($_SESSION['user'])) {
    define('USER_LOGGED', true);
    define('USER_INFO', $_SESSION['user']);
} else {
    define('USER_LOGGED', false);
    define('USER_INFO', null);
}

// Database connection setup for Eloquent ORM
use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;
$capsule->addConnection([
    'driver' => DB_TYPE,
    'host' => DB_HOST,
    'database' => DB_NAME,
    'username' => DB_USER,
    'password' => DB_PASS,
    'charset' => DB_CHARSET,
    'collation' => 'utf8mb4_unicode_ci',
    'prefix' => '',
]);

// Set the Capsule instance as global
$capsule->setAsGlobal();
$capsule->bootEloquent();

