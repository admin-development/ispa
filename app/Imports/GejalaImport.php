<?php

namespace App\Imports;

use App\Models\GejalaModel;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class GejalaImport implements ToModel
{
    public function model(array $row)
    {
        return new GejalaModel([
           'kode_gejala' => $row[0],
           'nama_gejala' => $row[1],
        ]);
    }
}