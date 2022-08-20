<!-- Header -->
<?php require('templates/header.php') ?>

<?php 
    $id_kursus = $_GET['id'];

    $query = "SELECT * FROM kursus WHERE id = '$id_kursus'";
    $get = mysqli_query($conn, $query);

    $data_kursus = mysqli_fetch_array($get);

?>

    <body class="page-content">
        <!-- Navbar -->
        <?php 
        if(isset($_SESSION['auth'])){
            require('templates/navbar-auth.php');
        }else{
            require('templates/navbar.php');
        }
    ?>
        <!-- Daftar Kursus -->
        <div class="container">
            <div class="row justify-content-center mt-5">
                <div class="col-5">
                    <div class="card">
                        <h3 class="px-4 pt-3"><?php echo $data_kursus['nama_kursus'] ?></h3>
                        <div class="garis"></div>
                        <div class="px-4 py-3">
                            <p>
                            <?php echo $data_kursus['keterangan'] ?>
                            </p>
                            <p class="text-secondary m-0">Jadwal Pelatihan</p>
                            <h5><?php echo $data_kursus['mulai_kursus'] ?> - <?php echo $data_kursus['akhir_kursus'] ?></h5>
                        </div>
                        <div class="garis"></div>
                        <div class="px-4 py-3">

                        <!-- Process -->
                        <?php 
                            if(isset($_POST['daftar_kursus'])) {

                                /* Jika sudah login, maka*/
                                if(isset($_SESSION['auth'])) {
                                    /* Ambil Data mahasiswa */
                                    $id_mahasiswa = $_SESSION['id'];
                                    $query_get_mahasiswa = "SELECT * FROM data_mahasiswa WHERE id='$id_mahasiswa'";
                                    $get_data_mahasiswa = mysqli_query($conn, $query_get_mahasiswa);
                                    $data_mahasiswa = mysqli_fetch_array($get_data_mahasiswa);

                                    /* POST ke peserta_kursus */
                                    $nama = $data_mahasiswa['nama'];
                                    $npm = $data_mahasiswa['npm'];
                                    $nama_kursus = $data_kursus['nama_kursus'];
                                    $keterangan = $data_kursus['keterangan'];
                                    $mulai_kursus = $data_kursus['mulai_kursus'];
                                    $akhir_kursus = $data_kursus['akhir_kursus'];
                                    $krs = $_POST['krs'];
                                    $konfirmasi = 'Belum dikonfirmasi';

                                    $query = "INSERT INTO peserta_kursus (data_mahasiswa_id, npm, nama, nama_kursus, keterangan, mulai_kursus, akhir_kursus, krs, konfirmasi)
                                                VALUES ('$id_mahasiswa', '$npm', '$nama', '$nama_kursus', '$keterangan', '$mulai_kursus', '$akhir_kursus', '$krs', '$konfirmasi')";
                                    $query_run = mysqli_query($conn, $query);

                                    if(isset($query_run)) {
                                        echo '
                                        <script>
                                            alert("Berhasil Mendaftar");
                                            document.location="kursusku.php";
                                        </script>
                                    ';
                                    }else {
                                        echo 'error';
                                    }
                                }else {
                                    /* Kalau belum login, maka */
                                    echo ('
                                            <script>
                                                alert("Belum Melakukan Login")
                                                document.location="login.php";
                                            </script>
                                    ');
                                }

                            }
                        ?>

                            <form action="" method="POST">
                                <div class="form-group">
                                    <label for="" class="form-label fw-bold">Uplaod KRS Aktif</label>
                                    <input type="file" name="krs" id="" class="form-control" accept="image/jpeg, image/jpg, image/png"/>
                                </div>
                                <div class="text-end mt-3">
                                    <button type="submit" class="btn btn-primary" name="daftar_kursus" >Daftar Kursus</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
