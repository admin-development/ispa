<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EdukasiModel extends Model
{
    use HasFactory;
    public $timestamps    = true;

    protected $table      = 'edukasi';
    protected $primaryKey = 'id';
    protected $fillable   = ['judul','gambar','deskripsi'];

    public function getData($id = null)
    {
        if ($id === null) {
            return $this->all();
        } else {
            return $this->find($id);
        }
    }

    public function insertOrUpdate($data, $id = null)
    {
        $saveData = $this->firstOrNew(['id' =>  $id]);
        $saveData->judul     = $data['judul'];
        if (isset($data['gambar'])) {
            $saveData->gambar    = $data['gambar'];
        }
        $saveData->deskripsi = $data['deskripsi'];
        $saveData->save();

        return $saveData;
    }

    public function deleteData($id)
    {
        return $this->find($id)->delete();
    }

    public function getGambarbyId($id)
    {
        return $this->select('gambar')->find($id);
    }
}
