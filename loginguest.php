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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>
<body class="bg-dark hold-transition loginquest-page text-light">
  <?php require_once "header.php"; ?>
<div class="bg-dark content px-5 py-4">
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
    <div class="bg-dark text-light">
    <div class="card-body">
        <h3 class="login-box-msg">Kontynuuj jako gość</h3>
        <form action="scripts/loginguest.php" method="post">
    
            <div class="my-3">
                <label for="first_name" class="form-label">Imię</label>
                <input type="text" class="form-control" placeholder="Podaj imię" name="first_name" id="first_name">
            </div>

            <div class="my-3">
                <label for="last_name" class="form-label">Nazwisko</label>
                <input type="text" class="form-control" placeholder="Podaj nazwisko" name="last_name" id="last_name">
            </div>



            <div class="my-3">
                <label for="email1" class="form-label">Email</label>
                <input type="email" class="form-control" placeholder="Podaj email" name="email1" id="email1">
            </div>


            <div class="my-3">
                <label for="email2" class="form-label">Powtórz email</label>
                <input type="email" class="form-control" placeholder="Powtórz email" name="email2" id="email2">
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
