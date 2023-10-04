<html>
<!DOCTYPE html>
<html lang="id">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">

<head>
    <!-- JAVASCRIPT -->
    <script type="text/javascript" src="/asset/plugin/ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="/asset/javascript/color.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="/asset/css/admin/base.css" />
    <link rel="stylesheet" type="text/css" href="/asset/css/admin/buku.css" />
    <link rel="stylesheet" type="text/css" href="/asset/css/admin/dashboard.css" />
    <link rel="stylesheet" type="text/css" href="/asset/css/admin/tambah.css" />
    <link rel="stylesheet" type="text/css" href="/asset/css/admin/peminjaman.css" />
    <link rel="stylesheet" type="text/css" href="/asset/css/admin/nota_peminjaman.css" />
    <link rel="stylesheet" type="text/css" href="/asset/css/admin/kembali.css" />
    <link rel="stylesheet" type="text/css" href="/asset/css/admin/base_laporan.css" />

    <!-- FONT -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet">

    <!-- JQUERY -->
    <script type="text/javascript" src="/asset/plugin/jquery/jquery.js"></script>

    <title>ADMIN - PERPUSTAKAAN</title>
    <script>
        $(document).ready(function() {
            $('.marker-dua').hide();
            $('.menu-mobile').click(function() {
                $('.marker-dua').toggle();;
            });
        });
    </script>
    <?php if (session()->getFlashdata('msg')) {
        echo '<script type="text/javascript"> alert("' . session()->getFlashdata('msg') . '");</script>';
    } ?>

</head>

<body>
    <div class="marker">
        <div class="left">
            <div class="kembali-mobile">
                <a href="#" class="menu-mobile">
                    <div class="icon">
                        <img src="/asset/img/tutup.png" />
                    </div>
                    <div class="huruf">
                        <p>Kembali</p>
                    </div>
                </a>
            </div>
            <div class="left-top">
                <img src="/asset/img/logo_web.png" />
            </div>
            <div class="left-mid">
                <a href="/dashboard">
                    <div class="menu">
                        <div class="icon">
                            <img src="/asset/img/beranda.png" />
                        </div>
                        <div class="kata">
                            <p class="brn">Beranda</p>
                        </div>
                    </div>
                </a>
                <a href="/dashboard/admin_area">
                    <div class="menu">
                        <div class="icon">
                            <img src="/asset/img/profile.png" />
                        </div>
                        <div class="kata">
                            <p>Akun</p>
                        </div>
                    </div>
                </a>
                <h3 style="font-size: 20px;">Data</h3>
                <a href="/dashboard/anggota">
                    <div class="menu">
                        <div class="icon">
                            <img src="/asset/img/data.png" />
                        </div>
                        <div class="kata">
                            <p>Data Anggota</p>
                        </div>
                    </div>
                </a>
                <a href="/dashboard/Buku">
                    <div class="menu">
                        <div class="icon">
                            <img src="/asset/img/data.png" />
                        </div>
                        <div class="kata">
                            <p>Data Buku</p>
                        </div>
                    </div>
                </a>

                <h3 style="font-size: 20px;">Administrasi</h3>
                <a href="/dashboard/peminjaman">
                    <div class="menu">
                        <div class="icon">
                            <img src="/asset/img/pinjam.png" />
                        </div>
                        <div class="kata">
                            <p>Peminjaman</p>
                        </div>
                    </div>
                </a>
                <a href="/dashboard/pengembalian">
                    <div class="menu">
                        <div class="icon">
                            <img src="/asset/img/kembali.png" />
                        </div>
                        <div class="kata">
                            <p>Pengembalian</p>
                        </div>
                    </div>
                </a>
                <a href="/dashboard/nota">
                    <div class="menu">
                        <div class="icon">
                            <img src="/asset/img/laporan.png" />
                        </div>
                        <div class="kata">
                            <p>Nota</p>
                        </div>
                    </div>
                </a>
                <h3 style="font-size: 20px;">Laporan</h3>
                <a href="/dashboard/Laporan">
                    <div class="menu">
                        <div class="icon">
                            <img src="/asset/img/laporan.png" />
                        </div>
                        <div class="kata">
                            <p>Laporan</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <!-- zxzxz -->
    <div class="marker-dua">
        <div class="left-dua">
            <div class="kembali-mobile">
                <a href="#" class="menu-mobile">
                    <div class="icon">
                        <img src="/asset/img/tutup.png" />
                    </div>
                    <div class="huruf">
                        <p>Kembali</p>
                    </div>
                </a>
            </div>
            <div class="left-top">
                <img src="/asset/img/logo_web.png" />
            </div>
            <div class="left-mid">
                <a href="#">
                    <div class="menu">
                        <div class="icon">
                            <img src="/asset/img/beranda.png" />
                        </div>
                        <div class="kata">
                            <p>Beranda</p>
                        </div>
                    </div>
                </a>

                <h3>Data</h3>
                <a href="/dashboard/anggota">
                    <div class="menu">
                        <div class="icon">
                            <img src="/asset/img/data.png" />
                        </div>
                        <div class="kata">
                            <p>Data Anggota</p>
                        </div>
                    </div>
                </a>
                <a href="/dashboard/Buku">
                    <div class="menu">
                        <div class="icon">
                            <img src="/asset/img/data.png" />
                        </div>
                        <div class="kata">
                            <p>Data Buku</p>
                        </div>
                    </div>
                </a>

                <h3>Administrasi</h3>
                <a href="/dashboard/peminjaman">
                    <div class="menu">
                        <div class="icon">
                            <img src="/asset/img/pinjam.png" />
                        </div>
                        <div class="kata">
                            <p>Peminjaman</p>
                        </div>
                    </div>
                </a>
                <a href="/dashboard/pengembalian">
                    <div class="menu">
                        <div class="icon">
                            <img src="/asset/img/kembali.png" />
                        </div>
                        <div class="kata">
                            <p>Pengembalian</p>
                        </div>
                    </div>
                </a>
                <a href="/dashboard/nota">
                    <div class="menu">
                        <div class="icon">
                            <img src="/asset/img/laporan.png" />
                        </div>
                        <div class="kata">
                            <p>Nota</p>
                        </div>
                    </div>
                </a>
                <h3>Laporan</h3>
                <a href="#">
                    <div class="menu">
                        <div class="icon">
                            <img src="/asset/img/laporan.png" />
                        </div>
                        <div class="kata">
                            <p>Laporan</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <!-- PEMBATAS -->
    <div class="core">
        <div class="mid">
            <!-- INI MIDLANE -->
            <div class="mid-core">

                <div class="header">
                    <div class="button-mobile">
                        <a href="#" class="menu-mobile"><img src="/asset/img/menu-mobile.png" /></a>
                    </div>
                    <div class="judul">
                        <p>ADMIN PERPUSTAKAAN</p>

                    </div>
                    <div class="akun-mobile">
                        <a href="#"><img src="/asset/img/profile.png" /></a>
                    </div>
                </div>