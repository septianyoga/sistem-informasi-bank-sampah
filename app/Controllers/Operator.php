<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelBankSampah;

class Operator extends BaseController
{
    private $ModelBankSampah;

    public function __construct()
    {
        $this->ModelBankSampah = new ModelBankSampah();
    }
    public function index()
    {
        return view('operator/v_operator', [
            'title' => 'Operator',
            'bank_sampah'   => $this->ModelBankSampah->findAll()
        ]);
    }
}
