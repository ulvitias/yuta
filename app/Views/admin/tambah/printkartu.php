<html>

<head>
    <style>
        .cor {
            width: 1020px;
            height: 420px;
            border: 2px solid black;
        }

        .cor .kiri {
            width: 450px;
            height: 410px;
            float: left;
            border: 5px solid black;
            margin-right: 50px;
        }

        .cor .kiri table tr .nm {
            width: 30px;
            text-align: center;
            vertical-align: top;
        }

        .cor .kiri .tb2 {
            margin-top: 45px;
            width: 450px;
        }

        .cor .kanan {
            width: 450px;
            height: 410px;
            border: 5px solid black;
            float: left;
            margin-left: 50px;
        }

        .cor .kanan .logo-kiri {
            width: 50px;
            height: 80px;
            float: left;
        }

        .cor .kanan .logo-kiri img {
            height: 55%;

        }

        .cor .kanan .logo-tengah {
            width: 332px;
            height: 80px;
            float: left;
            text-align: center;
        }

        .cor .kanan .logo-tengah p {
            margin: 0;
        }

        .cor .kanan .logo-tengah .pem {
            font-size: 12px;
        }

        .cor .kanan .logo-tengah .din {
            font-size: 10px;
        }

        .cor .kanan .logo-tengah .smp {
            font-size: 10px;
        }

        .cor .kanan .logo-tengah .ter {
            font-size: 9px;
        }

        .cor .kanan .logo-tengah .jal {
            font-size: 8px;
            border-bottom: 2px solid black;
        }

        .cor .kanan .logo-kanan {
            width: 50px;
            height: 80px;
            float: left;
        }

        .cor .kanan .logo-kanan img {
            height: 50%;
        }

        .cor .kanan .dango {
            float: left;
            width: 100%;

            text-align: center;
        }

        .cor .kanan .dango .dango-atas {
            width: 450px;
            height: 50px;
        }

        .cor .kanan .dango .dango-atas p {
            margin: 0;
            font-size: 15px;
            font-weight: bold;
        }

        .cor .kanan .dango .dango-tengah {
            width: 450px;
            height: 50px;
        }

        .cor .kanan .dango .dango-tengah img {
            height: 70%;
        }

        .leeeft {
            text-align: left;
            font-size: 20px;

        }

        .let {
            text-align: right;
            font-size: 20px;
        }
    </style>
    <title>Print Kartu Anggota</title>
</head>

<body>
    <div class="cor">
        <div class="kiri">
            <table>
                <tr>
                    <th colspan="3">TATA TERTIB</th>
                </tr>
                <tr>
                    <td class="nm">1.</td>
                    <td colspan="2">Peminjam merupakan Anggota Perpustakaan yang dibuktikan dengan kartu anggota</td>
                </tr>
                <tr>
                    <td class="nm">2.</td>
                    <td colspan="2">Buku Yang Dapat Dipinjam Paling Banyak 2 Buah</td>
                </tr>
                <tr>
                    <td class="nm">3.</td>
                    <td colspan="2">Pengembalian Maksimal 3(tiga) hari dari tanggal peminjaman</td>
                </tr>
                <tr>
                    <td class="nm">4.</td>
                    <td colspan="2">Keterlambatan Dikenai denda sesuai tata tertib perpustakaan</td>
                </tr>
                <tr>
                    <td class="nm">5.</td>
                    <td colspan="2">Wajib Menjaga keadaan Buku Yang dipinjam</td>
                </tr>
                <tr>
                    <td class="nm">6.</td>
                    <td colspan="2">Apabila buku yang dipinjam hilang atau rusak, peminjam wajib mengganti</td>
                </tr>
                </tr>
            </table>
            <?php
            $tut = '<img class="a" src="data:image/jpeg;base64,' . base64_encode($data['imgsatu']) . '"/>';
            $logo = '<img class="a" src="data:image/jpeg;base64,' . base64_encode($data['imgdua']) . '"/>';
            ?>
            <table class="tb2">
                <tr>
                    <td class="tb-kiri">
                        Mengetahui,<br />
                        Kepala Sekolah
                        <br />
                        <br />
                        <br />
                        <br />
                        Rahmad Mulyadi, S.Pd <br />
                        NIP.196908152005011009
                    </td>
                    <td class="tb-tengah"></td>
                    <td class="tb-kanan">
                        Banding Agung_______2021<br />
                        Kepala Perpustakaan
                        <br />
                        <br />
                        <br />
                        <br />
                        Defi Suyanah, S.Pd<br />
                        NIP.197512292007012017
                    </td>
            </table>
        </div>
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
                    <td class="logo-kanan"><?php echo $logo; ?></td>
                </tr>
                <tr class="dango">
                    <td class="dango-atas" colspan="3">
                        <p>KARTU<br /> PEMINJAM PERPUSTAKAAN</p>
                    </td>
                </tr>
                <tr class="dango">
                    <td class="dango-tengah" colspan="3">
                        <?php echo $logo; ?>
                    </td>
                </tr>
            </table>

            <br />
            <br />
            <table>
                <tr class="dango">
                    <td width="150px" class="let">
                        Kode
                    </td>
                    <td width="50px">&nbsp;</td>
                    <td width="200px" colspan="2" class="leeeft">
                        : <?php echo $data['id_anggota']; ?>
                    </td>
                </tr>

                <tr class="dango">
                    <td width="150px" class="let">
                        Nama
                    </td>
                    <td width="50px">&nbsp;</td>
                    <td width="200px" colspan="2" class="leeeft">
                        : <?php echo $data['nama']; ?>
                    </td>
                </tr>

                <tr class="dango">
                    <td width="150px" class="let">
                        Tahun
                    </td>
                    <td width="50px">&nbsp;</td>
                    <td width="200px" colspan="2" class="leeeft">
                        : <?php echo $data['tahun_ajaran']; ?>
                    </td>
                </tr>

                <tr class="dango">
                    <td width="150px" class="let">
                        Kelas
                    </td>
                    <td width="50px">&nbsp;</td>
                    <td width="200px" colspan="2" class="leeeft">
                        : <?php echo $data['kelas']; ?>
                    </td>
                </tr>
                <tr class="dango">
                    <td width="150px" class="let">
                        Jabatan
                    </td>
                    <td width="50px">&nbsp;</td>
                    <td width="200px" colspan="2" class="leeeft">
                        : <?php echo $data['jabatan']; ?>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</body>

</html>