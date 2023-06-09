<?php
session_start();
require_once "../../scripts/connect.php";

$stmt = $conn->prepare("SELECT * FROM movies WHERE id = ?");
$stmt->bind_param("i", $_POST["movie_id"]);
$stmt->execute();
$result = $stmt->get_result();
$rows = $result->num_rows;
$sql = "DELETE FROM movies WHERE id = $_POST[movie_id]";
$conn->query($sql);
$deleteMovie = 0;
if ($conn->affected_rows != 0) {
    $deleteMovie = $_POST["movie_id"];
}else{
    $deleteMovie = 0;
}

header("location: ../movies.php");
?>