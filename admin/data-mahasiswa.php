<?php require('templates/header.php')?>


    <body class="">
        <?php require('templates/navbar-auth.php')?>

        <!-- Table Kursus -->
        <div class="container">
            <div class="row justify-content-center mt-5">
                <div class="col-md-10">
                    <div class="text-end mb-3">
                        <a href="tambah-data-mahasiswa.php" class="btn btn-primary" name='tambahMhs'>Tambah Data Mahasiswa</a>
                    </div>
                    <table class="table table-bordered table-striped align-middle">
                        <thead>
                            <tr class="">
                                <th>No</th>
                                <th>NPM</th>
                                <th>Kelas</th>
                                <th>Nama</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $NO=1;
                                $query="SELECT * FROM data_mahasiswa";
                                $get= mysqli_query($conn, $query);
                                while($data= mysqli_fetch_array($get)):
                                    if($data['role'] !== 'ADMIN') {
                            ?>
                                        <tr>
                                            <td><?php echo $NO++?></td>
                                            <td><?php echo $data['npm']?></td>
                                            <td><?php echo $data['kelas']?></td>
                                            <td><?php echo $data['nama']?></td>
                                            <td>
                                                <div class="text-center">
                                                    <a href="edit-data-mahasiswa.php?id=<?php echo $data['id']?>" class="btn btn-primary" name='editMhs'>Edit</a>
                                                    <a href="hapus-mahasiswa.php?id=<?php echo $data['id']?>" name='hapusMhs' class="btn btn-danger">Hapus</a>
                                                </div>
                                            </td>
                                        </tr>
                            <?php } ?>
                            <?php endwhile?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>
