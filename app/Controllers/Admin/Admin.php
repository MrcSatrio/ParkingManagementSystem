<?php

namespace App\Controllers\Admin;

use \App\Controllers\BaseController;

class Admin extends BaseController
{
    public function index()
    {
        return view('r_admin/index');
    }
}
