<?php 
    if(isset($_SESSION['auth'])){
        $id = $_SESSION['id'];

        $query = "SELECT * FROM data_mahasiswa WHERE id = '$id'";
        $get = mysqli_query($conn, $query);

        $data = mysqli_fetch_array($get);
    }else {
        header('location:../index.php');
    }

?>

<nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a href="" class="navbar-brand fw-bold">
                <img src="img/logo-gundar.svg" alt="" />
                Dashboard Admin
            </a>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="index.php" class="nav-link">Kursus</a>
                </li>
                <li class="nav-item">
                    <a href="data-mahasiswa.php" class="nav-link">Data Mahasiswa</a>
                </li>
                <li class="nav-item">
                    <a href="peserta-kursus.php" class="nav-link">Peserta Kursus</a>
                </li>
                <li class="nav-item"><div class="nav-link">Hi, <?php echo $data['nama'] ?>!</div></li>
                <li class="nav-item"><a href="middleware/logout.php" class=" btn btn-primary">Logout</a></li>
            </ul>
        </div>
    </nav>