<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupModel extends Model
{
    use HasFactory;
    public $timestamps    = true;

    protected $table      = 'group';
    protected $primaryKey = 'id';
    protected $fillable   = ['nama_group'];

    public function getData($id = null)
    {
        if ($id === null) {
            return $this->all();
        } else {
            return $this->find($id);
        }
    }

    public function insertOrUpdate($data)
    {
        return $this->firstOrCreate($data);
    }

    public function deleteData($id)
    {
        return $this->find($id)->delete();
    }
}
