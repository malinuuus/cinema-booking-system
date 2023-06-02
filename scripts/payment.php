<?php
session_start();

$error = 0;

if (!isset($_POST["gridRadios"])) {
    $_SESSION["error"] = "Wybierz metodę płatności!";
    $error++;
}

if ($error != 0) {
    echo "<script>history.back();</script>";
    exit();
}
header("location: ../ticket.php");