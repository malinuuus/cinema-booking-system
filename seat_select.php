<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cinema</title>
  <style>
    .seats {
      display: inline-block;
    }
    
    .screen {
      background: gray;
      height: 7px;
      margin-bottom: 20px;
    }
    
    .row {
      display: flex;
      align-items: center; /* wyrównywanie w pionie */
    }

    .seat {
      background: pink;
      display: block;
      width: 20px;
      height: 20px;
      margin: 5px;
      cursor: pointer;
    }

    .selected {
      background: gray;
    }
  </style>
</head>
<body>
  <nav>
    <h1><a href="./index.php" class="text-center">Nazwa kina</a></h1>
    <a href="login.php">zaloguj się</a>
  </nav>
  <?php
  //zrobic: dodawanie do bazy jako gosc i podsumowanie
  session_start();
  $_SESSION["screening_id"] = $_GET["id"];

  require_once "scripts/connect.php";
  $sql = "SELECT m.id, m.title, m.duration, s.hall_number, s.is_subtitles, s.date FROM movies m INNER JOIN screenings s ON m.id = s.movie_id where s.id = $_GET[id]";
  $result = $conn->query($sql);
  while($movie = $result->fetch_assoc()){
    echo <<< MOVIE
      <div>
        <h3>tytuł filmu: $movie[title] $movie[is_subtitles]</h3>
        <p>czas trwania: $movie[duration] min</p>
        <p>numer sali: $movie[hall_number] </p>
        <p>$movie[date]</p>
      </div>
    MOVIE;
  }
 ?>

 <!-- miejsca -->
  <div class="seats">
    
    <p>ekran</p>
    <div class="screen"></div>
    <?php
    $result = $conn->query("SELECT row FROM seats GROUP BY row");

    while ($row = $result->fetch_assoc()) {
      echo "<div class='row'>$row[row]";

      $seatsResult = $conn->query("SELECT id, number FROM seats where row=$row[row]");

      while ($seat = $seatsResult->fetch_assoc()) {
        echo "<span class='seat' id=$seat[id]></span>";
      }

      echo "</div>";
    }
    ?>
  </div>
  <div class="col-7">
  <button class="text-center" id="save-button">Kup bilet</button>
</div>
<script>
  // javascript
  // tablica elementów z klasą seat
  const seats = document.querySelectorAll('.seat');

  // dla każdego elementu z klasą seat
  seats.forEach(seat => {
    // dodaj zdarzenie na kliknięcie
    seat.addEventListener('click', () => {
      // co ma się dziać po kliknięciu
      seat.classList.toggle('selected'); // przełączanie klasy selected
    })
  })

  // element z id save-button
  const saveButton = document.getElementById('save-button');

  // po kliknięciu
  saveButton.addEventListener('click', () => {
    // tablica elementów z klasami seat i selected
    const selectedSeats = document.querySelectorAll('.seat.selected');
    
    // tablica z id miejsc
    const selectedSeatIds = [];

    // dodanie id miejsc
    selectedSeats.forEach(seat => {
      selectedSeatIds.push(seat.id);
    })

    // utworzenie elementu formularza
    const form = document.createElement('form');
    form.method = 'POST';
    form.action = 'buy_ticket.php';

    // utworzenie elementu input
    const input = document.createElement('input');
    input.type = 'hidden';
    input.name = 'selectedSeats';
    input.value = selectedSeatIds.join(',');

    form.appendChild(input); // dodanie inputa do formularza
    document.body.appendChild(form); // dodanie formularza do strony
    form.submit(); // przesłanie formularza
  })
</script>
</body>
</html>