<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Imports\GejalaImport;
use Maatwebsite\Excel\Facades\Excel;

class GejalaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Excel::import(new GejalaImport, public_path('/excels/gejala.xlsx'));
    }
}
