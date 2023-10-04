<?php

namespace app\Models;

use CodeIgniter\Model;

class NotaModel extends Model
{
    protected $table = 'nota';
    protected $allowedFields = ['`id_anggota', 'nama', 'id_pinjam', 'tgl_pinjam', 'tgl_kembali', 'tgl_terlambat', 'status', 'jumlah', 'id_nota'];

    public function Tampilkan($id = false)
    {
        if ($id === false) {
            return $this->table($this->table)->get()->getResultArray();
        } else {
            return $this->table($this->table)->where('id_nota', $id)->get()->getRowArray();
        }
    }
    public function tampil_cari($cari)
    {
        return $this->db->table($this->table)->like('id_anggota', $cari)->get()->getResultArray();
    }
    public function tambah($dat)
    {
        return $this->db->table($this->table)->insert($dat);
    }
}
