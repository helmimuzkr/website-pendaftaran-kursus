<?php 
// Header
 require('templates/header.php');

    // Middleware
    if($_SESSION['auth'] !== true ){
        header('location:index.php');
    }

    $users_id = $_SESSION['id'];

    $paginate = paginate($users_id);

    $courses = $paginate['result'];

    $totalData = count($courses);
?>

    <body class="page-content">
        <!-- Navbar  -->
        <?php require('templates/navbar-auth.php') ?>

        <!-- Content -->
        <div class="container">
            <div class="row justify-content-center mt-5">
                <div class="col-10">
                    <!-- Table Kursusku -->
                    <div class="card">
                        <div class="card-body">
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
                                    forEach($courses as $item) :
                                ?>
                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo $item['nama_kursus']?></td>
                                        <td><?php echo $item['krs'] ? '<a href="" class="btn btn-warning">Lihat KRS</a>' : 'Belum diupload' ?></td>
                                        <td><?php echo $item['start_course']?></td>
                                        <td><?php echo $item['end_course']?></td>
                                        <td><div <?php echo $item['confirm'] == 'Confirmed' ? 'class="fw-bold text-success"' : 'class="fw-bold text-danger"'?>>
                                        <?php echo $item['confirm'] ?></div></td>
                                        <td><button class="btn btn-primary">Cetak Bukti</button></td>
                                    </tr>
                                <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- Pagination -->
                    <div class="d-flex mt-3">
                        <?php 
                            echo "
                                    <p class='fw-semibold text-white'>Showing ". $paginate["dataAwal"] + 1 ." to ". 
                                    $paginate["dataAwal"] + $totalData ." of $paginate[totalData] entries</p>
                            ";
                        ?>  
                        <div class="ms-auto">
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
                                        <?php if($totalData < $paginate['dataPerPage']) : ?>
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
