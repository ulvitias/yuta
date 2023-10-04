<br />
<div class="kembali-isi">
    <?php
    foreach ($pinjol as $key => $data2) { ?>
        <ul class="isi">
            <li class="nama"> <?php echo $data2['nama'] ?> </li>
            <li class="tgl_pinjam"> <?php echo $data2['tgl_pinjam'] ?></li>
            <li class="tgl_kembali"> <?php echo $data2['tgl_kembali'] ?></li>
            <li class="nama_buku"><?php echo $data2['nama_buku'] ?></li>
            <li class="status">
                <div class="border">
                    <div class="kem"><?php echo $data2['status'] ?> </div>
                    <a href="<?php echo base_url('/dashboard/dikembalikan/' . $data2['id_pinjam']) ?>"><button>K</button></a>
                    <a href="#"><button>D</button></a>
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