<?php

namespace App\Controllers\User;

use \App\Controllers\BaseController;
use \App\Models\UserModel;

class User extends BaseController
{
    public function index()
    {
        $nama = new UserModel();
        $session = session();
        $nama = $session->get('nama');
        
        $data['nama'] = $nama;

        return view('r_user/index', $data);
    }
}
