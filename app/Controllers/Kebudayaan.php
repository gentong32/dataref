<?php

namespace App\Controllers;

class Kebudayaan extends BaseController
{
    public function index()
    {
        $data['tingkat'] = "budaya";
        return view('homekebudayaan', $data);
    }
}