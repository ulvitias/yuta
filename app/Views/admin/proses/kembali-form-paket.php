<div class="kembali-core">
    <div class="kembali-body">
        <div class="kembali-judul">
            <ul class="judul">
                <li class="nama">kode</li>
                <li class="tgl_pinjam">Judul Buku</li>
                <li class="tgl_kembali">T.Pinjam</li>
                <li class="nama_buku">T.harus Kembali</li>
                <li class="status">kondisi</li>
            </ul>
        </div>
        <div class="kembali-isi">
            <?php
            $data['id_pinjam'] = 0;
            $data['id_buku'] = 0;
            foreach ($pinjam as $key => $data) {
                $buruk = "rusak";
                $baik = "baik";
                $ruber = "rusak berat";
                $hilang = "hilang";
            ?>
                <ul class="isi">
                    <li class="nama"> <?php echo $data['id_buku'] ?> </li>
                    <li class="tgl_pinjam"> <?php echo $data['nama_buku']; ?></li>
                    <li class="tgl_kembali"><?php echo $data['tgl_pinjam']; ?></li>
                    <div id="result"></div>
                    <li class="nama_buku"><?php echo $data['tgl_kembali'] ?></li>
                    <li class="status">
                        <div class="border">
                            <form action="<?php echo base_url('/dashboard/dikembalikan_paket/') ?>" method="POST">
                                <input type="hidden" name="kode" value="<?php echo $data['id_pinjam']; ?>" />
                                <input type="hidden" name="id_buku" value="<?php echo $data['id_buku']; ?>" />
                                <input type="text" name="hilang" class="ifYes" style="float:left;  width: 50%; height: 30px;" placeholder="isi jika hilang" autocomplete="off" />
                                <a href="#"><button type="submit" style=" width: 40%; height: 30px;">NEXT ></button></a>
                            </form>
                        </div>
                    </li>
                </ul>
            <?php  }
            ?>
        </div>
        <div class=" kembali-submit">
            <div class="kiri-sub">
                <div class="huruf">Nama Peminjam</div>
                <div class="jumlah" id="jumlah">:<?php
                                                    echo $data['nama']; ?></div>
            </div>
            <div class="kanan-sub">
                <div class="kosong">
                    Kode : <?php
                            echo $data['id_anggota']; ?>
                </div>
                <div class="tombol">
                    <input type="hidden" name="id_anggota" value="<?php echo $data['id_anggota']; ?>" />
                    <a href="<?php echo base_url('/dashboard/k_st/' . $data['id_anggota']) ?>"><button>KONFIRMASI</button></a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


</div>

</div>
</div>
</div>
</body>

</html>