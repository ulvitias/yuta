<?php $session = session();
if ($session->get('id_anggota')) {
?>
    <style>
        .nomer1 {
            display: none;

        }

        .tombol-reset {
            display: block;
        }

        .nomer2 {
            display: block;
        }

        .nomer-3 {
            display: none;
        }
    </style>
<?php } else { ?>
    <style>
        .nomer1 {
            display: block;
        }

        .tombol-reset {
            display: none;
        }

        .nomer2 {
            display: none;
        }

        .nomer-3 {
            display: block;
        }
    </style><?php
        } ?>
<?php if (session()->getFlashdata('msg')) {
    echo '<script type="text/javascript"> alert("' . session()->getFlashdata('msg') . '");</script>';
} ?>
<div class="peminjaman-form">
    <div class="peminjaman-form-core">
        <form method="POST" action="Cek_data_siswa" class="nomer1">
            <div class="input-data">
                <label>Kode Anggota</label>
                <input type="text" placeholder="Masukan Id Anggota" name="id_anggota" id="id_anggota" />
            </div>
            <div class="tambah-submit">
                <input type="submit" value="SELANJUTNYA" />
            </div>
        </form>

        <div class="tombol-reset">
            <a href="/dashboard/batal_pinjam">
                < KEMBALI</a>
        </div>

        <form class="nomer2" action="nota_peminjaman" method="post">
            <div class="hidden-anggota">
                <div class="label1">
                    <p>Kode Anggota </p>
                </div>
                <div class="label2">
                    <p> <?php echo $session->get('id_anggota') ?></p>
                </div>
            </div>
            <div class="hidden-anggota">
                <div class="label1">
                    <p>Nama Anggota </p>
                </div>
                <div class="label2">
                    <p> <?php echo $session->get('nama') ?></p>
                </div>
            </div>
            <div class="buku-daftar" class="nomer2">
                <div class="input-data">
                    <label>Kode Buku</label>
                    <input type="text" placeholder="Masukan Kode Buku" name="id_buku" id="id_buku" />
                </div>
            </div>
            <div class="buku-daftar" class="nomer2">
                <div class="input-data">
                    <label>Kondisi Buku</label>
                    <select class="input" id="kondisi" name="kondisi">
                        <option value="Baik">Baik</option>
                        <option value="Buruk">Buruk</option>
                    </select>
                </div>
            </div>
            <div class="tambah-submit">
                <input type="submit" value="SELANJUTNYA" />
            </div>

        </form>
    </div>

</div>
<div class="peminjaman-form nomer-3">
    <div class="h1">PEMINJAMAN BUKU PAKET</div>
    <div class="peminjaman-form-core">
        <form method="POST" action="cek_peminjaman_paket">
            <div class="input-data">
                <label>Kode Anggota</label>
                <input type="text" placeholder="Masukan Id Anggota" name="id_anggota_paket" id="id_anggota" />
            </div>
            <div class="buku-daftar">
                <div class="input-data">
                    <label>KELAS</label>
                    <select class="input" id="kondisi" name="kelas_buku">
                        <option value="VII">VII</option>
                        <option value="VIII">VIII</option>
                        <option value="IX">IX</option>
                    </select>
                </div>
            </div>
            <div class="tambah-submit">
                <input type="submit" value="SELANJUTNYA" />
            </div>
        </form>
    </div>
</div>
</div>
</div>
</body>

</html>