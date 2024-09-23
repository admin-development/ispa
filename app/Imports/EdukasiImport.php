<?php

namespace App\Imports;

use App\Models\EdukasiModel;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class EdukasiImport implements ToModel
{
    public function model(array $row)
    {
        return new EdukasiModel([
           'judul'     => $row[0],
           'image'     => $row[1], 
           'deskripsi' => $row[2],
        ]);
    }
}