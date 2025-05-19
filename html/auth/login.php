<?php
    $username = $_POST['username'];
    if($username === "test") {
        if($_POST['password'] === "123456") {
            header("Location: /my-account/");
        }
        else {
            header("Location: /repetition2/login/?username=$username&message=incorrect");
        }
    }
    else {
        header("Location: /repetition2/login/?username=$username&message=noUser");
    }
    
?>