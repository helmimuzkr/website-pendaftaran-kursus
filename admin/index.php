<!-- Header -->
<?php require('templates/header.php') ?>

<?php 
    /* set session keyword null ketika menekan refresh button */
    if(isset($_POST['btnRefresh'])) {
        $_SESSION['keyword'] = null;
    }

    /* cek data yang dicari */
    if(isset($_POST['btnCari'])) {
        $_SESSION['keyword'] = null;
        $searchCheck = search($_POST['keyword']);

        if(mysqli_num_rows($searchCheck) > 0){
            $_SESSION['keyword'] = $_POST['keyword'];
        }else {
            echo '
                <script>
                    alert("data tidak ditemukan");
                    window.location.href="index.php";
                </script>
            ';
            $_SESSION['keyword'] = null;
        }
    }

    /* Mengambil data dari fungsi paginate */
    $paginate = (isset($_SESSION['keyword'])) ? paginate($_SESSION['keyword']) : paginate();

    /* Insialisasi hasil query kedalam variabel kursus*/
    $kursus = $paginate['result'];

    /* saat mencari data di posisi current page active lalu data ditemukan tetapi = 0, maka paksa redirect ke page 1 */
    if(mysqli_num_rows($kursus) == 0){
        header("location:?page=1");
    }

?>

    <body class="">
        <!-- Navbar -->    
        <?php require('templates/navbar-auth.php') ?>

        <!-- Table Kursus -->
        <div class="container">
            <div class="row justify-content-center mt-5">
                <div class="col-md-10">
                    <div class="row mb-3 justify-content-between align-items-center">
                        <div class="col-md-6">
                            <div class="d-flex">
                                <a href="tambah-kursus.php" class="btn btn-primary px-4 me-2">Tambah</a>
                                <form method="post">
                                    <button type="submit" class="btn btn-primary " name="btnRefresh">Refresh Table</button>
                                </form>
                            </div>
                        </div>
                        <form action="" method="POST" class="col-md-4 d-flex">
                            <span class="m-auto me-2">Search: </span>
                            <input class="form-control" name="keyword"  type="search"  autocomplete="off">
                            <button type="submit" class="btn btn-primary px-4 me-2" name="btnCari" hidden>Cari</button>
                        </form>

                    </div>
                    <!-- Table -->
                    <div class="row mb-2">
                        <div class="col-md-12">
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
                                        $no = 1 + $paginate['dataAwal'];
                                        while($item = mysqli_fetch_assoc($kursus)) :
                                    ?>
                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo $item['nama_kursus'] ?></td>
                                        <td><?php echo $item['keterangan'] ? "Sudah Terisi" : "Belum Diisi" ?></td>
                                        <td><?php echo $item['mulai_kursus'] ?></td>
                                        <td><?php echo $item['akhir_kursus'] ?></td>
                                        <td>
                                            <div class="text-center">
                                                <a href="edit-kursus.php?id=<?= $item['id'] ?>" class="btn btn-primary">Edit</a>
                                                <a href="hapus-kursus.php?id=<?= $item['id'] ?>" class="btn btn-danger">Hapus</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endwhile ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- Pagination -->
                    <div class="row justify-content-between">
                        <div class="col-md-6">
                        <?php 
                            echo "
                                    <p>Showing ". $paginate["dataAwal"] + 1 ." to ". $paginate["dataAwal"] + mysqli_num_rows($kursus) ." of $paginate[totalData] entries</p>
                            ";
                        ?>
                            
                        </div>
                        <div class="col-md-2">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                    <li class="page-item <?= ($paginate['currentPage'] == 1) ? 'disabled' : ''?>">
                                        <a class="page-link" href="?page=<?= $paginate['currentPage'] - 1 ?>" aria-label="Previous" >
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                    <?php for($i = $paginate['startPageNum']; $i <= $paginate['endPageNum']; $i++) : ?>
                                        <?php if($paginate['currentPage'] == $i) :?>
                                            <li class="page-item active ">
                                                <div class="page-link">
                                                    <?= $i ?>
                                                </div>
                                            </li>
                                        <?php else :?>
                                            <li class="page-item">
                                                <a class="page-link" href="?page=<?= $i ?>">
                                                    <?= $i ?>
                                                </a>
                                            </li>
                                        <?php endif; ?>
                                    <?php endfor; ?>
                                    <?php if($paginate['currentPage']) : ?>
                                        <?php if(mysqli_num_rows($kursus) < $paginate['dataPerPage']) : ?>
                                            <li class="page-item disabled">
                                                <a class="page-link" href="?page=<?= $paginate['currentPage'] + 1 ?>" aria-label="Previous" >
                                                    <span aria-hidden="true">&raquo;</span>
                                                </a>
                                            </li>
                                        <?php else : ?>
                                            <li class="page-item <?= ($paginate['currentPage'] == $paginate['totalPages']) ? 'disabled' : ''?>">
                                                <a class="page-link" href="?page=<?= $paginate['currentPage'] + 1 ?>" aria-label="Previous" >
                                                    <span aria-hidden="true">&raquo;</span>
                                                </a>
                                            </li>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
