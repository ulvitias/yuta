<title>DATA LENGKAP ANGGOTA</title>
</head>
<?php $session = session(); ?>

<body>
    <div class="mark">
        <div class="head">
            <p>Data Anggota</p>
        </div>
        <div class="body">
            <div class="body-core">
                <div class="peminjam">
                    <div class="label-peminjam">
                        <p>Kode Anggota</p>
                    </div>
                    <div class="data-peminjam">
                        <p>: <?php echo $session->get('id_anggota'); ?></p>
                    </div>
                </div>
                <div class="peminjam">
                    <div class="label-peminjam">
                        <p>Nama Peminjam</p>
                    </div>
                    <div class="data-peminjam">
                        <p>: <?php echo $session->get('nama'); ?></p>
                    </div>
                </div>

                <div class="peminjam">
                    <div class="label-peminjam">
                        <p>Tanggal Pinjam</p>
                    </div>
                    <div class="data-peminjam">
                        <p>: <?php echo $session->get('tgl_pinjam'); ?></p>
                    </div>
                </div>

                <div class="peminjam">
                    <div class="label-peminjam">
                        <p>pengembalian</p>
                    </div>
                    <div class="data-peminjam">
                        <p>: <?php echo $session->get('tgl_kembali'); ?></p>
                    </div>
                </div>
                <div class="peminjam">
                    <div class="label-peminjam">
                        <p>Kode buku</p>
                    </div>
                    <div class="data-peminjam">
                        <p>: <?php echo $session->get('id_buku'); ?></p>
                    </div>
                </div>
                <div class="peminjam">
                    <div class="label-peminjam">
                        <p>Judul</p>
                    </div>
                    <div class="data-peminjam">
                        <p>: <?php echo $session->get('nama_buku'); ?></p>
                    </div>
                </div>
                <div class="peminjam">
                    <div class="label-peminjam">
                        <p>Status</p>
                    </div>
                    <div class="data-peminjam">
                        <p>: <?php echo $session->get('status'); ?></p>
                    </div>
                </div>
                <div class="tambah-submit">
                    <a href="/dashboard/pengembalian"><button>KONFIRMASI</button></a>
                    <a href="<?php echo base_url('/dashboard/printdetilpinjam/' . $session->get('id_pinjam')); ?>"><button>Print Data</button></a>
                </div>
            </div>
        </div>
</body>

</html>