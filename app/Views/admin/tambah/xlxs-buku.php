<!DOCTYPE html>
<html>

<head>
    <title>BUKU!</title>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .mid {
            margin: auto;
        }

        .mid-2 {
            text-align: center;
        }
    </style>
</head>

<body>

    <div class="container">
        <a href='<?= site_url('/dashboard/buku') ?>'><button class="btn btn-primary backBtn btn-lg pull-left" type="button">
                <- KEMBALI</button></a>
        <br />
        <br />
        <br />
        <div class="row">
            <div class="col-md-12">
                <?php
                // Display Response
                if (session()->has('message')) {
                ?>
                    <div class="alert <?= session()->getFlashdata('alert-class') ?>">
                        <?= session()->getFlashdata('message') ?>
                    </div>
                <?php
                }
                ?>
                <?php $validation = \Config\Services::validation(); ?>

                <form method="post" action="<?= site_url('/dashboard/importFile_buku') ?>" enctype="multipart/form-data">

                    <?= csrf_field(); ?>
                    <div class="form-group">
                        <label for="file">File:</label>

                        <input type="file" class="form-control" id="file" name="file" />
                        <!-- Error -->
                        <?php if ($validation->getError('file')) { ?>
                            <div class='alert alert-danger mt-2'>
                                <?= $validation->getError('file'); ?>
                            </div>
                        <?php } ?>
                    </div>
                    <input type="submit" class="btn btn-success" name="submit" value="Import CSV">
                </form>
            </div>
            <div class="mid">
                <a href='<?= site_url('/dashboard/exportData_buku') ?>'><button class="btn btn-success">EXPORT DATA</button></a>
                <a href='<?= site_url('/dashboard/printdatabuku') ?>'><button class="btn btn-success">EXPORT DATA PDF</button></a>
            </div>
            <br />
            <br />
        </div>
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">PERINGATAN! PENGHAPUSAN DATA BUKU</h4>
            <p>ADMIN DISANRANKAN MEMBACKUP ATAU MENDOWNLOAD DATA SISWA TERLEBIH DAHULU SEBELUM DI RESET / DI HILANGKEN, KARENA AKSI TIDAK BISA DI KEMBALIKAN LAGI</p>
            <hr>
            <p class="mb-0">DIMOHON HATI HATI DENGAN TOMBOL DIBAWAH INI</p>
        </div>

        <div class="mid-2">
            <a href='<?= site_url('/dashboard/basmi_buku') ?>'>
                <button type="button" class="btn btn-danger">HAPUS SEMUA</button></a>
        </div>
    </div>

</body>

</html>