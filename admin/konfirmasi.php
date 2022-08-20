<!-- Confirmation -->
<?php 
    require('../config/connection.php');

    if(isset($_POST['btnKonfirmasi'])){
        $id = $_GET['id'];

        $query = "UPDATE peserta_kursus SET konfirmasi='Confirmed' WHERE id = '$id'";
        $update = mysqli_query($conn, $query);

        if($update){
            header('location:peserta-kursus.php');
        }
    }
?>