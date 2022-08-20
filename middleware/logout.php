<?php 
    session_start();
    /* Session destroy untuk mematikan dan menghilangkan memori session */
    session_destroy();

    header('location:../index.php');
?>