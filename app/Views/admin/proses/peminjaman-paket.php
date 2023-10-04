<?php $session = session(); ?>
<div class="kembali-core">
    <div class="kembali-body">
        <div class="kembali-judul">
            <ul class="judul">
                <li class="nama">kode</li>
                <li class="tgl_pinjam">Judul Buku</li>
                <li class="tgl_kembali">mapel</li>
                <li class="nama_buku">kelas</li>
                <li class="status">Jumlah</li>
            </ul>
        </div>
        <link rel="stylesheet" type="text/css" href="styles.css">
        <div class="kembali-isi">
            <?php
            foreach ($buku as $key => $data) {
            ?>
                <form action="/dashboard/pinjamkan_paket" method="post">
                    <ul class="isi">
                        <li class="nama"><?php echo $data['id_buku_perpus'] ?> </li>
                        <li class="tgl_pinjam"> <?php echo $data['judul_buku_perpus'] ?> </li>
                        <li class="tgl_kembali"> <?php echo $data['mapel'] ?> </li>
                        <li class="nama_buku"> <?php echo $data['kelas'] ?> </li>
                        <li class="status">1</li>
                    </ul>
                    <input type="hidden" name="kunci[<?php echo $key + 1 ?>]" value="<?php echo $key + 1 ?>">
                    <input type="hidden" name="id_buku_pinjam[<?php echo $data['id_buku_perpus'] ?>]" value="<?php echo $data['id_buku_perpus'] ?>">
                    <input type="hidden" name="judul[<?php echo $data['judul_buku_perpus'] ?>]" value="<?php echo $data['judul_buku_perpus'] ?>">
                <?php  } ?>
        </div>
        <div class=" kembali-submit">
            <div class="kiri-sub">
                <div class="huruf">Nama Peminjam</div>
                <div class="jumlah" id="jumlah">:<?php
                                                    echo $session->get('nama') ?></div>
            </div>
            <div class="kanan-sub">
                <div class="kosong">
                    Kode : <?php
                            // echo $session->get('kelas');
                            $date =  date("Y-m-d");
                            $kembali = date('Y-m-d', strtotime($date . ' + 2 years'));
                            echo $kembali;
                            ?>
                </div>
                <div class="tombol">
                    <input type="hidden" name="pinjam[<?php echo date('Y-m-d') ?>]" value="<?php echo date('Y-m-d') ?>">
                    <input type="hidden" name="kembali[<?php echo $kembali ?>]" value="<?php echo $kembali ?>">
                    <a href="#"><button type="input">KONFIRMASI</button></a>
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