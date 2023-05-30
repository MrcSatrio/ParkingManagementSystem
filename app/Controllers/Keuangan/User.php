<?php

namespace App\Controllers\Keuangan;

use \App\Controllers\BaseController;

class User extends BaseController
{
    protected $userModel;
    protected $kartuModel;
    public function create()
    {
        $data = [
            'title' => 'Parking Management System',
            'user' => $this->userModel
                ->join('role', 'role.id_role = user.id_role')
                ->where('npm', session('npm'))
                ->first()
        ];

        return view('r_keuangan/create', $data);
    }
}
