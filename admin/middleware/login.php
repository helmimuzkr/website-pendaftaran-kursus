<?php
    session_start();

    $server = "localhost";
    $username = "root";
    $password = "";
    $db_name = "jewepe";

    $conn = new mysqli($server, $username, $password, $db_name);

    if(isset($_POST['login'])) {
        
        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = "SELECT * FROM data_mahasiswa WHERE username='$username' AND password='$password'";
        $get = mysqli_query($conn, $query);

        if(mysqli_num_rows($get) > 0){

            $_SESSION['auth'] = true;
            
            $get_data = mysqli_fetch_array($get);

            if($get_data['role'] == 'ADMIN') {
                $_SESSION['id'] = $get_data['id'];
                $_SESSION['role'] = $get_data['role'];

                header('location:index.php');

            }elseif($get_data['role'] == 'USER') {
                $_SESSION['id'] = $get_data['id'];
                $_SESSION[''] = $get_data['id'];
                $_SESSION['role'] = $get_data['role'];

                header('location:index.php');
            }


        }else {
            echo('
                alert("data tidak ditemukan");
            ');
        }
    }

?>