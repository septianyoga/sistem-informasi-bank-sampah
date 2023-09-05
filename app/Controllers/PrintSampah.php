<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelBankSampah;
use App\Models\ModelSampah;

class PrintSampah extends BaseController
{
    private $ModelBankSampah, $ModelSampah;

    public function __construct()
    {
        $this->ModelBankSampah = new ModelBankSampah();
        $this->ModelSampah = new ModelSampah();
        date_default_timezone_set('Asia/Jakarta');
    }
    public function index()
    {
        // jika user klik tombol cari, tangkap data form tanggal nya
        if ($this->request->getVar()) {
            // jika ya maka menampilkan data berdasarkan range tanggal
            $data_sampah = $this->ModelSampah->join('bank_sampah', 'sampah.id_bank_sampah = bank_sampah.id_bank_sampah')->where([
                'tanggal_sampah >=' => $this->request->getVar('dari') . ' 00:00:00',
                'tanggal_sampah <=' => $this->request->getVar('sampai') . ' 23:59:59',
            ])->orderBy('tanggal_sampah', 'DESC')->findAll();
        } else {
            // jika tidak menampilkan semua data sampah
            $data_sampah = $this->ModelSampah->join('bank_sampah', 'sampah.id_bank_sampah = bank_sampah.id_bank_sampah')->orderBy('tanggal_sampah', 'DESC')->findAll();
        }
        return view('print/v_print_sampah', [
            'title' => 'Print Sampah',
            'data'  => $data_sampah
        ]);
    }
}
