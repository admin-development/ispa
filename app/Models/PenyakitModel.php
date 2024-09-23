<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenyakitModel extends Model
{
    use HasFactory;
    public $timestamps    = true;

    protected $table      = 'penyakit';
    protected $primaryKey = 'id';
    protected $fillable   = ['kode_penyakit','nama_penyakit','solusi'];

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
        $saveData->kode_penyakit = $data['kode_penyakit'];
        $saveData->nama_penyakit = $data['nama_penyakit'];
        $saveData->solusi        = $data['solusi'];
        $saveData->save();

        return $saveData;
    }

    public function deleteData($id)
    {
        return $this->find($id)->delete();
    }

    public function getLast()
    {
        return $this->select('kode_penyakit')->latest()->first();
    }
}
