<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    use HasFactory;
    public $timestamps    = true;

    protected $table      = 'user';
    protected $primaryKey = 'id';
    protected $fillable   = ['nama','username','password','no_hp','id_group'];

    public function getData($id = null)
    {
        if ($id === null) {
            return $this->all();
        } else {
            return $this->find($id);
        }
    }

    public function getDatabyUsername($username = null)
    {
        return $this->where('username',$username)->first();
    }

    public function insertOrUpdate($data, $id = null)
    {
        $saveData = $this->firstOrNew(['id' =>  $id]);
        $saveData->nama = $data['nama'];
        $saveData->username  = $data['username'];
        if (isset($data['password'])) {
            $saveData->password  = bcrypt($data['password']);
        }
        $saveData->no_hp     = $data['no_hp'];
        $saveData->id_group  = 2;
        if (isset($data['id_group'])) {
            $saveData->id_group = $data['id_group'] == 1 ? 1 : 2;
        }
        $saveData->save();

        return $saveData;
    }

    public function deleteData($id)
    {
        return $this->find($id)->delete();
    }
}
