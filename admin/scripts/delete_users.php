<?php
session_start();
require_once "../../scripts/connect.php";

$stmt = $conn->prepare("SELECT * FROM customers WHERE id = ?");
$stmt->bind_param("i", $_POST["id"]);
$stmt->execute();
$result = $stmt->get_result();
$rows = $result->num_rows;

$sql = "DELETE FROM customers WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $_POST["id"]);
$stmt->execute();

if ($conn->affected_rows == 1) {
    $_SESSION["success"] = "Prawidłowo usunięto rekord";
} else {
    $_SESSION["error"] = "Nie usunięto rekordu!";
}

header("location: ../users.php");
?>



