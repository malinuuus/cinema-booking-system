<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cinema</title>
</head>
<body>
<nav>
    <h1><a href="./index.php" class="text-center">Nazwa kina</a></h1>
    <a href="login.php">zaloguj się</a>
</nav>
<?php
require_once "scripts/connect.php";
$sql = "SELECT s.id, s.row, s.number, c.price FROM seats s INNER JOIN reservations r on r.seat_id = s.id INNER JOIN screenings c ON r.screening_id = c.id INNER JOIN movies m on c.movie_id = m.id where c.price=28.90";
$result = $conn->query($sql);
while ($seats = $result->fetch_assoc()) {
    echo <<< SEAT
        <div>
            <h3><p>Rząd: $seats[row], Miejsce: $seats[number], Cena: $seats[price]</p></h3>
        </div>
    SEAT;
}
?>

<div class="col-7">
    <a href="./login.php" class="text-center">KONTYNUUJ Z LOGOWANIEM</a>
</div>

<div class="col-7">
    <a href="./loginguest.php" class="text-center">KONTYNUUJ JAKO GOŚĆ</a>
</div>

</body>
</html>