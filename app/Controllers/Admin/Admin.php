<?php

namespace App\Controllers\Admin;

use \App\Controllers\BaseController;
use \App\Models\UserModel;

class Admin extends BaseController
{
    public function index()
    {
        $nama = new UserModel();
        $session = session();
        $nama = $session->get('nama');
        
        $data['nama'] = $nama;
        $data['title'] = 'Selamat Datang';

        return view('r_admin/index', $data);
    }
}
