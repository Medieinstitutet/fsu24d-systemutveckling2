<?php
namespace App\Models;

define("SALT", '$eVcM7@z!2*HdBq1)kLOxG5#Y&pZ9WT^Rsjm+a(48fN%UblK|Etg,_-XcA>{SQ}3');

class Login {

    public function sign_in($email, $password) {

        $db = \Config\Database::connect();

        $salt = SALT;
        $hashed_password = hash('sha256', $password.$salt);

        $query = 'SELECT * FROM users WHERE username = \''.$email.'\' AND password = \''.$hashed_password.'\' LIMIT 1';
        $result = $db->query($query);

        $rows = $result->getResultArray();

        $has_user = (count($rows) === 1);

        if($has_user) {

            $user_data = $rows[0];
            unset($user_data['password']);
            $user_data['roles'] = explode(",", $user_data['roles']);

            $data = random_bytes(16);

            // Set version to 0100 (UUID v4)
            $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
            // Set variant to 10xxxxxx
            $data[8] = chr(ord($data[8]) & 0x3f | 0x80);

            $session_id = vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
            var_dump($session_id);
            $user_id = $user_data['id'];
            $user_data['sessionId'] = $session_id;
            $query = "INSERT INTO sessions (session_id, user) VALUES ('$session_id', $user_id)";
            $result = $db->query($query);
            
            $_SESSION['user'] = $user_data;
        }
        else {
            //MENOTE: do nothing
        }
    }

    public function get_user() {
        $user = null;

        $db = \Config\Database::connect();

        if(isset($_SESSION['user'])) {
            $user = $_SESSION['user'];

            $session_id = $user['sessionId'];

            $query = 'SELECT * FROM session WHERE session_id = \''.$session_id.'\' LIMIT 1';
            $result = $db->query($query);

            $rows = $result->getResultArray();

            if(count($row) === 1) {
                if($row['created'] + 3600 < now()) {
                    $user = null;
                }
            }
            else {
                $user = null;
            }
        }

        return $user;
    }
}
?>