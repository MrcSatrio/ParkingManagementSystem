<?php

namespace App\Controllers\Operator;

use \App\Controllers\BaseController;

class Dashboard extends BaseController
{
    protected $userModel;
    protected $hargaModel;
    public function index()
    {
        //tolong masukin di setiap method//
        $data =
            [
                'title' => 'Parking Management System',
                'user' => $this->userModel
                    ->join('role', 'role.id_role = user.id_role')
                    ->where('npm', session('npm'))
                    ->first(),
                'parkir_motor' => $this->hargaModel->where('nama_harga', 'parkir_motor'),
                'parkir_mobil' => $this->hargaModel->where('nama_harga', 'parkir_mobil'),
            ];

        return view('r_operator/dashboard', $data);
    }
}
