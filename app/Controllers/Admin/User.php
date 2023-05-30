<?php

namespace App\Controllers\Admin;

use \App\Controllers\BaseController;

class User extends BaseController
{
    protected $userModel;
    protected $kartuModel;
    protected $roleModel;
    protected $pager;
    public function userCreate()
    {
        $data =
            [
                'title' => 'Parking Management System',
                'user' => $this->userModel
                    ->join('role', 'role.id_role = user.id_role')
                    ->where('npm', session('npm'))
                    ->first(),
                'role' => $this->roleModel->findAll()
            ];

        return view('r_admin/userCreate', $data);
    }
    public function userInsert()
    {
        if (!$this->validate([
            'npm' => [
                'rules' => 'required|numeric|min_length[10]|max_length[10]|is_unique[user.npm]',
                'errors' => [
                    'required' => 'Nomor Pokok tidak boleh kosong',
                    'numeric' => 'Nomor Pokok harus berupa angka',
                    'min_length' => 'Nomor Pokok harus terdiri dari 10 angka',
                    'max_length' => 'Nomor Pokok tidak lebih dari 10 angka',
                    'is_unique' => 'Nomor Pokok telah digunakan',
                ]
            ],
            'email' => [
                'rules' => 'required|is_unique[user.email]',
                'errors' => [
                    'required' => 'Email tidak boleh kosong',
                    'is_unique' => 'Email telah digunakan',
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[8]|max_length[255]',
                'errors' => [
                    'required' => 'Password tidak boleh kosong',
                    'min_length' => 'Password harus terdiri dari 8 karakter atau lebih',
                    'max_length' => 'Password harus terdiri dari 255 karakter atau lebih',
                    //'regex_match' => 'Password harus mengandung setidaknya satu huruf besar',
                ]
            ],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $npm = $this->request->getVar('npm');
        $password = $npm;

        // Jika berhasil, simpan data ke database
        $this->kartuModel->save(
            [
                'nomor_kartu' => $this->request->getVar('nomor_kartu'),
                'saldo' => $this->request->getVar('saldo'),
            ]
        );
        $datauser =
            [
                'npm' => $npm,
                'id_kartu' => $this->kartuModel->getInsertID(),
                'id_role' => $this->request->getVar('id_role'),
                'nama' => $this->request->getVar('nama'),
                'email' => $this->request->getVar('email'),
                'password' => md5($password)
            ];
        $this->userModel->insert($datauser);

        // Tampilkan pesan berhasil
        session()->setFlashdata('success', '<br>');
        return redirect()->to(base_url('admin/create'));
    }

    public function userRead()
    {
        $limit = 5; // Jumlah item per halaman
        $offset = $this->request->getVar('page') ? ($this->request->getVar('page') - 1) * $limit : 0;
        $totalRows = $this->userModel->countAllResults();

        $data = [
            'title' => 'Parking Management System',
            'user' => $this->userModel
                ->join('role', 'role.id_role = user.id_role')
                ->where('npm', session('npm'))
                ->first(),
            'users' => $this->userModel->join('kartu', 'kartu.id_kartu = user.id_kartu')->findAll($limit, $offset),
            'pager' => $this->pager->makeLinks($offset, $limit, $totalRows, 'pagination'),
        ];

        return view('r_admin/userRead', $data);
    }
}
