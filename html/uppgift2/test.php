<?php

    require("config.php");

    $test_array = [1, 2, 3]; //array(1, 2, 3);

    /* JS
    let sum_to_add = 2;
    $test_array.map((item) => {
        return item + sum_to_add;
    });

    $test_array.map(function(item) {
        return item + 2;
    });

    let add = (item) => {
        return item + sum_to_add;
    }
    $test_array.map(add);

    */


    function fsu24d_add_to_array($item) {
        global $sum_to_add;
        return $item + $sum_to_add;
    }

    global $sum_to_add;
    $sum_to_add = 2;

    /*
    $test_array = array_map(function($item) {
        global $sum_to_add;
        return $item + $sum_to_add;
    }, $test_array);
    */

    /*
    $test_array = array_map('fsu24d_add_to_array', $test_array);
    */

    /*
    class TestObject {
        public function add_to_array($item) {
            global $sum_to_add;
            return $item + $sum_to_add;
        }
    }
    $object = new TestObject();
    $test_array = array_map([$object, 'add_to_array'], $test_array);
    */

    var_dump(\Fsu24d\TestObject::$sum_to_add);
    
    $test_array = array_map('\Fsu24d\TestObject::add_to_array', $test_array);
    

    var_dump($test_array);
?>