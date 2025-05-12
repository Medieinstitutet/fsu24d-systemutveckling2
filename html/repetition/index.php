<?php
require("config.php");
?>
<html>
    <body>
        <?php
            //let greeting = "Hello world!"; //JS

            $result = $connection->query("SELECT * FROM products");
            
            while ($row = $result->fetch_assoc()) {
                
                ?>
                    <div>
                <?php
                foreach($row as $column_name => $cell) {
                    echo($column_name.': '.$cell.', ');
                }
                ?>
                    </div>
                <?php
            }

            define("DEFAULT_USER_NAME", "stranger");

            function say_hello(string $name = null, $greeting_start = "Hello") {
                if($name === null) {
                    $name = DEFAULT_USER_NAME;
                }
                $greeting = $greeting_start." ".$name."!";
                echo("<div class='speech-bubble'>".$greeting."</div>");
            }

            if(isset($_GET['name'])) {
                $_SESSION['name'] = $_GET['name'];
            }

            $has_user = isset($_SESSION['name']);

            $test_string = "This is a string"."!";
            $test_boolean = true;
            $test_number = 1.2345 + 234;
            $test_array = [1, 2, 3, 4];

            $test_array[] = 5;
            $test_array[] = 6;

            $test_array[1] = 7;

            $city_propterty_name = 'city';
            $test_object = [
                "first_name" => 'Mattias',
                "last_name" => 'E',
                $city_propterty_name => 'Stockoholm',
                "is_merried" => false,
                "address" => [
                    "street" => "Teststreet 9",
                    "zipCode" => "12345"
                ]
            ];

            if($has_user) {
                say_hello($_SESSION['name'], "Howdy");
            }
            else {
                say_hello();
            }

            fsu24d_test();
            ?>
    </body>
</html>