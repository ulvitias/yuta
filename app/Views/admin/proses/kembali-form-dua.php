<div class="kembali-core">
    <div class="kembali-body">
        <div class="kembali-judul">
            <ul class="judul">
                <li class="nama">Nama </li>
                <li class="tgl_pinjam">Harus kembali</li>
                <li class="tgl_kembali">Keterlambatan(hari)</li>
                <li class="nama_buku"> Buku</li>
                <li class="status">Dikembalikan/kondisi</li>
            </ul>
        </div>
        <div class="kembali-isi">
            <?php
            if ($lihat) {
                $totalhari = 0;
                $total = 0;
                $tot = 0;
                $totot = 0;
                foreach ($lihat as $key => $data) { ?>
                    <form action="<?php echo base_url('/dashboard/konfirmasi_pengembalian/' . $data['id_anggota']) ?>" method="POST">
                        <ul class="isi">
                            <li class="nama"> <?php echo $data['nama'] ?> </li>
                            <li class="tgl_pinjam"> <?php echo $data['tgl_kembali']; ?></li>
                            <li class="tgl_kembali"> <?php date_default_timezone_set("Asia/Jakarta");
                                                        $kem = date_create($data['tgl_kembali']);
                                                        $tim = date_create('now');
                                                        $waktu = 0;
                                                        $hari = 0;
                                                        if ($tim > $kem) {
                                                            $ter = date_diff($kem, $tim);
                                                            $hari = $ter->format("%a");
                                                            $waktu = $hari * 1000;
                                                        }
                                                        echo $hari;
                                                        $totalhari = $totalhari + $hari;
                                                        ?>
                            </li>
                            <div id="result"></div>
                            <li class="nama_buku"><?php echo $data['nama_buku'] ?></li>
                            <li class="status">
                                <div class="border">
                                    <?php echo $data['duid'];
                                    ?>
                                </div>
                            </li>
                        </ul>
                        <input type="hidden" name="kode_buku[<?php echo $data['id_buku'] ?>]" value="<?php echo $data['id_buku']; ?>" />
                        <input type="hidden" name="kode[<?php echo $data['id_pinjam'] ?>]" value="<?php echo $data['id_pinjam']; ?>" />
                        <input type="hidden" name="kondisi[<?php echo $data['kondisi'] ?>]" value="<?php echo $data['kondisi']; ?>" />
                        <input type="hidden" name="nabuk[<?php echo $data['nama_buku'] ?>]" value="<?php echo $data['nama_buku']; ?>" />
                    <?php
                    $total = $total + $waktu;
                    $tot  = $tot + $data['duid'];
                }
                $totot = $tot + $total;
                    ?>
        </div>
        <div class=" kembali-submit">
            <div class="kiri-sub">
                <div class="huruf">Jumlah denda Keterlambatan</div>
                <div class="jumlah" id="jumlah">:<?php
                                                    echo $totot; ?></div>
            </div>
            <div class="kanan-sub">
                <div class="kosong">
                    Jumlah Hari Telat : <?php
                                        echo $totalhari;

                                        ?>
                </div>
                <div class="tombol">
                    <input type="hidden" name="nama[<?php echo $data['nama'] ?>]" value="<?php echo $data['nama']; ?>" />
                    <input type="hidden" name="pinjam[<?php echo $data['tgl_pinjam'] ?>]" value="<?php echo $data['tgl_pinjam']; ?>" />
                    <input type="hidden" name="kembali[<?php echo $data['tgl_kembali'] ?>]" value="<?php echo $data['tgl_kembali']; ?>" />
                    <input type="hidden" name="hari[<?php echo $totalhari ?>]" value="<?php echo $totalhari; ?>" />
                    <input type="hidden" name="rp[<?php echo $totot ?>]" value="<?php echo $totot; ?>" />
                    <input type="hidden" name="hariini[<?php echo date('Y-m-d') ?>]" value="<?php echo date('Y-m-d')  ?>" />

                    <button type="submit">KONFIRMASI</button>
                    </form>
                <?php  } else {
                echo "<h1>TIDAK ADA DATA</h1>";
            }
                ?>
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