<!-- Header -->
<?php require('templates/header.php') ?>

    <body class="">
        <!-- Navbar -->    
        <?php require('templates/navbar-auth.php') ?>
        
        <!-- Update Data -->
        <?php 
            $id = $_GET['id'];

            if(isset($_POST['editMhs'])){
                $npm = $_POST['npm'];
                $kelas = $_POST['kelas'];
                $nama = $_POST['nama'];

                $query = "UPDATE data_mahasiswa SET npm='$npm', kelas='$kelas', 
                                            nama = '$nama' WHERE id = '$id'";
                $post = mysqli_query($conn, $query);
                
                if($post) {
                    echo('Data Berhasil Diubah!');
                    header('location:data-mahasiswa.php');
                }else{
                    echo('Error');
                    header('location:data-mahasiswa.php');
                }
            }
        ?>

        <div class="container">
            <div class="row justify-content-center mt-5">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-body p-5">
                            <form action="" method="POST">
                                <div class="form-group mb-3">
                                    <label for="" class="form-label">NPM</label>
                                    <input type="text" name="npm" class="form-control">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="" class="form-label">Kelas</label>
                                    <input type="text" class="form-control" name="kelas" />
                                </div>
                                <div class="form-group mb-3">
                                    <label for="" class="form-label">Nama</label>
                                    <input type="text" class="form-control" name="nama" />
                                </div>
                                <div class="form-group mb-3 text-end">
                                    <button type="submit" name="editMhs" class="btn btn-primary">Update Data</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
