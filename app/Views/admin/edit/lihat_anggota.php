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
                        <p>Nama Anggota</p>
                    </div>
                    <div class="data-peminjam">
                        <p>: <?php echo $session->get('nama'); ?></p>
                    </div>
                </div>

                <div class="peminjam">
                    <div class="label-peminjam">
                        <p>Tahun Masuk</p>
                    </div>
                    <div class="data-peminjam">
                        <p>: <?php echo $session->get('tahun_ajaran'); ?></p>
                    </div>
                </div>

                <div class="peminjam">
                    <div class="label-peminjam">
                        <p>Gender</p>
                    </div>
                    <div class="data-peminjam">
                        <p>: <?php echo $session->get('gender'); ?></p>
                    </div>
                </div>
                <div class="peminjam">
                    <div class="label-peminjam">
                        <p>Jabatan</p>
                    </div>
                    <div class="data-peminjam">
                        <p>: <?php echo $session->get('jabatan'); ?></p>
                    </div>
                </div>
                <div class="peminjam">
                    <div class="label-peminjam">
                        <p>Jabatan</p>
                    </div>
                    <div class="data-peminjam">
                        <p>: <?php echo $session->get('kelas'); ?></p>
                    </div>
                </div>
                <div class="tambah-submit">
                    <a href="/dashboard/anggota"><button>KONFIRMASI</button></a>
                    <a href="<?php echo base_url('/dashboard/printkartu/' . $session->get('id_anggota')); ?>"><button>Print Kartu</button></a>
                    <a href="<?php echo base_url('/dashboard/edit/' . $session->get('id_anggota')); ?>"><button>EDIT</button></a>
                </div>
            </div>
        </div>
</body>

</html>