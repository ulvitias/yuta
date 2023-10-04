<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>PERPUS</title>
    <style>
        .carousel-item {
            height: 32rem;
            background: #777;
            color: wheat;
            position: relative;
            background-size: contain;
        }

        .gg {
            width: 80%;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand">PERPUSTAKAAN SMP NEGERI 01 BANDING AGUNG</a>
            <form class="d-flex" action="#3" method="post">
                <input class="form-control me-2" type="search" placeholder="CARI BUKU DISINI" aria-label="Search" name="cari">
                <a href="/Home/hilangcari/" style="color: white; font-size: 180%; text-decoration: none; margin:0px 5px 0px 5px;">X</a>
                <button class="btn btn-outline-success" type="submit">Cari..</button>
            </form>
        </div>
    </nav>
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="/asset/img/perpus/satu.jpg" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>AYO BACA BUKU</h5>
                    <!-- <p>Some representative placeholder content for the first slide.</p> -->
                </div>
            </div>
            <div class="carousel-item">
                <img src="/asset/img/perpus/dua.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>AYO KE PERPUSTAKAAN</h5>
                    <!-- <p>Some representative placeholder content for the second slide.</p> -->
                </div>
            </div>
            <div class="carousel-item">
                <img src="/asset/img/perpus/tiga.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>TIADA HARI TANPA BUKU</h5>
                    <!-- <p>Some representative placeholder content for the third slide.</p> -->
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <br />
    <br />
    <div class="container">
        <div class="card text-center">
            <div class="card-header">
                Hey Hey Baca Ini...!
            </div>
            <div class="card-body">
                <h5 class="card-title">Quotes Of The Day</h5>
                <p class="card-text">“Books are the quietest and most constant of friends; they are the most accessible and wisest of counselors, and the most patient of teachers.” — Charles William Eliot
                    <br />
                    (Buku adalah teman yang paling tenang dan paling stabil; Mereka adalah konselor yang paling mudah diakses dan paling bijaksana, dan yang paling sabar dalam mengajar.)
                </p>
                <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
            </div>
            <div class="card-footer text-muted">
                200-
            </div>
        </div>
    </div>
    <br />
    <br />
    <div class="container overflow-hidden">
        <div class="row gx-5">
            <div class="col">
                <div class="p-3 border bg-light">
                    <div class="card" style="width: 100%;">
                        <div class="card-header bg-dark" style="color: aliceblue;">
                            Tata Tertib
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Peminjam merupakan Anggota Perpustakaan yang dibuktikan
                                dengan kartu anggota</li>
                            <li class="list-group-item">Buku Yang Dapat Dipinjam Paling Banyak 2 Buah</li>
                            <li class="list-group-item">Pengembalian Maksimal 3(tiga) hari dari tanggal peminjaman</li>
                            <li class="list-group-item">Wajib Menjaga keadaan Buku Yang dipinjam</li>
                            <li class="list-group-item">Keterlambatan Dikenai denda sesuai tata tertib perpustakaan</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="p-3 border bg-light">
                    <div class="card-header bg-dark" style="color: aliceblue;">
                        Top 10 Leaderboard
                    </div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Kode</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($hitung as $key => $data) { ?>
                                <tr>
                                    <th scope="row"><?php echo $key + 1 . "."; ?></th>
                                    <td><?php echo $data['id_anggota'] ?></td>
                                    <td><?php echo $data['nama'] ?></td>
                                    <td><?php echo $data['count( log_peminjaman.id_anggota )']; ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
    <br />
    <br />
    <br />
    <br />
    <div class="container-fluid" id="3">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Penerbit</th>
                    <th scope="col">Pengarang</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($buku as $key => $data) { ?>
                    <tr>
                        <th scope="row"><?php echo $key + 1 . "."; ?></th>
                        <td><?php echo $data['judul_buku_perpus'] ?></td>
                        <td><?php echo $data['penerbit'] ?></td>
                        <td><?php echo $data['pengarang']; ?></td>

                    </tr>
                <?php } ?>
                <?php if (isset($pager)) {
                    echo $pager->Links('bootstrap');
                } ?>
            </tbody>
        </table>
    </div>
    <footer style="width: 100%; height:100px; background:black; margin-top:50px;">
    </footer>

    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script> -->
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>

</body>

</html>