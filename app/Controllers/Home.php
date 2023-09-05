<?php

namespace App\Controllers;

use App\Models\ModelBankSampah;

class Home extends BaseController
{
    private $ModelBankSampah;

    public function __construct()
    {
        $this->ModelBankSampah = new ModelBankSampah();
    }

    public function index(): string
    {
        return view('v_home', [
            'title' => 'Home',
            'bank_sampah'   => $this->ModelBankSampah->findAll()
        ]);
    }
}
