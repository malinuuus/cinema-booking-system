<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cinema</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>
<body class="bg-dark hold-transition register-page text-light">
  <?php require_once "header.php"; ?>
<div class="content px-5 py-4">
<?php


if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once "scripts/connect.php";
$sql = "SELECT m.id, m.title, m.duration, s.hall_number, s.is_subtitles, s.date, s.time FROM movies m INNER JOIN screenings s ON m.id = s.movie_id where s.id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $_SESSION['screening_id']);
$stmt->execute();
$movie = $stmt->get_result()->fetch_assoc();

echo <<< MOVIE
<div>
  <h3>Podsumowanie</h3><br>
  <p>tytuł filmu: $movie[title] $movie[is_subtitles]</p>
  <p>czas trwania: $movie[duration] min</p>
  <p>numer sali: $movie[hall_number] </p>
  <p>$movie[date] $movie[time]</p>
</div>
MOVIE;

$selectedSeats = explode(',', $_SESSION["selectedSeats"]);

foreach ($selectedSeats as $seatId) {
    $sql = "SELECT row, number FROM seats WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $seatId);
    $stmt->execute();
    $seat = $stmt->get_result()->fetch_assoc();

    echo <<< SEAT
        <div>
            <p>Rząd: $seat[row], Miejsce: $seat[number]</p>
        </div>
    SEAT;
}
?>

<div class="col-7">
    <a href="./login.php?redirect=../payment.php" class="text-center">KONTYNUUJ Z LOGOWANIEM</a>
</div>

<div class="col-7">
    <a href="./loginguest.php" class="text-center">KONTYNUUJ JAKO GOŚĆ</a>
</div>

<div class="col-7">
    <a href="./payment.php" class="text-center">PŁATNOŚĆ</a>
</div>

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
</body>
</html>

</body>
</html>

