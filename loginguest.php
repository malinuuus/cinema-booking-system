<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kontynuuj jako gość</title>
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
<body class="hold-transition login-page">
<?php
if (isset($_SESSION["error"])) {
    echo <<< ERROR
       <div class="alert alert-danger alert-dismissible"> 
           <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
           <h5><i class="icon fas fa-ban"></i>Uwaga!</h5>
           $_SESSION[error]
       </div>
    ERROR;
    unset($_SESSION ["error"]);
}

if (isset($_SESSION["success"])) {
    echo <<< ERROR
       <div class="alert alert-success alert-dismissible"> 
           <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
           <h5><i class="icon fas fa-check"></i>Komunikat!</h5>
           $_SESSION[success]
       </div>
    ERROR;
    unset($_SESSION["success"]);
}
?>
<div class="card card-outline card-primary">
    <?php require_once "header.php"; ?>
    <div class="card-body">
        <p class="login-box-msg">Kontynuuj jako gość</p>
        <form action="scripts/loginguest.php" method="post">
    
            <div class="input-group mb-3">
                <label for="inputEmail3" class="col-sm-2 control-label">Imię</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Podaj imię" name="first_name">
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
                    <input type="text" class="form-control" placeholder="Podaj nazwisko" name="last_name">
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

            <div class="col-5">
                <!-----form action="payment.php"---->
                <button type="submit" class="btn btn-primary btn-block">Kontynuuj</button>
                <!----/form---->
            </div>
        </form>
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
