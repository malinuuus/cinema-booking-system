<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body class="hold-transition login-page">
<div class="card card-outline card-primary">
    <div class="card-header text-center">
        <a href="index.php" class="text-center">Nazwa kina</a>
    </div>
    <div class="card-body">
        <p class="login-box-msg">Kontynuuj jako gość</p>
        <form action="payment.php" method="post">

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
                <br><label for="inputEmail3" class="col-sm-2 control-label">Nazwisko</label>
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
                <br><label for="inputEmail3" class="col-sm-2 control-label">Email</label>
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
                <br><label for="inputEmail3" class="col-sm-2 control-label">Powtórz email</label>
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
                     <br><button type="submit" class="btn btn-primary btn-block">Kontynuuj</button>
                <!----/form---->
                </div>
            </div>
        </form>

    </div>
</div>
</body>
</html>
