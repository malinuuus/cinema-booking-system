
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Logowanie</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>
<body class="bg-dark hold-transition login-page text-light">
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

<div>
    <?php 
    require_once "header.php"; 
    $redirect = isset($_GET["redirect"]) ? $_GET["redirect"] : "../index.php";
    ?>
    <div class="card-body">
        <form action="scripts/register.php" method="post" class="container p-3">
            <h3 class="login-box-msg mb-4">Logowanie</h3>

            <!-- czy link do przekierowania może być jako parametr w linku? -->
        <form action="./scripts/login.php?redirect=<?php echo $redirect; ?>" method="post">

            <div class="my-3">
                <label for="email1" class="form-label">Email</label>
                <input type="email" class="form-control" placeholder="Podaj email" name="email1" id="email1">
            </div>

            <div class="my-3">
                <label for="pass1" class="form-label">Hasło</label>
                <input type="password" class="form-control" placeholder="Podaj hasło" name="pass1" id="pass1">
            </div>

            <div class="row my-3">
                <div class="col">
                    <button type="submit" class="btn btn-primary btn-block">Zaloguj sie</button>
                </div>
            </div>

            <div class="col-5">
        <p> Nie masz jeszcze konta? <a href="register.php" class="text-center">Zarejestruj się</a></p>
            </div>
        </form>
    </div>
</div>
<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
</body>
</html>