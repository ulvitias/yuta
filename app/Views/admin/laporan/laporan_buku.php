<html>

<head>
    <title>Document</title>
    <style>
        .cor {
            width: 1000px;
        }

        .cor .kanan {
            width: 100%;
            height: 120px;
            float: left;

        }

        .cor .kanan table {
            width: 1000px;
        }

        .cor .kanan .logo-kiri {
            width: 100px;
            height: 120px;
            text-align: center;
            float: left;
        }

        .cor .kanan .logo-kiri img {
            height: 55%;
        }

        .cor .kanan .logo-tengah {
            width: 780px;
            height: 120px;
            float: left;
            text-align: center;
        }

        .cor .kanan .logo-tengah p {
            margin: 0;
            font-weight: bold;
        }

        .cor .kanan .logo-tengah .pem {
            font-size: 20px;
        }

        .cor .kanan .logo-tengah .din {
            font-size: 20px;
        }

        .cor .kanan .logo-tengah .smp {
            font-size: 20px;
        }

        .cor .kanan .logo-tengah .ter {
            font-size: 15px;
        }

        .cor .kanan .logo-tengah .jal {
            font-size: 12px;
            border-bottom: 2px solid black;
        }

        .cor .kanan .logo-kanan {
            width: 100px;
            height: 120px;
            text-align: center;
            float: left;
        }

        .cor .kanan .daftar {
            border-collapse: collapse;
        }

        .cor .kanan .logo-kanan img {
            height: 50%;
        }

        .cor .kanan table .tapal-lapor {
            height: 80px;
        }

        .cor .kanan table .tapal-lapor .lapor {
            text-align: center;
            font-size: 20px;
            font-weight: bold;
        }

        .daftar tr .juml {
            width: 10px;
        }

        .tb-kanan {
            text-align: right;
        }
    </style>
</head>
<?php $session = session();
$tut = '<img class="a" src="data:image/jpeg;base64,' . base64_encode($session->get('imgsatu')) . '"/>';
$logo = '<img class="a" src="data:image/jpeg;base64,' . base64_encode($session->get('imgdua')) . '"/>';
?>

<body>
    <div class="cor">
        <div class="kanan">
            <table>
                <tr>
                    <td class="logo-kiri"><?php echo $tut ?></td>
                    <td class="logo-tengah">
                        <p class="pem"> PEMERINTAH KABUPATEN OGAN KOMERING ULU SELATAN</p>
                        <p class="din"> DINAS PENDIDIKAN</p>
                        <p class="smp"> SMP NEGERI 01 BANDING AGUNG</p>
                        <p class="ter"> TERAKREDITASI : B</p>
                        <p class="jal"> jl. Rantau Nipis No.48 Desa Suka Negeri,Kec. Banding Agung OKUS 32175</p>
                    </td>
                    <td class="logo-kanan"><?php echo $logo ?></td>
                </tr>
                <tr class="tapal-lapor">
                    <td class="lapor" colspan="3">
                        LAPORAN DATA BUKU PERPUSTAKAAN<br />
                        Dibuat Pada:<?php echo date('d-m-Y'); ?>
                    </td>
                </tr>
            </table>
            <br />
            <table class="daftar" border="1">
                <tr>
                    <th width="50px">Kode</th>
                    <th width="200px">Judul Lengkap Buku </th>
                    <th width="100px">Pengarang</th>
                    <th width="120px">penerbit</th>
                    <th width="50px">kategori</th>
                    <th width="50px">mapel</th>
                    <th width="40px">T.sk</th>
                    <th width="20px">Stok</th>
                    <th class="juml">Jumlah</th>
                </tr>
                <?php foreach ($buku as $key => $data) { ?>
                    <tr>
                        <td><?php echo $data['id_buku_perpus'] ?></td>
                        <td><?php echo $data['judul_buku_perpus'] ?></td>
                        <td><?php echo $data['pengarang'] ?></td>
                        <td><?php echo $data['penerbit'] ?></td>
                        <td><?php echo $data['kategori'] ?></td>
                        <td><?php echo $data['mapel'] ?></td>
                        <td><?php echo $data['tahun_sk'] ?></td>
                        <td width="20px"><?php echo $data['stok'] ?></td>
                        <td class="juml"><?php echo $data['jumlah'] ?></td>
                    </tr>
                <?php } ?>
            </table>
            <br />
            <br />
            <br />
            <br />
            <table>
                <tr>
                    <td></td>
                    <td></td>
                    <td class="tb-kanan">
                        Banding Agung <?php echo date('d-m-Y') ?> <br />
                        Kepala Perpustakaan
                        <br />
                        <br />
                        <br />
                        <br />
                        Defi Suzanah, S.Pd<br />
                        NIP.19751229200712017
                    </td>
                </tr>
            </table>
        </div>
    </div>
</body>

</html>