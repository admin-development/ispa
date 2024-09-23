<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GejalaModel extends Model
{
    use HasFactory;
    public $timestamps    = true;

    protected $table      = 'gejala';
    protected $primaryKey = 'id';
    protected $fillable   = ['kode_gejala','nama_gejala'];

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
        $saveData->kode_gejala = $data['kode_gejala'];
        $saveData->nama_gejala = $data['nama_gejala'];
        $saveData->save();

        return $saveData;
    }

    public function deleteData($id)
    {
        return $this->find($id)->delete();
    }

    public function getLast()
    {
        return $this->select('kode_gejala')->latest()->first();
    }
}
