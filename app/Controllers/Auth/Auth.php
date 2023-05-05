<?php

namespace App\Controllers\Auth;

use \App\Controllers\BaseController;
use \App\Models\UserModel;
use \App\Models\KartuModel;

class Auth extends BaseController
{
    public function register()
    {
        $usermodel = new UserModel();
        $kartumodel = new KartuModel();

        //Insert Kartu
        $datakartu = [
            'nomor_kartu' => $this->request->getVar('nomor_kartu'),
            'saldo' => $this->request->getVar('saldo'),
        ];
        $kartumodel->save($datakartu);

        //Insert User
        $rules = [
            'npm' => 'required|alpha_numeric_space|min_length[3]',
            'password' => 'required|min_length[5]'
        ];
        if ($this->validate($rules)) {
            $datauser = [
                'npm' => $this->request->getVar('npm'),
                'id_kartu' => $kartumodel->getInsertID(),
                'id_role' => $this->request->getVar('id_role'),
                'nama' => $this->request->getVar('nama'),
                'password' => md5($this->request->getVar('password')),
            ];

            $usermodel->insert($datauser);
            return redirect()->to('/tambahmhs');
        } else {
            $datauser['validation'] = $this->validator;
            return view('/tambahmhs', $datauser);
        }
        
    }

    //aksi Login
    public function login()
    {
        $model = new UserModel();

        $npm = $this->request->getVar('npm');
        $password = $this->request->getVar('password');

        $user = $model->where('npm', $npm)->first();

        if ($user) {
            if (md5($password) == $user['password']) {
                $session = session();
                $sessionData = [
                    'npm'=>$user['npm'],
                    'nama' => $user['nama'],
                    'id_role' => $user['id_role']
                ];
                $session->set($sessionData);
                if ($user['id_role'] == 1) {
                    return redirect()->to('/admin/index');
                } elseif ($user['id_role'] == 2) {
                    return redirect()->to('/keuangan/index');
                } elseif ($user['id_role'] == 3) {
                    return redirect()->to('/operator/index');
                } else {
                    return redirect()->to('/user/index');
                }
            } else {
                return redirect()->to('/')->withInput()->with('msg', 'Password salah');
            }
        } else {
            return redirect()->to('/')->withInput()->with('msg', 'Username tidak ditemukan');
        }
    }
    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/');
    }


}
