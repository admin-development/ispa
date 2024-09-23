<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EdukasiController extends Controller
{
    public function index()
    {
        $data = $this->edukasi->getData();
        return view('edukasi.index', compact('data'));
    }

    public function create()
    {
        return view('edukasi.create');
    }

    public function store(Request $request)
    {
        if (!$request->validate([
            'judul'     => 'required',
            'deskripsi' => 'required'
        ], [
            'judul'     => 'Nama edukasi tidak boleh kosong',
            'deskripsi' => 'Deskripsi edukasi tidak boleh kosong'
        ])) {
            return redirect()->to(route('edukasi.create'));
        };
        
        $data = $request->all();
        $file = $request->file('gambar');
        if (!empty($data['gambar']) or !empty($file['gambar'])) {
            $fileName = $file->hashName();
            $file->move('img', $fileName);
            $data['gambar'] = $fileName;
        } else {
            $data['gambar'] = 'no-image.png';
        }
        $save = $this->edukasi->insertOrUpdate($data);
        if (!empty($save)) {
            return redirect()->to(route('edukasi.index'))->withErrors(['msg' => 'Success', 'success' => 'Data berhasil ditambahkan']);
        } else {
            return redirect()->to(route('edukasi.index'))->withErrors(['msg' => 'Error', 'error' => 'Data gagal ditambahkan']);
        }
    }

    public function show($id)
    {
        $data = $this->edukasi->getData($id);
        return view('edukasi.show', compact('data'));
    }

    public function edit($id)
    {
        $data = $this->edukasi->getData($id);
        return view('edukasi.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        if (!$request->validate([
            'judul'     => 'required',
            'deskripsi' => 'required'
        ], [
            'judul'     => 'Nama edukasi tidak boleh kosong',
            'deskripsi' => 'Deskripsi edukasi tidak boleh kosong'
        ])) {
            return redirect()->to(route('edukasi.edit', $id));
        };
        
        $data = $request->all();
        $file = $request->file('gambar');
        if (isset($data['gambar']) and (!empty($data['gambar']) or !empty($file['gambar']))) {
            $oldFile = $this->edukasi->getGambarbyId($id);
            if (!empty($oldFile) and $oldFile->gambar != "no-image.png") {
                $imgPath = 'img/' . $oldFile->gambar;
                if(\File::exists($imgPath)) {
                    \File::delete($imgPath);
                }
            }
            $fileName = $file->hashName();
            $file->move('img', $fileName);
            $data['gambar'] = $fileName;
        }
        $save = $this->edukasi->insertOrUpdate($data, $id);
        if (!empty($save)) {
            return redirect()->to(route('edukasi.index'))->withErrors(['msg' => 'Success', 'success' => 'Data berhasil diubah']);
        } else {
            return redirect()->to(route('edukasi.index'))->withErrors(['msg' => 'Error', 'error' => 'Data gagal diubah']);
        }
    }

    public function destroy($id)
    {
        $oldFile = $this->edukasi->getGambarbyId($id);
        if (!empty($oldFile) and $oldFile->gambar != "no-image.png") {
            $imgPath = 'img/' . $oldFile->gambar;
            if(\File::exists($imgPath)) {
                \File::delete($imgPath);
            }
        }
        $this->edukasi->deleteData($id);
        return redirect()->back()->withErrors(['msg' => 'Success', 'success' => 'Data berhasil dihapus']);
    }
}
