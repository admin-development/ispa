<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BasisPengetahuanController extends Controller
{
    public function index()
    {
        $data     = $this->basis->getData();
        return view('basis.index', compact('data'));
    }

    public function create()
    {
        $data = [
            'penyakit' => $this->penyakit->getData(),
            'gejala'   => $this->gejala->getData()
        ];
        return view('basis.create', compact('data'));
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
        $save = $this->basis->insertOrUpdate($data);
        if (!empty($save)) {
            return redirect()->to(route('nilai-cf.index'))->withErrors(['msg' => 'Success', 'success' => 'Data berhasil ditambahkan']);
        } else {
            return redirect()->to(route('nilai-cf.index'))->withErrors(['msg' => 'Error', 'error' => 'Data gagal ditambahkan']);
        }
    }

    public function edit($id)
    {
        $data = [
            'basis'    => $this->basis->getData($id),
            'penyakit' => $this->penyakit->getData(),
            'gejala'   => $this->gejala->getData()
        ];
        return view('basis.edit', compact('data'));
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
        $save = $this->basis->insertOrUpdate($data, $id);
        if (!empty($save)) {
            return redirect()->to(route('nilai-cf.index'))->withErrors(['msg' => 'Success', 'success' => 'Data berhasil diubah']);
        } else {
            return redirect()->to(route('nilai-cf.index'))->withErrors(['msg' => 'Error', 'error' => 'Data gagal diubah']);
        }
    }

    public function destroy($id)
    {
        $this->basis->deleteData($id);
        return redirect()->back()->withErrors(['msg' => 'Success', 'success' => 'Data berhasil dihapus']);
    }
}
