<?php

namespace App\Controllers;

use App\Models\IdentitasModel;

class UserController extends BaseController
{
    public function tampil_data()
    {
        $npm = session()->get('npm');
        $level = session()->get('level');

        $identitasModel = new IdentitasModel();

        if ($level == '1') {
            // User biasa, hanya bisa melihat datanya sendiri
            $data['identitas'] = $identitasModel->where('npm', $npm)->first();
        } else if ($level == '2') {
            // Admin, bisa melihat semua data
            $data['identitas'] = $identitasModel->findAll();
        }

        return view('tampil_data', $data);
    }
}
