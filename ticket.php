<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Podsumowanie</title>
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
<?php require_once "header.php"; ?>
<div class="bg-dark content px-5 py-4">
<h3 class="login-box-msg my-4">DZIĘKUJEMY ZA ZAKUP</h3>
<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once "scripts/connect.php";
$sql = "SELECT m.id, m.title, m.duration, s.hall_number, s.is_subtitles, s.date, s.time FROM movies m INNER JOIN screenings s ON m.id = s.movie_id where s.id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $_SESSION['screening_id']);
$stmt->execute();
$result = $stmt->get_result();

while($movie = $result->fetch_assoc()){
  echo <<< MOVIE
    <div>
      <br><p>twój bilet:
      <h3>$movie[title] </h3>
      <h5>$movie[date] $movie[time]</h5>
      <h5>Sala $movie[hall_number]</h5>
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

