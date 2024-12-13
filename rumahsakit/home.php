<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Heathcare</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="hold-transition login-page"
    style="background-color: #ffffff;">

    <div class="home-page h-100 w-100" style=" width: 100% !important; position:relative;
    height: 100vh !important;
    background-image: url('assets/dist/img/bg.jpg') !important; background-position: center; background-size:cover;
">
        <div class="bg-dark-overlay h-100 container-fluid flex flex-col justify-center items-center text-white p-5">
            <h1 class="font-weight-bold mb-3" style="z-index: 50;">healthcare appointment and management system</h1>
            <div class="flex justify-content-center gap-2 text-black" style="z-index: 50;">
                <!-- pasien -->
                <div class="card card-users mx-3" style="width: 18rem;">
                    <a href="loginUser.php" class="card-body flex flex-col items-center justify-content-center">
                        <i class="fas fa-user fa-fw mb-3 text-primary text-warning" style="font-size: 34px;"></i> 
                        <h5 class="card-title text-white">Login Sebagai Pasien</h5>
                    </a>
                </div>
                <!-- doctor and admin -->
                <a href="login.php" class="card text-black card-users" style="width: 18rem;">
                    <div class="card-body flex flex-col items-center justify-content-center">
                        <i class="fas fa-user-nurse fa-fw mb-3 text-success" style="font-size: 34px;"></i>
                        <h5 class="card-title text-white">Login Sebagai Dokter</h5>
                    </div>
                </a>
            </div>
        </div>

    </div>

    <!-- jQuery -->
    <script src="assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="assets/dist/js/adminlte.min.js"></script>
</body>

</html>