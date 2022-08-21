<!-- Header -->
<?php require('templates/header.php') ?>

    <body class="">
        <!-- Navbar -->    
        <?php require('templates/navbar-auth.php') ?>

        <!-- Tambah -->
        <?php 
            if(isset($_POST['tambah'])){
                $_SESSION['keyword'] = null;
                $nama = $_POST['nama_kursus'];
                $keterangan = $_POST['keterangan'];
                $mulai_kursus = $_POST['mulai_kursus'];
                $akhir_kursus = $_POST['akhir_kursus'];

                $query = "INSERT INTO kursus (nama_kursus, keterangan, mulai_kursus, akhir_kursus)
                            VALUE ('$nama', '$keterangan', '$mulai_kursus', '$akhir_kursus')";
                $post = mysqli_query($conn, $query);
                
                if($post) {
                    echo '
                        <script>
                            alert("Data berhasil ditambahkan!");
                            location.replace("index.php");
                        </script>
                    ';
                }else{
                    echo '
                        <script>
                            alert("Gagal menambahkan data!");
                            location.replace("index.php");
                        </script>
                    ';
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
                                    <label for="" class="form-label">Nama Kursus</label>
                                    <input type="text" name="nama_kursus" class="form-control">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="" class="form-label">Keterangan</label>
                                    <textarea class="form-control" name="keterangan" ></textarea>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="" class="form-label me-3">Mulai Kursus</label>
                                    <input type="date" name="mulai_kursus" placeholder="dd-mm-yyyy" value="">
                                    <label for="" class="form-label ms-5 me-3">Akhir Kursus</label>
                                    <input type="date" name="akhir_kursus" placeholder="dd-mm-yyyy" value="">
                                </div>
                                <div class="form-group mb-3 text-end">
                                    <button type="submit" name="tambah" class="btn btn-primary">Tambah Data</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
