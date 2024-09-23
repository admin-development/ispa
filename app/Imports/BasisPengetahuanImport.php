<?php

namespace App\Imports;

use App\Models\BasisPengetahuanModel;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class BasisPengetahuanImport implements ToModel
{
    public function model(array $row)
    {
        return new BasisPengetahuanModel([
           'id_penyakit' => $row[0],
           'id_gejala'   => $row[1], 
           'mb'          => $row[2],
           'md'          => $row[3],
        ]);
    }
}