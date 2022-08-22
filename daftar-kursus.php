<!-- Header -->
<?php require('templates/header.php') ?>

<?php 
    $course_id = $_GET['id'];

    $kursus = getData("SELECT * FROM courses WHERE id = '$course_id'")['0'];
    
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
                        <h3 class="px-4 pt-3"><?php echo $kursus['nama_kursus'] ?></h3>
                        <div class="garis"></div>
                        <div class="px-4 py-3">
                            <p>
                            <?php echo $kursus['description'] ?>
                            </p>
                            <p class="text-secondary m-0">Jadwal Pelatihan</p>
                            <h5><?php echo $kursus['start_course'] ?> - <?php echo $kursus['end_course'] ?></h5>
                        </div>
                        <div class="garis"></div>
                        <div class="px-4 py-3">

                        <!-- Process -->
                        <?php 
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
