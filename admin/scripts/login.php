<?php
session_start();

foreach ($_POST as $key => $value) {
    if (empty($value)) {
        $_SESSION["error"] = "Wypełnij wszystkie pola!";
        echo "<script>history.back();</script>";
        exit();
    }
}

require_once "../../scripts/connect.php";
$sql = "SELECT id, password FROM admins WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $_POST["email"]);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    $_SESSION["error"] = "Administrator o podanym emailu nie istnieje!";
    echo "<script>history.back();</script>";
    exit();
} else {
    $admin = $result->fetch_assoc();
    if (password_verify($_POST["pass"], $admin["password"])) {
        // id zalogowanego użytkownika
        $_SESSION["admin_id"] = $admin["id"];
    } else {
        $_SESSION["error"] = "Podano nieprawidłowe hasło!";
        echo "<script>history.back();</script>";
        exit();
    }
}

header("location: ../dashboard.php");