<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\HasilDiagnosaModel;
use App\Models\BasisPengetahuanModel;
use Carbon\Carbon;

class HasilDiagnosaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $hasil = new HasilDiagnosaModel();
        $basis = new BasisPengetahuanModel();
        $data = [
            [
                'tanggal'     => Carbon::now(),
                'id_nilai_cf' => [12,21,7,17,4],
                'id_user'     => 2
            ],
            [
                'tanggal'     => Carbon::now()->add(1, 'day'),
                'id_nilai_cf' => [6,23,22],
                'id_user'     => 2
            ],
            [
                'tanggal'     => Carbon::now(),
                'id_nilai_cf' => [17,22,24,2,12,30,6],
                'id_user'     => 3
            ],
        ];

        foreach ($data as $value) {
            foreach ($value['id_gejala'] as $val) {
                $dataGejala = $basis->getDatabyGejalaId($val);
                if ($dataGejala) {
                    $insertData = [
                        'tanggal'     => $value['tanggal'],
                        'id_penyakit' => $dataGejala->id_penyakit,
                        'id_gejala'   => $val,
                        'hasil_nilai' => $dataGejala->mb * $dataGejala->md,
                        'id_user'     => $value['id_user']
                    ];
                    $hasil->insertOrUpdate($insertData);
                }
            }
        }
    }
}
