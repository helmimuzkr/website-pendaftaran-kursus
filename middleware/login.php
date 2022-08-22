<?php
    /* Mulai Session */
    session_start();


    // Kalau Button Login ditekan, maka jalankan
    if(isset($_POST['login'])) {
        
        // Menginisialisasi variabel baru dengan memberikan nilai dari NAME pada form login
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Cari dari table users, dimana username = variable diatas DAN password = variable diatas
        $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $get = mysqli_query($conn, $query); 

        // Jika ditemukan lebih dari 1 baris, maka
        if(mysqli_num_rows($get) > 0){
            // Membuat variable baru = auth dengan nilai true
            $_SESSION['auth'] = true;
            
            // variable = array($get)
            $get_data = mysqli_fetch_array($get);

            // Jika array dengan nilai ROLE sama dengan admin, maka
            if($get_data['role'] == 'ADMIN') {
                $_SESSION['id'] = $get_data['id'];
                $_SESSION['role'] = $get_data['role'];
                
                header('location:admin/index.php');

            }elseif($get_data['role'] == 'USER') {
                $_SESSION['id'] = $get_data['id'];
                $_SESSION['role'] = $get_data['role'];

                header('location:index.php');
            }
        }else {
            echo('
                <script>
                    alert("data tidak ditemukan");
                </script>
            ');
        }
    }

?>