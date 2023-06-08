<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$selectedSeats = explode(',', $_SESSION["selectedSeats"]);

foreach ($selectedSeats as $seatId) {
    $sql = "SELECT row, number FROM seats WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $seatId);
    $stmt->execute();
    $seat = $stmt->get_result()->fetch_assoc();

    echo "<p class='my-1'>Rząd: $seat[row], Miejsce: $seat[number]</p>";
}