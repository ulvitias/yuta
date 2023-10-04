<div class="kembali-core">
    <div class="kembali-body">
        <div class="kembali-judul">
            <div class="header-kiri">
                <form method="post" action="#">
                    <input type="text" name="cari" placeholder=" <?php if (isset($_POST['cari'])) {
                                                                        echo  $_POST['cari'];
                                                                    } else {
                                                                        echo "Cari Data";
                                                                    } ?>" />
                    <a href="/dashboard/hilangcar/">X</a>
                    <button type="submit">cari</button>
                </form>
            </div>
            <div class="header-kanan">
                <button><a href="/dashboard/printdatanota">Print Data Nota</a></button>
            </div>
            <ul class="judul">
                <li class="nama">Nama</li>
                <li class="tgl_pinjam">Id Peminjaman</li>
                <li class="tgl_kembali"> Kembali</li>
                <li class="nama_buku">Jumlah Denda</li>
                <li class="status">Status</li>
            </ul>
        </div>
        <div class="kembali-isi">
            <?php
            $wak = 0;
            foreach ($nota as $key => $data) { ?>
                <ul class="isi">
                    <li class="nama"> <?php echo $data['nama'] ?> </li>
                    <li class="tgl_pinjam"> <?php echo $data['id_pinjam']; ?></li>
                    <li class="tgl_kembali"> <?php echo $data['tgl_kembali'] ?></li>
                    <li class="nama_buku"><?php echo $data['jumlah'] ?></li>
                    <li class="status">
                        <div class="border">
                            <div class="kem"><?php echo $data['status'] ?> </div>
                            <a href="<?php echo base_url('/dashboard/detilnota/' . $data['id_nota']) ?>"><button>Lihat Detail</button></a>
                        </div>
                    </li>
                </ul>
            <?php

                $wak = $wak + $data['jumlah'];
            }
            ?>
        </div>
        <div class=" kembali-submit">
            <div class="kiri-sub">
                <div class="huruf">Total Pemasukan</div>
                <div class="jumlah" id="jumlah">:<?php
                                                    echo "Rp." . $wak; ?></div>
            </div>
            <div class="kanan-sub">
                <div class="kosong">
                </div>
                <div class="tombol">

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