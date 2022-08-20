<!-- Header -->
<?php require('templates/header.php') ?>

    <body class="">
        <!-- Navbar -->    
        <?php require('templates/navbar-auth.php') ?>

        <!-- Table Kursus -->
        <div class="container">
            <div class="row justify-content-center mt-5">
                <div class="col-md-10">
                    <div class="text-end mb-3">
                        <a href="tambah-kursus.php" class="btn btn-primary">Tambah Kursus</a>
                    </div>
                    <table class="table table-bordered table-striped align-middle">
                        <thead>
                            <tr class="">
                                <th>No</th>
                                <th>Nama Kursus</th>
                                <th>Keterangan</th>
                                <th>Mulai Kursus</th>
                                <th>Akhir Kursus</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $no = 1;
                                $query = "SELECT * FROM kursus ORDER BY id DESC";
                                $get = mysqli_query($conn, $query);

                                while($data = mysqli_fetch_array($get)) :
                            ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $data['nama_kursus'] ?></td>
                                <td><?php echo $data['nama_kursus'] ? "Sudah Terisi" : "Belum Diisi" ?></td>
                                <td><?php echo $data['mulai_kursus'] ?></td>
                                <td><?php echo $data['akhir_kursus'] ?></td>
                                <td>
                                    <div class="text-center">
                                        <a href="edit-kursus.php?id=<?= $data['id'] ?>" class="btn btn-primary">Edit</a>
                                        <a href="hapus-kursus.php?id=<?= $data['id'] ?>" class="btn btn-danger">Hapus</a>
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
