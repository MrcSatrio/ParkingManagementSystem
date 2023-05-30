<?php

namespace App\Controllers\Keuangan;

use \App\Controllers\BaseController;

class Dashboard extends BaseController
{
    protected $userModel;
    public function index()
    {
        //tolong masukin di setiap method//

        $data = [
            'title' => 'Parking Management System',
            'user' => $this->userModel
                ->join('role', 'role.id_role = user.id_role')
                ->where('npm', session('npm'))
                ->first()
        ];

        return view('r_keuangan/dashboard', $data);
    }
}
