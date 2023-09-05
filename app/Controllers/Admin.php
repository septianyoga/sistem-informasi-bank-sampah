<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelBankSampah;

class Admin extends BaseController
{
    private $ModelBankSampah;

    public function __construct()
    {
        $this->ModelBankSampah = new ModelBankSampah();
    }
    public function index()
    {
        return view('admin/v_admin', [
            'title' => 'Admin',
            'bank_sampah'   => $this->ModelBankSampah->findAll()
        ]);
    }
}
