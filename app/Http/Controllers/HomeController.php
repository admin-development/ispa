<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        return view('template.app');
    }
    
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
        $data = $request->all();

        if (!isset($data['id_gejala'])) {
            $message = 'Pilih setidaknya satu gejala yang anda alami!';
            return view('frontend.error', compact('message'));
        }

        foreach ($data['id_gejala'] as $value) {
            $dataGejala = $this->basis->getDatabyGejalaId($value);
            if ($dataGejala) {
                $user = $this->user->getDatabyUsername(\Session::get('username'));
                $insertData = [
                    'tanggal'     => date(now()),
                    'id_penyakit' => $dataGejala->id_penyakit,
                    'id_gejala'   => $value,
                    'hasil_nilai' => $dataGejala->mb * $dataGejala->md,
                    'id_user'     => $user->id
                ];
                $this->hasil->insertOrUpdate($insertData);
            }
        }

        // $user    = $this->user->getDatabyUsername(\Session::get('username'));
        // $tgl     = Carbon::today()->toDateString();
        // $id_user = $user->id;
        // $gejala  = $this->hasil->getDatabyTglandUserId($tgl, $id_user);
        // $data    = $gejala->groupBy(['id_user', 'tanggal', 'id_penyakit']);
        // $hd      = $this->hasilDiagnosa($data);
        // $sakitId = $hd[0]['id_penyakit'];
        // $gCount  = 0;

        // if (count($gejala) > 7) {
        //     foreach ($gejala as $value) {
        //         $this->hasil->deleteData($value['id']);
        //     }
        //     $message = 'Tidak ada diagnosa yang sesuai, silakan coba lagi!';
        //     return view('frontend.error', compact('message'));
        // }

        // foreach ($gejala as $value) {
        //     if ($value['id_penyakit'] != $sakitId) {
        //         $this->hasil->deleteData($value['id']);
        //     } else {
        //         $gCount += 1;
        //     }
        // }

        // if (($sakitId == 1 && $gCount != 4) || ($sakitId == 2 && $gCount != 7) || ($sakitId == 3 && $gCount != 6) || ($sakitId == 4 && $gCount != 7) || ($sakitId == 5 && $gCount != 7)) {
        //     foreach ($gejala as $value) {
        //         if ($value['id_penyakit'] == $sakitId) {
        //             $this->hasil->deleteData($value['id']);
        //         }
        //     }
        //     $message = 'Tidak ada diagnosa yang sesuai, silakan coba lagi!';
        //     return view('frontend.error', compact('message'));
        // }

        return redirect()->to(route('diagnosa'));
    }

    public function artikel()
    {
        $data = $this->edukasi->getData();
        return view('frontend.artikel', compact('data'));
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
