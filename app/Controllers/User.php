<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelUser;

class User extends BaseController
{
    private $ModelUser;

    public function __construct()
    {
        $this->ModelUser = new ModelUser();
    }

    public function index()
    {
        return view('user/v_user', [
            'title' => 'User',
            'data'  => $this->ModelUser->findAll()
        ]);
    }

    public function tambah_user()
    {
        // validasi input
        $validate = $this->validate([
            'nama'      => 'required',
            'username'  => 'required|is_unique[user.username]',
            'password'  => 'required|min_length[3]',
            'level'     => 'required'
        ]);
        if (!$validate) {
            // jika tidak valid maka dilempar kembali beserta informasinya
            session()->setFlashdata('errors', \config\Services::validation()->getErrors());
            return redirect()->back()->withInput();
        }

        $this->ModelUser->insert($this->request->getPost());
        return redirect()->to(base_url('user'))->with('pesan', 'User berhasil ditambahkan.');
    }

    public function edit($id_user)
    {
        return view('user/v_edit_user', [
            'title' => 'Edit User',
            'data'  => $this->ModelUser->find($id_user)
        ]);
    }

    public function proses_edit()
    {
        $validate = $this->validate([
            'nama'      => 'required',
            'username'  => 'required',
            'level'     => 'required'
        ]);
        if (!$validate) {
            session()->setFlashdata('errors', \config\Services::validation()->getErrors());
            return redirect()->back()->withInput();
        }
        // cek apakah field password diisi
        if ($this->request->getPost('password') == '') {
            // jika tidak maka, field password tidak perlu di update
            $data = [
                'nama' => $this->request->getPost('nama'),
                'username' => $this->request->getPost('username'),
                'level' => $this->request->getPost('level'),
            ];
            $this->ModelUser->update($this->request->getPost('id_user'), $data);
            return redirect()->to(base_url('user'))->with('pesan', 'User berhasil diedit.');
        }
        // jika iya, maka update semua field
        $this->ModelUser->update($this->request->getPost('id_user'), $this->request->getPost());
        return redirect()->to(base_url('user'))->with('pesan', 'User berhasil diedit.');
    }

    public function hapus($id_user)
    {
        // query hapus user
        $this->ModelUser->delete($id_user);
        return redirect()->to(base_url('user'))->with('pesan', 'User berhasil dihapus.');
    }
}
