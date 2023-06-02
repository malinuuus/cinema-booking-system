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

$prevDayDisabled = $prevDay < date('Y-m-d') ? "disabled" : "";
$nextDayDisabled = $nextDay >= date('Y-m-d', strtotime("+1 week")) ? "disabled" : "";

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <title>Cinema</title>
</head>
<body class="bg-dark text-light">
  <?php require_once "header.php"; ?>
  <div class="content px-5 py-4">
    <h3>Repertuarrrrr</h3>
    <div class="bg-dark d-flex align-items-center">
        <a class="btn btn-outline-light btn-sm <?php echo $prevDayDisabled ?>" href=<?php echo $prevDayLink ?>><</a>
        <span class="mx-2"><?php echo $dateDisplay ?></span>
        <a class="btn btn-outline-light btn-sm <?php echo $nextDayDisabled ?>" href=<?php echo $nextDayLink?>>></a>
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
        <div class="bg-dark my-3 py-3 border-bottom">
          <h3>$movie[title]</h3>
          <img src="images/straz.jpg" width="150">
          <p>czas trwania: $movie[duration] min</p>
          <p>premiera: $movie[premiere_date]</p>
          <p>opis: $movie[description]</p>
      MOVIE;

      // wyświetlenie godzind
      $screeningsResult = $conn->query("SELECT id, TIME_FORMAT(time, '%H:%i') AS time, CONCAT(date, ' ', time) AS datetime FROM screenings WHERE movie_id = $movie[id] AND date = '$date' ORDER BY time");

      while ($screening = $screeningsResult->fetch_assoc()) {
        $disabledClass = strtotime($screening["datetime"]) < time() ? "disabled" : "";

        echo <<< SCREENING
          <a href="./seat_select.php?id=$screening[id]" class="btn btn-outline-light $disabledClass mx-1">$screening[time]</a>
        SCREENING;
      }

      echo "</div>";
    }
    ?>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>