<?php

namespace App\Http\Controllers;

use App\Models\BasisPengetahuanModel;
use App\Models\EdukasiModel;
use App\Models\GejalaModel;
use App\Models\GroupModel;
use App\Models\HasilDiagnosaModel;
use App\Models\PenyakitModel;
use App\Models\UserModel;

abstract class Controller
{
    public function __construct()
    {
        $this->basis = new BasisPengetahuanModel();
        $this->edukasi = new EdukasiModel();
        $this->gejala = new GejalaModel();
        $this->group = new GroupModel();
        $this->hasil = new HasilDiagnosaModel();
        $this->penyakit = new PenyakitModel();
        $this->user = new UserModel();
    }

    public function hasilDiagnosa($data)
    {
        $oldHasil = 0;
        $newHasil = 0;
        $maxHasil = 0;
        $maxDate = null;
        $maxUser = null;
        $newData = [];
        $resultV = [];
        foreach ($data as $user) {
            foreach ($user as $tanggal) {
                foreach ($tanggal as $penyakit) {
                    foreach ($penyakit as $value) {
                        $newHasil = $this->calculate($oldHasil, $value->hasil_nilai);
                        if ($maxHasil < $newHasil) {
                            $maxHasil = $newHasil;
                            $maxDate = $value->tanggal;
                            $maxUser = $value->id_user;
                        }
                        if ($maxDate != $value->tanggal || $maxUser != $value->id_user) {
                            $maxHasil = $newHasil;
                        }
                        $oldHasil = $newHasil;
                    }
                    $oldHasil = 0;
                }
                $newData = [
                    'tanggal'       => $value->tanggal,
                    'hasil_nilai'   => $maxHasil * 100 . '%',
                    'id_penyakit'   => $value->id_penyakit,
                    'nama_penyakit' => $value->penyakit->nama_penyakit,
                    'kode_penyakit' => $value->penyakit->kode_penyakit,
                    'solusi'        => $value->penyakit->solusi,
                    'id_user'       => $value->id_user,
                    'nama'     => $value->user->nama,
                    'username'      => $value->user->username
                ];
                array_push($resultV, $newData);
            }
        }
        return $resultV;
    }
    
    public function hasilDiagnosa2($data)
    {
        $oldHasil = 0;
        $newHasil = 0;
        $maxHasil = 0;
        $maxDate = null;
        $maxUser = null;
        $newData = [];
        $resultV = [];
        foreach ($data as $user) {
            foreach ($user as $tanggal) {
                foreach ($tanggal as $value) {
                    $newHasil = $this->calculate($oldHasil, $value->hasil_nilai);
                    if ($maxHasil < $newHasil) {
                        $maxHasil = $newHasil;
                        $maxDate = $value->tanggal;
                        $maxUser = $value->id_user;
                    }
                    if ($maxDate != $value->tanggal || $maxUser != $value->id_user) {
                        $maxHasil = $newHasil;
                    }
                    $oldHasil = $newHasil;
                }
                $oldHasil = 0;
            }
            $newData = [
                'tanggal'       => $value->tanggal,
                'hasil_nilai'   => $maxHasil * 100 . '%',
                'id_penyakit'   => $value->id_penyakit,
                'nama_penyakit' => $value->penyakit->nama_penyakit,
                'kode_penyakit' => $value->penyakit->kode_penyakit,
                'solusi'        => $value->penyakit->solusi,
                'id_user'       => $value->id_user,
                'nama'     => $value->user->nama,
                'username'      => $value->user->username
            ];
            array_push($resultV, $newData);
        }
        return $resultV;
    }

    public function calculate($n1, $n2)
    {
        return round($n1 + $n2 * (1 - $n1),3);
    }

    public function print(\Illuminate\Http\Request $request)
    {
        $req = $request->all();
        $gejala = $this->hasil->getDatabyTglandUserId($req['tanggal'], $req['id_user']);
        $data = $gejala->groupBy(['id_user', 'tanggal', 'id_penyakit']);
        $hd = $this->hasilDiagnosa($data);
        $newArray = [];
        foreach ($hd as $value) {
            if ($value['tanggal'] == $req['tanggal'] && $value['id_user'] == $req['id_user']) {
                array_push($newArray, $value);
            }
        }
        $data = [
            'gejala' => $gejala,
            'detail' => $newArray,
        ];
        return view('print', compact('data'));
    }

    public function hasilDiagnosaDetail($data, $id_user = null, $tanggal = null)
    {
        $oldHasil = 0;
        $newHasil = 0;
        $newData = [];
        $resultV = [];
        foreach ($data as $user) {
            foreach ($user as $tanggal) {
                foreach ($tanggal as $penyakit) {
                    foreach ($penyakit as $value) {
                        $newHasil = $this->calculate($oldHasil, $value->hasil_nilai);
                        $oldHasil = $newHasil;
                    }
                    $newData = [
                        'tanggal'       => $value->tanggal,
                        'nama_penyakit' => $value->penyakit->nama_penyakit,
                        'hasil_nilai'   => $newHasil * 100 . '%',
                        'id_user'       => $value->id_user,
                        'solusi'        => $value->penyakit->solusi
                    ];
                    array_push($resultV, $newData);
                    $oldHasil = 0;
                }
            }
        }
        return $resultV;
    }

    public function getDiagnosa()
    {
        // $data     = $this->hasil->getData()->groupBy(['id_user', 'tanggal', 'id_penyakit']);
        // $hd       = $this->hasilDiagnosa($data);
        $data = $this->hasil->getData()->groupBy(['id_user', 'tanggal']);
        $hd   = $this->hasilDiagnosa2($data);
        return $hd;
    }
}
