<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data['tingkat'] = "sekolah";
        return view('home', $data);
    }
}
