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


if ($_POST["email1"] != $_POST["email2"]) {
    $_SESSION["error"] = "Adresy email są różne";
    $error++;
}

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

if ($result->num_rows != 0) {
    $_SESSION["error"] = "Mail $_POST[email1] jest juz używany! Spróbuj się zalogować.";
    
    echo "<script>history.back();</script>";
    exit();
}

require_once "./connect.php";

$stmt = $conn->prepare("INSERT INTO `customers` (`first_name`, `last_name`, `email`, `password`, `is_user`) VALUES (?, ?, ?, null, '0' );");
$stmt->bind_param('sss', $_POST["first_name"], $_POST["last_name"], $_POST["email1"]);
$stmt->execute();

echo $stmt->affected_rows;

if ($stmt->affected_rows == 1) {
    $_SESSION["success"] = "Dodano gościa $_POST[first_name] $_POST[last_name]";
} else {
    $_SESSION["error"] = "Nie udało sie dodać rekordu ";
}
