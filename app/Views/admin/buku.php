<div class="blog-post">
    <div class="body-post">
        <div class="header-admin">
            <div class="header-kiri">
                <form method="post" action="#">
                    <input type="text" name="cari" placeholder="<?php if (isset($_POST['cari'])) {
                                                                    echo  $_POST['cari'];
                                                                } else {
                                                                    echo "Cari..";
                                                                } ?>" />
                    <a href="/dashboard/hilang_kencari/">X</a>
                    <button type="submit">cari</button>
                </form>
            </div>
            <div class="header-kanan">
                <button><a href="/dashboard/Tambah">Tambah data</a></button>
                <button><a href="/dashboard/impor_buku">BACKUP / RESTORE</a></button>
            </div>
        </div>
        <!-- PEMBATAS -->
        <div class="table-ready">
            <table>
                <tr class="judul">
                    <th class="nomer" style="width: 30px;">No.</th>
                    <th class=" id" style="width: 100px;">Kode</th>
                    <th class=" judul_buku" style="width: 200px;">Judul</th>
                    <th class="pengarang" style="width: 120px;">Pengarang</th>
                    <th class="penerbit" style="width: 120px;">Penerbit</th>
                    <th class=" kategori" style="width: 100px;">Kategori</th>
                    <th class="tahun_sk" style="width: 50px;">Tahun</th>
                    <th class="mapel" style="width: 50px;">MaPel</th>
                    <th class="aksi" style="width: 150px;">Aksi</th>
                </tr>
                <?php
                foreach ($buku as $key => $data) { ?>
                    <tr class="isi">
                        <td class="nomer"><?php echo $key + 1; ?></td>
                        <td class="id"><?php echo $data['id_buku_perpus'] ?></td>
                        <td class="judul_buku"><?php echo $data['judul_buku_perpus'] ?></td>
                        <td class="pengarang"><?php echo $data['pengarang']; ?></td>
                        <td class="penerbit"><?php echo $data['penerbit']; ?></td>
                        <td class="kategori"><?php echo $data['kategori']; ?></td>
                        <td class="tahun_sk"><?php echo $data['tahun_sk']; ?></td>
                        <td class="mapel"><?php echo $data['mapel']; ?></td>
                        <td class="aksi">
                            <a href="<?php echo base_url('/dashboard/edit_buku/' . $data['id_buku_perpus']); ?>" class="edit"><button class="blue"><img src="/asset/img/des.png" /></button></a>
                            <a href="<?php echo base_url('/dashboard/hapus_buku/' . $data['id_buku_perpus']); ?>" class="edit"><button class="red"><img src="/asset/img/des2.png" /></button></a>
                            <a href="<?php echo base_url('/dashboard/lihat_buku/' . $data['id_buku_perpus']); ?>" class="edit"><button class="green"><img src="/asset/img/des3.png" /></button></a>

                        </td>
                    </tr> <?php } ?>
                <div class="ali" style=" float: right; ;">
                    <?php
                    if (isset($pager)) {
                        echo $pager->Links('bootstrap');
                    } ?>

                </div>
            </table>

        </div>
        <br />

    </div>

</div>

</div>
</div>
</body>

</html>