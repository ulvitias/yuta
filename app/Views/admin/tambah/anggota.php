<title>TAMBAH DATA ANGGOTA</title>
<script>
    function validateForm() {
        var x = document.forms["form_tambah"]["id_anggota"].value;
        if (x == "") {
            alert("NIS HARUS DI ISI");
            return false;
        }
        var y = document.forms["form_tambah"]["nama"].value;
        if (y == "") {
            alert("NAMA HARUS DI ISI");
            return false;
        }
    }
</script>
</head>

<body>
    <div class="mark">
        <div class="head">
            <p>TAMBAH DATA ANGGOTA</ </div>
        </div>
        <div class="body">
            <div class="foto">
                <img src="/asset/img/buku.png" />
            </div>
            <form method="POST" action="Tambah_data_anggota" name="form_tambah" onsubmit="return validateForm()">

                <div class="input-data">
                    <label>Kode Anggota </label>
                    <input type="text" placeholder="Masukan Id Anggota" name="id_anggota" id="id_anggota" />
                </div>
                <div class="input-data">
                    <label>Nama Anggota</label>
                    <input type="text" placeholder="Masukan Nama" name="nama" id="nama" />
                </div>
                <div class="input-data">
                    <label>Tahun Ajaran</label>
                    <select class="input" id="tahun_ajaran" name="tahun_ajaran">
                        <option value="2020/2021">2020/2021</option>
                        <option value="2021/2022">2021/2022</option>
                        <option value="2022/2023">2022/2023</option>
                    </select>
                </div>
                <div class="input-data">
                    <label>Jenis Kelamin</label>
                    <select class="input" id="gender" name="gender">
                        <option value="Laki-Laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="input-data">
                    <label>jabatan</label>
                    <select class="input" id="jabatan" name="jabatan">
                        <option value="SISWA">SISWA</option>
                        <option value="GURU">GURU</option>
                        <option value="PEGAWAI">PEGAWAI</option>
                    </select>
                </div>
                <div class=" input-data">
                    <label>Kelas</label>
                    <select class="input" id="kelas" name="kelas">
                        <option value="VII.1">VII.1</option>
                        <option value="VII.2">VII.2</option>
                        <option value="VII.3">VII.3</option>
                        <option value="VII.4">VII.4</option>
                        <option value="VII.5">VII.5</option>
                        <option value="VII.6">VII.6</option>
                        <option value="VII.7">VII.7</option>
                        <option value="VIII.1">VIII.1</option>
                        <option value="VIII.2">VIII.2</option>
                        <option value="VIII.3">VIII.3</option>
                        <option value="VIII.4">VIII.4</option>
                        <option value="VIII.5">VIII.5</option>
                        <option value="VIII.6">VIII.6</option>
                        <option value="VIII.7">VIII.7</option>
                        <option value="IX.1">IX.1</option>
                        <option value="IX.2">IX.2</option>
                        <option value="IX.3">IX.3</option>
                        <option value="IX.4">IX.4</option>
                        <option value="IX.5">IX.5</option>
                        <option value="IX.6">IX.6</option>
                        <option value="IX.7">IX.7</option>
                        <option value="PEGAWAI">PEGAWAI</option>
                        <option value="GURU">GURU</option>
                    </select>
                </div>
                <div class="tambah-submit">
                    <a href="/dashboard/printkartu" target="_blank" class="pdf"><input type="submit" value="Tambahkan +" /></a>
                    <button><a href="/dashboard/anggota">CANCEL</a></button>
                </div>
            </form>
        </div>
    </div>

</body>

</html>