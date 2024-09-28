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
    protected $fillable   = ['tanggal','id_nilai_cf','hasil_nilai','id_user'];

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
        $saveData->id_nilai_cf = $data['id_nilai_cf'];
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

    public function nilai_cf(): BelongsTo
    {
        return $this->BelongsTo(BasisPengetahuanModel::class, 'id_nilai_cf', 'id');
    }
    
    public function user(): BelongsTo
    {
        return $this->BelongsTo(UserModel::class, 'id_user', 'id');
    }
}
