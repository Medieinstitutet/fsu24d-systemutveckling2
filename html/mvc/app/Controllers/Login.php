<?php

namespace App\Controllers;

class Login extends BaseController
{
    public function login(): string
    {
        var_dump($_POST['email'], $_POST['password']);

        $this->model = new \App\Models\Login();

        $this->model->sign_in($_POST['email'], $_POST['password']);

        return "";
    }
}
