<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Imports\EdukasiImport;
use Maatwebsite\Excel\Facades\Excel;

class EdukasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Excel::import(new EdukasiImport, public_path('/excels/edukasi.xlsx'));
    }
}
