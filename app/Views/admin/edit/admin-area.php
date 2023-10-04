<title>DATA LENGKAP ANGGOTA</title>
</head>
<?php $session = session(); ?>


<body>
    <?php if (session()->getFlashdata('msg')) {
        echo '<script type="text/javascript"> alert("' . session()->getFlashdata('msg') . '");</script>';
    } ?>
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
                        <p>: <?php echo $session->get('npm'); ?></p>
                    </div>
                </div>
                <br />
                <br />
                <form action="/dashboard/ganti_pass_admon" method="POST">
                    <div class="input-data">
                        <label>Ganti Password</label>
                        <input type="text" placeholder="Password Lama" name="pass_recent" id="pass_recent" />
                    </div>
                    <div class="input-data">
                        <label>-</label>
                        <input type="text" placeholder="Password Baru" name="new_pass" id="new_pass" />
                    </div>
                    <div class="input-data">
                        <label>-</label>
                        <input type="text" placeholder="Konfirmasi Password Baru" name="new_pass_konf" id="new_pass_konf" />
                    </div>
                    <div class="tambah-submit">
                        <input type="submit" value="Ganti" />
                    </div>
                </form>
                <div class=" tambah-submit">
                    <a href="/dashboard"><button>KONFIRMASI</button></a>
                    <a href="<?php echo base_url('/dashboard/log_out/'); ?>"><button>LOG OUT</button></a>
                </div>
            </div>
        </div>
</body>

</html>