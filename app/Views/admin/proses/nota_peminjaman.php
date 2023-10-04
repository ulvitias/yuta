<title>NOTA PEMINJAMAN</title>
</head>
<?php
$session = session();
?>

<body>
    <div class="mark">
        <div class="head">
            <p>KONFIRMASI</p>
        </div>
        <div class="body">
            <div class="body-core">
                <div class="peminjam">
                    <div class="label-peminjam">
                        <p>ID Peminjam</p>
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
                        <p>Kode Buku</p>
                    </div>
                    <div class="data-peminjam">
                        <p>: <?php echo $session->get('id_buku_pinjam'); ?></p>
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
                        <p>Kondisi</p>
                    </div>
                    <div class="data-peminjam">
                        <p>: <?php echo $session->get('kondisi'); ?></p>
                    </div>
                </div>
                <div class="peminjam">
                    <div class="label-peminjam">
                        <p>Dipinjam Tanggal</p>
                    </div>
                    <div class="data-peminjam">
                        <?php
                        date_default_timezone_set("Asia/Jakarta");
                        $date =  date("Y-m-d");
                        $dater =  date("H:i");
                        ?>
                        <p>: <?php echo $date ?></p>
                    </div>
                </div>
                <div class="peminjam">
                    <div class="label-peminjam">
                        <p>Dikembalikan Tanggal</p>
                    </div>
                    <div class="data-peminjam">
                        <?php $kembali = date('Y-m-d', strtotime($date . ' + 3 days'));
                        $kemb = [
                            'tgl_pinjam' => $date,
                            'tgl_kembali' => $kembali
                        ];
                        $session->set($kemb);  ?>
                        <p>: <?php echo  $session->get('tgl_kembali');
                                ?></p>
                    </div>
                </div>
                <div class="tambah-submit">
                    <a href="/dashboard/pinjamkan"><button>KONFIRMASI</button></a>
                    <a href="/dashboard/peminjaman"><button>BATAL</button></a>
                </div>
            </div>
        </div>
</body>

</html>