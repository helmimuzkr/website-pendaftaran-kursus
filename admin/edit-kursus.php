<!-- Header -->
<?php require('templates/header.php') ?>

    <body class="">
        <!-- Navbar -->    
        <?php require('templates/navbar-auth.php') ?>

        <!-- Logic -->
        <?php 
            $id = $_GET['id'];

            if(isset($_POST['tambah'])){
                $nama = $_POST['nama_kursus'];
                $keterangan = $_POST['keterangan'];
                $mulai_kursus = $_POST['mulai_kursus'];
                $akhir_kursus = $_POST['akhir_kursus'];

                $query = "UPDATE kursus SET nama_kursus='$nama', keterangan='$keterangan', 
                                            mulai_kursus = '$mulai_kursus', akhir_kursus = '$akhir_kursus' 
                                        WHERE id = '$id'";
                $post = mysqli_query($conn, $query);
                
                if($post) {
                    echo('Data Berhasil Diubah!');
                    header('location:index.php');
                }else{
                    echo('Error');
                    header('location:index.php');
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
                                    <button type="submit" name="tambah" class="btn btn-primary">Update Data</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
