<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Płatność</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
    
</head>
<body class="bg-dark hold-transition payment-page text-light">
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
    require_once "header.php"; ?>
    <div class="bg-dark content px-5 py-4">
    <div class="bg-dark text-light">
    <div class="card-body">
        <h4 class="login-box-msg ml-4">METODY PŁATNOŚCI</h4>
        <form action="scripts/payment.php" method="post">      

            <div class="form-check my-3">
              <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1">
              <label class="form-check-label" for="gridRadios1">
                BLIK
              </label>
            </div>

            <div class="form-check my-3">
              <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
              <label class="form-check-label" for="gridRadios2">
                karta płatnicza
              </label>
            </div>

            <div class="form-check my-3">
              <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios3" value="option3">
              <label class="form-check-label" for="gridRadios3">
                szybki przelew
              </label>
            </div>

            <div class="form-check my-3">
              <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios4" value="option4">
              <label class="form-check-label" for="gridRadios4">
                PAYPAL
              </label>
            </div>


            <div class="my-3">
                <button type="submit" class="btn btn-primary btn-block">Płacę</button>
            </div>
        </form>

    </div>
</div>
</body>
</html>
