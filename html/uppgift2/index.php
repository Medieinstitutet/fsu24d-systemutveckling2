<?php
    require_once "header.php";

    if(isset($_GET['like'])) {
        $id = 1*$_GET['like'];

        if(!isset($_SESSION['likes'])) {
            $_SESSION['likes'] = [];
        }

        $_SESSION['likes'][] = $id;
    }

    if(isset($_GET['removeLike'])) {
        $id = 1*$_GET['removeLike'];

        if(!isset($_SESSION['likes'])) {
            $_SESSION['likes'] = [];
        }

        $new_likes = array_values(array_diff($_SESSION['likes'], [$id]));

        $_SESSION['likes'] = $new_likes;
    }
?>
Här börjar body
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
                    <?php
                        if(in_array($product['id'], $_SESSION['likes'])):
                            ?>
                                Liked <a href="?removeLike=<?= $product['id'] ?>">(Remove)</a>
                            <?php
                        else:
                            ?>
                            <a href="?like=<?= $product['id'] ?>">Like</a>
                            <?php
                        endif;
                        
                    ?>
                    
                    <form method="POST">
                        <input type="hidden" name="action" value="like" />
                        <input type="hidden" name="id" value="<?= $product['id'] ?>" />
                        <button>
                            Like
                        </button>
                    </form>
                </div>
            <?php
            
            
        }
    ?>
    </div>
    </body>
</html>