<!-- Header -->
<?php require('templates/header.php') ?>

<!-- Middleware -->
<?php 
    if($_SESSION['auth'] !== true ){
        header('location:index.php');
    }
?>

    <body class="page-content">
        <!-- Navbar  -->
        <?php require('templates/navbar-auth.php') ?>

        <!-- Content -->
        <div class="container">
            <div class="row justify-content-center mt-5">
                <div class="col-10">
                    <div class="card">
                        <div class="card-body">
                            <!-- Table Kursusku -->
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Kursus</th>
                                        <th>KRS</th>
                                        <th>Jadwal Mulai</th>
                                        <th>Jadwal Akhir</th>
                                        <th>Validasi</th>
                                        <th>Bukti</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <!-- Looping data Kursus-->
                                <?php 
                                    $no = 1;
                                    $id = $_SESSION['id'];
                                    $query = "SELECT * FROM peserta_kursus
                                                WHERE data_mahasiswa_id = '$id' ";
                                    $get = mysqli_query($conn, $query);

                                    while($data = mysqli_fetch_array($get)) :
                                ?>
                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo $data['nama_kursus']?></td>
                                        <td><?php echo $data['krs'] ? '<a href="" class="btn btn-warning">Lihat KRS</a>' : 'Belum diupload' ?></td>
                                        <td><?php echo $data['mulai_kursus']?></td>
                                        <td><?php echo $data['akhir_kursus']?></td>
                                        <td><div <?php echo $data['konfirmasi'] == 'Confirmed' ? 'class="fw-bold text-success"' : 'class="fw-bold text-danger"'?>>
                                        <?php echo $data['konfirmasi'] ?></div></td>
                                        <td><button class="btn btn-primary">Cetak Bukti</button></td>
                                    </tr>
                                <?php endwhile ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
