<div class="kembali-core">
    <div class="kembali-body">
        <div class="header-kiri">

            <form method="post" action="<?php $dat = "1";
                                        echo base_url('/dashboard/cek_kembali_paket/' . $dat) ?>">
                <input type="text" name="cari_anggota" placeholder="Ketik Id Pengembali Buku" />
                <a href="/dashboard/hilangcari/">X</a>
                <button type="submit">cari</button>
            </form>
        </div>
        <div class="kembali-judul">
            <div class="header-kanan">
                <h1>PENGEMBALIAN BUKU PAKET</h1>
            </div>
            <div class="header-kanan">
                <button><a href="/dashboard/printdatapeminjaman">Print Data</a></button>
                <button><a href="/dashboard/pengembalian">BUKU REGULER</a></button>
            </div>
            <ul class="judul">
                <li class="nama">Nama </li>
                <li class="tgl_pinjam"> Pinjam</li>
                <li class="tgl_kembali"> Kembali</li>
                <li class="nama_buku"> Buku</li>
                <li class="status">Status</li>
            </ul>
        </div>
        <div class="kembali-isi">
            <?php
            foreach ($pinjam as $key => $data) { ?>
                <ul class="isi">
                    <li class="nama"> <?php echo $data['nama'] ?> </li>
                    <li class="tgl_pinjam"> <?php echo $data['tgl_pinjam']; ?></li>
                    <li class="tgl_kembali"> <?php echo $data['tgl_kembali'] ?></li>
                    <li class="nama_buku"><?php echo $data['nama_buku'] ?></li>
                    <li class="status">
                        <div class="border">
                            <div class="kem"><?php echo $data['status'] ?> </div>
                            <a href="<?php echo base_url('/dashboard/detil_kembali/' . $data['id_pinjam']) ?>"><button>Lihat Detail</button></a>
                        </div>
                    </li>
                </ul>
            <?php  }
            ?>
        </div>
        <br />
        <div class="header-kiri">
            <form method="post" action="#">
                <input type="text" name="cari" placeholder=" <?php if (isset($_POST['cari'])) {
                                                                    echo  $_POST['cari'];
                                                                } else {
                                                                    echo "Cari Data";
                                                                } ?>" />
                <a href="/dashboard/hilangcari/">X</a>
                <button type="submit">cari</button>
            </form>
        </div>
        <div class="kembali-isi">

            <?php
            foreach ($pinjol as $key => $data) { ?>
                <ul class="isi">
                    <li class="nama"> <?php echo $data['nama'] ?> </li>
                    <li class="tgl_pinjam"> <?php echo $data['tgl_pinjam'] ?></li>
                    <li class="tgl_kembali"> <?php echo $data['tgl_kembali'] ?></li>
                    <li class="nama_buku"><?php echo $data['nama_buku'] ?></li>
                    <li class="status">
                        <div class="border">
                            <div class="kem1"><?php echo $data['status'] ?> </div>
                            <a href="<?php echo base_url('/dashboard/detil_kembali/' . $data['id_pinjam']) ?>"><button>Lihat Detail</button></a>
                        </div>
                    </li>
                </ul>
            <?php  }
            ?>
        </div>
    </div>
</div>

</div>
</div>
</div>
</body>

</html>