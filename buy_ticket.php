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
session_start();
require_once "scripts/connect.php";
$sql = "SELECT m.id, m.title, m.duration, s.hall_number, s.is_subtitles, s.date, s.time FROM movies m INNER JOIN screenings s ON m.id = s.movie_id where s.id = $_SESSION[screening_id]";
$result = $conn->query($sql);
while($movie = $result->fetch_assoc()){
  echo <<< MOVIE
    <div>
      <h3>tytuł filmu: $movie[title] $movie[is_subtitles]</h3>
      <p>czas trwania: $movie[duration] min</p>
      <p>numer sali: $movie[hall_number] </p>
      <p>$movie[date] $movie[time]</p>
    </div>
  MOVIE;
}

$selectedSeats = explode(',', $_POST["selectedSeats"]);

foreach ($selectedSeats as $key => $value) {
    
    $sql = "SELECT row, number FROM seats WHERE id=$value";
    $result = $conn->query($sql);
    $seat = $result->fetch_assoc();

    echo <<< SEAT
        <div>
            <p>Rząd: $seat[row], Miejsce: $seat[number]</p>
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

