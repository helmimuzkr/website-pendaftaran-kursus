<!-- Connection -->
<?php require('../config/connection.php') ?>

<!-- Login -->
<?php require('middleware/login.php') ?>

<!-- Middleware -->
<?php
    if(isset($_SESSION['auth'])) {
        
    }else{
        header('location../index.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <!-- CSS -->
        <link rel="stylesheet" href="../css/style.css" />

        <!-- Bootstrap 5 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
            crossorigin="anonymous"
        />

        <title>Jewepe</title>
    </head>