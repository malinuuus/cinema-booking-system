<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <title>Cinema</title>
  <style>
    .screen {
      background: gray;
      height: 7px;
      width: 35%;
      margin: 0 auto 20px auto;
    }
    
    .row {
      display: flex;
      align-items: center; /* wyrównywanie w pionie */
    }

    .seat {
      background: #0024ff;
      display: block;
      width: 20px;
      height: 20px;
      margin: 5px;
      cursor: pointer;
      border-radius: 5px;
    }

    .selected {
      background: #ff7575;
    }

    .taken {
        background: #3d3d3d;
        cursor: auto;
    }
  </style>
</head>
<body class="bg-dark text-light">
    <?php require_once "header.php"; ?>
  <div class="content px-5 py-4">
  <?php
  //zrobic: dodawanie do bazy jako gosc i podsumowanie
  if (session_status() === PHP_SESSION_NONE) {
      session_start();
  }
  $_SESSION["screening_id"] = $_GET["id"];

  require_once "scripts/connect.php";
  $sql = "SELECT m.id, m.title, m.duration, s.hall_number, s.is_subtitles, CONCAT(s.date, ' ', s.time) AS datetime FROM movies m INNER JOIN screenings s ON m.id = s.movie_id where s.id = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param('i', $_GET['id']);
  $stmt->execute();
  $result = $stmt->get_result();
  $movie = $result->fetch_assoc();
  $subtitles = $movie["is_subtitles"] ? "napisy" : "bez napisów";

  if ($result->num_rows == 0 || strtotime($movie["datetime"]) < time()) {
      echo <<< MESSAGE
        <p>Ten seans minął lub nie istnieje!
            <a href="./">Powrót do strony głównej</a>
        </p>
      MESSAGE;
      exit();
  }

    echo <<< MOVIE
      <div>
        <h3 class="mb-3">$movie[title] | $subtitles</h3>
        <p>czas trwania: $movie[duration] min</p>
        <p>numer sali: $movie[hall_number] </p>
        <p>$movie[datetime]</p>
      </div>
    MOVIE;
 ?>

 <!-- miejsca -->
  <div class="seats container">
    
    <p class="text-center">ekran</p>
    <div class="screen"></div>
    <?php
    $stmt = $conn->prepare("SELECT row FROM seats WHERE hall_number = ? GROUP BY row");
    $stmt->bind_param('i', $movie['hall_number']);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
      echo "<div class='row justify-content-center'>$row[row]";
      $seatsStmt = $conn->prepare("SELECT s.id, s.number, IF(r.id IS NULL, 0, 1) AS is_taken FROM seats s LEFT JOIN reservations r ON s.id = r.seat_id AND r.screening_id = ? WHERE s.hall_number = ? AND s.row = ?");
      $seatsStmt->bind_param('iii', $_SESSION['screening_id'], $movie['hall_number'], $row['row']);
      $seatsStmt->execute();
      $seatsResult = $seatsStmt->get_result();

      while ($seat = $seatsResult->fetch_assoc()) {
        if ($seat['is_taken']) {
            echo "<span class='seat taken' id=$seat[id]></span>";
        } else {
            echo "<span class='seat' id=$seat[id]></span>";
        }
      }
      echo "</div>";
    }
    ?>
  </div>
  <div class="d-flex justify-content-center mt-5">
    <button class="btn btn-outline-light" id="save-button" disabled>Kup bilet</button>
  </div>
</div>
<script src="js/select.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>