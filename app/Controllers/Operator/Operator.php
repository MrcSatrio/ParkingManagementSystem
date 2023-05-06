<?php

namespace App\Controllers\Operator;

use \App\Controllers\BaseController;
use \App\Models\UserModel;

class Operator extends BaseController
{
    public function index()
    {
        $nama = new UserModel();
        $session = session();
        $nama = $session->get('nama');
        
        $data['nama'] = $nama;

        return view('r_operator/index', $data);
    }
}
