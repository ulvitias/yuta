<title>NOTA PEMINJAMAN</title>
</head>
<?php $session = session(); ?>

<body>
    <div class="mark">
        <div class="head">
            <p>KONFIRMASI</p>
        </div>
        <div class="body">
            <div class="body-core">
                <div class="peminjam">
                    <div class="label-peminjam">
                        <p>Kode Buku</p>
                    </div>
                    <div class="data-peminjam">
                        <p>: <?php echo $session->get('id_buku_perpus'); ?></p>
                    </div>
                </div>
                <div class="peminjam">
                    <div class="label-peminjam">
                        <p>Judul Buku</p>
                    </div>
                    <div class="data-peminjam">
                        <p>: <?php echo $session->get('judul_buku_perpus'); ?></p>
                    </div>
                </div>

                <div class="peminjam">
                    <div class="label-peminjam">
                        <p>Penerbit Buku</p>
                    </div>
                    <div class="data-peminjam">
                        <p>: <?php echo $session->get('penerbit'); ?></p>
                    </div>
                </div>

                <div class="peminjam">
                    <div class="label-peminjam">
                        <p>Pengarang</p>
                    </div>
                    <div class="data-peminjam">
                        <p>: <?php echo $session->get('pengarang'); ?></p>
                    </div>
                </div>
                <div class="peminjam">
                    <div class="label-peminjam">
                        <p>Kategoril</p>
                    </div>
                    <div class="data-peminjam">
                        <p>: <?php echo $session->get('kategori'); ?></p>
                    </div>
                </div>
                <div class="peminjam">
                    <div class="label-peminjam">
                        <p>Tahun SK Buku</p>
                    </div>
                    <div class="data-peminjam">
                        <p>: <?php echo  $session->get('tahun_sk'); ?></p>
                    </div>
                </div>
                <div class="peminjam">
                    <div class="label-peminjam">
                        <p>Mata Pelajaran*</p>
                    </div>
                    <div class="data-peminjam">
                        <p>: <?php echo  $session->get('mapel'); ?></p>
                    </div>
                </div>
                <div class="peminjam">
                    <div class="label-peminjam">
                        <p>Stok Buku</p>
                    </div>
                    <div class="data-peminjam">
                        <p>: <?php echo  $session->get('stok'); ?></p>
                    </div>
                </div>
                <div class="peminjam">
                    <div class="label-peminjam">
                        <p>Rak Buku</p>
                    </div>
                    <div class="data-peminjam">
                        <p>: <?php echo  $session->get('rak'); ?></p>
                    </div>
                </div>
                <div class="peminjam">
                    <div class="label-peminjam">
                        <p>Jumlah Total</p>
                    </div>
                    <div class="data-peminjam">
                        <p>: <?php echo  $session->get('jumlah'); ?></p>
                    </div>
                </div>
                <div class="peminjam">
                    <div class="label-peminjam">
                        <p>kelas</p>
                    </div>
                    <div class="data-peminjam">
                        <p>: <?php echo  $session->get('kelas_buku'); ?></p>
                    </div>
                </div>
                <div class="tambah-submit">
                    <a href="/dashboard/buku"><button>KONFIRMASI</button></a>
                    <a href="<?php echo base_url('/dashboard/edit_buku/' . $session->get('id_buku_perpus')); ?>"><button>EDIT</button></a>
                </div>
            </div>
        </div>
</body>

</html>