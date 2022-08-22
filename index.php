<!-- Header-->
<?php require('templates/header.php') ?>

    <body class="">

    <!-- Navbar -->
    <?php 
        if(isset($_SESSION['auth'])){
            require('templates/navbar-auth.php');
        }else{
            require('templates/navbar.php');
        }
    ?>

        <div class="container">
            <!-- Hero -->
            <div class="row mt-3 mb-5">
                <div class="col">
                    <img src="img/hero-gunadarma.png" alt="" class="w-100" />
                </div>
            </div>
            
            <!-- Pilihan Kursus -->
            <div class="row my-2">
                <div class="col">
                    <div class="text-center">
                        <h2 class="fw-bold">Kursus</h2>
                    </div>
                    <div class="row">
                        <?php 
                            $items = getData("SELECT * FROM courses ORDER BY id DESC");

                            forEach($items as $item) :
                        ?>
                        <div class="col-md-4 mt-3">
                            <div class="card kursus">
                                <h3 class="px-4 pt-3"><?php echo $item['nama_kursus'] ?></h3>
                                <div class="garis"></div>
                                <div class="card-body px-4">
                                    <p class="card-title">Jadwal Pelatihan</p>
                                    <p class="card-title"><?= $item['start_course'] ?> s/d <?php echo $item['end_course'] ?></p>
                                    <div class="text-end mt-2">
                                        <a href="daftar-kursus.php?id=<?= $item['id'] ?>" class="btn btn-primary">Daftar Kursus</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
