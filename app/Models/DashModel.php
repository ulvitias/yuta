<?php

namespace app\Models;

use CodeIgniter\Model;

class DashModel extends Model
{
    protected $table = 'perpus';
    protected $primaryKey = 'id_buku_perpus';
    protected $allowedFields = ['id_buku_perpus', 'judul_buku_perpus', 'pengarang', 'penerbit', 'kategori', 'tahun_sk', 'mapel', 'stok', 'rak', 'jumlah', 'kelas'];

    protected $returnType = 'array';

    protected $useTimestamps = false;

    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;

    public function Tampilkan($id = false)
    {
        if ($id === false) {
            return $this->table('perpus')->get()->getResultArray();
        } else {
            return $this->table('perpus')->where('id_buku_perpus', $id)->get()->getRowArray();
        }
    }
    public function tambah($data)
    {
        return $this->db->table($this->table)->insert($data);
    }
    public function hapus($id)
    {
        return $this->db->table($this->table)->delete(['id_buku_perpus' => $id]);
    }
    public function perbaharui_buku($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['id_buku_perpus' => $id]);
    }
    public function cek_data_paket_kelas($kelas)
    {
        return  $this->db->table($this->table)->where('kelas', $kelas)->where('kategori', "paket")->get()->getResultArray();
    }
}
// PEMBATAS //
