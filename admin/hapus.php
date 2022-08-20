<?php 
    require('../config/connection.php');

    if(isset($_POST['btnHapus'])){
        $id = $_GET['id'];

        $query = "DELETE FROM peserta_kursus WHERE id = '$id'";
        $delete = mysqli_query($conn, $query);

        if($delete){
            header('location:peserta-kursus.php');
        }else {
            header('location:peserta-kursus.php');
        }
    }
?>