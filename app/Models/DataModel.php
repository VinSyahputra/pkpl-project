<?php

namespace App\Models;

use CodeIgniter\Model;

class DataModel extends Model
{
    protected $table         = 'tb_data';
    protected $allowedFields = ['id_ruangan', 'id_user', 'tanggal', 'waktu_mulai', 'waktu_berakhir', 'kontak', 'keterangan'];
    protected $useTimestamps = true;

    function getData($ruangan = false, $id = false)
    {
        if ($id == false) {
            return $this->db->table('tb_data')->join('tb_ruangan', 'tb_ruangan.id_ruangan=tb_data.id_ruangan')->join('tb_user', 'tb_user.id_user=tb_data.id_user')->where(['tb_ruangan.nama_ruangan' => $ruangan])->orderBy('tanggal', 'ASC')->orderBy('waktu_mulai', 'ASC')->get()->getResultArray();
        }
        return $this->db->table('tb_data')->join('tb_ruangan', 'tb_ruangan.id_ruangan=tb_data.id_ruangan')->join('tb_user', 'tb_user.id_user=tb_data.id_user')->where(['tb_data.id' => $id])->get()->getResultArray();
    }

    function getRuangan()
    {
        return $this->db->table('tb_data')->join('tb_ruangan', 'tb_ruangan.id_ruangan=tb_data.id_ruangan')->join('tb_user', 'tb_user.id_user=tb_data.id_user')->orderBy('waktu_mulai', 'ASC')->orderBy('nama_ruangan', 'ASC')->get()->getResultArray();
    }
}
