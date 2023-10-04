<?php

namespace App\Controllers;

use App\Models\AnggotaModel;
use App\Models\DashModel;
use App\Models\ProsesModel;

class Home extends BaseController
{
	public function __construct()
	{
		$this->anggota = new AnggotaModel();
		$this->pinjam = new ProsesModel();
		$this->buku = new DashModel();
	}
	public function index()
	{
		$data['hitung'] = $this->anggota->query("SELECT anggota.*, count( log_peminjaman.id_anggota ) 
		FROM log_peminjaman LEFT JOIN anggota ON anggota.id_anggota=log_peminjaman.id_anggota 
		GROUP BY log_peminjaman.id_anggota ORDER BY count( log_peminjaman.id_anggota ) DESC")->getResultArray();
		
		if (isset($_POST['cari'])) {
			$data['buku'] = $this->buku->like('id_buku_perpus ', $_POST['cari'])->findAll();
		} else {
			$data['buku'] = $this->buku->limit(10)->Tampilkan();
		}
		return view('/pub/pub', $data);
	}
	public function hilangcari()
	{
		$_POST['cari'] = "";
		return redirect()->to('/Home');
	}
}
