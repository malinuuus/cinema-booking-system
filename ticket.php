<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Podsumowanie</title>
</head>
<body>
<?php require_once "header.php"; ?>
<p class="login-box-msg">DZIĘKUJEMY ZA ZAKUP</p>
<?php
session_start();

require_once "scripts/connect.php";
$sql = "SELECT m.id, m.title, m.duration, s.hall_number, s.is_subtitles, s.date, s.time FROM movies m INNER JOIN screenings s ON m.id = s.movie_id where s.id = $_SESSION[screening_id]";
$result = $conn->query($sql);
while($movie = $result->fetch_assoc()){
  echo <<< MOVIE
    <div>
      <p>twój bilet:
      <h3>$movie[title] </h3>
      <p>$movie[date] $movie[time]</p>
      <p>Sala $movie[hall_number]</p>

      
    </div>
  MOVIE;

}
/*
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
*/

/*
$sql = "SELECT row, number FROM seats WHERE id = $_POST[selectedSeats]";
$result = $conn->query($sql);
while($movie = $result->fetch_assoc()){
    echo <<< SEAT
    <div>
        <p>Rząd: $seat[row], Miejsce: $seat[number]</p>
    </div>
SEAT;
}
*/

?>


</body>
</html>

