<?php
if (isset($_GET["date"])) {
    $date = $_GET["date"];

    // jeśli zakres jest zły
    if ($date < date('Y-m-d') || $date >= date('Y-m-d', strtotime("+1 week"))) {
        header("location: index.php");
        exit();
    }
} else {
    $date = date('Y-m-d');
}
$dateDisplay = date('d.m.Y', strtotime($date));

$prevDay = date('Y-m-d', strtotime($date.' -1 day'));
$nextDay = date('Y-m-d', strtotime($date.' +1 day'));

$prevDayLink = $prevDay < date('Y-m-d') ? "#" : "index.php?date=$prevDay";
$nextDayLink = $nextDay >= date('Y-m-d', strtotime("+1 week")) ? "#" : "index.php?date=$nextDay";

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
  <?php require_once "header.php"; ?>
  <h3> Repertuar</h3>
  <div>
      <a href=<?php echo $prevDayLink ?>><</a>
      <span><?php echo $dateDisplay ?></span>
      <a href=<?php echo $nextDayLink?>>></a>
  </div>
  <?php
  require_once "scripts/connect.php";

  $sql = "SELECT m.id, m.title, m.description, m.premiere_date, m.duration FROM movies m INNER JOIN screenings s ON m.id = s.movie_id WHERE s.date = ? GROUP BY m.id";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param('s', $date);
  $stmt->execute();
  $result = $stmt->get_result();

  while($movie = $result->fetch_assoc()){
    echo <<< MOVIE
      <div>
        <h3>$movie[title]</h3>
        <p>czas trwania: $movie[duration] min</p>
        <p>premiera: $movie[premiere_date]</p>  
        <p>opis: $movie[description]</p>
    MOVIE;

    // wyświetlenie godzin
    $screeningsResult = $conn->query("SELECT id, TIME_FORMAT(time, '%H:%i') AS time FROM screenings WHERE movie_id = $movie[id] AND date = '$date' ORDER BY time");

    while ($screening = $screeningsResult->fetch_assoc()) {
      echo <<< SCREENING
        <p><a href="./seat_select.php?id=$screening[id]" class="text-center">$screening[time]</a></p>
      SCREENING;
    }

    echo "</div>";
  }
  ?>
</body>
</html>