<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelUser;

class Login extends BaseController
{
    private $ModelUser;

    public function __construct()
    {
        $this->ModelUser = new ModelUser();
    }

    public function index()
    {
        return view('v_login', [
            'title' => 'Login'
        ]);
    }

    public function proses_login()
    {
        // melakukan validasi field username dan password wajib diisi
        $validate = $this->validate([
            'username' => 'required',
            'password' => 'required|min_length[3]'
        ]);
        // cek apakah valid
        if (!$validate) {
            session()->setFlashdata('errors', \config\Services::validation()->getErrors());
            return redirect()->back()->withInput(); // jika tidak valid akan dilempar ke halaman sebelumnya beserta pesan error
        }
        // cek apakah username dan password yang diinputkan ditemukan di dlm database
        $cekUser = $this->ModelUser->where([
            'username'  => $this->request->getPost('username'),
            'password'  => $this->request->getPost('password')
        ])->first();
        if ($cekUser) {
            // jika ditemukan maka create session
            session()->set('id_user', $cekUser['id_user']);
            session()->set('nama', $cekUser['nama']);
            session()->set('username', $cekUser['username']);
            session()->set('level', $cekUser['level']);
            return redirect()->to(base_url('admin'));
        } else {
            // jika tidak ditemukan maka dilempar kembali disertai pesan flashmessage
            return redirect()->back()->with('pesan', 'Username atau Password Salah.');
        }
    }

    public function logout()
    {
        // menghapus semua session yg telah dibuat ketika login
        session()->remove('id_user');
        session()->remove('nama');
        session()->remove('username');
        session()->remove('level');
        return redirect()->to(base_url('/'));
    }
}
