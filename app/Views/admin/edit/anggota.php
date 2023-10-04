<title>TAMBAH DATA ANGGOTA</title>
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
            <form method="POST" action="<?php echo base_url('/dashboard/update/' . $data['id_anggota']) ?>">

                <div class="input-data">
                    <label>NISN / NIP /NIK </label>
                    <input type="text" placeholder="Kode" name="id_anggota" id="id_anggota" value="<?php echo $data['id_anggota']; ?>" />
                </div>
                <div class="input-data">
                    <label>NAMA Anggota</label>
                    <input type="text" placeholder="Nama" name="nama" id="nama" value="<?php echo $data['nama']; ?>" />
                </div>
                <div class="input-data">
                    <label>Tahun Ajaran</label>
                    <select class="input" id="tahun_ajaran" name="tahun_ajaran">
                        <option value="<?php echo $data['tahun_ajaran'] ?>" selected><?php echo $data['tahun_ajaran'] ?></option>
                        <option value="2020/2021">2020/2021</option>
                        <option value="2021/2022">2021/2022</option>
                        <option value="2022/2023">2022/2023</option>
                    </select>
                </div>
                <div class="input-data">
                    <label>Jenis Kelamin</label>
                    <select class="input" id="gender" name="gender">
                        <option value="<?php echo $data['gender'] ?>" selected><?php echo $data['gender'] ?></option>
                        <option value="Laki-Laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="input-data">
                    <label>jabatan</label>
                    <select class="input" id="jabatan" name="jabatan">
                        <option value="<?php echo $data['jabatan'] ?>" selected><?php echo $data['jabatan'] ?></option>
                        <option value="SISWA">SISWA</option>
                        <option value="GURU">GURU</option>
                        <option value="PEGAWAI">PEGAWAI</option>
                    </select>
                </div>
                <div class=" input-data">
                    <label>Kelas</label>
                    <select class="input" id="kelas" name="kelas">
                        <option value="<?php echo $data['kelas'] ?>" selected><?php echo $data['kelas'] ?></option>
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
                    <input type="submit" value="UPDATE" />

                    <button><a href="/dashboard/anggota">BATAL </a>
                    </button>

                </div>
            </form>

        </div>
    </div>
</body>

</html>