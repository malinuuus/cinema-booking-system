<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rejestracja</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>
<body class="hold-transition register-page">

<div class="card card-outline card-primary">
    <div class="card-header text-center">
        <a href="index.php" class="text-center">Nazwa kina</a>
    </div>
    <div class="card-body">
        <p class="login-box-msg">Rejestracja użytkownika</p>
        <form action="../scripts/register.php" method="post">

            <div class="input-group mb-3">
                <label for="inputEmail3" class="col-sm-2 control-label">Imię</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Podaj imię" name="firstName">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="input-group mb-3">
                <label for="inputEmail3" class="col-sm-2 control-label">Nazwisko</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Podaj nazwisko" name="lastName">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
            </div>


            <div class="input-group mb-3">
                <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" placeholder="Podaj email" name="email1">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="input-group mb-3">
                <label for="inputEmail3" class="col-sm-2 control-label">Powtórz email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" placeholder="Powtórz email" name="email2">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="input-group mb-3">
                <label for="inputEmail3" class="col-sm-2 control-label">hasło</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" placeholder="Podaj hasło" name="pass1">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="input-group mb-3">
                <label for="inputEmail3" class="col-sm-2 control-label">Powtórz hasło</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" placeholder="Powtórz hasło"
                           name="pass2">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
            </div>

            <!--regumamin-->
            <div class="row">
                <div class="col-7">
                    <div class="icheck-primary">
                        <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                        <label for="agreeTerms">
                            Zatwierdź regulamin <a href="#">Regulamin</a>
                        </label>
                    </div>
                </div>

                <div class="col-5">
                    <button type="submit" class="btn btn-primary btn-block">Rejestracja</button>
                </div>
            </div>
        </form>

        <a href="login.php" class="text-center">Mam już konto</a>
    </div>
</div>
<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
</body>
</html>