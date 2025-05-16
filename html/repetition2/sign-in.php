<?php
    session_start();
    require_once('functions/user-functions.php');

    $signed_in = fsu24d_sign_in($_POST['usernameOrEmail'], $_POST['password']);

    if($signed_in) {
        header('Location: /repetition2/');
    }
    else {
        header('Location: /repetition2/?message=incorrectDetails');
    }
?>