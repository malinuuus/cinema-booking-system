<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Logowanie</title>
</head>
<body class="hold-transition login-page">
<div class="card card-outline card-primary">
    <div class="card-header text-center">
        <a href="index.php" class="text-center">Nazwa kina</a>
    </div>
    <div class="card-body">
        <h4> Zaloguj się </h4>
        

        <form action="../scripts/register.php" method="post">

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
                <label for="inputPassword3" class="col-sm-2 control-label">Hasło</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" placeholder="Podaj hasło" name="pass1">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-7">
                <button type="submit" class="btn btn-primary btn-block">Zaloguj się</button>
            </div>
        </form>
    </div>

    <div class="col-5">
        <p> Nie masz jeszcze konta? <a href="register.php" class="text-center">Zarejestruj się</a></p>
    </div>
</div>
</body>
</html>