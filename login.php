<!-- Header -->
<?php require('templates/header.php') ?>


    <body class="page-content">
        <!-- Navbar -->
        <?php 
            if(isset($_SESSION['auth'])){
                require('templates/navbar-auth.php');
            }else{
                require('templates/navbar.php');
            }
        ?>

        <!-- Form Login -->
        <div class="container">
            <div class="row justify-content-center mt-5">
                <div class="col-5">
                    <div class="card px-5">
                        <div class="card-body p-4">
                            <div class="text-center my-3">
                                <h1>Login</h1>
                            </div>
                            <form action="" method="POST">
                                <div class="form-group mb-3">
                                    <label for="" class="form-label">NPM</label>
                                    <input type="text" class="form-control"name="username"/>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="" class="form-label">Password</label>
                                    <input type="password" class="form-control" name="password" required />
                                </div>
                                <div class="text-end mb-3">
                                    <button type="submit" class="btn btn-primary px-4 py-2" name="login">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
