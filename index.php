<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cinemaaaaaaa</title>
</head>
<body>
  <nav>
    <h1>Nazwa kina</h1>
    <a href="#">zaloguj się</a>
  </nav>
  <h3> Repertuar</h3>
  <?php
  require_once "scripts/connect.php";
  $sql = "SELECT * FROM movies";
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
    $screeningsResult = $conn->query("SELECT TIME_FORMAT(time, '%H:%i') AS time FROM screenings WHERE movie_id = $movie[id] ORDER BY time");

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