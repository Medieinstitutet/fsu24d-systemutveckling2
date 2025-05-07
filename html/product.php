<?php
    require_once "config.php";

    echo($_GET['id']);

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $database = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, 'products');
    
        // Simple SQL query (not the most secure, but easy to understand)
        $sql = "SELECT * FROM productss WHERE id = $id";

        var_dump($sql);

        $result = $database->query($sql);
    
        if ($result->num_rows > 0) {
            // Get the product as an array
            $product = $result->fetch_assoc();
            print_r($product); // Show the product info
        } else {
            echo "No product found.";
        }
    } else {
        echo "No ID provided.";
    }
?>