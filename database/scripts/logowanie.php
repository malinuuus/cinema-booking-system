<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><a href="../index.php" class="text-center">Nazwa kina</a> </title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
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
      <a href="" class="h1"><b><a href="../index.php" class="text-center">Nazwa kina</a></b></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Zaloguj się</p>

      <form action="../scripts/register.php" method="post">


     


        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Podaj email" name="email1">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>


        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Podaj hasło" name="pass1">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>


        <div class="col-5">
            <button type="submit" class="btn btn-primary btn-block">Zaloguj się</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="col-5">
        <p> Nie masz jeszcze konta?    <a href="./rejestracja.php" class="text-center">Zarejestruj się</a></p>
  


