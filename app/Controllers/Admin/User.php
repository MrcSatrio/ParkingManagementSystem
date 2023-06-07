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
    $validationRules = [
        'npm' => [
            'rules' => 'required|numeric|exact_length[10]|is_unique[user.npm]',
            'errors' => [
                'required' => 'Nomor Pokok tidak boleh kosong',
                'numeric' => 'Nomor Pokok harus berupa angka',
                'exact_length' => 'Nomor Pokok harus terdiri dari 10 angka',
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
    ];

    if ($this->request->getVar('npm') && strlen($this->request->getVar('npm')) > 10) {
        $validationRules['npm']['rules'] .= '|max_length[10]';
        $validationRules['npm']['errors']['max_length'] = 'Nomor Pokok tidak lebih dari 10 angka';
    }

    if (!$this->validate($validationRules)) {
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
    public function userDelete($npm)
    {
        $this->userModel->where('npm', $npm)->delete();
        $session = session();
        session()->setFlashdata('hapus', '<br>');
        return redirect()->to(base_url('admin/read'));
    }
    public function userUpdate($npm)
    {
        {
            $data =
                [
                    'title' => 'Parking Management System',
                    'user' => $this->userModel
                    ->join('role', 'role.id_role = user.id_role')
                    ->join('kartu', 'kartu.id_kartu = user.id_kartu')
                    ->where('npm', $npm)
                    ->first(),
                ];
    
            return view('r_admin/userUpdate', $data);
        }}



        public function userEdit($npm)
{
    $data = $this->request->getPost();
    $user = $this->userModel
        ->join('role', 'role.id_role = user.id_role')
        ->join('kartu', 'kartu.id_kartu = user.id_kartu')
        ->where('npm', $npm)
        ->first();

    if ($user) {
        $this->userModel->update($user['npm'], $data); // Menggunakan id dari user untuk update data
        session()->setFlashdata('berhasil', '<br>');
        
        // Misalkan Anda ingin juga melakukan update pada model kartu
        $this->kartuModel->update($user['id_kartu'], $data); // Menggunakan id_kartu dari user untuk update data pada model kartu
    } else {
        session()->setFlashdata('gagal', '<br>');
    }

    return redirect()->to('admin/read');
}

}