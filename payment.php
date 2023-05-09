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
        <p class="login-box-msg">METODY PŁATNOŚCI</p>
        <form action="../scripts/payment.php" method="post">

        <div class="input-group">
                <div class="input-box">
                    <input type="radio" name="pay" id="bc1" checked class="radio">
                    <label for="bc1"><span><i class="fa fa-cc-visa"></i> BLIK</span></label><br>
                    <br><input type="radio" name="pay" id="bc2" class="radio">
                    <label for="bc2"><span><i class="fa fa-cc-paypal"></i> karta płatnicza</span></label><br>
                    <br><input type="radio" name="pay" id="bc3" checked class="radio">
                    <label for="bc3"><span><i class="fa fa-cc-visa"></i> szybki przelew</span></label><br>
                    <br><input type="radio" name="pay" id="bc4" checked class="radio">
                    <label for="bc4"><span><i class="fa fa-cc-visa"></i> PAYPAL</span></label>
                </div>
            </div>

                <div class="col-5">
                    <br><button type="submit" class="btn btn-primary btn-block">Płacę</button>
                </div>
        </form>

    </div>
</div>
</body>
</html>
