<?php

namespace App\Controllers;
use App\Models\DataModelPendidikan;

class Home extends BaseController
{
    function __construct()
    {
        $this->datamodelpendidikan = new DataModelPendidikan();
    }

    public function index()
    {
        $data['tingkat'] = "sekolah";
        return view('home', $data);
    }

    public function setotal()
    {
        $this->datamodelpendidikan->setTotalPendidikan(1);
        $this->datamodelpendidikan->setTotalPendidikan(2);
        $this->datamodelpendidikan->setTotalPendidikan(3);
    }
}
