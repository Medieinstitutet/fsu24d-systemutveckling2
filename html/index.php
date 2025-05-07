<?php
    require_once "config.php";

    session_start();
?><html>
    <head>
        <title>Uppgift 2</title>
    </head>
    <body>
    <?php
        function fsu24d_say_hello($greeting = "Hello") {
            if(isset($_POST['name'])) {
                $name = $_POST['name'];
                $_SESSION['name'] = $name;
            }
            else {
                if(isset($_SESSION['name'])) {
                    $name = $_SESSION['name'];
                }
                else {
                    $name = "stranger";
                }
                
            }

            echo($greeting . " " . $name . '!');
        }

        if($_SERVER['REQUEST_METHOD'] === "POST" || isset($_SESSION['name'])) {
            fsu24d_say_hello();
        }
        else {
            ?>
<form method="POST">
        <input name="name" />
        <input type="submit" />
    </form>
            <?php
        }
    ?>
    
    <div style="display: flex">

    <?php
        $database = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, 'products');

        $sql = "SELECT * FROM products";
        $result = $database->query($sql);

        $products = [];

        if ($result->num_rows > 0) {
            // Fetch all rows into the array
            while ($row = $result->fetch_assoc()) {
                $products[] = $row;
            }
        } else {
            echo "No products found.";
        }

        /*
        $products = [
            [
                'name' => 'Wireless Mouse',
                'category' => 'Electronics',
                'price' => 25.99,
                'is_new' => true
            ],
            [
                'name' => 'Running Shoes',
                'category' => 'Footwear',
                'price' => 49.99,
                'is_new' => false
            ],
            [
                'name' => 'Water Bottle',
                'category' => 'Accessories',
                'price' => 15.00,
                'is_new' => true
            ],
            [
                'name' => 'Bluetooth Speaker',
                'category' => 'Electronics',
                'price' => 89.99,
                'is_new' => false
            ],
            [
                'name' => 'Notebook',
                'category' => 'Stationery',
                'price' => 3.49,
                'is_new' => true
            ]
        ];
        */

        for($i = 0; $i < count($products); $i++) {
            $product = $products[$i];
            ?>
                <div style="border: 1px solid #FF0000" class="<?php
                    $extra_class = ''; 
                    if($product['is_new']) {
                        $extra_class = ' is-new';
                    }
                    echo("product-card" . $extra_class);
                ?>" >
                    <div><?= $product['category'] ?></div>
                    <div><?= $product['name'] ?></div>
                    <img width="200" height="150" />
                    <?php
                        require("button.php");
                    ?>
                </div>
            <?php
            
            
        }
    ?>
    </div>
    </body>
</html>