<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\AnggotaModel;
use App\Models\DashModel;
use App\Models\Imager;
use App\Models\ProsesModel;
use App\Models\NotaModel;
use App\Models\UserModel;
use CodeIgniter\HTTP\Files;

class dashboard extends Controller
{
    public function __construct()
    {
        $this->buku = new DashModel();
        $this->anggota = new AnggotaModel();
        $this->img = new Imager();
        $this->pinjam = new ProsesModel();
        $this->nota = new NotaModel();
        $this->user = new UserModel();
    }
    public function index()
    {
        $data['hitung'] = $this->anggota->query("SELECT anggota.*, count( log_peminjaman.id_anggota ) 
		FROM log_peminjaman LEFT JOIN anggota ON anggota.id_anggota=log_peminjaman.id_anggota 
		GROUP BY log_peminjaman.id_anggota ORDER BY count( log_peminjaman.id_anggota ) DESC")->getResultArray();
        
        $data['anggo'] = $this->anggota->countAllResults();
        $data['buk'] = $this->buku->countAllResults();

        echo view('/admin/base.php');
        echo view('/admin/hitung', $data);
    }
    public function Buku()
    {
        $model = new DashModel();
        $pager = \Config\Services::pager();
        if (isset($_POST['cari'])) {
            $data['buku'] = $this->buku->like('id_buku_perpus ', $_POST['cari'])->findAll();
        } else {

            $data = [
                'buku' => $model->paginate(25, 'bootstrap'),
                'pager' => $model->pager
            ];
        }
        echo view('/admin/base');
        echo view('/admin/buku', $data);
    }
    public function hilang_kencari()
    {
        $_POST['cari'] = "";
        return redirect()->to('/dashboard/buku/');
    }
    public function hilangcari()
    {
        $_POST['cari'] = "";
        return redirect()->to('/dashboard/pengembalian');
    }
    public function Tambah()
    {
        echo view('/admin/tambah/base');
        echo view('/admin/tambah/buku');
    }
    public function Tambah_data()
    {
        $session = session();
        $id_buku = $_POST['id_buku'];
        $judul = $_POST['judul'];
        $pengarang = $_POST['pengarang'];
        $penerbit = $_POST['penerbit'];
        $kategori = $_POST['kategori'];
        $th_msk = $_POST['th_msk'];
        $mapel = $_POST['mapel'];
        $stok = $_POST['stok'];
        $rak = $_POST['rak'];
        $kelas = $_POST['kelas_buku'];
        $data = array(
            'id_buku_perpus' => $id_buku,
            'judul_buku_perpus' => $judul,
            'penerbit' => $penerbit,
            'pengarang' => $pengarang,
            'kategori' => $kategori,
            'tahun_sk' => $th_msk,
            'mapel' => $mapel,
            'stok' => $stok,
            'rak' => $rak,
            'jumlah' => $stok,
            'kelas' => $kelas,
        );
        $cek_sama_data = $this->buku->where('id_buku_perpus', $id_buku)->first();
        if ($cek_sama_data) {
            $session->setFlashdata('msg', 'Data Sudah Ada');
            return redirect()->to('/dashboard/Tambah');
        } else {
            $this->buku->tambah($data);
            return redirect()->to('/dashboard/buku');
        }
    }
    public function edit_buku($id_buku_perpus)
    {
        $data_perpus['data'] = $this->buku->Tampilkan($id_buku_perpus);
        echo view('/admin/edit/base');
        echo view('/admin/edit/buku', $data_perpus);
    }
    public function update_buku($id)
    {
        $id_buku = $_POST['id_buku'];
        $judul = $_POST['judul'];
        $pengarang = $_POST['pengarang'];
        $penerbit = $_POST['penerbit'];
        $kategori = $_POST['kategori'];
        $th_msk = $_POST['th_msk'];
        $mapel = $_POST['mapel'];
        $stok = $_POST['stok'];
        $rak = $_POST['rak'];
        $jumlah = $_POST['jumlah'];
        $data = array(
            'id_buku_perpus' => $id_buku,
            'judul_buku_perpus' => $judul,
            'penerbit' => $penerbit,
            'pengarang' => $pengarang,
            'kategori' => $kategori,
            'tahun_sk' => $th_msk,
            'mapel' => $mapel,
            'stok' => $stok,
            'rak' => $rak,
            'jumlah' => $jumlah,
        );
        $ubah = $this->buku->perbaharui_buku($data, $id);
        if ($ubah) {
            return redirect()->to('/dashboard/buku');
        }
    }
    public function hapus_buku($id_anggota)
    {
        $hapus = $this->buku->hapus($id_anggota);
        if ($hapus) {
            return redirect()->to('/dashboard/buku');
        }
    }
    public function detailbuku()
    {
        echo view('/admin/edit/base');
        echo view('/admin/edit/lihat_buku');
    }
    public function lihat_buku($id_buku_perpus)
    {
        $session = session();
        $data = $this->buku->where('id_buku_perpus', $id_buku_perpus)->first();
        if ($data) {
            $ses_data = [
                'id_buku_perpus' => $data['id_buku_perpus'],
                'judul_buku_perpus' => $data['judul_buku_perpus'],
                'penerbit' => $data['penerbit'],
                'pengarang' => $data['pengarang'],
                'kategori' => $data['kategori'],
                'tahun_sk' => $data['tahun_sk'],
                'mapel' => $data['mapel'],
                'stok' => $data['stok'],
                'rak' => $data['rak'],
                'jumlah' => $data['jumlah'],
                'kelas' => $data['kelas'],
            ];
            $session->set($ses_data);
            return redirect()->to('/dashboard/detailbuku');
        }
    }
    public function printdatabuku()
    {
        $session = session();
        $imgsatu = $this->img->where('id', 4)->first();
        $imgdua = $this->img->where('id', 6)->first();
        $dat = [
            'imgsatu' => $imgsatu['file'],
            'imgdua' => $imgdua['file'],
        ];
        $session->set($dat);
        $data['buku'] = $this->buku->Tampilkan();
        $dompdf = new \Dompdf\Dompdf();
        $dompdf->loadHtml(view('/admin/laporan/laporan_buku', $data));
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream();
    }
    //PEMBATAS BUKU
    public function Anggota()
    {

        $model = new AnggotaModel();
        $pager = \Config\Services::pager();
        if (isset($_POST['cari_anggota'])) {
            $data['Anggota'] = $this->anggota->like('id_anggota', $_POST['cari_anggota'])->findAll();
        } else {
            $data = [
                'Anggota' => $model->paginate(25, 'bootstrap'),
                'pager' => $model->pager
            ];
        }
        echo view('/admin/base');
        echo view('/admin/anggota', $data);
    }
    public function hilangkencari()
    {
        $_POST['cari_anggota'] = "";
        return redirect()->to('/dashboard/anggota/');
    }
    public function hilangcar()
    {
        $_POST['cari'] = "";
        return redirect()->to('/dashboard/nota');
    }
    public function Tambah_anggota()
    {
        echo view('admin/tambah/base');
        echo view('admin/tambah/anggota');
    }
    public function Tambah_data_anggota()
    {
        $session = session();
        $id_anggota = $_POST['id_anggota'];
        $nama = $_POST['nama'];
        $tahun_ajaran = $_POST['tahun_ajaran'];
        $gender = $_POST['gender'];
        $jabatan = $_POST['jabatan'];
        $kelas = $_POST['kelas'];
        $data = array(
            'id_anggota' => $id_anggota,
            'nama' => $nama,
            'tahun_ajaran' => $tahun_ajaran,
            'gender' => $gender,
            'jabatan' => $jabatan,
            'kelas' => $kelas,
        );
        $session->set($data);
        return redirect()->to('/dashboard/konfirmasi_anggota');
    }
    public function konfirmasi_anggota()
    {
        echo view('/admin/tambah/base');
        echo view('/admin/tambah/konfirmasi_anggota');
    }
    public function tambahkan_anggota()
    {
        $session = session();
        $id_anggota = $session->get('id_anggota');
        $nama = $session->get('nama');
        $tahun_ajaran = $session->get('tahun_ajaran');
        $gender = $session->get('gender');
        $jabatan = $session->get('jabatan');
        $kelas = $session->get('kelas');
        $data = array(
            'id_anggota' => $id_anggota,
            'nama' => $nama,
            'tahun_ajaran' => $tahun_ajaran,
            'gender' => $gender,
            'jabatan' => $jabatan,
            'kelas' => $kelas,
        );
        $cek_sama_data = $this->anggota->where('id_anggota', $id_anggota)->first();
        if ($cek_sama_data) {
            $session->setFlashdata('msg', 'Data Sudah Ada');
            return redirect()->to('/dashboard/konfirmasi_anggota');
        } else {
            $this->anggota->tambah($data);
            return redirect()->to('/dashboard/anggota/');
        }
    }
    public function edit($id_anggota)
    {
        $da['data'] = $this->anggota->Tampilkan($id_anggota);
        echo view('/admin/edit/base');
        echo view('/admin/edit/anggota', $da);
    }
    public function update($id)
    {
        $id_anggota = $_POST['id_anggota'];
        $nama = $_POST['nama'];
        $tahun_ajaran = $_POST['tahun_ajaran'];
        $gender = $_POST['gender'];
        $jabatan = $_POST['jabatan'];
        $kelas = $_POST['kelas'];
        $data = array(
            'id_anggota' => $id_anggota,
            'nama' => $nama,
            'tahun_ajaran' => $tahun_ajaran,
            'gender' => $gender,
            'jabatan' => $jabatan,
            'kelas' => $kelas
        );
        $ubah = $this->anggota->perbaharui($data, $id);
        if ($ubah) {
            return redirect()->to('/dashboard/anggota');
        }
    }
    public function hapus($id_anggota)
    {
        $hapus = $this->anggota->hapus($id_anggota);

        if ($hapus) {
            return redirect()->to('/dashboard/anggota');
        }
    }
    public function detailanggota()
    {
        echo view('/admin/edit/base');
        echo view('/admin/edit/lihat_anggota');
    }
    public function lihat_anggota($id_anggota)
    {
        $session = session();
        $data = $this->anggota->where('id_anggota', $id_anggota)->first();
        if ($data) {
            $ses_data = [
                'id_anggota' => $data['id_anggota'],
                'nama' => $data['nama'],
                'tahun_ajaran' => $data['tahun_ajaran'],
                'gender' => $data['gender'],
                'jabatan' => $data['jabatan'],
                'kelas' => $data['kelas'],
            ];
            $session->set($ses_data);
            return redirect()->to('/dashboard/detailanggota');
        }
    }
    public function printkartu($id_anggota)
    {
        $imgsatu = $this->img->where('id', 4)->first();
        $imgdua = $this->img->where('id', 6)->first();
        $dat = $this->anggota->where('id_anggota', $id_anggota)->first();
        $data_anggota['data'] = [
            'imgsatu' => $imgsatu['file'],
            'imgdua' => $imgdua['file'],
            'id_anggota' => $dat['id_anggota'],
            'nama' => $dat['nama'],
            'tahun_ajaran' => $dat['tahun_ajaran'],
            'gender' => $dat['gender'],
            'jabatan' => $dat['jabatan'],
            'kelas' => $dat['kelas'],
        ];
        $dompdf = new \Dompdf\Dompdf();
        $dompdf->loadHtml(view('/admin/tambah/printkartu', $data_anggota));
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream();
    }
    public function printdataanggota()
    {
        $session = session();
        $imgsatu = $this->img->where('id', 4)->first();
        $imgdua = $this->img->where('id', 6)->first();
        $dat = [
            'imgsatu' => $imgsatu['file'],
            'imgdua' => $imgdua['file'],
        ];
        $session->set($dat);
        $data['anggota'] = $this->anggota->Tampilkan();
        $dompdf = new \Dompdf\Dompdf();
        $dompdf->loadHtml(view('/admin/laporan/laporan_anggota', $data));
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream();
    }
    //batas
    public function resetsesi()
    {
        session();
        unset($_SESSION['id_anggota']);
        unset($_SESSION['nama']);
        unset($_SESSION['tahun_ajaran']);
        unset($_SESSION['gender']);
        unset($_SESSION['jabatan']);
        unset($_SESSION['kelas']);
        return redirect()->to('/dashboard/anggota');
    }
    public function cari_anggota($id_anggota)
    {
        $this->anggota->where('id_anggota', $id_anggota)->first();
    }
    public function peminjaman()
    {
        echo view('/admin/base');
        echo view('/admin/proses/peminjaman');
    }
    public function konfirmasi()
    {
        echo view('/admin/tambah/base');
        echo view('/admin/proses/nota_peminjaman');
    }
    //PEMBATAS TAMBAH DATA
    public function batal_pinjam()
    {
        session();
        unset($_SESSION['id_anggota']);
        unset($_SESSION['nama']);
        return redirect()->to('/dashboard/peminjaman');
    }
    public function Cek_data_siswa()
    {
        $session = session();
        $id_anggota = $_POST['id_anggota'];
        $data = $this->anggota->where('id_anggota', $id_anggota)->first();
        if ($data) {
            $ses_data = [
                'id_anggota' => $data['id_anggota'],
                'nama' => $data['nama']
            ];
            $session->set($ses_data);
            return redirect()->to('/dashboard/Peminjaman');
        } else {
            $session->setFlashdata('msg', 'Data Tydak ada');
            return redirect()->to('/dashboard/Peminjaman');
        }
    }
    public function nota_peminjaman()
    {
        $session = session();
        $id_buku = $_POST['id_buku'];
        $data_peminjam = $this->buku->where('id_buku_perpus', $id_buku)->first();
        if ($data_peminjam) {
            $sesi_data = [
                'id_buku_pinjam' => $data_peminjam['id_buku_perpus'],
                'judul_buku_perpus' => $data_peminjam['judul_buku_perpus'],
                'kondisi' => $_POST['kondisi'],
            ];
            $session->set($sesi_data);
            return redirect()->to('/dashboard/konfirmasi');
        } else {
            $session->setFlashdata('msg', 'Data Tydak ada');
            return redirect()->to('/dashboard/Peminjaman');
        }
    }
    public function pinjamkan()
    {
        $session = session();
        $id_anggota =  $session->get('id_anggota');
        $nama = $session->get('nama');
        $id_buku_pinjam =  $session->get('id_buku_pinjam');
        $judul_buku_perpus =  $session->get('judul_buku_perpus');
        $tgl_pinjam =  $session->get('tgl_pinjam');
        $tgl_kembali = $session->get('tgl_kembali');
        $kondisi = $session->get('kondisi');
        $status = 'dipinjam';
        $data = array(
            'id_anggota' => $id_anggota,
            'nama' => $nama,
            'id_buku' => $id_buku_pinjam,
            'nama_buku' => $judul_buku_perpus,
            'kondisi' => $kondisi,
            'kategori' => "reguler",
            'tgl_pinjam' => $tgl_pinjam,
            'tgl_kembali' => $tgl_kembali,
            'status' => $status,
            'k_st' => "0",
        );
        $tampil = $this->buku->where('id_buku_perpus', $id_buku_pinjam)->first();
        $tampilkan = array(
            'id_buku_perpus' => $tampil['id_buku_perpus'],
            'stok' => $tampil['stok'],
        );
        $stok = $tampilkan['stok'] - '1';
        $data_update = array(
            'id_buku_perpus' => $id_buku_pinjam,
            'stok' => $stok,
        );
        $this->buku->perbaharui_buku($data_update, $id_buku_pinjam);
        $this->pinjam->tambah($data);
        return redirect()->to('/dashboard/peminjaman');
    }
    public function pinjamkan_paket()
    {
        $session = session();
        $id_anggota =  $session->get('id_anggota_paket');
        $nama = $session->get('nama');
        foreach ($_POST['judul'] as $ko => $dto) {
            foreach ($_POST['id_buku_pinjam'] as $ko => $dta) {
                $data = array(
                    'id_anggota' => $id_anggota,
                    'nama' => $nama,
                    'id_buku' => $dta,
                    'nama_buku' => $dto,
                    'kondisi' => "baik",
                    'kategori' => "paket",
                    'tgl_pinjam' => $_POST['pinjam'],
                    'tgl_kembali' => $_POST['kembali'],
                    'status' => "dipinjam",
                    'k_st' => "0",
                );
            }
            $this->pinjam->tambah($data);
        }
        return redirect()->to('/dashboard/peminjaman');
    }
    public function cek_peminjaman_paket()
    {
        $session = session();
        $id = $_POST['id_anggota_paket'];
        if ($cek = $this->anggota->where('id_anggota', $id)->first()) {
            $sesi = [
                'id_anggota_paket' => $cek['id_anggota'],
                'nama' => $cek['nama'],
                'kelas' => $cek['kelas'],
            ];
            $session->set($sesi);
            $data['buku'] = $this->buku->cek_data_paket_kelas($_POST['kelas']);
            echo view('/admin/base');
            echo view('/admin/proses/peminjaman-paket', $data);
        } else {
            $session->setFlashdata('msg', 'Data Tydak ada');
            return redirect()->to('/dashboard/Peminjaman');
        }
    }
    public function pengembalian()
    {
        $id = "dikembalikan";
        $idp = "dipinjam";
        $paket = "reguler";
        if (isset($_POST['cari'])) {
            $cari = $_POST['cari'];
            $data['pinjol'] = $this->pinjam->jal($id, $cari, $paket);
            $data['pinjam'] = $this->pinjam->querytwo($idp, $paket);
        } else {
            $data['pinjam'] = $this->pinjam->queryone($idp, $paket);
            $data['pinjol'] = $this->pinjam->querytwo($id, $paket);
        }
        echo view('/admin/base');
        echo view('/admin/proses/kembali', $data);
    }
    public function kembali_paket()
    {
        $id = "dikembalikan";
        $idp = "dipinjam";
        $paket = "paket";
        if (isset($_POST['cari'])) {
            $cari = $_POST['cari'];
            $data['pinjam'] = $this->pinjam->jal_paket($idp, $cari, $paket);
            $data['pinjol'] = $this->pinjam->querytwo_paket($id, $paket);
        } else {

            $data['pinjam'] = $this->pinjam->queryone_paket($idp, $paket);
            $data['pinjol'] = $this->pinjam->querytwo_paket($id, $paket);
        }
        echo view('/admin/base');
        echo view('/admin/proses/kembali-paket', $data);
    }
    public function cek_kembali()
    {
        $session = session();
        if (isset($_POST['cari_anggota'])) {
            $_SESSION['cari_anggota'] = $_POST['cari_anggota'];
        }
        $idp = "dipinjam";
        $paket = "reguler";
        $cari = $_SESSION['cari_anggota'];
        $data['pinjam'] = $this->pinjam->jal($idp, $cari, $paket);
        if ($data['pinjam']) {
            echo view('/admin/base');
            echo view('/admin/proses/kembali-form', $data);
        } else {
            return redirect()->to('/dashboard/k_st/' . $_SESSION['cari_anggota']);
        }
    }
    public function dikembalikan()
    {
        $id_buku_pinjam = $_POST['id_buku'];
        $tampil = $this->buku->where('id_buku_perpus', $id_buku_pinjam)->first();
        $tampilkan = array(
            'id_buku_perpus' => $tampil['id_buku_perpus'],
            'stok' => $tampil['stok'],
        );
        // $tampil_satu = $this->pinjam->where('id_pinjam', $_POST['kode'])->first();
        // $tampilkan_satu = array(
        //     'id_buku_perpus' => $tampil_satu['id_pinjam'],
        //     'kondisi' => $tampil_satu['kondisi'],
        // );
        if ($_POST['hilang'] > 0) {
            $kon = "hilang";
        } else {
            $kon = "baik";
        }
        if ($_POST['kondisi'] = "hilang") {
            $stok = $tampilkan['stok'];
        } else {
            $stok = $tampilkan['stok'] + '1';
        }
        $data_update = array(
            'id_buku_perpus' => $id_buku_pinjam,
            'stok' => $stok,
        );
        $this->buku->perbaharui_buku($data_update, $id_buku_pinjam);
        $session = session();
        $_SESSION['kode'] = $_POST['kode'];
        $data = array([
            'id_pinjam' => $_POST['kode'],
            'status' => "dikembalikan",
            'duid' => $_POST['hilang'],
            'kondisi' => $kon,
            'k_st' => '1',
        ]);
        $this->pinjam->update_kembali($data);
        return redirect()->to('/dashboard/cek_kembali/' . $_SESSION['kode']);
    }
    public function cek_kembali_paket()
    {
        $session = session();
        if (isset($_POST['cari_anggota'])) {
            $_SESSION['cari_anggota'] = $_POST['cari_anggota'];
        }
        $id = "dipinjam";
        $pake = "paket";
        $cari = $_SESSION['cari_anggota'];
        $data['pinjam'] = $this->pinjam->jal($id, $cari, $pake);
        if ($data['pinjam']) {
            echo view('/admin/base');
            echo view('/admin/proses/kembali-form-paket', $data);
        } else {
            return redirect()->to('/dashboard/k_st/' . $_SESSION['cari_anggota']);
        }
    }

    public function dikembalikan_paket()
    {
        $id_buku_pinjam = $_POST['id_buku'];
        $tampil = $this->buku->where('id_buku_perpus', $id_buku_pinjam)->first();
        $tampilkan = array(
            'id_buku_perpus' => $tampil['id_buku_perpus'],
            'stok' => $tampil['stok'],
        );
        // $tampil_satu = $this->pinjam->where('id_pinjam', $_POST['kode'])->first();
        // $tampilkan_satu = array(
        //     'id_buku_perpus' => $tampil_satu['id_pinjam'],
        //     'kondisi' => $tampil_satu['kondisi'],
        // );
        if ($_POST['hilang'] > 0) {
            $kon = "hilang";
        } else {
            $kon = "baik";
        }
        if ($_POST['kondisi'] = "hilang") {
            $stok = $tampilkan['stok'];
        } else {
            $stok = $tampilkan['stok'] + '1';
        }
        $data_update = array(
            'id_buku_perpus' => $id_buku_pinjam,
            'stok' => $stok,
        );
        $this->buku->perbaharui_buku($data_update, $id_buku_pinjam);
        $session = session();
        $_SESSION['kode'] = $_POST['kode'];
        $data = array([
            'id_pinjam' => $_POST['kode'],
            'status' => "dikembalikan",
            'duid' => $_POST['hilang'],
            'kondisi' => $kon,
            'k_st' => '1',
        ]);
        $this->pinjam->update_kembali($data);
        return redirect()->to('/dashboard/cek_kembali_paket/' . $_SESSION['kode']);
    }

    public function k_st($id_anggota)
    {
        $ks = '1';
        $data['lihat'] = $this->pinjam->ceklagi($ks, $id_anggota);
        echo view('/admin/base');
        echo view('/admin/proses/kembali-form-dua', $data);
    }
    public function konfirmasi_pengembalian($id_anggota)
    {
        foreach ($_POST['kondisi'] as $k => $ka) {
            foreach ($_POST['kode'] as $key => $ko) {
                $data = array([
                    'id_pinjam' => $ko,
                    'Kondisi' => $ka,
                    'k_st' => '2',
                ]);
                $this->pinjam->update_kembali($data);
            }
        }
        $this->pinjam->update_kembali($data);
        $dat = array(
            'id_anggota' => $id_anggota,
            'nama' => $_POST['nama'],
            'id_pinjam' => implode(",", $_POST['kode']),
            'tgl_pinjam' => $_POST['pinjam'],
            'tgl_kembali' => $_POST['kembali'],
            'tgl_terlambat' => $_POST['hariini'],
            'hari' => $_POST['hari'],
            'status' => "lunas",
            'jumlah' => $_POST['rp'],
        );
        $tambah =  $this->nota->tambah($dat);
        if ($tambah) {
            return redirect()->to('/dashboard/pengembalian');
        }
    }

    public function detil_kembali($id_pinjam)
    {
        $session = session();
        $data = $this->pinjam->where('id_pinjam', $id_pinjam)->first();
        if ($data) {
            $ses_data = [
                'id_anggota' => $data['id_anggota'],
                'nama' => $data['nama'],
                'tgl_pinjam' => $data['tgl_pinjam'],
                'tgl_kembali' => $data['tgl_kembali'],
                'id_buku' => $data['id_buku'],
                'nama_buku' => $data['nama_buku'],
                'status' => $data['status'],
            ];
            $session->set($ses_data);
            return redirect()->to('/dashboard/detail_peminjaman');
        }
    }
    public function detail_peminjaman()
    {
        echo view('/admin/proses/base');
        echo view('/admin/proses/detil-kembali');
    }
    public function printdatapeminjaman()
    {
        $session = session();
        $imgsatu = $this->img->where('id', 4)->first();
        $imgdua = $this->img->where('id', 6)->first();
        $dat = [
            'imgsatu' => $imgsatu['file'],
            'imgdua' => $imgdua['file'],
        ];
        $session->set($dat);
        $data['peminjaman'] = $this->pinjam->Tampilkan();
        $dompdf = new \Dompdf\Dompdf();
        $dompdf->loadHtml(view('/admin/laporan/laporan_peminjaman', $data));
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream();
    }
    //BATAS
    public function nota()
    {
        if (isset($_POST['cari'])) {
            $cari = $_POST['cari'];
            $data['nota'] = $this->nota->tampil_cari($cari);
        } else {
            $data['nota'] = $this->nota->Tampilkan();
        }
        echo view('/admin/base');
        echo view('/admin/nota/laporan_nota', $data);
    }
    public function detilnota($id_nota)
    {
        $session = session();
        $data = $this->nota->where('id_nota', $id_nota)->first();
        if ($data) {
            $ses_data = [
                'id_nota' => $data['id_nota'],
                'id_anggota' => $data['id_anggota'],
                'nama' => $data['nama'],
                'id_pinjam' => $data['id_pinjam'],
                'tgl_pinjam' => $data['tgl_pinjam'],
                'tgl_kembali' => $data['tgl_kembali'],
                'hari' => $data['hari'],
                'tgl_terlambat' => $data['tgl_terlambat'],
                'status' => $data['status'],
                'jumlah' => $data['jumlah'],
            ];
            $session->set($ses_data);
            return redirect()->to('/dashboard/detil_nota');
        }
    }
    public function detil_nota()
    {
        echo view('/admin/nota/base');
        echo view('/admin/nota/detil_nota');
    }
    public function printdatanota()
    {
        $session = session();
        $imgsatu = $this->img->where('id', 4)->first();
        $imgdua = $this->img->where('id', 6)->first();
        $dat = [
            'imgsatu' => $imgsatu['file'],
            'imgdua' => $imgdua['file'],
        ];
        $session->set($dat);
        $data['nota'] = $this->nota->Tampilkan();
        $dompdf = new \Dompdf\Dompdf();
        $dompdf->loadHtml(view('/admin/laporan/laporan_nota', $data));
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream();
    }
    public function printsatutahun()
    {
        $session = session();
        $imgsatu = $this->img->where('id', 4)->first();
        $imgdua = $this->img->where('id', 6)->first();
        $dat = [
            'imgsatu' => $imgsatu['file'],
            'imgdua' => $imgdua['file'],
        ];
        $session->set($dat);
        $data['peminjaman'] = $this->pinjam->satutahun();
        $dompdf = new \Dompdf\Dompdf();
        $dompdf->loadHtml(view('/admin/laporan/laporan_peminjaman', $data));
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream();
    }
    public function printtigabulan()
    {
        $session = session();
        $imgsatu = $this->img->where('id', 4)->first();
        $imgdua = $this->img->where('id', 6)->first();
        $dat = [
            'imgsatu' => $imgsatu['file'],
            'imgdua' => $imgdua['file'],
        ];
        $session->set($dat);
        $data['peminjaman'] = $this->pinjam->tigabulan();
        $dompdf = new \Dompdf\Dompdf();
        $dompdf->loadHtml(view('/admin/laporan/laporan_peminjaman', $data));
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream();
    }
    //BATAS
    public function Laporan()
    {
        echo view('/admin/base');
        echo view('/admin/laporan/base_laporan');
    }

    public function impor()
    {
        echo view('/admin/tambah/xlxs');
    }
    // File upload and Insert records
    public function importFile()
    {

        // Validation
        $input = $this->validate([
            'file' => 'uploaded[file]|max_size[file,1024]|ext_in[file,csv],'
        ]);

        if (!$input) { // Not valid
            $data['validation'] = $this->validator;

            return view('users/index', $data);
        } else { // Valid

            if ($file = $this->request->getFile('file')) {
                if ($file->isValid() && !$file->hasMoved()) {

                    // Get random file name
                    $newName = $file->getRandomName();

                    // Store file in public/csvfile/ folder
                    $file->move('../public/uploads', $newName);

                    // Reading file
                    $file = fopen("../public/uploads/" . $newName, "r");
                    $i = 0;
                    $numberOfFields = 6; // Total number of fields

                    $importData_arr = array();

                    // Initialize $importData_arr Array
                    while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
                        $num = count($filedata);

                        // Skip first row & check number of fields
                        if ($i > 0 && $num == $numberOfFields) {
                            // Key names are the insert table field names - name, email, city, and status
                            $importData_arr[$i]['id_anggota'] = $filedata[0];
                            $importData_arr[$i]['nama'] = $filedata[1];
                            $importData_arr[$i]['tahun_ajaran'] = $filedata[2];
                            $importData_arr[$i]['gender'] = $filedata[3];
                            $importData_arr[$i]['jabatan'] = $filedata[4];
                            $importData_arr[$i]['kelas'] = $filedata[5];
                        }
                        $i++;
                    }
                    fclose($file);

                    // Insert data
                    $count = 0;
                    foreach ($importData_arr as $userdata) {
                        $users = new AnggotaModel();
                        ## Insert Record
                        if ($users->ignore(true)->insert($userdata)) {
                            $count++;
                        }
                    }

                    // Set Session
                    session()->setFlashdata('message', $count . ' Record inserted successfully!');
                    session()->setFlashdata('alert-class', 'alert-success');
                } else {
                    // Set Session
                    session()->setFlashdata('message', 'File not imported.');
                    session()->setFlashdata('alert-class', 'alert-danger');
                }
            } else {
                // Set Session
                session()->setFlashdata('message', 'File not imported.');
                session()->setFlashdata('alert-class', 'alert-danger');
            }
        }

        return redirect()->to('/dashboard/impor');
    }
    public function exportData()
    {
        // file name 
        $filename = 'users_' . date('Ymd') . '.csv';
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$filename");
        header("Content-Type: application/csv; ");

        // get data 
        $users = new AnggotaModel();
        $usersData = $users->select('*')->findAll();

        // file creation 
        $file = fopen('php://output', 'w');

        $header = array("NIS", "NAMA", "TAHUN AJARAN", "GENDER", "JABATAN", "KELAS");
        fputcsv($file, $header);
        foreach ($usersData as $key => $line) {
            fputcsv($file, $line);
        }
        fclose($file);
        exit;
    }
    public function basmi()
    {
        $this->anggota->truncate();
        return redirect()->to('/dashboard/anggota');
    }

