
<!DOCTYPE html>
<html lang="en">
<?php require_once "header.php" ?>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="<?php echo $ruta; ?>index2.html"><b>Admin</b>LTE</a>
        </div>

        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>
                <form method="post" id="formulariologin">
                    <div class="input-group mb-3">
                        <input type="text" id="login" class="form-control" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" id="clave" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>

                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>

                    </div>
                </form>
                
                <p class="mb-1">
                    <a href="forgot-password.html">I forgot my password</a>
                </p>
                <p class="mb-0">
                    <a href="register.html" class="text-center">Register a new membership</a>
                </p>
            </div>

        </div>
    </div>
    <script src="<?php echo $ruta; ?>plugins/jquery/jquery.min.js"></script>

<script src="<?php echo $ruta; ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="<?php echo $ruta; ?>dist/js/adminlte.min.js?v=3.2.0"></script>
    <script type="text/javascript" src="../vistas/codigosjs/login.js"></script>
</body>

</html>