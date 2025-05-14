<?php
namespace App\Models;

class Newsletters {

    public function get_newsletters() {

        $db = \Config\Database::connect();

        $result = $db->query('SELECT * FROM newsletters');

        return $result->getResultArray();
    }
}
?>