    public function impor_buku()
    {
        echo view('/admin/tambah/xlxs-buku');
    }
    // File upload and Insert records
    public function importFile_buku()
    {

        // Validation
        $input = $this->validate([
            'file' => 'uploaded[file]|max_size[file,1024]|ext_in[file,csv],'
        ]);

        if (!$input) { // Not valid
            $data['validation'] = $this->validator;
            return view('users/index', $data);
        } else { // Valid

            if ($file = $this->request->getFile('file')) {
                if ($file->isValid() && !$file->hasMoved()) {

                    // Get random file name
                    $newName = $file->getRandomName();

                    // Store file in public/csvfile/ folder
                    $file->move('../public/uploads', $newName);

                    // Reading file
                    $file = fopen("../public/uploads/" . $newName, "r");
                    $i = 0;
                    $numberOfFields = 11; // Total number of fields

                    $importData_arr = array();

                    // Initialize $importData_arr Array
                    while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
                        $num = count($filedata);

                        // Skip first row & check number of fields
                        if ($i > 0 && $num == $numberOfFields) {
                            // Key names are the insert table field names - name, email, city, and status
                            $importData_arr[$i]['id_buku_perpus'] = $filedata[0];
                            $importData_arr[$i]['judul_buku_perpus'] = $filedata[1];
                            $importData_arr[$i]['pengarang'] = $filedata[2];
                            $importData_arr[$i]['penerbit'] = $filedata[3];
                            $importData_arr[$i]['kategori'] = $filedata[4];
                            $importData_arr[$i]['tahun_sk'] = $filedata[5];
                            $importData_arr[$i]['mapel'] = $filedata[6];
                            $importData_arr[$i]['stok'] = $filedata[7];
                            $importData_arr[$i]['rak'] = $filedata[8];
                            $importData_arr[$i]['jumlah'] = $filedata[9];
                            $importData_arr[$i]['kelas'] = $filedata[10];
                        }
                        $i++;
                    }
                    fclose($file);

                    // Insert data
                    $count = 0;
                    foreach ($importData_arr as $userdata) {
                        $users = new DashModel();
                        ## Insert Record
                        if ($users->ignore(true)->insert($userdata)) {
                            $count++;
                        }
                    }
                    // Set Session
                    session()->setFlashdata('message', $count . ' Record inserted successfully!');
                    session()->setFlashdata('alert-class', 'alert-success');
                } else {
                    // Set Session
                    session()->setFlashdata('message', 'File not imported.');
                    session()->setFlashdata('alert-class', 'alert-danger');
                }
            } else {
                // Set Session
                session()->setFlashdata('message', 'File not imported.');
                session()->setFlashdata('alert-class', 'alert-danger');
            }
        }

