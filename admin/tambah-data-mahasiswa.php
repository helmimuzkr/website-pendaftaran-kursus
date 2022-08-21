<!-- Header -->
<?php require('templates/header.php') ?>

    <body class="">
        <!-- Navbar -->    
        <?php require('templates/navbar-auth.php') ?>

        <!-- Tambah -->
        <?php 
            if(isset($_POST['tambahMhs'])){
                $npm = $_POST['npm'];
                $kelas = $_POST['kelas'];
                $nama = $_POST['nama'];

                $query = "INSERT INTO data_mahasiswa (npm, kelas, nama)
                            VALUE ('$npm', '$kelas', '$nama')";
                $post = mysqli_query($conn, $query);
                
                if($post) {
                    
                    echo('Data Berhasil Ditambahkan!');
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
                                    <textarea class="form-control" name="kelas" ></textarea>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="" class="form-label">Nama</label>
                                    <textarea class="form-control" name="nama" ></textarea>
                                </div>
                                
                                <div class="form-group mb-3 text-end">
                                    <button type="submit" name="tambahMhs" class="btn btn-primary">Tambah Data</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
