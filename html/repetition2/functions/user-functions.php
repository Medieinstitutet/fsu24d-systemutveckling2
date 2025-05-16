<?php

    define('DB_NAME', 'products');
    define('DB_HOST', 'db');
    define('DB_USER', 'root');
    define('DB_PASSWORD', 'notSecureChangeMe');

    define("SALT", '$eVcM7@z!2*HdBq1)kLOxG5#Y&pZ9WT^Rsjm+a(48fN%UblK|Etg,_-XcA>{SQ}3');

    global $connection;
    $connection = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

function fsu24d_create_user($email, $name, $password, $role) {
    global $connection;

    $salt = SALT;
    $hashed_password = hash('sha256', $password.$salt);

    $query = "INSERT INTO users (username, password, roles) VALUES ('$email', '$hashed_password', '$role')";

    try {
        $result = $connection->query($query);
        return true;
    }
    catch(exception $error) {
        return false;
    }


    
}

function fsu24d_create_newsletter($owner_id, $title = '', $description = '') {
    global $connection;

    $query = "INSERT INTO newsletters (owner, title, description) VALUES ($owner_id, '$title', '$description')";

    try {
        $result = $connection->query($query);
        return true;
    }
    catch(exception $error) {
        return false;
    }
}

function fsu24d_sign_in($email, $password) {
    global $connection;

    $salt = SALT;
    $hashed_password = hash('sha256', $password.$salt);

    $query = 'SELECT * FROM users WHERE username = \''.$email.'\' AND password = \''.$hashed_password.'\' LIMIT 1';
    $result = $connection->query($query);

    $has_user = ($result->num_rows === 1);

    if($has_user) {

        $user_data = $result->fetch_assoc();
        unset($user_data['password']);
        $user_data['roles'] = explode(",", $user_data['roles']);
        
        $_SESSION['user'] = $user_data;
    }
    else {
        //MENOTE: do nothing
    }

    return $has_user;
}

function fsu24d_sign_out() {
    unset($_SESSION['user']);
}

function fsu24d_get_user() {
    $user = null;

    if(isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
    }

    return $user;
}

function fsu24d_is_signed_in():bool {
    
    $signed_in = (fsu24d_get_user() !== null);

    if($signed_in) {
        return true;
    }

    return false;
}
?>