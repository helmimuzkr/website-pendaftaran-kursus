<!-- Header -->
<?php require('templates/header.php') ?>

    <body class="">
        <!-- Navbar -->
        <?php require('templates/navbar-auth.php') ?>

        <!-- Table Kursus -->
        <div class="container">
            <div class="row justify-content-center mt-5">
                <div class="col-md-11">
                    <div class="text-end mb-3">
                        <a href="" class="btn btn-primary">Cetak Laporan</a>
                    </div>
                    <table class="table table-bordered table-striped align-middle">
                        <thead>
                            <tr class="">
                                <th>No</th>
                                <th>NPM</th>
                                <th>Nama</th>
                                <th>Materi Kursus</th>
                                <th>KRS</th>
                                <th>Mulai Kursus</th>
                                <th>Akhir Kursus</th>
                                <th>Validasi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $no = 1;
                                $query = "SELECT * FROM peserta_kursus ORDER BY id DESC";
                                $get = mysqli_query($conn, $query);

                                while($data = mysqli_fetch_array($get)) :
                            ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $data['npm'] ?></td>
                                <td><?php echo $data['nama'] ?></td>
                                <td><?php echo $data['nama_kursus'] ?></td>
                                <td><?php echo $data['krs'] ? '<a href="" class="btn btn-warning">Lihat KRS</a>' : 'Belum diupload' ?></td>
                                <td><div class=""><?php echo $data['mulai_kursus'] ?></div></td>
                                <td><div class=""><?php echo $data['akhir_kursus'] ?></div></td>
                                <td><div <?php echo $data['konfirmasi'] == 'Confirmed' ? 'class="fw-bold text-success"' : 'class="fw-bold text-danger"'?> ><?php echo $data['konfirmasi'] ?></div></td>
                                <td>
                                    <div class="d-flex justify-content-between">
                                        <form class="" action="konfirmasi.php?id=<?php echo $data['id']?>" method="POST">
                                            <button type="submit" class="btn btn-primary" name="btnKonfirmasi" <?php echo $data['konfirmasi'] == 'Confirmed' ? 'disabled': ''?>>Konfirmasi</button>
                                        </form>
                                        <form class="" action="tolak.php?id=<?php echo $data['id']?>" method="POST">
                                            <button type="submit" class="btn btn-danger" name="btnTolak" <?php echo $data['konfirmasi'] == 'Tolak' ? 'disabled': ''?>>Tolak</button>
                                        </form>
                                        <form class="" action="hapus.php?id=<?php echo $data['id']?>" method="POST">
                                            <button type="submit" class="btn btn-danger" name="btnHapus">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            <?php endwhile ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>
