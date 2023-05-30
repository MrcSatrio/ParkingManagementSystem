<?php

namespace App\Controllers\Admin;

use \App\Controllers\BaseController;

class Dashboard extends BaseController
{
    protected $userModel;
    public function index()
    {
        $data =
            [
                'title' => 'Parking Management System',
                'user' => $this->userModel
                    ->join('role', 'role.id_role = user.id_role')
                    ->where('npm', session('npm'))
                    ->first()
            ];

        return view('r_admin/dashboard', $data);
    }
}
