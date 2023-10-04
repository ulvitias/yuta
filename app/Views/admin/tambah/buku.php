<title>TAMBAH DATA BUKU</title>
<script>
    function validateForm() {
        var x = document.forms["form_tambah_buku"]["id_buku"].value;
        if (x == "") {
            alert("KODE HARUS DI ISI");
            return false;
        }
        var b = document.forms["form_tambah_buku"]["judul"].value;
        if (b == "") {
            alert("JUDUL HARUS DI ISI");
            return false;
        }

        var c = document.forms["form_tambah_buku"]["pengarang"].value;
        if (c == "") {
            alert("PENGARANG HARUS DI ISI");
            return false;
        }

        var d = document.forms["form_tambah_buku"]["penerbit"].value;
        if (d == "") {
            alert("PENERBIT HARUS DI ISI");
            return false;
        }

        var e = document.forms["form_tambah_buku"]["th_msk"].value;
        if (e == "") {
            alert("TAHUN MASUK HARUS DI ISI");
            return false;
        }

        var f = document.forms["form_tambah_buku"]["stok"].value;
        if (f == "") {
            alert("STOK HARUS DI ISI");
            return false;
        }

        var g = document.forms["form_tambah_buku"]["rak"].value;
        if (g == "") {
            alert("RAK HARUS DI ISI");
            return false;
        }
    }
</script>
<?php if (session()->getFlashdata('msg')) {
    echo '<script type="text/javascript"> alert("' . session()->getFlashdata('msg') . '");</script>';
} ?>
</head>

<body>
    <div class="mark">
        <div class="head">
            <p>TAMBAH DATA BUKU</ </div>
        </div>
        <div class="body">
            <div class="foto">
                <img src="/asset/img/buku.png" />
            </div>
            <form method="POST" action="Tambah_data" name="form_tambah_buku" onsubmit="return validateForm()">
                <div class="input-data">
                    <label>Id Buku</label>
                    <input type="text" placeholder="Masukan Id buku" name="id_buku" id="id_buku" />
                </div>
                <div class="input-data">
                    <label>Judul Buku</label>
                    <input type="text" placeholder="Masukan Judul Buku" name="judul" id="judul" />
                </div>
                <div class="input-data">
                    <label>Pengarang</label>
                    <input type="text" placeholder="Masukan Pengarang" name="pengarang" id="pengarang" />
                </div>
                <div class="input-data">
                    <label>Penerbit</label>
                    <input type="text" placeholder="Masukan Penerbit" name="penerbit" id="penerbit" />
                </div>
                <div class="input-data">
                    <label>Kelas</label>
                    <select class="input" id="kategori" name="kategori">
                        <option value="paket">paket</option>
                        <option value="reguler">reguler</option>
                    </select>
                </div>
                <div class="input-data">
                    <label>Tahun Masuk</label>
                    <input type="text" placeholder="Masukan Tahun Masuk" name="th_msk" id="th_msk" />
                </div>
                <div class="input-data">
                    <label>Mapel</label>
                    <input type="text" placeholder="Masukan Mapel" name="mapel" id="mapel" />
                </div>
                <div class="input-data">
                    <label>Jumlah</label>
                    <input type="text" placeholder="Masukan Mapel" name="stok" id="stok" />
                </div>
                <div class="input-data">
                    <label>Rak</label>
                    <input type="text" placeholder="Masukan Mapel" name="rak" id="rak" />
                </div>
                <div class="input-data">
                    <label>Kelas</label>
                    <select class="input" id="kelas_buku" name="kelas_buku">
                        <option value="-">-</option>
                        <option value="VII">VII</option>
                        <option value="VIII">VIII</option>
                        <option value="IX">IX</option>
                    </select>
                </div>
                <div class="tambah-submit">
                    <input type="submit" value="TAMBAH BUKU +" />
                    <button><a href="/dashboard/buku">CANCEL</a></button>
                </div>

            </form>
        </div>
    </div>
</body>

</html>