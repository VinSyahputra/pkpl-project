<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\I18n\Time;

class RuanganModel extends Model
{
    protected $table         = 'tb_ruangan';
    protected $primaryKey    = 'id_ruangan';
    protected $allowedFields = ['nama_ruangan'];
    protected $useTimestamps = true;

    function getData($id = false)
    {
        if ($id == false) {
            return $this->table('tb_ruangan')->orderBy('nama_ruangan', 'ASC')->findAll();
        }
        return $this->where(['id_ruangan' => $id])->first();
    }

    function getDataID($ruangan)
    {
        return $this->where(['nama_ruangan' => $ruangan])->first();
    }


    function getRuangan()
    {
        return $this->table('tb_ruangan')->orderBy('nama_ruangan', 'ASC')->findAll();
    }
    function activeData()
    {
        date_default_timezone_set('Asia/Jakarta');
        $today = Time::today('Asia/Jakarta');
        $a = Time::parse($today);
        return $this->db->table('tb_ruangan')->join('tb_data', 'tb_data.id_ruangan=tb_ruangan.id_ruangan')->join('tb_user', 'tb_user.id_user=tb_data.id_user')->where(['tb_data.tanggal' => $a])->orderBy('nama_ruangan', 'ASC')->orderBy('waktu_mulai', 'ASC')->get()->getResultArray();
    }
    function nonactiveData()
    {
        date_default_timezone_set('Asia/Jakarta');
        $today = Time::today('Asia/Jakarta');
        $a = Time::parse($today);
        // return $this->db->query("SELECT * FROM tb_data LEFT JOIN tb_ruangan ON tb_data.id_ruangan = tb_ruangan.id_ruangan WHERE tb_data.tanggal != NOW()")->getResultArray();
        return $this->db->query("SELECT nama_ruangan FROM tb_ruangan WHERE tb_ruangan.id_ruangan NOT IN (SELECT id_ruangan FROM tb_data) UNION SELECT DISTINCT tb_ruangan.nama_ruangan FROM tb_data RIGHT JOIN tb_ruangan ON tb_data.id_ruangan = tb_ruangan.id_ruangan WHERE tb_data.id_ruangan NOT IN (SELECT tb_data.id_ruangan FROM tb_data JOIN tb_ruangan ON tb_data.id_ruangan = tb_ruangan.id_ruangan WHERE tb_data.tanggal = CURDATE() ORDER BY tb_data.waktu_mulai) ORDER BY nama_ruangan")->getResultArray();
        // return $this->db->table('tb_ruangan')->where(['id_ruangan NOT IN (SELECT * FROM tb_data JOIN tb_ruangan ON tb_data.id_ruangan = tb_ruangan.id_ruangan )'])->get()->getResultArray();
        // return $this->db->table('tb_data')->join('tb_ruangan', 'tb_data.id_ruangan=tb_ruangan.id_ruangan', 'outer')->where(['tb_data.tanggal' => $a])->orderBy('nama_ruangan', 'ASC')->get()->getResultArray();
    }
}
