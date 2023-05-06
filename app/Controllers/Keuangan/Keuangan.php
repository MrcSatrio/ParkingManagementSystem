<?php

namespace App\Controllers\Keuangan;

use \App\Controllers\BaseController;
use \App\Models\UserModel;

class Keuangan extends BaseController
{
    public function index()
    {
        //tolong masukin di setiap method//
        $nama = new UserModel();
        $session = session();
        $nama = $session->get('nama');
        
        $data['nama'] = $nama;

        return view('r_keuangan/index', $data);
    }

    public function tambah()
    {
        $nama = new UserModel();
        $session = session();
        $nama = $session->get('nama');
        
        $data['nama'] = $nama;

        return view('r_keuangan/tambahmhs', $data);
    }

    //public function show()
    //{
        //$nama = session()->get('nama');
        //$data = [
            //'title' => 'Edit Buku',
            //'nama' => $model->getUser($npm)
        //];

        //return view('r_keuangan/template/index', $data);
    //}
}
