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
        $file = $request->file('image');
        if (!empty($data['image']) or !empty($file['image'])) {
            $fileName = $file->hashName();
            $file->move('images', $fileName);
            $data['image'] = $fileName;
        } else {
            $data['image'] = 'no-image.png';
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
        $file = $request->file('image');
        if (isset($data['image']) and (!empty($data['image']) or !empty($file['image']))) {
            $oldFile = $this->edukasi->getGambarbyId($id);
            if (!empty($oldFile) and $oldFile->image != "no-image.png") {
                $imgPath = 'images/' . $oldFile->image;
                if(\File::exists($imgPath)) {
                    \File::delete($imgPath);
                }
            }
            $fileName = $file->hashName();
            $file->move('images', $fileName);
            $data['image'] = $fileName;
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
        if (!empty($oldFile) and $oldFile->image != "no-image.png") {
            $imgPath = 'images/' . $oldFile->image;
            if(\File::exists($imgPath)) {
                \File::delete($imgPath);
            }
        }
        $this->edukasi->deleteData($id);
        return redirect()->back()->withErrors(['msg' => 'Success', 'success' => 'Data berhasil dihapus']);
    }
}
