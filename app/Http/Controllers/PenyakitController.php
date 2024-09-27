<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PenyakitController extends Controller
{
    public function index()
    {
        $data = $this->penyakit->getData();
        return view('penyakit.index', compact('data'));
    }

    public function create()
    {
        $data = 'D' . (int)substr($this->penyakit->getLast()->kode_penyakit, 1) + 1;
        return view('penyakit.create', compact('data'));
    }

    public function store(Request $request)
    {
        if (!$request->validate([
            'nama_penyakit' => 'required'
        ], [
            'nama_penyakit' => 'Nama penyakit tidak boleh kosong'
        ])) {
            return redirect()->to(route('penyakit.create'));
        };
        
        $data = $request->all();
        $save = $this->penyakit->insertOrUpdate($data);
        if (!empty($save)) {
            return redirect()->to(route('penyakit.index'))->withErrors(['msg' => 'Success', 'success' => 'Data berhasil ditambahkan']);
        } else {
            return redirect()->to(route('penyakit.index'))->withErrors(['msg' => 'Error', 'error' => 'Data gagal ditambahkan']);
        }
    }

    public function edit($id)
    {
        $data = $this->penyakit->getData($id);
        return view('penyakit.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        if (!$request->validate([
            'nama_penyakit' => 'required'
        ], [
            'nama_penyakit' => 'Nama penyakit tidak boleh kosong'
        ])) {
            return redirect()->to(route('penyakit.edit', $id));
        };
        
        $data = $request->all();
        $save = $this->penyakit->insertOrUpdate($data, $id);
        if (!empty($save)) {
            return redirect()->to(route('penyakit.index'))->withErrors(['msg' => 'Success', 'success' => 'Data berhasil diubah']);
        } else {
            return redirect()->to(route('penyakit.index'))->withErrors(['msg' => 'Error', 'error' => 'Data gagal diubah']);
        }
    }

    public function destroy($id)
    {
        $this->penyakit->deleteData($id);
        return redirect()->back()->withErrors(['msg' => 'Success', 'success' => 'Data berhasil dihapus']);
    }
}
