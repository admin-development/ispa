<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HasilDiagnosaModel extends Model
{
    use HasFactory;
    public $timestamps    = true;

    protected $table      = 'hasil_diagnosa';
    protected $primaryKey = 'id';
    protected $fillable   = ['tanggal','id_penyakit','id_gejala','hasil_nilai','id_user'];

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
        $saveData->tanggal     = $data['tanggal'];
        $saveData->id_penyakit = $data['id_penyakit'];
        $saveData->id_gejala   = $data['id_gejala'];
        $saveData->hasil_nilai = $data['hasil_nilai'];
        $saveData->id_user     = $data['id_user'];
        $saveData->save();

        return $saveData;
    }

    public function deleteData($id)
    {
        return $this->find($id)->delete();
    }
    
    public function getDatabyTglandUserId($tanggal, $id_user)
    {
        return $this->where(['tanggal' => date($tanggal), 'id_user' => $id_user])->get();
    }

    public function gejala(): BelongsTo
    {
        return $this->BelongsTo(GejalaModel::class, 'id_gejala', 'id');
    }

    public function penyakit(): BelongsTo
    {
        return $this->BelongsTo(PenyakitModel::class, 'id_penyakit', 'id');
    }
    
    public function user(): BelongsTo
    {
        return $this->BelongsTo(UserModel::class, 'id_user', 'id');
    }
}
