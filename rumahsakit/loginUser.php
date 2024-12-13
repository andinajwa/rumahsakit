<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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

<body class="bg-dark-overlay hold-transition login-page" style="background-image: url('assets/dist/img/bg.jpg'); background-repeat:no-repeat; background-size:cover; background-position:center;">
    <div class="login-box" style="z-index: 20;">
        <!-- /.login-logo -->
        <div class=" card-users card-outline card-warning">
            <div class="card-header text-center">
                <a href="#" class="h1 text-white">Healthcare</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg text-white">Start your session as a <b class="text-primary">Patient</b></p>

                <form action="pages/loginUser/checkLoginUser.php" method="post">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Username | Case Sensitive" name="username">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password | Case Sensitive" name="password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-block btn-primary">
                        Login
                    </button>
                </form>

                <div class="social-auth-links text-center ">
                    <p class="text-white">Do you not have an account yet?</p>
                    <a href="register.php" class="btn btn-block btn-secondary">
                        Register
                    </a>
                </div>

            </div>
        </div>
        <div class="text-center mt-3 text-white">Are you a Doctor? <a href="login.php"><span class="text-success"><b>Login Here</b></span></a>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="assets/dist/js/adminlte.min.js"></script>
</body>

</html>