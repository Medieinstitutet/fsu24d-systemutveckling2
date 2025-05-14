<?php
    define("SALT", '$eVcM7@z!2*HdBq1)kLOxG5#Y&pZ9WT^Rsjm+a(48fN%UblK|Etg,_-XcA>{SQ}3');

    $user = [
        'username' => 'mattias',
        'password' => '123456',
        'salt' => 'Z*{^fP}w92e)BdtJMA_-Czv>Q1!XNgHKYprTL@mu8q=REoa6$G[]ls;:.x+I(Vn7'
    ];

    $password = "EnHästHarTappatBortSinFrukostOchBehöver3Batterier!";

    $hashed_password_old = hash("sha256", $user['password']);
    $hashed_password = hash("sha256", $user['password'].SALT.$user['salt']);

    password_hash($user['password'], PASSWORD_DEFAULT, ['salt' => SALT.$user['salt']]);

    echo($hashed_password_old);
    echo('<br />');
    echo($hashed_password);

    function generate_random_string() {
        $return_string = "";
        $length = rand(4, 13);

        for($i = 0; $i < $length; $i++) {
            $letters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $randomLetter = $letters[random_int(0, strlen($letters) - 1)];
            $return_string .= $randomLetter;
        }

        return $return_string;
    }

    $commonPasswords = [
        '123456',
        'password',
        '123456789',
        '12345678',
        '12345',
        '111111',
        '1234567',
        'qwerty',
        'abc123',
        'password1',
        '123123',
        '1234',
        'iloveyou',
        'admin',
        'welcome',
        'monkey',
        'login',
        'football',
        'letmein',
        'dragon'
    ];

    $hashed_common_passwords = [
        '123456' => '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92',
'password' => '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8',
'123456789' => '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225',
'12345678' => 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f',
'12345' => '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5',
'111111' => 'bcb15f821479b4d5772bd0ca866c00ad5f926e3580720659cc80d39c9d09802a',
'1234567' => '8bb0cf6eb9b17d0f7d22b456f121257dc1254e1f01665370476383ea776df414',
'qwerty' => '65e84be33532fb784c48129675f9eff3a682b27168c0ea744b2cf58ee02337c5',
'abc123' => '6ca13d52ca70c883e0f0bb101e425a89e8624de51db2d2392593af6a84118090',
'password1' => '0b14d501a594442a01c6859541bcb3e8164d183d32937b851835442f69d5c94e',
'123123' => '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e',
'1234' => '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4',
'iloveyou' => 'e4ad93ca07acb8d908a3aa41e920ea4f4ef4f26e7f86cf8291c5db289780a5ae',
'admin' => '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918',
'welcome' => '280d44ab1e9f79b5cce2dd4f58f5fe91f0fbacdac9f7447dffc318ceb79f2d02',
'monkey' => '000c285457fc971f862a79b786476c78812c8897063c6fa9c045f579a3b2d63f',
'login' => '428821350e9691491f616b754cd8315fb86d797ab35d843479e732ef90665324',
'football' => '6382deaf1f5dc6e792b76db4a4a7bf2ba468884e000b25e7928e621e27fb23cb',
'letmein' => '1c8bfe8f801d79745c4631d09fff36c82aa37fc4cce4fc946683d7b336b63032',
'dragon' => 'a9c43be948c5cabd56ef2bacffb77cdaa5eec49dd5eb0cc4129cf3eda5f0e74c',
    ];

    $debug_counter = 0;
    $not_found = true;
    foreach($hashed_common_passwords as $guessed_password => $guessed_hashed_password) {
        //$guessed_hashed_password = hash("sha256", $guessed_password);
        //echo('<br />\''.$guessed_password.'\' => \''.$guessed_hashed_password.'\',');

        if($hashed_password === $guessed_hashed_password) {
            $not_found = false;
            echo("Lösenordet är: ".$guessed_password);
            break;
        }
    }
?>