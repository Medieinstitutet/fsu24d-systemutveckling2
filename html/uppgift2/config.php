<?php
    namespace Fsu24d;

    define('DB_NAME', 'db');
    define('DB_HOST', 'db');
    define('DB_USER', 'root');
    define('DB_PASSWORD', 'notSecureChangeMe');

    $sum_to_add2 = 2;

    class TestObject {

        public static int $sum_to_add = 7;

        public static function add_to_array($item) {
            global $sum_to_add;
            return $item + $sum_to_add;
        }
    }
?>