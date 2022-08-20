<?php 
    $id = $_SESSION['id'];

    $query = "SELECT * FROM data_mahasiswa WHERE id = '$id'";
    $get = mysqli_query($conn, $query);

    $data = mysqli_fetch_array($get);

?>

<nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a href="index.php" class="navbar-brand fw-bold">
                <img src="img/logo-gundar.svg" alt="" />
                Website Pendaftaran Kursus
            </a>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="index.php" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="kursusku.php" class="nav-link">Kursusku</a>
                </li>
                <li class="nav-item"><div class="nav-link">Hi, <?php echo $data['nama'] ?>!</div></li>
                <li class="nav-item"><a href="middleware/logout.php" class=" btn btn-primary">Logout</a></li>
            </ul>
        </div>
    </nav>