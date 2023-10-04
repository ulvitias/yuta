<div class="kembali-core">
    <div class="kembali-body">
        <div style="width: 100%; text-align: center;">
            <img src="/asset/img/perpus/dua.jpg" style=" width: 100%; background-size: cover;">
        </div>
        <div class="header-kiri">
        </div>
        <div class="kembali-judul">
            <ul class="judul">
                <li class="nama">No. </li>
                <li class="tgl_pinjam">Kode</li>
                <li class="tgl_kembali">Nama</li>
                <li class="nama_buku">Kelas</li>
                <li class="status">Jumlah</li>
            </ul>
        </div>
        <br />
        <div class="kembali-isi" style="overflow-x: auto;">
            <?php
            foreach ($hitung as $key => $data) { ?>
                <ul class="isi">
                    <li class="nama"><?php echo $key + 1 . "."; ?></li>
                    <li class="tgl_pinjam"> <?php echo $data['id_anggota'] ?></li>
                    <li class="tgl_kembali"> <?php echo $data['nama'] ?></li>
                    <li class="nama_buku"><?php echo $data['kelas']; ?></li>
                    <li class="status"><?php echo $data['count( log_peminjaman.id_anggota )'] ?></li>
                </ul>
            <?php  }
            ?>
        </div>
        <div class="kembali-judul" style="margin: auto;">
            <div style="width: 50%; height: 100px; float:left; text-align: center; display:block; line-height: 100px;">
                <div style="width: 40%; height: 100%; border-radius: 5px; background: #36ceb5; margin: auto; font-size: 20px; font-family: 'lato',sans-serif;"><?php echo $anggo; ?></div>
            </div>
            <div style="width: 50%; height: 100px; float:left; text-align: center; display:block; line-height: 100px;">
                <div style="width: 40%; height: 100%; border-radius: 5px; background: #91ff00; margin: auto; font-size: 20px; font-family: 'lato',sans-serif;"><?php echo $buk; ?></div>
            </div>
        </div>
    </div>

</div>
</div>
</div>
</body>

</html>