<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelBankSampah;
use App\Models\ModelSampah;

class Sampah extends BaseController
{
    private $ModelBankSampah, $ModelSampah;

    public function __construct()
    {
        $this->ModelBankSampah = new ModelBankSampah();
        $this->ModelSampah = new ModelSampah();
    }

    public function index()
    {
        return view('sampah/v_data_sampah', [
            'title' => 'Data Sampah',
            'data'  => $this->ModelSampah->join('bank_sampah', 'sampah.id_bank_sampah = bank_sampah.id_bank_sampah')->orderBy('tanggal_sampah', 'DESC')->findAll()
        ]);
    }

    public function input_sampah()
    {
        return view('sampah/v_input_sampah', [
            'title' => 'Input Sampah',
            'data'  => $this->ModelBankSampah->findAll()
        ]);
    }

    public function insert_sampah()
    {
        // melakukan validasi filed wajib diisi
        $validate = $this->validate([
            'id_bank_sampah'    => [
                'label'     => 'Bank Sampah',
                'rules'     => 'required',
                'errors'    =>  [
                    'required'  => '{field} wajib diisi.'
                ],
            ],
            'jumlah_sampah'      => [
                'label'     => 'Jumlah Sampah',
                'rules'     => 'required',
                'errors'    =>  [
                    'required'  => '{field} wajib diisi.'
                ],
            ],
            'jenis'             => [
                'label'     => 'Jenis Sampah',
                'rules'     => 'required',
                'errors'    =>  [
                    'required'  => '{field} wajib diisi.'
                ],
            ],
            'berat_sampah'      => [
                'label'     => 'Berat Sampah',
                'rules'     => 'required',
                'errors'    =>  [
                    'required'  => '{field} wajib diisi.'
                ],
            ],
        ]);
        // cek apakah filednya diisi semua
        if (!$validate) {
            session()->setFlashdata('errors', \config\Services::validation()->getErrors());
            return redirect()->back()->withInput(); // jika ada yg tdk diisi, maka dilempar kembali beserta pesan fieldnya
        }

        // insert semua field ke tabel sampah
        $this->ModelSampah->insert($this->request->getPost());
        // mencari data bank sampah berdasarkan id 
        return redirect()->to(base_url('input_sampah'))->with('pesan', 'Sampah berhasil ditambahkan.');
    }

    public function verif_sampah()
    {
        $id_sampah = $this->request->getPost('id_sampah');
        // get data sampah berdasarkan id sampah
        $data_sampah = $this->ModelSampah->find($id_sampah);
        if (!$data_sampah) {
            return redirect()->back()->with('error', 'Maaf id sampah tidak ditemukan.');
        }
        // update status menjadi terverifikasi berdasarkan id sampah
        $this->ModelSampah->update($id_sampah, ['status' => 'Terverifikasi']);
        // get data bank sampah untuk di ambil total berat
        $data_bank_sampah = $this->ModelBankSampah->find($data_sampah['id_bank_sampah']);
        // total berat sampah saat ini di tambahkan dengan berat sampah yang akan di verif
        $total_berat_sampah = $data_bank_sampah['total_berat'] + $data_sampah['berat_sampah'];
        // update kembali total berat sampahnya
        $this->ModelBankSampah->update($data_bank_sampah['id_bank_sampah'], ['total_berat' => $total_berat_sampah]);
        return redirect()->to(base_url('sampah'))->with('pesan', 'Sampah berhasil diverifikasi.');
    }

    public function kelola_sampah()
    {
        return view('sampah/v_kelola_sampah', [
            'title' => 'Kelola Sampah',
            'data'  => $this->ModelSampah->join('bank_sampah', 'sampah.id_bank_sampah = bank_sampah.id_bank_sampah')->findAll()
        ]);
    }

    public function edit($id_sampah)
    {
        return view('sampah/v_edit_sampah', [
            'title' => 'Edit Sampah',
            'data'  => $this->ModelSampah->find($id_sampah),
            'bank_sampah'   => $this->ModelBankSampah->findAll()
        ]);
    }

    public function proses_edit()
    {
        // validasi input
        $validate = $this->validate([
            'id_bank_sampah'    => [
                'label'     => 'Bank Sampah',
                'rules'     => 'required',
                'errors'    =>  [
                    'required'  => '{field} wajib diisi.'
                ],
            ],
            'jumlah_sampah'      => [
                'label'     => 'Jumlah Sampah',
                'rules'     => 'required',
                'errors'    =>  [
                    'required'  => '{field} wajib diisi.'
                ],
            ],
            'jenis'             => [
                'label'     => 'Jenis Sampah',
                'rules'     => 'required',
                'errors'    =>  [
                    'required'  => '{field} wajib diisi.'
                ],
            ],
            'berat_sampah'      => [
                'label'     => 'Berat Sampah',
                'rules'     => 'required',
                'errors'    =>  [
                    'required'  => '{field} wajib diisi.'
                ],
            ],
        ]);
        if (!$validate) {
            session()->setFlashdata('errors', \config\Services::validation()->getErrors());
            return redirect()->back()->withInput();
        }

        $id_sampah = $this->request->getPost('id_sampah');

        $data_sampah = $this->ModelSampah->find($id_sampah);
        // cek apakah berat sampah di edit dan status sampahnya sudah terverifikasi
        if ($data_sampah['berat_sampah'] != $this->request->getPost('berat_sampah') && $data_sampah['status'] == 'Terverifikasi') {
            // jika ya maka get total berat sampah yang ada di bank terlebih dahulu
            $data_bank_sampah = $this->ModelBankSampah->find($data_sampah['id_bank_sampah']);
            // total berat sampah pada bank dikurangi berat sampah di tabel sampah
            $hitung_berat = $data_bank_sampah['total_berat'] - $data_sampah['berat_sampah'];
            // total berat sampah di jumlahkan kembali dengan berat sampah yang diinputkan pada form edit
            $jumlah_ulang_berat = $hitung_berat +  $this->request->getPost('berat_sampah');
            // update total berat sampah kembali
            $this->ModelBankSampah->update($data_sampah['id_bank_sampah'], ['total_berat' => $jumlah_ulang_berat]);
        }
        $this->ModelSampah->update($id_sampah, $this->request->getPost());
        return redirect()->to(base_url('kelola_sampah'))->with('pesan', 'Data Sampah Berhasil Di edit.');
    }
}
