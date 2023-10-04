<title>TAMBAH DATA BUKU</title>
</head>

<body>
    <div class="mark">
        <div class="head">
            <p>TAMBAH DATA BUKU</p>
        </div>

        <div class="body">
            <div class="foto">
                <img src="/asset/img/buku.png" />
            </div>
            <form method="POST" action="<?php echo base_url('/dashboard/update_buku/' . $data['id_buku_perpus']) ?> ">

                <div class="input-data">
                    <label>Id Buku</label>
                    <input type="text" placeholder="<?php echo $data['id_buku_perpus']; ?>" name="id_buku" id="id_buku" value="<?php echo $data['id_buku_perpus']; ?>" />
                </div>
                <div class="input-data">
                    <label>Judul Buku</label>
                    <input type="text" placeholder="<?php echo $data['judul_buku_perpus']; ?>" name="judul" id="id_buku" value="<?php echo $data['judul_buku_perpus']; ?>" />
                </div>
                <div class=" input-data">
                    <label>Pengarang</label>
                    <input type="text" placeholder="<?php echo $data['pengarang']; ?>" name="pengarang" id="id_buku" value="<?php echo $data['pengarang']; ?>" />
                </div>
                <div class=" input-data">
                    <label>Penerbit</label>
                    <input type="text" placeholder="<?php echo $data['penerbit']; ?>" name="penerbit" id="id_buku" value="<?php echo $data['penerbit']; ?>" />
                </div>
                <div class=" input-data">
                    <label>Kategori</label>
                    <input type="text" placeholder="<?php echo $data['kategori']; ?>" name="kategori" id="id_buku" value="<?php echo $data['kategori']; ?>" />
                </div>
                <div class=" input-data">
                    <label>Tahun Masuk</label>
                    <input type="text" placeholder="<?php echo $data['tahun_sk']; ?>" name="th_msk" id="id_buku" value="<?php echo $data['tahun_sk']; ?>" />
                </div>
                <div class=" input-data">
                    <label>Mapel</label>
                    <input type="text" placeholder="<?php echo $data['mapel']; ?>" name="mapel" id="id_buku" value="<?php echo $data['mapel']; ?>" />
                </div>
                <div class=" input-data">
                    <label>stok</label>
                    <input type="text" placeholder="<?php echo $data['stok']; ?>" name="stok" id="id_buku" value="<?php echo $data['stok']; ?>" />
                </div>
                <div class=" input-data">
                    <label>rak</label>
                    <input type="text" placeholder="<?php echo $data['rak']; ?>" name="rak" id="id_buku" value="<?php echo $data['rak']; ?>" />
                </div>
                <div class=" input-data">
                    <label>jumlah</label>
                    <input type="text" placeholder="<?php echo $data['jumlah']; ?>" name="jumlah" id="id_buku" value="<?php echo $data['jumlah']; ?>" />
                </div>
                <div class=" tambah-submit">
                    <input type="submit" value="SIMPAN" />
                    <button><a href="/dashboard/buku">CANCEL</a></button>
                </div>

            </form>
        </div>
    </div>
    <footer>

    </footer>
</body>

</html>