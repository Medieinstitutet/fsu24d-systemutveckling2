<?php
    session_start();
    require_once('functions/user-functions.php');

    $result = fsu24d_create_user($_POST['email'], $_POST['name'], $_POST['password'], $_POST['role']);

    if($result) {
        fsu24d_sign_in($_POST['email'], $_POST['password']);
        if($_POST['role'] === "customer" || $_POST['role'] === "customer,subscriber") {
            //METODO: create newsletter
            $user = fsu24d_get_user();
            fsu24d_create_newsletter($user['id'], $_POST['name'].'s nyhetsbrev');
        }
        header('Location: /repetition2/?message=created');
    }
    else {
        header('Location: /repetition2/?message=notCreated');
    }
?>