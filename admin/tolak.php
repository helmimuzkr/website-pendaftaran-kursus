<?php 
    require('../config/connection.php');

    if(isset($_POST['btnTolak'])){
        $id = $_GET['id'];

        $query = "UPDATE peserta_kursus SET konfirmasi='Tolak' WHERE id = '$id'";
        $update = mysqli_query($conn, $query);

        if($update){
            header('location:peserta-kursus.php');
        }
    }
?>