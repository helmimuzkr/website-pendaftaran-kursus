<?php 
    require('../config/connection.php');

    $id = $_GET['id'];

    $query = "DELETE FROM data_mahasiswa WHERE id='$id'";
    $delete = mysqli_query($conn, $query);

    if($delete) {
        echo('Data berhasil dihapus!');
        header('location:data-mahasiswa.php');
    }else {
        echo ('error');
        header('location:data-mahasiswa.php');
    }
    
?>