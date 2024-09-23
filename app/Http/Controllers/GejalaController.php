<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GejalaController extends Controller
{
    public function index()
    {
        $data = $this->gejala->getData();
        return view('gejala.index', compact('data'));
    }

    public function create()
    {
        $data = 'KG' . (int)substr($this->gejala->getLast()->kode_gejala, 2) + 1;
        return view('gejala.create', compact('data'));
    }

    public function store(Request $request)
    {
        if (!$request->validate([
            'nama_gejala' => 'required'
        ], [
            'nama_gejala' => 'Nama gejala tidak boleh kosong'
        ])) {
            return redirect()->to(route('gejala.create'));
        };
        
        $data = $request->all();
        $save = $this->gejala->insertOrUpdate($data);
        if (!empty($save)) {
            return redirect()->to(route('gejala.index'))->withErrors(['msg' => 'Success', 'success' => 'Data berhasil ditambahkan']);
        } else {
            return redirect()->to(route('gejala.index'))->withErrors(['msg' => 'Error', 'error' => 'Data gagal ditambahkan']);
        }
    }

    public function edit($id)
    {
        $data = $this->gejala->getData($id);
        return view('gejala.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        if (!$request->validate([
            'nama_gejala' => 'required'
        ], [
            'nama_gejala' => 'Nama gejala tidak boleh kosong'
        ])) {
            return redirect()->to(route('gejala.edit', $id));
        };
        
        $data = $request->all();
        $save = $this->gejala->insertOrUpdate($data, $id);
        if (!empty($save)) {
            return redirect()->to(route('gejala.index'))->withErrors(['msg' => 'Success', 'success' => 'Data berhasil diubah']);
        } else {
            return redirect()->to(route('gejala.index'))->withErrors(['msg' => 'Error', 'error' => 'Data gagal diubah']);
        }
    }

    public function destroy($id)
    {
        $this->gejala->deleteData($id);
        return redirect()->back()->withErrors(['msg' => 'Success', 'success' => 'Data berhasil dihapus']);
    }
}
