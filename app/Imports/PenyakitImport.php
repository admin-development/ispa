<?php

namespace App\Imports;

use App\Models\PenyakitModel;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class PenyakitImport implements ToModel
{
    public function model(array $row)
    {
        return new PenyakitModel([
           'kode_penyakit' => $row[0],
           'nama_penyakit' => $row[1], 
           'solusi'        => $row[2],
        ]);
    }
}