<?php
session_start();

define('DSN', 'mysql:host=db;dbname=myapp;charset=utf8mb4');
define('DB_USER', 'myappuser');
define('DB_PASS', 'myapppass');
define('SITE_URL', 'http://' . $_SERVER['HTTP_HOST']);

spl_autoload_register(function ($class) {
    $prefix = 'MyApp\\';

    if (strpos($class, $prefix) === 0) {
        $filename = sprintf(__DIR__ . '/%s.php', substr($class, strlen($prefix)));

        if (file_exists($filename)) {
            require($filename);
        } else {
            echo 'File not found: ' . $filename;
        }
    }
});
