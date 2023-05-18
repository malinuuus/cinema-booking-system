<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Logowanie</title>

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
        <h4> Zaloguj się </h4>


        <form action="./scripts/login.php" method="post">

            <div class="input-group mb-3">
                <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" placeholder="Podaj email" name="email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="input-group mb-3">
                <label for="inputPassword3" class="col-sm-2 control-label">Hasło</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" placeholder="Podaj hasło" name="pass">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-7">
                <button type="submit" class="btn btn-primary btn-block">Zaloguj</button>
            </div>
        </form>
    </div>

    <div class="col-5">
        <p> Nie masz jeszcze konta? <a href="register.php" class="text-center">Zarejestruj się</a></p>
    </div>
</div>
</body>
</html>