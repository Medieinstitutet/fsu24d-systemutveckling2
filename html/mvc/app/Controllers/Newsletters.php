<?php

namespace App\Controllers;

class Newsletters extends BaseController
{
    public function index(): string
    {
        $this->newsletters_model = new \App\Models\Newsletters();

        return view('newsletters', ['newsletters' => $this->newsletters_model->get_newsletters()]);
    }

    public function single($segment): string {
        var_dump($segment);
        return view('single_newsletter');
    }
}
