<?php

namespace App\Controllers;

class Message extends BaseController
{
    public function index($type): string
    {
        $text = "";
        $status_type = "";

        switch($type) {
            case "signedIn":
                $text = "Du är nu inloggad";
                $status_type = "success";
                break;
            case "noAccess":
                $text = "Du har inte tillgång till denna sida";
                $status_type = "error";
                break;
        }

        $args = ['text' => $text, 'type' => $status_type];

        return view('message', $args);
    }
}
