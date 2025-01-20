<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class HomeController extends Controller
{   
    public function diagnosa()
    {
        $user    = $this->user->getDatabyUsername(\Session::get('username'));
        $tgl     = Carbon::today()->toDateString();
        $id_user = $user->id;
        $gejala  = $this->hasil->getDatabyTglandUserId($tgl, $id_user);
        if (count($gejala) !== 0) {
            $hd = $this->getDiagnosa();
            $newArray = [];
            foreach ($hd as $value) {
                if ($value['tanggal'] == $tgl && $value['id_user'] == $id_user) {
                    array_push($newArray, $value);
                }
            }
            $data = [
                'gejala' => $gejala,
                'detail' => $newArray,
            ];
        } else {
            $data = $this->gejala->getData();
        }
        return view('frontend.diagnosa',compact('data'));
    }

    public function store(Request $request)
    {
        $nextId = 0;
        $data = $request->all();

        foreach ($data['id_gejala'] as $value) {
            $nilaiCf = $this->basis->getDatabyGejalaId($value);
            if ($nilaiCf) {
                $user = $this->user->getDatabyUsername(\Session::get('username'));
                $insertData = [
                    'tanggal'     => date(now()),
                    'id_nilai_cf' => $nextId == 18 ? $nextId : $nilaiCf->id,
                    'hasil_nilai' => $nilaiCf->mb * $nilaiCf->md,
                    'id_user'     => $user->id
                ];
                $this->hasil->insertOrUpdate($insertData);
                if ($nilaiCf->id == 17) { $nextId = 18; }
            }
        }

        return redirect()->to(route('diagnosa'));
    }

    public function edukasi()
    {
        $model = new \App\Models\EdukasiModel();
        $articles = $model->getData();
        $delay = 0;
        $i = 0;
        return view('frontend.edukasi', compact('articles', 'delay', 'i'));
    }
    
    public function artikel_detail($id)
    {
        $data = $this->edukasi->getData($id);
        return view('frontend.artikel', compact('data'));
    }

    public function riwayat()
    {
        $hd = $this->getDiagnosa();
        foreach ($hd as $key => $value) {
            if ($value['username'] !== \Session::get('username')) {
                unset($hd[$key]);
            }
        }
        return view('frontend.riwayat', compact('hd'));
    }

    public function riwayat_detail(Request $request)
    {
        $req = $request->all();
        $gejala = $this->hasil->getDatabyTglandUserId($req['tanggal'], $req['id_user']);
        $hd = $this->getDiagnosa();
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
        return view('frontend.riwayat', compact('data'));
    }

    public function about()
    {
        return view('frontend.about');
    }
}
