<?php

namespace App\Controllers;

use App\Models\UserModel;

class AuthController extends BaseController
{
    public function login()
    {
        return view('login');
    }

    public function loginAction()
    {
        $username = $this->request->getPost('username');
        $password = md5($this->request->getPost('password'));

        $userModel = new UserModel();
        $user = $userModel->where('username', $username)->where('pass', $password)->first();

        if ($user) {
            session()->set('username', $user['username']);
            session()->set('npm', $user['npm']);
            session()->set('level', $user['level']);

            if ($user['level'] == '1') {
                return redirect()->to('/user/tampil_data');
            } else if ($user['level'] == '2') {
                return redirect()->to('/admin/tampil_data');
            }
        } else {
            return redirect()->back()->with('error', 'Username atau Password salah');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }

    // Tambahan untuk register
    public function register()
    {
        return view('register');
    }

    public function registerAction()
    {
        $userModel = new UserModel();
        $npm = $this->request->getPost('npm');
        $username = $this->request->getPost('username');
        $password = md5($this->request->getPost('password'));
        $level = '1'; // Secara default user biasa

        // Cek apakah username atau npm sudah ada
        $existingUser = $userModel->where('username', $username)->orWhere('npm', $npm)->first();

        if ($existingUser) {
            return redirect()->back()->with('error', 'Username atau NPM sudah digunakan');
        }

        $userModel->insert([
            'username' => $username,
            'pass' => $password,
            'npm' => $npm,
            'level' => $level
        ]);

        return redirect()->to('/login')->with('success', 'Pendaftaran berhasil, silakan login.');
    }
}
