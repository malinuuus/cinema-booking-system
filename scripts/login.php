<?php
session_start();


foreach ($_POST as $key => $value) {
    if (empty($value)) {
        $_SESSION["error"] = "Wypełnij wszystkie pola!";
        echo "<script>history.back();</script>";
        exit();
    }
}

$error = 0;

// if (!isset($_POST["email"])) {
//     $_SESSION["error"] = "Podaj email!";
//     $error++;
// }
// if (!isset($_POST["pass"])) {
//     $_SESSION["error"] = "Podaj hasło!";
//     $error++;
// }$error++;


if ($error != 0) {
    echo "<script>history.back();</script>";
    exit();
}

require_once "./connect.php";
$sql = "SELECT * FROM customers WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $_POST["email1"]);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    $_SESSION["error"] = "Błąd!";
    echo "<script>history.back();</script>";
    exit();
}

require_once "./connect.php";
// $pass = password_hash($_POST["pass1"], PASSWORD_ARGON2ID);

$stmt = $conn->prepare("INSERT INTO `customers` (`email`, `password`) VALUES (?, ?);");
$stmt->bind_param('ss', $_POST["email1"], $pass);
$stmt->execute();

echo $stmt->affected_rows;

if ($stmt->affected_rows == 1) {
    $_SESSION["success"] = "Zalogowano $_POST["first_name"] $_POST["last_name"]";
} else {
    $_SESSION["error"] = "Nie zalogowano";
}


