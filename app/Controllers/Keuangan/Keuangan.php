<?php

namespace App\Controllers\Keuangan;

use \App\Controllers\BaseController;

class Keuangan extends BaseController
{
    public function index()
    {
        return view('r_keuangan/index');
    }

    public function tambah()
    {
        return view('r_keuangan/tambahmhs');
    }
}
