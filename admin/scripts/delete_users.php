<?php
session_start();
require_once "../../scripts/connect.php";

$stmt = $conn->prepare("SELECT * FROM customers WHERE id = ?");
$stmt->bind_param("i", $_POST["id"]);
$stmt->execute();
$result = $stmt->get_result();
$rows = $result->num_rows;
$sql = "DELETE FROM customers WHERE id = $_POST[id]";
$conn->query($sql);
$deleteUser = 0;
if ($conn->affected_rows != 0) {
    $deleteUser =  $_POST["id"];
}else{
    $deleteUser = 0;
}

header("location: ../users.php");
?>



