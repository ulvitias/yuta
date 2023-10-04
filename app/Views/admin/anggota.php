<div class="blog-post">
    <div class="body-post">
        <div class="header-admin">
            <div class="header-kiri">
                <form method="post" action="#">
                    <input type="text" name="cari_anggota" placeholder="<?php if (isset($_POST['cari_anggota'])) {
                                                                            echo  $_POST['cari_anggota'];
                                                                        } else {
                                                                            echo "Cari..";
                                                                        } ?>" />
                    <a href="/dashboard/hilangkencari/">X</a>
                    <button type="submit">cari</button>
                </form>
            </div>
            <div class="header-kanan">
                <button><a href="/dashboard/Tambah_anggota">Tambah Data</a></button>
                <button><a href="/dashboard/IMPOR">BACKUP/RESTORE</a></button>
            </div>
        </div>
        <!-- PEMBATAS -->
        <div class="table-ready">
            <table>
                <tr class="judul">
                    <th class="nomer">No.</th>
                    <th class="id_anggota">Kode</th>
                    <th class="nama">Nama Anggota</th>
                    <th class="tahun">Tahun</th>
                    <th class="gender">Gender</th>
                    <th class="jabatan">Jabatan</th>
                    <th class="kelas">kelas</th>
                    <th class="aksi">Aksi</th>
                </tr>
                <?php
                foreach ($Anggota as $key => $data) { ?>
                    <tr class="isi">
                        <td class="nomer"><?php echo $key + 1 . "."; ?></td>
                        <td class="id_anggota"><?php echo $data['id_anggota'] ?></td>
                        <td class="nama"><?php echo $data['nama'] ?></td>
                        <td class="tahun"><?php echo $data['tahun_ajaran']; ?></td>
                        <td class="gender"><?php echo $data['gender']; ?></td>
                        <td class="jabatan"><?php echo $data['jabatan']; ?></td>
                        <td class="jabatan"><?php echo $data['kelas']; ?></td>
                        <td class="aksi">
                            <a href="<?php echo base_url('/dashboard/edit/' . $data['id_anggota']); ?>" class="edit"><button class="blue"><img src="/asset/img/des.png" /></button></a>
                            <a href="<?php echo base_url('/dashboard/hapus/' . $data['id_anggota']); ?>" class="edit"><button class="red"><img src="/asset/img/des2.png" /></button></a>
                            <a href="<?php echo base_url('/dashboard/lihat_anggota/' . $data['id_anggota']); ?>" class="edit"><button class="green"><img src="/asset/img/des3.png" /></button></a>
                        </td>
                    </tr> <?php } ?>
                <div class="ali" style=" float: right;">
                    <?php if (isset($pager)) {
                        echo $pager->Links('bootstrap');
                    } ?>
                </div>
            </table>

        </div>
    </div>

</div>
</div>
</div>
</body>

</html>