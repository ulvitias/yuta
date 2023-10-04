<?php

namespace app\Models;

use CodeIgniter\Model;

class AnggotaModel extends Model
{
    protected $table = 'anggota';
    protected $primaryKey = 'id_anggota';
    protected $allowedFields = ['id_anggota', 'nama', 'tahun_ajaran', 'gender', 'jabatan', 'kelas'];

    protected $returnType = 'array';

    protected $useTimestamps = false;

    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;

    public function Tampilkan($id = false)
    {
        if ($id === false) {
            return $this->table('anggota')->get()->getResultArray();
        } else {
            return $this->table('anggota')->where('id_anggota', $id)->get()->getRowArray();
        }
    }

    public function tambah($data)
    {
        return $this->db->table($this->table)->insert($data);
    }
    public function hapus($id)
    {
        return $this->db->table($this->table)->delete(['id_anggota' => $id]);
    }
    public function perbaharui($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['id_anggota' => $id]);
    }
}

class Imager extends Model
{
    protected $table = 'other';
}
