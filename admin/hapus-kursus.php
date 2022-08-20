<?php 
    require('../config/connection.php');

    $id = $_GET['id'];

    $query = "DELETE FROM kursus WHERE id='$id'";
    $delete = mysqli_query($conn, $query);

    if($delete) {
        echo('Data berhasil dihapus!');
        header('location:index.php');
    }else {
        echo ('error');
        header('location:index.php');
    }
    
?>