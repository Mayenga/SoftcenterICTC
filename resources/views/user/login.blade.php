<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SoftCenter | Log in 2</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page"
    style="background: url(images/img_bg_1.png); background-repeat: no-repeat; background-size: cover ">
    <div class="login-box">
        <div class="login-logo">
            <a href="/">
                <h3 class="text-white my-1 font-weight-bold rounded py-1" style="background: #106eea">SoftCenter</h3>
            </a>
        </div>
        <!-- /.login-logo -->
        <div class="card elevation-0 rounded">
            <div class="card-body login-card-body rounded">
                <p class="login-box-msg">Sign in to start your session</p>

                <form action="/authenticate" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" required class="form-control" placeholder="Username" name="email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user-circle"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" required class="form-control" placeholder="Password" name="password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                    Remember Me
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="social-auth-links text-center mb-3 mt-4">
                        <button type="submit" class="btn btn-block btn-primary border-0"
                            style="background: rgb(0, 153, 255)">
                            Continue to SoftCenter
                        </button>
                    </div>
                    <div class="social-auth-links text-center mb-3 mt-1">
                        <a href="/" style="font-size: 13px">Back To Website</a>
                    </div>
                    <div class="social-auth-links text-center mb-3 mt-1">
                        <a href="register" style="font-size: 15px">Don't have account</a>
                    </div>
                </form>
                <!-- /.social-auth-links -->

                <p class="mb-1">
                    <a href="/forgot">Forgot password</a>
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
</body>

</html>
