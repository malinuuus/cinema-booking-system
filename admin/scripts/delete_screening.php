<?php
session_start();
require_once "../../scripts/connect.php";

$stmt = $conn->prepare("SELECT * FROM reservations WHERE screening_id = ?");
$stmt->bind_param("i", $_POST["screening_id"]);
$stmt->execute();
$result = $stmt->get_result();
$rows = $result->num_rows;

if ($rows > 0) {
  $_SESSION["error"] = "Ten seans istnieje w $rows rezerwacjach!";
  echo "<script>history.back()</script>";
  exit();
}

$sql = "DELETE FROM screenings WHERE id = $_POST[screening_id]";
$conn->query($sql);
$deleteScreening = 0;
if ($conn->affected_rows != 0) {
    $deleteScreening =  $_POST["screening_id"];
}else{
    $deleteScreening = 0;
}

header("location: ../screenings.php");
?>

