<?php
session_start();

function fsu24d_test() {
    echo("fsu24d_test");
}

    define('DB_NAME', 'products');
    define('DB_HOST', 'db');
    define('DB_USER', 'root');
    define('DB_PASSWORD', 'notSecureChangeMe');

    $connection = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
?>