        return redirect()->to('/dashboard/impor_buku');
    }
    public function exportData_buku()
    {
        // file name 
        $filename = 'users_' . date('Ymd') . '.csv';
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$filename");
        header("Content-Type: application/csv; ");

        // get data 
        $users = new DashModel();
        $usersData = $users->select('*')->findAll();

        // file creation 
        $file = fopen('php://output', 'w');

        $header = array("KODE", "JUDUL", "PENGARANG", "PENERBIT", "KATEGORI", "TAHUN SK", "MAPEL", "KELAS", "STOK", "RAK", "JUMLAH",);
        fputcsv($file, $header);
        foreach ($usersData as $key => $line) {
            fputcsv($file, $line);
        }
        fclose($file);
        exit;
    }
    public function basmi_buku()
    {
        $this->buku->truncate();
        return redirect()->to('/dashboard/buku');
    }
    //pembatas
    public function admin_area()
    {
        echo view('/admin/edit/base');
        echo view('/admin/edit/admin-area');
    }
    public function ganti_pass_admon()
    {
        $admon = session()->get('npm');
        $recent = $_POST['pass_recent'];
        $new = $_POST['new_pass'];
        if ($this->user->where('username', $admon)->where('password', $recent)->first()) {
            $ne = array(
                'username' => $admon,
                'password' => $new,
            );
            $this->user->upd($ne, $admon);

            session()->setFlashdata('msg', 'Password Diubah');
            return redirect()->to('/dashboard/admin_area');
        } else {
            session()->setFlashdata('msg', 'Password Yang Lama Salah');
            return redirect()->to('/dashboard/admin_area');
        }
    }
    public function log_out()
    {
        session();
        session_destroy();
        return redirect()->to('/login');
    }
    // TEST AREA!
    public function test($id_anggota)
    {
    }
}
