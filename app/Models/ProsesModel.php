<?php

namespace app\Models;


use CodeIgniter\Model;

class ProsesModel extends Model
{
    protected $table = 'log_peminjaman';
    protected $allowedFields = ['id_anggota', 'nama', 'kondisi', 'id_pinjam', 'tgl_pinjam', 'tgl_kembali', 'id_buku', 'nama_buku', 'status', 'duid'];

    public function Tampilkan($id = false)
    {
        if ($id === false) {
            return $this->table($this->table)->get()->getResultArray();
        } else {
            return $this->table($this->table)->where('id_nota', $id)->get()->getRowArray();
        }
    }
    public function tambah($data)
    {
        return $this->db->table($this->table)->insert($data);
    }
    public function hapus($data)
    {
        return $this->db->table($this->table)->delete($data);
    }
    public function update_kembali($data)
    {
        return $this->db->table($this->table)->updateBatch($data, 'id_pinjam');
    }
    public function tambah_pinjam_paket($data)
    {
        return $this->db->table($this->table)->insertBatch($data);
    }
    public function queryone($id, $paket)
    {
        return  $this->db->table($this->table)->like('status', $id)->like('kategori', $paket)->limit(20)->orderBy('tgl_pinjam', 'DESC')->get()->getResultArray();
    }
    public function querytwo($idp, $paket)
    {
        return  $this->db->table($this->table)->like('status', $idp)->like('kategori', $paket)->limit(10)->orderBy('tgl_pinjam', 'DESC')->get()->getResultArray();
    }
    public function jal($idp, $cari, $paket)
    {
        return  $this->db->table($this->table)->where('status', $idp)->where('id_anggota', $cari)->where('kategori', $paket)->get()->getResultArray();
    }
    public function ceklagi($ks, $id)
    {
        return  $this->db->table($this->table)->where('k_st', $ks)->where('id_anggota', $id)->get()->getResultArray();
    }
    public function queryone_paket($id, $paket)
    {
        return  $this->db->table($this->table)->like('status', $id)->like('kategori', $paket)->get()->getResultArray();
    }
    public function querytwo_paket($idp, $paket)
    {
        return  $this->db->table($this->table)->like('status', $idp)->like('kategori', $paket)->get()->getResultArray();
    }
    public function jal_paket($id, $cari, $paket)
    {
        return  $this->db->table($this->table)->where('status', $id)->where('id_anggota', $cari)->where('kategori', $paket)->get()->getResultArray();
    }
    public function tigabulan()
    {
        return $this->db->query("SELECT * FROM log_peminjaman where tgl_pinjam >= DATE_SUB(CURDATE(), INTERVAL 3 MONTH)")->getResultArray();
    }
    public function satutahun()
    {
        return $this->db->query("SELECT * FROM log_peminjaman where tgl_pinjam >= DATE_SUB(CURDATE(), INTERVAL 1 YEAR)")->getResultArray();
    }
}
