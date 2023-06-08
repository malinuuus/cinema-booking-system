<?php
// skrypt po kliknięciu płacę
session_start();

$error = 0;

// sprawdzenie, czy metoda płatności jest wybrana
if (!isset($_POST["gridRadios"])) {
    $_SESSION["error"] = "Wybierz metodę płatności!";
    $error++;
}

if ($error != 0) {
    echo "<script>history.back();</script>";
    exit();
}

if (isset($_SESSION["selectedSeats"])) {
    require_once "connect.php";
    $selectedSeats = explode(',', $_SESSION["selectedSeats"]);
    $ticketNumber = uniqid();

    // dla zalogowanego użytkownika - user_id
    // dla gościa - customer_id
    if (isset($_SESSION["user_id"])) {
        $_SESSION["customer_id"] = $_SESSION["user_id"];
    }

    foreach ($selectedSeats as $seatId) {
        $resultSeats = $conn->prepare("INSERT INTO reservations (ticket_number, is_paid, screening_id, customer_id, seat_id) VALUES (?, 1, ?, ?, ?)");
        $resultSeats->bind_param('siii', $ticketNumber, $_SESSION["screening_id"], $_SESSION["customer_id"], $seatId);
        $resultSeats->execute();
    }

    unset($_SESSION["customer_id"]);
    header("location: ../ticket.php");
} else {
    echo "<script>history.back();</script>";
}