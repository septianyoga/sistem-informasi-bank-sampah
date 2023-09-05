<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelBankSampah;

class Staff extends BaseController
{
    private $ModelBankSampah;

    public function __construct()
    {
        $this->ModelBankSampah = new ModelBankSampah();
    }
    public function index()
    {
        return view('staff/v_staff', [
            'title' => 'Staff',
            'bank_sampah'   => $this->ModelBankSampah->findAll()
        ]);
    }
}
