<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $hd = $this->getDiagnosa();
        $newArray = [];
        foreach ($hd as $key => $value) {
            if ($key > 4) { continue; }
            if ($value['tanggal'] == date_format(now(), 'Y-m-d')) {
                array_push($newArray, $value);
            }
        }
        $data = [
            'gejala'   => $this->gejala->count(),
            'penyakit' => $this->penyakit->count(),
            'user'     => $this->user->count(),
            'edukasi'  => $this->edukasi->count(),
            'hasil'    => $newArray
        ];
        return view('template.dashboard', compact('data'));
    }
}
