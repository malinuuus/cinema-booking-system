<?php
session_start();

foreach ($_POST as $key => $value) {
    if (empty($value)) {
        $_SESSION["error"] = "Wypełnij wszystkie pola!";
        echo "<script>history.back();</script>";
        exit();
    }
}

require_once "./connect.php";
$sql = "SELECT id, password FROM customers WHERE email = ? AND is_user = 1";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $_POST["email"]);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    $_SESSION["error"] = "Użytkownik o podanym emailu nie istnieje!";
    echo "<script>history.back();</script>";
    exit();
} else {
    $customer = $result->fetch_assoc();
    if (password_verify($_POST["pass"], $customer["password"])) {
        // id zalogowanego użytkownika
        $_SESSION["user_id"] = $customer["id"];

        $_SESSION["logged"]["first_name"] = $customer["first_name"];
	    $_SESSION["logged"]["session_id"] = session_id();
        
        $redirect = isset($_GET["redirect"]) ? $_GET["redirect"] : "../index.php";
        header("location: $redirect");
    } else {
        $_SESSION["error"] = "Podano nieprawidłowe hasło!";
        echo "<script>history.back();</script>";
        exit();
    }
}