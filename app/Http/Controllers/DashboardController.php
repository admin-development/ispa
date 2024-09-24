<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'gejala'   => $this->gejala->count(),
            'penyakit' => $this->penyakit->count(),
            'user'     => $this->user->count(),
            'edukasi'  => $this->edukasi->count(),
        ];
        return view('dashboard', compact('data'));
    }
    
    public function beranda()
    {
        return view('welcome');
    }
}
