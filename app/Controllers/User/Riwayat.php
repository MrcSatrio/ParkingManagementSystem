<?php

namespace App\Controllers\User;

use \App\Controllers\BaseController;

class Riwayat extends BaseController

{
    protected $userModel;
    protected $transaksiModel;

    public function riwayat()
{
    $limit = 9; // Jumlah item per halaman
    $offset = $this->request->getVar('page') ? ($this->request->getVar('page') - 1) * $limit : 0;
    $totalRows = $this->transaksiModel->countAllResults();

    $npm = session('npm');

    $data = [
        'title' => 'Parking Management System',
        'user' => $this->userModel
            ->join('role', 'role.id_role = user.id_role')
            ->where('npm', $npm)
            ->first(),
        'transaksi' => $this->transaksiModel
        ->where('npm', $npm)
            ->join('jenis_transaksi', 'jenis_transaksi.id_jenis_transaksi = transaksi.id_jenis_transaksi')
            ->join('status_transaksi', 'status_transaksi.id_status_transaksi = transaksi.id_status_transaksi')
            ->findAll($limit, $offset),
        'pager' => $this->pager->makeLinks($offset, $limit, $totalRows, 'pagination')
    ];

    return view('r_user/transaksi_riwayat', $data);
}

}
