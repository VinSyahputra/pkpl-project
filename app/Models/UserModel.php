<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table         = 'tb_user';
    protected $primaryKey    = 'id_user';
    protected $allowedFields = ['level', 'nama', 'username', 'password'];
    protected $useTimestamps = true;


    function showData($id = false)
    {
        if ($id == false) {

            return $this->table('tb_user')->where(['level' => 1])->get()->getResultArray();
        }
        return $this->table('tb_user')->where(['level' => 1, 'id_user' => $id])->get()->getResultArray();
    }

    function showData2($id = false)
    {
        if ($id == false) {

            return $this->table('tb_user')->get()->getResultArray();
        }
        return $this->where(['id_user' => $id])->first();
    }

    public function login($username, $password)
    {
        return $this->table('tb_user')->where(['username' => $username, 'password' => $password])->get()->getRowArray();
    }
}
