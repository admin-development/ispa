<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Imports\PenyakitImport;
use Maatwebsite\Excel\Facades\Excel;

class PenyakitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Excel::import(new PenyakitImport, public_path('/excels/penyakit.xlsx'));
    }
}
