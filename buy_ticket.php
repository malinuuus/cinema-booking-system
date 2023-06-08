<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cinema</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body   class="bg-dark hold-transition register-page text-light">
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
$subtitles = $movie["is_subtitles"] ? "napisy" : "bez napisów";

echo <<< MOVIE
<div>
  <h3>Podsumowanie</h3>
  <h3 class="my-3">$movie[title] | $subtitles</h3>
  <p class="my-1">czas trwania: $movie[duration] min</p>
  <p class="my-1">numer sali: $movie[hall_number]</p>
  <p class="mt-1 mb-3">$movie[date] $movie[time]</p>
</div>
MOVIE;

require_once "./scripts/get_selected_seats.php";

if (isset($_SESSION["user_id"])){
    echo <<< LOGGED
        <div class="mt-4">
          <a href="./payment.php" class="text-center">PŁATNOŚĆ</a>
        </div>
    LOGGED;
} else {
    echo <<< NOTLOGGED
    <div class="mt-4">
      <a href="./login.php?redirect=../payment.php" class="text-center">KONTYNUUJ Z LOGOWANIEM</a>
    </div>
    <div>
      <a href="./loginguest.php" class="text-center">KONTYNUUJ JAKO GOŚĆ</a>
    </div>
    NOTLOGGED;
}
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>