<?php

namespace App\Controllers\Operator;

use \App\Controllers\BaseController;

class Dashboard extends BaseController
{
    protected $userModel;
    protected $hargaModel;
    protected $transaksiModel;
    protected $roleModel;
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
                'parkir_motor' => $this->hargaModel->where('nama_harga', 'parkir_motor')->first(),
                'parkir_mobil' => $this->hargaModel->where('nama_harga', 'parkir_mobil')->first(),
                'riwayat' => $this->transaksiModel->where('id_jenis_transaksi', 3)->findAll()
            ];

        return view('r_operator/dashboard', $data);
    }
    public function riwayat()
    {
        $limit = 9; // Jumlah item per halaman
    $offset = $this->request->getVar('page') ? ($this->request->getVar('page') - 1) * $limit : 0;
        $totalRows = $this->transaksiModel->countAllResults();
        $data =
            [
                'title' => 'Parking Management System',
                'user' => $this->userModel
                    ->join('role', 'role.id_role = user.id_role')
                    ->where('npm', session('npm'))
                    ->first(),
                'parkir_motor' => $this->hargaModel->where('nama_harga', 'parkir_motor')->first(),
                'parkir_mobil' => $this->hargaModel->where('nama_harga', 'parkir_mobil')->first(),
                'riwayat' => $this->transaksiModel->where('id_jenis_transaksi', 3)->findAll(),
                'pager' => $this->pager->makeLinks($offset, $limit, $totalRows, 'pagination')
            ];

        return view('r_operator/riwayat_transaksi_parkir', $data);
    }
}
