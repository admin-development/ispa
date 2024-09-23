<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Imports\BasisPengetahuanImport;
use Maatwebsite\Excel\Facades\Excel;

class BasisPengetahuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Excel::import(new BasisPengetahuanImport, public_path('/excels/basis_pengetahuan.xlsx'));
    }
}
