<?php

namespace App\Controllers\Operator;

use \App\Controllers\BaseController;

class Operator extends BaseController
{
    public function index()
    {
        return view('r_operator/index');
    }
}
