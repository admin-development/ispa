<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $data = $this->user->getData();
        return view('user.index', compact('data'));
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        if (!$request->validate([
            'nama' => 'required'
        ], [
            'nama' => 'Nama user tidak boleh kosong'
        ])) {
            return redirect()->to(route('pengguna.create'));
        };
        
        $data = $request->all();
        $save = $this->user->insertOrUpdate($data);
        if (!empty($save)) {
            return redirect()->to(route('pengguna.index'))->withErrors(['msg' => 'Success', 'success' => 'Data berhasil ditambahkan']);
        } else {
            return redirect()->to(route('pengguna.index'))->withErrors(['msg' => 'Error', 'error' => 'Data gagal ditambahkan']);
        }
    }

    public function edit($id)
    {
        $data = $this->user->getData($id);
        return view('user.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        if (!$request->validate([
            'nama' => 'required'
        ], [
            'nama' => 'Nama user tidak boleh kosong'
        ])) {
            return redirect()->to(route('pengguna.edit', $id));
        };
        
        $data = $request->all();
        $save = $this->user->insertOrUpdate($data, $id);
        if (!empty($save)) {
            return redirect()->to(route('pengguna.index'))->withErrors(['msg' => 'Success', 'success' => 'Data berhasil diubah']);
        } else {
            return redirect()->to(route('pengguna.index'))->withErrors(['msg' => 'Error', 'error' => 'Data gagal diubah']);
        }
    }

    public function destroy($id)
    {
        $this->user->deleteData($id);
        return redirect()->back()->withErrors(['msg' => 'Success', 'success' => 'Data berhasil dihapus']);
    }
}
