<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BasisPengetahuanModel extends Model
{
    use HasFactory;
    public $timestamps    = true;

    protected $table      = 'basis_pengetahuan';
    protected $primaryKey = 'id';
    protected $fillable   = ['id_penyakit','id_gejala','mb','md'];

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
        $saveData->id_penyakit = $data['id_penyakit'];
        $saveData->id_gejala   = $data['id_gejala'];
        $saveData->mb          = $data['mb'];
        $saveData->md          = $data['md'];
        $saveData->save();

        return $saveData;
    }

    public function deleteData($id)
    {
        return $this->find($id)->delete();
    }

    public function getDatabyGejalaId($id_gejala)
    {
        return $this->where('id_gejala',$id_gejala)->first();
    }

    public function gejala(): BelongsTo
    {
        return $this->BelongsTo(GejalaModel::class, 'id_gejala', 'id');
    }

    public function penyakit(): BelongsTo
    {
        return $this->BelongsTo(PenyakitModel::class, 'id_penyakit', 'id');
    }
}
