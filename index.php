<?php
// dodać ograniczenie zakresu daty
$date = isset($_GET["date"]) ? $_GET["date"] : date('Y-m-d');
$dateDisplay = date('d.m.Y', strtotime($date));

$prevDay = date('Y-m-d', strtotime($date.' -1 day'));
$nextDay = date('Y-m-d', strtotime($date.' +1 day'));

?>
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
  <h3> Repertuar</h3>
  <div>
      <a href="index.php?date=<?php echo $prevDay ?>"><</a>
      <span><?php echo $dateDisplay ?></span>
      <a href="index.php?date=<?php echo $nextDay ?>">></a>
  </div>
  <?php
  require_once "scripts/connect.php";
  // dodać zabezpieczenie przed sql injection
  $sql = "SELECT m.id, m.title, m.description, m.premiere_date, m.duration FROM movies m INNER JOIN screenings s ON m.id = s.movie_id WHERE s.date = '$date' GROUP BY m.id";
  $result = $conn->query($sql);

  while($movie = $result->fetch_assoc()){
    echo <<< MOVIE
      <div>
        <h3>$movie[title]</h3>
        <p>czas trwania: $movie[duration] min</p>
        <p>premiera: $movie[premiere_date]</p>  
        <p>opis: $movie[description]</p>
    MOVIE;

    // wyświetlenie godzin
    $screeningsResult = $conn->query("SELECT TIME_FORMAT(time, '%H:%i') AS time FROM screenings WHERE movie_id = $movie[id] AND date = '$date' ORDER BY time");

    while ($screening = $screeningsResult->fetch_assoc()) {
      echo <<< SCREENING
        <p>$screening[time]</p>
      SCREENING;
    }

    echo "</div>";
  }
  ?>
</body>
</html>