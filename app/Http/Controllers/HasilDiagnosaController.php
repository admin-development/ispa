<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HasilDiagnosaController extends Controller
{
    public function index()
    {
        $hd = $this->getDiagnosa();
        return view('hasil.index', compact('hd'));
    }

    public function create()
    {
        $data = [
            'penyakit' => $this->penyakit->getData(),
            'gejala'   => $this->gejala->getData()
        ];
        return view('hasil.create', compact('data'));
    }

    public function store(Request $request)
    {
        if (!$request->validate([
            'id_penyakit' => 'required',
            'id_gejala'   => 'required'
        ], [
            'id_penyakit' => 'Pilih nama penyakit',
            'id_gejala'   => 'Pilih nama gejala'
        ])) {
            return redirect()->to(route('nilai-cf.create'));
        };
        
        $data = $request->all();
        $save = $this->hasil->insertOrUpdate($data);
        if (!empty($save)) {
            return redirect()->to(route('nilai-cf.index'))->withErrors(['msg' => 'Success', 'success' => 'Data berhasil ditambahkan']);
        } else {
            return redirect()->to(route('nilai-cf.index'))->withErrors(['msg' => 'Error', 'error' => 'Data gagal ditambahkan']);
        }
    }

    public function edit($id)
    {
        $data = [
            'hasil'    => $this->hasil->getData($id),
            'penyakit' => $this->penyakit->getData(),
            'gejala'   => $this->gejala->getData()
        ];
        return view('hasil.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        if (!$request->validate([
            'id_penyakit' => 'required',
            'id_gejala'   => 'required'
        ], [
            'id_penyakit' => 'Pilih nama penyakit',
            'id_gejala'   => 'Pilih nama gejala'
        ])) {
            return redirect()->to(route('nilai-cf.edit', $id));
        };
        
        $data = $request->all();
        $save = $this->hasil->insertOrUpdate($data, $id);
        if (!empty($save)) {
            return redirect()->to(route('nilai-cf.index'))->withErrors(['msg' => 'Success', 'success' => 'Data berhasil diubah']);
        } else {
            return redirect()->to(route('nilai-cf.index'))->withErrors(['msg' => 'Error', 'error' => 'Data gagal diubah']);
        }
    }

    public function destroy($id)
    {
        $this->hasil->deleteData($id);
        return redirect()->back()->withErrors(['msg' => 'Success', 'success' => 'Data berhasil dihapus']);
    }

    public function detail(Request $request)
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
        return view('hasil.show', compact('data'));
    }
}
