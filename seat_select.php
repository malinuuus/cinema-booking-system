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
  $sql = "SELECT m.id, m.title, m.duration, s.hall_number, s.is_subtitles, s.date FROM movies m INNER JOIN screenings s ON m.id = s.movie_id where s.id = 1";
  $result = $conn->query($sql);
  while($movie = $result->fetch_assoc()){
    echo <<< MOVIE
      <div>
        <h3><p>tytuł filmu: $movie[title] $movie[is_subtitles]</p></h3>
        <p>czas trwania: $movie[duration] min</p>
        <p>numer sali: $movie[hall_number] </p>
        <p>$movie[date]</p>
        
    MOVIE;
  }
  echo "</div>";
 ?>
  <div class="col-7">
  <button type="submit" class="btn btn-primary btn-block"><a href="./buy_ticket.php" class="text-center">Kup bilet</a></button>
</div>

 
</body>
</html>